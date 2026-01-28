<?php
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
        body {
            background-color: aliceblue;
            background-image: url('../img/medical.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .navbar {
            background-color: #ffffff;
            padding: 15px 50px;
            border-radius: 50px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
            font-size: 1.3rem;
        }

        .navbar-brand i {
            margin-right: 8px;
            color: #000;
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-nav .nav-link:hover {
            background-color: #20b2aa;
            color: #fff !important;
        }

        .navbar-nav .nav-link.text-danger:hover {
             background-color: #dc3545 !important;
            color: #fff !important;
        }

        .mycontainer {
            width: 90%;
            margin: 1.5rem auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #97d1cc;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                text-align: center;
                background: white;
                padding: 10px;
                border-radius: 5px;
            }
        }
    </style>
</head>

<body id="body-pd">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-heart-pulse me-2"></i> E-HEALTH
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="dashboard.php">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="urus2.php">
                        <i class="fa-solid fa-user-check"></i> Student Validation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="senarai.php">
                        <i class="fa-solid fa-print"></i> Print Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- Logo Section -->
    <div class="text-center">
        <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="img-fluid">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="img-fluid">
    </div>

    <!-- Content Section -->
    <div class="mycontainer">
        <p class="display-5 text-center fw-bold">Print Student Information</p>
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Identity Number</th>
                        <th>Program</th>
                        <th>Year</th>
                        <th>Appointment Time</th>
                        <th>Appointment Date</th>
                        <th>Student's Phone Number</th>
                        <th>Guardian's Phone Number</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM janjitemu");

                    if ($query) {
                        $cnt = 1;
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>
                                    <td>$cnt</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['nokp']}</td>
                                    <td>{$row['program']}</td>
                                    <td>{$row['tahun']}</td>
                                    <td>{$row['waktu']}</td>
                                    <td>{$row['tarikh']}</td>
                                    <td>{$row['notel']}</td>
                                    <td>{$row['notelpen']}</td>
                                    <td>{$row['sebab']}</td>
                                    <td>{$row['status']}</td>
                                </tr>";
                            $cnt++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>

</body>

</html>