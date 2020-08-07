<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="feedback";

// Create connection
$con =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$dep =$_POST['department'];
$cou =$_POST['course'];
$sem =$_POST['semester'];
$sub =$_POST['subject'];
$sql1 = "SELECT Faculty ,count(*) AS TotalFeed FROM feedback WHERE Department='$dep' AND Course='$cou' AND Semester=$sem AND Subject_Name='$sub'  ";
$result1 = mysqli_query($con,$sql1);
$res1=mysqli_fetch_assoc($result1);
$sql2 = "SELECT * FROM feedback WHERE Department='$dep' AND Course='$cou' AND Semester='$sem' AND Subject_Name='$sub'";
$result2 = mysqli_query($con,$sql2);
$sum=0;
$count=0;
while($res2 = mysqli_fetch_assoc($result2)){

    $s = $res2['Q1']+$res2['Q2']+$res2['Q3']+$res2['Q4']+$res2['Q5']+$res2['Q6']+$res2['Q7']+$res2['Q8']+$res2['Q9']+$res2['Q10'];
    $sum = $sum + ($s*100)/50;
    $count=$count+1;
}
$sum=number_format((float)($sum/$count), 2, '.', '');
?>
<!DOCTYPE html>
<head>
<style>
    table {
        border:2px solid black;
    }
</style>
</head>
<body>
    <h1 style="text-align:center;">Welcome</h1>
    
<button onclick="window.location.href='login.php';">signin</button>
<button onclick="window.location.href='signup.php';">signup</button>
    <hr><br>
<div style="padding:20px 0px 20px 300px;">
<table>
           <tr >
               <td style="border-right: 2px solid black;padding:5px;">Faculty Name: <?php echo $res1['Faculty'] ?></td>
               <td style="border-right: 2px solid black;padding:5px;">Total Feedback: <?php echo $res1['TotalFeed'] ?></td>
               <td style="border-right: 2px solid black;padding:5px;">Average Feedback Score: <?php echo $sum."%" ?></td>
               <td style="padding:5px;"><form action="display_feedback_report.php" method="GET">
                     <input type="hidden" name="department" value="<?php echo $_POST['department'] ?>" >
                     <input type="hidden"  name="course" value="<?php echo $cou ?> ">
                     <input type="hidden"   name="semester" value="<?php echo $sem ?> ">
                     <input type="hidden"  name="subject" value="<?php echo $sub ?> ">
                     <input type="hidden"  name="sum" value="<?php echo $sum ?> ">
                     <button type="submit">Click Here</button>
                   </form></td>
</tr>
</table> 

</div>
</body>
</html>