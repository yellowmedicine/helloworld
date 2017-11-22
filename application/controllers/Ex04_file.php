<?
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    /controllers/Ex04_file.php
    path 헬퍼 사용
*/
class Ex04_file extends CI_Controller
{
    /*
        생성자, 컨트롤러가 사용할 기능들 로드
    */
    public function __construct()
    {
        parent::__construct();
        
        // 필요한 헬퍼 로드
        $this->load->helper('file');
        //$this->load->helper('path');
        $this->load->helper('directory');
        $this->load->helper('util');
    }
    
    /*
        file 헬퍼 기능 예제 01 - 파일 저장하기
        http://localhost/ex04_file/make_file
        >>php index.php ex04_file/make_file
    */
    public function make_file()
    {
        $filename = time().".txt";      // 저장할 파일의 이름
        $dir = "./files";               // 파일이 저장될 폴더
        $filepath = $dir."/".$filename; // 저장할 파일 경로
        
        // (php) 폴더가 없다면 생성한다.
        if (!is_dir($dir)) {
            mkdir($dir, true);
        }
        
        // (helper) 파일에 내용 저장하기
        $result = write_file($filepath, "코드이그나이터 파일 저장 예제");
        
        if($result) {
            //$this->output->append_output('<h1>파일 저장함 ::: '.$filepath.'</h1>');
            debug("파일 저장함 ::: ".$filepath, "result");
        }else {
            //$this->output->append_output('<h1>파일 저장 실패함</h1>');
            debug("파일 저장 실패함", "result");
        }
        
        //(php) 저장된 파일의 내용 읽어오기 --> 파일이 없을 경우 FALSE 리턴됨.
        $contents = file_get_contents($filepath);
        debug($contents, "file_get_contents");
        
        //(helper) 저장된 파일의 정보 가져오기 --> 파일이 없을 경우 FALSE 리턴됨.
        $info = get_file_info($filepath);
        debug($info, "get_file_info");
        
        //(helper) 파일의 mimetype 가져오기
        $type = get_mime_by_extension($filepath);
        debug($type, "get_mime_by_extension");
    }
    
    /*
        file 헬퍼 기능 예제 02 - 지정된 폴더 내의 모든 파일에 대한 정보조회
        http://localhost/ex04_file/get_info
        >>php index.php ex04_file/get_info
    */
    public function get_info()
    {
        $dir = "./files";
        
        // 이 폴더 안의 파일들의 이름을 가져오기(하위폴더까지 모두 탐색한다)
        // --> 조회할 경로, 절대경로 조회여부
        $files = get_filenames($dir, FALSE);
        debug($files, "get_filenames");
        
        //이 폴더 안의 파일 절대경로를 가져오기(하위폴더까지 모두 탐색한다)
        $files = get_filenames($dir, TRUE);
        debug($files, "get_filenames");
        
        //이 폴더 안의 모든 파일들의 상세정보 조회하기
        // --> 조회할 경로, 1depth만 사용할 경우(TRUE=기본값)
        $info = get_dir_file_info($dir, TRUE);
        debug($info, "get_dir_file_info");
    }
    /*
        file 헬퍼 기능 예제 03 - 지정된 폴더 내의 모든 파일 삭제
        http://localhost/ex04_file/delete
        >> php index.php ex04_file/delete
    */
    public function delete()
    {
        $dir = "./files";
        
        // 지정된 폴더내의 모든 항목들을 삭제
        // >> 두 번째 파라미터가 TRUE인 경우 폴더까지 모두 삭제.
        // >> FALSE인 경우 폴더는 남겨두고 삭제. (기본값 FALSE)
        $ok = delete_files($dir, TRUE);
        
        if($ok){
            debug("삭제완료");
        }else{
            debug("삭제실패");
        }
    }
    
    /*
        file 헬퍼 기능 예제 04 - 디렉토리 트리 조회
        http://localhost/ex04_file/dir
        >> php index.php ex04_file/dir
    */
    public function dir()
    {
        // 지정된 경로의 하위 요소들을 배열로 구성하여 리턴한다.
        // -->두 번째 파라미터는 출력할 depth(숫자)
        //    0(혹은 false)이거나 생략할 경우 전체 depth를 출력함.
        //    기본값 = false
        // -->세번째 파라미터는 true인 경우 숨김파일을 포함함
        //    기본값=false
        $map = directory_map('./', false, true);
        debug($map);
    }
}
?>