<?php

class Order extends Controller
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
        $session = new Session();
        $info = $this->infoModel->getInfoAll();
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $message = '';
        
        if(isset($_POST['btn_info'])){
            $message = '';
            if(isset($_SESSION['user'])){
                extract($_REQUEST);
               
                if(!empty($_SESSION['cart'])){
                    $this->orderModel->order_insert($_SESSION['user'][0]['user_id'], $address, $order_date);
                    $order_id = $this->orderModel->setId();
                    foreach($_SESSION['cart'] as $item){
                        
                            $this->orderModel->order_detail_insert($order_id[0]['order_id'], $item['product']['product_id']
                            ,$item['count'], $item['product']['product_sale'],$item['product']['product_price']);
                          
                    }
                    $content = " Để xem chi tiết vui lòng vào:<h1><b><a href='http://localhost".BASE_URL."/history'>Xem chi tiết</a></b></h1>";
                    $this->sentEmail('dunvph10007@fpt.edu.vn', $content, $_SESSION['user'][0]['user_email'], '', '', 'Thông tin đơn hàng');
                    
                    if ($this->orderModel->message == 'flase') {
                        $message = 'Mua hàng thất bại';
                        $session->setFlashError($message);
                    } else {
                        $message = 'Mua hàng thành công';
                        $session->setFlashSuccess($message);
                       unset($_SESSION['cart']);
                       unset($_SESSION['dem']);
                    }

                }else{
                    $message = 'Bạn chưa mua sản phẩm nào!';
                    $session->setFlashError($message);
                }
                
                
            }else{
                $message = 'Bạn cần đăng nhập trước khi thực hiện chức năng này!';
                $session->setFlashError($message);
            }
        }


        $this->fe_content = VIEW_URL."/frontend/sites/infoCustomer.php";
        $this->menu = VIEW_URL."/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'info'=>$info,
            'categories' => $categories,
            'slides' => $slides
        ]);

    }

   
}
?>