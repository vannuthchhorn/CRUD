<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-dark">
<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
                <?php 
                    include_once "dbConnect.php";
                    $stu_id = $_GET['stu_id'];
                    $query = "SELECT * FROM tbl_student WHERE stu_id = $stu_id";
                    $result = mysqli_query($connect, $query);
                    if($result) {
                        foreach($result as $data) {
                ?>
            <div class="card bg-light shadow-lg">
                
                <div class="card-body">
                    <a href="index.php" class="btn btn-success">Go Back</a>
                    <hr>
                    <form action="#" method="post">
                        <!-- input username -->
                        <div class="form-group">
                            <label for="name">Student Name: </label>
                            <input type="text" id= "name" name="student-name" class="form-control" placeholder="Name" required value="<?php echo $data['stu_name'];?>">
                        </div>
                        <!-- input email -->
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" id="email" name="student-email" class="form-control" placeholder="Email" required value="<?php echo $data['stu_email'];?>">
                        </div>
                        
                        <!-- input gender -->
                        <div class="form-group">
                            <label for="gender">Gender: </label>
                            <select name="student-gender" id="gender" class="form-control">
                        <option value="Male"<?php if($data['stu_gender']=="Male"){ ?> selected="selected" <?php } ?>>Male</option>
                                <option value="Female"<?php if($data['stu_gender']=="Female"){ ?> selected="selected" <?php } ?>>Female</option>
                            </select>
                        </div>
                         <!-- input age  -->
                         <div class="form-group">
                            <label for="age">Age: </label>
                            <input type="number" id="age" name="student-age" class="form-control" placeholder="Age" required value="<?php echo $data['stu_age']?>">
                        </div>
                        <!-- button submit and reset -->
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="btn-submit">Edit Information</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php      
                        }  
                }
                if(isset($_POST['btn-submit'])) {
                    $name = $_POST['student-name'];
                    $email = $_POST['student-email'];
                    $gender = $_POST['student-gender'];
                    $age = $_POST['student-age'];

                    $query = "UPDATE tbl_student SET stu_name='$name', stu_email= '$email', stu_gender= '$gender', stu_age='$age'  WHERE stu_id = $stu_id";
                    $result = mysqli_query($connect, $query);
                    if($result) {
                        header("Location: index.php");
                    }else{
                        echo (" Cannot insert data!!!");
                    }
                }
            ?>
        </div>
        <div class="col-3"></div>
    </div>
</div>
</body>
</html>