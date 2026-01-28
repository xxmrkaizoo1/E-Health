<?php
include 'config.php';

if(isset($_POST['submit'])){

   $nama = mysqli_real_escape_string($conn, $_POST['nama']);
   $nokp = mysqli_real_escape_string($conn, $_POST['nokp']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE nokp = '$nokp' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exists'; 
   }else{
      if($image_size > 2000000){
         $message[] = 'Image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(nama, nokp, password, image) VALUES('$nama', '$nokp', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            echo '<script>alert("Registered successfully!")</script>';
            $message[] = 'Registered successfully!  please goto login page for Login';
        
         }else{
            $message[] = 'Registration failed, please try again.';
         }
      }
   }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background: url('../img/medical.jpg') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
        }

        .card-registration {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-registration:hover {
            transform: translateY(-5px);
            box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.3);
        }

        .form-control,
        .btn {
            border-radius: 10px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #20b2aa;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #acdde5;
            transform: scale(1.05);
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            background-color: rgba(255, 0, 0, 0.1);
            border-left: 5px solid red;
            color: red;
            font-size: 16px;
        }

        img {
            width: 100%;
            max-width: 120px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }

        h3 {
            font-weight: bold;
            color: #20b2aa;
        }

        @media (max-width: 767px) {
            .card-registration {
                margin: 0 10px;
            }

            h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration">
                        <div class="card-body p-4 p-md-5">
                            <img src="images/pelajar2.jpeg" class="rounded-circle mx-auto d-block">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Student Sign Up</h3>

                            <!-- Error or Success Message Display -->
                            <?php
                            if (isset($message)) {
                                foreach ($message as $msg) {
                                    echo '<div class="message">' . $msg . '</div>';
                                }
                            }
                            ?>

                            <form autocomplete="off" action="login2.php" method="post" enctype="multipart/form-data">

                                <!-- Full Name -->
                                <div class="form-floating mb-4">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Full Name" required />
                                    <label for="nama">Full Name</label>
                                </div>

                                <!-- ID Number -->
                                <div class="form-floating mb-4">
                                    <input type="text" name="nokp" class="form-control" id="nokp" placeholder="ID Card Number" required />
                                    <label for="nokp">ID Card Number</label>
                                </div>

                                <!-- Password -->
                                <div class="form-floating mb-4">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
                                    <label for="password">Password</label>
                                    <div class="mt-3">
                                        <input type="checkbox" onclick="togglePassword()"> Show Password
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <label for="image" class="form-label">Upload Profile Picture</label>
                                    <input type="file" id="image" name="image" class="form-control" accept="image/jpg, image/jpeg, image/png" />
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block w-100">Sign Up</button>

                                <!-- Link to Log In -->
                                <p class="text-center mt-3">Already have an account? <a href="login3.php">Log In</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>