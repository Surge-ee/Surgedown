<?php

/* Fieldtype Info
***********************************************************************/

if(defined('MARKDOWN_VER') === FALSE) {
	define('MARKDOWN_VER', '1.2');
}

/* Global Options
***********************************************************************/

$EE =& get_instance();

$md_theme_url = defined('URL_THIRD_THEMES') ? URL_THIRD_THEMES : $EE->config->slash_item('theme_folder_url').'third_party/';

if(defined('MARKDOWN_GLOBAL_CSS') === FALSE) {
	define('MARKDOWN_GLOBAL_CSS', $md_theme_url . 'markdown/css/default.css');
}