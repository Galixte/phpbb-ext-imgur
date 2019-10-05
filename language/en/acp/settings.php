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
	'ACP_IMGUR_REGISTER' => 'Register a new application',
	'ACP_IMGUR_REGISTER_EXPLAIN' => 'If you do not have the API credentials required below, login with your Imgur account and register a new application with the following link.<br><strong>If you already have the API credentials, you do not need to create a new application.</strong>',
	'ACP_IMGUR_AUTHORIZE' => 'Authorize access',
	'ACP_IMGUR_AUTHORIZE_EXPLAIN' => 'You need to authorize the application in order to upload the images to your account.',

	'ACP_IMGUR_API_SETTINGS' => 'API settings',
	'ACP_IMGUR_CLIENT_ID' => 'Client ID',
	'ACP_IMGUR_CLIENT_ID_EXPLAIN' => 'String consisting of hexadecimal numbers with a length of 15 characters.',
	'ACP_IMGUR_CLIENT_SECRET' => 'Client Secret',
	'ACP_IMGUR_CLIENT_SECRET_EXPLAIN' => 'String consisting of hexadecimal numbers with a length of 40 characters.',
	'ACP_IMGUR_ALBUM' => 'Album',
	'ACP_IMGUR_ALBUM_EXPLAIN' => 'Alphanumeric string with a length equal or greater than 5 characters. It will be used to store the uploaded images. Leave it empty if you want all the images to be uploaded in the default location.',
	'ACP_IMGUR_ALBUM_DOWNLOAD' => 'Download album backup',

	'ACP_IMGUR_OUTPUT_EXPLAIN' => 'You must select at least one option of each section.',
	'ACP_IMGUR_OUTPUT_TYPE' => 'Output type',

	'ACP_IMGUR_THUMBNAIL_KEEP_PROPORTIONS' => 'Thumbnail sizes that keep image proportions',
	'ACP_IMGUR_THUMBNAIL_NOT_KEEP_PROPORTIONS' => 'Thumbnail sizes that do <u>not</u> keep image proportions',

	'ACP_IMGUR_THUMBNAIL_SIZE' => 'Thumbnail size',
	'ACP_IMGUR_THUMBNAIL_SIZE_EXPLAIN' => '<samp>Thumbnail size</samp> options will not have any effect if the output type is not set to <samp>Thumbnail</samp>.',

	'ACP_IMGUR_OUTPUT_TEXT_EXPLAIN' => 'Raw image URL',
	'ACP_IMGUR_OUTPUT_URL_EXPLAIN' => '<code>[url]<var>{image}</var>[/url]</code>',
	'ACP_IMGUR_OUTPUT_IMAGE_EXPLAIN' => '<code>[img]<var>{image}</var>[/img]</code> BBCode',
	'ACP_IMGUR_OUTPUT_THUMBNAIL_EXPLAIN' => '<code>[url=<var>{image}</var>][img]<var>{thumbnail}</var>[/img][/url]</code>',

	'ACP_IMGUR_THUMBNAIL_SMALL' => 'Small',
	'ACP_IMGUR_THUMBNAIL_SMALL_EXPLAIN' => '160x160px',

	'ACP_IMGUR_THUMBNAIL_MEDIUM' => 'Medium',
	'ACP_IMGUR_THUMBNAIL_MEDIUM_EXPLAIN' => '320x320px',

	'ACP_IMGUR_THUMBNAIL_LARGE' => 'Large',
	'ACP_IMGUR_THUMBNAIL_LARGE_EXPLAIN' => '640x640px',

	'ACP_IMGUR_THUMBNAIL_HUGE' => 'Huge',
	'ACP_IMGUR_THUMBNAIL_HUGE_EXPLAIN' => '1024x1024px',

	'ACP_IMGUR_THUMBNAIL_SMALL_SQUARE' => 'Small square',
	'ACP_IMGUR_THUMBNAIL_SMALL_SQUARE_EXPLAIN' => '90x90px',

	'ACP_IMGUR_THUMBNAIL_BIG_SQUARE' => 'Big square',
	'ACP_IMGUR_THUMBNAIL_BIG_SQUARE_EXPLAIN' => '160x160px',

	'ACP_IMGUR_TOGGLE_DISPLAY_FIELD' => 'Show/Hide %s',

	'ACP_IMGUR_VALIDATE_INVALID_FIELDS' => 'Invalid values for fields: <samp>%s</samp>',
	'ACP_IMGUR_VALIDATE_VALUES_NOT_ALLOWED' => 'The values given for <samp>%1$s</samp> are not allowed: <code>%2$s</code>',

	'OUTPUT_SETTINGS' => 'Output settings'
]);
