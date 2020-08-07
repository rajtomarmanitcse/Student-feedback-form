



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
    <form action="display_feedback.php" method="POST">
        <table>
           <tr >
               <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Department<select name="department">
                <option >Select Department</option>
                <option value="CSE">CSE</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
                <option value="EE">EE</option>
                <option value="CIVIL">CIVIL</option>
                <option value="MSME">MSME</option>
             </select></td>
             <td style="border-bottom: 2px solid black;border-right: 2px solid black;padding:5px;">Course<select name="course">
                <option >Select Course</option>
                <option value="BTECH">BTECH</option>
                <option value="MTECH">MTECH</option>
                <option value="PHD">PHD</option>
             </select></td>
             <td style="border-bottom: 2px solid black;padding:5px;">Semester<select name="semester">
                <option >Select Semester</option>
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>             
             </select></td>
           </tr>
           <tr>
               <td style="padding:5px;border-right: 2px solid black">Subject Name<select name="subject">
                <option >Select Subject</option>
                <option value="TOC">TOC</option>
                <option value="CA">CA</option>
                <option value="SE">SE</option>
                <option value="PQT">PQT</option>
                <option value="ADA">ADA</option>
                <option value="DBMS">DBMS</option>
             </select></td>
             <td style="padding:5px;"><button type="submit">Submit</button></td>
           </tr>
        </table>
    </form>
</div>


</body>
</html>