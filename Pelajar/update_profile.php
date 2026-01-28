<?php

include 'config.php';
session_start();
$id_pelajar = $_SESSION['id_pelajar'];

if(isset($_POST['update_profile'])){

   $update_nama = mysqli_real_escape_string($conn, $_POST['update_nama']);
   $update_nokp = mysqli_real_escape_string($conn, $_POST['update_nokp']);

   mysqli_query($conn, "UPDATE `user_form` SET nama = '$update_nama', nokp = '$update_nokp' WHERE id_pelajar = '$id_pelajar'") or die('query failed');

   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($_POST['update_pass']) || !empty($_POST['new_pass']) || !empty($_POST['confirm_pass'])){
      // Fetch current password from DB
      $get_pass = mysqli_query($conn, "SELECT password FROM `user_form` WHERE id_pelajar = '$id_pelajar'");
      $row_pass = mysqli_fetch_assoc($get_pass);
      if($update_pass != $row_pass['password']){
         $message[] = 'Old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         $message[] = 'Password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Image updated successfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH - Update Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <style>
      body {
        background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Arial, sans-serif;
      }
      .profile-card {
        background: #fff;
        border-radius: 25px;
        box-shadow: 0 6px 24px rgba(0,0,0,0.10);
        padding: 2.5rem 2rem;
        max-width: 480px;
        margin: 40px auto;
        position: relative;
      }
      .profile-avatar {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #00bcd4;
        margin: 0 auto 1rem auto;
        display: block;
        background: #f1f1f1;
      }
      .profile-title {
        font-weight: 700;
        color: #00bcd4;
        text-align: center;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
      }
      .form-floating label {
        color: #00bcd4;
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
      @media (max-width: 600px) {
        .profile-card {
          padding: 1.2rem 0.5rem;
        }
        .profile-avatar {
          width: 90px;
          height: 90px;
        }
      }
    </style>
</head>
<body>
<div class="container">
  <div class="profile-card mt-5">
    <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id_pelajar = '$id_pelajar'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
        echo '<img class="profile-avatar" src="images/default-avatar.png" alt="Avatar">';
      }else{
        echo '<img class="profile-avatar" src="uploaded_img/'.$fetch['image'].'" alt="Avatar">';
      }
    ?>
    <h3 class="profile-title">Update Profile</h3>
    <?php
      if(isset($message)){
        foreach($message as $msg){
          echo '<div class="message alert alert-info" role="alert">'.$msg.'</div>';
        }
      }
    ?>
    <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
      <div class="form-floating mb-3">
        <input type="text" name="update_nama" value="<?php echo $fetch['nama']; ?>" class="form-control" id="floatingNama" placeholder="Nama Penuh" required>
        <label for="floatingNama"><i class="fa fa-user"></i> Nama Penuh</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="update_nokp" value="<?php echo $fetch['nokp']; ?>" class="form-control" id="floatingNokp" placeholder="No. Kad Pengenalan" required>
        <label for="floatingNokp"><i class="fa fa-id-card"></i> No. Kad Pengenalan</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="update_pass" class="form-control" id="floatingOldPass" placeholder="Kata laluan lama">
        <label for="floatingOldPass"><i class="fa fa-lock"></i> Kata laluan lama</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="new_pass" class="form-control" id="floatingNewPass" placeholder="Kata laluan baru">
        <label for="floatingNewPass"><i class="fa fa-key"></i> Kata laluan baru</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="confirm_pass" class="form-control" id="floatingConfirmPass" placeholder="Ulang kata laluan">
        <label for="floatingConfirmPass"><i class="fa fa-key"></i> Ulang kata laluan</label>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label"><i class="fa fa-image"></i> Gambar Profil (jpg/png, max 2MB)</label>
        <input class="form-control" type="file" id="formFile" name="update_image" accept="image/jpg, image/jpeg, image/png">
      </div>
      <button type="submit" name="update_profile" class="btn btn-main mt-2">Simpan</button>
    </form>
    <div class="back-link">
      <p>Kembali ke <a href="pelajarhome.php">halaman utama</a></p>
    </div>
  </div>
</div>
</body>
</html>