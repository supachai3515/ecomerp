<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Developer controller
 */
class Developer extends Admin_Controller
{
    protected $permissionCreate = 'Api.Developer.Create';
    protected $permissionDelete = 'Api.Developer.Delete';
    protected $permissionEdit   = 'Api.Developer.Edit';
    protected $permissionView   = 'Api.Developer.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth->restrict($this->permissionView);
        $this->load->model('api/api_model');
        $this->lang->load('api');

        $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");

        Template::set_block('sub_nav', 'developer/_sub_nav');
        Assets::add_module_js('api', 'api.js');
    }

    /**
     * Display a list of Api data.
     *
     * @return void
     */
    public function index()
    {
        // Deleting anything?
        if (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);
            $checked = $this->input->post('checked');
            if (is_array($checked) && count($checked)) {

                // If any of the deletions fail, set the result to false, so
                // failure message is set if any of the attempts fail, not just
                // the last attempt

                $result = true;
                foreach ($checked as $pid) {
                    $deleted = $this->api_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('api_delete_success'), 'success');
                } else {
                    Template::set_message(lang('api_delete_failure') . $this->api_model->error, 'danger');
                }
            }
        }



        $records = $this->api_model->find_all_by( array('deleted' => false) );
        Template::set('records', $records);

        Template::set('toolbar_title', lang('api_manage'));
        Template::render();
    }

    /**
     * Create a Api object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);

        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_api()) {
                log_activity($this->auth->user_id(), lang('api_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'api');
                Template::set_message(lang('api_create_success'), 'success');

                redirect(SITE_AREA . '/developer/api');
            }

            // Not validation error
            if (!empty($this->api_model->error)) {
                Template::set_message(lang('api_create_failure') . $this->api_model->error, 'danger');
            }
        }


        Template::set(
            'auth',
            array(
                'user_id' => $this->auth->user_id()
            )
        );

        Template::set('ipaddress', $this->input->ip_address());
        Template::set('generate_key', $this->api_model->_generate_key());
        Template::set('toolbar_title', lang('api_action_create'));

        Template::render();
    }
    /**
     * Allows editing of Api data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('api_invalid_id'), 'danger');

            redirect(SITE_AREA . '/developer/api');
        }

        if (isset($_POST['save'])) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_api('update', $id)) {
                log_activity($this->auth->user_id(), lang('api_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'api');
                Template::set_message(lang('api_edit_success'), 'success');
                redirect(SITE_AREA . '/developer/api');
            }

            // Not validation error
            if (!empty($this->api_model->error)) {
                Template::set_message(lang('api_edit_failure') . $this->api_model->error, 'danger');
            }
        } elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->api_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('api_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'api');
                Template::set_message(lang('api_delete_success'), 'success');

                redirect(SITE_AREA . '/developer/api');
            }

            Template::set_message(lang('api_delete_failure') . $this->api_model->error, 'danger');
        }

        Template::set('api', $this->api_model->find($id));

        Template::set('toolbar_title', lang('api_edit_heading'));
        Template::render();
    }

    //--------------------------------------------------------------------------
    // !PRIVATE METHODS
    //--------------------------------------------------------------------------

    /**
     * Save the data.
     *
     * @param string $type Either 'insert' or 'update'.
     * @param int    $id   The ID of the record to update, ignored on inserts.
     *
     * @return boolean|integer An ID for successful inserts, true for successful
     * updates, else false.
     */
    private function save_api($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->api_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want

        $data = $this->api_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method


        $return = false;
        if ($type == 'insert') {
            $id = $this->api_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->api_model->update($id, $data);
        }

        return $return;
    }
}
