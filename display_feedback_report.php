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

$dep =$_GET['department'];
$cou =$_GET['course'];
$sem =$_GET['semester'];
$sub =$_GET['subject'];
$sum =(float)$_GET['sum'];
$sql1 = "SELECT Faculty ,count(*) AS TotalFeed FROM feedback WHERE Department='$dep' AND Course='$cou' AND Semester='$sem' AND Subject_Name='$sub'  ";
$result1 = mysqli_query($con,$sql1);
$res1=mysqli_fetch_assoc($result1);
$sql2 = "SELECT * FROM feedback WHERE Department='$dep' AND Course='$cou' AND Semester='$sem' AND Subject_Name='$sub'";
$result2 = mysqli_query($con,$sql2);



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
<div style="padding:20px 0px 20px 400px;">
<table>
           <tr >
               <td style="border-right: 2px solid black;padding:5px;">Faculty Name: <?php echo $res1['Faculty'] ?></td>
               <td style="border-right: 2px solid black;padding:5px;">Total Feedback: <?php echo $res1['TotalFeed'] ?></td>
               <td style="padding:5px;">Average Feedback Score: <?php echo $sum."%" ?></td>
</tr>
</table> 

</div>
<div style="padding:80px ;">

           <div style="border:2px solid black;padding:2px;" >
               <span style="border-right: 2px solid black;padding:5px;padding-right:300px;">Faculty Name: <?php echo $res1['Faculty'] ?></span>
               <span style="border-right: 2px solid black;padding:5px;padding-right:300px;">Department: <?php echo $dep ?></span>
               <span style="padding:5px;padding-right:200px;">Course Name: <?php echo $cou ?></span>
               
</div>
<div style="border-left:2px solid black;padding:2px;border-right:2px solid black;">
               <span style="border-right: 2px solid black;padding:5px;padding-right:385px;">Subject: <?php echo $sub ?></span>
               <span style="border-right: 2px solid black;padding:5px;padding-right:340px;">Semester: <?php echo $sem ?></span>
               <span style="padding:5px;padding-right:200px;">Total Feedback: <?php echo $res1['TotalFeed'] ?></span>

</div>
<table>
<tr>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Student No.</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(a):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(b):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(c):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(d):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(e):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(f):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(g):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(h):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(i):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Que.(j):(out of 5)</td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Total Score</td>
              

</tr>
<?php $x=1; ?>
<?php while($res2 = mysqli_fetch_assoc($result2)) : ?> 
<tr>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo "Student-".$x ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q1'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q2'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q3'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q4'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q5'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q6'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q7'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q8'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q9'] ?></td>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $res2['Q10'] ?></td>
               <?php $sum1 = $res2['Q1']+$res2['Q2']+$res2['Q3']+$res2['Q4']+$res2['Q5']+$res2['Q6']+$res2['Q7']+$res2['Q8']+$res2['Q9']+$res2['Q10'];
                 $per = number_format((float)(($sum1*100)/50), 2, '.', '');
                 ?>
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;"><?php echo $sum1."/50=".$per."%" ?></td>
               <?php $x=$x+1; ?>
</tr>
<?php endwhile; ?>
<tr>
<td style="border-right: 2px solid black;padding:5px;"><?php echo "Average Feedback Score:".$sum."%" ?></td>
</tr>
</table> 

</div>
</body>
</html>