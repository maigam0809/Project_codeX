<?php

class Info_shop extends Controller
{   
    private $cateModel;
    private $infoModel;
    private $slideModel;
    public function __construct()
    {
        $this->cateModel = $this->model('cateModel');
        $this->infoModel = $this->model('infoModel');
        $this->slideModel = $this->model('slideModel');  
    }

    function index(){
        $info = $this->infoModel->getInfoAll();
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
   
        $this->fe_content = VIEW_URL."/frontend/sites/info_shop.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'info'=>$info,
            'categories' => $categories,
            'slides' => $slides    
        ]);

    }
   

   
}
?>