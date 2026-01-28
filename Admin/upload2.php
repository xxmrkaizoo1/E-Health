<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH | Muat Naik MC/Time Slip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <style>
      body {
        background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Arial, sans-serif;
      }
      .upload-card {
        background: #fff;
        border-radius: 25px;
        box-shadow: 0 6px 24px rgba(0,0,0,0.10);
        padding: 2.5rem 2rem;
        max-width: 480px;
        margin: 40px auto;
        position: relative;
      }
      .upload-title {
        font-weight: 700;
        color: #00bcd4;
        text-align: center;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
      }
      .form-label {
        color: #00bcd4;
        font-weight: 500;
      }
      .btn-main {
        background: linear-gradient(45deg, #00bcd4, #0097a7);
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 12px 0;
        font-size: 1.1rem;
        font-weight: 600;
        width: 100%;
        transition: background 0.3s;
      }
      .btn-main:hover {
        background: linear-gradient(45deg, #0097a7, #00bcd4);
        color: #fff;
      }
      .message {
        margin-bottom: 1rem;
        border-radius: 10px;
        font-size: 1rem;
      }
      .back-link {
        text-align: center;
        margin-top: 1.5rem;
      }
      .back-link a {
        color: #00bcd4;
        text-decoration: none;
        font-weight: 600;
      }
      .back-link a:hover {
        text-decoration: underline;
      }
      .file-upload-icon {
        font-size: 2.5rem;
        color: #00bcd4;
        display: block;
        text-align: center;
        margin-bottom: 1rem;
      }
      @media (max-width: 600px) {
        .upload-card {
          padding: 1.2rem 0.5rem;
        }
      }
    </style>
</head>
<body>
<div class="container">
  <div class="upload-card mt-5">
    <div class="file-upload-icon">
      <i class="fa-solid fa-file-arrow-up"></i>
    </div>
    <h3 class="upload-title">Muat Naik MC / Time Slip</h3>
    <?php
      if (isset($_POST['submit'])) {
        $jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
        $pdf = $_FILES['pdf']['name'];
        $pdf_type = $_FILES['pdf']['type'];
        $pdf_size = $_FILES['pdf']['size'];
        $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
        $pdf_store = "pdf/" . $pdf;

        if ($pdf_type != "application/pdf") {
          echo "<div class='alert alert-danger message'>Fail mesti dalam format PDF sahaja.</div>";
        } elseif ($pdf_size > 5000000) {
          echo "<div class='alert alert-danger message'>Saiz fail terlalu besar (max 5MB).</div>";
        } else {
          if (move_uploaded_file($pdf_tem_loc, $pdf_store)) {
            $sql = "INSERT INTO mc (pdf,jenis) values('$pdf','$jenis')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
              echo "<div class='alert alert-success message'>File berjaya dimasukkan.</div>";
            } else {
              echo "<div class='alert alert-danger message'>Ralat semasa menyimpan ke database.</div>";
            }
          } else {
            echo "<div class='alert alert-danger message'>Ralat semasa memuat naik fail.</div>";
          }
        }
      }
    ?>
    <form action="upload2.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="mb-3">
        <label for="jenis" class="form-label"><i class="fa fa-list"></i> Pilih Jenis Dokumen</label>
        <select class="form-select" name="jenis" id="jenis" required>
          <option value="" disabled selected>Pilih MC/Time Slip</option>
          <option value="Time Slip">Time Slip</option>
          <option value="MC">MC</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="pdf" class="form-label"><i class="fa fa-file-pdf"></i> Pilih Fail PDF</label>
        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf" required>
        <div class="form-text">Sila masukkan maklumat dalam bentuk fail PDF sahaja (max 5MB).</div>
      </div>
      <button type="submit" class="btn btn-main mt-2" name="submit"><i class="fa fa-upload"></i> Muat Naik</button>
    </form>
    <div class="back-link">
      <p>Kembali ke <a href="../Pelajar/kemaskini.php">Halaman Utama</a></p>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>