<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex05_use_library.php
    라이브러리 사용하기
*/
class Ex05_use_library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // 클래스 이름으로 라이브러리를 로드한다.
        // "/libraries/Helloworld.php"를 찾거나
        // "/libraries/Helloworld/Helloworld.php"를 찾는다.
        // ==> '$this->라이브러리이름(소문자)' 형태로 객체가 생성된다.
        $this->load->library('Helloworld');
    }
    
    public function index()
    {
        $this->helloworld->say_kor();
        $this->helloworld->say_eng();
    }
}