<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        //화면에 출력하고자 하는 데이터
        $data = [
            'name' => '코드이그나이터',
            'message' => 'Hello World'
        ];
        
		$this->load->view('welcome_message', $data);
	}
    
    public function hello()
	{
        //화면에 출력하고자 하는 데이터
        $data = [
            'name' => '코드이그나이터',
            'message' => 'Hello World'
        ];
        
		$this->load->view('hello', $data);
	}
}
