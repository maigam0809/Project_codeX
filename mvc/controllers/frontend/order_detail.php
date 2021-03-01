<?php

class Order_detail extends Controller
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

    function index($id){
        $order = [];
        $message = '';
        $info = $this->infoModel->getInfoAll();
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        if(isset($_SESSION['user'])){
            
            $order = $this->orderModel->getOrderDetail_by_id($id);
        }else{
            $message ="Bạn cần đăng nhập cho chức năng này";

        }
        $this->fe_content = VIEW_URL."/frontend/sites/order_detail.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'info'=>$info,
            'categories' => $categories,
            'slides' => $slides,
            'message' => $message,
            'order' => $order
        ]);

    }

   
}
?>