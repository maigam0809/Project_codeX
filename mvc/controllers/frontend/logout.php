<?php

class logout extends Controller
{   


        public function __construct()
        {
          
        }

    function index(){
        session_destroy();
        header("location:".BASE_URL."/home");
        // echo"thanh cong";
        // die;
    }
}
?>