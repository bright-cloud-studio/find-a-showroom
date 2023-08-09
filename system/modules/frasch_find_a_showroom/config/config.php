<?php

/**
 * Bright Cloud Studio's Find A Showroom
 *
 * Copyright (C) 2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/frasch-find-a-showroom
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */

/* Back End Modules */
$GLOBALS['BE_MOD']['content']['showrooms'] = array(
	'tables' => array('tl_showroom')
);

/* Front end modules */
$GLOBALS['FE_MOD']['frasch_find_a_showroom']['mod_find_a_showroom'] 	= 'Bcs\Module\ModFindAShowroom';

/* Models */
$GLOBALS['TL_MODELS']['tl_showroom'] = 'Bcs\Model\Showroom';
