<?
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex02_use_helper.php
    사용자 정의 함수(=helper) 사용법
*/
class Ex02_use_helper extends CI_Controller 
{
    public function __construct()
    {
        // 전체 기능 초기화
        parent::__construct();
        
        //환경설정 데이터나 내장기능(헬퍼,라이브러리,모델) 로드
        $this->load->helper('util');
    }
    
    /*
    http://localhost/ex02_use_helper
    >>php index.php ex02_use_helper
    --> 함수 이름이 index인 경우 URL로 접근시 함수이름 생략 가능.
    */
    public function index()
    {
        //util_helper에 정의된 함수 호출
        $message = "Hello Codeigniter";
        debug($message);
    }
}