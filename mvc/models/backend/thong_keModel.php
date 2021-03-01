<?php
class thong_keModel extends Db
{
    protected $table = 'categories';
    protected $products = 'products';
    protected $comments = 'comments';
    protected $sliders = 'sliders';
    protected $orders = 'orders';
    protected $news = 'news';

    function thong_ke_hang_hoa(){
        $sql = "SELECT cate.cate_id, cate.cate_name,"
                . " COUNT(hh.cate_id) sl,"
                . " COUNT(cate.cate_id) so_luong,"
                . " MIN(hh.product_price) gia_min,"
                . " MAX(hh.product_price) gia_max,"
                . " AVG(hh.product_price) gia_avg"
                . " FROM products hh "
                . " JOIN categories cate ON cate.cate_id = hh.cate_id "
                . " GROUP BY cate.cate_id, cate.cate_name";
        return $this->pdo_query($sql);
        }

        function thong_ke_loai(){
                $sql = "SELECT count(cate_id) 'dem_cate'
                FROM $this->table 
                ";
                return $this->pdo_query($sql);
        
        }

        function thong_ke_sp(){
                $sql = "SELECT count(product_id) 'dem_pro'
                FROM products
                ";
                return $this->pdo_query($sql);
        
        }
        function thong_ke_cmt(){
                $sql = "SELECT count(comment_id) 'dem_cmt'
                FROM comments
                ";
                return $this->pdo_query($sql);
        
        }

        
        function thong_ke_users(){
                $sql = "SELECT count(user_id) 'dem_user'
                FROM users
                ";
                return $this->pdo_query($sql);
        
        }

        function thong_ke_loai_users(){
                $sql = "SELECT role 'Quyền',count(user_id) 'sl'
                FROM users where role
                group by role 
                order by role desc
                ";
                return $this->pdo_query($sql);
        
        }

        function thong_ke_slide(){
                $sql = "SELECT count(slider_id) 'dem_slide'
                FROM sliders
                ";
                return $this->pdo_query($sql);
        
        }
        function thong_ke_new(){
                $sql = "SELECT count(new_id) 'dem_new'
                FROM news";
                return $this->pdo_query($sql);
        
        }
        function thong_ke_order(){
                $sql = "SELECT count(order_id) 'dem_order'
                FROM orders
                ";
                return $this->pdo_query($sql);
        
        }

        function thong_ke_supp(){
                $sql = "SELECT count(supplier_id) 'dem_supp'
                FROM suppliers
                ";
                return $this->pdo_query($sql);
        
        }
        function thong_ke_sp_order(){
                $sql = "SELECT users.user_name ,count(orders.user_id) 'dem_order'
                FROM orders inner join users 
                on orders.user_id = users.user_id 
                where orders.user_id
                group by orders.user_id 
                order by orders.user_id  asc
                ";
                return $this->pdo_query($sql);
        
        }

        function thong_ke_cmt_sp(){
                $sql = "SELECT products.product_name 'Loại',
                count(comments.comment_id) 'so_luong_cmt'
                FROM comments inner join products
                on comments.product_id = products.product_id
                where comments.product_id 
                group by comments.product_id 
                order by products.product_id asc
                ";
                return $this->pdo_query($sql);
        }
        
         
        

}
