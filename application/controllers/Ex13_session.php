<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex13_session.php
    세션
*/

class Ex13_session extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Session');
    }
    
    public function index()
    {
        //저장되어 있는 세션값 읽어오기
        $username = $this->session->userdata('username');
        
        // 세션값을 view에 전달하기
        $data = new stdClass();
        $data->username = $username;
        
        $this->load->view('ex13_session/index', $data);
    }
    
    /*
        post 파라미터를 전달받은 후 입력값에 따라
        세션을 생성, 삭제하고 다시 index로 돌아간다.
        http://localhost/ex13_session/result
    */
    
    public function result()
    {
        //사용자의 입력값 받기
        $username = $this->input->post('username');
        
        if ($username) {
            /*
                1) 입력값이 있다면 세션 저장하기
                파라미터 설정 값 --> $key, $value
                $this->session->set_userdata("username", $username);
                
                세션 저장시 다음과 같이 배열로 구성 후 한번에 저장도 가능합
                $ses_data = ['username' => $username];
                $this->session->set_userdata($ses_data);
            */
            
            $this->session->set_userdata("username", $username);
            
//            $ses_data = new stdClass();
//            $ses_data->username = $username;
//            $this->session->set_userdata($ses_data);
        } else {
            /*
                2)입력값이 없다면 세션 삭제하기
                키 이름에 따른 개별 삭제
                $this->session->unset_userdata('username');
                
                현재 사용자에 대한 전체 삭제
            */
            $this->session->sess_destroy();
        }
        
        // URL 헬퍼에 내장된 함수를 사용하여 페이지 이동
        // --> config.php 설정파일에 base_url 값을 반드시 지정해야함.
        redirect('/ex13_session');
    }
}