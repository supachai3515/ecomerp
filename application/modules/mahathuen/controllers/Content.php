<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Content extends Admin_Controller
{
    protected $permissionCreate = 'Mahathuen.Content.Create';
    protected $permissionDelete = 'Mahathuen.Content.Delete';
    protected $permissionEdit   = 'Mahathuen.Content.Edit';
    protected $permissionView   = 'Mahathuen.Content.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth->restrict($this->permissionView);
        $this->lang->load('mahathuen');

        $this->form_validation->set_error_delimiters("<span class='text-danger'>", "</span>");

        Template::set_block('sub_nav', 'content/_sub_nav');

        Assets::add_module_js('mahathuen', 'mahathuen.js');
    }

    /**
     * Display a list of Mahathuen data.
     *
     * @return void
     */
    public function index()
    {


        Template::set('toolbar_title', lang('mahathuen_manage'));
        Template::render();
    }

    /**
     * Create a Mahathuen object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);


        Template::set('toolbar_title', lang('mahathuen_action_create'));

        Template::render();
    }
    /**
     * Allows editing of Mahathuen data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('mahathuen_invalid_id'), 'danger');

            redirect(SITE_AREA . '/content/mahathuen');
        }




        Template::set('toolbar_title', lang('mahathuen_edit_heading'));
        Template::render();
    }
}
