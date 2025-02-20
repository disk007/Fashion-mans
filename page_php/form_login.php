<!doctype html>
<html lang="en">

<head>

<?php
  include('head.php');
  ?>

  <style>
    body {
      background-image: url("../img/bg/x.jpg");
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;

    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col form-login">
        <div id="form_login" class=" p-4 max-w-md bg-white rounded-lg border border-gray-200 shadow-md md:p-5 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
          <form class="space-y-6" action="../php/check_login.php" method="POST">
            <h3 class="text-center text-xl font-medium text-gray-900 dark:text-white">ลงชื่อเข้าใช้งาน</h3>
            <div>
              <label for="username" class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300">บัญชีผู้ใช้</label>
              <input type="text" name="Username" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="กรุณากรอกชื่อผู้ใช้งาน" required="">
            </div>
            <div>
              <label for="password" class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300">รหัสผ่าน</label>
              <input type="password" id="password" name="password" placeholder="••••••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
            </div>
            <div class="flex items-start">
              <div class="flex items-start">
                <!-- <div class="flex items-center h-5">
                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                </div> -->
                <!-- <div class="ml-3 text-md">
                  <label for="remember" class="font-medium text-gray-900 dark:text-gray-300">จดจำรหัสผ่าน</label>
                </div> -->
              </div>
              <!-- <a href="#" class="ml-auto text-md text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a> -->
            </div>
            <button type="submit" name="login" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
            <div class="text-md font-medium text-gray-500 dark:text-gray-300">
              ยังไม่ได้ลงทะเบียน? <a href="form_register.php" class="text-blue-700 hover:underline dark:text-blue-500">สร้างบัญชีผู้ใช้ใหม่</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>


</html>