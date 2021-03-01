<?php

class contact extends Controller
{
    private $cateModel;
    private $slideModel;
    private $infoModel;
    private $userModel;
    private $contactModel;
    public function __construct()
    {
        $this->cateModel = $this->model('cateModel');
        $this->slideModel = $this->model('slideModel');
        $this->infoModel = $this->model('infoModel');
        $this->userModel = $this->model('userModel');
        $this->contactModel = $this->model('contactModel');
    }

    function index()
    {
        $message = "";
        extract($_REQUEST);
        if (isset($_POST["btn_email"])) {
            extract($_REQUEST);
            $contact_status = 0;
            // name , email, contact
            $this->contactModel->contact_insert($name, $email, $contact, $contact_create_at, $contact_status);
            $content = "
            <p><strong>Kh&aacute;ch h&agrave;ng :</strong> " . $name . "</p>

            <p><strong>Nội dung :</strong></p>
            
            <p>" . $contact . "</p>";

                if($this->contactModel->message == 'flase'){

                    $this->message='Gửi thất bại';
                    
                }else{
                    $this->message = 'Gửi thành công';
                }

            if ($email != "dunvph10007@fpt.edu.vn") {
                $email = 'dunvph10007@fpt.edu.vn';
            }
             $this->sentEmail('dunvph10007@fpt.edu.vn', $content, $email, '', '', 'Liên hệ');

        }
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $info = $this->infoModel->getInfoAll();
        $this->fe_content = VIEW_URL . "/frontend/sites/contact.php";
        $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'categories' => $categories,
            'slides' => $slides,
            'info' => $info,
            'message'=>$this->message
        ]);
    }
}
