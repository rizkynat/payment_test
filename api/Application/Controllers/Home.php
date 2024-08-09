<?php
require_once dirname(__DIR__, 3) . '/api/vendor/autoload.php';
use MVC\Controller;
use AditNanda\UnofficialBriva\Briva;

class ControllersHome extends Controller {

    public $cons_key, $cons_sec; 
    public $institution_code, $briva_no; 
    public $base_url = ''; 
    public function __construct()
    {
        $this->cons_key = "2YPEPhSDJEmiytnGY5ZxRebwbUZ4NRKt";    
        $this->cons_sec = "wwWMaSAbNXvxvdX5";    
        $this->institution_code = "J104408";    
        $this->briva_no = "77777";    
        $BRIVA_PRODUCTION = false; 
        if (!$BRIVA_PRODUCTION) {
            $this->base_url = 'https://sandbox.partner.api.bri.co.id/';
        }   else{
            $this->base_url = 'https://partner.api.bri.co.id/';

        }
    }

    public function customerCode() {
        
        $briva = new Briva();
        $array = [
            'custCode' => '16416516456'
        ];
        $result = $briva->BrivaRead($array);
        return $result;
    }
    public function store() {
        $briva = new Briva();
        $array = [
            'custCode' => '16416516456',
            'nama' => 'Aditya Nanda',
            'ammount' => '10000',
            'keterangan' => 'Test',
            'expiredDate' => '2017-09-10 09:57:26'
        ];
        return $briva->BrivaCreate($array);;
    }

    public function index() {

        // Connect to database
        $model = $this->model('home');

        // Read All Task
        $users = $model->getAllUser();

        // Prepare Data
        $data = ['data' => $users];

        // Send Response
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }

    public function post() {

        if ($this->request->getMethod() == "POST") {
            // Connect to database
            $model = $this->model('home');

            // Read All Task
            $users = $model->getAllUser();

            // Prepare Data
            $data = ['data' => $users];

            // Send Response
            $this->response->sendStatus(200);
            $this->response->setContent($data);
        }
    }

    public function uploadImage() {
        if(isset($this->request->files['image'])){
            $image = $this->request->files['image'];
            $errors = array();

            // File info
            $file_name = $image['name'];
            $file_size = $image['size'];
            $file_tmp = $image['tmp_name'];
            $file_type = $image['type'];

            // Get file extension
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            
            // White list extensions
            $extensions = array("jpeg","jpg","png");
            
            // Check it's valid file for upload
            if(in_array($file_ext, $extensions) === false) {
               $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
            }
            
            // Check file size
            if($file_size > 2097152) {
               $errors[] = 'File size must be exactly 2 MB';
            }
            
            if(empty($errors) == true) {
               move_uploaded_file($file_tmp, UPLOAD . "Images/" . $file_name);
               echo "Success";
            } else {
               print_r($errors);
            }
         }
    }
}
