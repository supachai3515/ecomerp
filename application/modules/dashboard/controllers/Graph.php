<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Graph extends Admin_Controller
{
    
    protected $permissionView   = 'Site.Dashboard.Graph';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->auth->restrict($this->permissionView);
        
    }


    public function index()
    {
        
        require APPPATH . 'third_party/phpgraphlib/phpgraphlib.php';
        include('graph/goldbread.php');
        // include('graph/example2.php');

    }
}