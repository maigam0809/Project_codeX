<?php
class info extends Controller
{
    private $contactModel;
    public function __construct()
    {
       
    }

    function index()
    {  
        $this->be_content = "./mvc/views/backend/info_admin/info.php";
        $this->view('contact/index');
    }
    


   
}

