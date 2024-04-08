<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Form</title>
</head>
<body class="bg-blue-400">
    <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-sm w-full">
    <h2 class="text-2xl font-bold mb-8 text-center">LOGIN</h2>
    <form method="POST" action="Login.php">
        <div class="mb-4">
        <label for="email" class="block font-medium mb-1">Email </label>
        <input type="email" class="w-full border-b-2 py-2 outline-none " name="email" placeholder="Enter the Email ID" autocomplete="off" required>
        </div>
        <div class="mb-4">
        <label for="Password" class="block font-medium">Password </label>
        <input type="Password" class="w-full border-b-2 py-2 outline-none " name="password" placeholder="Enter the Password" autocomplete="off" required>
        </div>
        <a class="block text-right text-decoration-none hover:text-blue-900 font-medium" href="#">Forget Password?</a>
        <input type="submit" value="Login" name="submit" class="text-white bg-green-500 mt-2 py-2 px-6 rounded w-full font-bold hover:text-black cursor-pointer">
        <p class="mt-2 text-center">Don't have a Account? <a class="text-blue-700  font-bold" href="Register.php">Sign up</a></p>
    </div>
</div>

</form>

<?php 
        include 'config.php';
    
        if(isset($_POST["submit"])){

            $email=$_POST["email"];
            $password=$_POST["password"];

            $query="SELECT * FROM login WHERE EMAIL='$email' and PASSWORD='$password'";

            $result= mysqli_query($con,$query);
            
                if(mysqli_num_rows($result) > 0){
                    echo "<script>alert('Login successful');</script>";
                }
                else{
                    echo "Invalid";
                }

        

            mysqli_close($con);
        }
    
        
    
    ?>
    
</body>
</html>