<?php
require_once './studentcls.php';

// Check if the button was clicked and form method is POST
  $studentObject = new student();
    // get all student info
   $id = $_GET['id'];

   $data = $studentObject->getSingleStudentById($id);

   $student = mysqli_fetch_assoc($data);


  //  update student
  if (isset($_POST['btn'])) {
    $studentObject->updateStudentInfo($_POST);
  }

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update student</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto py-10 lg:px-0  px-5">
    <div class="">
      <div class=''>
          <?php
            if(isset($_GET['info'])){
              echo "<h4 class='p-3 rounded mb-2 bg-green-400 text-white rounded'>".$_GET['info']. "</h4>";
          }
          ?>
          <form method='post' action='' class="mx-auto md:w-4/5 lg:w-3/5  border border-1 p-5 rounded shadow-lg" >
          <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name </label>
            <input type="text" id="name" 
            name='name'
            value="<?php  echo $student['name']; ?>"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="enter your name" required />

          <input type="hidden" id="name" 
            name='id'
            value="<?php  echo $student['id']; ?>" />
          </div>

          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email"  value="<?php  echo $student['email']; ?>" id="email"  name ='email' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
          </div>
          
          <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone </label>
            <input type="text" id="phone"  value="<?php  echo $student['phone']; ?>" name='phone' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="enter your phone" required />
          </div>
          
          <input type="submit" value='Update' name='btn'  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
         
        </form>

      </div>
  
    </div>
  </div>
</body>
</html>