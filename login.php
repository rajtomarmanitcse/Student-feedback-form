<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>!Home!</title>
    </head>
<body>
<h1 style="text-align:center;">Welcome</h1>
    
<button onclick="window.location.href='login.php';">signin</button>
<button onclick="window.location.href='signup.php';">signup</button>
<button onclick="window.location.href='display_feedback_form.php';">Feedback</button>
    <hr><br><br>
    <form action="signedin.php" method="get">
    <h2>Signin</h2>
    <input type="text" name="user" placeholder="scholar no."><br>
    <input type="password" name="pwd" placeholder="Password"><br>
    <input type="submit" name="submit" value="login">
    </form>
    <?php
    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullurl,"submit=error") == true){
        echo "<p class='error'>you did not fill in all fields correctly.</p>";
        exit();
    }
    if(strpos($fullurl,"logout=successful") == true){
        echo "<p class='error'>logout successful.</p>";
        ?>
    <script>
    window.history.forward();
    </script>
    <?php
    }
    ?>
</body>
</html>