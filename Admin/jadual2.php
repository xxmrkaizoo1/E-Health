<!-- filepath: c:\xampp\htdocs\hospital\Admin\jadual2.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>

    <?php include "config.php"; ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <style>
        body {
            background: linear-gradient(120deg, #e0f7fa 0%, #b2ebf2 100%);
            font-family: 'Poppins', sans-serif;
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
        .btn-group .btn {
            border-radius: 12px;
            font-weight: bold;
            transition: all 0.3s ease;
            background: linear-gradient(90deg, #20b2aa 60%, #47beb7 100%);
            color: #fff;
            border: none;
        }
        .btn-group .btn:hover, .btn-group .btn.active {
            background: linear-gradient(90deg, #97d1cc 60%, #acdde5 100%);
            color: #fff;
            transform: scale(1.05);
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            transition: transform 0.3s, box-shadow 0.3s;
            background: #fff;
        }
        .card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
        }
        .card-body img {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        @media (max-width: 767px) {
            .btn-group .btn {
                font-size: 0.95rem;
                padding: 0.5rem 0.7rem;
            }
            .main-header {
                padding: 1.2rem 0.5rem 1rem 0.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once "index.html"; ?>

        <div class="main-header text-center">
            <h2 class="mb-2"><i class="fa-regular fa-calendar-days"></i> Jadual Guru Bertugas</h2>
            <p class="mb-0 text-muted">Click button dibawah untuk merujuk guru bertugas.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="btn-group d-flex flex-wrap mb-4" role="group" aria-label="Toggle Buttons">
                    <button class="btn btn-primary flex-fill m-1" type="button" data-bs-target="#content1">
                        (21.04.2025 – 25.04.2025)
                    </button>
                </div>

                <!-- Collapsible content areas -->
                <div id="content1" class="collapse mt-3">
                    <div class="card card-body">
                        <img src="jadualnew.png" alt="Content Image 1" class="img-fluid">
                        <img src="new.png" alt="Content Image 1" class="img-fluid">
                    </div>
                </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Only one collapse open at a time, highlight active button
        document.querySelectorAll('.btn-group .btn').forEach(button => {
            button.addEventListener('click', function () {
                // Remove active from all
                document.querySelectorAll('.btn-group .btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                // Get the target content
                const targetId = this.getAttribute('data-bs-target');
                const targetContent = document.querySelector(targetId);

                // Hide all content
                document.querySelectorAll('.collapse').forEach(content => {
                    if (content !== targetContent) {
                        const bsCollapse = new bootstrap.Collapse(content, { toggle: false });
                        bsCollapse.hide();
                    }
                });

                // Show the target content
                const bsCollapse = new bootstrap.Collapse(targetContent, { toggle: true });
                bsCollapse.show();
            });
        });
    </script>
</body>
</html>