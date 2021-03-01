<?php
    class Suppliers extends Controller{
        private $suppModel;
        public function __construct()
        {
            $this->suppModel = $this->model('suppModel');
        }
        function index(){
           
            $this->be_content = "./mvc/views/backend/suppliers/list.php";
            // $cateModel = $this->model('cateModel');
            $suppliers = $this->suppModel->getSuppAll();
            // print_r($categories);
            $this->view('suppliers/index',[
                'suppliers' => $suppliers,
                'message' => $this->message
            ]);
        }
        
        function create(){
            $session = new Session();

           
            $err = [
                'supplier_name' => '',
                'supplier_image' => '',
                'supplier_desc' => ''
            ];
            extract($_REQUEST);

            if(isset($_POST['insert_supp'])){
                
                $supplierName = $this->suppModel->getSuppByName($supplier_name);

                foreach ($supplierName as $item) {
                    if (strtoupper($supplier_name) === strtoupper($item['supplier_name'])) {
                        $err['supplier_name'] = "Tên nhà cung cấp này đã tồn tại";
            
                    }
                }


                if ($supplier_name == '') {

                    $err['supplier_name'] = "Mời bạn nhập nhà cung cấp !";
                    
                }


                if($supplier_desc == ''){
                    $err['supplier_desc'] = "Bạn hãy nhập giới thiệu nhà cung cấp.";
                }
                
                if ($_FILES['supplier_image']['size'] > 0) {
           
                    if (
                      $_FILES['supplier_image']['type'] == 'image/png' ||
                      $_FILES['supplier_image']['type'] == 'image/jpg' ||
                      $_FILES['supplier_image']['type'] == 'image/jpeg'
                    ) {
                      if ($_FILES['supplier_image']['size'] > 0) {
                        $up_hinh = $this->save_file("supplier_image", IMAGE_BE."/suppliers/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : 'no picture';
                      } else {
                        $err['supplier_image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
                      }
                    } else {
                      $err['supplier_image'] = "Ảnh của bạn sai định dạng.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                    }
                  } else {
                    $err['supplier_image'] = "Bạn chưa nhập ảnh";
                }
                

                if (!array_filter($err)) {

                    $this->suppModel->supp_insert($supplier_name, $image, $supplier_desc, $created_at);

                    $message='Thêm thành công';
                    $session->setFlashSuccess($message);
                    header('Location: index');
                    exit();
                }
                else{

                    $message='Thêm thất bại';
                    $session->setFlashError($message);

                    $this->be_content = "./mvc/views/backend/suppliers/create.php";
                    $this->view('suppliers/index',
                        [
                            'err' => $err,
                        ]
                    );
                }
            }
            $this->be_content = "./mvc/views/backend/suppliers/create.php";

            $this->view('suppliers/index',
                [
                    'err' => $err,
                ]
            );
        }
        
        function update($id=0){
            $session = new Session();

           
            $err = [
                'supplier_name' => '',
                'supplier_image' => '',
                'supplier_desc' => ''
            ];
            extract($_REQUEST);

            if(isset($_POST['supp_update'])){

                if ($supplier_name == '') {
                    $err['supplier_name'] = "Không được để trống";
                }
               
                $sql = "Select * from suppliers where supplier_id <> $id and supplier_name like '$supplier_name'";
                $res = $this->suppModel->getBySql($sql);

                if($res) {
                    $err['supplier_name'] = "Đã tồn tại ";
                }


                if($supplier_desc == ''){
                    $err['supplier_desc'] = "Bạn hãy nhập giới thiệu.";
                }

                $image = '';

                if ($_FILES['image']['size'] > 0) {
                    if (
                        $_FILES['image']['type'] == 'image/png' ||
                        $_FILES['image']['type'] == 'image/jpg' ||
                        $_FILES['image']['type'] == 'image/jpeg'
                    ) {
                        $up_hinh = $this->save_file("image", IMAGE_BE."/suppliers/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : $supplier_image;
        
                    } else {
                        $err['supplier_image'] = "Sai định dạng ảnh.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                    }
                }  else {
                    $image = $supplier_image;
                }

                if(!array_filter($err)){

                    $this->suppModel->supp_update($supplier_name, $image, $supplier_desc, $created_at, $id);
                    $message='Cập nhật thành công';
                    $session->setFlashSuccess($message);
                    header('Location:../index');
                    exit();


                    // if($this->suppModel->message == 'flase'){
                    //     $this->message='Sửa danh mục thất bại';
                    // }else{
                    //     $this->message = 'Sửa danh mục thành công';
                    // }

                }else{
                    // $this->message='Sửa danh mục thất bại';
                    $message='Cập nhật thất bại';
                    $session->setFlashError($message);

                    $suppliers = $this->suppModel->supp_select_by_id($id);
                    $this->be_content = VIEW_URL . "/backend/suppliers/edit.php";
                    $this->view("suppliers/index",[
                        'suppliers'=>$suppliers,
                        'message' => $this->message,
                        'err' => $err,
                    ]);
                }
            }
            $suppliers = $this->suppModel->supp_select_by_id($id);
            $this->be_content = VIEW_URL . "/backend/suppliers/edit.php";
            $this->view("suppliers/index",[
                'suppliers'=>$suppliers,
                'message' => $this->message,
                'err' => $err,
            ]);
        }


        function delete($id=0){
            $session = new Session();
           

            $this->suppModel->supp_delete($id);
            $message='Xoá thành công';
            $session->setFlashSuccess($message);
            header('Location:../index');
            exit();

            // if($this->suppModel->message == 'flase'){
            //     $this->message='Xóa danh mục thất bại';
            // }else{
            //     $this->message = 'Xóa danh mục thành công';
            // }
            // $this->be_content = VIEW_URL . "/backend/suppliers/list.php";
            // $this->index();
        }

        function details($id=0){
            $this->be_content = "./mvc/views/backend/suppliers/detail.php";
            $suppliers = $this->suppModel->supp_select_by_id($id);
            $this->view('suppliers/index', [
                'suppliers' => $suppliers
            ]);
        }


        function Show($a=0, $b=0){
          
        }
    }

?>