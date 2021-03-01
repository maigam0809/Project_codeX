<?php
class info_user extends Controller
{
    private $cateModel;
    private $infoModel;
    private $slideModel;
    private $userModel;
    public function __construct()
    {
        $this->cateModel = $this->model('cateModel');
        $this->infoModel = $this->model('infoModel');
        $this->slideModel = $this->model('slideModel');
        $this->userModel = $this->model('userModel');
    }

    function index($id)
    {
        if (isset($_SESSION['user'])) {

            $message = '';
            $err = [
                'user_name' => '',
                'image' => '',
                'user_email' => '',
                'user_phone' => '',
                'user_address' => ''
    
            ];
            $session = new Session();
            $pattern = ['user_name' => '', 'user_phone' => '', 'user_email' => ''];

            if (isset($_POST['btn-users'])) {
                $user = $this->userModel->getUserAll();
                extract($_REQUEST);
                $pattern['user_name'] = "/([^\d]*)\s([^\d]*)/i";
                $pattern['user_email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
                $pattern['user_phone'] = "/^[0]{1}[0-9]{9,10}$/i";
    
                if (empty($user_name)) {
                    $err['user_name'] = 'Tên không được bỏ trống';
                }
                if (preg_match($pattern['user_name'], $user_name) == 0) {
                    $err['user_name'] = "nhap ten ko dung";
                }
                if (
                    $_FILES['image']['type'] != '' &&
                    $_FILES['image']['type'] != 'image/jpg' &&
                    $_FILES['image']['type'] != 'image/png' &&
                    $_FILES['image']['type'] != 'image/jpeg'
                ) {
                    $err['image'] = " Hệ thống không hỗ trợ file, mời chọn lại ";
                }
                if ($_FILES['image']['size'] > 2097152) {
                    $err['image'] = " Ảnh kích thước không quá 2mb";
                }
                if ($user_email == "") {
                    $err['user_email'] = "Mời nhập email";
                }
                if (preg_match($pattern['user_email'], $user_email) == 0) {
                    $err['user_email'] = "Nhap email ko dung";
                }                
                if ($user_address == "") {
                    $err['user_address'] = "Mời nhập dịa chỉ";
                }
                if ($user_phone == "") {
                    $err['user_phone'] = "Mời nhập số điện thoại";
                }
                if (preg_match($pattern['user_phone'], $user_phone) == 0) {
                    $err['user_phone'] = "Nhập số điện thoại không đúng";
                }
    
                if (array_filter($err)) {
                    $message = 'Sửa that bai';
                    $session->setFlashError($message);
                    // luu error form
                    $session->setFormState($_REQUEST);
                    $session->setFormError($err);
                    $info = $this->infoModel->getInfoAll();
                    $categories = $this->cateModel->getCateAll();
                    $slides = $this->slideModel->getSlidepAll();
                    $user = $this->userModel->getUserAll_by_id($id);
                    $this->fe_content = VIEW_URL . "/frontend/sites/info_user.php";
                    $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
                    $this->view_fe('main/index', [
                        'info' => $info,
                        'categories' => $categories,
                        'user' => $user,
                        'slides' => $slides,
                        'err' => $err
                    ]);
                    exit;
                } else {
                    $up_hinh = $this->save_file("image", IMAGE_BE . "/user/");
                    $user_image = strlen($up_hinh) > 0 ? $up_hinh : $user_image;
    
                    $this->userModel->getUserUpdate_by_id2($user_id, $user_name, $user_image, $user_email, $user_address,$user_phone, $updated_at);
    
                    if ($this->userModel->message == 'flase') {
                        $message = 'Sửa that bai';
                        $session->setFlashError($message);
                        // luu error form
                        $session->setFormState($_REQUEST);
                        $session->setFormError($err);
                        $info = $this->infoModel->getInfoAll();
                        $categories = $this->cateModel->getCateAll();
                        $slides = $this->slideModel->getSlidepAll();
                        $user = $this->userModel->getUserAll_by_id($id);
                        $this->fe_content = VIEW_URL . "/frontend/sites/info_user.php";
                        $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
                        $this->view_fe('main/index', [
                            'info' => $info,
                            'categories' => $categories,
                            'user' => $user,
                            'slides' => $slides,
                            'err' => $err
                        ]);
                        exit;
                    } else {
                        $message = 'Sửa user thành công';                      
                        header("location:" . BASE_URL . "/logout");
                        exit();
                    }
                }
            }








            $info = $this->infoModel->getInfoAll();
            $categories = $this->cateModel->getCateAll();
            $slides = $this->slideModel->getSlidepAll();
            $user = $this->userModel->getUserAll_by_id($id);
            $this->fe_content = VIEW_URL . "/frontend/sites/info_user.php";
            $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
            $this->view_fe('main/index', [
                'info' => $info,
                'categories' => $categories,
                'user' => $user,
                'slides' => $slides
            ]);
        }
        
        
        
        else {
            header("location:" . BASE_URL . "/home");
            exit();
        }
    }
}
