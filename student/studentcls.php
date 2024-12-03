<?php
 require_once '../connection.php';

class student{
  
   //store student info
   public function storeStudentInfo($data){
    // echo '<pre>';
    // print_r($data);
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
 
    $query = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if(mysqli_query(dbConnection::connection(),$query)){
      
    //  echo 'Data inserted successfully';
    header("Location:index.php?info=".urldecode("Data inserted successfully"));
      
  } else{
     echo 'query problem';
  }
}//end method


// get all student info
  public function getAllStudentInfo(){
      $query="SELECT * FROM students";
      if(mysqli_query(dbConnection::connection(),$query)){
        $data=mysqli_query(dbConnection::connection(),$query);
        // $row=mysqli_fetch_assoc($data);
        // echo '<pre></pre>';
        // print_r($row);

        return $data;
      }else{
        echo 'Query Problem';
      }
  }

  public function getSingleStudentById($id){
    $query="SELECT * FROM students WHERE id='$id'";

    if(mysqli_query(dbConnection::connection(),$query)){
      $data=mysqli_query(dbConnection::connection(),$query);
      return $data;
    //  echo 'Data deleted successfully';

    // header("Location:index.php?messages=".urldecode("Data deleted successfully"));
      
  } else{
    echo 'query problem';
  }
  }

// update student info
  public function updateStudentInfo($data){
    // echo '<pre>';
    // print_r($data);
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
 
    $query = "UPDATE  students  SET name = '$name', email ='$email', phone='$phone'  WHERE id='$id' ";

    if(mysqli_query(dbConnection::connection(),$query)){
      
    //  echo 'Data inserted successfully';
    header("Location:index.php?messages=".urldecode("Data updated successfully"));
      
  } else{
     echo 'query problem';
  }
}//end method

  public function deleteSingleStudent($id){
        $query="DELETE FROM students WHERE id='$id'";

        if(mysqli_query(dbConnection::connection(),$query)){
          
        //  echo 'Data deleted successfully';
        header("Location:index.php?messages=".urldecode("Data deleted successfully"));
          
      } else{
        echo 'query problem';
      }
  }


}

?>