<?php 
session_start();
include 'db.php'; 

// 1. Connection check karein
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// 2. Query ko check karein
$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);

// Agar query mein ghalti hai to error show hoga
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Doctor | VALEO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053') no-repeat center center fixed;
        background-size: cover;
    }
    .main-container {
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        color: white;
        padding: 30px;
        margin-top: 50px;
        border: 1px solid rgba(129, 212, 250, 0.2);
    }
    .doctor-card .card {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(129, 212, 250, 0.3);
        color: white;
        transition: 0.3s;
    }
    .doctor-card .card:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.15);
    }

    .btn-home-custom {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: transparent;
    color: #81D4FA; /* Light Blue jo aapke titles ka hai */
    border: 1px solid rgba(129, 212, 250, 0.5);
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
    width: 100%; /* Column ki width ke mutabiq adjust ho jayega */
}

.btn-home-custom:hover {
    background: #81D4FA;
    color: #000; /* Hover pe text black ho jayega taake clear nazar aye */
    box-shadow: 0 0 15px rgba(129, 212, 250, 0.4);
    transform: translateY(-2px);
    text-decoration: none;
}

.btn-home-custom i {
    font-size: 1.1rem;
}
  </style>
</head>
<body>

<div class="container py-5">
  <div class="main-container shadow">
    <h2 class="mb-4 text-center" style="color: #81D4FA;">Find Specialist Doctor</h2>
    
    <!-- Filters -->
    <div class="row mb-4">
      <div class="col-md-4 mb-2">
        <select id="cityFilter" class="form-select bg-dark text-white border-info">
          <option value="">All Cities</option>
          <option value="Karachi">Karachi</option>
          <option value="Lahore">Lahore</option>
        </select>
      </div>
      <div class="col-md-4 mb-2">
        <select id="specialtyFilter" class="form-select bg-dark text-white border-info">
          <option value="">All Specialties</option>
          <option value="Cardiologist">Cardiologist</option>
          <option value="Gynecologist">Gynecologist</option>
          <option value="Surgeon">Surgeon</option>
        </select>
      </div>
      <div class="col-md-4">
        <button class="btn btn-info w-100 fw-bold" onclick="filterDoctors()">SEARCH DOCTOR</button>
      </div>
    </div>

    <!-- Doctors Display Area -->
    <div class="row" id="doctorsContainer">
      <?php
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)): 
              // Debugging ke liye: Agar koi field missing hai to default value show hogi
              $name = isset($row['name']) ? $row['name'] : 'Unknown Name';
              $spec = isset($row['specialty']) ? $row['specialty'] : 'Not Specified';
              $city = isset($row['city']) ? $row['city'] : 'N/A';
              $fees = isset($row['fees']) ? $row['fees'] : '0';
          ?>
            <div class="col-md-4 mb-4 doctor-card" 
                 data-city="<?= htmlspecialchars($city) ?>" 
                 data-specialty="<?= htmlspecialchars($spec) ?>">
              <div class="card h-100">
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold" style="color: #81D4FA;"><?= htmlspecialchars($name) ?></h5>
                  <hr style="border-color: rgba(255,255,255,0.1);">
                  <p class="mb-2"><b>Specialty:</b> <?= htmlspecialchars($spec) ?></p>
                  <p class="mb-2"><b>Location:</b> <?= htmlspecialchars($city) ?></p>
                  <p class="mb-3"><b>Consultation:</b> <span class="badge bg-success">Rs. <?= htmlspecialchars($fees) ?></span></p>
                  <a href="appointment.php?id=<?= $row['id'] ?>" class="btn btn-info w-100 btn-sm">Book Appointment</a>
                </div>
              </div>
            </div>

      
          <?php endwhile; 
      } else {
          // Agar database mein doctors hain magar yahan nahi aa rahe, to iska matlab connection ya table ka masla hai
          echo "<div class='col-12 text-center'><div class='alert alert-danger'>No records found in 'doctors' table. Please check your database.</div></div>";
      }
      ?>

      <a href="index.php" class="btn btn-home-custom">
    <i class="fas fa-home"></i> BACK TO HOME
</a>
    </div>
  </div>
</div>

<script>
function filterDoctors() {
  const city = document.getElementById('cityFilter').value.toLowerCase();
  const specialty = document.getElementById('specialtyFilter').value.toLowerCase();
  
  document.querySelectorAll('.doctor-card').forEach(card => {
    const cardCity = card.getAttribute('data-city').toLowerCase();
    const cardSpec = card.getAttribute('data-specialty').toLowerCase();
    
    const cityMatch = city === '' || cardCity.includes(city);
    const specMatch = specialty === '' || cardSpec.includes(specialty);

    if (cityMatch && specMatch) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}
</script>

</body>
</html>