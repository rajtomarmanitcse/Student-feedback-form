<html>
<head>
    <title>college registration</title>    
</head>
<body style="width:;700px; Height:600px; ">
    <h1 style='text-align:center'>Welcome</h1>
    <br>
    <input type="button" onclick="location.href='login.php'" value="signin">
    <input type="button" onclick="location.href='display_feedback_form.php'" value="feedback"><hr>
    <br><br>
<?php
$conn= mysqli_connect("localhost","root","","university");
    
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
    

if(isset($_GET['raj']))
{
    
 $a1=$_GET['roll_no']; // name
$a2=$_GET['name']; // phone
$a3=$_GET['email']; // email
$a4=$_GET['pwd']; // name
$a5=$_GET['dept']; // phone
$a6=$_GET['course']; 
$a7=$_GET['sem'];// email
    $sql="insert into student(scholar_no,name,email,pwd,dept,course,sem) values('$a1','$a2','$a3','$a4','$a5','$a6','$a7')";

    echo "<pre>Debug: $sql</pre>\m";
$result = mysqli_query($conn, $sql);
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($conn));
}
else {
  echo 'done.';
}
}
else{
echo"<form
action=\"signup.php\" method=\"GET\" >";
echo"<h3>Scholar No. :
</h3>";
echo"<input type=\"text\"
 name=\"roll_no\" style=\"width:250px;\" maxlength=\"9\" required/>";
echo"<h3>Student Name :</h3>";
echo"<input type=\"text\"
value=\"\" name=\"name\" style=\"width:250px;\" required/>";
echo"<h3>Email Id :</h3>";
echo"<input type=\"text\"
value=\"\" name=\"email\" style=\"width:250px;\" required/>";
echo"<h3>Password :</h3>";
echo"<input type=\"password\"
value=\"\" name=\"pwd\" style=\"width:250px;\" required/>";
echo"<h3>Re-enter password :</h3>";
echo"<input type=\"text\"
value=\"\" name=\"rpwd\" style=\"width:250px;\" required/>";
echo"<h3>Department :</h3>";
echo"<select id=\"dept\" name=\"dept\">
       <option value=\"CSE\">CSE</option>
  <option value=\"Electrical\">ELECTRICAL</option>
  <option value=\"ECE\">ECE</option>
  <option value=\"MECH\" selected>MECHANICAL</option>
        <option value=\"CHEMICAL\">CHEMICAL</option>
        </select>";
echo"<h3>Course :</h3>";
echo"<input type=\"radio\" id=\"B.tech\" name=\"course\" value=\"B.tech\">
  <label for=\"B.tech\">B.tech</label><br>
  <input type=\"radio\" id=\"M.tech\" name=\"course\" value=\"M.tech\">
  <label for=\"M.tech\">M.tech</label><br>
  <input type=\"radio\" id=\"Ph.d\" name=\"course\" value=\"Ph.d\">
  <label for=\"Ph.d\">Ph.d</label>";
echo"<h3>Semester :</h3>";
echo"<input type=\"number\"
value=\"\" name=\"sem\" min=\"1\" max=\"8\"/><br><br>";

echo"<input type=\"submit\"
name=\"raj\" value=\"submit\" style=\"margin-left: 50%\" /><br/>";
echo"</form>";
}
?>
</body>
</html>