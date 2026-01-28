<?php @include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-HEALTH</title>
   <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
   <style>
      body {
         background: linear-gradient(120deg, #e0f7fa 0%, #b2ebf2 100%);
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
      .form-section {
         background: #fff;
         border-radius: 18px;
         box-shadow: 0 4px 24px rgba(0,0,0,0.07);
         padding: 2.5rem 2rem 2rem 2rem;
         margin-bottom: 2rem;
         max-width: 650px;
         margin-left: auto;
         margin-right: auto;
      }
      .form-section h3 {
         font-weight: 700;
         color: #20b2aa;
         margin-bottom: 1.5rem;
         letter-spacing: 1px;
      }
      .form-label, .form-check-label, label {
         font-weight: 500;
         color: #20b2aa;
      }
      .form-control, .form-select {
         border-radius: 12px;
         min-height: 48px;
         font-size: 1.05rem;
      }
      .btn-primary {
         background: linear-gradient(90deg, #20b2aa 60%, #47beb7 100%);
         border: none;
         border-radius: 20px;
         padding: 0.7rem 2.5rem;
         font-weight: bold;
         transition: all 0.3s ease;
         letter-spacing: 1px;
      }
      .btn-primary:hover {
         background: linear-gradient(90deg, #97d1cc 60%, #acdde5 100%);
         transform: scale(1.05);
      }
      .alert {
         border-radius: 10px;
         box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
      }
      textarea.form-control {
         min-height: 80px;
      }
      @media (max-width: 992px) {
         .form-section {
            padding: 1.2rem 0.7rem 1rem 0.7rem;
         }
         .main-header {
            padding: 1.2rem 0.5rem 1rem 0.5rem;
         }
      }
      @media (max-width: 576px) {
         .form-section {
            padding: 0.7rem 0.3rem 0.7rem 0.3rem;
         }
         .main-header h2 {
            font-size: 1.3rem;
         }
         .form-section h3 {
            font-size: 1.1rem;
         }
      }
   </style>
</head>
<body>
  <?php include "index.html";?>
<div class="container">
   <div class="main-header text-center">
      <h2 class="mb-2"><i class="fa-regular fa-calendar-check"></i> Borang Ke Hospital</h2>
      <p class="mb-0 text-muted">Isi maklumat anda dengan lengkap dan tepat.</p>
   </div>

   <div class="alert info-alert d-flex align-items-center mb-4" role="alert">
      <i class="fa-solid fa-circle-info fa-lg me-2"></i>
      <div>
         <strong>NOTIS PEMBERITAHUAN:</strong>
         Pelajar hanya dibenarkan berurusan di Hospital Gerik, Klinik Komuniti, Klinik Kesihatan dan Hospital Taiping.
         Pelajar hanya boleh dibenarkan pergi ke hospital pada 2 waktu sahaja iaitu pada waktu
         <strong>9.00 pagi</strong> dan <strong>3.00 petang</strong>.
         Pihak asrama dan warden hanya boleh membawa pelajar ke hospital selepas waktu persekolahan dan hanya untuk kes kecemasan sahaja.
         </div>
      </div>
   </div>

   <section class="form-section">
      <h3 class="text-center mb-4"><i class="fa-regular fa-calendar-plus"></i> Permohonan Ke Hospital</h3>
      <form action="janjitemu.php" method="POST">
         <?php include "message.php";?>
         <div class="row">
            <div class="col-md-6 mb-3">
               <div class="form-floating">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required />
                  <label>Nama</label>
               </div>
            </div>
            <div class="col-md-6 mb-3">
               <div class="form-floating">
                  <input type="text" name="nokp" class="form-control" placeholder="No.Kad Pengenalan" required />
                  <label>No. Kad Pengenalan</label>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mb-3">
               <select class="form-select" name="program" required>
                  <option value="" disabled selected>Program</option>
                  <option value="KPD">KPD</option>
                  <option value="KSK">KSK</option>
                  <option value="HSK">HSK</option>
                  <option value="HBP">HBP</option>
                  <option value="BAK">BAK</option>
                  <option value="BPP">BPP</option>
                  <option value="MTK">MTK</option>
                  <option value="WTP">WTP</option>
               </select>
            </div>
            <div class="col-md-6 mb-3">
               <select class="form-select" name="tahun" required>
                  <option value="" disabled selected>Tahun</option>
                  <option value="Tahun 1 SVM">Tahun 1 SVM</option>
                  <option value="Tahun 2 SVM">Tahun 2 SVM</option>
                  <option value="Tahun 1 DVM">Tahun 1 DVM</option>
                  <option value="Tahun 2 DVM">Tahun 2 DVM</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mb-3">
               <div class="form-floating">
                  <input type="tel" name="notel" class="form-control" placeholder="No.Telefon Pelajar" required />
                  <label>No. Telefon Pelajar</label>
               </div>
            </div>
            <div class="col-md-6 mb-3">
               <div class="form-floating">
                  <input type="tel" name="notelpen" class="form-control" placeholder="No.Telefon Penjaga" required />
                  <label>No. Telefon Penjaga</label>
               </div>
            </div>
         </div>
         <div class="mb-3">
            <label for="alamat" class="form-label">Alamat :</label>
            <textarea class="form-control" style="resize:none;" name="alamat" cols="25" rows="3" required></textarea>
         </div>
         <div class="mb-3">
            <h6 class="mb-2 pb-1">Jantina: </h6>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="jantina" id="perempuan" value="perempuan" checked />
               <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="jantina" id="lelaki" value="lelaki" />
               <label class="form-check-label" for="lelaki">Lelaki</label>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mb-3">
               <select class="form-select" name="waktu" required>
                  <option value="" disabled selected>Pilihan Waktu</option>
                  <option value="9.00 A.M">9.00 A.M</option>
                  <option value="3.00 P.M">3.00 P.M</option>
               </select>
            </div>
            <div class="col-md-6 mb-3">
               <div class="form-outline">
                  <input type="date" name="tarikh" class="form-control" required />
                  <label class="form-label" for="tarikh">Tarikh</label>
               </div>
            </div>
         </div>
         <div class="mb-3">
            <div class="form-floating">
               <input type="text" name="sebab" class="form-control" placeholder="Sebab Ke Hospital" required />
               <label>Sebab Ke Hospital</label>
            </div>
         </div>
         <div class="mb-3 text-center">
            <input type="submit" class="btn btn-primary btn-lg active px-5" name="submit" value="HANTAR">
         </div>
      </form>
   </section>
</div>
<?php include "insert.php";?>

<?php
if (isset($_POST['submit'])) {
  $nama=$_POST['nama'];
  $nokp=$_POST['nokp'];
  $program=$_POST['program'];
  $tahun=$_POST['tahun'];
  $waktu=$_POST['waktu'];
  $tarikh=$_POST['tarikh'];
  $notel=$_POST['notel'];
  $notelpen=$_POST['notelpen'];
  $alamat=$_POST['alamat'];
  if (isset($_POST['program'])){
    $program=$_POST['program'];
  } else {
    $program="";
  }
  if (isset($_POST['tahun'])){
    $tahun=$_POST['tahun'];
  } else {
    $tahun="";
  }
  if (isset($_POST['jantina'])){
    $jantina=$_POST['jantina'];
  } else {
    $jantina="";
  }
  $sebab=$_POST['sebab'];
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>