<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ex17_thumbnail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->config->load('upload');      // 업로드 설정정보 (폴더경로 얻기 위함)
        $this->config->load('thumbnail');   // 썸네일 설정정보
        $this->load->helper('util');        // 유틸 헬퍼(debug()함수 사용 위함)
        $this->load->helper('url');          // URL 헬퍼(base_url() 함수 사용 위함)
        $this->load->helper('file');        // 파일 헬퍼(업로드 폴더의 파일목록 조회)
        $this->load->library('image_lib');  // 썸네일 생성 라이브러리
    }
    
    public function index()
    {
        // 전체 환경 설정 정보에서 썸네일 관련 정보만 추출
        $config = $this->config->item('thumbnail');
        
        // 썸네일이 생성될 폴더가 없다면 생성한다.
        if(!is_dir($config['new_image'])) {
            mkdir($config['new_image'], 0777, true);
            chmod($config['new_image'], 0777);
        }
        
        // 전체 환경 설정 정보에서 파일이 저장되어 있는 디렉토리 경로만 추출
        $upload_config = $this->config->item('upload');
        $dir = $upload_config['upload_path'];
        
        // 디렉토리의 파일 정보들을 추출한다.
        // --> 두 번째 파라미터 TRUE: 절대경로 리턴.
        // --> FALSE : 파일명만 리턴
        $files = get_filenames($dir, TRUE);
        
        debug($files);
        
        foreach ($files as $key => $item) {
            //설정정보에 원본파일 경로 추가
//            $config['source_image'] = $dir."/".$item;
            $config['source_image'] = $item;
            
//            //썸네일이 저장될 경로 추가
//            $config['new_image'] = $dir.'/thumb/'.$item;
            
            //설정 정보를 라이브러리에 로드시킴
            $this->image_lib->initialize($config);
            
            //이미지 리사이즈(성공시 true, 실패시 false)
            $result = $this->image_lib->resize();
            
            if(!$result) {
                debug($this->image_lib->display_errors());
            } else {
                debug("썸네일 생성 성공", $item);
            }
        }
    }
    
//    public function result()
//    {
//        
//    }
}