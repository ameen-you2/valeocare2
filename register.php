<?php 
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | VALEO CLINIC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <style>
    body {
        background: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 0;
    }

    .register-glass-card {
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(129, 212, 250, 0.2);
        border-radius: 20px;
        width: 100%;
        max-width: 750px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        color: white;
    }

    .card-header-custom {
        text-align: center;
        margin-bottom: 30px;
    }

    .card-header-custom h3 {
        color: #81D4FA;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .section-title {
        color: #81D4FA;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(129, 212, 250, 0.2);
        padding-bottom: 10px;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(129, 212, 250, 0.3);
        color: white;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #81D4FA;
        color: white;
        box-shadow: 0 0 10px rgba(129, 212, 250, 0.2);
    }

    .form-select option {
        background: #1a1a1a;
        color: white;
    }

    .btn-register {
        background: #03A9F4;
        border: none;
        color: white;
        padding: 15px;
        font-weight: bold;
        border-radius: 10px;
        transition: 0.3s;
        text-transform: uppercase;
    }

    .btn-register:hover {
        background: #0288D1;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(3, 169, 244, 0.4);
    }

    .login-link a {
        color: #81D4FA;
        text-decoration: none;
        font-weight: bold;
    }

    hr {
        border-color: rgba(255, 255, 255, 0.1);
        margin: 30px 0;
    }

    /* Placeholder color set karne ke liye */
::placeholder {
    color: #81D4FA !important;
    opacity: 0.7; /* Thora transparent taake real text aur isme farq lage */
}

/* Internet Explorer aur Edge ke liye */
:-ms-input-placeholder {
    color: #81D4FA !important;
}

/* Firefox ke liye */
::-moz-placeholder {
    color: #81D4FA !important;
    opacity: 0.7;
}
  </style>
</head>
<body>

<div class="register-glass-card">
    <div class="card-header-custom">
        <h3>Create Your Account</h3>
        <p class="text-secondary">Join VALEO Medical Portal</p>
    </div>

    <form action="register_process.php" method="POST">
        
        <h5 class="section-title">Basic Information</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name *" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address *" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password *" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="tel" name="phone" class="form-control" placeholder="Phone Number *" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold text-info">Register As a:</label>
            <select name="role" id="roleSelect" class="form-select" onchange="toggleFields()" required>
                <option value="">-- Choose Role --</option>
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
            </select>
        </div>

        <hr>

        <div id="patientFields" style="display:none;">
            <h5 class="section-title">Patient Profile</h5>
            <div class="mb-3">
                <textarea name="address" class="form-control" placeholder="Full Home Address" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <select name="city_p" class="form-select">
                    <option value="">Select City</option>
                    <option value="Karachi">Karachi</option>
                    <option value="Lahore">Lahore</option>
                    <option value="Islamabad">Islamabad</option>
                </select>
            </div>
        </div>

        <div id="doctorFields" style="display:none;">
            <h5 class="section-title">Professional Doctor Profile</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="specialty" class="form-control" placeholder="Specialty (e.g. Surgeon)">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="number" name="experience" class="form-control" placeholder="Years of Experience">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="number" name="fees" class="form-control" placeholder="Consultation Fees (Rs.)">
                </div>
                <div class="col-md-6 mb-3">
                    <select name="city_d" class="form-select">
                        <option value="">Select Clinic City</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Islamabad">Islamabad</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" name="register" class="btn btn-register w-100 py-3 mt-3">Register Account</button>
    </form>
    
    <p class="text-center mt-4 text-secondary">
        Already have an account? <a href="login.php">Login Here</a>
    </p>
</div>

<script>
function toggleFields() {
    var role = document.getElementById('roleSelect').value;
    var pFields = document.getElementById('patientFields');
    var dFields = document.getElementById('doctorFields');

    if(role === 'patient') {
        pFields.style.display = 'block';
        dFields.style.display = 'none';
        pFields.querySelectorAll('input, select, textarea').forEach(el => el.required = true);
        dFields.querySelectorAll('input, select, textarea').forEach(el => el.required = false);
    } 
    else if(role === 'doctor') {
        dFields.style.display = 'block';
        pFields.style.display = 'none';
        dFields.querySelectorAll('input, select, textarea').forEach(el => el.required = true);
        pFields.querySelectorAll('input, select, textarea').forEach(el => el.required = false);
    } 
    else {
        pFields.style.display = 'none';
        dFields.style.display = 'none';
    }
}
</script>

</body>
</html>