<?php

class Info_shop extends Controller
{

    private $infoModel;
    public function __construct()
    {
        $this->infoModel = $this->model('infoModel');
    }

    function index(){  
        $this->be_content = VIEW_URL . "/backend/info_shop/list.php";
        $infos = $this->infoModel->getInfoAll();
        $this->view('info_shop/index',[
            'infos' => $infos,
            'message' => $this->message
        ]);
    }

    function update($id=0){
        $session = new Session();
        $err = [
            'info_name' => '',
            'info_detail' => '',
            'info_email' => '',
            'info_adress' => '',
            'info_phone' => ''

        ];
        
        extract($_REQUEST);

        if(isset($_POST['info_update'])){

            $pattern['info_email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
            $pattern['info_phone'] = "/^[0]{1}[0-9]{9,10}$/i";

            if(empty($info_name)){
              $err['info_name']='Mời nhập tên cửa hàng';
            }

            $sql = "Select * from info_shop where info_id <> $id and info_email like '$info_email'";
            $res = $this->infoModel->getBySql($sql);
            if($res) {
                $err['info_email'] = "đã tồn tại email này.";
            }


            if (empty($info_email)) {
              $err['info_email'] = "Bạn hãy nhập địa chỉ email";

            } else if (preg_match($pattern['info_email'], $info_email) == 0) {
                $err['info_email'] = "Bạn nhập email không đúng";

            }
            
            
            if (empty($info_adress)) {
                $err['info_adress'] = "Mời nhập địa chỉ";
            }


            if (empty($info_phone)) {
                $err['info_phone'] = "Mời nhập số điện thoại";
            } else if (preg_match($pattern['info_phone'], $info_phone) == 0) {
                $err['info_phone'] = "Số điện thoại không đúng đinh dạng";
            }
            
            if ($info_detail == "") {
                $err['info_detail'] = "Mời nhập thông tin chi tiết";
            }


            if(!array_filter($err)){
                $this->infoModel->info_update($info_name, $info_detail, $info_email, $info_adress, $info_phone, $id);
                $message='Cập nhật thành công';
                $session->setFlashSuccess($message);
                header('Location:../index');
                exit();

            }else{
                
                $message='Cập nhật thất bại';
                $session->setFlashError($message);
                $info = $this->infoModel->info_select_by_id($id);
                $this->be_content = VIEW_URL . "/backend/info_shop/update.php";
                $this->view("info_shop/index", [
                    'info' => $info,
                    'err'=>$err
                ]);
            }
        }
        $info = $this->infoModel->info_select_by_id($id);
        $this->be_content = VIEW_URL . "/backend/info_shop/update.php";
        $this->view("info_shop/index", [
            'info' => $info,
        ]);
    }
}
?>
