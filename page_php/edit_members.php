<?php
include('../config/connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM members where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



?>
<!doctype html>
<html lang="en">

<head>
<?php
    include('head.php');
    ?>
       <link rel="stylesheet" href="../css/style_profile.css">
    <title>แก้ไขข้อมูลสมาชิก</title>
   



</head>

<body>
    <?php
    include('navbar.php');
    ?>

    <div id="con-top" class="container">
        <hr>
        <h3> แก้ไขข้อมูลสมาชิก</h3>
        <div class="row">
            <form id="form" action="../config/update_members.php" method="POST">
                <input type="hidden"value="<?php echo $row["id"]; ?>" name="id">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">ชื่อ</label>
                    <div class="col-md-4">
                        <input id="fname" name="fname" type="text" placeholder="กรุณากรอกชื่อ " value="<?php echo $row["frist_name"]; ?>" class="form-control input-md" required="">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">นามสกุล</label>
                    <div class="col-md-4">
                        <input id="lname" name="lname" type="text" value="<?php echo $row["last_name"]; ?>" placeholder="กรุณากรอกนามสกุล" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="lname">ชื่อผู้ใช้</label>
                    <div class="col-md-4">
                        <input id="username" name="username" type="text" value="<?php echo $row["username"]; ?>" placeholder="กรุณากรอกชื่อผู้ใช้" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">รหัสผ่าน</label>
                    <div class="col-md-4">
                        <input id="password" name="password" type="password" placeholder="*********" value="<?php echo $row["password"]; ?>" class="form-control input-md" onkeyup='check();' required="">
                        <span id='pwd_message'></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password_confirm">ยืนยันรหัสผ่าน</label>
                    <div class="col-md-4">
                        <input id="re-password" name="password_confirm" type="password" placeholder="*********" value="<?php echo $row["password"]; ?>" class="form-control input-md" onkeyup='check();' required="">
                        <span id='message'></span>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">อีเมล</label>
                    <div class="col-md-4">
                        <input id="email" name="email" type="email" value="<?php echo $row["email"]; ?>" placeholder="james@example.com" class="form-control input-md" required="">

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="age">อายุ</label>
                    <div class="col-md-4">
                        <input id="age" name="age" type="text" value="<?php echo $row["age"]; ?>" placeholder="21" class="form-control input-md" required="">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-0 control-label">เพศ </label><br>
                    <?php
                    if ($row["gender"] == "male") {
                        echo "
                        <input class='form-check-input' type='radio' name='gender' value='male'checked>
                        <label class='form-check-label' >
                            ชาย
                            </label>";
                        echo "
                            <input class='form-check-input' type='radio' name='gender' value='female'>
                            <label class='form-check-label' >
                                หญิง
                                </label>";
                        echo "
                                <input class='form-check-input' type='radio' name='gender' value='other'>
                                <label class='form-check-label' >
                                    อื่นๆ
                                    </label>";
                    } else if ($row["gender"] == "female") {
                        echo "
                        <input class='form-check-input' type='radio' name='gender' value='male'>
                        <label class='form-check-label' >
                            ชาย
                            </label>";
                        echo "
                            <input class='form-check-input' type='radio' name='gender' value='female' checked>
                            <label class='form-check-label' >
                                หญิง
                                </label>";
                        echo "
                                <input class='form-check-input' type='radio' name='gender' value='other'>
                                <label class='form-check-label' >
                                    อื่นๆ
                                    </label>";
                    } else { {
                            echo "
                        <input class='form-check-input' type='radio' name='gender' value='male'>
                        <label class='form-check-label' >
                            ชาย
                            </label>";
                            echo "
                            <input class='form-check-input' type='radio' name='gender' value='female' >
                            <label class='form-check-label' >
                                หญิง
                                </label>";
                            echo "
                                <input class='form-check-input' type='radio' name='gender' value='other'checked>
                                <label class='form-check-label' >
                                    อื่นๆ
                                    </label>";
                        }
                    }


                    ?>
                    <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender" name="gender" value="male">
                        <label class="form-check-label" for="gender ">
                            ชาย
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender" name="gender" value="female">
                        <label class="form-check-label" for="gender">
                            หญิง
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender" name="gender" value="other">
                        <label class="form-check-label" for="gender">
                            อื่นๆ
                        </label>
                    </div> -->
                </div>
                <!-- Text input -->
                <div class="form-group">
                    <label class="col-md-4 control-label">เบอร์โทร</label>
                    <div class="col-md-4">
                        <input id="phone" type="text" name="phone" value="<?php echo $row["phone"]; ?>" placeholder="กรุณากรอกเบอร์โทรศัพท์" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="control-label " for="save"></label>
                    <div class="col ">
                        <button type="submit"  class="btn btn-success" onclick="return confirm('คุณต้องการแก้ไขข้อมูลนี้หรือไม่')">Update</button>
                        <button id="clear" type="reset" class="btn btn-danger">Reset</button>
                        <button id="login" class="btn btn-primary"><a class="login" href="" style="color: white;">Home</a></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <br>
    <!-- ส่วนล่าง -->
    <?php
    include('footer.php');
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>