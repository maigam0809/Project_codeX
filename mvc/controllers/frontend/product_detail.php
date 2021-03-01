<?php

class product_detail extends Controller
{
    private $proModel;
    private $cateModel;
    private $slideModel;
    private $cmtModel;

    public function __construct()
    {
        $this->proModel = $this->model('proModel');
        $this->cateModel = $this->model('cateModel');
        $this->slideModel = $this->model('slideModel');
        $this->infoModel = $this->model('infoModel');
        $this->cmtModel = $this->model('cmtModel');
    }

    public function index($id=0)
    {   
        $session = new Session();
        $view = 1;
        $product = $this->proModel->pro_select_by_id($id);
       
        $this->proModel->hang_hoa_tang_view($id, $view);
    
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $info = $this->infoModel->getInfoAll();
        $comment = $this->cmtModel->getcmt_by_id($id);
    
        if(!empty($product)){
            if($product["product_status"]==0){
                $this->getCart($id);
                if(isset($_POST['btn_cart'])){
    
                    $dem = 0;
                    foreach ($_SESSION['cart'] as $item) {
                                $dem += $item['count'];
                            }
                            $_SESSION['dem'] = $dem;
                }
            }
            else{
                $message = 'Sản phẩm này hiện tại hết hàng !';
                $session->setFlashError($message);
            }
        }else{
            header('location:'.BASE_URL);
        }
        

        // echo '<pre>';
        // print_r($_SESSION['cart']);
        // echo '</pre>';
        $this->fe_content = VIEW_URL . "/frontend/sites/product_detail.php";
        $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'product' => $product,
            'categories' => $categories,
            'slides' => $slides,
            'info' => $info,
            'comment' =>$comment,
        ]);
    }
}
