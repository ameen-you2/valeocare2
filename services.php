<?php
session_start();
include 'db.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Medical Specialties | 6 Cards with Images</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f8fafc 0%, #f0f5f9 100%);
      color: #1f2f3e;
      overflow-x: hidden;
    }

 /* Top Bar */
.top-bar {
    background: #f8f9fa;
    padding: 12px 0;
    font-size: 15px;
}

/* Navbar */
.navbar {
    background: #4d88ad !important;
    padding: 18px 0;
    font-size: 15px !important;     /* ← Yeh important fix hai */
}

/* Nav Links */
.navbar-nav .nav-link {
    color: white;
    font-weight: 500;
    margin: 0 10px;
    font-size: 15px !important;     /* ← Yeh bhi zaroori hai */
    padding: 8px 12px;
}

/* Hover Effect */
.navbar-nav .nav-link:hover {
    color: #f0f0f0;
}

/* Dropdown Menu Styling */
.dropdown-menu {
    background-color: #4d88ad;
    border: none;
    margin-top: 0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.dropdown-item {
    color: white;
    padding: 10px 20px;
    font-size: 15px;
}

.dropdown-item:hover {
    background-color: #3a6f8f;
    color: white;
}

/* Hover Dropdown (Show on hover) */
.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown .dropdown-menu {
    display: none;
}

/* Optional: Active link styling */
.navbar-nav .nav-link.active {
    color: #fff;
    font-weight: 600;
}




    .page-header {
      background: linear-gradient(115deg, #eef2f7 0%, #e3eaf1 100%);
      padding: 3rem 0 2.5rem;
      border-bottom: 1px solid rgba(0,0,0,0.05);
      margin-bottom: 2rem;
    }
    h1.section-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: #1a4d6b;
    }
    .specialty-card {
      background: rgba(255, 255, 255, 0.97);
      border: none;
      border-radius: 2rem;
      transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
      box-shadow: 0 18px 30px -12px rgba(0, 32, 54, 0.08);
      height: 100%;
      overflow: hidden;
    }
    .specialty-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 28px 40px -16px rgba(26, 77, 107, 0.25);
      background: #ffffff;
    }
    .card-img-top-custom {
      width: 100%;
      height: 210px;
      object-fit: cover;
      border-top-left-radius: 2rem;
      border-top-right-radius: 2rem;
      transition: transform 0.4s ease;
    }
    .specialty-card:hover .card-img-top-custom {
      transform: scale(1.02);
    }
    .card-body-custom {
      padding: 1.5rem 1.5rem 1.8rem;
    }
    .card-icon-badge {
      width: 48px;
      height: 48px;
      background: rgba(44, 100, 130, 0.12);
      border-radius: 24px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
    }
    .card-icon-badge i {
      font-size: 1.6rem;
      color: #2c6482;
    }
    .specialty-card h3 {
      font-size: 1.65rem;
      font-weight: 700;
      font-family: 'Playfair Display', serif;
      margin-bottom: 0.75rem;
      color: #1e445e;
    }
    .specialty-card p {
      color: #3b5568;
      line-height: 1.55;
      font-weight: 400;
      margin-bottom: 1rem;
      font-size: 0.95rem;
    }
    .badge-chip {
      background: #eef3f8;
      color: #2c6482;
      font-weight: 500;
      padding: 0.3rem 0.8rem;
      border-radius: 40px;
      font-size: 0.75rem;
      display: inline-block;
      margin-right: 0.4rem;
      margin-top: 0.5rem;
    }
    .custom-divider {
      width: 70px;
      height: 4px;
      background: #2c6482;
      opacity: 0.4;
      margin: 0.5rem auto 0;
      border-radius: 4px;
    }
    .btn-outline-soft {
      background: transparent;
      border: 1px solid #cbdde6;
      color: #2c6482;
      border-radius: 40px;
      padding: 6px 20px;
      font-size: 0.85rem;
      font-weight: 500;
      transition: 0.2s;
    }
    .btn-outline-soft:hover {
      background: #2c6482;
      border-color: #2c6482;
      color: white;
    }
    footer {
      background: rgba(255,255,245,0.7);
      backdrop-filter: blur(4px);
      border-top: 1px solid rgba(0,0,0,0.05);
      margin-top: 3rem;
    }
    .fade-up {
      opacity: 0;
      transform: translateY(32px);
      transition: opacity 0.7s cubic-bezier(0.2, 0.9, 0.4, 1.1), transform 0.7s ease;
    }
    .fade-up.visible {
      opacity: 1;
      transform: translateY(0);
    }
    @keyframes fadeSlideUp {
      0% { opacity: 0; transform: translateY(30px);}
      100% { opacity: 1; transform: translateY(0);}
    }
    .animated-title {
      animation: fadeSlideUp 0.8s ease forwards;
    }
    @media (max-width: 768px) {
      .card-body-custom { padding: 1.2rem; }
      .specialty-card h3 { font-size: 1.4rem; }
      .card-img-top-custom { height: 170px; }
    }


 /* Background and General Styling */
