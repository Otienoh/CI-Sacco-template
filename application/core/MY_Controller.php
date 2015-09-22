<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//error_reporting(0);
class MY_Controller extends MX_Controller{
    function __construct() {
        parent::__construct();
        
    }

    	function send_email($email,$subject, $message)
	{
		$time=date('Y-m-d');
		
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => "chrisrichrads@gmail.com",
			'smtp_pass' => "joshuaSUN"
			);
		// echo $email."<pre>";print_r($config);die();
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('chrisrichrads@gmail.com', 'SACCO MANAGEMENT SYSTEM');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->set_mailtype("html");
		
		
		if($this->email->send())
			{	
				// $this->admin_model->store_sent_email($recipient, $subject, $message, $time);
				// $this->load->view('students_view');
				print "Email sent";
				
			} else 
			{
				show_error($this->email->print_debugger());
			}
	}

	public static function truncateStringWords($str, $maxlen=32)
	{
	    if (strlen($str) <= $maxlen) return $str;

	    $newstr = substr($str, 0, $maxlen);
	    if (substr($newstr, -1, 1) != ' ') $newstr = substr($newstr, 0, strrpos($newstr, " "));

	    return $newstr;
	}


}
