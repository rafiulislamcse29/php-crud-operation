<?php
 class dbConnection{
  static public function connection(){
    $hostName='localhost';
    $userName='root';
    $password='';
    $dbName='php_crud_operation';
    
    $link=mysqli_connect($hostName,$userName,$password,$dbName);
      // if($link){
      //   echo 'success';
      // }
    return $link;
  } 
 }

?>