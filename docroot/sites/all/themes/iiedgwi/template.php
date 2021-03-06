<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 /**
Customize the search form
*/
function iiedgwi_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
	$defText = t('Search our site and library');
  // Set a default value for text inside the search box field.
    $form['search_block_form']['#title'] = $defText;
 	$form['search_block_form']['#attributes']['placeholder'] = $defText;
  	$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search.png');
  }
}
?>