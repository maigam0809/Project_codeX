<?php
    class Sliders extends Controller{
        private $slideModel;
        public function __construct()
        {
            $this->slideModel = $this->model('slideModel');
        }
        function index(){
        
            $this->be_content = "./mvc/views/backend/sliders/list.php";
            $sliders = $this->slideModel->getSlidepAll();
            // print_r($categories);
            $this->view('sliders/index',[
                'sliders' => $sliders,
                'message' => $this->message
            ]);
        }
        
        function create(){
            $session = new Session();

            $err = [
                'slider_name' => '',
                'slider_image' => ''
            ];
            extract($_REQUEST);

            if(isset($_POST['insert_slide'])){

                $sliderName = $this->slideModel->getSlideByName($slider_name);
               
                foreach ($sliderName as $item) {
                    if (strtoupper($slider_name) === strtoupper($item['slider_name'])) {
                        $err['slider_name'] = "Tên sliders này đã tồn tại";
            
                    }
                }
        
                if ($slider_name == '') {
                    $err['slider_name'] = "Mời bạn nhập slider!";
                }
                
                if ($_FILES['slider_image']['size'] > 0) {
            
                    if (
                        $_FILES['slider_image']['type'] == 'image/png' ||
                        $_FILES['slider_image']['type'] == 'image/jpg' ||
                        $_FILES['slider_image']['type'] == 'image/jpeg'
                    ) {
                        if ($_FILES['slider_image']['size'] > 0) {
                        $up_hinh = $this->save_file("slider_image", IMAGE_BE."/sliders/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : 'no picture';
                        } else {
                        $err['slider_image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
                        }
                    } else {
                        $err['slider_image'] = "Ảnh của bạn sai định dạng.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                    }
                    } else {

                    $err['slider_image'] = "Bạn chưa nhập ảnh";
                }
                
                if (!array_filter($err)) {
                
                    $this->slideModel->slide_insert($slider_name, $image, $created_at);
                    $message='Thêm thành công';
                    $session->setFlashSuccess($message);
                    header('Location: index');
                    exit();
                   
                }
                else{
                    $message='Thêm thất bại';
                    $session->setFlashError($message);
                    $this->be_content = "./mvc/views/backend/sliders/create.php";
                    $this->view('sliders/index',
                        [
                            'err' => $err
                        ]
                    );
                    
                }

               
            }
            $this->be_content = "./mvc/views/backend/sliders/create.php";
            $this->view('sliders/index',
                [
                    'message' => $this->message
                ]
            );
        }
        
        function update($id=0){
            $session = new Session();
        
            extract($_REQUEST);

            $err = [
                'slider_name' => '',
                'slider_image' => ''
            ];
            if(isset($_POST['slide_update'])){
                 $sql = "Select * from sliders where slider_id <> $id and slider_name like '$slider_name'";
                 $res = $this->slideModel->getBySql($sql);

                 if($res) {
                     $err['slider_name'] = "Đã tồn tại tên slide này.";
                 }

                 if ($slider_name == '') {
                    $err['slider_name'] = "Mời bạn nhập slider!";
                }
 
                 $image = '';
                 if ($_FILES['image']['size'] > 0) {
                     if (
                         $_FILES['image']['type'] == 'image/png' ||
                         $_FILES['image']['type'] == 'image/jpg' ||
                         $_FILES['image']['type'] == 'image/jpeg'
                     ) {
                        $up_hinh = $this->save_file("image", IMAGE_BE."/sliders/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : $slider_image;
                     } else {
                         $err['slider_image'] = "Ảnh của bạn sai định dạng.
                         <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                     }
                 }  else {
                     $image = $slider_image;
                 }
 
                 if(!array_filter($err)){

                    $this->slideModel->slide_update($slider_name, $image, $created_at, $id);
                    $message='Cập nhật thành công';
                    $session->setFlashSuccess($message);
                    header('Location:../index');
                    exit();
                
                 }else{
                    $message='Cập nhật thất bại';
                    $session->setFlashError($message);

                    $sliders = $this->slideModel->slide_select_by_id($id);
                    $this->be_content = VIEW_URL . "/backend/sliders/update.php";
                    $this->view("sliders/index",[
                        'sliders'=> $sliders,
                        'err'=> $err,
                    ]);
                  
                 }
            }

            $sliders = $this->slideModel->slide_select_by_id($id);
            $this->be_content = VIEW_URL . "/backend/sliders/update.php";
            $this->view("sliders/index",[
                'sliders'=> $sliders,
                'err'=> $err,
            ]);
        }


        function delete($id=0){
            $session = new Session();
        
            $this->slideModel->slide_delete($id);
            $message='Xoá thành công';
            $session->setFlashSuccess($message);
            header('Location:../index');
            exit();
            
        }


        function Show($a=0, $b=0){
        
        }
    }

?>