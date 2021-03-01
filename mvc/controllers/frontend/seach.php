<?php

class seach extends Controller
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

    function seach($trang=0, $key='')
    {
        if (isset($_POST['btn_cart'])) {
            foreach ($_REQUEST as $k => $value) {
                if (is_numeric($k)) {
                    $arr[] = $k;
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
        unset($_SESSION['key']);
        $so_luong_sp = 8;
        $ban_ghi =  $this->proModel->getcountProseach($key); // đếm số lượng bản ghi

        $ban_ghi = (int)$ban_ghi[0]["COUNT(product_sale)"];

        $_SESSION['key'] = ['key' => $key, 'count' => $ban_ghi];
        $sl_page = ceil($ban_ghi / $so_luong_sp); // tính số lượng trang từ số bản ghi
        $_SESSION['so_luong_page'] = $sl_page;

        if ($ban_ghi >= 1) {
            $loai = $this->proModel->getsale1Proseach($trang, $sl_page, $so_luong_sp, $key);

            $categories = $this->cateModel->getCateAll();
            $slides = $this->slideModel->getSlidepAll();

            $spbc = $this->proModel->getbcPro();
            $info = $this->infoModel->getInfoAll();
            
            $this->fe_content = VIEW_URL . "/frontend/sites/seach.php";
            $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
            $this->view_fe('main/index', [
                'categories' => $categories,
                'slides' => $slides,
                'loai' => $loai,
                'info' => $info,
                'spbc' => $spbc
            ]);
        } else {
            $categories = $this->cateModel->getCateAll();
            $slides = $this->slideModel->getSlidepAll();

            $spbc = $this->proModel->getbcPro();
            $info = $this->infoModel->getInfoAll();
            $this->fe_content = VIEW_URL . "/frontend/sites/seach.php";
            $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
            $this->view_fe('main/index', [
                'categories' => $categories,
                'slides' => $slides,
                'info' => $info,
                'spbc' => $spbc
            ]);
        }
    }
}
