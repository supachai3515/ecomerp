<?php defined('BASEPATH') || exit('No direct script access allowed');

class BF_Log extends CI_Log
{

    /**
	 * Predefined logging levels
	 * Adding custom log level to $_levels
     * 
	 * @var array
	 */
    protected $_levels = array('ERROR' => 1, 'DEBUG' => 2, 'INFO' => 3, 'ALL' => 4, 'VANSALES' => 5);


    public function __construct()
    {
        parent::__construct();
    }

    /**
	 * Format the log line.
	 *
	 * This is for extensibility of log formatting
	 * If you want to change the log format, extend the CI_Log class and override this method
	 *
	 * @param	string	$level 	The error level
	 * @param	string	$date 	Formatted date string
	 * @param	string	$message 	The log message
	 * @return	string	Formatted log line with a new line character '\n' at the end
	 */
	protected function _format_line($level, $date, $message)
	{
        
        if(isset($_SERVER["REQUEST_METHOD"])){
            $message .= ' ' . $_SERVER["REQUEST_METHOD"];
        }

        if(isset($_SERVER["REMOTE_ADDR"])){
            $message .= ' ' . $_SERVER["REMOTE_ADDR"];
        }

		return $level.' - '.$date.' --> '.$message."\n";
	}
}