<?php 
session_start();
include 'db.php'; 

// Check karein ke user login hai aur role 'doctor' hai
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    header("Location: login.php");
    exit();
}

$doctor_id = $_SESSION['user_id'];

// Query: Appointments ke sath Patient ka naam bhi nikalna hai table join karke
$query = "SELECT a.*, p.name as patient_name, p.phone as patient_phone 
          FROM appointments a 
          JOIN patients p ON a.patient_id = p.id 
          WHERE a.doctor_id = '$doctor_id' 
          ORDER BY a.appointment_date DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard | VALEO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <style>
    body {
        background: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        color: white;
    }
    .glass-panel {
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        border: 1px solid rgba(129, 212, 250, 0.2);
        padding: 30px;
        margin-top: 50px;
    }
    .table-glass {
        color: white;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        overflow: hidden;
    }
    .table-glass th {
        background: rgba(129, 212, 250, 0.2);
        color: #81D4FA;
        border: none;
        text-transform: uppercase;
        font-size: 14px;
    }
    .table-glass td {
        border-color: rgba(255, 255, 255, 0.1);
        vertical-align: middle;
    }
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }
    .btn-action {
        border-radius: 8px;
        font-size: 13px;
        transition: 0.3s;
    }
  </style>
</head>
<body>

<div class="container">
    <div class="glass-panel shadow-lg">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 style="color: #81D4FA;"><i class="fas fa-calendar-check"></i> My Appointments</h2>
                <p class="text-secondary">Welcome, Dr. <?= $_SESSION['name'] ?></p>
            </div>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>

        <div class="table-responsive">
            <table class="table table-glass mt-3">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Contact</th>
                        <th>Date</th>
                        <th>Time Slot</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td class="fw-bold"><?= htmlspecialchars($row['patient_name']) ?></td>
                                <td><?= htmlspecialchars($row['patient_phone']) ?></td>
                                <td><?= date('d M, Y', strtotime($row['appointment_date'])) ?></td>
                                <td><span class="text-info"><?= htmlspecialchars($row['time_slot']) ?></span></td>
                                <td>
                                    <span class="status-badge bg-primary text-white">Upcoming</span>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-secondary">Abhi tak koi appointment book nahi hui.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            <a href="index.php" class="btn btn-outline-info">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
        </div>
    </div>
</div>

</body>
</html>