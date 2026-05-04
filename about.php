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



/* =============== Top Bar & Navbar =============== */

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



 /* Hero Section */
        .hero {
            display: flex;
            min-height: 620px;
            background: #f8fafc;
        }

        .hero-image {
            flex: 1;
            background: url('https://media.post.rvohealth.io/wp-content/uploads/2020/08/Doctors_For_Men-732x549-thumbnail-1-732x549.jpg') center/cover no-repeat;
            position: relative;
        }

        .hero-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(15, 74, 138, 0.1), transparent);
        }

        .hero-content {
            flex: 1;
            padding: 80px 8% 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-content h1 {
            font-size: 42px;
            font-weight: 700;
            color: #0f4a8a;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 18px;
            color: #475569;
            max-width: 480px;
            margin-bottom: 40px;
        }

        /* Features Grid */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 24px 20px;
            box-shadow: 0 10px 30px rgba(15, 74, 138, 0.08);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            background: #dbeafe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: #0f4a8a;
            flex-shrink: 0;
        }

        .feature-text h3 {
            font-size: 17px;
            font-weight: 600;
            color: #0f4a8a;
            margin-bottom: 4px;
        }

        .feature-text p {
            font-size: 14px;
            color: #64748b;
        }

        /* Testimonial Section */
        .testimonial {
            background: linear-gradient(rgba(40, 41, 44, 0.92), rgba(26, 26, 29, 0.92)),
                        url('https://www.etkho.com/wp-content/uploads/2021/09/hospital-safety-equipment-maintenance-protocol-pic03-20210930-etkho-hospital-engineering.jpg') center/cover no-repeat;
            color: white;
            padding: 110px 8%;
            text-align: center;
            position: relative;
        }

        .testimonial h2 {
            font-size: 28px;
            margin-bottom: 40px;
            color: #bae6fd;
        }

        .quote {
            font-size: 22px;
            max-width: 820px;
            margin: 0 auto 30px;
            font-style: italic;
            line-height: 1.5;
        }

        .author {
            font-size: 16px;
            font-weight: 600;
        }

        .author span {
            color: #bae6fd;
        }

        /* Our Team Section */
        .team-section {
            padding: 90px 8% 100px;
            background: white;
        }

        .team-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .team-header h2 {
            font-size: 34px;
            color: #0f4a8a;
            margin-bottom: 12px;
        }

        .team-header p {
            max-width: 620px;
            margin: 0 auto;
            color: #475569;
            font-size: 17px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .team-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(15, 74, 138, 0.1);
            transition: all 0.4s ease;
        }

        .team-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(15, 74, 138, 0.15);
        }

        .team-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .team-info {
            padding: 24px;
            text-align: center;
        }

        .team-info h3 {
            font-size: 20px;
            color: #0f4a8a;
            margin-bottom: 4px;
        }

        .team-info p {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 18px;
        }

        .phone {
            display: block;
            color: #0f4a8a;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 16px;
            font-size: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 14px;
        }

        .social-links a {
            color: #64748b;
            font-size: 20px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            color: #0f4a8a;
            transform: scale(1.2);
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









<!-- Hero Section -->
    <section class="hero">
        <div class="hero-image"></div>
        
        <div class="hero-content">
            <h1>What Makes Us Different</h1>
            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of the moment.</p>

            <!-- Features -->
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-hand-holding-medical"></i></div>
                    <div class="feature-text">
                        <h3>FREE CONSULTATION</h3>
                        <p>Completely free first visit with our specialist</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-tags"></i></div>
                    <div class="feature-text">
                        <h3>AFFORDABLE PRICES</h3>
                        <p>Best prices in the city with no hidden charges</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-user-md"></i></div>
                    <div class="feature-text">
                        <h3>QUALIFIED DOCTORS</h3>
                        <p>Highly experienced and certified medical team</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-laptop-medical"></i></div>
                    <div class="feature-text">
                        <h3>PROFESSIONAL STAFF</h3>
                        <p>Trained and caring support team available 24/7</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-clock"></i></div>
                    <div class="feature-text">
                        <h3>24/7 OPENED</h3>
                        <p>Round the clock emergency and regular services</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-users"></i></div>
                    <div class="feature-text">
                        <h3>~50,000 HAPPY CLIENTS</h3>
                        <p>Trusted by thousands of satisfied patients</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial">
        <h2>What patients say About Valeo</h2>
        
        <div class="quote">
            “The Cancer team at Valeo are nothing short of miracle workers - they were able to help me overcome my Leukemia in just 6 months”
        </div>
        
        <div class="author">
            CHRISTINE BLAIR, <span>BLOOD PATIENT</span>
        </div>
        
        <div style="margin-top: 60px; font-size: 28px; opacity: 0.3;">
            •••
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="team-section">
        <div class="team-header">
            <h2>Our Team</h2>
            <p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
        </div>

        <div class="team-grid">
            <!-- Doctor 1 -->
            <div class="team-card">
                <img src="https://img.freepik.com/premium-photo/doctor-beautiful-girl-smiling-portrait-yellow-uniform-with-stethoscope-near-window-health-care-background_185696-461.jpg?semt=ais_hybrid&w=740&q=80" alt="Vickie Bryant">
                <div class="team-info">
                    <h3>VICKIE BRYANT</h3>
                    <p>GENERAL DOCTOR</p>
                    <a href="tel:18002544512" class="phone">☎ 1 (800) 254 4512</a>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Doctor 2 -->
            <div class="team-card">
                <img src="https://www.careersineyecare.org.uk/wp-content/uploads/2021/10/pexels-anthony-shkraba-6749777-1.jpg" alt="Geraldine Graham">
                <div class="team-info">
                    <h3>GERALDINE GRAHAM</h3>
                    <p>DENTAL SURGEON</p>
                    <a href="tel:18008007000" class="phone">☎ 1 (800) 800 7000</a>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Doctor 3 -->
            <div class="team-card">
                <img src="https://img.freepik.com/free-photo/female-doctor-hospital_23-2148827756.jpg?semt=ais_hybrid&w=740&q=80" alt="Valerie Farmer">
                <div class="team-info">
                    <h3>VALERIE FARMER</h3>
                    <p>COSMETIC SURGEON</p>
                    <a href="tel:18004565484" class="phone">☎ 1 (800) 456 5484</a>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Doctor 4 -->
            <div class="team-card">
                <img src="https://st.depositphotos.com/1377214/4746/i/450/depositphotos_47463479-stock-photo-doctor-using-tablet-pc.jpg" alt="Eloise Stephens">
                <div class="team-info">
                    <h3>ELOISE STEPHENS</h3>
                    <p>THERAPY</p>
                    <a href="tel:18008007000" class="phone">☎ 1 (800) 800 7000</a>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>









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

    </body>
</html>