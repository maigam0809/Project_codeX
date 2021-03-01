<?php
class Db
{
    public $con;
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'mvc-project';

    public $message; 

    public function __construct()
    {
        if (!$this->con) {
            $this->con = new PDO("mysql:host=$this->servername; dbname=$this->dbname; charset=utf8", $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        // var_dump($sql_args);
        try {
            $conn = $this->con;
            $stmt = $conn->prepare($sql);
            
            if(!$stmt->execute($sql_args)){
                $this->message = 'false';
            }
        } catch (PDOException $e) {
            throw $e;
            echo $e->getMessage();
        } finally {
            unset($conn);
        }
    }
    public function pdo_query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->con;
            $stmt = $conn->prepare($sql);
            if(!$stmt->execute($sql_args)){
                $this->message = 'false';
            }else{
                $rows = $stmt->fetchAll();
                return $rows;
            }
        } catch (PDOException $e) {
            throw $e;
            echo $e->getMessage();
        } finally {
            unset($conn);
        }
    }

    function pdo_query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->con;
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            if(!$stmt->execute($sql_args)){
                $this->message = 'false';
            }else{
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            }
            
        } catch (PDOException $e) {
            throw $e;
            echo $e->getMessage();
        } finally {
            unset($conn);
        }
    }
    
}
