<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Tools extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->input->is_cli_request()
            or exit("Execute via command line -> php index.php tools");

        error_reporting(-1);
        ini_set('display_errors', 1);

        $this->load->helper('date_helper');
        $this->load->database();
    }

    public function index()
    {

        $this->load->helper(array('date_helper'));

        echo "now: " . user_time(now(), "UTC", 'M j, y g:i A');
        echo PHP_EOL;

        echo "ตี 1: " . user_time("18:00", "Asia/Bangkok", 'M j, y g:i A'); // ต้องการ run crontab ทุกๆ ตี 1 ต้องกำหนดเป็น UTC 18:00

        echo PHP_EOL;
        $today = user_time(now(), "Asia/Bangkok", 'M j, y g:i A');
        echo $today;
        echo PHP_EOL;
    }
}
