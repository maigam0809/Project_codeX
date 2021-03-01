<?php

class History extends Controller
{   
    private $cateModel;
    private $infoModel;
    private $orderModel;
    private $slideModel;
    public function __construct()
    {
        $this->cateModel = $this->model('cateModel');
        $this->infoModel = $this->model('infoModel');
        $this->orderModel = $this->model('orderModel');
        $this->slideModel = $this->model('slideModel');
    }

    function index(){
        $orders = [];
        $message = '';
        $info = $this->infoModel->getInfoAll();
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        // echo '<pre>';
        // print_r($_SESSION['user'][0]);die;
        if(isset($_SESSION['user'])){
            $orders = $this->orderModel->getOrderAll_by_userId($_SESSION['user'][0]['user_id']);
            if(empty($orders)){
                $message = "Bạn chưa mua hàng lần nào";
            }
        }else{
            $message ="Bạn cần đăng nhập cho chức năng này";

        }
        
        
        // print_r($orders);die;
        $this->fe_content = VIEW_URL."/frontend/sites/history.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'info'=>$info,
            'categories' => $categories,
            'slides' => $slides,
            'message' => $message,
            'orders' => $orders
        ]);

    }

   
}
?>