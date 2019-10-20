<?php
/**
 *
 * Imgur. An extension for the phpBB Forum Software package.
 * French translation by Galixte (http://www.galixte.com)
 *
 * @copyright (c) 2017-2019 Alfredo Ramos <alfredo.ramos@yandex.com>
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, [
	'ACP_IMGUR_REGISTER' => 'Enregistrer une nouvelle application',
	'ACP_IMGUR_REGISTER_EXPLAIN' => 'Permet ci-dessous de s’enregistrer auprès de l’application Imgur. Se connecter au moyen de ses identifiants du service Imgur via le bouton suivant.<br><strong>Puis saisir les clés (identifiants) de l’API Imgur ci-dessous.</strong>',
	'ACP_IMGUR_AUTHORIZE' => 'Autoriser l’accès',
	'ACP_IMGUR_AUTHORIZE_EXPLAIN' => 'Permet d’autoriser l’application Imgur au préalable de pouvoir envoyer des images sur son compte via ce service.',

	'ACP_IMGUR_API_SETTINGS' => 'Paramètres de l’API',
	'ACP_IMGUR_API_SETTINGS_EXPLAIN' => '<p>Permet de configurer les données nécessaires de l’API Imgur. Merci de consulter la page <a href="https://www.phpbb.com/customise/db/extension/imgur/faq"><strong>FAQ</strong></a> pour obtenir d’avantage d’informations. Pour toute assistance, merci de consulter la rubrique <a href="https://www.phpbb.com/customise/db/extension/imgur/support"><strong>Support</strong></a>.</p>',

	'ACP_IMGUR_CLIENT_ID' => 'Clé « Client ID »',
	'ACP_IMGUR_CLIENT_ID_EXPLAIN' => 'Permet de saisir une suite de nombres en hexadécimal comportant 15 caractères.',
	'ACP_IMGUR_CLIENT_SECRET' => 'Clé « Client Secret »',
	'ACP_IMGUR_CLIENT_SECRET_EXPLAIN' => 'Permet de saisir une suite de nombres en hexadécimal comportant 40 caractères.',
	'ACP_IMGUR_ALBUM' => 'Album',
	'ACP_IMGUR_ALBUM_EXPLAIN' => 'Permet de sdaisir une suite alphanumérique d’une longueur égale ou supérieure à 5 caractères. Utile pour personnaliser l’emplacement de stockage des images envoyées. Laisser vide pour stocker les images envoyées dans l’emplacement par défaut.',
	'ACP_IMGUR_ALBUM_DOWNLOAD' => 'Télécharger une sauvegarde de l’album',

	'OUTPUT_SETTINGS' => 'Paramètres du format de sortie par défaut',
	'OUTPUT_SETTINGS_EXPLAIN' => '<p>Permet d’activer, désactiver et de définir plusieurs options par défaut concernant le format de sortie des images envoyées. Aussi, il sera affiché plusieurs options personnalisées provenant d’extensions tiers, <strong>il est nécessaire d’activer chaque option personnalisée avant de pouvoir les utiliser</strong>.</p>',

	'ACP_IMGUR_OUTPUT_TYPE' => 'Format de sortie',
	'ACP_IMGUR_OUTPUT_TYPE_EXPLAIN' => 'Permet de définir le format de sortie. Il est nécessaire d’activer au moins une option. L’option par défaut doit être activée, sinon elle utilisera la première option disponible.',

	'ACP_IMGUR_OUTPUT_TYPE_BUILTIN' => 'Suppléments',
	'ACP_IMGUR_OUTPUT_TYPE_EXTRA' => 'Formats supplémentaires fournis par d’autres extensions',

	'ACP_IMGUR_THUMBNAIL_KEEP_PROPORTIONS' => 'Dimensions des miniatures conservant les proportions',
	'ACP_IMGUR_THUMBNAIL_NOT_KEEP_PROPORTIONS' => 'Dimensions des miniatures <u>ne conservant pas</u> les proportions',

	'ACP_IMGUR_THUMBNAIL_SIZE' => 'Taille de la miniature',
	'ACP_IMGUR_THUMBNAIL_SIZE_EXPLAIN' => 'Permet de définir les dimensions de la miniature. Pour être fonctionnelle l’option <samp>Taille de la miniature</samp> nécessite que l’option « Format de sortie » soit définit sur « <samp>Miniature</samp> ».',

	'ACP_IMGUR_OUTPUT_TEXT_EXPLAIN' => 'Adresse URL de l’image brute',
	'ACP_IMGUR_OUTPUT_URL_EXPLAIN' => '<code>[url]<var>{image}</var>[/url]</code>',
	'ACP_IMGUR_OUTPUT_IMAGE_EXPLAIN' => '<code>[img]<var>{image}</var>[/img]</code>',
	'ACP_IMGUR_OUTPUT_THUMBNAIL_EXPLAIN' => '<code>[url=<var>{image}</var>][img]<var>{thumbnail}</var>[/img][/url]</code>',

	'ACP_IMGUR_THUMBNAIL_SMALL' => 'Petite',
	'ACP_IMGUR_THUMBNAIL_SMALL_EXPLAIN' => '160 x 160 px',

	'ACP_IMGUR_THUMBNAIL_MEDIUM' => 'Moyenne',
	'ACP_IMGUR_THUMBNAIL_MEDIUM_EXPLAIN' => '320 x 320 px',

	'ACP_IMGUR_THUMBNAIL_LARGE' => 'Grande',
	'ACP_IMGUR_THUMBNAIL_LARGE_EXPLAIN' => '640 x 640 px',

	'ACP_IMGUR_THUMBNAIL_HUGE' => 'Énorme',
	'ACP_IMGUR_THUMBNAIL_HUGE_EXPLAIN' => '1024 x 1024 px',

	'ACP_IMGUR_THUMBNAIL_SMALL_SQUARE' => 'Petit carré',
	'ACP_IMGUR_THUMBNAIL_SMALL_SQUARE_EXPLAIN' => '90 x 90 px',

	'ACP_IMGUR_THUMBNAIL_BIG_SQUARE' => 'Grand carré',
	'ACP_IMGUR_THUMBNAIL_BIG_SQUARE_EXPLAIN' => '160 x 160 px',

	'ACP_IMGUR_TOGGLE_DISPLAY_FIELD' => 'Afficher / masquer la %s',

	'ACP_IMGUR_VALIDATE_INVALID_FIELDS' => 'Valeurs erronées pour les champs : <samp>%s</samp>.',
	'ACP_IMGUR_VALIDATE_VALUES_NOT_ALLOWED' => 'Les valeurs de <samp>%1$s</samp> ne sont pas autorisées : <code>%2$s</code>.'
]);
