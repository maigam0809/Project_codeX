<?php

class login extends Controller
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

        // unset($_SESSION['user_password']);

        $message = '';
        $err =[
            ''
        ];

        if (isset($_POST['btn_dn'])) {
            extract($_REQUEST);
            
               $user= $this->userModel->getUserAll_by_username($user_email);
                if ($user != false) {
                    if ($user[0]["user_password"] == $user_password) {
                        // var_dump($user[0]["user_password"]);
                        // var_dump($user_password);
                        // var_dump($_SESSION['email_user']);
                        // var_dump($_SESSION['rand']);
                        // die;
                        $message = "Đăng nhập thành công!";
                        unset($_SESSION['email_user']);
                        unset($_SESSION['rand']);

                        $_SESSION["user"] = $user;          
                        header("location:".BASE_URL."/home");
                    } else {
                        $message = "Mật khẩu sai !";
                      
                    }
                } 
                else {
                    $message = 'Tên đăng nhập hoặc mật khẩu sai!';
                   
                }
                $session->setFlashError($message);
        }



        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $this->fe_content = VIEW_URL."/frontend/sites/login.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $info = $this->infoModel->getInfoAll();
        $this->view_fe('main/index', [
            'categories'=>$categories,
            'slides'=>$slides,
            'info'=>$info,
            'message' => $message
        ]);
    }


    function reset_pass(){
        $session = new Session();
        $message = '';
        if (isset($_POST['btn_reset'])) {
            extract($_REQUEST);
            
               $user= $this->userModel->getUserAll_by_username($email);
                if ($user != false) {
                    echo"<pre>";
                    var_dump($user[0]["user_password"]);
                    echo"</pre>";
                } 
                else {
                    $message = 'email không tồn tại!';
                    $session->setFlashError($message);
                    header("location:".BASE_URL."/login");
                }
                
        
            
            
        }
        


        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $this->fe_content = VIEW_URL."/frontend/sites/login.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $info = $this->infoModel->getInfoAll();
        $this->view_fe('main/index', [
            'categories'=>$categories,
            'slides'=>$slides,
            'info'=>$info,
            'message' => $message
        ]);
    }
}
?>