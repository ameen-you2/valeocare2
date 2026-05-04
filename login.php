<?php 
session_start();
include 'db.php'; // Check karein ke db.php mein $conn variable hai

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = mysqli_real_escape_string($conn, $_POST['password']); 

    // 1. Check Doctor Table
    $q_doctor = "SELECT * FROM doctors WHERE email='$email' AND password='$pass'";
    $res_doctor = mysqli_query($conn, $q_doctor);

    if($res_doctor && mysqli_num_rows($res_doctor) == 1){
        $row = mysqli_fetch_assoc($res_doctor);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name']    = $row['name'];
        $_SESSION['role']    = 'doctor'; 
        
        header("Location: index.php"); 
        exit();
    }

    // 2. Check Patient Table
    $q_patient = "SELECT * FROM patients WHERE email='$email' AND password='$pass'";
    $res_patient = mysqli_query($conn, $q_patient);

    if($res_patient && mysqli_num_rows($res_patient) == 1){
        $row = mysqli_fetch_assoc($res_patient);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name']    = $row['name'];
        $_SESSION['role']    = 'patient'; 
        
        header("Location: index.php"); 
        exit();
    } 
    else {
        echo "<script>alert('Ghalat Email ya Password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | VALEO CLINIC</title>
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
        font-family: 'Segoe UI', sans-serif;
    }

    .login-glass-card {
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(129, 212, 250, 0.2);
        border-radius: 20px;
        width: 100%;
        max-width: 450px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        color: white;
    }

    .login-header h2 {
        color: #81D4FA;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(129, 212, 250, 0.3);
        color: white;
        padding: 12px 15px;
        border-radius: 10px;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #81D4FA;
        color: white;
        box-shadow: none;
    }

    .btn-login {
        background: #03A9F4;
        border: none;
        color: white;
        padding: 12px;
        font-weight: bold;
        border-radius: 10px;
        transition: 0.3s;
        text-transform: uppercase;
    }

    .btn-login:hover {
        background: #0288D1;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(3, 169, 244, 0.4);
    }

    .btn-home {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;
        display: block;
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
        transition: 0.3s;
    }

    .btn-home:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #81D4FA;
        border-color: #81D4FA;
    }

    .register-link a {
        color: #81D4FA;
        text-decoration: none;
        font-weight: 600;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="login-glass-card">
    <div class="login-header text-center">
        <h2><i class="fas fa-plus-square"></i> VALEO</h2>
        <p class="text-secondary mb-4">Login to your account</p>
    </div>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label small text-info">EMAIL ADDRESS</label>
            <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
        </div>
        <div class="mb-4">
            <label class="form-label small text-info">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        
        <button type="submit" name="login" class="btn btn-login w-100 mb-3">
            <i class="fas fa-sign-in-alt"></i> LOGIN
        </button>
    </form>

    <div class="register-link text-center small">
        Don't have an account? <a href="register.php">Register Here</a>
    </div>

    <hr style="border-color: rgba(255,255,255,0.1);">

    <a href="index.php" class="btn btn-home">
        <i class="fas fa-arrow-left"></i> BACK TO HOME
    </a>
</div>

</body>
</html>