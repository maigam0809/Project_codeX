<?php
class ProModel extends Db
{
    protected $table = 'products';
    protected $cate_id = 'cate_id';
    protected $supplier_id = 'supplier_id';
    protected $product_id = 'product_id';
    protected $product_name = 'product_name';
    protected $product_image = 'product_image';
    protected $product_intro = 'product_intro';
    protected $product_description = 'product_description';
    protected $product_status = 'product_status';
    protected $product_price = 'product_price';
    protected $product_sale = 'product_sale';
    protected $product_view = 'product_view';
    protected $product_detail = 'product_detail';
    protected $product_created_by = 'product_created_by';
    protected $product_created_at = 'product_created_at';

    public function getProAll()
    {
        $sql = "SELECT * FROM $this->table
                inner join categories
                on categories.cate_id = products.cate_id
                inner join suppliers
                on suppliers.supplier_id = products.supplier_id 
                
                ";
        return $this->pdo_query($sql);
    }

    public function getBySql($sql){
        return $this->pdo_query($sql);
    }

    public function getProByName($product_name)
    {
        $a = strtoupper($product_name);

        $sql = "SELECT product_name FROM $this->table where product_name like '$product_name' ";
        $result = $this->pdo_query($sql);
        return $result;

    }


    public function pro_insert($cate_id, $supplier_id, $product_name, $product_image,
        $product_intro, $product_description, $product_status,
        $product_price, $product_sale, $product_view
        , $product_created_by,
        $product_created_at) {
        $sql = "insert into $this->table($this->cate_id, $this->supplier_id,
            $this->product_name,$this->product_image,
            $this->product_intro, $this->product_description,
            $this->product_status, $this->product_price,
            $this->product_sale, $this->product_view,
             $this->product_created_by,
            $this->product_created_at
            ) values(?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->pdo_execute($sql, $cate_id, $supplier_id, $product_name, $product_image,
            $product_intro, $product_description, $product_status,
            $product_price, $product_sale, $product_view,
            $product_created_by,
            $product_created_at);
    }
  
    public function pro_update($cate_id, $supplier_id, $product_name, $product_image,
        $product_intro, $product_description, $product_status,
        $product_price, $product_sale, $product_view,
        $product_created_by,
        $product_created_at, $product_id) {
        $sql = "UPDATE $this->table SET $this->cate_id = ?, $this->supplier_id = ?,
                $this->product_name = ?, $this->product_image = ?,
                $this->product_intro = ?, $this->product_description = ?,
                $this->product_status = ?, $this->product_price = ?,
                $this->product_sale = ?, $this->product_view = ?,
                 $this->product_created_by = ?,
                $this->product_created_at = ?

                WHERE $this->product_id=?";
        // echo $sql;die;
        return $this->pdo_execute($sql,
            $cate_id, $supplier_id, $product_name, $product_image,
            $product_intro, $product_description, $product_status,
            $product_price, $product_sale, $product_view,
            $product_created_by,
            $product_created_at, $product_id);
    }

    public function pro_delete($product_id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->product_id=?";
        if (is_array($product_id)) {
            foreach ($product_id as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $product_id);
        }
    }
    public function pro_select_by_id($product_id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->product_id=?";
        return $this->pdo_query_one($sql, $product_id);
    }
    public function pro_select_by_id_detail($product_id)
    {
        $sql = "SELECT * FROM products hh JOIN categories lo ON lo.cate_id =hh.cate_id JOIN suppliers sup ON sup.supplier_id =hh.supplier_id WHERE $this->product_id=?";
        return $this->pdo_query_one($sql, $product_id);
    }
    public function hang_hoa_tang_view($id, $view)
    {
        $sql = "UPDATE products SET product_view = product_view + ? WHERE $this->product_id=?";
        return $this->pdo_execute($sql, $view, $id);

    }

    // lẩy 10 sản phẩm bán chạy nhất
    public function getbcPro()
    {
        $sql = "select * from $this->table  WHERE $this->product_view >= 5 ORDER BY product_view DESC";
        return $this->pdo_query($sql);
    }
    
