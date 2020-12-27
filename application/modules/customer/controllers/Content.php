<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Content extends Admin_Controller
{
    protected $permissionCreate = 'Customer.Content.Create';
    protected $permissionDelete = 'Customer.Content.Delete';
    protected $permissionEdit   = 'Customer.Content.Edit';
    protected $permissionView   = 'Customer.Content.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth->restrict($this->permissionView);
        $this->load->model('customer/customer_model');
        $this->lang->load('customer');
        $this->form_validation->set_error_delimiters("<span class='text-danger'>", "</span>");

        Template::set_block('sub_nav', 'content/_sub_nav');
        Assets::add_module_js('customer', 'customer.js');
    }

    /**
     * Display a list of Customer data.
     *
     * @return void
     */
    public function index($offset = 0)
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
                    $deleted = $this->customer_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('customer_delete_success'), 'success');
                } else {
                    Template::set_message(lang('customer_delete_failure') . $this->customer_model->error, 'danger');
                }
            }
        }
        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/content/customer/index') . '/';

        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $this->pager['base_url']    = $pagerBaseUrl;
        $this->pager['total_rows']  = $this->customer_model->count_all();
        $this->pager['per_page']    = $limit;
        $this->pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($this->pager);
        $this->customer_model->limit($limit, $offset);

        $records = $this->customer_model->find_all_by(array('deleted' => false));
        Template::set('records', $records);

        Template::set('toolbar_title', lang('customer_manage'));
        Template::render();
    }

    /**
     * Create a Customer object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);

        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_customer()) {
                log_activity($this->auth->user_id(), lang('customer_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'customer');
                Template::set_message(lang('customer_create_success'), 'success');

                redirect(SITE_AREA . '/content/customer');
            }

            // Not validation error
            if (!empty($this->customer_model->error)) {
                Template::set_message(lang('customer_create_failure') . $this->customer_model->error, 'danger');
            }
        }

        Template::set('toolbar_title', lang('customer_action_create')); 
        Template::render();
    }
    /**
     * Allows editing of Customer data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('customer_invalid_id'), 'danger');

            redirect(SITE_AREA . '/content/customer');
        }

        if (isset($_POST['save'])) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_customer('update', $id)) {
                log_activity($this->auth->user_id(), lang('customer_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'customer');
                Template::set_message(lang('customer_edit_success'), 'success');
                redirect(SITE_AREA . '/content/customer');
            }

            // Not validation error
            if (!empty($this->customer_model->error)) {
                Template::set_message(lang('customer_edit_failure') . $this->customer_model->error, 'danger');
            }
        } elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->customer_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('customer_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'customer');
                Template::set_message(lang('customer_delete_success'), 'success');

                redirect(SITE_AREA . '/content/customer');
            }

            Template::set_message(lang('customer_delete_failure') . $this->customer_model->error, 'danger');
        }

        $customer = $this->customer_model->find_by(array('id' => $id, 'deleted' => false));
        if (!$customer) {
            Template::set_message(lang('customer_invalid_id'), 'danger');
            redirect(SITE_AREA . '/content/customer');
        }
        Template::set('customer', $customer);

        Template::set('toolbar_title', lang('customer_edit_heading'));
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
    private function save_customer($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->customer_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want

        $data = $this->customer_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method


        $return = false;
        if ($type == 'insert') {
            $id = $this->customer_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->customer_model->update($id, $data);
        }

        return $return;
    }
}
