<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map_model extends Base_model
{
	/**
	 * Model Constructor
	 *
	 * @access	public
	 */
	public function __construct()
	{
		parent::__construct();
	}

    function get_map($name=NULL,$width=NULL,$height=NULL) {

        $this->load->library('googlemaps');

        $height = (! is_null($height)) ? $height : '400px';
        $width = (! is_null($width)) ? $width : '100%';

        $mapConfig = Modules()->get_module_config("map");

        if(! is_null($name) && isset($mapConfig['maps'][$name])){

            $map = $mapConfig['maps'][$name];
            $mapOptions = $mapConfig['maps'][$name]['options'];
            $mapMarker = $mapConfig['maps'][$name]['markers'];


            log_message('ERROR', 'NAME => ' . $name . ' WIDTH => '. $width . ' HEIGHT => ' . $height);

            $config = array(
                'minifyJS' => $mapOptions['minifyJS'],
                'map_height' => $height,
                'map_width' => $width,
                'center' => $mapOptions['center'],
                'zoom' => $mapOptions['zoom'],
                'map_type' => $mapOptions['map_type'],
                'disableNavigationControl' => $mapOptions['disableNavigationControl'],
                'disablePanControl' => $mapOptions['disablePanControl'],
                'disableScaleControl' => $mapOptions['disableScaleControl'],
                'disableMapTypeControl' => $mapOptions['disableMapTypeControl'],
                'disableStreetViewControl' => $mapOptions['disableStreetViewControl'],
                'disableOverviewMapControl' => $mapOptions['disableOverviewMapControl']
            );

            $marker = array();

            if(is_array($mapMarker))
            {
                foreach($mapMarker as $mMarker) {
                    if($mMarker['icon'] != '')
                        $marker['icon'] = theme_url() . $mMarker['icon'];

                    $marker['position'] = $mMarker['position'];

                    if(!empty($mMarker['info_window_title']) && !empty($mMarker['info_window_description']))
                        $marker['infowindow_content'] = "<div class='map_info_window'><h2>" . lang($mMarker['info_window_title']) . "</h2><p>" . lang($mMarker['info_window_description']) . "</p></div>";

                    $this->googlemaps->add_marker($marker);
                }
            }
            else {
                if($mapMarker['icon'] != ''){
                    $marker['icon'] = theme_url() . $mapMarker['icon'];
                }
                $marker['position'] = $mapMarker['position'];

                if(!empty($mapMarker['info_window_title']) && !empty($mapMarker['info_window_description'])){
                    $marker['infowindow_content'] = "<div class='map_info_window'><h2>" . lang($mapMarker['info_window_title']) . "</h2><p>" . lang($mapMarker['info_window_description']) . "</p></div>";
                }

                $this->googlemaps->add_marker($marker);
            }

            $this->googlemaps->initialize($config);

            return $this->googlemaps->create_map();

        } else {

            $settings  =   self::get_settings();

            $map_config = array(
                'minifyJS' => TRUE,
                'map_height' => ($settings['height'] != '') ? $settings['height'] : $height,
                'map_width' => ($settings['width'] != '') ? $settings['width'] : $width,
                'center' => $settings['default_marker_position'],
                'zoom' => $settings['zoom_level'],
                'map_type' => $settings['map_type'],
                'disableNavigationControl' => ($settings['zoom_control'] == 'true') ? FALSE : TRUE,
                'disablePanControl' => ($settings['pan_control'] == 'true') ?  FALSE : TRUE,
                'disableScaleControl' => ($settings['scale_control'] == 'true') ?  FALSE : TRUE,
                'disableMapTypeControl' => ($settings['map_type_control'] == 'true') ?  FALSE : TRUE,
                'disableStreetViewControl' => ($settings['street_view_control'] == 'true') ? FALSE : TRUE,
                'disableOverviewMapControl' => ($settings['overview_map_control'] == 'true') ? FALSE : TRUE
            );

            $marker = array();

            // Set marker position
            $marker['position'] = $settings['default_marker_position'];

            // Prepare info Window
            if(! empty($settings['title']) && ! empty($settings['description']))
                $marker['infowindow_content'] = "<div class='map_info_window'><h2>" . $settings['title']['content'] . "</h2><p>" . $settings['description']['content'] . "</p></div>";

            // Adding Marker Position and Settings
            $this->googlemaps->add_marker($marker);

            $this->googlemaps->initialize($map_config);

            return $this->googlemaps->create_map();
        }
    }
}

