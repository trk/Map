<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Module Admin controller
 *
 */
class Map extends Module_Admin
{
    /**
     * Default Model Name
     *
     * @var string
     */
    protected $default_model = 'map_model';

    /**
     * Controller URL
     *
     * @var string (with admin url)
     */
    protected $controller_url;

    /**
     * Controller View Folder
     *
     * @var string
     */
    protected $controller_folder = 'admin/map/';


	/**
	 * Constructor
	 *
	 * @access  public
	 * @return  void
	 */
	public function construct()
	{
        // Load Needed Models
        $this->load->model($this->default_model, '', TRUE);

        // Set Controller URL
        $this->controller_url = admin_url() . 'module/map/';
	}


	/**
	 * Admin panel
	 * Called from the modules list.
	 *
	 * @access  public
	 * @return  parsed view
	 *
	 */
	public function index()
	{
        $mapConfig = Modules()->get_module_config("map");

        $this->template['options'] = $mapConfig['maps']['default']['options'];
        $this->template['marker'] = $mapConfig['maps']['default']['marker'];

        $this->template = array(
            'center' => '36.85637728571459, 28.236321415098473',
            'marker_position' => '36.85637728571459, 28.236321415098473',
            'height' => '500px',
            'width' => '100%',
            'zoom' => 16,
            'map_type' => 'ROADMAP',
            'disableZoomControl' => 0,
            'disableNavigationControl' => 1,
            'disablePanControl' => 0,
            'disableScaleControl' => 1,
            'disableMapTypeControl' => 1,
            'disableStreetViewControl' => 1,
            'disableOverviewMapControl' => 0
        );

		$this->output($this->controller_folder . 'index');
	}
}