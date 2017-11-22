<?
defined('BASEPATH') OR exit('No direct script access allowed');

// 1) 컨트롤러 클래스 작성시 첫 글자'만' 반드시 대문자.
// 2) 컨트롤러 클래스 이름과 파일이름은 반드시 일치.
// 3) 컨트롤러 클래스 CI_Controller를 반드시 상속받아야 함.
class Ex01_config extends CI_Controller 
{
 /*
  *생성자. 클래스가 초기화될 때 자동 실행됨.
  */
    public function __construct()
    {
        //상위 클래스의 생성자 호출 --> CI의 기본기능 초기화.
        parent::__construct();
    }
    
    /**
     *  http://localhost/ex01_config/show_all
     *  >>php index.php ex1_config/show_all
     */
    public function show_all()
    {
        // 환경설정 데이터 전체 배열 가져오기
        $config_data = $this->config->config;

        // 배열을 출력하기 좋게 문자열로 변환
        $str = print_r($config_data, TRUE);

        //출력 스택에 내용을 쌓음.
        //$this->output->append_output("<pre>");
        $this->output->append_output($str);
        //$this->output->append_output("</pre>");
    }
    
    /**
     *  http://localhost/ex01_config/show_item
     *  >>php index.php ex1_config/show_item
     */
    public function show_item()
    {
        //환경 설정 데이터에서 하나를 수정
        $this->config->set_item('base_url', 'http://itpaper.co.kr');
        
        //환경 설정 데이터에서 하나를 리턴
        //조회한 값이 없을 경우 FALSE가 리턴됨.
        $base_url = $this->config->item('base_url');
        
        $this->output->append_output($base_url);
    }
    
    /**
     *  http://localhost/ex01_config/custom_all
     *  >>php index.php ex1_config/custom_all
     */
    public function custom_all()
    {
        // 커스텀 환경설정 파일 읽기 (파일명을 파라미터로 설정)
        // --> site.php에 정의된 내용이 config.php의 내용에 병합됨.
        $this->load->config('site');
        
        // 전체 데이터 확인
        $config_data = $this->config->config;
        $str = print_r($config_data, TRUE);
        $this->output->append_output($str);
    }
    
    /**
     *  http://localhost/ex01_config/custom_item
     *  >>php index.php ex1_config/custom_item
     */
    public function custom_item()
    {
        // 커스텀 환경설정 파일 읽기 (파일명을 파라미터로 설정)
        $this->load->config('site');
        
        $company = $this->config->item('company');
        $tel = $this->config->item('tel');
        $address = $this->config->item('address');
        $this->output->append_output($company.PHP_EOL);
        $this->output->append_output($tel.PHP_EOL);
        $this->output->append_output($address.PHP_EOL);
        
        $info = $this->config->item('info');
        $str = print_r($info, TRUE);
        $this->output->append_output($str);
    }
}