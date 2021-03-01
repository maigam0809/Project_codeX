<?php

class product_type_sale extends Controller
{
    private $cateModel;
    private $slideModel;
    private $proModel;
    private $infoModel;
    public function __construct()
    {
        $this->cateModel = $this->model('cateModel');
        $this->slideModel = $this->model('slideModel');
        $this->proModel = $this->model('proModel');
        $this->infoModel = $this->model('infoModel');
    }
    // $product = $this->model('proModel')->pro_select_by_id($id);
        
    // if(isset($_POST['btn_cart'])){
    //     extract($_REQUEST);
    //     if(!empty($count)){
    //         $_SESSION['cart'][$id]=[
    //             'product'=>$product,
    //             'count'=>$count
    //         ];
    //     }else{
    //         $_SESSION['cart'][$id]=[
    //             'product'=>$product,
    //             'count'=>1
    //         ];
    //     }
    // }

    public function index($id = 0, $trang = 0)
    {   
        if(empty($id))
            header("location:".BASE_URL);
        if (isset($_POST['btn_cart'])) {
            foreach ($_REQUEST as $key => $value) {
                if (is_numeric($key)) {
                    $arr[] = $key;
                }
            }
            $this->getCart($arr[0]);
            $dem = 0;
            foreach ($_SESSION['cart'] as $item) {
                $dem += $item['count'];
            }
            $_SESSION['dem'] = $dem;
        }
        
        extract($_REQUEST);
        // unset($_SESSION['so_luong_page']);
        $so_luong_sp = 8;
        $ban_ghi = (int)$this->proModel->getcountPro($id); // đếm số lượng bản ghi
        
        $sl_page = ceil($ban_ghi / $so_luong_sp); // tính số lượng trang từ số bản ghi
        
        $_SESSION['so_luong_page'] = $sl_page;
        if ($sl_page > 0) {
            $loai = $this->proModel->getcate_page($id, $trang, $sl_page, $so_luong_sp);

            $categories = $this->cateModel->getCateAll();
            $cate_id = $this->cateModel->getCate_by_id($id);
            $slides = $this->slideModel->getSlidepAll();

            $spbc = $this->proModel->getbcPro();
            $info = $this->infoModel->getInfoAll();
            $this->fe_content = VIEW_URL . "/frontend/sites/product_type.php";
            $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
            $this->view_fe('main/index', [
                'categories' => $categories,
                'cate_id' => $cate_id,
                'slides' => $slides,
                'loai' => $loai,
                'info' => $info,
                'spbc' => $spbc,
            ]);} else {
            $categories = $this->cateModel->getCateAll();
            $cate_id = $this->cateModel->getCate_by_id($id);
            $slides = $this->slideModel->getSlidepAll();

            $spbc = $this->proModel->getbcPro();
            $info = $this->infoModel->getInfoAll();
            $this->fe_content = VIEW_URL . "/frontend/sites/product_type.php";
            $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
            $this->view_fe('main/index', [
                'categories' => $categories,
                'cate_id' => $cate_id,
                'slides' => $slides,
                'info' => $info,
                'spbc' => $spbc,
            ]);
        }
    }

    public function sale($trang)
    {
        if (isset($_POST['btn_cart'])) {
            foreach ($_REQUEST as $key => $value) {
                if (is_numeric($key)) {
                    $arr[] = $key;
                }
            }
            $this->getCart($arr[0]);
            $dem = 0;
            foreach ($_SESSION['cart'] as $item) {
                $dem += $item['count'];
            }
            $_SESSION['dem'] = $dem;
        }
        unset($_SESSION['so_luong_page']);
        $so_luong_sp = 8;
        $ban_ghi = $this->proModel->getcountProsale(); // đếm số lượng bản ghi
        $ban_ghi = (int) $ban_ghi[0]["COUNT(product_sale)"];
        $sl_page = ceil($ban_ghi / $so_luong_sp); // tính số lượng trang từ số bản ghi
        // echo"<br>". $sl_page;
        // echo"<br>". $trang;
        $_SESSION['so_luong_page'] = $sl_page;
        $loai = $this->proModel->getsale1Pro($trang, $sl_page, $so_luong_sp);
        $categories = $this->cateModel->getCateAll();
        // $cate_id = $this->cateModel->getCate_by_id($id);
        $slides = $this->slideModel->getSlidepAll();

        $spbc = $this->proModel->getbcPro();
        $info = $this->infoModel->getInfoAll();
        $this->fe_content = VIEW_URL . "/frontend/sites/product_sale.php";
        $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'categories' => $categories,
            // 'cate_id'=>$cate_id,
            'slides' => $slides,
            'loai' => $loai,
            'info' => $info,
            'spbc' => $spbc,
        ]);

    }
    public function sp_bc()
    {   
        if (isset($_POST['btn_cart'])) {
            foreach ($_REQUEST as $key => $value) {
                if (is_numeric($key)) {
                    $arr[] = $key;
                }
            }
            $this->getCart($arr[0]);
            $dem = 0;
            foreach ($_SESSION['cart'] as $item) {
                $dem += $item['count'];
            }
            $_SESSION['dem'] = $dem;
        }
        $loai = $this->proModel->getPro();
        $categories = $this->cateModel->getCateAll();
        // $cate_id = $this->cateModel->getCate_by_id($id);
        $slides = $this->slideModel->getSlidepAll();
        $spbc = $this->proModel->getbcPro();
        $info = $this->infoModel->getInfoAll();
        $this->fe_content = VIEW_URL . "/frontend/sites/product_ban_chay.php";
        $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'categories' => $categories,
            // 'cate_id'=>$cate_id,
            'slides' => $slides,
            'loai' => $loai,
            'info' => $info,
            'spbc' => $spbc,
        ]);

    }
}
