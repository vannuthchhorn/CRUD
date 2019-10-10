<?php 
 include_once "dbConnect.php";
 $stu_id = $_GET['stu_id'];
 $query = "DELETE FROM tbl_student WHERE stu_id = $stu_id";
 $result = mysqli_query($connect, $query);
 if ($result) {
     header("Location: index.php");
 }else{
     echo ("Cannot delete data!!!");
 }
?>  