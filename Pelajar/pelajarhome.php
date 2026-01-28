<?php
@include 'config.php';
include 'auth.php';
$id_pelajar = $_SESSION['id_pelajar'];

if (!isset($id_pelajar)) {
    header('location:login3.php');
    exit;
}

if (isset($_GET['logout'])) {
    unset($id_pelajar);
    session_destroy();
    header('location:login3.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        .main-header {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            padding: 2rem 1rem 1.5rem 1rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .main-header h2 {
            font-weight: 700;
            color: #20b2aa;
            letter-spacing: 1px;
        }
        .info-alert {
            background: linear-gradient(90deg, #fff3cd 60%, #ffeeba 100%);
            border: none;
            color: #856404;
            font-size: 1.05rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        .dashboard-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
        }
        .dashboard-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
        }
        .dashboard-icon {
            background: linear-gradient(135deg, #e3f2fd 60%, #bbdefb 100%);
            color: #20b2aa;;
            border-radius: 50%;
            width: 68px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin-bottom: 1.2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .dashboard-card img {
            max-width: 80px;
            height: auto;
            margin-bottom: 1rem;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .dashboard-card h5 {
            font-weight: 600;
            color: #20b2aa;;
            margin-bottom: 0.7rem;
            font-size: 1.1rem;
        }
        .dashboard-card .btn {
            border-radius: 20px;
            padding: 0.5rem 2rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-top: 0.7rem;
        }
        .dashboard-card .btn-primary {
            background: linear-gradient(90deg, #20b2aa, #47beb7);
            border: none;
        }
        .dashboard-card .btn-primary:hover {
            background: linear-gradient(90deg,  #97d1cc, #acdde5);
        }
        @media (max-width: 767px) {
            .main-header {
                padding: 1.2rem 0.5rem 1rem 0.5rem;
            }
            .dashboard-grid {
                gap: 1.2rem;
            }
            .dashboard-card {
                padding: 1.2rem 0.7rem 1rem 0.7rem;
            }
        }
    </style>
</head>

<body>
    <?php include "index.html"; ?>

    <div class="container">
        <div class="main-header text-center">
            <h2 class="mb-2"><i class="fa-solid fa-hospital-user"></i> E-HEALTH DASHBOARD</h2>
            <p class="mb-0 text-muted">Selamat datang ke sistem E-Health. Sila pilih menu di bawah untuk tindakan lanjut.</p>
        </div>

        <div class="alert info-alert d-flex align-items-center" role="alert">
            <i class="fa-solid fa-circle-info fa-lg me-2"></i>
            <div>
                <strong>NOTIS PEMBERITAHUAN:</strong>
                Pelajar hanya dibenarkan berurusan di Hospital Gerik, Klinik Komuniti, Klinik Kesihatan dan Hospital Taiping.
                Pelajar hanya boleh dibenarkan pergi ke hospital hanya pada 2 waktu sahaja iaitu pada waktu
                <strong>9.00 pagi</strong> dan <strong>3.00 petang</strong>.
                Pihak asrama dan warden hanya boleh membawa pelajar ke hospital selepas waktu persekolahan dan hanya untuk kes kecemasan sahaja.
            </div>
        </div>

        <div class="dashboard-grid">
            <!-- Profile Update -->
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id_pelajar = '$id_pelajar'") or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                }
                if ($fetch['image'] == '') {
                    echo '<img src="images/default-avatar.png" alt="Profile">';
                } else {
                    echo '<img src="uploaded_img/' . $fetch['image'] . '" alt="Profile">';
                }
                ?>
                <h5>Kemaskini Profile</h5>
                <p class="text-muted mb-2">Sila masukkan maklumat dengan betul</p>
                <a href="update_profile.php" class="btn btn-primary">PROFILE</a>
            </div>

            <!-- Status Check -->
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">
                    <i class="fa-solid fa-square-check"></i>
                </div>
                <img src="images/check.webp" alt="Check Status">
                <h5>Semak Status</h5>
                <p class="text-muted mb-2">Proses pengesahan sksn disahkan sebelum masa yang ditetapkan untuk ke hospital</p>
                <a href="kemaskini.php" class="btn btn-primary">SEMAK STATUS/EDIT</a>
            </div>

            <!-- Appointment -->
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
                <img src="images/janjitemu.png" alt="Appointment">
                <h5>hospital</h5>
                <p class="text-muted mb-2">Sila masukkan maklumat yang sah dan betul</p>
                <a href="janjitemu.php" class="btn btn-primary">BORANG KE HOSPITAL</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>