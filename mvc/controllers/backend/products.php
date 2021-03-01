<?php
class Products extends Controller
{
    private $proModel;
    private $cateModel;
    private $suppModel;
    public function __construct()
    {
        $this->proModel = $this->model('proModel');
        $this->cateModel = $this->model('cateModel');
        $this->suppModel = $this->model('suppModel');
    }
    function index($trang)
    {
        unset($_SESSION['so_luong_page']);
        $so_luong_sp = 10;
        $ban_ghi =  $this->proModel->getcountPro_page();
        $ban_ghi = (int)$ban_ghi[0]["COUNT(product_id)"];
        $sl_page = ceil($ban_ghi / $so_luong_sp); 
        $_SESSION['so_luong_page'] = $sl_page;
        $this->be_content = "./mvc/views/backend/products/list.php";
        $products = $this->proModel->getProAll_page($trang, $sl_page, $so_luong_sp);
        $this->view('products/index', [
            'products' => $products
        ]);
    }

    function create()
    {
        $session = new Session();
        extract($_REQUEST);
        $err = [
            'product_name' => '',
            'product_image' => '',
            'product_price' => '',
            'product_sale' => ''
        ];
        $categories = $this->cateModel->getCateAll();
        $suppliers = $this->suppModel->getSuppAll();

        if (isset($_POST['insert_pro'])) {

            $productName = $this->proModel->getProByName($product_name);

            foreach ($productName as $item) {
                if (strtoupper($product_name) === strtoupper($item['product_name'])) {
                    $err['product_name'] = "Tên sản phẩm này đã tồn tại";
                }
            }

            $pattern['product_name'] = "/([^\d]*)\s([^\d]*)/i";

            if ($product_name == '') {
                $err['product_name'] = "Mời bạn nhập tên sản phẩm !";
            }
           
            if ($_FILES['product_image']['size'] > 0) {

                if (
                    $_FILES['product_image']['type'] == 'image/png' ||
                    $_FILES['product_image']['type'] == 'image/jpg' ||
                    $_FILES['product_image']['type'] == 'image/jpeg'
                ) {
                    if ($_FILES['product_image']['size'] > 0) {
                        $up_hinh = $this->save_file("product_image", IMAGE_BE . "/products/");
                        $image = strlen($up_hinh) > 0 ? $up_hinh : 'no picture';
                    } else {
                        $err['product_image'] = "Nhập đúng định dạng ảnh nhưng không đúng kích thước";
                    }
                }
                 else {
                    $err['product_image'] = "Ảnh của bạn sai định dạng.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                }
            } else {
                $err['product_image'] = "Bạn chưa nhập ảnh";
            }


            if (trim($product_intro) == '') {
                $err['product_intro'] = "Chưa nhập giới thiệu cho sản phẩm.";
            }


            if (trim($product_description) == '') {
                $err['product_description'] = "Chưa nhập chi tiết cho sản phẩm";
            }

            if (trim($product_price) == '') {
                $err['product_price'] = "Bạn không được để trống giá của sản phẩm";
            } elseif ($product_price <= 0) {
                $err['product_price'] = "Giá của sản phẩm phải nhập vào giá trị dương và không được phép âm";
            }

            if ($product_sale < 0) {
                $err['product_sale'] = "Giảm giá phải dương";
            }

            if ($product_view < 0) {
                $err['product_view'] = "View không được phép âm";
            }

            if (!array_filter($err)) {
                $message='Thêm loại hàng thành công';
                $this->proModel->pro_insert(
                    $cate_id,
                    $supplier_id,
                    $product_name,
                    $image,
                    $product_intro,
                    $product_description,
                    $product_status,
                    $product_price,
                    $product_sale,
                    $product_view,
                    $product_created_by,
                    $product_created_at
                );
                $session->setFlashSuccess($message);
                // header('Location: ../index/1');
                header("location:" . BASE_URL . "/admin/products/index/1");
                exit();
            } 
            else{
                $message='Thêm thất bại';
                $session->setFlashError($message);
                $this->be_content = "./mvc/views/backend/products/create.php";
                $this->view(
                    'products/index',
                    [
                        'categories' => $categories,
                        'suppliers' => $suppliers,
                        'err' => $err
                    ]
                );
                
            }
        }
        $this->be_content = "./mvc/views/backend/products/create.php";

        $this->view(
            'products/index',
            [
                'categories' => $categories,
                'suppliers' => $suppliers,
            ]
        );
    }



    function update($id = 0)
    {
        $session = new Session();
        $err = [
            'product_name' => '',
            'product_image' => '',
            'product_price' => '',
            'product_sale' => ''
        ];
        extract($_REQUEST);

        $categories = $this->cateModel->getCateAll();
        $suppliers = $this->suppModel->getSuppAll();

        if (isset($_POST['product_update'])) {


            // tim nhung loai khac voi id hien tai ma co ten giong cate_name
            $sql = "Select * from products where product_id <> $id and product_name like '$product_name'";
            $res = $this->proModel->getBySql($sql);
            if ($res) {
                $err['product_name'] = "Đã tồn tại sản phẩm này .";
            }

            $pattern['product_name'] = "/([^\d]*)\s([^\d]*)/i";

            if ($product_name == '') {
                $err['product_name'] = "Mời bạn nhập tên sản phẩm !";
            }

            $image = '';
            // ví dụ như nó không upfile thì cái đoạn code này nó khong chạy tương đương với xóa  đoạn này đi
            if ($_FILES['image']['size'] > 0) {
                if (
                    $_FILES['image']['type'] == 'image/png' ||
                    $_FILES['image']['type'] == 'image/jpg' ||
                    $_FILES['image']['type'] == 'image/jpeg'
                ) {
                    $up_hinh = $this->save_file("image", IMAGE_BE . "/products/");
                    $image = strlen($up_hinh) > 0 ? $up_hinh : $product_image;
                } else {
                    $err['product_image'] = "Ảnh của bạn sai định dạng.
                        <br>Bạn hãy chọn ảnh có định dạng : jpg,jpeg,png";
                }
            } else {
                $image = $product_image;
            }



            if (trim($product_intro) == '') {
                $err['product_intro'] = "Chưa nhập giới thiệu cho sản phẩm.";
            }


            if (trim($product_description) == '') {
                $err['product_description'] = "Chưa nhập chi tiết cho sản phẩm";
            }

            if (trim($product_price) == '') {
                $err['product_price'] = "Bạn không được để trống giá của sản phẩm";
            } elseif ($product_price <= 0) {
                $err['product_price'] = "Giá của sản phẩm phải nhập vào giá trị dương và không được phép âm";
            }

            if ($product_sale < 0) {
                $err['product_sale'] = "Giảm giá phải dương";
            }

            if ($product_view < 0) {
                $err['product_view'] = "View không được phép âm";
            }

            if (!array_filter($err)) {

                $this->proModel->pro_update(
                    $cate_id,
                    $supplier_id,
                    $product_name,
                    $image,
                    $product_intro,
                    $product_description,
                    $product_status,
                    $product_price,
                    $product_sale,
                    $product_view,
                    $product_created_by,
                    $product_created_at,
                    $id
                );
                $this->message = 'Sửa sản phẩm thành công';
                $session->setFlashSuccess($this->message);
                header("location:" . BASE_URL . "/admin/products/index/1");
                exit();

            } else {
                $this->message = 'Sửa sản phẩm thất bại';
                $session->setFlashError($this->message);
                $products = $this->proModel->pro_select_by_id($id);
                $this->be_content = VIEW_URL . "/backend/products/update.php";
                $this->view("products/index", [
                    'products' => $products,
                    'categories' => $categories,
                    'suppliers' => $suppliers,
                    'err' => $err,
                ]);
            }
        }
        $products = $this->proModel->pro_select_by_id($id);
       
        $this->be_content = VIEW_URL . "/backend/products/update.php";
        $this->view("products/index", [
            'message' => $this->message,
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'err' => $err,
        ]);
    }

    function delete($id = 0)
    {
        $session = new Session();
        $this->proModel->pro_delete($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header("location:" . BASE_URL . "/admin/products/index/1");
        
    }
    function detail($id)
    {
        $this->be_content = "./mvc/views/backend/products/detail.php";
        $products = $this->proModel->pro_select_by_id_detail($id);
        $this->view('products/index', [
            'products' => $products
        ]);
    }
}
