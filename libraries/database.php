<?php

class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $db_name = DB_NAME;

    public $link;
    public $error;

public function __construct(){
    $this->connect();
}
/*
 * connector
 */

private function connect(){
    $this->link = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
    if(!$this->link){
        $this->error = "Failed to Connect".$this->link->connect_error;
        return false;
        }
    }
 
/*
 * select
 */
public function select($query){
$result = $this->link->query($query) or die($this->link->error.__Line__);
if($result-> num_rows > 0){
    return $result;
    }else{
        return false;
    }
}
/*
 * insert
 */
public function insert($query){
    $insert_row = $this->link->query($query) or die($this->link->error.__Line__);
    if($insert_row){
      //  header('location:index.php?msg='.urldecode('Record Added'));
       // exit();
    }else{
        die('Error : ('.$this->link->error.') '.$this->link->error);
    }
}

/*
 * update
 */
public function update($query){
    $update_row = $this->link->query($query) or die($this->link->error.__Line__);
    if($update_row){
       // header('location:index.php?msg='.urldecode('Record updated'));
       //exit();
        ?>
<script>
    alert("Record has been updated");
</script>
            <?php
    }else{
        die('Error : ('.$this->link->error.')');
    }
}

    
}


