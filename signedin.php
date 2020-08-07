<?php
session_start();
echo "session id:".session_id();
$conn = mysqli_connect("localhost","root","","university");
if(!$conn)
    echo "connection failed!";
?>
<?php

if(isset($_GET['submit'])){
    $sql = mysqli_query($conn,"select * from student where scholar_no ='{$_GET['user']}' and pwd ='{$_GET['pwd']}';");
    if(isset($_SESSION['active'])){
        if($_SESSION['active'] =="std_logout")
         header("Location: login.php");   
    }
    if(mysqli_num_rows($sql) != 1){
        
        header("Location: login.php?submit=error");
        exit();
    }else if(mysqli_num_rows($sql) == 1){
       $x1=mysqli_fetch_assoc($sql);
        $_SESSION['active']="std_login";
        $_SESSION['scholar_no']=$x1['scholar_no'];
        $_SESSION['email']=$x1['email'];
        $_SESSION['sname']=$x1['name'];
        $_SESSION['dept'] =$x1['dept'];
        $_SESSION['course'] =$x1['course'];
        $_SESSION['sem'] =$x1['sem'];
        
        echo "<br>student login successful <br><br>";
        echo "<h1 style=\"text-align:center\">Welcome {$_SESSION['sname']} </h1>";
        echo "<button onclick=\"window.location.href = 'feedback.php';\">Feedback Form</button>";
        echo "<button onclick=\"window.location.href = 'Logout.php';\">Logout</button>";
       echo "<hr><h3>scholar No. : {$_SESSION['scholar_no']} </h3>";
       echo "<h3>Email : {$_SESSION['email']} </h3>";
       echo "<h3>Department : {$_SESSION['dept']} </h3>";
       echo "<h3>course : {$_SESSION['course']} </h3>";
       echo "<h3>Semester : {$_SESSION['sem']} </h3>";
    }
        
}

?>