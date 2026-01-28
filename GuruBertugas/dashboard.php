<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/sidebar.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">

    <style>
        body {
            background: linear-gradient(to bottom right, #e2fffd, #a3e4d7);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            height: 100vh;
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
        .card {
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-body h5 {
            font-size: 3vh;
            font-weight: bold;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table th,
        table td {
            white-space: nowrap;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        .logo1 {
            width: 100px;
        }

        .label-nav {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
            color: #20b2aa;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
        }

        .label-nav:hover {
            background-color: #20b2aa;
            color: white;
        }

        @media (max-width: 768px) {
            .logo-container {
                flex-direction: column;
            }

            .logo {
                width: 80%;
                margin-bottom: 10px;
            }

            .logo1 {
                width: 50px;
            }
        }

        @media (min-width: 991px) {
            .logo-container {
                flex-direction: row;
            }

            .logo {
                width: 20%;
            }

            .logo1 {
                width: 100px;
            }
        }
    </style>
</head>

<body>

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
            <!-- Semua nav item ke kanan -->
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
    <div class="d-flex justify-content-center align-items-center logo-container mt-4">
        <img src="images/logoremove.png" alt="Logo" class="logo me-4">
        <img src="images/logo2remove.png" alt="Logo" class="logo me-4">
    </div>

    <!-- Cards Section -->
    <div class="row mt-4">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">
                        <?php
                        include "config.php";
                        $query = "SELECT * FROM janjitemu";
                        $result = mysqli_query($conn, $query);
                        $total_students = mysqli_num_rows($result);
                        echo $total_students;
                        ?>
                    </h5>
                    <p class="card-text">Registered Students</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title text-danger">
                        <?php
                        $query = "SELECT * FROM janjitemu WHERE status='Tidak sah'";
                        $result = mysqli_query($conn, $query);
                        $not_valid = mysqli_num_rows($result);
                        echo $not_valid;
                        ?>
                    </h5>
                    <p class="card-text">Applications Not Successful</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">
                        <?php
                        $query = "SELECT * FROM janjitemu WHERE status='dalam proses'";
                        $result = mysqli_query($conn, $query);
                        $in_process = mysqli_num_rows($result);
                        echo $in_process;
                        ?>
                    </h5>
                    <p class="card-text">Application in Process</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">
                        <?php
                        $query = "SELECT * FROM janjitemu WHERE status='Sah'";
                        $result = mysqli_query($conn, $query);
                        $valid = mysqli_num_rows($result);
                        echo $valid;
                        ?>
                    </h5>
                    <p class="card-text">Successful Applications</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Student List Section -->
    <div class="mt-4">
        <h2 class="display-6 text-center">Student List</h2>
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Program</th>
                        <th>Year</th>
                        <th>Appointment Time</th>
                        <th>Appointment Date</th>
                        <th>Guardian's Phone Number</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "config.php";
                    $query = mysqli_query($conn, "SELECT * FROM janjitemu");
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
                                    <td>{$row['notelpen']}</td>
                                    <td>{$row['status']}</td>
                                    <td><a href='delete.php?id_janjitemu={$row['id_janjitemu']}'><button class='btn btn-sm btn-outline-danger'><i class='fa-solid fa-trash'></i></button></a></td>
                                </tr>";
                        $cnt++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

</body>

</html>