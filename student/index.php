<?php
// require_once '../connection.php';
require_once './studentcls.php';

// Check if the button was clicked and form method is POST

  $studentObject = new student();

  // post student info
  if (isset($_POST['btn'])) {
  $studentObject->storeStudentInfo($_POST);
  }

    // get all student info
    $data=$studentObject->getAllStudentInfo();

  // mysqli_fetch_assoc($data);
  // echo '<pre></pre>';
  // print_r($data);


  // delete single student
  if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $studentObject->deleteSingleStudent($id);
  }
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php crud operation</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto py-10 lg:px-0  px-5">
    <div class="grid grid-cols-1 lg:grid-cols-4  gap-10">
      <div class='col-span-1 '>
          <?php
            if(isset($_GET['info'])){
              echo "<h4 class='p-3 rounded mb-2 bg-green-400 text-white rounded'>".$_GET['info']. "</h4>";
          }
          ?>
          <form method='post' action='' class="mx-auto border border-1 p-5 rounded shadow-lg" >
          <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name </label>
            <input type="text" id="name" 
            name='name'
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="enter your name" required />
          </div>

          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email"  name ='email' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
          </div>
          
          <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone </label>
            <input type="text" id="phone" name='phone' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="enter your phone" required />
          </div>
          
          <input type="submit" value='Submit' name='btn'  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
         
        </form>

      </div>
      <div class='col-span-1 lg:col-span-3 '>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <?php
            if(isset($_GET['messages'])){
              echo "<h4 class='p-3 rounded mb-2 bg-red-400 text-white rounded'>".$_GET['messages']. "</h4>";
          }
          ?>
            <table class="border table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            SL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?php while($row=mysqli_fetch_assoc($data)){?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['id'] ?>
                        </th>
                        <td class="px-6 py-4">
                         <?php echo $row['name'] ?>
                        </td>
                        <td class="px-6 py-4">
                        <?php echo $row['email'] ?>
                        </td>
                        <td class="px-6 py-4">
                        <?php echo $row['phone'] ?>
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                        <a href="edit.php?id=<?php echo $row['id'];?>" class="font-medium bg-gray-300 p-2  rounded text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-5 h-5 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                          </svg>
                    </a>
                      <a href="?delete=true&id=<?php echo $row['id'];?>" onclick="return confirm('Are you want to delete this student???');" class="font-medium bg-red-500 p-2  rounded  text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-5 h-5 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    </a>
                      </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>
</body>
</html>

<!-- 19*3.25+19.5*3.37+18.5*3.42+19.5*3.52+21.5*3.24+19.5*3.43+20.5*3.207+3*22 -->