<?php

class News extends Controller
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
        $this->newModel = $this->model('newModel');
    }

    function index(){
        $info = $this->infoModel->getInfoAll();
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $news = $this->newModel->getNewAll();
        $this->fe_content = VIEW_URL."/frontend/sites/news.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'info'=>$info,
            'categories' => $categories,
            'slides' => $slides,
            'news' => $news
        ]);

    }
    
    function new_detail($id){
        $info = $this->infoModel->getInfoAll();
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $news = $this->newModel->new_select_by_id($id);
        $this->fe_content = VIEW_URL."/frontend/sites/new_detail.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'info'=>$info,
            'categories' => $categories,
            'slides' => $slides,
            'news' => $news
        ]);

    }

   
}
?>