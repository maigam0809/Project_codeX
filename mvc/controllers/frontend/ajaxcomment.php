<?php

class ajaxcomment extends Controller
{   

    private $cmtModel;

    public function __construct()
    {

        $this->cmtModel = $this->model('cmtModel');
    }

    function index()
    {
        $commentajax="";
        // unset($_SESSION['commentajax']);
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];
        $comment = $_POST['comment'];
        $this->cmtModel->inser_cmt($customer_id, $product_id, $comment);
        $commentajax = $this->cmtModel->get_cmt($customer_id,$product_id,$comment);
        // var_dump($commentajax);
        // die;

    echo "  
        <div class='media mb-4 pl-1 col-10' style='border-bottom: 0.2px solid #DDDDDD;'>

        <a class='media-left mr-3 ' href='#'>
            <img src='https://ui-avatars.com/api/?name=". $commentajax[0]['user_name']."'>
        </a>
        <div class='media-body'>

            <h6 class='media-heading user_name font-weight-bold'>".$commentajax[0]['user_name']."</h6>
            <p class='font-size-2' style='font-size: 14px;'>".$commentajax[0]['content']."</p>
        </div>

        <p class='pull-right'>
            <small>".$commentajax[0]['created_at']."</small>
        </p>
    </div>";


    }
     

}
