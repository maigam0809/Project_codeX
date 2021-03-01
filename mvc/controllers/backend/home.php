<?php
class Home extends Controller{
    private $thong_keModel;
    public function __construct()
    {
        $this->thong_keModel = $this->model('thong_keModel'); //goi ham model ben controller
    }
    function index(){   
        $thong_ke = $this->thong_keModel->thong_ke_hang_hoa();
        $thong_ke_loai = $this->thong_keModel->thong_ke_loai();
        $thong_ke_sp = $this->thong_keModel->thong_ke_sp();
        $thong_ke_cmt = $this->thong_keModel->thong_ke_cmt();
        $thong_ke_users = $this->thong_keModel->thong_ke_users();
        $thong_ke_slide = $this->thong_keModel->thong_ke_slide();
        $thong_ke_new = $this->thong_keModel->thong_ke_new();
        $thong_ke_order = $this->thong_keModel->thong_ke_order();
        $thong_ke_supp = $this->thong_keModel->thong_ke_supp();

        //Thống kê theo từng số lượng 
        $thong_ke_cmt_sp = $this->thong_keModel->thong_ke_cmt_sp();
        $thong_ke_loai_users = $this->thong_keModel->thong_ke_loai_users();
        $thong_ke_sp_order = $this->thong_keModel->thong_ke_sp_order();

        $this->view('main/index', [
            'thong_ke' => $thong_ke,
            'thong_ke_loai' => $thong_ke_loai,
            'thong_ke_sp' => $thong_ke_sp,
            'thong_ke_cmt' => $thong_ke_cmt,
            'thong_ke_users' => $thong_ke_users,
            'thong_ke_slide' => $thong_ke_slide,
            'thong_ke_new' => $thong_ke_new,
            'thong_ke_order' => $thong_ke_order,
            'thong_ke_supp' => $thong_ke_supp,
            'thong_ke_cmt_sp' => $thong_ke_cmt_sp,
            'thong_ke_loai_users' => $thong_ke_loai_users,
            'thong_ke_sp_order' => $thong_ke_sp_order

        ]);
    }

}
?>