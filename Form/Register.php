<?php
 require "Connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Form</title>
 <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php

if(isset($_POST['signup'])){

$nameerr=$emailerr=$passerr=$cpasserr="";


$name=$_POST['name'];
$email=$_POST['email'];                                                                            
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

if($name==""){
  $nameerr="Enter the name";
}
if($email==""){
  $emailerr="Enter the Email";
}
if($password==""){
  $passerr="Enter the Password";
}
if($cpassword==""){
  $cpasserr="Enter the confirm Password";
}

if(!empty($name) && !empty($email) && !empty($password) && !empty($cpassword))
{
$sql2="SELECT * FROM emp WHERE email='$email'";
$result=$con->query($sql2);
$count = $result->num_rows;

if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
 $emailerr = "You Entered An Invalid Email Format"; 
}

if($count>0){
  $emailerr="Email ID is lredy Exists";

}


if(strlen($password) < 8){
  $passerr= "Password length minimum 8 characters";
 }
elseif($password != $cpassword){
  $cpasserr="password do not Match";
 }
}


if($nameerr =="" && $emailerr =="" && $passerr =="" && $cpasserr =="" && $count==0 ) {
 $sql= "INSERT INTO emp(username,email,password)VALUES('$name','$email','$password')";

 if($con->query($sql) === TRUE) {
  header("location:login.php");

 } else {
  echo $con->error;
 }
 
}
$con->close();

}

?>


<div class="bg-gray-300 h-screen w-100">
 <div class=" flex items-center justify-center">

 <form name="register" action="Register.php" method="post" class="w-3/12" onsubmit="return validateForm()">
  <h1 class="mt-20 mb-3 font-bold text-center text-3xl text-red-600">Registration Form</h1>
  <div class="my-4">
   <label for="name" class="block mb-2 ">Name: </label>
   <input type="text"name="name" id="name" placeholder="Enter the name" class="w-full pl-2 py-1 rounded border-none outline-none">
  <span class="text-red-400"><?php echo $nameerr ?></span>
   <span class="text-red-400" id="nameerr"></span>
  </div> 
  <div class="my-4">
   <label for="email" class="block mb-2 ">Email: </label>
   <input type="text"name="email" id="email" placeholder="Enter the Email" class="w-full pl-2 py-1 rounded  border-none outline-none">
   <span class="text-red-400"><?php echo $emailerr ?></span>
   <span class="text-red-400" id="emailerr"></span>
  </div>
  <div class="my-4">
   <label for="password" class="block mb-2">Password: </label>
   <input type="password" name="password" id="password" placeholder="Enter the password" class="w-full pl-2 p-1 rounded border-none outline-none" >
   <span class="text-red-400"><?php echo $passerr ?></span>
   <span class="text-red-400" id="passerr"></span>
  </div> 
  <div class="my-4">                                    
   <label for="cpassword" class="block mb-2">Confirm Password: </label>
   <input type="password" name="cpassword" id="cpassword" placeholder="Enter the confirm password" class="w-full pl-2 p-1 rounded border-none outline-none">
   <span class="text-red-400"><?php echo $cpasserr ?></span>
   <span class="text-red-400" id="cpasserr"></span>
  </div> 
  <input type="submit" value="Signup" name="signup" class="bg-blue-700 w-full py-1 mt-2 cursor-pointer text-white rounded">
  <p>Do you have Account?<a href="login.php" class="font-semibold text-blue-700"> here</a></p>

</form>
</div>
<div>

<script>
function validateForm(){
  var uname=document.getElementById("name")
  var uemail=document.getElementById("email")
  var upassword=document.getElementById("password")
  var ucpassword=document.getElementById("cpassword")
  
  var unameerr=document.getElementById("nameerr")
  var uemailerr=document.getElementById("emailerr")
  var upasserr=document.getElementById("passerr")
  var ucpasserr=document.getElementById("cpasserr")

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/;

  if(uname.value==""){
    uname.style.border="2px solid red";
    unameerr.textContent="Enter the name";
  }
  else{
    uname.style.border="none";
    unameerr.textContent="";

  }
  if(uemail.value==""){
    uemail.style.border="2px solid red";
    uemailerr.textContent="Enter the email";
  }
  else if(!emailPattern.test(uemail.value)){
    uemail.style.border="2px solid red";
    uemailerr.textContent="Enter the valid Email";

  }
  else{
    uemail.style.border="none";
    uemailerr.textContent="";
  }
  if(upassword.value==""){
    upassword.style.border="2px solid red";
    upasserr.textContent="Enter the password";
  }
  else if(upassword.value.length < 8){
    upassword.style.border="2px solid red";
    upasserr.textContent="Minimum 8 characters";
  }
  else if(!passwordPattern.test(upassword.value))
  {
    upassword.style.border="2px solid red";
    upasserr.textContent="Create Strong Password";
    
  }
  else{
    upassword.style.border="none";
    upasserr.textContent="";
  }
  if(ucpassword.value==""){
    ucpassword.style.border="2px solid red";
    ucpasserr.textContent="Enter the password";
  }
  else if(upassword.value != ucpassword.value){
    ucpassword.style.border="2px solid red";
    ucpasserr.textContent="password not match";
  }
  else{
    ucpassword.style.border="none";
    ucpasserr.textContent="";
  }
 

  if(uname.value=="" || uemail.value=="" || upassword=="" ||  ucpassword=="" || ucpassword.value.length<8 || !emailPattern.test(uemail.value) || !passwordPattern.test(upassword.value) || upassword.value !=ucpassword.value){
    return false;

  }
  return true;

}
</script>



 
</body>
</html>