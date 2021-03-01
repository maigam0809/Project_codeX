<?php
    class Category extends Controller{
        private $cateModel;
        public function __construct()
        {
            $this->cateModel = $this->model('cateModel');
        }
        
        function index(){
            $this->be_content = "./mvc/views/backend/categories/list.php";
            $categories = $this->cateModel->getCateAll();
            $this->view('categories/index',[
                'categories' => $categories,
            ]);
        }
        
        function create(){
            $session = new Session();

            
            $err = [
                'cate_name' => '',
                'cate_image' => ''
            ];

            extract($_REQUEST);

            if(isset($_POST['cate'])){
                
                $cateName = $this->cateModel->getCateByName($cate_name);
                foreach ($cateName as $item) {
                    if (strtoupper($cate_name) === strtoupper($item['cate_name'])) {
                        $err['cate_name'] = "Tên loại đã tồn tại";
                    }
                }

                $pattern['cate_name'] = "/([^\d]*)\s([^\d]*)/i";
        
                if (trim($cate_name) == '') {
                    $err['cate_name'] = "Mời bạn nhập loại hàng !";
                }elseif(preg_match($pattern['cate_name'], $cate_name) == 0){
                    $err['cate_name'] = "Loại hàng phải chứa ít nhất hai từ trở lên ";

                }
                
                if ($_FILES['cate_image']['size'] > 0) {
           
                    if (
                      $_FILES['cate_image']['type'] == 'image/png' ||
                      $_FILES['cate_image']['type'] == 'image/jpg' ||
                      $_FILES['cate_image']['type'] == 'image/jpeg'
                    ) {
                      if ($_FILES['cate_image']['size'] > 0) {
                        $up_hinh = $this->save_file("cate_image", IMAGE_BE."/categories/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : 'no picture';
                      } else {
                        $err['cate_image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
                      }
                    } else {
                      $err['cate_image'] = "Ảnh của bạn sai định dạng.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                    }
                  } else {
                    $err['cate_image'] = "Bạn chưa nhập ảnh";
                }
            

                if (!array_filter($err)) {

                    $this->cateModel->cate_insert($cate_name, $image, $created_at);
                    $message='Thêm loại hàng thành công';
                    $session->setFlashSuccess($message);
                    header('Location: index');
                    exit();
                   
                }
                else{
                    $message='Thêm loại hàng thất bại';
                    $session->setFlashError($message);
                    $this->be_content = "./mvc/views/backend/categories/create.php";
           
                    $this->view('categories/index',
                        [
                            'err' => $err
                        ]
                    );
                    
                }
            }
           
            $this->be_content = "./mvc/views/backend/categories/create.php";
           
            $this->view('categories/index',
                [
                 
                ]
            );
        }
        
        
        function update($id=0){
            $session = new Session();
            
            // $this->checklogin_admin();
            $err =[
                'cate_name' => '',
                'cate_image' => ''
            ];
            extract($_REQUEST);
            if(isset($_POST['cate_update'])){

                $pattern['cate_name'] = "/([^\d]*)\s([^\d]*)/i";
        
                if (trim($cate_name) == '') {
                    $err['cate_name'] = "Không được để trống loại hàng!";
                }elseif(preg_match($pattern['cate_name'], $cate_name) == 0){
                    $err['cate_name'] = "Loại hàng phải chứa ít nhất hai từ trở lên.";
                }

                // tim nhung loai khac voi id hien tai ma co ten giong cate_name
                $sql = "Select * from categories where cate_id <> $id and cate_name like '$cate_name'";
                $res = $this->cateModel->getBySql($sql);
                if($res) {
                    $err['cate_name'] = "Đã tồn tại loại này .";
                }

                $image = '';
                // ví dụ như nó không upfile thì cái đoạn code này nó khong chạy tương đương với xóa  đoạn này đi
                if ($_FILES['image']['size'] > 0) {
                    if (
                        $_FILES['image']['type'] == 'image/png' ||
                        $_FILES['image']['type'] == 'image/jpg' ||
                        $_FILES['image']['type'] == 'image/jpeg'
                    ) {
                        $up_hinh = $this->save_file("image", IMAGE_BE."/categories/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : $cate_image;
                    } else {
                        $err['cate_image'] = "Ảnh của bạn sai định dạng.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                    }
                }  else {
                    $image = $cate_image;
                }

                if(!array_filter($err)){
                    $this->cateModel->cate_update($cate_name, $image, $created_at, $id);
                    $message='Cập nhật loại hàng thành công';
                    $session->setFlashSuccess($message);
                    header('Location:../index');
                    exit();

                }else{
                    
                    $message='Cập nhật loại hàng thất bại';
                    $session->setFlashError($message);

                    $category = $this->cateModel->cate_select_by_id($id);
                    $this->be_content = VIEW_URL . "/backend/categories/update.php";
                    $this->view("categories/index",[
                        'category'=>$category,
                        'err' => $err,
                    ]);

                }
            }
            $category = $this->cateModel->cate_select_by_id($id);
            $this->be_content = VIEW_URL . "/backend/categories/update.php";
            $this->view("categories/index",[
                'category'=>$category,
            ]);
        }
        
        function delete($id=0){
            $session = new Session();
            $this->cateModel->cate_delete($id);
            $message='Xóa loại hàng thành công';
            $session->setFlashSuccess($message);
            header('Location:../index');
            exit();
        }
        function Show($a=0, $b=0){
         
        }
    }

?>