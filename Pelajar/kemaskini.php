<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
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
            color: #000;
        }

        .navbar-nav .nav-link:hover {
            background-color: #20b2aa;
            color: #fff !important;
            color: #000;
        }

        .nav-link.text-danger {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-link.text-danger:hover {
            background-color: #dc3545 !important;
            color: #fff !important;
        }
        
        .navbar-brand img {
            max-height: 80px;
            height: auto;
            width: auto;
        }
      .btn-outline-info {
        border-radius: 20px;
        transition: all 0.3s ease;
        font-size: 1.05rem;
        padding-left: 1.2rem;
        padding-right: 1.2rem;
      }
      .btn-outline-info:hover {
        background-color: #20b2aa;
        color: white;
      }
      .card {
        border-radius: 15px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
      }
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
      }
      .card-body {
        padding: 2rem 2.5rem;
      }
      .search {
        width: 100%;
        max-width: 400px;
        position: relative;
      }
      .search-input {
        width: 100%;
        border-radius: 20px;
        border: 1px solid #20b2aa;
        padding: 0.7rem 2.5rem 0.7rem 1.2rem;
        font-size: 1.1rem;
        transition: box-shadow 0.3s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      }
      .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 2px #007bff33;
      }
      .search-icon {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: #20b2aa;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s;
      }
      .search-icon:hover {
        background: #20b2aa;
      }
      .alert {
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
      }
      table th, table td {
        vertical-align: middle !important;
        text-align: center;
      }
      @media (max-width: 992px) {
        .card-body {
          padding: 1.2rem 1rem;
        }
        .card {
          margin: 0 0.5rem;
        }
        .navbar-brand img {
          max-height: 55px;
        }
      }
      @media (max-width: 576px) {
        .card-body {
          padding: 0.7rem 0.3rem;
        }
        .alert {
          font-size: 0.98rem;
        }
        h3 {
          font-size: 1.3rem;
        }
        .navbar-brand img {
          max-height: 40px;
        }
      }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="pelajarhome.php">
                <img src="images/logoremove.png" alt="Logo">
                <img src="images/logo2remove.png" alt="Logo">
            </a>
    
            <!-- Toggle for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars fa-lg"></i></span>
            </button>
    
            <!-- Center: Nav menu -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="../Pelajar/pelajarhome.php"><i class="fa-solid fa-house"></i>&nbsp;Utama</a>
                    <a class="nav-link" href="../Admin/jadual2.php"><i class="fa-regular fa-calendar-days"></i>&nbsp;Jadual Guru Bertugas</a>
                    <a class="nav-link" href="../Pelajar/janjitemu.php"><i class="fa-regular fa-calendar-check" style="font-size: 1.2em; margin-right:6px;"></i>Borang Ke Hospital</a>
                    <a class="nav-link" href="../Pelajar/kemaskini.php"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Semak Status</a>
                    
                    <!-- Tambah Log Keluar dalam navbar-nav -->
                    <a href="logout.php" class="nav-link text-danger d-flex align-items-center">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Log Out
                    </a>
                </div>
            </div>
        </div>
    </nav>
        <!-- Navbar -->

    <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
      <div>
        <h4 class="alert-heading mb-2"><strong>NOTIS PEMBERITAHUAN :</strong></h4>
        <p class="text-dark mb-0">
          Pelajar hanya dibenarkan berurusan di Hospital Gerik, Klinik Komuniti, Klinik Kesihatan dan Hospital Taiping.<br>
          Pelajar hanya boleh dibenarkan pergi ke hospital pada 2 waktu sahaja iaitu pada waktu <strong>9.00 pagi</strong> dan <strong>3.00 petang</strong>.<br>
          Pihak asrama dan warden hanya boleh membawa pelajar ke hospital pada kes kecemasan sahaja.
        </p>
      </div>
    </div>

    <section class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">
            <div class="card shadow-2-strong my-4">
              <div class="card-body">
                <h3 class="mb-4 text-center text-primary">SEMAK STATUS BORANG PERMOHONAN</h3>
                <form action="kemaskini.php" method="POST" class="mb-4">
                  <div class="d-flex justify-content-center">
                    <div class="search">
                      <input type="text" class="search-input" placeholder="NO KAD PENGENALAN" name="search" autocomplete="off" required>
                      <button type="submit" name="submit" class="search-icon"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped mt-3">
                    <?php
                    if(isset($_POST['submit'])){
                        $search =  $_POST['search'];
                        $sql="SELECT * FROM `janjitemu` WHERE id_janjitemu='$search' OR nokp='$search'";
                        $result = mysqli_query($conn,$sql);

                        if($result){
                          if(mysqli_num_rows($result)>0){
                            echo'<thead>
                            <tr>
                              <th>Nama</th>
                              <th>No.K/P</th>
                              <th>Waktu Janji Temu</th>
                              <th>Tarikh Janji Temu</th>
                              <th>Sebab</th>
                              <th>Status</th>
                              <th>Butang</th>
                            </tr>
                            </thead>
                            <tbody>';
                            while($row=mysqli_fetch_assoc($result)){
                              echo '<tr>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['nokp'].'</td>
                                <td>'.$row['waktu'].'</td>
                                <td>'.$row['tarikh'].'</td>
                                <td>'.$row['sebab'].'</td>
                                <td>'.$row['status'].'</td>
                                <td class="d-print-none">
                                  <a href="butiran.php?id_janjitemu='.$row['id_janjitemu'].'" class="btn btn-sm btn-outline-primary mb-1"><i class="fa fa-eye"></i>&nbsp;Butiran</a>
                                  <a href="padam.php?id_janjitemu='.$row['id_janjitemu'].'" class="btn btn-sm btn-outline-danger mb-1"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                  <a href="../Admin/upload2.php " class="btn btn-sm btn-outline-success mb-1"><i class="fa-solid fa-upload"></i>&nbsp;Muat Naik MC/ atau berkaitan perjumpaan dengan doctor</a>
                                </td>
                              </tr>';
                            }
                            echo '</tbody>';
                          }else{
                            echo'<br>';
                            echo '<tr><td colspan="7"><center><h5>Maklumat Tiada dalam rekod, sila buat <a href="janjitemu.php">janjitemu</a> terlebih dahulu</h5></center></td></tr>';
                          }
                        }
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>