<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-HEALTH</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>

<body>
    <section class="bg-section">
        <div class="logo-container">
            <img src="img/logoremove.png" alt="Logo 1">
            <img src="img/logo2remove.png" alt="Logo 2">
        </div>

        <div class="main-content-flex">
            <div class="info-news-container">
                <h4><i class="fa-solid fa-bullhorn"></i> Information & News</h4>
                <ul>
                    <li><strong>Latest:</strong> Sistem E-Health kini beroperasi sepenuhnya untuk pelajar dan guru bertugas.</li>
                    <li>Pelajar hanya dibenarkan ke hospital pada <b>9.00 pagi</b> dan <b>3.00 petang</b> sahaja.</li>
                    <li>Permohonan janji temu perlu dibuat sekurang-kurangnya <b>1 hari lebih awal</b>.</li>
                    <li>Untuk sebarang pertanyaan, sila hubungi pihak pentadbiran.</li>
                    <li><span style="color:#007bff;"><i class="fa-solid fa-circle-info"></i></span> Sila pastikan maklumat yang dimasukkan adalah tepat.Jika laku demikian akan tidak dilayan dan  SSDM Menunggu </li>
                </ul>
            </div>

            <div class="content-container">
                <div id="cautionBox" class="caution-box">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>
                        Please select your login type below.<br>
                        <b>Make sure you choose the correct category before proceeding.</b>
                    </span>
                </div>
                <div class="toggle-buttons d-flex flex-column flex-md-row gap-2 justify-content-center">
                    <button class="btn btn-primary" onclick="toggleSection('organized')">Organized</button>
                    <button class="btn btn-secondary" onclick="toggleSection('student')">Student</button>
                </div>
                <div class="card-container" id="cardContainer">
                    <div id="organized" class="card-custom hidden">
                        <h5>ORGANIZED</h5>
                        <img src="img/gururemove.png" alt="Organized">
                        <a href="GuruBertugas/index2.php" class="btn btn-primary mt-3">LOG IN</a>
                    </div>
                    <div id="student" class="card-custom hidden">
                        <h5>STUDENT</h5>
                        <img src="img/pelajar2remove.png" alt="Student">
                        <a href="Pelajar/login3.php" class="btn btn-secondary mt-3">LOG IN</a>
                    </div>
                </div>
            </div>

            <div class="ad-container">
                <h4><i class="fa-solid fa-star"></i> Promotion</h4>
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="img/ad1.jpg" alt="Ad 1" class="ad-img">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/ad2.jpg" alt="Ad 2" class="ad-img">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/ad3.jpg" alt="Ad 3" class="ad-img">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/ad4.jpg" alt="Ad 4" class="ad-img">
                    </div>
                </div>
                <p><strong>Get your health checked regularly!</strong></p>
                <p>GGGGGGGGGGGGGGGG</p>
                <a href="#" class="btn btn-warning mt-2">Learn More</a>
            </div>
        </div>
    </section>
    <script src="js/ads-slideshow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSection(sectionId) {
            document.getElementById('cautionBox').classList.add('hidden');
            document.querySelectorAll('.card-custom').forEach(card => card.classList.add('hidden'));
            document.getElementById(sectionId).classList.remove('hidden');
            const cardContainer = document.getElementById('cardContainer');
            cardContainer.classList.remove('show');
            setTimeout(() => {
                cardContainer.classList.add('show');
            }, 10);
        }
        window.onload = function() {
            document.getElementById('cautionBox').classList.remove('hidden');
            document.querySelectorAll('.card-custom').forEach(card => card.classList.add('hidden'));
            document.getElementById('cardContainer').classList.remove('show');
        }
    </script>
</body>
</html>