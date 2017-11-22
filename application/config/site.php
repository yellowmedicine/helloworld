<?
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 ------------------------------------------------------------------
 /application/config/site.php
 커스텀 환경 설정 파일
 
 */

//case1 : 1차배열인 경우
$config['company'] = '귀염둥';
$config['tel'] = '070-1234-2345';
$config['address'] = '서울시 양천구 목5동';

//case2 : 2차배열인 경우
$config['info'] = [
    'name' => 'itpaper',
    'tel' => '070) 7890-7890',
    'address' => 'seoul, korea'
];