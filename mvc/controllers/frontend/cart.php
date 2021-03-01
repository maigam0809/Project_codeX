<?php

class Cart extends Controller
{

    private $cateModel;
    private $slideModel;
    private $infoModel;
    public function __construct()
    {
        $this->cateModel = $this->model('cateModel');
        $this->slideModel = $this->model('slideModel');
        $this->infoModel = $this->model('infoModel');
    }
    public function index()
    {
        $categories = $this->cateModel->getCateAll();
        $slides = $this->slideModel->getSlidepAll();
        $info = $this->infoModel->getInfoAll();

        $this->fe_content = VIEW_URL . "/frontend/sites/cart.php";
        $this->menu = VIEW_URL . "/frontend/layout/menu2.php";
        $this->view_fe('main/index', [
            'categories' => $categories,
            'slides' => $slides,
            'info' => $info,
        ]);
    }

    public function update()
    {
        if (isset($_POST['cart_update'])) {
            $dem = 0;
            extract($_REQUEST);
            foreach ($cart_count as $key => $value) {
                if ($value < 0 || !is_numeric($value)) {
                    continue;
                } elseif ($value == 0) {
                    $this->delete($key);
                } else {
                    $_SESSION['cart'][$key]['count'] = $value;
                }
                $dem += $_SESSION['cart'][$key]['count'];
            }
            if (isset($_SESSION['dem']) && $_SESSION['dem'] != $dem) {
                $_SESSION['dem'] = $dem;
            }
        }
        header("location:" . BASE_URL . "/cart");
        exit();
    }
    public function delete($id)
    {
        $dem = 0;
        unset($_SESSION['cart'][$id]);
        foreach ($_SESSION['cart'] as $item) {
            $dem += $item['count'];
        }
        $_SESSION['dem'] = $dem;
        header("location:" . BASE_URL . "/cart");
        exit();
    }
}
