<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*-----------------------------------------
 | /helpers/util_helper.php
 | 사용자가 정의한 함수들을 모아 놓은 파일
 | 헬퍼 파일은 원하는 만큼 생성 가능하다.
 | 파일이름 뒤에는 항상 '_helper' 가 붙여 있어야 한다.
 |-----------------------------------------*/

if (!function_exists('debug'))
{
	function debug($value, $title='debug')
	{
		 $content = print_r($value, true);

		 // 현재 컨트롤러 객체의 참조
		 $CI = &get_instance();

		 // 명령어 기반 실행인지 검사.
		 if ($CI->input->is_cli_request()) {
		 	$CI->output->append_output("[".$title."] ");
		 	$CI->output->append_output($content.PHP_EOL);
		 } else {
	        $html = "<fieldset class='debug' style='padding: 15px; margin: 10px; border: 1px solid #bce8f1; border-radius: 4px;color: #31708f; background-color: #d9edf7; word-break: break-all; '><legend style='padding: 5px 15px; border: 1px solid #bce8f1; background-color: #fff; font-weight: bold'>".$title."</legend><pre style='margin-bottom: 0px; margin-top: 5px; padding: 0; border:0; background: none; white-space: pre-wrap;'>".htmlspecialchars($content)."</pre></fieldset>";

		 	$CI->output->append_output("<div>".PHP_EOL);
		 	$CI->output->append_output($html.PHP_EOL);
		 	$CI->output->append_output("</div>".PHP_EOL);
		 }
	}
}
//<?
//defined('BASEPATH') OR exit('No direct script access allowed');
//
///*
//    /helpers/util_helper.php
//    사용자가 정의한 함수들을 모아 놓은 파일
//    헬퍼 파일은 원하는 만큼 생성 가능합니다.
//    파일이름 뒤에는 항상 '_helper' 가 붙어 있어야 한다.
//    */
//
//if (!function_exists('debug'))
//{
//    function debug($value){
//        $content = print_r($value, true);
//        
//        //현재 컨트롤러 객체의 참조
//        $CI = &get_instance();
//        $CI->output->append_output($content);
//    }
//}