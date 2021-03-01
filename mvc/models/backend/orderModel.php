<?php
class orderModel extends Db{
    public $table = 'orders';
    public $table2 = 'users';
    public $table3 = 'orders_detail';
    // truy vấn tất cả cá loại
    public function getOrderAll(){
        $sql = "SELECT * FROM $this->table INNER JOIN $this->table2
        ON $this->table.user_id = $this->table2.user_id;";
        return $this->pdo_query($sql);
    }
    public function getOrderAll_by_id($id){
        $sql = "SELECT * FROM $this->table  WHERE order_id=?";
        return $this->pdo_query($sql,$id);
    }
    public function getOrderDetail_by_id($id){
        $sql = "SELECT * FROM orders_detail INNER JOIN products
        ON orders_detail.product_id = products.product_id WHERE order_id=?";
        return $this->pdo_query($sql,$id);
    }
    public function getOrderDelete_by_id($id){
        $sql = "DELETE FROM $this->table WHERE $this->table.`order_id` = ?";
        return $this->pdo_execute($sql, $id);
    }
    
    public function getOrderUpdate_by_id($order_id,$order_address,$require_date, $order_status)
    {
        $sql = "UPDATE `orders` SET order_address=?,require_date=?, order_status=? WHERE orders.order_id = ?";
        $this->pdo_execute($sql,$order_address,$require_date, $order_status,$order_id);
    }

    public function order_insert($user_id, $order_address, $order_date)
    {
        $sql = "insert into $this->table(user_id, order_address, order_date) values(?,?,?)";
        $this->pdo_execute($sql, $user_id, $order_address, $order_date);
    }
    public function order_detail_insert($order_id, $product_id, $order_quantity,$order_discount,$price)
    {
        $sql = "insert into $this->table3(order_id, product_id, order_quantity, order_discount,price) values(?,?,?,?,?)";
        $this->pdo_execute($sql, $order_id, $product_id,$order_quantity,$order_discount,$price);
    }
    public function setId(){
        $sql = "SELECT order_id FROM `orders` order by order_date desc limit 1";
        return $this->pdo_query($sql);
    }

    public function getOrderAll_by_userId($id){
        $sql = "SELECT * FROM $this->table  WHERE user_id=?";
        return $this->pdo_query($sql,$id);
    }



}
?>