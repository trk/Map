<?php

class Map_Tags extends TagManager
{

	public static $tag_definitions = array
	(
//		'map:show' => 'tag_show'
	);


	/**
	 * Base module tag
	 * Loads and renders views/index.php
	 * which is the base view of the module.
	 * lang/get_select contains the main module's DOM container
	 * All further content load will be done through Ajax, by calling the
	 * byzantin2 controller.
	 *
	 * @usage	<ion:map >
	 *			...
	 *			</ion:map>
	 *
	 */
	public static function index(FTL_Binding $tag)
	{
        $name = $tag->getAttribute('name');
        $width = $tag->getAttribute('width');
        $height = $tag->getAttribute('height');
//        $lat = $tag->getAttribute('lat');
//        $lng = $tag->getAttribute('lng');

        // Model load
        self::load_model('map_model', 'map_model');

        $map = self::$ci->map_model->get_map($name, $width, $height);

        if($map['js'] != FALSE && $map['html'] != FALSE)
            return $map['js'].$map['html'];

		return '';
	}
}
