<?php defined('BASEPATH') || exit('No direct script access allowed');

class Rest_auth
{

    private $ci;
    public $user = null;
    public $token = null;
    public $response_message = null;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('users/user_model');  
        $this->ci->load->model('api/api_model');  
        $this->ci->load->library('users/auth');  
        
        log_message('info', 'RESTful Auth class initialized.');
    }


    public function process_login($login, $password, $application)
    {

        if (empty($login) || empty($password)) {
            return false;
        }

        // Grab the user from the db.
        $selects = array(
            'id',
            'email',
            'username',
            'users.role_id',
            'users.deleted',
            'users.active',
            'banned',
            'ban_message',
            'password_hash',
            'force_password_reset'
        );

        $this->ci->user_model->select($selects);
        if ($this->ci->settings_lib->item('auth.login_type') == 'both') {
            $user = $this->ci->user_model->find_by(
                array('username' => $login, 'email' => $login),
                null,
                'or'
            );
        } else {
            $user = $this->ci->user_model->find_by(
                $this->ci->settings_lib->item('auth.login_type'),
                $login
            );
        }

        // Check whether the username, email, or password doesn't exist.
        if ($user == false) {
            $this->response_message = lang('us_bad_email_pass');
            log_message('error', lang('us_bad_email_pass'));
            return false;
        }

        // Check whether the account has been activated.
        if ($user->active == 0) {
            $activation_type = $this->ci->settings_lib->item('auth.user_activation_method');
            if ($activation_type > 0) {
                if ($activation_type == 1) {
                    $this->response_message = lang('us_account_not_active');
                    log_message('error', lang('us_account_not_active'));
                } elseif ($activation_type == 2) {
                    $this->response_message = lang('us_admin_approval_pending');
                    log_message('error', lang('us_admin_approval_pending'));
                }

                return false;
            }
        }

        // Check whether the account has been soft deleted. The >= 1 check ensures
        // this will still work if the deleted field is a UNIX timestamp.
        if ($user->deleted >= 1) {
            log_message('error',
                sprintf(
                    lang('us_account_deleted'),
                    html_escape($this->ci->settings_lib->item('site.system_email'))
                ));
            return false;
        }

        // Try password
        if (! $this->ci->auth->check_password($password, $user->password_hash)) {
            // Bad password
            $this->response_message = lang('us_bad_email_pass');
            log_message('error', lang('us_bad_email_pass'));
            //$this->ci->auth->increase_login_attempts($login, 'us_bad_email_pass');

            return false;
        }

        // Check whether the account has been banned.
        if ($user->banned) {
            //$this->increase_login_attempts($login, 'us_banned_admin_note');
            $this->response_message = $user->ban_message ? $user->ban_message : lang('us_banned_msg');
            log_message('error', 
                $user->ban_message ? $user->ban_message : lang('us_banned_msg'));
            return false;
        }

        //// Generate & save token into database
        //// then Return API Key 
        $token_key = $this->ci->api_model->_generate_key();
        
        // RESTFul Level
        // https://developers.redhat.com/blog/2017/09/13/know-how-restful-your-api-is-an-overview-of-the-richardson-maturity-model/
        $token_data = array(
            'user_id' => $user->id,
            'company_id' => $user->company_id,
            'level' => 3, 
            'created_on' => date("Y-m-d H:i:s"),
            'created_by' => $user->id,
            'application' => $application,
        );
        $this->ci->api_model->_delete_user_keys($user->id, $application);
        $this->ci->api_model->_insert_key($token_key, $token_data);

        $this->token = $token_key;
        $this->user = $user;
        
        return true;
    }
}