<?php

class Home extends Controller
{   
    private $cateModel;
    private $slideModel;
    private $proModel;
    private $infoModel;
    private $raucu=1;
    private $haisan=2;
    private $hoaqua_tn=3;
    private $hoaqua_say=4;
    private $thit=5;
        public function __construct()
        {
            $this->cateModel = $this->model('cateModel');
            $this->slideModel = $this->model('slideModel');
            $this->proModel = $this->model('proModel');
            $this->infoModel = $this->model('infoModel');
        } 

    function index(){

        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $top10 = $this->proModel->get10Pro();
        $do_kho5 = $this->proModel->get5Pro_kho($this->hoaqua_say);
        $raucu = $this->proModel->get5Pro_kho($this->raucu);
        $thit = $this->proModel->get5Pro_kho($this->thit);
        $info = $this->infoModel->getInfoAll();

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
        $this->fe_content = VIEW_URL."/frontend/sites/home.php";
        $this->menu = VIEW_URL."/frontend/layout/menu1.php";
        $this->view_fe('main/index', [
            'categories'=>$categories,
            'slides'=>$slides,
            'top10'=>$top10,
            'do_kho5'=>$do_kho5,
            'raucu'=>$raucu,
            'info'=>$info,
            'thit'=>$thit
        ]);
    }
}
?>