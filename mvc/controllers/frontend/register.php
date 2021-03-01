<?php

class register extends Controller
{   
    private $cateModel;
    private $slideModel;
    private $infoModel;
    private $userModel;

        public function __construct()
        {
            $this->cateModel = $this->model('cateModel');
            $this->slideModel = $this->model('slideModel');
            $this->infoModel = $this->model('infoModel');
            $this->userModel = $this->model('userModel');
        }

    function index(){
        $session = new Session();
        $role=0;

        $err = [
            'user_name' => '',
            'user_password' => '',
            'user_password2' => '',
            'user_email' => ''
        ];


        if (isset($_POST['btn-users'])) {
            extract($_REQUEST);
            $pattern['user_name'] = "/^[a-z0-9_]{3,30}$/i";
            $pattern['user_email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
            $pattern['user_password'] = "/^[a-z0-9]{6,}$/i";

            if ($user_name == "") {
                $err['user_name'] = "Mời nhập username";
            } else if (preg_match($pattern['user_name'], $user_name) == 0) {
                $err['user_name'] = "Nhập định dạng : maigam";
            }

            $userEmail = $this->userModel->getUserByName($user_email);

            foreach ($userEmail as $item) {
                if (strtoupper($user_email) === strtoupper($item['user_email'])) {
                    $err['user_email'] = "Tên email này đã tồn tại. Hãy lấy địa chỉ email khác.";
                }
            }
            
            if ($user_email == "") {
                $err['user_email'] = "Mời nhập email";
            } else if (preg_match($pattern['user_email'], $user_email) == 0) {
                $err['user_email'] = "Nhap email ko dung";
            } 
            
            if (empty($user_password)) {
                $err['user_password'] = "Bạn chưa nhập password.";
            }
            elseif (strlen($user_password) <= '6') {
                $err['user_password'] = "Mật khẩu phải chứa ít nhất 6 kí tự!";
            }
            elseif(!preg_match("#[0-9]+#",$user_password)) {
                $err['user_password'] = "Mật khẩu phải chứa ít nhất một số !";
            }
            elseif(!preg_match("#[A-Z]+#",$user_password)) {
                $err['user_password'] = "Mật khẩu phải chứa ít nhất một chữ hoa";
            }
            elseif(!preg_match("#[a-z]+#",$user_password)) {
                $err['user_password'] = "Mật khẩu phải chưa ít nhất một chữ thường!";
            }

            if (empty($user_password2)) {
                $err['user_password2'] = "Bạn chưa nhập lại password.";
            }elseif($user_password2 != $user_password){
                $err['user_password2'] = "Nhập lại mật khẩu không khớp";
            }


            if (!array_filter($err)) {
                $this->userModel->user_insert_dk($user_name, $user_email, $user_password, $role, $created_at);
                $message='Đăng ký thành công';
                $session->setFlashSuccess($message);

            }else{
                $message='Đăng ký thất bại';
                $session->setFlashError($message);
                $categories = $this->cateModel->getCateAll();
                $slides = $this->slideModel->getSlidepAll();
                $this->fe_content = VIEW_URL."/frontend/sites/register.php";
                $this->menu = VIEW_URL."/frontend/layout/menu2.php";
                $info = $this->infoModel->getInfoAll();
                $this->view_fe('main/index', [
                    'categories'=>$categories,
                    'slides'=>$slides,
                    'info'=>$info,
                    'err' => $err
                ]);
            }
        }
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $this->fe_content = VIEW_URL."/frontend/sites/register.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $info = $this->infoModel->getInfoAll();
        $this->view_fe('main/index', [
            'categories'=>$categories,
            'slides'=>$slides,
            'info'=>$info,
        ]);
    }
}
?>