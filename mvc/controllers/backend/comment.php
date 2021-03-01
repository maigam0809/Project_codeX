<?php

class Comment extends Controller
{
    private $cmtModel;
    public function __construct()
    {
        $this->cmtModel = $this->model('cmtModel');
    }

    public function index()
    {   
        $this->be_content = VIEW_URL . "/backend/comments/list.php";
        $cmts = $this->cmtModel->comment_select_all();
     
        $this->view('comments/index', [
            'cmts' => $cmts,
            'message' => $this->message,
        ]);
    }

    public function delete($id)
    {   
        $session = new Session();
        
        $this->cmtModel->comment_delete($id);
        $message='Xoá thành công';
        $session->setFlashSuccess($message);
        echo$_SESSION['REQUEST_URI'];
        header("location:".$_SESSION['REQUEST_URI']."");
        unset($_SESSION['REQUEST_URI']);
        die;
    }

    public function detail($id = 0)
    {
        unset($_SESSION['REQUEST_URI']);
        $this->be_content = VIEW_URL . "/backend/comments/detail.php";
        $cmt = $this->cmtModel->comment_select_by_product($id);
 
    if($cmt==[]){
        header("location:".BASE_URL."/admin/comment/index");
        die;
    }
       // print_r($cmt);
        
        $this->view('comments/index', [
            'cmt' => $cmt,
            'message' => $this->message,
        ]);
        $_SESSION['REQUEST_URI']=$_SERVER["REQUEST_URI"];

    }
}
