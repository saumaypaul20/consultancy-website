<?php include('functions.php') ?>


<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/one.css">
	<title>Registration system PHP and MySQL</title>
</head>
<body>

    <div class="container">




<article>

<form method="POST" align="center"  action="up1.php" class="formwrap" enctype='multipart/form-data'>
<h1>Register Yourself!</h1>
<b>First name:<input type="text" name="first" required><br>
<br>Last name:<input type="text" name="last" required><br>
<br>Email:<input type="email" name="email"><br>
<br>Mobile:<input type="text" name="mob" required><br>
<br>User ID:<input type="text"  name="uid" required><br>
<br>Password:<input type="password" name="pwd" required><br>
<br>Gender:</b><input type="radio" value="male" name="gender" checked>Male
<input type="radio" value="female" name="gender" >Female<br>
    <br><pre><button type="submit" name="submit" value="Sign up"> Sign Me Up</button>  </pre>






</form>


        
</article>


</div>
    
    
    
    
</body>
</html>