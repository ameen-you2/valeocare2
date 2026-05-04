<?php
session_start();
include 'db.php';

// Patient login check
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'patient'){
    header("Location: login.php");
    exit();
}

$patient_id = $_SESSION['user_id'];
$success = false;

// --- LINE 17 FIX (As per your doctors table) ---
$doctor_query = "SELECT id, name, specialty, city FROM doctors"; 
$doctor_result = mysqli_query($conn, $doctor_query);

if (!$doctor_result) {
    die("Query Failed: " . mysqli_error($conn));
}

if(isset($_POST['book_appointment'])){
    $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
    $date      = mysqli_real_escape_string($conn, $_POST['date']);
    $time      = mysqli_real_escape_string($conn, $_POST['time']);
    $notes     = mysqli_real_escape_string($conn, $_POST['notes']);

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, notes, status) 
            VALUES ('$patient_id', '$doctor_id', '$date', '$time', '$notes', 'Pending')";

    if(mysqli_query($conn, $sql)){
        $success = true;
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment | VALEO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 40px 0;
    }
    .appointment-glass-card {
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(129, 212, 250, 0.2);
      border-radius: 20px;
      padding: 40px;
      color: white;
      box-shadow: 0 15px 35px rgba(0,0,0,0.5);
    }
    .section-title { color: #81D4FA; font-weight: 700; text-transform: uppercase; }
    .form-control, .form-select {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(129, 212, 250, 0.3);
      color: white;
      border-radius: 10px;
      padding: 12px;
    }
    ::placeholder { color: #81D4FA !important; opacity: 0.6; }
    .form-select option { background: #1a1a1a; color: white; }
    .btn-book { background: #03A9F4; border: none; color: white; font-weight: bold; padding: 15px; transition: 0.3s; width: 100%; border-radius: 10px; }
    .btn-book:hover { background: #0288D1; transform: translateY(-2px); }
    
    .back-home {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #81D4FA;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }
    .back-home:hover { color: white; }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="appointment-glass-card">
        <div class="text-center mb-4">
          <h2 class="section-title"><i class="fas fa-calendar-plus"></i> Book Appointment</h2>
          <p class="text-secondary">Schedule your visit with our specialists</p>
        </div>

        <?php if($success): ?>
          <div class="alert alert-success bg-dark text-info border-info text-center">
            ✅ Appointment Booked Successfully!
          </div>
        <?php endif; ?>

        <form method="POST">
          <div class="row mb-3">
            <div class="col-md-6 mb-3">
              <label class="form-label text-info small fw-bold">SELECT DOCTOR</label>
              <select name="doctor_id" class="form-select" required>
                <option value="">-- Select Specialist --</option>
                <?php 
                while($doc = mysqli_fetch_assoc($doctor_result)) {
                    echo "<option value='".$doc['id']."'>Dr. ".$doc['name']." (".$doc['specialty'].")</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label text-info small fw-bold">DATE</label>
              <input type="date" name="date" class="form-control" required>
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label text-info small fw-bold">TIME SLOT</label>
            <div class="row g-2">
              <div class="col-3"><input type="radio" name="time" value="09:00" class="btn-check" id="t1" required><label class="btn btn-outline-info w-100" for="t1">9AM</label></div>
              <div class="col-3"><input type="radio" name="time" value="11:00" class="btn-check" id="t2"><label class="btn btn-outline-info w-100" for="t2">11AM</label></div>
              <div class="col-3"><input type="radio" name="time" value="14:00" class="btn-check" id="t3"><label class="btn btn-outline-info w-100" for="t3">2PM</label></div>
              <div class="col-3"><input type="radio" name="time" value="16:00" class="btn-check" id="t4"><label class="btn btn-outline-info w-100" for="t4">4PM</label></div>
            </div>
          </div>

          <div class="mb-4">
            <textarea name="notes" class="form-control" rows="3" placeholder="Symptoms or notes..."></textarea>
          </div>

          <button type="submit" name="book_appointment" class="btn btn-book py-3">
            CONFIRM BOOKING
          </button>
          
          <!-- Back to Home Link -->
          <a href="index.php" class="back-home">
            <i class="fas fa-arrow-left"></i> Back to Home
          </a>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>