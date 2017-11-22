<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex07_email.php
    이메일 라이브러리 활용
*/

class Ex07_email extends CI_Controller
{
    // 생성자, 컨트롤러가 사용할 기능들 로드
    public function __construct()
    {
        parent::__construct();
        
        // 필요한 라이브러리 로드하기
        $this->load->library('Email');
        //email.php 설정파일을 읽어서 config.php의 내용에 병합.
        $this->config->load('email');
        $this->load->helper('util');
    }
    
    /*
        메일 내용 작성 페이지
        http://localhost/ex07_email
    */
    public function index()
    {
        // (1) 환경 설정정보에서 이메일 관련 값만 추출\
        $mail_config = $this->config->item('email');
        
        // (2) 발송정보 구성
        $sender_addr    =$mail_config['smtp_user'];
        $sender_name    ='관리자';
        $receiver_addr  ='';
        $receiver_name  ='사이트회원님';
        $subject        ='메일 제목입니다.';
        $content        ='<h1>메일의 내용 입니다.</h1><p>HTML태그 가능합니다.</p>';
        
        // (3) 받는 사람 주소 재구성
        if($receiver_name) {
            // 이름과 메일주소가 함께 있는 경우
            // --> 김수환 <pastelcream326@gmail.com>
            $receiver_addr = sprintf("%s <%s>", $receiver_name, $receiver_addr);
        }
        
        // (4) 메일 발송 설정
        // 메일 발송 라이브러리에 환경설정 정보 전달
        $this->email->initialize($mail_config);
        // 메일 발송 초기화 (줄바꿈 규칙 설정, 이전 발송 내용 삭제)
        $this->email->set_newline("\r\n");
        $this->email->clear();
        
        // (5) 메일 보내기
        $this->email->from($sender_addr, $sender_name);     //발신자 주소+이름(이름생략가능)
        $this->email->to($receiver_addr);                   //수신자주소 (배열로 복수지정 가능)
        $this->email->reply_to($sender_addr,$sender_name);  //답장 받을 사람(생략가능)
        $this->email->subject($subject);                    //제목
        $this->email->message($content);                    //내용
        
        // 발송 후 결과값 받기
        $result = $this->email->send();
        debug($result ? "발송성공" : "발송실패", "발송결과");
        
        // 디버그 메시지 사용하기(테스트용)
        debug($this->email->print_debugger());
    }
}