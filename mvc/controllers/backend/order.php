<?php
class order extends Controller
{
    private $orderModel;
    public function __construct()
    {
        $this->orderModel = $this->model('orderModel'); //goi ham model ben controller
    }
    function index()
    {   
        $this->be_content = "./mvc/views/backend/order/list.php";
        // $cateModel = $this->model('cateModel');
        $order = $this->orderModel->getOrderAll();
        // print_r($categories);
        $this->view('order/index', [
            'order' => $order
        ]);
    }

   

    function update($id)
    {   
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $session = new Session();
        $message = '';
        $err = [
        'order_address' => '',
        'require_date' => ''
        ];
        if (isset($_POST['btn-order'])) {
            extract($_REQUEST);

            
            if(strtotime($require_date)<strtotime(date("Y-m-d"))){
                $err['require_date'] = "Thời gian giao hàng lớn hơn hoặc bằng ngày hiện tại";
            }

            if (empty($order_address)) {
                $err['order_address'] = "Nhập địa chỉ giao hàng";
            }

            if (!array_filter($err)) {
                $this->orderModel->getOrderUpdate_by_id($order_id,$order_address,$require_date, $order_status);
                $message = 'Sửa thành công';
                $session->setFlashSuccess($message);
                header('location: ../index');
                exit();
            }else{
                $message = 'Sửa order thất bại';
                $session->setFlashError($message);
                $this->be_content = "./mvc/views/backend/order/edit.php";
                $order = $this->orderModel->getOrderAll_by_id($id);
                $this->view('order/index', [
                    'order' => $order,
                    'err' => $err
                    
                ]);
            }
           
        }
        $this->be_content = "./mvc/views/backend/order/edit.php";
        $order = $this->orderModel->getOrderAll_by_id($id);
        $this->view('order/index', [
            'order' => $order,
        ]);
    }


    function details($id)
    {  
        $this->be_content = "./mvc/views/backend/order/detail.php";
        $order = $this->orderModel->getOrderDetail_by_id($id);
        $this->view('order/index', [
            'order' => $order
        ]);
    }

    function delete($id)
    {    
        $session = new Session();
        $this->orderModel->getOrderDelete_by_id($id); 
        $message = 'Xóa thành công';
        $session->setFlashSuccess($message);
        header('location: ../index');
        exit;
    }
   
}

