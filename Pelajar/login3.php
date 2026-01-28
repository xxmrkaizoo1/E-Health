<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $nokp = mysqli_real_escape_string($conn, $_POST['nokp']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE nokp = '$nokp' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['id_pelajar'] = $row['id_pelajar'];
        $_SESSION['nokp'] = $nokp;
        header("Location: pelajarhome.php");
    } else {
        $message[] = 'Incorrect Username or Password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background: url('../img/medical.jpg') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.9);
        }

        .form-control,
        .btn {
            border-radius: 10px;
        }

        .message {
            margin-top: 10px;
            color: red;
        }

        .form-floating label {
            font-size: 1rem;
        }

        .btn-primary {
            background-color:  #20b2aa;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #acdde5;
            transform: scale(1.05);
        }

        .form-outline {
            margin-bottom: 1.5rem;
        }

        img {
            width: 100%;
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }
        h3 {
            font-weight: bold;
            color: #20b2aa;
        }

        @media (max-width: 767px) {
            .card-body {
                padding: 2rem;
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
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong">
                        <div class="card-body p-5">
                            <img src="images/pelajar2.jpeg" class="rounded mx-auto d-block">
                            <h3 class="mb-4 text-center">Student Login</h3>

                            <?php
                            if (isset($message)) {
                                foreach ($message as $message) {
                                    echo '<div class="message alert alert-danger" role="alert">' . $message . '</div>';
                                }
                            }
                            ?>

                            <form action="login3.php" autocomplete="off" method="post">

                                <!-- No K/P input -->
                                <div class="form-outline">
                                    <div class="form-floating">
                                        <input type="text" name="nokp" class="form-control" placeholder="ID Card Number" required>
                                        <label for="floatingPassword">ID Card Number</label>
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline">
                                    <div class="form-floating">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        <label for="password">Password</label>
                                        <div class="mt-2">
                                            <input type="checkbox" onclick="togglePassword()"> Show Password
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="form-outline">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block w-100">Login</button>
                                </div>

                                <p class="text-center mt-3">
                                    Don't have an account? <a href="login2.php">Sign Up</a>
                                </p>
                                <p class="text-center mt-3">
                                    Back to <a href="../index.php">Homepage</a>
                                </p>
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
<?php mysqli_close($conn); ?>