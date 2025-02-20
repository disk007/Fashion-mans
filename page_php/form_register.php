<!doctype html>
<html lang="en">

<head>
  <?php
  include('head.php');
  include('../php/connect.php');
  ?>

  <title>สมัครสมาชิก</title>
  <link rel="stylesheet" href="../css/style_index.css">


  <style>
    .div.div.row {
      margin: auto;
      padding: auto;
    }
  </style>
</head>

<body>
  <?php
  include('../page_php/navbar.php');

  ?>
  

  <div class="container">
    <br>
    <div class="row justify-content-start mx-5 py-3">
      <hr>
      <div class="row justify-content-center  ">
        <div class="col col-md-6 col-lg-5 ms-5">
          <h3 class="text-Dark"> สมัครสมาชิก</h3>
          <form id="form" action="../php/process_register.php" method="POST">
            <div class="form-group ">
              <label class=" control-label" for="name">ชื่อ-สกุล</label>
              <div class="col ">
                <input id="name" name="name" type="text" placeholder="กรุณากรอกชื่อ " class="form-control " required="">

              </div>
            </div>
            <!-- <div class="form-group">
              <label class=" control-label" for="name">นามสกุล</label>
              <div class="col">
                <input id="lname" name="lname" type="text" placeholder="กรุณากรอกนามสกุล" class="form-control " required="">
              </div>
            </div> -->

            <!-- Text input-->
            <div class="form-group">
              <label class=" control-label" for="lname">ชื่อผู้ใช้</label>
              <div class="col">
                <input id="username" name="username" type="text" placeholder="กรุณากรอกชื่อผู้ใช้" class="form-control " required="">

              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class=" control-label" for="password">รหัสผ่าน</label>
              <div class="col">
                <input id="password" name="password" type="password" placeholder="*********" class="form-control " onkeyup='check();' required="">
                <span id='pwd_message'></span>
              </div>
            </div>
            <div class="form-group">
              <label class=" control-label" for="password_confirm">ยืนยันรหัสผ่าน</label>
              <div class="col">
                <input id="re-password" name="password_confirm" type="password" placeholder="*********" class="form-control " onkeyup='check();'" required="">
              <span id='message'></span>
            </div>
          </div>


          <!-- Text input-->
          <div class=" form-group">
                <label class=" control-label" for="email">อีเมล</label>
                <div class="col">
                  <input id="email" name="email" type="email" placeholder="james@example.com" class="form-control " required="">

                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class=" control-label" for="age">อายุ</label>
                <div class="col">
                  <input id="age" name="age" type="number" placeholder="21" class="form-control " required="">
                </div>

              </div>

              <!-- Text input -->
              <div class="form-group">
                <label class=" control-label">เบอร์โทร</label>
                <div class="col">
                  <input id="phone" type="text" name="phone" placeholder="กรุณากรอกเบอร์โทรศัพท์" class="form-control " pattern="[0-9]{10}" required="">
            </div>
          </div>

          <!-- Button (Double) -->
          <div class=" form-group">
                  <label class="control-label " for="save"></label>
                  <div class="col">
                    <button type="submit" id="register" name="register" class="btn btn-success">OK</button>
                    <button id="clear" type="reset" class="btn btn-danger">Reset</button>
                    <button id="login" class="btn btn-primary"><a class="login" href="form_login.php" style="color: white;">Login</a></button>
                  </div>

                </div>
          </form>

        </div>
        <div class="col-md-6 col-lg-5 col-xl mt-3 m-0 p-0">
        <i> <h4 class="p-0 mt-4 text-center  rounded-4 "style="font-size: 1.3rem; color:#2980b9">
            "ขอบคุณที่ท่านสมัครสมาชิก" </h4> </i>
          <img src="../img/pic all/Checklist.jpg" class="img-fluid" alt="">
          <p class="text-center  text-info m-0 p-0" style="font-size: 1.1rem;">เราขอขอบคุณที่ท่านให้ความสนใจและร่วมเป็นส่วนหนึ่งของระบบสมาชิกของเรา 
          </p>
          <p class="text-center  p-0 m-0"style="font-size: 1.1rem;">
            หากมีคำถามหรือข้อเสนอแนะเพิ่มเติม </p>
            <p class="text-center  p-0 m-0"style="font-size: 1.1rem;">กรุณาติดต่อ : jamesjbbsp@gmail.com

            </p>
          
        </div>



      </div>
    </div>
    <br>
  </div>
  <!-- ส่วนล่าง -->
  <?php
  include('footer.php');
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script>
    check = () => {
      if (!document.getElementById('password').value.match(/^([a-z0-9])+$/i)) {
        document.getElementById("register").disabled = true;
        document.getElementById('pwd_message').style.color = 'red';
        document.getElementById('pwd_message').innerHTML = 'กรอกภาษาไทยไม่ได้';
      } else {
        document.getElementById('pwd_message').innerHTML = '';

        if (document.getElementById('password').value ==
          document.getElementById('re-password').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'รหัสผ่านตรงกัน';
          document.getElementById("register").disabled = false;
        } else {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'รหัสผ่านไม่ตรงกัน';
          document.getElementById("register").disabled = true;
        }
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

</body>

</html>