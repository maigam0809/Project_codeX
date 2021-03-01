<?php
class App
{
    protected $controller = 'home';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        $arr = $this->UrlProcess();
        // xử lý controller
        // print_r($arr);
        // die;
        if (!empty($arr) && $arr[0] == 'admin') {
            if (isset($arr[1]) && file_exists('./mvc/controllers/backend/' . $arr[1] . '.php')) {
                $this->controller = $arr[1];
                unset($arr[1]);
                unset($arr[0]);
            }
            require_once "./mvc/controllers/backend/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            if (isset($arr[2])) {
                if (method_exists($this->controller, $arr[2])) {
                    $this->action = $arr[2];
                } else {
                    $this->action = 'error';
                }
                unset($arr[2]);
            }
            //xử lý params
            $this->params = $arr ? array_values($arr) : [];
            // gọi hàm ra
            call_user_func_array([$this->controller, $this->action], $this->params);
        } 
        else {
               if(!empty($arr) && file_exists('./mvc/controllers/frontend/'. $arr[0] .'.php')){
                  $this->controller = $arr[0];
                  unset($arr[0]);
               }
               require_once "./mvc/controllers/frontend/". $this->controller .".php";
               $this->controller = new $this->controller; // dòng này: khởi tạo đối tượng cho class $this->controller
               // xử lý action
               if(isset($arr[1])){
                   if(method_exists($this->controller, $arr[1])){
                       $this->action = $arr[1];
                   }
                   unset($arr[1]);
               }
               // xử lý params
               $this->params = $arr?array_values($arr):[];
               // gọi hàm ra
               call_user_func_array([$this->controller, $this->action], $this->params);
        }
    }

    public function UrlProcess()
    {
        
        if (isset($_GET['url'])) {
            
             return explode('/', filter_var(trim($_GET['url'], '/')));
            // đảm bảo url không chứa dấu cách, ký tự đặc biệt
        }
    }
}
