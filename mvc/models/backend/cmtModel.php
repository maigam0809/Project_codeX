<?php

class cmtModel extends Db
{
    private $table = 'comments';
    private $comment_id = 'comment_id';
    private $product_id = 'product_id';
    private $content = 'content';
    private $created_at = 'created_at';

    function comment_delete($comment_id){
        $sql = "DELETE FROM $this->table WHERE $this->comment_id=?";
        return $this->pdo_execute($sql, $comment_id);
    }

     //Tổng hợp tất cả các bình luận
     function comment_select_all(){
        $sql = "SELECT products.product_id, products.product_name, 
        count($this->comment_id) as 'so_luong', min($this->created_at) as 'cu_nhat', max($this->created_at) as
        'moi_nhat' FROM $this->table join products on comments.product_id=products.product_id group by products.product_id";
        return $this->pdo_query($sql);   
    }

    // truy vấn bình luận theo mã hàng hóa
    function comment_select_by_product($product_id){
        $sql = "SELECT * FROM products join comments on products.product_id=comments.product_id join users on comments.customer_id=users.user_id WHERE comments.product_id=?";
        return $this->pdo_query($sql, $product_id);
    }

    function getcmt_by_id($id){
        $sql = "SELECT * FROM comments comm JOIN users user ON comm.customer_id=user.user_id WHERE product_id=? ORDER BY comm.created_at DESC";
        return $this->pdo_query($sql, $id);
    }
    function inser_cmt($customer_id,$product_id,$content){
        $sql = "INSERT INTO `comments` (`customer_id`, `product_id`, `content`, `created_at`) VALUES ( '$customer_id', '$product_id', '$content', CURRENT_TIMESTAMP);";
        $this->pdo_execute($sql);
    }
    function get_cmt($customer_id,$product_id,$comment){
        $sql = "SELECT * FROM comments comm JOIN users user ON comm.customer_id=user.user_id WHERE customer_id =? AND product_id=? AND content=?";
        return $this->pdo_query($sql,$customer_id,$product_id,$comment);
    }
}
?>