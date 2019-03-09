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
	'IMGUR_BUTTON_EXPLAIN' => 'Sube a Imgur las imágenes seleccionadas y publica su contenido',

	'IMGUR_OUTPUT_TEXT' => 'Texto',
	'IMGUR_OUTPUT_URL' => 'URL',
	'IMGUR_OUTPUT_IMAGE' => 'Imagen',
	'IMGUR_OUTPUT_THUMBNAIL' => 'Miniatura',
	'IMGUR_OUTPUT_MARKDOWN_IMAGE' => 'Imagen Markdown',
	'IMGUR_OUTPUT_MARKDOWN_THUMBNAIL' => 'Miniatura Markdown',

	'IMGUR_IMAGE_TOO_BIG' => 'La imagen <samp>{file}</samp> pesa <code>{size}</code> MiB y debe pesar menos de <code>{max_size}</code> MiB.',
	'IMGUR_NO_IMAGES' => 'No hay imágenes que subir.',
	'IMGUR_UPLOAD_PROGRESS' => '{percentage}% ({loaded} / {total} MiB)'
]);
