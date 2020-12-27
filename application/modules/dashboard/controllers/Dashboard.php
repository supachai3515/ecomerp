<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Dashboard extends Admin_Controller
{
    protected $permissionView   = 'Site.Dashboard.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->lang->load('dashboard');
        
        $this->form_validation->set_error_delimiters("<span class='danger'>", "</span>");
        
        //Template::set_block('sub_nav', '_sub_nav');
        Assets::add_js('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js');
    }

    /**
     * Display a list of Dashboard data.
     *
     * @return void
     */
    public function index()
    {
        
        Template::set('toolbar_title', lang('dashboard_manage'));
        Template::render();
    }


}