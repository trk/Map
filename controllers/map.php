<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends My_Module
{
	/**
	 * Constructor
	 *
	 * config_item('key') is available in modules,
	 * as parent::__construct adds module's config elements to config object
	 *
	 */
	public function __construct()
	{
		parent::__construct();

	}


	/**
	 * Main display done through the module's tags
	 * See : libraries/tags.php
	 *
	 */
	public function index()
	{
		print "Map module default controller output";
	}
}