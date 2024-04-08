<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login Form</title>
</head>
<body class="bg-blue-400">
    <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-sm w-full">
    <h2 class="text-2xl font-bold mb-8 text-center">REGISTER</h2>
    <form method="POST" action="Register.php">
    <div class="mb-4">
        <label for="username" class="block font-medium mb-1">Name </label>
        <input type="text" class="w-full border-b-2 py-2 outline-none " name="username" placeholder="Enter the Name" autocomplete="off" required>
        </div>
        <div class="mb-4">
        <label for="email" class="block font-medium mb-1">Email </label>
        <input type="email" class="w-full border-b-2 py-2 outline-none " name="email" placeholder="Enter the Email ID" autocomplete="off" required>
        </div>
        <div class="mb-4">
        <label for="password" class="block font-medium">Password </label>
        <input type="Password" class="w-full border-b-2 py-2 outline-none " name="password" placeholder="Enter the Password" autocomplete="off" required>
        </div>
        <div class="mb-4">
        <label for="cpassword" class="block font-medium">Confirm Password </label>
        <input type="Password" class="w-full border-b-2 py-2 outline-none " name="cpassword" placeholder="Enter the Password" autocomplete="off" required>
        </div>
        <input type="submit" name="submit" value="Sign Up" class="text-white bg-green-500 mt-2 py-2 px-6 rounded w-full font-bold cursor-pointer">
        <p class="mt-2 text-center">Do you have a Account? <a class="text-blue-700  font-bold" href="Login.php">Login</a></p>
    </div>
</div>

</form>
    <?php 
        include 'config.php';
    
        if(isset($_POST["submit"])){

            $username=$_POST["username"];
            $email=$_POST["email"];
            $password=$_POST["password"];

            $query="INSERT INTO login(NAME,EMAIL,PASSWORD) VALUES('$username','$email','$password')";

            if(!mysqli_query($con,$query)){
                    echo mysqli_error($con);
            }

        

            mysqli_close($con);
        }
    
        
    
    ?>
</body>
</html>