<?php
session_start();
// Database Connection - Make sure "care_db" exists
$conn = mysqli_connect("localhost", "root", "", "care_db");
$show_alert = false;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Form Submission Logic
if (isset($_POST['send_msg'])) {
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
    $user_type = isset($_SESSION['role']) ? $_SESSION['role'] : 'patient';

    $query = "INSERT INTO contact_messages (user_id, user_type, full_name, subject, phone, email, message) 
              VALUES ('$user_id', '$user_type', '$name', '$subject', '$phone', '$email', '$msg')";
    
    if (mysqli_query($conn, $query)) {
        $show_alert = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALEO MEDICAL CLINIC | Contact Us</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column; /* Isse footer niche rahega */
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


        /* Main Content Wrapper */
        .main-wrapper {
            flex: 1; /* Ye header aur footer ke beech ki jagah lega */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }

        .glass-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            width: 90%;
            max-width: 1100px;
            display: flex;
            gap: 30px;
            border: 1px solid rgba(129, 212, 250, 0.2);
            flex-wrap: wrap;
            box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        }

        .section-title { color: #81D4FA; font-size: 28px; margin-bottom: 25px; text-transform: uppercase; }

        /* Form Inputs */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; width: 100%; }
        .form-side, .map-side { flex: 1; min-width: 320px; }
        
        input, textarea {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(129, 212, 250, 0.3);
            padding: 15px;
            color: white;
            border-radius: 8px;
            outline: none;
            width: 100%;
        }

        input:focus, textarea:focus { border-color: #03A9F4; background: rgba(255, 255, 255, 0.15); }
        textarea { grid-column: span 2; height: 120px; }

        .send-btn {
            grid-column: span 2;
            background: #03A9F4;
            color: white;
            border: none;
            padding: 15px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s;
        }
        .send-btn:hover { background: #0288D1; transform: scale(1.02); }

        /* Map Styling */
        .map-wrapper { border-radius: 15px; overflow: hidden; border: 2px solid #81D4FA; height: 320px; }
        iframe { width: 100%; height: 100%; border: 0; }

        /* Footer */
        .medical-footer { background-color: #5D96C8; color: white; width: 100%; padding-top: 40px; }
        .footer-bottom { background-color: #4A81AF; padding: 15px 0; margin-top: 30px; }
        .footer-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .footer-top { display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; }
        .footer-divider { border-top: 1px solid rgba(255,255,255,0.2); margin: 20px 0; }
        .footer-middle { display: flex; justify-content: space-between; padding-bottom: 40px; flex-wrap: wrap; gap: 20px;}
        .btn-solid { background: white; color: #5D96C8; border: none; padding: 12px; width: 100%; font-weight: bold; cursor: pointer; border-radius: 5px;}
        .btn-outline { background: transparent; border: 1px solid white; color: white; padding: 12px; width: 100%; border-radius: 5px; cursor: pointer;}


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
    </style>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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



<!-- Contact Section -->
<div class="main-wrapper">
    <div class="glass-container">
        <div class="form-side">
            <h2 class="section-title">Contact Us</h2>
            <form method="POST" class="form-grid">
                <input type="text" name="full_name" placeholder="FULL NAME" required>
                <input type="text" name="subject" placeholder="SUBJECT">
                <input type="text" name="phone" placeholder="PHONE NUMBER">
                <input type="email" name="email" placeholder="YOUR EMAIL ADDRESS" required>
                <textarea name="message" placeholder="WRITE YOUR MESSAGE HERE..."></textarea>
                <button type="submit" name="send_msg" class="send-btn">SUBMIT MESSAGE</button>
            </form>
        </div>

        <div class="map-side">
            <h2 class="section-title">Location</h2>
            <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.924!2d67.06019!3d24.9686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb3408f65752969%3A0x63351239c4d8f52e!2sAptech%20North%20Karachi!5e0"></iframe>
            </div>
            <a href="https://www.google.com/maps/dir/?api=1&destination=Aptech+North+Karachi" target="_blank" class="directions-btn" style="color: #81D4FA; display:block; margin-top:10px; text-align:center;">
                ➔ Get Directions
            </a>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<?php if($show_alert): ?>
<script>
    Swal.fire({
        title: 'Success!',
        text: 'Your message has been sent.',
        icon: 'success',
        background: '#1a1a1a',
        color: '#81D4FA',
        confirmButtonColor: '#03A9F4'
    });
</script>
<?php endif; ?>
</body>
</html>