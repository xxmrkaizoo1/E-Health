<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-HEALTH</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .bg-section {
            background-image: url('img/gmbrindex.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .logo-container img {
            max-width: 300px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1);
        }

        .main-content-flex {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            max-width: 1400px;
            margin: auto;
            gap: 30px;
            justify-content: center;
        }

        .info-news-container {
            flex: 1 1 320px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 30px 20px;
            margin: 20px 0;
            color: #333;
            min-width: 280px;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

        .info-news-container h4 {
            color: #20b2aa;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .info-news-container ul {
            padding-left: 18px;
        }

        .info-news-container li {
            margin-bottom: 10px;
            font-size: 1.05rem;
        }

        .content-container {
            flex: 2 1 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-width: 320px;
            margin: 20px 0;
        }

        .toggle-buttons {
            margin-bottom: 30px;
        }

        .toggle-buttons button {
            font-size: 1.2rem;
            padding: 15px 30px;
            border-radius: 30px;
            border: none;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 200px;
            background: linear-gradient(45deg, #20b2aa, #47beb7);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            margin-bottom: 10px;
        }

        .toggle-buttons button.btn-secondary {
            background: linear-gradient(45deg, #20b2aa, #47beb7 );
        }

        .toggle-buttons button:hover {
            background: linear-gradient(45deg, #5a6268, #444b50);
            transform: scale(1.1);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .toggle-buttons button.btn-secondary:hover {
            background: linear-gradient(45deg, #5a6268, #444b50);
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            padding: 20px;
            max-width: 100%;
            margin: 0 auto;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .card-container.show {
            opacity: 1;
            transform: scale(1);
        }

        .card-custom {
            background: rgba(0, 0, 0, 0.15);
            border-radius: 50px;
            box-shadow: 0 6px 12px rgba(17, 164, 232, 0.41);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-custom img {
            width: 150px;
            height: 150px;
            margin: 20px auto;
            display: block;
        }

        .card-custom h5 {
            font-size: 1.8rem;
            margin: 15px 0;
            color: #333;
        }

        .card-custom a {
            display: block;
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #20b2aa;
            color: white;
            border-radius: 25px;
            text-decoration: none;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .card-custom a.btn-secondary {
            background-color:rgb(50, 140, 147);
        }

        .card-custom a:hover {
            background-color: #acdde5;
        }

        .card-custom a.btn-secondary:hover {
            background-color: #acdde5;
        }

        .ad-container {
            flex: 1 1 320px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 30px 20px;
            margin: 20px 0;
            color: #333;
            min-width: 280px;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .ad-container h4 {
            color: #20b2aa ;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .ad-img {
            width: 100%;
            max-width: 250px;
            border-radius: 18px;
            margin-bottom: 15px;
            opacity: 1;
            transition: opacity 0.7s ease;
        }

        .ad-img.fade-out {
            opacity: 0;
        }

        .ad-img.fade-in {
            opacity: 1;
        }

        .caution-box {
            background: #fff3cd;
            color: #856404;
            border-radius: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
            padding: 18px 20px;
            margin-bottom: 20px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            justify-content: center;
        }

        .caution-box i {
            font-size: 1.5rem;
        }

        .hidden {
            display: none !important;
        }

        @media (max-width: 1200px) {
            .main-content-flex {
                flex-direction: column;
                align-items: stretch;
            }

            .info-news-container,
            .content-container,
            .ad-container {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .logo-container img {
                max-width: 150px;
            }

            .info-news-container,
            .content-container,
            .ad-container {
                padding: 15px 5px;
                margin: 10px 0;
            }

            .card-custom {
                max-width: 100%;
                padding: 20px;
            }

            .card-custom img {
                width: 120px;
                height: 120px;
            }

            .card-custom h5 {
                font-size: 1.5rem;
            }

            .card-custom a {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .caution-box {
                font-size: 1rem;
                padding: 12px 10px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
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
                    <li>Permohonan ke hopital perlu dibuat <b> sebelum jam 8:45 pagi bagi sesi pagi dan 2:45 petang bagi sesi petang </b>.</li>
                    <li>guru bertugas akan mengesahkan borang permohonan pada <b>8.45 pagi dan 2.45 petang </b>.</li>
                    <li>Untuk sebarang pertanyaan, sila hubungi pihak pentadbiran.</li>
                    <li><span style="color:#007bff;"><i class="fa-solid fa-circle-info"></i></span> Sila pastikan maklumat yang dimasukkan adalah tepat.Jika tidak laku dengan betul  ,  demikian akan tidak dilayan dan SSDM Menunggu </li>
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
                <h4><i class="fa-solid fa-star"></i> Tempat bagi nasihat atau lain lain</h4>
                <div id="adSlideshow" style="width:100%;text-align:center;">
                    <img id="adImg" src="img/ad1.jpg" alt="Ad" class="ad-img">
                    <div class="mt-2">
                        <span class="badge bg-secondary" id="adDot1">&bull;</span>
                        <span class="badge bg-light text-secondary" id="adDot2">&bull;</span>
                        <span class="badge bg-light text-secondary" id="adDot3">&bull;</span>
                        <span class="badge bg-light text-secondary" id="adDot4">&bull;</span>
                    </div>
                </div>
                <p id="adText"><strong>Get your health checked regularly!</strong></p>
                <p id="adDesc">Visit our partner clinics for exclusive student discounts. Stay healthy, stay safe!</p>
                <a href="#" class="btn btn-warning mt-2">Learn More</a>
            </div>
        </div>
    </section>
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

    const adImages = [
        {img: "img/ad1.jpg", title: "Get your health checked regularly!", desc: "Visit our partner clinics for exclusive student discounts. Stay healthy, stay safe!"},
        {img: "img/ad2.jpg", title: "Eat Healthy!", desc: "Balanced nutrition is key to a healthy life. Choose fruits and vegetables every day."},
        {img: "img/ad3.jpg", title: "Exercise Often!", desc: "Regular exercise boosts your immune system and keeps you fit."},
        {img: "img/ad4.jpg", title: "Mental Health Matters!", desc: "Take breaks, talk to friends, and seek help if you need it."}
    ];
    let adIndex = 0;
    let adImg = document.getElementById('adImg');
    let adText = document.getElementById('adText');
    let adDesc = document.getElementById('adDesc');

    function showAd(idx) {

        adImg.classList.add('fade-out');
        setTimeout(() => {
            adImg.src = adImages[idx].img;
            adText.innerHTML = "<strong>" + adImages[idx].title + "</strong>";
            adDesc.innerText = adImages[idx].desc;

            for(let i=1; i<=4; i++) {
                document.getElementById('adDot'+i).className = "badge " + (i-1===idx ? "bg-secondary" : "bg-light text-secondary");
            }

            adImg.classList.remove('fade-out');
            adImg.classList.add('fade-in');
            setTimeout(() => {
                adImg.classList.remove('fade-in');
            }, 700);
        }, 700);
    }
    setInterval(function() {
        adIndex = (adIndex + 1) % adImages.length;
        showAd(adIndex);
    }, 3500);

    window.addEventListener('DOMContentLoaded', function() {
        adImg = document.getElementById('adImg');
        adText = document.getElementById('adText');
        adDesc = document.getElementById('adDesc');
        showAd(0);
    });
</script>