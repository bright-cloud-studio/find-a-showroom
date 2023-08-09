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

 
/* Table tl_showroom */
$GLOBALS['TL_DCA']['tl_showroom'] = array
(
 
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' 	=> 	'primary',
                'showroom_name' =>  'index'
            )
        )
    ),
 
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('showroom_name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('state', 'city', 'showroom_name'),
            'format'                  => '%s - %s - %s'
        ),
        'global_operations' => array
        (
            'export' => array
            (
                'label'               => 'Export Showrooms CSV',
                'href'                => 'key=exportShowrooms',
                'icon'                => 'system/modules/frasch_find_a_showroom/assets/icons/file-export-icon-16.png'
            ),
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )

        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_showroom']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
			
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_showroom']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_showroom']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
            (
              'label'               => &$GLOBALS['TL_LANG']['tl_showroom']['toggle'],
              'icon'                => 'visible.gif',
              'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
              'button_callback'     => array('Bcs\Backend\Showrooms', 'toggleIcon')
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_showroom']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),
 
    // Palettes
    'palettes' => array
    (
        'default'                     => '{showroom_legend},showroom_name,company_name,territory_sales_manager,products,partner_type,gallery_url;{address_legend}street_address,city,state;{publish_legend},published;'
    ),
 
    // Fields
    'fields' => array
    (
        'id' => array
            (
                'sql'                     => "int(10) unsigned NOT NULL auto_increment"
            ),
        'tstamp' => array
            (
                'sql'                     => "int(10) unsigned NOT NULL default '0'"
            ),
        'sorting' => array
    		(
                'sql'                     => "int(10) unsigned NOT NULL default '0'"
    		),
        'showroom_name' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['showroom_name'],
    			'inputType'               => 'text',
    			'default'                 => '',
    			'search'                  => true,
    			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
        'territory_sales_manager' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['territory_sales_manager'],
    			'inputType'               => 'text',
    			'default'                 => '',
    			'search'                  => true,
    			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
        'street_address' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['street_address'],
    			'inputType'               => 'text',
    			'default'                 => '',
    			'search'                  => true,
    			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
        'city' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['city'],
    			'inputType'               => 'text',
    			'default'                 => '',
    			'search'                  => true,
    			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
        'state' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['state'],
    			'inputType'               => 'checkbox',
    			'default'				  => '',
    			'options_callback'		  => array('Bcs\Backend\Reps', 'getStates'),
    			'eval'                    => array('multiple'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
        'products' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['products'],
    			'inputType'               => 'select',
                'options'                 => array('' => ' ', 'full_line' => 'Full Line', 'lighting_only' => 'Lighting Only', 'corporate' => 'Corporate'),
                'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
                'sql'                     => "varchar(32) NOT NULL default ''"
    		),
        'partner_type' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['partner_type'],
    			'inputType'               => 'text',
    			'default'                 => '',
    			'search'                  => true,
    			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
        'gallery_url' => array
    		(
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['gallery_url'],
    			'inputType'               => 'text',
    			'default'                 => '',
    			'search'                  => true,
    			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
    			'sql'                     => "varchar(255) NOT NULL default ''"
    		),
    	'published' => array
    		(
    			'exclude'                 => true,
    			'label'                   => &$GLOBALS['TL_LANG']['tl_showroom']['published'],
    			'inputType'               => 'checkbox',
    			'eval'                    => array('submitOnChange'=>true, 'doNotCopy'=>true),
    			'sql'                     => "char(1) NOT NULL default ''"
    		)		
    )
);
