<?php

class Database
{   
    private static $dbh;
    private static $res,$sql,$data,$count;
    public function __construct()
    {
        self::$dbh = new PDO("mysql:host=localhost;dbname=my_blog;","","");  
        self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    public static function raw($sql)
    {
        self::$sql = $sql;
        $db= new Database();
        $db->query();
        return $db;
    }
    public static function table($table)
    {
        self::$sql = "select * from $table";
        $db = new Database();
        $db->query();
        return $db;
    }
    public static function insert($table,$data)
    {
        $col=implode(',',array_keys($data));
        $value = array_values($data);
        $v="";
        $x=1;
        foreach($data as $d){
            $v.="?";
            if($x<count($data)){
                $v.=',';
                $x++;
            }
            
        }
        self::$sql = "insert into $table ($col) values ($v)";
        $db = new Database();
        $values = array_values($data);
        $db->query($values);
        $id= self::$dbh->lastInsertId();
        return $db::table($table)->where('id',$id)->getOne();
    }
    public static function update($table,$data,$id)
    {
        $value = "";
        $x=1;
        foreach($data as $k=>$v){
            $value.="$k=?"; 
            if($x<count($data)){
                $value.=',';
                $x++;
            }
        }
        self::$sql = "update $table set $value where id=$id";
        $db = new Database();
        $update = array_values($data);
        $db->query($update);
        return $db::table($table)->where('id',$id)->getOne();
    }
    public static function delete($table){
        self::$sql="delete from $table";
        $db= new Database();
        return $db;
    }
    public function query($params=[])
    {
        self::$res = self::$dbh->prepare(self::$sql);
        self::$res->execute($params);
        return $this;
    }
    public function getAll()
    {   
        $data = self::$res->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    public function getOne()
    {
        $data = self::$res->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function count()
    {
        $count = self::$res->rowCount();
        return $count;
    }
    public function orderBy($col,$pattern="asc")
    {
        self::$sql .= " order by $col $pattern";
        $this->query();
        return $this;
    }
    public function where($col,$operator,$value="=")
    {
        if(func_num_args()==2){
            $sql = " where $col='$operator'";
        }
        else{
            $sql = " where $col $operator '$value'";
        }
        self::$sql.=$sql;
        $this->query();
        return $this;
    }

    public function andWhere($col,$operator,$value="=")
    {
        if(func_num_args()==2){
            $sql = " and $col='$operator'";
        }
        else{
            $sql = " and $col $operator '$value'";
        }
        self::$sql.=$sql;
        $this->query();
        return $this;
    }
    public function orWhere($col,$operator,$value="=")
    {
        if(func_num_args()==2){
            $sql = " or $col='$operator'";
        }
        else{
            $sql = " or $col $operator '$value'";
        }
        self::$sql.=$sql;
        $this->query();
        return $this;
    }
    public function paginate($record_per_page,$append=""){
        if(isset($_GET['page_no'])){
            $page_no=$_GET['page_no'];
            
        }if(!isset($_GET['page_no']) || $_GET['page_no']<1){
            $page_no=1;
        }
        $index = ($page_no - 1)*$record_per_page;
        $total = self::$res->rowCount();
        // if($_GET[])
        self::$sql .= " limit $index,$record_per_page";
        $this->query();
        self::$data = $this->getAll();
        $next_no = $page_no + 1;
        $pre_no= $page_no - 1;
        $pre_page = "?page_no=$pre_no&".$append;
        $next_page = "?page_no=$next_no&$append";
        $data = [
            'data' => self::$data,
            'count' => $total,
            'prev_page' => $pre_page,
            'next_page' => $next_page
        ];
        return $data;
       
    }
}

// $articles = Database::table('articles')->paginate(2,"category=hi");
// print_r($articles);
// print_r($articles);

?>

