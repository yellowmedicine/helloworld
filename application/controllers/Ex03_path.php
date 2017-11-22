<?
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex03_path.php
    path 사용
*/
class Ex03_path extends CI_Controller 
{
    /*
        생성자, 컨트롤러가 사용할 기능들 로드
    */
    public function __construct()
    {
        parent::__construct();
        
        //필요한 헬퍼 로드
        $this->load->helper('path');
        $this->load->helper('util');
    }
    
    /*
        http://localhost/ex03_path/set_realpath
        >> php index.php ex03_path/set_realpath
    */
    public function set_realpath()
    {
    
        /* 존재여부를 검사할 경로 준비 */
        // --> "/index.php를 기준으로 하는 상대경로(OS기준의 절대경로도 가능)
        $path1 = "./test";      //존재하지 않는 경로
        $path2 = "./.htaccess";  //존재하는 경로
        
        /** 헬퍼 기능 사용 : 경로가 존재할 경우 절대경로를 리턴한다. */
        $check1 = set_realpath($path1);
        $check2 = set_realpath($path2);
        
        if($check1 === $path1) { // 파라미터와 리턴값이 동일하면 존재하지 않음
            debug($path1.'(이)가 존재하지 않습니다.'.PHP_EOL);
        } else {
            debug($path1.'(이)가 존재함. >> '.$check1.PHP_EOL);
        }
        
        if($check1 === $path2) { // 파라미터와 리턴값이 동일하면 존재하지 않음
            debug($path2.'(이)가 존재하지 않습니다.'.PHP_EOL);
        } else {
            debug($path2.'(이)가 존재함. >> '.$check2.PHP_EOL);
        }
        
    }
    
    /*
        http://localhost/ex03_path/set_realpath2
        php index.php ex03_path/set_realpath2
    */
    public function set_realpath2()
    {
        /* 존재여부를 검사할 경로 준비 */
        // --> "/index.php를 기준으로 하는 상대경로(OS기준의 절대경로도 가능)
        $path1 = "./test";      //존재하지 않는 경로
        $path2 = "./.htaccess";  //존재하는 경로
        
        /** 헬퍼 기능 사용 : 경로가 존재할 경우 절대경로를 리턴한다 */
        // 두 번째 파라미터가 TRUE인 경우 존재하지 않는 경로에 대해서 에러를 발생시킴
        $check1 = set_realpath($path1, TRUE);
        $check2 = set_realpath($path2, TRUE);
        
        debug($check1.PHP_EOF);
        debug($check2.PHP_EOF);
    }
}