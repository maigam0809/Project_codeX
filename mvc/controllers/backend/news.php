<?php

class News extends Controller
{
    private $newModel;
    public function __construct()
    {
        $this->newModel = $this->model('newModel');
    }
    public function index()
    {   
        $this->be_content = VIEW_URL . "/backend/news/list.php";
        $news = $this->newModel->getNewAll();
        $this->view('categories/index', [
            'news' => $news,
            'message' => $this->message,
        ]);
    }

    public function create(){   
        $session = new Session();

        $err =[
            'new_name'=>'',
            'new_image' => '',
            'new_detail' => '',
            'new_description'=>''

        ];
     
        
        if (isset($_POST['news'])) {
extract($_REQUEST);
$new_description=trim($new_description);
    $e=explode(' ', $new_description);
    // đếm mảng
     $count=count($e);
     if ($new_name=="") {
        $err['new_name'] = "Nhập tiêu đề ";
      }
     if ($new_description=="") {
        $err['new_description'] = "Nhập mô tả ";
      }
      if ($count<25) {
        $err['new_description'] = "Nhập mô tả $count/25 ký tự, không đủ ký tự";
      }
    if ($count>50) {
        $err['new_description'] = "Nhập mô tả $count/50 ký tự, quá số ký tự";
      }
            if (empty($new_detail)) {
                $err['new_detail'] = "Nhập chi tiết cho tin tức";
                
            }
            if ($_FILES['new_image']['size'] > 0) {
                if (
                    $_FILES['new_image']['type'] === 'image/jpg'||
                    $_FILES['new_image']['type'] === 'image/png'||
                    $_FILES['new_image']['type'] === 'image/jpeg'
                ) {

                    if ($_FILES['new_image']['size'] > 2097152) {
                        $err['new_image'] = " Ảnh kích thước không quá 2mb";
                    }
                } else {
                    $err['new_image'] = " Hệ thống không hỗ trợ file, mời chọn lại ";
                }
            } else {
                $err['new_image'] = " Mời chọn ảnh";
            }
           

            if (!array_filter($err)) {
                $up_hinh = $this->save_file("new_image", IMAGE_BE . "/new/");
                $image = strlen($up_hinh) > 0 ? $up_hinh : 'no picture';

                $this->newModel-> new_insert($new_name, $image, $new_description, $new_detail, $created_at);
                $message='Thêm loại hàng thành công';
                $session->setFlashSuccess($message);
                header('Location: index');
                exit();
                
            }
            else{
                $message='Thêm loại hàng thất bại';
                $session->setFlashError($message);
                $this->be_content = VIEW_URL . "/backend/news/create.php";
                $this->view(
                    'news/index',
                    [
                        'err' => $err
                    ]
                );
                
            }
        }
       

        $this->be_content = VIEW_URL . "/backend/news/create.php";
        $this->view(
            'news/index',
            [
            ]
        );
    }
    
    function update($id=0){
        $session = new Session();
        extract($_REQUEST);
        $err = [
            'new_description'=>'',
            'new_image' => '',
            'new_detail' => ''
        ];

        if(isset($_POST['news_update'])){

            $image = '';
            $new_description=trim($new_description);
    $e=explode(' ', $new_description);
     $count=count($e);

     if ($new_name=="") {
        $err['new_name'] = "Nhập tiêu đề ";
      }
     if ($new_description=="") {
        $err['new_description'] = "Nhập mô tả ";
      }
      if ($count<25) {
        $err['new_description'] = "Nhập mô tả $count/25 ký tự, không đủ ký tự";
      }
    if ($count>50) {
        $err['new_description'] = "Nhập mô tả $count/50 ký tự, quá số ký tự";
      }
            // ví dụ như nó không upfile thì cái đoạn code này nó khong chạy tương đương với xóa  đoạn này đi
            if ($_FILES['image']['size'] > 0) {
                if (
                    $_FILES['image']['type'] == 'image/png' ||
                    $_FILES['image']['type'] == 'image/jpg' ||
                    $_FILES['image']['type'] == 'image/jpeg'
                ) {
                    $up_hinh = $this->save_file("image", IMAGE_BE."/categories/");
                    $image = strlen($up_hinh) > 0 ? $up_hinh : $new_image;
                } else {
                    $err['new_image'] = "Ảnh của bạn sai định dạng.
                    <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                }
            }  else {
                $image = $new_image;
            }
            if (empty($new_detail)) {
                $err['new_detail'] = "Nhập chi tiết cho tin tức";
                
            }
            if(!array_filter($err)){
                $this->newModel->new_update($new_name, $image, $new_description, $new_detail, $created_at, $id);
                
                $message='Cập nhật thành công';
                $session->setFlashSuccess($message);
                header('Location:../index');
                exit();
              
            }else{
                $message='Cập nhật thất bại';
                $session->setFlashError($message);
                $news = $this->newModel->new_select_by_id($id);
                $this->be_content = VIEW_URL . "/backend/news/update.php";
                $this->view("news/index",[
                    'news'=>$news,
                    'err'=> $err
                ]);
            }

        }

        $news = $this->newModel->new_select_by_id($id);
        $this->be_content = VIEW_URL . "/backend/news/update.php";
        $this->view("news/index",[
            'news'=>$news
        ]);
    }

    public function delete($id = 0){
        $session = new Session();
        $this->newModel->new_delete($id);
        
        $message='Xoá thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
      
    }
}
