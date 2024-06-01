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
if(isset($_POST['submit'])){
  $emailerr=$passerr="";
  $email=$_POST['email'];
  $password=$_POST['password'];

  if(!empty($email) || !empty($password)){

  $sql="SELECT * FROM emp WHERE email='$email' and password='$password'";
  $result=$con->query($sql);
  $count = $result->num_rows;

  if ($count > 0) {
    header('location:home.php');
    exit;
} else {
    echo "<script>alert('login failure')</script>";
}
  }


}
?>
<div class="bg-gray-300 h-screen w-100">
 <div class=" flex items-center justify-center">

 <form name="login" action="login.php" method="post" class="w-3/12" onsubmit="return validateForm()">
  <h1 class="mt-20 mb-3 font-bold text-center text-3xl text-red-600">Login Form</h1>
  <div class="my-4">
   <label for="email" class="block mb-2 ">Email: </label>
   <input type="email" name="email" id="email" placeholder="Enter the Email" class="w-full pl-2 py-1 rounded border-none outline-none rounded">   <span class="text-red-400" id="emailerr"></span>
   <span class="text-red-400" name="emailerr" id="emailerr"></span>
  </div> 
  <div class="my-2">
   <label for="password" class="block mb-2">Password: </label>
   <input type="password" name="password" placeholder="Enter the password" class=" w-full pl-2 p-1 rounded border-none outline-none">
   <span class="text-red-400" id="passerr"></span>
  </div> 
 <a href="#" class="float-right font-semibold text-blue-700 mb-2"> Forget Password?</a>

  <input type="submit" value="Login" name="submit" class="bg-blue-700 w-full py-1 cursor-pointer text-white rounded">
   
  <p>Create Account?<a href="Register.php" class="font-semibold text-blue-700"> here</a></p>
</form>
</div>
<div>

<script>
function validateForm(){
  var lemail=document.forms["login"]["email"];
  var lpass=document.forms["login"]["password"];
  
  let emailerr=document.getElementById("emailerr");
  let passerr=document.getElementById("passerr");

  emailerr.textContent="";
  passerr.textContent="";

  if(lemail.value==""){
    email.style.border="1px solid red";
    emailerr.textContent="Enter the Email";
  }
  if(lpass.value==""){
    passerr.textContent="Enter the password";
    lpass.style.border="2px solid red";
  }

  if(lemail.value=="" || lpass.value==""){
    return false;

  }
  return true;

}
</script>

</body>
</html>