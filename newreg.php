<style>
.error {color: #FF0000;}
</style>
<?php
$UseridErr= $PasswordErr = $NameErr = $AddressErr = $AgeErr= $pincodeErr= $emailErr =  "";
$Userid= $Password = $Name = $Address = $Age = $pincode = $email =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["userid"])) 
  {
    $UseridErr = "USERID is required";
  } 
  else
  {
    $Userid = test_input($_POST["userid"]);
  }
  if (empty($_POST["passid"])) {
    $PasswordErr = "YOU MUST ENTER PASSWORD";
  } else {
    $Password = test_input($_POST["passid"]);
  }
  if (empty($_POST["username"])) {
    $NameErr = "Name is required";
  } else {
    $Name = test_input($_POST["username"]);
  }
  if (empty($_POST["address"])) {
    $AddressErr = "ADDRESS is required";
  } else {
    $Address = test_input($_POST["address"]);
  }
  if (empty($_POST["age"])) {
    $AgeErr = "AGE is required";
  } else {
    $Age = test_input($_POST["age"]);
  }
  if (empty($_POST["pin"])) {
    $pincodeErr = "PINCODE is required";
  } else {
    $Pincode = test_input($_POST["pin"]);
  } 
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } else
   {
    $email = test_input($_POST["email"]);
} }  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<title>JavaScript Form Validation using a sample registration form</title>
<meta name="keywords" content="example, JavaScript Form Validation, Sample registration form" />
<meta name="description" content="This document is an example of JavaScript Form Validation using a sample registration form. " />
<link rel='stylesheet' href='js-form-validation.css' type='text/css' />
<script src="sample-registration-form-validation.js"></script>
</head>
<body onload="document.registration.userid.focus();">
<h1>Registration Form</h1>
<form name='registration' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<ul>
<li><label for="userid">User id:</label></li>
<li><input type="text" name="userid" size="12" /></li>
<span  for="userid" class="error">* <?php echo $UseridErr;?></span>
  <br><br>

<li><label for="passid">Password:</label></li>
<li><input type="password" name="passid" size="12" /></li>
<span  for="passid" class="error">* <?php echo $PasswordErr;?></span>
  <br><br>

<li><label for="username">Name:</label></li>
<li><input type="text" name="username" size="50" /></li>
<span  for="username" class="error">* <?php echo $NameErr;?></span>
  <br><br>
<li><label for="address">Address:</label></li>
<li><input type="text" name="address" size="50" /></li>
<span  for="address" class="error">* <?php echo $AddressErr;?></span>
  <br><br>
<li><label for="age">Age:</label></li>
<li><input type="text" name="age" size="25" /></li>
<span  for="age" class="error">* <?php echo $AgeErr;?></span>
  <br><br>
<li><label for="Language">Language:</label></li>
<li><select name="Language">
<option selected="" value="Default">(Please select a your interest)</option>
<option value="py">Python</option>
<option value="css">Css</option>
<option value="js">JavaScript</option>
<option value="c">c</option>
<option value="c++">c++</option>
</select></li>
<li><label for="pin">pin Code:</label></li>
<li><input type="text" name="pin" /></li>
<span  for="pin" class="error">* <?php echo $pincodeErr;?></span>
  <br><br>
<li><label for="email">Email:</label></li>
<li><input type="text" name="email" size="50" /></li>
<span  for="email" class="error">* <?php echo $emailErr;?></span>
  <br><br>
<li><label id="gender">Are You a:</label></li>
<li><input type="radio" name="msex" value="Male" /><span>student</span></li>
<li><input type="radio" name="fsex" value="Female" /><span>faculty</span></li>
<li><label>Language:</label></li>
<li><input type="checkbox" name="en" value="en" checked /><span>English</span></li>
<li><input type="checkbox" name="nonen" value="noen" /><span>Non English</span></li>
<li><input type="submit" name="submit" value="Submit" /></li>
</ul>
</form>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
echo "<h2>Your Input:</h2>";
echo $Userid;
echo "<br>";
echo $Password;
echo "<br>";
echo $Name;
echo "<br>";
echo $Address;
echo "<br>";
echo $pincode;
echo "<br>";
echo $Age;
echo "<br>";
echo $email;
?>
</body>
</html>
