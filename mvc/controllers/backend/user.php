<?php
class User extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('userModel'); //goi ham model ben controller
    }
    function index()
    {
        $this->be_content = "./mvc/views/backend/user/list.php";
        $user = $this->userModel->getUserAll();
        $this->view('user/index', [
            'user' => $user
        ]);
    }

    function create()
    {
        $session = new Session();
        $message = '';
        $err = [
            'user_name' => '',
             'user_image' => '',
             'user_email' => '',
             'user_password' => '',
             'user_phone' => '',
             'user_address' => ''
        ];

        $pattern = ['user_name' => '',
            'user_phone' => '',
            'user_password' => '',
            'user_email' => '',
        ];

        if (isset($_POST['btn-users'])) {
            extract($_REQUEST);
            $pattern['user_name'] = "/^[a-z0-9_]{3,30}$/i";
            $pattern['user_email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
            $pattern['user_phone'] = "/^[0]{1}[0-9]{9,10}$/i";
            $pattern['user_password'] = "/^[a-z0-9]{6,}$/i";

            $userEmail = $this->userModel->getUserByName($user_email);

            foreach ($userEmail as $item) {
                if (strtoupper($user_email) === strtoupper($item['user_email'])) {
                    $err['user_email'] = "Tên email này đã tồn tại";
                }
            }

            if (empty($user_name)){
                $err['user_name'] = "Mời nhập họ và tên";
            } else if (preg_match($pattern['user_name'], $user_name) == 0) {
                $err['user_name'] = "ký tự a-z A-Z 0-9 và gạch dưới
                , tối thiểu 5 ký tự, tối đa 30 ký tự";
            }
            
            
            
            if (empty($user_email)) {
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

            if ($user_address == "") {
                $err['user_address'] = "Mời nhập địa chỉ";
            }
            
            if ($user_phone == "") {
                $err['user_phone'] = "Mời nhập số điện thoại";
            } else if (preg_match($pattern['user_phone'], $user_phone) == 0) {
                $err['user_phone'] = "Nhập số điện thoại không đúng";
            }
            
            if ($_FILES['user_image']['size'] > 0) {
                if (
                  $_FILES['user_image']['type'] == 'image/png' ||
                  $_FILES['user_image']['type'] == 'image/jpg' ||
                  $_FILES['user_image']['type'] == 'image/jpeg'
                ) {
                  if ($_FILES['user_image']['size'] > 0) {
                    $up_hinh = $this->save_file("user_image", IMAGE_BE . "/user/");
                    $user_image = strlen($up_hinh) > 0 ? $up_hinh : 'No picture';
                  } else {
                    $err['user_image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
                  }
                } else {
                  $err['user_image'] = "Ảnh của bạn sai định dạng.
                    <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                }
              } else {
                $err['user_image'] = "Bạn chưa nhập ảnh";
            }

            if (!array_filter($err)) {
                $this->userModel->user_insert($user_name, $user_image, $user_email, $user_password, $user_address, $role, $created_at, $user_phone);
                $message='Thêm thành công';
                $session->setFlashSuccess($message);
                header('Location: index');
                exit();
            }
            else{
                $message='Thêm thất bại';
                $session->setFlashError($message);
                $this->be_content = "./mvc/views/backend/user/create.php";
                $this->view(
                    'user/index',
                    [
                        'err' => $err,
                    ]
                );
            }
            

        }
        $this->be_content = "./mvc/views/backend/user/create.php";

        $this->view(
            'user/index',
            ['err' => $err]
        );
    }

    function update($id)
    {

        $message = '';
        $err = [
            'user_name' => '',
            'image' => '',
            'user_email' => '',
            'user_password' => '',
            'user_phone' => '',
            'user_address' => ''

        ];
        $session = new Session();
        $pattern = [
            'user_name' => '',
            'user_phone' => '',
            'user_password' => '',
            'user_email' => ''
        ];
        if (isset($_POST['btn-users'])) {
            extract($_REQUEST);
            $pattern['user_name'] = "/^[a-z0-9_]{3,30}$/i";
            $pattern['user_email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
            $pattern['user_phone'] = "/^[0]{1}[0-9]{9,10}$/i";
            $pattern['user_password'] = "/^[a-z0-9]{6,}$/i";

            $sql = "Select * from users where user_id <> $id and user_email like '$user_email'";
            $res = $this->userModel->getBySql($sql);
            if($res) {
                $err['user_email'] = "Đã tồn tại địa chỉ email này.";
            }

            if (empty($user_name)){
                $err['user_name'] = "Mời nhập họ và tên";
            } else if (preg_match($pattern['user_name'], $user_name) == 0) {
                $err['user_name'] = "ký tự a-z A-Z 0-9 và gạch dưới
                , tối thiểu 5 ký tự, tối đa 30 ký tự";
            }
            
            
            
            if (empty($user_email)) {
                $err['user_email'] = "Mời nhập email";

            } else if (preg_match($pattern['user_email'], $user_email) == 0) {
                $err['user_email'] = "Nhap email ko dung dinh dạng . Mời nhập email có gmail.com";

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

            if ($user_address == "") {
                $err['user_address'] = "Mời nhập địa chỉ";
            }
            
            if ($user_phone == "") {
                $err['user_phone'] = "Mời nhập số điện thoại";
            } else if (preg_match($pattern['user_phone'], $user_phone) == 0) {
                $err['user_phone'] = "Nhập số điện thoại không đúng";
            }

            $image = '';
            if ($_FILES['image']['size'] > 0) {
                if (
                    $_FILES['image']['type'] == 'image/png' ||
                    $_FILES['image']['type'] == 'image/jpg' ||
                    $_FILES['image']['type'] == 'image/jpeg'
                ) {
                    $up_hinh = $this->save_file("image", IMAGE_BE . "/user/");
                    $user_image = strlen($up_hinh) > 0 ? $up_hinh : $user_image;
                } else {
                    $err['user_image'] = "Ảnh của bạn sai định dạng.
                    <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                }
            }  else {
                $image = $user_image;
            }

            if(!array_filter($err)){
                $this->userModel->getUserUpdate_by_id($user_id,$user_name,$user_image, $user_email,$user_password, $user_address, $role, $created_at, $user_phone,$updated_at);
                $message='Cập nhật thành công';
                $session->setFlashSuccess($message);
                header('Location:../index');
                exit();
            }else{
                $message='Cập nhật thất bại';
                $session->setFlashError($message);
                $this->be_content = "./mvc/views/backend/user/edit.php";
                $user = $this->userModel->getUserAll_by_id($id);
                $this->view('user/index', [
                    'user' => $user,
                    'err' => $err
                ]);
            }
        }


        $this->be_content = "./mvc/views/backend/user/edit.php";
        $user = $this->userModel->getUserAll_by_id($id);
        $this->view('user/index', [
            'user' => $user, 'message' => $message
        ]);
    }

    function details($id)
    {
        $this->be_content = "./mvc/views/backend/user/detail.php";
        $user = $this->userModel->getUserAll_by_id($id);
        $this->view('user/index', [
            'user' => $user
        ]);
    }
    function delete($id)
    {
        $session = new Session();
        $this->userModel->getUserDelete_by_id($id);
        $message = 'Xóa user thành công';
        $session->setFlashSuccess($message);
        header("location:" . BASE_URL . "/admin/user/index");
        exit();
    }
}