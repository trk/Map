<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$img_path = 'assets/images/marker_logo.png';

$config['module']['map'] = array
(
	'name' => "Map",
	'description' => "Google map tool for ionize",
	'author' => "İskender TOTOĞLU - ALTI ve BİR IT",
	'version' => "1.0",

	'uri' => 'map',
	'has_admin'=> TRUE,
	'has_frontend'=> TRUE,

//	'js' => array(
//		'assets/javascript/frontend.js'
//	),

	// Array of resources
	// These resources will be added to the role's management panel
	// to allow / deny actions on them.
	'resources' => array(
		'front' => array(
			'title'	=> 'Map Front',
			'actions' => 'show',
		),
		'admin' => array(
			'title' => 'Map Administration',
			'actions' => 'new'
		)
	),

	'source_lang_code' => 'en',
    'maps' => array(
        'default' => array(
            'options' => array(
                'minifyJS' => TRUE, // TRUE, FALSE
                'center' => '36.85637728571459, 28.236321415098473',
                'zoom' => 16,
                'map_type' => 'HYBRID', // SATELLITE, TERRAIN, ROADMAP, HYBRID
                'disableNavigationControl' => FALSE, //TRUE, FALSE
                'disablePanControl' => TRUE, // TRUE, FALSE
                'disableScaleControl' => TRUE, // TRUE, FALSE
                'disableMapTypeControl' => TRUE, // TRUE, FALSE
                'disableStreetViewControl' => TRUE, // TRUE, FALSE
                'disableOverviewMapControl' => TRUE, // TRUE, FALSE
            ),
            'marker' => array(
                'position' => '36.85637728571459, 28.236321415098473',
                'icon' => $img_path,
                'info_window_title' => 'module_map_example_marker_title',
                'info_window_description' => 'module_map_example_marker_description'
            )
        ),
        'contact' => array(
            'options' => array(
                'minifyJS' => TRUE, // TRUE, FALSE
                'center' => '36.85637728571459, 28.236321415098473',
                'zoom' => 16,
                'map_type' => 'HYBRID', // SATELLITE, TERRAIN, ROADMAP, HYBRID
                'disableNavigationControl' => FALSE, //TRUE, FALSE
                'disablePanControl' => TRUE, // TRUE, FALSE
                'disableScaleControl' => TRUE, // TRUE, FALSE
                'disableMapTypeControl' => TRUE, // TRUE, FALSE
                'disableStreetViewControl' => TRUE, // TRUE, FALSE
                'disableOverviewMapControl' => TRUE, // TRUE, FALSE
            ),
            'markers' => array(
                1 => array(
                    'position' => '36.85637728571459, 28.236321415098473',
                    'icon' => $img_path,
                    'info_window_title' => 'module_map_example_marker_title',
                    'info_window_description' => 'module_map_example_marker_description'
                ),
                2 => array (
                    'position' => '36.85714774857287, 28.264565076025292',
                    'icon' => $img_path,
                    'info_window_title' => 'module_map_example_marker_title',
                    'info_window_description' => 'module_map_example_marker_description'
                )
            )
        )
    )

);

return $config['module']['map'];