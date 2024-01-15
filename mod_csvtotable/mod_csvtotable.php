<?php

defined('_JEXEC') or die();


$fileurl=$params->get('fileurl');
$separator=$params->get('separator');

$search=$params->get('search');
if($search){
    $min_char=$params->get('min_char');
    $search_placeholder=$params->get('search_placeholder');
}

$text_align=$params->get('table_text_align');
$font_size=$params->get('table_font_size');


$header_bg=$params->get('header_bg');
$header_text_color=$params->get('header_text_color');
$header_font_size=$params->get('header_font_size');

$evenbg=$params->get('even_bg');
$oddbg=$params->get('odd_bg');


require(JModuleHelper::getLayoutPath('mod_csvtotable'));

?>