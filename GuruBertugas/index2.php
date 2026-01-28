<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk</title>

    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
            background: url('../img/medical.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 500px;
            background: linear-gradient(135deg, rgba(22, 158, 151, 0.43), rgba(240, 240, 240, 0.95));
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 40px;
            animation: fadeIn 1s ease-in-out;
            border: 1px solid rgba(0, 238, 255, 0.19);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            border: none;
            background-color: transparent;
        }

        .card-body {
            text-align: center;
        }

        .card-body img {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        .card-body h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #20b2aa;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #20b2aa;
            box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background: linear-gradient(45deg, #20b2aa, #47beb7);
            border: none;
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #97d1cc, #acdde5);
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .text-center a {
            color: #20b2aa;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                padding: 20px;
            }

            .card-body h2 {
                font-size: 1.5rem;
            }

            .btn-primary {
                font-size: 1rem;
                padding: 10px 15px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 800px; /* Expand form size on large screens */
                padding: 50px; /* Add more padding for spacious design */
            }

            .card-body h2 {
                font-size: 2.5rem; /* Larger title font size for big screens */
            }

            .btn-primary {
                font-size: 1.5rem; /* Larger button font size */
                padding: 15px 30px; /* Larger button padding */
            }
        }
    </style>
</head>
<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="card-body">
            <img src="images/gururemove.png" class="rounded mx-auto d-block mb-3" alt="Teacher Login">
            <h2>TEACHER LOG IN</h2>

            <form autocomplete="off" action="logintest.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-danger text-center"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <div class="mb-3">
                    <label for="uname" class="form-label">👤 Username</label>
                    <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">🔒 Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                    <div class="mt-2">
                        <span class="toggle-password" onclick="togglePassword()">Show Password</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Log in</button>
            </form>

            <div class="text-center mt-3">
                Back to <a href="../index.php">Home page</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function togglePassword() {
    var x = document.getElementById("password");
    x.type = (x.type === "password") ? "text" : "password";
}
</script>

</body>
</html>