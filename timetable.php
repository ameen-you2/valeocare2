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






        .time-container {
            max-width: 1380px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1);
            overflow: hidden;
        }

        .header {
            background: #0f4a8a;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }

        .header h1 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .tabs {
            background: #f1f7ff;
            padding: 18px 30px 12px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            border-bottom: 1px solid #e2e8f0;
        }

        .tab {
            padding: 10px 22px;
            background: #e0f0ff;
            color: #0f4a8a;
            border: none;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(15, 74, 138, 0.1);
        }

        .tab:hover {
            background: #c8e0ff;
            transform: translateY(-1px);
        }

        .tab.active {
            background: #0f4a8a;
            color: white;
            box-shadow: 0 4px 12px rgba(15, 74, 138, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #0f4a8a;
            color: white;
            padding: 14px 12px;
            font-weight: 600;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 3px solid #1e5aa8;
        }

        .time-header {
            width: 140px;
            font-size: 15px;
            background: #0f4a8a;
            color: white;
        }

        td.time {
            background: #f0f9ff;
            width: 140px;
            font-weight: 700;
            font-size: 15px;
            color: #0f4a8a;
            text-align: center;
            border-right: 3px solid #e2e8f0;
            vertical-align: middle;
        }

        td {
            padding: 12px;
            vertical-align: top;
            border-bottom: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
            min-height: 85px;
        }

        .event {
            background: #f0f9ff;
            border-radius: 8px;
            padding: 12px;
            box-shadow: inset 0 1px 3px rgba(15, 74, 138, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            min-height: 78px;
        }

        .event.hidden {
            display: none;
        }

        .event-name {
            font-weight: 700;
            font-size: 13.5px;
            text-transform: uppercase;
            color: #0f4a8a;
            line-height: 1.3;
            margin-bottom: 4px;
        }

        .event-time {
            font-size: 12.5px;
            color: #475569;
            font-weight: 500;
        }

        .empty {
            background: transparent;
            box-shadow: none;
        }

        tr:last-child td {
            border-bottom: none;
        }

    

        @media (max-width: 1024px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
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









    <div class="table-container">
        <!-- Tabs / Filters -->
        <div class="tabs">
            <button class="tab active" data-filter="ALL">ALL EVENTS</button>
            <button class="tab" data-filter="CARDIO MONITORING">CARDIO MONITORING</button>
            <button class="tab" data-filter="MEDICAL TREATMENT">MEDICAL TREATMENT</button>
            <button class="tab" data-filter="GENERAL ANALYSIS">GENERAL ANALYSIS</button>
            <button class="tab" data-filter="EMERGENCY HELP">EMERGENCY HELP</button>
            <button class="tab" data-filter="LABORATORY TEST">LABORATORY TEST</button>
            <button class="tab" data-filter="SYMPTOM CHECK">SYMPTOM CHECK</button>
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th class="time-header"></th>
                    <th>SUNDAY</th>
                    <th>MONDAY</th>
                    <th>TUESDAY</th>
                    <th>WEDNESDAY</th>
                    <th>THURSDAY</th>
                    <th>FRIDAY</th>
                    <th>SATURDAY</th>
                </tr>
            </thead>
            <tbody id="schedule-body"></tbody>
        </table>

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

    <script>
        // Exact data from your picture (every single cell copied 1:1)
        const times = [
            "8:00 am", "9:00 am", "10:00 am", "11:00 am",
            "12:00 pm", "1:00 pm", "2:00 pm", "3:00 pm",
            "4:00 pm", "5:00 pm", "6:00 pm", "7:00 pm"
        ];

        const days = ["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];

        const scheduleData = {
            "SUNDAY": {
                "8:00 am": { event: "CARDIO MONITORING", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "MEDICAL TREATMENT", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "GENERAL ANALYSIS", range: "10:00 am - 11:00 am" },
                "11:00 am": { event: "EMERGENCY HELP", range: "11:00 am - 12:00 pm" },
                "12:00 pm": { event: "LABORATORY TEST", range: "12:00 pm - 1:00 pm" },
                "1:00 pm": { event: "SYMPTOM CHECK", range: "1:00 pm - 2:00 pm" },
                "2:00 pm": { event: "CARDIO MONITORING", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": null,
                "4:00 pm": { event: "GENERAL ANALYSIS", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": { event: "EMERGENCY HELP", range: "5:00 pm - 6:00 pm" },
                "6:00 pm": { event: "LABORATORY TEST", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": { event: "SYMPTOM CHECK", range: "7:00 pm - 8:00 pm" }
            },
            "MONDAY": {
                "8:00 am": { event: "EMERGENCY HELP", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "MEDICAL TREATMENT", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "GENERAL ANALYSIS", range: "10:00 am - 11:00 am" },
                "11:00 am": { event: "CARDIO MONITORING", range: "11:00 am - 12:00 pm" },
                "12:00 pm": { event: "LABORATORY TEST", range: "12:00 pm - 1:00 pm" },
                "1:00 pm": { event: "CARDIO MONITORING", range: "1:00 pm - 2:00 pm" },
                "2:00 pm": { event: "SYMPTOM CHECK", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": { event: "MEDICAL TREATMENT", range: "3:00 pm - 4:00 pm" },
                "4:00 pm": { event: "LABORATORY TEST", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": { event: "EMERGENCY HELP", range: "5:00 pm - 6:00 pm" },
                "6:00 pm": { event: "GENERAL ANALYSIS", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": null
            },
            "TUESDAY": {
                "8:00 am": { event: "CARDIO MONITORING", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "GENERAL ANALYSIS", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "MEDICAL TREATMENT", range: "10:00 am - 11:00 am" },
                "11:00 am": { event: "CARDIO MONITORING", range: "11:00 am - 12:00 pm" },
                "12:00 pm": { event: "LABORATORY TEST", range: "12:00 pm - 1:00 pm" },
                "1:00 pm": { event: "SYMPTOM CHECK", range: "1:00 pm - 2:00 pm" },
                "2:00 pm": { event: "CARDIO MONITORING", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": null,
                "4:00 pm": { event: "GENERAL ANALYSIS", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": { event: "EMERGENCY HELP", range: "5:00 pm - 6:00 pm" },
                "6:00 pm": { event: "EMERGENCY HELP", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": { event: "SYMPTOM CHECK", range: "7:00 pm - 8:00 pm" }
            },
            "WEDNESDAY": {
                "8:00 am": { event: "GENERAL ANALYSIS", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "MEDICAL TREATMENT", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "MEDICAL TREATMENT", range: "10:00 am - 11:00 am" },
                "11:00 am": { event: "MEDICAL TREATMENT", range: "11:00 am - 12:00 pm" },
                "12:00 pm": { event: "LABORATORY TEST", range: "12:00 pm - 1:00 pm" },
                "1:00 pm": { event: "MEDICAL TREATMENT", range: "1:00 pm - 2:00 pm" },
                "2:00 pm": { event: "SYMPTOM CHECK", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": null,
                "4:00 pm": { event: "LABORATORY TEST", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": { event: "EMERGENCY HELP", range: "5:00 pm - 6:00 pm" },
                "6:00 pm": { event: "LABORATORY TEST", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": { event: "SYMPTOM CHECK", range: "7:00 pm - 8:00 pm" }
            },
            "THURSDAY": {
                "8:00 am": { event: "CARDIO MONITORING", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "MEDICAL TREATMENT", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "LABORATORY TEST", range: "10:00 am - 11:00 am" },
                "11:00 am": null,
                "12:00 pm": { event: "LABORATORY TEST", range: "12:00 pm - 1:00 pm" },
                "1:00 pm": null,
                "2:00 pm": { event: "CARDIO MONITORING", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": { event: "MEDICAL TREATMENT", range: "3:00 pm - 4:00 pm" },
                "4:00 pm": { event: "GENERAL ANALYSIS", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": { event: "SYMPTOM CHECK", range: "5:00 pm - 6:00 pm" },
                "6:00 pm": { event: "MEDICAL TREATMENT", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": null
            },
            "FRIDAY": {
                "8:00 am": { event: "CARDIO MONITORING", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "MEDICAL TREATMENT", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "GENERAL ANALYSIS", range: "10:00 am - 11:00 am" },
                "11:00 am": null,
                "12:00 pm": { event: "CARDIO MONITORING", range: "12:00 pm - 1:00 pm" },
                "1:00 pm": { event: "SYMPTOM CHECK", range: "1:00 pm - 2:00 pm" },
                "2:00 pm": { event: "CARDIO MONITORING", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": { event: "EMERGENCY HELP", range: "3:00 pm - 4:00 pm" },
                "4:00 pm": { event: "GENERAL ANALYSIS", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": { event: "MEDICAL TREATMENT", range: "5:00 pm - 6:00 pm" },
                "6:00 pm": { event: "EMERGENCY HELP", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": null
            },
            "SATURDAY": {
                "8:00 am": { event: "CARDIO MONITORING", range: "8:00 am - 9:00 am" },
                "9:00 am": { event: "MEDICAL TREATMENT", range: "9:00 am - 10:00 am" },
                "10:00 am": { event: "GENERAL ANALYSIS", range: "10:00 am - 11:00 am" },
                "11:00 am": { event: "EMERGENCY HELP", range: "11:00 am - 12:00 pm" },
                "12:00 pm": null,
                "1:00 pm": { event: "SYMPTOM CHECK", range: "1:00 pm - 2:00 pm" },
                "2:00 pm": { event: "GENERAL ANALYSIS", range: "2:00 pm - 3:00 pm" },
                "3:00 pm": { event: "GENERAL ANALYSIS", range: "3:00 pm - 4:00 pm" },
                "4:00 pm": { event: "CARDIO MONITORING", range: "4:00 pm - 5:00 pm" },
                "5:00 pm": null,
                "6:00 pm": { event: "LABORATORY TEST", range: "6:00 pm - 7:00 pm" },
                "7:00 pm": { event: "SYMPTOM CHECK", range: "7:00 pm - 8:00 pm" }
            }
        };

        // Populate the full table (exact same as picture)
        function populateTable() {
            const tbody = document.getElementById('schedule-body');
            tbody.innerHTML = '';

            times.forEach(time => {
                const row = document.createElement('tr');

                // Time column
                const timeCell = document.createElement('td');
                timeCell.className = 'time';
                timeCell.innerHTML = `<strong>${time}</strong>`;
                row.appendChild(timeCell);

                // Day columns
                days.forEach(day => {
                    const cell = document.createElement('td');
                    const entry = scheduleData[day] ? scheduleData[day][time] : null;

                    if (entry) {
                        const eventHTML = `
                            <div class="event" data-type="${entry.event}">
                                <div class="event-name">${entry.event}</div>
                                <div class="event-time">${entry.range}</div>
                            </div>
                        `;
                        cell.innerHTML = eventHTML;
                    } else {
                        cell.innerHTML = `<div class="event empty"></div>`;
                    }
                    row.appendChild(cell);
                });

                tbody.appendChild(row);
            });
        }

        // Filter function (exactly as you asked - only selected event shows, everything else hides)
        function filterTable(selectedFilter) {
            const allEvents = document.querySelectorAll('.event');
            
            allEvents.forEach(eventDiv => {
                if (selectedFilter === 'ALL') {
                    eventDiv.classList.remove('hidden');
                } else {
                    if (eventDiv.getAttribute('data-type') === selectedFilter) {
                        eventDiv.classList.remove('hidden');
                    } else {
                        eventDiv.classList.add('hidden');
                    }
                }
            });
        }

        // Initialize everything
        function init() {
            populateTable();

            // Tab click handlers
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active from all
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active to clicked
                    tab.classList.add('active');
                    
                    const filterValue = tab.getAttribute('data-filter');
                    filterTable(filterValue);
                });
            });

            console.log('%c✅ Same-to-same timetable ready! Filters working perfectly.', 'color: #0f4a8a; font-size: 16px; font-weight: bold;');
        }

        // Run when page loads
        window.onload = init;
    </script>
</body>
</html>