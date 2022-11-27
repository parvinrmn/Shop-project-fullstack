<?php
namespace App\Model;
use App\Http\Config;
class DB
{
    private static $instance = null;
    private static $connstr = null;
    private static $query = null;
    private static $table = null;

    private function __construct(){}

    public static function table($table)
    {
        self::$instance = new Self;
        self::$connstr = mysqli_connect(Config::HOSTNAME,Config::USERNAME,Config::PASSWORD,Config::DBNAME);
        self::$table = $table;
        self::$query = "select * from " . self::$table ;
        return self::$instance;
    }
    public function where($field , $opr , $val){
        self::$query .= " where {$field} {$opr} '{$val}'";
        return $this;
    }
    public function andWhere($field,$opr,$val)
    {
        self::$query .= " and {$field} {$opr} '{$val}'";
        return $this;
    }
    public function orWhere($field,$opr,$val)
    {
        self::$query .= " or {$field} {$opr} '{$val}'";
        return $this;
    }
    public function get()
    {
        $execute = mysqli_query(self::$connstr,self::$query);
        $result = [];
        while($res = mysqli_fetch_assoc($execute)){
            array_push($result,$res);
        }
        return json_encode($result);
    }

    public function add(array $fields ,array $values)
    {
        $fields = implode("`,`",$fields);
        $values = implode("','",$values);
        self::$query = "insert into `" . self::$table  . "` (`$fields`) VALUES ('$values')";
        $execute = mysqli_query(self::$connstr,self::$query);
        return true;
    }

    public static function delete($tblNum ,$id)
    {

        self::$query = "DELETE FROM `$tblNum` WHERE `$tblNum`.`id` = $id";
        $myconnstr = mysqli_connect(Config::HOSTNAME,Config::USERNAME,Config::PASSWORD,Config::DBNAME);

        $execute = mysqli_query($myconnstr,self::$query);
        return true;
    }
    public static function creatTable($name)
    {
        self::$query = "CREATE TABLE `$name` (
                id INT NOT NULL AUTO_INCREMENT,
                InvoiceId int ,
                PCode varchar(10) not null ,
                productName varchar(255) NOT NULL,
                price int(255) NOT NULL,
                PRIMARY KEY (id))ENGINE = InnoDB"
;

        $myconnstr = mysqli_connect(Config::HOSTNAME,Config::USERNAME,Config::PASSWORD,Config::DBNAME);
        $execute = mysqli_query($myconnstr,self::$query);
    }

    public static function dropTable($name)
    {
        self::$query = "DROP TABLE IF EXISTS `$name`";
        $myconnstr = mysqli_connect(Config::HOSTNAME,Config::USERNAME,Config::PASSWORD,Config::DBNAME);
        $execute = mysqli_query($myconnstr,self::$query);
    }

    public static function showTables()
    {
        self::$query = "SELECT table_name FROM information_schema.tables
                WHERE table_schema = 'shop';
                ";
        $myconnstr = mysqli_connect(Config::HOSTNAME,Config::USERNAME,Config::PASSWORD,Config::DBNAME);
        $execute = mysqli_query($myconnstr,self::$query);
    }
}