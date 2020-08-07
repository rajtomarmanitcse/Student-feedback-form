<?php
session_start();
$conn =mysqli_connect("localhost","root","","feedback");
if($conn)
    echo "connection successful";

echo "<h1 style=\"text-align:center\">Welcome</h1>";
echo "<button onclick=\"window.location.href = 'Logout.php';\">Logout</button><hr>";
?>
<html>
<head><title>feddback</title>
    <style>
        table,tr,th,td{
            border: 1px solid black  ;
            padding: 15px ;
        }
    </style>
    </head>
<body>
<?php
if(isset($_POST['submit']))
{
    $dep =$_POST['department'];
$cou =$_POST['course'];
$sem =$_POST['semester'];
$sub =$_POST['subject'];
$fac =$_POST['faculty'];
$q1 =(int)$_POST['1'];
$q2 =(int)$_POST['2'];
$q3 =(int)$_POST['3'];
$q4 =(int)$_POST['4'];
$q5 =(int)$_POST['5'];
$q6 =(int)$_POST['6'];
$q7 =(int)$_POST['7'];
$q8 =(int)$_POST['8'];
$q9 =(int)$_POST['9'];
$q10 =(int)$_POST['10'];
$com =$_POST['comments'];

$query = "INSERT INTO feedback(Department,Course,Semester,Subject_Name,Faculty,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Comments ) VALUES ('$dep','$cou','$sem','$sub','$fac','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$com')";
if(!mysqli_query($conn,$query))
{
    die('Error in inserting records'.mysqli_connect_error());
}
else{
    ?>
<h1 style="text-align:center">Your feedback is submitted successfully</h1>

<?php
}
$sql ="SELECT * FROM feedback ";

$feedback =  mysqli_query($conn,$sql);
?>
        
          <table class="table">
              <tr>
                  <td>SNo</td>
                  <td>Department</td>
                  <td>Course</td>
                  <td>Semester</td>
                  <td>Subject</td>
                  <td>Faculty</td>
                  <td>Q1</td>
                  <td>Q2</td>
                  <td>Q3</td>
                  <td>Q4</td>
                  <td>Q5</td>
                  <td>Q6</td>
                  <td>Q7</td>
                  <td>Q8</td>
                  <td>Q9</td>
                  <td>Q10</td>
                  <td>Comments</td>
              </tr>
          <?php while($feed = mysqli_fetch_assoc($feedback)) : ?> 
            <tr>
                <td><?php echo $feed['Sno'] ?></td>
                <td><?php echo $feed['Department'] ?></td>
                <td><?php echo $feed['Course'] ?></td>
                <td><?php echo $feed['Semester'] ?></td>
                <td><?php echo $feed['Subject_Name'] ?></td>
                <td><?php echo $feed['Faculty'] ?></td>
                <td><?php echo $feed['Q1'] ?></td>
                <td><?php echo $feed['Q2'] ?></td>
                <td><?php echo $feed['Q3'] ?></td>
                <td><?php echo $feed['Q4'] ?></td>
                <td><?php echo $feed['Q5'] ?></td>
                <td><?php echo $feed['Q6'] ?></td>
                <td><?php echo $feed['Q7'] ?></td>
                <td><?php echo $feed['Q8'] ?></td>
                <td><?php echo $feed['Q9'] ?></td>
                <td><?php echo $feed['Q10'] ?></td>
                <td><?php echo $feed['Comments'] ?></td>
            </tr>
            <?php endwhile; ?>
         </table>
    <?php
}else {
    ?>
    <form action="feedback.php" method="POST">
    <table style="width: 100%">
    <tr>
        <th colspan="6">STUDENT FEEDBACK FORM(2019-2020)</th>
        </tr>
    <tr>
        <th colspan="2">Department: <select name="department">
           <option >Select Department</option>
                     <option value="CSE">CSE</option>
                     <option value="ECE">ECE</option>
                     <option value="MECH">MECH</option>
                     <option value="EE">EE</option>
                     <option value="CIVIL">CIVIL</option>
                     <option value="MSME">MSME</option>
            </select></th>
        <th colspan="1">COURSE: <select name="course">
            <option >Select Course</option>
                    <option value="BTECH">BTECH</option>
                    <option value="MTECH">MTECH</option>
                    <option value="PHD">PHD</option>
            </select></th>
        <th colspan="1">SEMESTER: <select name="semester">
                    <option >Select Semester</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>             
                 </select></th>
        </tr>
    <tr>
        <th colspan="2">Subject Name: <select name="subject">
                    <option >Select Subject</option>
                    <option value="TOC">TOC</option>
                    <option value="CA">CA</option>
                    <option value="SE">SE</option>
                    <option value="PQT">PQT</option>
                    <option value="ADA">ADA</option>
                    <option value="DBMS">DBMS</option>
                 </select></th>
        <TH colspan="2">FACULTY : <select name="faculty">
                   <option >Select Faculty</option>
                   <option value="Nilay Khare">Nilay Khare</option>
                   <option value="Jaytrilok Chaudhary">Jaytrilok Chaudhary</option>
                   <option value="Shweta Jain">Shweta Jain</option>
                   <option value="Gagan Vishwakarma">Gagan Vishwakarma</option>
                   <option value="Vijay Bhaskar">Vijay Bhaskar</option>
                   <option value="Manish Pandey">Manish Pandey</option>
                </select> 
        
        </TH>
        </tr>
        <table style="width: 100%">
    <tr>
        <th>S.NO.</th>
        <TH>Parameter</TH>
        <th>5</th>
        <th>4</th>
        <th>3</th>
        <th>2</th>
        <th>1</th>
        </tr>
        <tr>
        <th>1.</th>
        <TH>Ability to explain the concepts and principle of subject.</TH>
        <td><input type="radio" name="1" value="5" > </td>
                    <td><input type="radio" name="1" value="4" > </td>
                    <td><input type="radio" name="1" value="3" > </td>
                    <td><input type="radio" name="1" value="2" > </td>
                    <td><input type="radio" name="1" value="1" > </td>
        </tr>
         <tr>
        <th>2.</th>
        <TH>Knowledge expertise and confidence of teacher in reaching.</TH>
        <td><input type="radio" name="2" value="5" > </td>
                    <td><input type="radio" name="2" value="4" > </td>
                    <td><input type="radio" name="2" value="3" > </td>
                    <td><input type="radio" name="2" value="2" > </td>
                    <td><input type="radio" name="2" value="1" > </td>
        </tr>
         <tr>
        <th>3.</th>
        <TH>Ability to clear doubt in the classroom and outside.</TH>
        <td><input type="radio" name="3" value="5" > </td>
                    <td><input type="radio" name="3" value="4" > </td>
                    <td><input type="radio" name="3" value="3" > </td>
                    <td><input type="radio" name="3" value="2" > </td>
                    <td><input type="radio" name="3" value="1" > </td>
        </tr>
         <tr>
        <th>4.</th>
        <TH>Ability to conclude concepts with example.</TH>
        <td><input type="radio" name="4" value="5" > </td>
                    <td><input type="radio" name="4" value="4" > </td>
                    <td><input type="radio" name="4" value="3" > </td>
                    <td><input type="radio" name="4" value="2" > </td>
                    <td><input type="radio" name="4" value="1" > </td>
        </tr>
         <tr>
        <th>5.</th>
        <TH>Communication and regularity in class.</TH>
        <td><input type="radio" name="5" value="5" > </td>
                    <td><input type="radio" name="5" value="4" > </td>
                    <td><input type="radio" name="5" value="3" > </td>
                    <td><input type="radio" name="5" value="2" > </td>
                    <td><input type="radio" name="5" value="1" > </td>
        </tr>
         <tr>
        <th>6.</th>
        <TH>Punctuality and regularity in class.</TH>
        <td><input type="radio" name="6" value="5" > </td>
                    <td><input type="radio" name="6" value="4" > </td>
                    <td><input type="radio" name="6" value="3" > </td>
                    <td><input type="radio" name="6" value="2" > </td>
                    <td><input type="radio" name="6" value="1" > </td>
        </tr>
         <tr>
        <th>7.</th>
        <TH>Interaction and discussion with students.</TH>
        <td><input type="radio" name="7" value="5" > </td>
                    <td><input type="radio" name="7" value="4" > </td>
                    <td><input type="radio" name="7" value="3" > </td>
                    <td><input type="radio" name="7" value="2" > </td>
                    <td><input type="radio" name="7" value="1" > </td>
        </tr>
         <tr>
        <th>8.</th>
        <TH>Attitude towards students.</TH>
        <td><input type="radio" name="8" value="5" > </td>
                    <td><input type="radio" name="8" value="4" > </td>
                    <td><input type="radio" name="8" value="3" > </td>
                    <td><input type="radio" name="8" value="2" > </td>
                    <td><input type="radio" name="8" value="1" > </td>
        </tr>
        <tr>
        <th>9.</th>
        <TH>Monitoring students and creating interest on subject</TH>
        <td><input type="radio" name="9" value="5" > </td>
                    <td><input type="radio" name="9" value="4" > </td>
                    <td><input type="radio" name="9" value="3" > </td>
                    <td><input type="radio" name="9" value="2" > </td>
                    <td><input type="radio" name="9" value="1" > </td>
        </tr>
        <tr>
        <th>10.</th>
        <TH>Timely evaluation of internal assessment</TH>
        <td><input type="radio" name="10" value="5" > </td>
                    <td><input type="radio" name="10" value="4" > </td>
                    <td><input type="radio" name="10" value="3" > </td>
                    <td><input type="radio" name="10" value="2" > </td>
                    <td><input type="radio" name="10" value="1" > </td>
        </tr>
        </table>
            
    </table>
    <h3 style="text-align: center">Review and comments</h3>
    <textarea name="comments" style="width: 60%; margin-left: 20%;" rows="5"></textarea>
    <input type="submit" name="submit" value="submit feedback" style="margin-left: 50%">
    <input type="reset">
    </form>
<?php
    }
    ?>
</body>
</html>