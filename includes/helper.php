<?php

/**
 * Imgur extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2017 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\imgur\includes;

use phpbb\config\config;
use phpbb\template\template;
use phpbb\routing\helper as routing_helper;
use phpbb\language\language;
use phpbb\event\dispatcher_interface as dispatcher;

class helper
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\routing\helper */
	protected $routing_helper;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\event\dispatcher_interface */
	protected $dispatcher;

	/**
	 * Helper constructor
	 *
	 * @param \phpbb\config\config				$config
	 * @param \phpbb\template\template			$template
	 * @param \phpbb\routing\helper				$routing_helper
	 * @param \phpbb\language\language			$language
	 * @param \phpbb\event\dispatcher_interface	$dispatcher
	 *
	 * @return void
	 */
	public function __construct(config $config, template $template, routing_helper $routing_helper, language $language, dispatcher $dispatcher)
	{
		$this->config = $config;
		$this->template = $template;
		$this->routing_helper = $routing_helper;
		$this->language = $language;
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Assign global template variables.
	 *
	 * @return void
	 */
	public function assign_template_variables()
	{
		// Enabled output values
		$enabled = $this->enabled_imgur_values();

		// Fallback output type
		if (!in_array($this->config['imgur_output_type'], $enabled['types'], true))
		{
			$this->config->set('imgur_output_type', $enabled['types'][0], false);
		}

		// Fallback thumbnail size
		if (!in_array($this->config['imgur_thumbnail_size'], $enabled['sizes'], true))
		{
			$this->config->set('imgur_thumbnail_size', $enabled['sizes'][0], false);
		}

		// Assign global template variables
		$this->template->assign_vars([
			'IMGUR_UPLOAD_URL' => vsprintf('%1$s/%2$s', [
				$this->routing_helper->route('alfredoramos_imgur_upload'),
				generate_link_hash('imgur_upload')
			]),
			'SHOW_IMGUR_BUTTON' => !empty($this->config['imgur_access_token']),
			'IMGUR_OUTPUT_TYPE' => $this->config['imgur_output_type'],
			'IMGUR_THUMBNAIL_SIZE' => $this->config['imgur_thumbnail_size'],
			'IMGUR_ALLOWED_OUTPUT_TYPES' => implode(',', $enabled['types']),
			'IMGUR_ALLOWED_THUMBNAIL_SIZES' => implode(',', $enabled['sizes'])
		]);

		// Assign enabled output types
		foreach ($enabled['types'] as $type)
		{
			$this->template->assign_block_vars('IMGUR_ENABLED_OUTPUT_TYPES', [
				'KEY' => $type,
				'NAME' => $this->language->lang(sprintf('IMGUR_OUTPUT_%s', strtoupper($type))),
				'DEFAULT' => $this->config['imgur_output_type'] === $type
			]);
		}
	}

	/**
	 * Validate form fields with given filters.
	 *
	 * @param array $fields		Pair of field name and value
	 * @param array $filters	Filters that will be passed to filter_var_array()
	 * @param array $errors		Array of message errors
	 *
	 * @return bool
	 */
	public function validate(&$fields = [], &$filters = [], &$errors = [])
	{
		if (empty($fields) || empty($filters))
		{
			return false;
		}

		// Filter fields
		$data = filter_var_array($fields, $filters, false);

		// Invalid fields helper
		$invalid = [];

		// Validate fields
		foreach ($data as $key => $value)
		{
			// Remove and generate error if field did not pass validation
			// Not using empty() because an empty string can be a valid value
			if (!isset($value) || $value === false)
			{
				$invalid[] = $this->language->lang(
					sprintf('ACP_%s', strtoupper($key))
				);
				unset($fields[$key]);
				continue;
			}
		}

		if (!empty($invalid))
		{
			$errors[]['message'] = $this->language->lang(
				'ACP_IMGUR_VALIDATE_INVALID_FIELDS',
				implode(', ', $invalid)
			);
		}

		// Validation check
		return empty($errors);
	}

	/**
	 * Get Imgur token stored in database.
	 *
	 * @return array
	 */
	public function imgur_token()
	{
		return [
			'access_token'		=> $this->config['imgur_access_token'],
			'expires_in'		=> (int) $this->config['imgur_expires_in'],
			'token_type'		=> $this->config['imgur_token_type'],
			'refresh_token'		=> $this->config['imgur_refresh_token'],
			'account_id'		=> (int) $this->config['imgur_accound_id'],
			'account_username'	=> $this->config['imgur_account_username'],
			'created_at'		=> (int) $this->config['imgur_created_at']
		];
	}

	/**
	 * Remove empty items from an array, recursively.
	 *
	 * @param array		$data
	 * @param integer	$depth
	 *
	 * @return array
	 */
	public function filter_empty_items($data = [], $depth = 0)
	{
		if (empty($data))
		{
			return [];
		}

		$max_depth = 5;
		$depth = abs($depth) + 1;

		// Do not go deeper, return data as is
		if ($depth > $max_depth)
		{
			return $data;
		}

		// Remove empty elements
		foreach ($data as $key => $value)
		{
			if (empty($value))
			{
				unset($data[$key]);
			}

			if (is_array($value) && !empty($value))
			{
				$data[$key] = $this->filter_empty_items($data[$key], $depth);
			}
		}

		// Return a copy
		return $data;
	}

	/**
	 * Enabled imgur values for output.
	 *
	 * @param string $key (optional)
	 *
	 * @return array
	 */
	public function enabled_imgur_values($key = '')
	{
		$key = trim($key);

		// Enabled options
		$enabled = [
			'types' => explode(',', trim($this->config['imgur_enabled_output_types'])),
			'sizes' => explode(',', trim($this->config['imgur_enabled_thumbnail_sizes']))
		];

		// Remove empty options
		$enabled = $this->filter_empty_items($enabled);

		// Administrator must not disable all options
		foreach ($enabled as $k => $v)
		{
			if (empty($v))
			{
				$enabled[$k] = $this->allowed_imgur_values($k, false);
			}
		}

		if (!empty($key) && !empty($enabled[$key]))
		{
			return $enabled[$key];
		}

		return $enabled;
	}

	/**
	 * Allowed imgur values for output.
	 *
	 * @param string	$key	(optional)
	 * @param bool		$extras	(optional)
	 *
	 * @return array
	 */
	public function allowed_imgur_values($key = '', $extras = true)
	{
		// Allowed values
		$allowed = [
			// Output types
			'types' => ['text', 'url', 'image', 'thumbnail'],

			// Thumbnail sizes
			'sizes'	=> ['t', 'm', 'l', 'h', 's', 'b',]
		];

		// Value casting
		$key = trim($key);
		$extras = (bool) $extras;

		// Extra values
		$data = [
			'types' => [],
			'sizes' => []
		];

		/**
		 * Append allowed values.
		 *
		 * @event alfredoramos.imgur.allowed_values_append
		 *
		 * @var array	data	List of allowed values.
		 * @var bool	extras	Whether extra values will be returned.
		 *
		 * @since 1.3.0
		 */
		$vars = ['data', 'extras'];
		extract($this->dispatcher->trigger_event('alfredoramos.imgur.allowed_values_append', compact($vars)));

		// Add extra values
		if ($extras && (!empty($data['types']) || !empty($data['sizes'])))
		{
			$allowed = array_merge_recursive($allowed, $data);
		}

		// Get specific key
		if (!empty($key) && !empty($allowed[$key]))
		{
			return $allowed[$key];
		}

		// Return whole array
		return $allowed;
	}
}
