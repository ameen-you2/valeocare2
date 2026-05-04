<?php
session_start();
include 'db.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALEO MEDICAL CLINIC | Advanced Care</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            line-height: 1.6;
            color: #1e2937;
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






    /* diagnostic / precise theme gradient */
    .hero-gradient {
      background: linear-gradient(rgba(0, 0, 0, 0.69), rgba(184, 222, 233,0.5)), url("./images/1.jpg");
      position: relative;
      border-bottom-left-radius: 2rem;
      border-bottom-right-radius: 2rem;
      overflow: hidden;
    }

    .hero-gradient::before {
      content: '';
      position: absolute;
      top: -30%;
      left: -20%;
      width: 140%;
      height: 140%;
      background: radial-gradient(circle, rgba(80,180,210,0.2) 0%, rgba(50,140,170,0.05) 70%);
      animation: softPulse 12s infinite alternate;
      pointer-events: none;
    }

    @keyframes softPulse {
      0% { opacity: 0.3; transform: scale(1);}
      100% { opacity: 0.6; transform: scale(1.05);}
    }

    .animated-title {
      animation: fadeSlideUp 0.9s ease-out;
    }

    @keyframes fadeSlideUp {
      0% { opacity: 0; transform: translateY(35px);}
      100% { opacity: 1; transform: translateY(0);}
    }

    .content-card {
      background: rgba(255, 255, 255, 0.94);
      border: none;
      border-radius: 32px;
      box-shadow: 0 20px 35px -12px rgba(18, 72, 94, 0.08);
      transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
      height: 100%;
      padding: 1.8rem;
    }

    .content-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 28px 40px -16px rgba(18, 72, 94, 0.2);
      background: #ffffff;
    }

    .fade-up {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s cubic-bezier(0.2, 0.9, 0.4, 1.1), transform 0.7s ease;
    }

    .fade-up.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .custom-list-number {
      list-style: none;
      padding-left: 0;
      counter-reset: step-counter;
    }
    .custom-list-number li {
      counter-increment: step-counter;
      margin-bottom: 1rem;
      font-weight: 500;
      display: flex;
      align-items: baseline;
      gap: 12px;
    }
    .custom-list-number li::before {
      content: counter(step-counter);
      background: #2c7da0;
      color: white;
      font-weight: bold;
      width: 28px;
      height: 28px;
      border-radius: 30px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      flex-shrink: 0;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .dash-list {
      list-style: none;
      padding-left: 0;
    }
    .dash-list li {
      margin-bottom: 0.7rem;
      position: relative;
      padding-left: 1.6rem;
      font-weight: 500;
    }
    .dash-list li:before {
      content: "▹";
      color: #2c7da0;
      font-weight: bold;
      position: absolute;
      left: 0;
    }

    hr.divider-custom {
      width: 80px;
      height: 4px;
      background: #2c7da0;
      opacity: 0.6;
      margin: 1rem 0 1.5rem 0;
      border-radius: 4px;
    }

    .badge-pulse {
      background: #e3f0f5;
      padding: 0.3rem 1rem;
      border-radius: 40px;
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 0.3px;
      color: #1a5d7a;
    }

    .btn-soft {
      background: white;
      border: 1px solid #c7dfe8;
      color: #1a5d7a;
      border-radius: 40px;
      padding: 8px 22px;
      font-weight: 500;
      transition: all 0.25s;
    }
    .btn-soft:hover {
      background: #2c7da0;
      border-color: #2c7da0;
      color: white;
      transform: scale(1.02);
      box-shadow: 0 6px 12px rgba(44,125,160,0.2);
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









<!-- HERO SECTION with heading "Diagnosis With Precise" -->
<div class="hero-gradient py-5">
  <div class="container py-4 py-md-5">
    <div class="row align-items-center gy-4">
      <div class="col-lg-8 mx-auto text-center animated-title">
        <span class="badge-pulse d-inline-flex mb-3"><i class="fas fa-chart-line me-2"></i> AI-Enhanced Diagnostics</span>
        <h1 class="display-2 fw-bold" style="font-family: 'Playfair Display', serif; color: #165a73;">Diagnosis With Precise</h1>
        <div class="divider-custom mx-auto"></div>
        <p class="lead fs-4 mt-3 text-secondary-emphasis">Data‑driven accuracy, personalized insights — redefining the standard of diagnostic excellence.</p>
        <div class="mt-4">
          <button class="btn btn-soft btn-lg" onclick="document.getElementById('main-content').scrollIntoView({behavior:'smooth'});"><i class="fas fa-play-circle me-2"></i> Discover precision</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MAIN CONTENT: exact meat text from 2.png -->
<div class="container my-5" id="main-content">
  <div class="row g-4">
    <!-- LEFT COLUMN (first paragraph + numbered list + strip steak paragraph) -->
    <div class="col-lg-6 fade-up" id="colLeft">
      <div class="content-card">
        <div class="d-flex align-items-center gap-3 mb-3">
          <i class="fas fa-notes-medical fa-2x" style="color: #2c7da0;"></i>
          <h3 class="h4 mb-0 fw-semibold">Diagnostic perspectives</h3>
        </div>
        <p class="mb-3">Shank corned beef boudin, hamburger pig cuprim ground round landjaeger. Spare ribs pork frankfurter drumstick sirloin cupim salami. Ground round t-bone tail shank jerky, strip steak flank ribeye pancetta turducken salami cupim shoulder turkey swine. Short ribs meatloaf corned beef pastrami, tail pork belly alcatra filet mignon hamburger shoulder. Boudin short ribs pastrami, ham hock sirloin corned beef tenderloin pig. Pork ribeye ground round tenderloin chicken ham turducken sausage pancetta swine. Pork chop sirloin capicola, ribeye cupim ball tip tri-tip short loin bacon turducken boudin.</p>
        
        <!-- Numbered list exactly as in 2.png -->
        <ol class="custom-list-number mb-4">
          <li>Trip steak prosciutto brisket tongue t-bone boudin.</li>
          <li>Tail leberkas tongue turducken ground round.</li>
          <li>Pancetta fatback rump hamburger landjaeger brisket cow.</li>
        </ol>
        
        <p class="mb-2">Strip steak ham swine pork loin fatback prosciutto meatloaf jowl pig sirloin drumstick porchetta. Beef ribs t-bone shoulder tenderloin andouille. Biltong turducken strip steak rump shoulder venison short loin t-bone landjaeger tri-tip tail doner ground round.</p>
        <hr class="my-3" style="opacity:0.2;">
        <div class="mt-2 small text-secondary"><i class="fas fa-dna me-1"></i> Precision genomics & imaging</div>
      </div>
    </div>

    <!-- RIGHT COLUMN (Cow corned beef tenderloin heading + long paragraph + dash list + final paragraph) -->
    <div class="col-lg-6 fade-up" id="colRight">
      <div class="content-card">
        <div class="d-flex align-items-center gap-3 mb-3">
          <i class="fas fa-chart-line fa-2x" style="color: #2c7da0;"></i>
          <h3 class="h4 mb-0 fw-semibold"># Cow corned beef tenderloin</h3>
        </div>
        <p class="mb-3">Fatback beef ribs corned beef frankfurter tenderloin turducken, shank t-bone doner capicola filet mignon kevin beef ham hock pork belly. Spare ribs fatback leberkas brisket, tongue bresaola kevin rump cupim short loin shank kielbasa pork belly ground round. Shank chicken capicola shoulder alcatra, doner brisket rump tail landjaeger. Ribeye jowl fatback pastrami picanha. Filet mignon ham hock pork belly, bresaola corned beef leberkas short loin pork chop chuck frankfurter ham tail landjaeger. Spare ribs shank ribeye swine tongue.Fatback capicola shoulder kielbasa tail pork belly pork chop landjaeger pork loin. Biltong pork belly shank meatloaf ham hock swine alcatra shankle pig. Frankfurter short ribs tenderloin.</p>
        
        <!-- dash list from 2.png -->
        <ul class="dash-list mb-4">
          <li>Tail shank strip steak</li>
          <li>Sausage doner biltong chicken,</li>
          <li>Ribeye hamburger bacon prosciutto</li>
          <li>Drumstick tenderloin tri-tip filet kevin</li>
        </ul>
        
        <p class="mb-0">Ground round ball tip kevin pork chop hamburger alcatra, jerky bresaola pig landjaeger sirloin. Doner jerky shank capicola, turkey tenderloin ham bresaola pork swine fatback cupim ribeye drumstick. Alcatra prosciutto tail, porchetta strip steak pork jerky cupim.</p>
        <div class="mt-3 text-end"><i class="fas fa-flask text-secondary"></i> <span class="small fst-italic">lab-accurate methodology</span></div>
      </div>
    </div>
  </div>
  
  <!-- Additional row for summary / callout -->
  <div class="row mt-4 g-4">
    <div class="col-12 fade-up">
      <div class="content-card text-center bg-light bg-opacity-50">
        <div class="row align-items-center">
          <div class="col-md-8 text-md-start">
            <span class="badge bg-info bg-opacity-10 text-dark px-3 py-2 rounded-pill"><i class="fas fa-microchip me-1"></i> Real-time analytics</span>
            <p class="mt-2 mb-0 fw-medium">Every diagnostic insight is backed by rigorous data interpretation — empowering clinicians with actionable precision.</p>
          </div>
          <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <i class="fas fa-chalkboard-user fa-3x" style="color: #2c7da0; opacity: 0.7;"></i>
          </div>
        </div>
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

<!-- Bootstrap 5 CSS + Custom Styles (Responsive) -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript: scroll reveal + micro animations -->
<script>
  (function() {
    // SCROLL REVEAL ANIMATION (fade-up sections)
    const fadeElements = document.querySelectorAll('.fade-up');
    
    function checkVisibility() {
      fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        if (rect.top <= windowHeight - 80 && rect.bottom >= 80) {
          el.classList.add('visible');
        }
      });
    }
    
    window.addEventListener('load', function() {
      checkVisibility();
      fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) {
          el.classList.add('visible');
        }
      });
    });
    
    window.addEventListener('scroll', function() {
      checkVisibility();
    });
    
    // Soft pulse animation on main title
    const mainTitle = document.querySelector('.display-2');
    if(mainTitle) {
      setInterval(() => {
        mainTitle.style.transition = "text-shadow 0.3s";
        mainTitle.style.textShadow = "0px 0px 8px rgba(44,125,160,0.25)";
        setTimeout(() => {
          mainTitle.style.textShadow = "none";
        }, 800);
      }, 4500);
    }
    
    // Hover interactive cards
    const cards = document.querySelectorAll('.content-card');
    cards.forEach(card => {
      card.style.transition = "all 0.3s";
    });
    
    // Navbar brand hover effect
    const brand = document.querySelector('.navbar-brand');
    if(brand) {
      brand.addEventListener('mouseenter', () => {
        brand.style.transform = "scale(1.02)";
        brand.style.transition = "0.2s";
      });
      brand.addEventListener('mouseleave', () => {
        brand.style.transform = "scale(1)";
      });
    }
    
    console.log("Diagnosis With Precise | JS animations active");
  })();
</script>
</body>
</html>