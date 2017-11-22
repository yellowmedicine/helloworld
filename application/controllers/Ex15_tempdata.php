<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex15_temp.php
    지정된 시간동안 유효한 세션
*/

class Ex15_tempdata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Session');
    }
    
    /*
        post 파라미터를 전달하기 위한 페이지
        http://localhost/ex15_tempdata
    */
    public function index()
    {
        //저장되어 있는 flash 데이터 값 읽어오기
        $temp_input = $this->session->tempdata('temp_input');
        
        // 혹은 세션과 동일하게 읽을 수 있음.
        //$temp_input = $this->session->userdata('temp_input');
        
        //세션값을 View에 전달하기
        $data = new stdClass();
        $data->temp_input = $temp_input;
        
        $this->load->view('ex15_tempdata/index', $data);
    }
    
    /*
        post 파라미터를 전달 받은 후 입력값에 따라
        세션을 생성, 삭제하고 다시 index로 돌아간다.
        http://localhost/ex14_flashdata/result
    */
    public function result()
    {
        //사용자의 입력값 받기
        $temp_input = $this->input->post('temp_input');
        
        if($temp_input) {
            // 기존의 세션을 10초간 유지되는 temp 데이터로 변환하기
            // $this->session->set_userdata("temp_input", $temp_input);
            // $this->session->mark_as_temp('temp_input', 10);
            
            // 처음부터 10초간 유지되는 temp 데이터로 만들기
            $this->session->set_tempdata("temp_input", $temp_input, 10);
        }
        
        // URL헬퍼에 내장된 함수를 사용하여 페이지 이동
        // --> config.php 설정파일에 base_url 값을 반드시 지정해야 함.
        redirect('/ex15_tempdata');
    }
}