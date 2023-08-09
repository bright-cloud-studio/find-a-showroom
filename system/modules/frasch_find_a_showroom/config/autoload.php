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

/* Register the classes */
ClassLoader::addClasses(array
(
      'Bcs\Module\ModFindAShowroom' 	   => 'system/modules/frasch_find_a_showroom/library/Bcs/Module/ModFindAShowroom.php',
      'Bcs\Backend\Showrooms'              => 'system/modules/frasch_find_a_showroom/library/Bcs/Backend/Showrooms.php',
      'Bcs\Model\Showroom'                 => 'system/modules/frasch_find_a_showroom/library/Bcs/Model/Showroom.php',
      'Bcs\Showrooms'                      => 'system/modules/frasch_find_a_showroom/library/Bcs/SHowrooms.php'
));

/* Register the templates */
TemplateLoader::addFiles(array
(
      'mod_find_a_showroom'  => 'system/modules/frasch_find_a_showroom/templates/modules',
      'item_showroom'        => 'system/modules/frasch_find_a_showroom/templates/items',
));