.medical-footer {
        background-color: #5D96C8;
        color: white;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        position: relative;
        width: 100%;
        margin-top: auto; /* Push to bottom if in flex container */
        
        background-repeat: no-repeat;
        background-position: center 30px;
        background-size: 600px;
        bottom: -50px;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px 0 20px 0;
    }

    .top-contact .label {
        display: block;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: rgba(255, 255, 255, 0.8);
    }

    .top-contact .value {
        font-size: 24px;
        font-weight: 700;
    }

    .text-right { text-align: right; }

    .main-logo-area { width: 300px; text-align: center; }
    .logo-image { max-width: 100%; height: auto; }

    .footer-divider {
        border: 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        margin: 10px 0 50px 0;
    }

    .footer-middle {
        display: flex;
        justify-content: space-between;
        padding-bottom: 80px;
    }

    .footer-col { width: 31%; }
    .col-title { font-size: 18px; font-weight: 700; margin-bottom: 25px; }

    .btn-outline {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.5);
        color: white;
        padding: 15px;
        width: 100%;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-solid {
        background: white;
        color: #5D96C8;
        border: none;
        padding: 15px;
        width: 100%;
        font-weight: bold;
        cursor: pointer;
    }

    .footer-bottom {
        background-color: #4A81AF;
        padding: 15px 0;
    }

    .bottom-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
    }

    .social-links { display: flex; gap: 15px; }

    /* Responsive */
    @media (max-width: 850px) {
        .footer-top {
            flex-direction: column;
            text-align: center;
        }
        .online-box {
            text-align: center;
        }
        .footer-links {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .link-col {
            text-align: center;
        }
        .footer-bottom {
            flex-direction: column;
            text-align: center;
        }
    }
    @media (max-width: 480px) {
        .exact-footer {
            padding: 1.5rem;
        }
        .logo-name {
            font-size: 1.3rem;
        }
        .emergency-phone {
            font-size: 1rem;
        }
    }




  </style>
</head>
<body>

    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center text-center text-md-left">
                <div class="col-md-4">
                    <i class="fas fa-phone-alt"></i> <strong>EMERGENCY CASES</strong> +1 (800) 450 7550
                </div>
                <div class="col-md-4">
                    <h2 class="logo mb-0 text-center"><i class="fas fa-plus-square"></i> VALEO</h2>
                </div>
                <div class="col-md-4 text-md-right">
                    <i class="fas fa-envelope"></i> VALEO@GMAIL.COM
                </div>
            </div>
        </div>
    </div>

 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li><a class="nav-link" href="index.php">Home</a></li>
 <li class="nav-item"><a class="nav-link" href="about.php">ABOUT US</a></li>

 <!-- SERVICES DROPDOWN with 6 options -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            SERVICES
          </a>
          <div class="dropdown-menu" aria-labelledby="servicesDropdown">
            <a class="dropdown-item" href="primaryhealthcare.php"> PRIMARY HEALTH CARE</a>
            <a class="dropdown-item" href="gynaecologicalclinic.php">GYNAECOLOGICAL CLINIC</a>
            <a class="dropdown-item" href="generalsurgery.php">GENERAL SURGERY</a>
            <a class="dropdown-item" href="diagnosiswithprecise.php">DIAGNOSIS WITH PRECISE</a>
            <a class="dropdown-item" href="cardiacclinic.php"> CARDIAC CLINIC</a>
            <a class="dropdown-item" href="rehabilitationstudio.php"> REHABILITATION STUDIO</a>
          </div>
      
        </li>

        
 <?php if(isset($_SESSION['role']) && $_SESSION['role'] !== 'doctor'): ?><li class="nav-item"><a class="nav-link" href="timetable.php">TIMETABLE</a> 
        <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT US</a></li>
      </ul>
     
<ul class="navbar-nav auth-links">
        <li><a class="nav-link" href="search_doctor.php">Find Doctor</a></li>
       
     <li><a class="nav-link" href="appointment.php">Book Appointment</a></li><?php endif; ?>
      
        <?php if(isset($_SESSION['user_id'])): ?>
          <li><a class="nav-link" href="logout.php">Logout (<?= $_SESSION['name'] ?>)</a></li>
        <?php else: ?>
          <li><a class="nav-link" href="login.php">Login</a></li>
          <li><a class="nav-link" href="register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>






<div class="container my-4 pb-4">
  <div class="row g-4">
    <!-- CARD 1: PRIMARY HEALTH CARE - family doctor image -->
    <div class="col-md-6 col-lg-4 fade-up">
      <div class="specialty-card">
        <img class="card-img-top-custom" src="./images/primary.jpg" alt="Primary Health Care">
        <div class="card-body-custom">
          <div class="card-icon-badge"><i class="fas fa-stethoscope"></i></div>
          <h3>Primary Health Care</h3>
          <p>Fulfilled with family healthcare in high-breeding practices. Grown our own succulent pork products.</p>
          <div><span class="badge-chip"><i class="fas fa-clock me-1"></i> 24/7 support</span><span class="badge-chip"><i class="fas fa-shield-alt me-1"></i> preventive care</span></div>
        </div>
      </div>
    </div>
    <!-- CARD 2: GYNAECOLOGICAL CLINIC - women's health image -->
    <div class="col-md-6 col-lg-4 fade-up">
      <div class="specialty-card">
        <img class="card-img-top-custom" src="./images/gynaecological.jpg" alt="Gynaecological Clinic">
        <div class="card-body-custom">
          <div class="card-icon-badge"><i class="fas fa-female"></i></div>
          <h3>Gynaecological Clinic</h3>
          <p>Jerkly briefed lunchbreak, chop succulent shearlike turkey bell lip billeting brewsolic capricious</p>
          <div><span class="badge-chip"><i class="fas fa-baby-carriage me-1"></i> maternity</span><span class="badge-chip"><i class="fas fa-egg me-1"></i> fertility</span></div>
        </div>
      </div>
    </div>
    <!-- CARD 3: GENERAL SURGERY - operation theatre image -->
    <div class="col-md-6 col-lg-4 fade-up">
      <div class="specialty-card">
        <img class="card-img-top-custom" src="./images/general.jpg" alt="General Surgery">
        <div class="card-body-custom">
          <div class="card-icon-badge"><i class="fas fa-scalpel"></i></div>
          <h3>General Surgery</h3>
          <p>Shark cow pork chop herbivore capricious bell lip brewsolic peddler short ban billeting</p>
          <div><span class="badge-chip"><i class="fas fa-robot me-1"></i> robotic surgery</span><span class="badge-chip"><i class="fas fa-procedures me-1"></i> minimally invasive</span></div>
        </div>
      </div>
    </div>
    <!-- CARD 4: DIAGNOSIS WITH PRECISE - lab / microscope image -->
    <div class="col-md-6 col-lg-4 fade-up">
      <div class="specialty-card">
        <img class="card-img-top-custom" src="./images/diagnostics.jpg" alt="Primary Health Care">
        <div class="card-body-custom">
          <div class="card-icon-badge"><i class="fas fa-microscope"></i></div>
          <h3>Diagnosis With Precise</h3>
          <p>Jerkly briefed lunchbreak, chop succulent shearlike turkey bell lip billeting brewsolic capricious</p>
          <div><span class="badge-chip"><i class="fas fa-dna me-1"></i> genomics</span><span class="badge-chip"><i class="fas fa-chart-line me-1"></i> AI imaging</span></div>
        </div>
      </div>
    </div>
    <!-- CARD 5: CARDIAC CLINIC - heart / ecg image -->
    <div class="col-md-6 col-lg-4 fade-up">
      <div class="specialty-card">
        <img class="card-img-top-custom" src="./images/cardiac.jpg" alt="Primary Health Care" alt="Cardiac Clinic">
        <div class="card-body-custom">
          <div class="card-icon-badge"><i class="fas fa-heartbeat"></i></div>
          <h3>Cardiac Clinic</h3>
          <p>Jerkly briefed lunchbreak, chop succulent shearlike turkey bell lip billeting brewsolic capricious</p>
          <div><span class="badge-chip"><i class="fas fa-ecg me-1"></i> electrophysiology</span><span class="badge-chip"><i class="fas fa-heart me-1"></i> cardiac rehab</span></div>
        </div>
      </div>
    </div>
    <!-- CARD 6: REHABILITATION STUDIO - physiotherapy image -->
    <div class="col-md-6 col-lg-4 fade-up">
      <div class="specialty-card">
        <img class="card-img-top-custom" src="./images/rehabilitation.jpg" alt="Rehabilitation Studio">
        <div class="card-body-custom">
          <div class="card-icon-badge"><i class="fas fa-person-walking"></i></div>
          <h3>Rehabilitation Studio</h3>
          <p>Jerkly briefed lunchbreak, chop succulent shearlike turkey bell lip billeting brewsolic capricious</p>
          <div><span class="badge-chip"><i class="fas fa-hand-holding-heart me-1"></i> physical therapy</span><span class="badge-chip"><i class="fas fa-brain me-1"></i> occupational</span></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 text-center fade-up">
      <div class="p-4 rounded-4 bg-white bg-opacity-50 shadow-sm" style="border-radius: 2rem;">
     
      
        <button class="btn btn-outline-soft mt-2" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"><i class="fas fa-chevron-up me-1"></i> back to top</button>
      </div>
    </div>
  </div>
</div>


<!-- ========================
     FOOTER - EXACT MATCH TO IMAGE
     Emergency | Logo | Online Consultation | Newsletter | Map | Doctors | Social
     ======================== -->
<footer class="medical-footer">
    <div class="footer-container footer-top">
        <div class="top-contact">
            <span class="label">EMERGENCY CASES</span>
            <span class="value">+1 (800) 450 7550</span>
        </div>
        
        
           <div class="col-md-4">
                    <h2 class="logo mb-0 text-center"><i class="fas fa-plus-square"></i> VALEO</h2>
                </div>
        

        <div class="top-contact text-right">
            <span class="label">ONLINE CONSULTATION</span>
            <span class="value">VALEO@GMAIL.COM</span>
        </div>
    </div>

    <div class="footer-container"><hr class="footer-divider"></div>

    <div class="footer-container footer-middle">
        <div class="footer-col">
            <h3 class="col-title">NEWSLETTER SIGNUP</h3>
        </div>
        <div class="footer-col">
            <h3 class="col-title">SEARCH ON THE MAP</h3>
          
       
       <a href="https://www.google.com/maps/dir/?api=1&destination=Aptech+Computer+Education+North+Karachi+Center" target="_blank" class="directions-btn">
            <button class="btn-outline">GET DIRECTIONS ON THE MAP</button>
        </a>
   

        </div>
        <div class="footer-col">
            <h3 class="col-title">MEET OUR DOCTORS</h3>
           <a href="timetable.php" ><button class="btn-solid">DOCTORS TIMETABLE</button></a>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-container bottom-wrap">
            <div>© VALEO - MEDICAL CLINIC / HEALTH CENTER © 2026</div>
            <div class="social-links">
                <span>Facebook</span> | <span>X</span> | <span>YouTube</span>
            </div>
            <div>CREATED WITH ❤ BY AUTHOR</div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  (function() {
    const fadeElements = document.querySelectorAll('.fade-up');
    function checkVisibility() {
      fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top <= window.innerHeight - 80) el.classList.add('visible');
      });
    }
    window.addEventListener('load', checkVisibility);
    window.addEventListener('scroll', checkVisibility);
  })();
</script>
</body>
</html>