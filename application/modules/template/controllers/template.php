<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MY_Controller {


	 function home($data){
        $this->load->view('home_view', $data);
    }
	

    function member($data){
       // Modules::run('secure_tings/ni_admin');
        $this->load->view('member_view',$data);
    }

	function manager($data){
       // Modules::run('secure_tings/ni_admin');
        $this->load->view('manager_view',$data);

    }

    function admin($data){
       // Modules::run('secure_tings/ni_admin');
        $this->load->view('admin_view',$data);
    }

   function homepage(){
       // Modules::run('secure_tings/ni_admin');
        $this->load->view('homepage');
    }

    function redirect($type)
	{
		return $this->m_template->get_redirect($type);
	}


}

