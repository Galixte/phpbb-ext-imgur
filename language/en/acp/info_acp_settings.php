<?php

/**
 * Imgur extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2017 Alfredo Ramos
 * @license GPL-2.0-only
 */

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
 * @ignore
 */
if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'ACP_IMGUR' => 'Imgur',
	'ACP_IMGUR_API_SETTINGS' => 'API settings',
	'ACP_IMGUR_CLIENT_ID' => 'Client ID',
	'ACP_IMGUR_CLIENT_SECRET' => 'Client Secret',
	'ACP_IMGUR_ALBUM' => 'Album',
	'ACP_IMGUR_ALBUM_EXPLAIN' => 'Album ID where all images will be uploaded to. Leave it empty if you want all the images to be uploaded in the default location.',
	'ACP_IMGUR_AUTH_EXPLAIN' => 'You need to authorize the application in order to upload the images to your account.',
	'ACP_IMGUR_AUTHORIZE' => 'Authorize access',
	'ACP_IMGUR_SETTINGS_SAVED' => 'Imgur settings have been succesfully saved.',

	'ACP_IMGUR_OUTPUT_TYPE' => 'Output type',
	'ACP_IMGUR_OUTPUT_TEXT' => 'Text',
	'ACP_IMGUR_OUTPUT_URL' => 'URL',
	'ACP_IMGUR_OUTPUT_IMAGE' => 'Image',
	'ACP_IMGUR_OUTPUT_THUMBNAIL' => 'Thumbnail',
	'ACP_IMGUR_THUMBNAIL_SIZE' => 'Thumbnail size',
	'ACP_IMGUR_THUMBNAIL_SIZE_EXPLAIN' => 'This setting will not have any effect if the output type is not set to <samp>Thumbnail</samp>. Thumbnail sizes are 160x160 for <samp>Small</samp> and 320x320 for <samp>Medium</samp>, image proportions are kept.',
	'ACP_IMGUR_THUMBNAIL_SMALL' => 'Small',
	'ACP_IMGUR_THUMBNAIL_MEDIUM' => 'Medium',

	'ACP_IMGUR_TOGGLE_DISPLAY_FIELD' => 'Show/Hide %s',

	'OUTPUT' => 'Output',
	'OUTPUT_SETTINGS' => 'Output settings',

	'LOG_IMGUR_DATA' => '<strong>Imgur data changed</strong><br />» %s'
]);