    public function getlocPro($id, $min, $max)
    {
        $sql = "select * from $this->table  WHERE $this->product_price >= ? AND $this->product_price <= ? AND product_id =?  ORDER BY $this->product_price";
        return $this->pdo_query($sql, $min, $max, $id);
    }
    public function getsalePro()
    {
        $sql = "select * from products WHERE product_sale >= 12 ORDER BY product_sale DESC";
        return $this->pdo_query($sql);
    }

    public function getlocsalePro($min, $max)
    {
        $sql = "select * from $this->table  WHERE $this->product_price >= ? AND $this->product_price <= ? AND $this->product_sale >= 12  ORDER BY $this->product_price";
        return $this->pdo_query($sql, $min, $max);
    }
    public function get10Pro()
    {
        $sql = "select * from $this->table order by $this->product_view desc";
        return $this->pdo_query($sql);
    }
    public function getPro()
    {
        $sql = "select * from $this->table WHERE $this->product_view>=9 order by $this->product_view desc";
        return $this->pdo_query($sql);
    }

    // lấy 5 sản phẩm khô
    public function get5Pro_kho($cate_id_DK)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->cate_id=?";
        return $this->pdo_query($sql, $cate_id_DK);
    }

    public function getcate_page($id, $trang, $sl_page, $so_luong_sp)
    {
        if ($trang < 1) {
            $trang = 1;
        }
        if ($trang > $sl_page) {
            $trang = $sl_page;
        }
        $start = ($trang - 1) * $so_luong_sp;

        $sql = "SELECT * FROM products WHERE cate_id=? ORDER BY product_sale DESC LIMIT {$start},{$so_luong_sp}";
        return $this->pdo_query($sql, $id);
    }

    public function getsale1Pro($trang, $sl_page, $so_luong_sp)
    {
        if ($trang < 1) {
            $trang = 1;
        }
        if ($trang > $sl_page) {
            $trang = $sl_page;
        }
        $start = ($trang - 1) * $so_luong_sp;
        $sql = "select * from products WHERE product_sale >= 12 ORDER BY product_sale DESC LIMIT {$start},{$so_luong_sp}";

        return $this->pdo_query($sql);
    }

//seach
    public function getcountPro($id)
    {
        $sql = "select COUNT(product_sale) from products WHERE cate_id=?";
        return $this->pdo_query($sql, $id);
    }
    public function getcountPro_page()
    {
        $sql = "select COUNT(product_id) from products order by products.product_id asc";
        return $this->pdo_query($sql);
    }
    public function getcountProsale()
    {
        $sql = "select COUNT(product_sale) from products WHERE product_sale >= 12 ORDER BY product_sale DESC";
        return $this->pdo_query($sql);
    }
    public function getcountProseach($key)
    {
        $sql = "SELECT COUNT(product_sale) FROM products hh JOIN categories lo ON lo.cate_id =hh.cate_id  WHERE hh.product_name  LIKE '%$key%' OR lo.cate_name LIKE '%$key%'";
        return $this->pdo_query($sql);
    }

    public function getsale1Proseach($trang, $sl_page, $so_luong_sp, $key)
    {
        if ($trang < 1) {
            $trang = 1;
        }
        if ($trang > $sl_page) {
            $trang = $sl_page;
        }
        $start = ($trang - 1) * $so_luong_sp;
        $sql = "SELECT * FROM products hh JOIN categories lo ON lo.cate_id =hh.cate_id  WHERE hh.product_name  LIKE '%$key%' OR lo.cate_name LIKE '%$key%' ORDER BY product_sale DESC LIMIT {$start},{$so_luong_sp}";

        return $this->pdo_query($sql);
    }

    public function getProAll_page($trang, $sl_page, $so_luong_sp)
    {
        if ($trang < 1) {
            $trang = 1;
        }
        if ($trang > $sl_page) {
            $trang = $sl_page;
        }
        $start = ($trang - 1) * $so_luong_sp;
        $sql = "SELECT * FROM $this->table
        inner join categories
        on categories.cate_id = products.cate_id
        inner join suppliers
        on suppliers.supplier_id = products.supplier_id  
        order by products.product_id asc
        LIMIT {$start},{$so_luong_sp}";

        return $this->pdo_query($sql);
    }

}
