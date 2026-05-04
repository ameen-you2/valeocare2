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
        :root { --primary-blue: #4d88ad; 
    --sea-green: #2c9c8c; --dark-blue: #4d88ad; --gray-light: #6c7e8c;}
        body { font-family: 'Segoe UI', sans-serif; }

        /* Top Bar & Navbar */
        .top-bar { background: #f8f9fa; padding: 12px 0; font-size: 15px; }
         .navbar { background: #4d88ad !important; padding: 18px 0; }
    .navbar-nav .nav-link { color: white; font-weight: 500; margin: 0 10px; }
    .navbar-nav .nav-link:hover { color: #f0f0f0; }
    /* Dropdown menu styling */
    .dropdown-menu { 
      background-color: #4d88ad; 
      border: none; 
      margin-top: 0; /* so it sits right under the link */
    }
    .dropdown-item { 
      color: white; 
      padding: 8px 20px;
    }
    .dropdown-item:hover { 
      background-color: #3a6f8f; 
      color: white; 
    }
    /* Hover dropdown - show menu on hover */
    .dropdown:hover .dropdown-menu {
      display: block;
    }
    /* Optional: prevent dropdown from disappearing too quickly */
    .dropdown .dropdown-menu {
      display: none;
    }

        /* Hero Carousel */
        .hero-carousel {
            height: 100vh;
            min-height: 720px;
            position: relative;
        }
        .carousel-item {
            height: 100vh;
            min-height: 720px;
            background-size: cover;
            background-position: center;
        }
        .carousel-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(10,61,107,0.75), rgba(10,61,107,0.4));
        }

        .hero-content {
            position: absolute;
            top: 42%;
            left: 8%;
            z-index: 2;
            color: white;
        }
        .hero-content h1 {
            font-size: 3.1rem;
            font-weight: 700;
            line-height: 1.15;
        }

        .custom-carousel-btn {
            width: 55px;
            height: 55px;
            background: rgba(255,255,255,0.95);
            border: none;
            border-radius: 6px;
            color: var(--primary-blue);
            font-size: 24px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.25);
        }
        .carousel-controls {
            position: absolute;
            bottom: 22%;
            left: 8%;
            z-index: 10;
            display: flex;
            gap: 12px;
        }

        .boxes-wrapper {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%); 
            width: 100%;
            max-width: 1050px;
            z-index: 100;
        }
        .no-gutters { display: flex; align-items: flex-end; }
        .info-box {
            position: relative;
            height: 70px;
            padding: 22px 25px;
            color: white;
            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
            cursor: pointer;
            overflow: hidden;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .info-box:hover {
            height: 230px; 
            box-shadow: 0 -10px 25px rgba(0,0,0,0.2);
            padding-top: 30px;
        }
        .box-content {
            opacity: 0;
            margin-top: 25px;
            transition: 0.3s ease;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .info-box:hover .box-content { opacity: 1; }
        .working-box { background-color: #436d8d; }
        .contact-box { background-color: #6296bd; }
        .appoint-box { background-color: #81d4fa; }
        .info-box h5 { font-size: 1rem; font-weight: 700; text-transform: uppercase; margin: 0; white-space: nowrap; }

        /* medical features section */
        .medical-features-section{
            width:100%;
            background:#eef2f4;
            overflow:hidden;
            padding:0;
        }
        .feat-wrapper{
            display:flex;
            align-items:stretch;
            min-height:520px;
        }
        .feat-image-side{
            width:38%;
        }
        .feat-image-side img{
            width:100%;
            height:100%;
            object-fit:cover;
            display:block;
        }
        .feat-text-side{
            width:62%;
            padding:70px 60px;
        }
        .feat-header h2{
            font-size:46px;
            font-weight:700;
            color:#2f628f;
            margin-bottom:15px;
            line-height:1.1;
        }
        .feat-header p{
            color:#8ba9c1;
            font-size:18px;
            line-height:1.8;
            max-width:760px;
            margin-bottom:35px;
        }
        .six-box-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            border-top:1px solid #d8e1e8;
        }
        .six-box-grid .feat-item{
            display:flex;
            align-items:center;
            gap:18px;
            padding:28px 10px;
            border-bottom:1px solid #d8e1e8;
        }
        .six-box-grid .feat-item:nth-child(odd){
            border-right:1px solid #d8e1e8;
        }
        .six-box-grid .feat-item i{
            font-size:42px;
            color:#8ec0df;
            width:50px;
            text-align:center;
        }
        .six-box-grid .feat-item h3{
            margin:0;
            font-size:17px;
            font-weight:700;
            color:#2f628f;
            line-height:1.3;
        }
        @media (max-width: 768px) {
            .feat-wrapper { flex-direction: column; }
            .feat-text-side { padding: 40px 20px; text-align: center; }
            .six-box-grid { grid-template-columns:1fr; }
            .six-box-grid .feat-item:nth-child(odd){ border-right:none; }
        }

        /* Medical Services Dark Section */
        .medical-services-dark {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            max-width: 1400px;
            margin: 0 auto;
            padding: 3.5rem 2rem;
            background: linear-gradient(rgba(0, 0, 0, 0.69), rgba(0, 0, 0, 0.69)), url("./images/1.jpg");
            background-size: cover;
            box-sizing: border-box;
            position: relative;
        }
        .medical-services-dark::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(45deg, rgba(45, 157, 219, 0.02) 0px, rgba(45, 157, 219, 0.02) 2px, transparent 2px, transparent 8px);
            pointer-events: none;
            border-radius: 32px;
        }
        .msd-title-block { text-align: center; margin-bottom: 3.2rem; position: relative; z-index: 2; }
        .msd-main-title { font-size: 2.8rem; font-weight: 700; color: #ffffff; margin-bottom: 1.2rem; text-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        .msd-sub-line { font-size: 1.05rem; color: #a3d0e8; max-width: 780px; margin: 0 auto 0.6rem auto; line-height: 1.5; }
        .msd-italic-line { font-size: 0.98rem; color: #7bb3d1; font-style: italic; max-width: 780px; margin: 0 auto; }
        .msd-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-top: 1.5rem; position: relative; z-index: 2; }
        .msd-card { background: rgba(18, 30, 42, 0.7); backdrop-filter: blur(2px); padding: 2rem 1.5rem 1.8rem; border-radius: 28px; text-align: center; transition: all 0.25s ease; border: 1px solid rgba(45, 157, 219, 0.2); }
        .msd-card:hover { transform: translateY(-5px); border-color: #2d9cdb; box-shadow: 0 20px 35px -12px rgba(45, 157, 219, 0.25); background: rgba(18, 30, 42, 0.85); }
        .msd-icon { width: 70px; height: 70px; background: rgba(45, 157, 219, 0.12); border-radius: 60px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.3rem auto; border: 1px solid rgba(45, 157, 219, 0.35); }
        .msd-card-title { font-size: 1.55rem; font-weight: 600; color: #ffffff; margin-bottom: 1.2rem; }
        .msd-card-line1 { font-size: 0.98rem; color: #b8daf0; line-height: 1.45; margin-bottom: 0.4rem; font-weight: 500; }
        .msd-card-line2 { font-size: 0.95rem; color: #85b9da; line-height: 1.45; }

        /* ========== BOOKING CONTAINER (UPDATED: form left, departments right, plus/minus, dropdown) ========== */
         /* Additional styles for the corrected section (ensure dropdown fits) */
    /* TWO TABLES WITH BACKGROUND IMAGE */
    .two-tables-wrapper {
        background: url('https://picsum.photos/id/104/1400/600') center/cover fixed;
        padding: 3rem 2rem;
        position: relative;
       
    }
    .two-tables-wrapper::before {
     
        content: '';
        position: absolute;
        inset: 0;
      
        backdrop-filter: blur(3px);
    }
    .tables-container {
   
        max-width: 650px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;

    }
    /* LEFT TABLE - BOOKING A VISIT */
    .booking-visit-table {
        background: white;
        overflow: hidden;
        box-shadow: 0 25px 40px -12px rgba(0,0,0,0.3);
        
    }
    .table-header-sea {
        background: var(--sea-green);
        padding: 1.5rem 1.8rem;
        text-align: center;
       
    }
    .table-header-sea h2 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: white;
         
    }
    .form-content {
        padding: 1.8rem;
        background: white;
    }
    .form-group {
        margin-bottom: 1.2rem;
    }
    .form-group label {
        display: block;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--gray-light);
        margin-bottom: 0.3rem;
    }
    .form-input, .form-group textarea, .form-group select {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #e0e9ef;
        border-radius: 16px;
        background: white;
        color: #2f4b5c;
        font-size: 0.9rem;
        transition: 0.2s;
    }
    .form-input:focus, .form-group textarea:focus, .form-group select:focus {
        border-color: var(--sea-green);
        outline: none;
        box-shadow: 0 0 0 3px rgba(44,156,140,0.2);
    }
    .btn-sea-green {
        background: var(--sea-green);
        color: white;
        border: none;
        width: 100%;
        padding: 0.9rem;
        border-radius: 40px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.2s;
        margin-top: 0.5rem;
    }
    .btn-sea-green:hover { background: #1f7a6b; transform: translateY(-2px); }
    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 0.8rem;
        border-radius: 40px;
        text-align: center;
        margin-top: 1rem;
        font-size: 0.9rem;
        display: none;
    }

    /* RIGHT TABLE - DEPARTMENTS */
    .departments-table {
        background: white;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 25px 40px -12px rgba(0,0,0,0.3);
    }
    .dept-header-dark {
        background: var(--dark-blue);
        padding: 1.2rem 1.8rem;
        text-align: center;
    }
    .dept-header-dark h2 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
    }
    .dept-sub {
        font-size: 0.9rem;
        color: #bbd4ff;
        margin-top: 0.2rem;
    }
    .dept-list-container {
        padding: 1.5rem;
        background: white;
    }
    .dept-item {
        background: white;
        border-radius: 20px;
        margin-bottom: 1rem;
        border: 1px solid #eef2f5;
        transition: 0.2s;
    }
    .dept-header-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.8rem 1rem;
        cursor: pointer;
    }
    .dept-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .dept-icon {
        width: 44px;
        height: 44px;
        background: #f0f9f7;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: var(--sea-green);
    }
    .dept-name {
        font-weight: 600;
        color: #2a4b60;
        font-size: 1rem;
    }
    .toggle-icon {
        background: #eef2f5;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--sea-green);
        transition: 0.2s;
    }
    .toggle-icon:hover { background: #dce6ec; }
    .dept-description {
        display: none;
        padding: 0.2rem 1rem 1rem 3.8rem;
        font-size: 0.85rem;
        color: #6a7f8e;
        border-top: 1px solid #eef2f5;
        background: #fefefe;
        line-height: 1.5;
    }
    .view-full-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--dark-blue);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 40px;
        font-weight: 600;
        margin-top: 1.2rem;
        cursor: pointer;
        width: fit-content;
        transition: 0.2s;
    }
    .view-full-link:hover {
        background: #093453;
        gap: 14px;
    }

   
   
   
   
   /* endddd */
    .team-slider-section {
        background: #fff;
        font-family: system-ui, -apple-system, 'Segoe UI', sans-serif;
    }
    .slider-controls {
        position: relative;
        z-index: 5;
    }
    .slider-arrow {
        background: #f8f9fc;
        border: 1px solid #dee2e6;
        border-radius: 50%;
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        color: #2c9c8c;
    }
    .slider-arrow:hover {
        background: #2c9c8c;
        color: white;
        border-color: #2c9c8c;
    }
    .slider-container {
        overflow: hidden;
        position: relative;
    }
    .team-cards-wrapper {
        display: flex;
        gap: 1.5rem;
        transition: transform 0.4s ease-in-out;
        will-change: transform;
    }
    .team-card {
        flex: 0 0 calc(25% - 1.125rem); /* 4 cards in desktop */
        background: #ffffff;
        border-radius: 1.5rem;
        padding: 1.5rem 1rem;
        text-align: center;
        border: 1px solid #edf2f7;
        box-shadow: 0 8px 20px rgba(0,0,0,0.02);
        transition: 0.2s;
    }
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        border-color: #d4e2e9;
    }
    .card-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 1rem;
        border: 3px solid white;
        box-shadow: 0 8px 14px rgba(0,0,0,0.1);
    }
    .card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .team-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
        color: #1e3b48;
    }
    .designation {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        color: #2c9c8c;
        margin-bottom: 0.8rem;
    }
    .contact {
        font-size: 0.8rem;
        color: #4f6f7e;
        margin-bottom: 0.2rem;
    }
    .contact a {
        color: #1e6f5c;
        text-decoration: none;
        font-weight: 500;
    }
    .card-arrow {
        display: inline-block;
        margin-top: 1rem;
        font-size: 0.85rem;
        font-weight: 600;
        color: #2c9c8c;
        text-decoration: none;
        border-top: 1px dashed #cde0da;
        padding-top: 0.6rem;
        transition: 0.2s;
    }
    .card-arrow:hover {
        color: #1e6f5c;
        letter-spacing: 0.5px;
    }
    hr {
        max-width: 80px;
        margin: 0 auto;
        border-top: 2px solid #dce5ec;
        opacity: 0.8;
    }
    /* Tablet */
    @media (max-width: 991px) {
        .team-card {
            flex: 0 0 calc(50% - 0.75rem);
        }
    }
    /* Mobile */
    @media (max-width: 576px) {
        .team-card {
            flex: 0 0 calc(100% - 0rem);
        }
        .card-img {
            width: 100px;
            height: 100px;
        }
        .slider-controls {
            justify-content: center;
        }
    }



  


.blog-section {
        background: seashell;
        font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    }

    .blog-card {
        background: #fff;
        border-radius: 1.5rem;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #eef2f6;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.1);
        border-color: #d4e2ea;
    }

    .blog-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-img {
        transform: scale(1.02);
    }

    .blog-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1f3e48;
        margin: 1.2rem 1.2rem 0.6rem 1.2rem;
        line-height: 1.3;
    }

    .blog-description {
        font-size: 0.95rem;
        color: #5a7a88;
        line-height: 1.5;
        margin: 0 1.2rem 1rem 1.2rem;
        flex-grow: 1;
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #2c9c8c;
        text-decoration: none;
        transition: gap 0.2s ease;
        margin: 0 1.2rem 1.5rem 1.2rem;
        border-bottom: 1px dashed #cde0da;
        width: fit-content;
        padding-bottom: 0.25rem;
    }

    .read-more-btn:hover {
        gap: 0.75rem;
        color: #1e6f5c;
        border-bottom-color: #2c9c8c;
    }

    .arrow {
        font-size: 1.1rem;
        transition: transform 0.2s;
    }

    .read-more-btn:hover .arrow {
        transform: translateX(3px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .blog-title {
            font-size: 1.2rem;
            margin: 1rem 1rem 0.5rem 1rem;
        }
        .blog-description {
            margin: 0 1rem 0.8rem 1rem;
        }
        .read-more-btn {
            margin: 0 1rem 1.2rem 1rem;
        }
        .blog-img {
            height: 180px;
        }
    }

    @media (max-width: 576px) {
        .display-5 {
            font-size: 2rem;
        }
        .lead {
            font-size: 0.95rem;
        }
        .blog-title {
            font-size: 1.1rem;
        }
        .blog-img {
            height: 160px;
        }
    }

    
    /* dcyor 2 */
 .testimonial-exact {
         background: linear-gradient(rgba(0, 0, 0, 0.69), rgba(0, 0, 0, 0.69)), url("./images/1.jpg");
        font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        padding: 2rem;
        display: flex;
        justify-content: center;
    }
    .testimonial-inner {
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
        background: transparent;
    }
    .testimonial-heading {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        color: #87c4f9;
        margin-bottom: 2rem;
        letter-spacing: -0.3px;
    }
    .testimonial-card {
        padding: 2rem 2rem 1.5rem;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.03);
        margin-bottom: 2rem;
    }
    .quote-symbol {
        font-size: 3rem;
        color: #ffffff;
        font-family: serif;
        line-height: 1;
        opacity: 0.5;
        margin-bottom: 0.2rem;
    }
    .testimonial-quote {
        font-size: 1.2rem;
        line-height: 1.45;
        color: #ffffff;
        font-weight: 500;
        margin: 0.5rem 0 1rem;
    }
    .patient-name {
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: #ffffff;
        text-transform: uppercase;
        margin-bottom: 0.8rem;
    }
    .rating-stars {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        font-size: 1.2rem;
    }
    .dot {
        color: #d0d8df;
        font-size: 1.5rem;
        font-weight: 400;
    }
    .rating-zero {
        background: #eef6f3;
        padding: 0.1rem 0.75rem;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #2c9c8c;
        margin-left: 0.5rem;
    }
    .brands-row {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    .brand {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        background: #fbfdfe;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        border: 1px solid #eef2f5;
        backdrop-filter: blur(2px);
    }
    .brand-icon svg {
        display: block;
    }
    .brand-info {
        line-height: 1.3;
    }
    .brand-name {
        font-weight: 800;
        font-size: 0.9rem;
        color: #1f3e48;
    }
    .brand-name sup {
        font-size: 0.6rem;
    }
    .brand-desc {
        font-size: 0.65rem;
        color: #6b8d9b;
        font-weight: 500;
    }
    @media (max-width: 500px) {
        .testimonial-heading { font-size: 1.6rem; }
        .testimonial-quote { font-size: 1rem; }
        .brands-row { gap: 1rem; }
        .brand { padding: 0.4rem 1rem; }
    }



 /* Background and General Styling */
/* Footer Gap Fix */
.medical-footer {
    background-color: #5D96C8;
    color: white;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    position: relative;
    width: 100%;
    /* Pehle yahan margin-top auto tha, ise 0 ya specific padding dein */
    margin-top: 0; 
    
    background-repeat: no-repeat;
    background-position: center 30px;
    background-size: 600px;
    
    /* Is line ko delete krdiya hai kyunke ye 50px ka gap bna rhi thi */
    bottom: 0; 
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

   /* footer end */


    /* Responsive adjustments for small screens */
    @media (max-width: 768px) {
        .team-card {
            padding: 1.25rem !important;
        }
        .team-name {
            font-size: 1.1rem;
        }
        .contact-item {
            font-size: 0.85rem;
        }
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
    
    @media (max-width: 576px) {
        .lead {
            font-size: 1rem;
        }
    }

    @media (max-width: 992px) {
        .tables-container { grid-template-columns: 1fr; }
    }
        @media (max-width: 992px) {
            .booking-grid { grid-template-columns: 1fr; }
            .top-select-department { flex-direction: column; align-items: stretch; }
        }
        @media (max-width: 576px) {
            .booking-container { padding: 1.5rem; }
            .dept-description { padding-left: 1.2rem; }
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
<?php if(isset($_SESSION['role']) && $_SESSION['role'] !== 'patient'): ?>
<li class="nav-item"><a class="nav-link" href="doctor_dashboard.php">DOCTOR DASHBOARD</a></li>
<?php endif; ?>
        
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













    <div id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://picsum.photos/id/1015/1920/1080');">
                <div class="hero-content"><h1>EMPOWERING PEOPLE<br>TO IMPROVE THEIR LIVES</h1></div>
            </div>
            <div class="carousel-item" style="background-image: url('https://picsum.photos/id/1016/1920/1080');">
                <div class="hero-content"><h1>TO BETTER HEALTHCARE<br>LEADING THE WAY</h1></div>
            </div>
        </div>
        <div class="carousel-controls">
            <button class="custom-carousel-btn" data-slide="prev"><i class="fas fa-chevron-left"></i></button>
            <button class="custom-carousel-btn" data-slide="next"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="boxes-wrapper">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-md-4"><div class="info-box working-box"><h5><i class="far fa-clock mr-2"></i> Working Hours</h5><div class="box-content"><p class="mb-1">Monday - Friday: 08:00 AM - 07:00 PM</p><p class="mb-1">Saturday: 11:00 AM - 03:00 PM</p><p>Sunday: CLOSED</p></div></div></div>
                    <div class="col-md-4"><div class="info-box contact-box"><h5><i class="fas fa-phone-alt mr-2"></i> Contact Details</h5><div class="box-details box-content"><p>Livingstone, Season Street 45/2<br>Los Angeles, INC - 4502</p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Aptech+Computer+Education+North+Karachi+Center" target="_blank" class="directions-btn">
            <button class="btn-outline">GET DIRECTIONS </button>
        </a>
   
                </div></div></div>
                    <div class="col-md-4"><div class="info-box appoint-box"><h5>Request an Appointment</h5><div class="box-content"><p>Choose the right time and date for you.</p>
                  <li><a class="nav-link" href="appointment.php"><button class="btn btn-sm btn-light mt-2">Make Appointment</button></a> 
                </div></div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="next-section text-center">
        <section class="medical-features-section">
            <div class="feat-wrapper">
                <div class="feat-image-side"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRUijyhSMKlDkBi0zMw0KpsRMa7qbboj50Qms2fHE0as7uYl5D9" alt="Doctor"></div>
                <div class="feat-text-side">
                    <div class="feat-header"><h2>What Makes Us Different</h2><p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled.</p></div>
                    <div class="feat-grid six-box-grid">
                        <div class="feat-item border-bottom"><i class="fa-solid fa-user-plus"></i><h3>FREE CONSULTATION</h3></div>
                        <div class="feat-item border-bottom"><i class="fa-solid fa-credit-card"></i><h3>AFFORDABLE PRICES</h3></div>
                        <div class="feat-item border-bottom"><i class="fa-solid fa-user-doctor"></i><h3>QUALIFIED DOCTORS</h3></div>
                        <div class="feat-item border-bottom"><i class="fa-solid fa-laptop-medical"></i><h3>PROFESSIONAL STAFF</h3></div>
                        <div class="feat-item"><i class="fa-solid fa-clock-rotate-left"></i><h3>24/7 OPENED</h3></div>
                        <div class="feat-item"><i class="fa-solid fa-thumbs-up"></i><h3>~50000 HAPPY CLIENTS</h3></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="medical-services-dark">
        <div class="msd-title-block"><h2 class="msd-main-title">Our Medical Services</h2><p class="msd-sub-line">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p><p class="msd-italic-line">eveniet ut et voluptates repudiandae sint et molestiae non recusandae</p></div>
        <div class="msd-grid">
            <div class="msd-card"><div class="msd-icon"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2d9cdb" stroke-width="1.5"><path d="M3 12H5L7 8L9 16L11 10L13 14L15 6L17 12H21"/><circle cx="12" cy="12" r="9"/></svg></div><h3 class="msd-card-title">Cardio Monitoring</h3><p class="msd-card-line1">These cases are perfectly simple and easy to</p><p class="msd-card-line2">distinguish a free hour when our power</p></div>
            <div class="msd-card"><div class="msd-icon"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2d9cdb"><path d="M12 8V12M12 16H12.01"/><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"/><path d="M15 9L9 15"/></svg></div><h3 class="msd-card-title">Medical Treatment</h3><p class="msd-card-line1">These cases are perfectly simple and easy to</p><p class="msd-card-line2">distinguish a free hour when our power</p></div>
            <div class="msd-card"><div class="msd-icon"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2d9cdb"><path d="M12 8V12M12 16H12.01"/><path d="M9 2L9 5M15 2L15 5"/><path d="M4 9H20M5 5H19C19.5523 5 20 5.44772 20 6V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V6C4 5.44772 4.44772 5 5 5Z"/></svg></div><h3 class="msd-card-title">Emergency Help</h3><p class="msd-card-line1">These cases are perfectly simple and easy to</p><p class="msd-card-line2">distinguish a free hour when our power</p></div>
            <div class="msd-card"><div class="msd-icon"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2d9cdb"><path d="M9 12H15M12 9V15"/><circle cx="12" cy="12" r="9"/></svg></div><h3 class="msd-card-title">Symptom Check</h3><p class="msd-card-line1">These cases are perfectly simple and easy to</p><p class="msd-card-line2">distinguish a free hour when our power</p></div>
            <div class="msd-card"><div class="msd-icon"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2d9cdb"><path d="M20 12V8H4V12M20 12L18 20H6L4 12M20 12H18M4 12H6"/><path d="M12 4V8M12 8L14 10M12 8L10 10"/><path d="M8 3H16"/></svg></div><h3 class="msd-card-title">Laboratory Test</h3><p class="msd-card-line1">These cases are perfectly simple and easy to</p><p class="msd-card-line2">distinguish a free hour when our power</p></div>
            <div class="msd-card"><div class="msd-icon"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2d9cdb"><path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3"/><path d="M12 7V12L15 15"/><circle cx="12" cy="12" r="9"/></svg></div><h3 class="msd-card-title">General Analysis</h3><p class="msd-card-line1">These cases are perfectly simple and easy to</p><p class="msd-card-line2">distinguish a free hour when our power</p></div>
        </div>
    </div>

    <!-- BOOKING A VISIT - REVISED LAYOUT: FORM LEFT, DEPARTMENTS RIGHT, PLUS/MINUS TOGGLE, TOP DROPDOWN -->

<!-- CORRECTED TWO TABLES SECTION: Dropdown INSIDE left table, Rehabilitation Studio added, validation + success message -->
<div class="two-tables-wrapper">
    <div class="tables-container">
        <!-- LEFT TABLE: BOOKING A VISIT (includes SELECT DEPARTMENT dropdown) -->
        <div class="booking-visit-table" >
            <div class="table-header-sea">
                <h2>BOOKING A VISIT</h2>
            </div>
            <div class="form-content" >
                <!-- SELECT DEPARTMENT dropdown inserted here inside the form -->
                <div class="form-group" >
                    <label><i class="fas fa-building"></i> SELECT DEPARTMENT</label>
                    <select id="bookingDepartmentSelect" class="form-input">
                        <option value="Primary Health Care">Primary Health Care</option>
                        <option value="Cardiac Clinic">Cardiac Clinic</option>
                        <option value="General Surgery">General Surgery</option>
                        <option value="Rehabilitation Studio">Rehabilitation Studio</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>FULL NAME</label>
                    <input type="text" id="fullName" placeholder="Enter your full name" class="form-input">
                </div>
                <div class="form-group">
                    <label>YOUR PHONE NUMBER</label>
                    <input type="tel" id="phoneNumber" placeholder="+1 234 567 8900" class="form-input">
                </div>
                <div class="form-group">
                    <label>YOUR EMAIL ADDRESS</label>
                    <input type="email" id="emailAddress" placeholder="hello@example.com" class="form-input">
                </div>
                <div class="form-group">
                    <label>YOUR MESSAGE</label>
                    <textarea id="message" rows="3" placeholder="How can we help you?"></textarea>
                </div>
                <button class="btn-sea-green" id="appointmentBtn">MAKE AN APPOINTMENT</button>
                <div id="successMessage" class="success-message">✅ Appointment successfully booked! Thank you.</div>
            </div>
        </div>

        <!-- RIGHT TABLE: DEPARTMENTS (with Rehabilitation Studio and plus/minus toggles) -->
        <div class="departments-table">
            <div class="dept-header-dark">
                <h2>DEPARTMENTS</h2>
                <div class="dept-sub">SELECT DEPARTMENT</div>
            </div>
            <div class="dept-list-container">
                <div class="dept-list">
                    <!-- Primary Health Care -->
                    <div class="dept-item">
                        <div class="dept-header-flex">
                            <div class="dept-info"><div class="dept-icon"><i class="fas fa-hospital-user"></i></div><span class="dept-name">Primary Health Care</span></div>
                            <div class="toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="dept-description">✔ Comprehensive family medicine, preventive checkups, vaccines, and wellness programs. Expert primary care for all ages.</div>
                    </div>
                    <!-- Cardiac Clinic -->
                    <div class="dept-item">
                        <div class="dept-header-flex">
                            <div class="dept-info"><div class="dept-icon"><i class="fas fa-heartbeat"></i></div><span class="dept-name">Cardiac Clinic</span></div>
                            <div class="toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="dept-description">❤️ Advanced cardiac diagnostics, ECG, stress tests, and cardiology consultations. World-class heart care and rehabilitation.</div>
                    </div>
                    <!-- General Surgery -->
                    <div class="dept-item">
                        <div class="dept-header-flex">
                            <div class="dept-info"><div class="dept-icon"><i class="fas fa-scalpel"></i></div><span class="dept-name">General Surgery</span></div>
                            <div class="toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="dept-description">🔪 Minimally invasive procedures, laparoscopic surgeries, expert pre/post-operative care. High success rates.</div>
                    </div>
                    <!-- Rehabilitation Studio (added) -->
                    <div class="dept-item">
                        <div class="dept-header-flex">
                            <div class="dept-info"><div class="dept-icon"><i class="fas fa-person-walking"></i></div><span class="dept-name">Rehabilitation Studio</span></div>
                            <div class="toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="dept-description">🏋️‍♂️ Physical therapy, post-injury recovery, sports rehab, and customized exercise plans to restore mobility and strength.</div>
                    </div>
                </div>
                <div class="view-full-link"><span>VIEW FULL LIST</span> <i class="fas fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</div>




<!-- Our Team Section - Slider with Arrows (showing 4 then hidden 2) -->
<div class="team-slider-section">
    <div class="container py-5">
        <!-- Heading -->
        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold">Our Team</h1>
        </div>
        
        <!-- Description -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <p class="lead text-muted text-center">
                    The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
                </p>
            </div>
        </div>
        
        <hr class="my-5">

        <!-- Arrows (Top) - Left and Right -->
        <div class="slider-controls d-flex justify-content-end mb-3 gap-2">
            <button class="slider-arrow prev-arrow" id="prevTeamBtn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="slider-arrow next-arrow" id="nextTeamBtn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>

        <!-- Team Cards Slider Container -->
        <div class="slider-container">
            <div class="team-cards-wrapper" id="teamCardsWrapper">
                <!-- Total 6 Doctors -->
                <!-- Card 1 -->
                <div class="team-card">
                    <div class="card-img">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Vickie Bryant">
                    </div>
                    <h3>VICKIE BRYANT</h3>
                    <p class="designation">GENERAL DOCTOR</p>
                    <div class="contact"><span>📞</span> 1 (800) 254 4512</div>
                    <div class="contact"><span>✉️</span> <a href="#">in X</a></div>
                    <a href="#" class="card-arrow">View Profile →</a>
                </div>
                <!-- Card 2 -->
                <div class="team-card">
                    <div class="card-img">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Geraldine Graham">
                    </div>
                    <h3>GERALDINE GRAHAM</h3>
                    <p class="designation">DENTAL SURGEON</p>
                    <div class="contact"><span>📞</span> 1 (800) 800 7000</div>
                    <div class="contact"><span>✉️</span> <a href="#">in X</a></div>
                    <a href="#" class="card-arrow">View Profile →</a>
                </div>
                <!-- Card 3 -->
                <div class="team-card">
                    <div class="card-img">
                        <img src="https://randomuser.me/api/portraits/women/72.jpg" alt="Valerie Farmer">
                    </div>
                    <h3>VALERIE FARMER</h3>
                    <p class="designation">COSMETIC SURGEON</p>
                    <div class="contact"><span>📞</span> 1 (800) 456 5484</div>
                    <div class="contact"><span>✉️</span> <a href="#">in X</a></div>
                    <a href="#" class="card-arrow">View Profile →</a>
                </div>
                <!-- Card 4 -->
                <div class="team-card">
                    <div class="card-img">
                        <img src="https://randomuser.me/api/portraits/women/90.jpg" alt="Eloise Stephens">
                    </div>
                    <h3>ELOISE STEPHENS</h3>
                    <p class="designation">THERAPY</p>
                    <div class="contact"><span>📞</span> 1 (800) 800 7000</div>
                    <div class="contact"><span>✉️</span> <a href="#">in X</a></div>
                    <a href="#" class="card-arrow">View Profile →</a>
                </div>
                <!-- Card 5 (Hidden initially) -->
                <div class="team-card">
                    <div class="card-img">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
                    </div>
                    <h3>JOHN SMITH</h3>
                    <p class="designation">CARDIOLOGIST</p>
                    <div class="contact"><span>📞</span> 1 (800) 987 6543</div>
                    <div class="contact"><span>✉️</span> <a href="#">in X</a></div>
                    <a href="#" class="card-arrow">View Profile →</a>
                </div>
                <!-- Card 6 (Hidden initially) -->
                <div class="team-card">
                    <div class="card-img">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Emily Clark">
                    </div>
                    <h3>EMILY CLARK</h3>
                    <p class="designation">PEDIATRICIAN</p>
                    <div class="contact"><span>📞</span> 1 (800) 321 7654</div>
                    <div class="contact"><span>✉️</span> <a href="#">in X</a></div>
                    <a href="#" class="card-arrow">View Profile →</a>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- ========================
     LATEST NEWS & BLOG SECTION
     with Images | Bootstrap 5 | Responsive
     ======================== -->

<div class="blog-section">
    <div class="container py-5">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Latest News & Our Blog</h2>
            <p class="lead text-muted mt-3 mx-auto" style="max-width: 700px;">
                Sed doming virtute honestatis at, graece tamquam docendi eum an, alterum reformidans est ei nec aliquando voluptatum an, eu quidam civibus qui.
            </p>
        </div>

        <!-- Blog Cards Grid (3 columns) -->
        <div class="row g-4">
            <!-- Blog Post 1 - The Earlier You Start, the Better -->
            <div class="col-md-6 col-lg-4">
                <div class="blog-card h-100">
                    <img src="https://picsum.photos/id/20/400/250" alt="Child healthy lifestyle" class="blog-img">
                    <h3 class="blog-title">The Earlier You Start, the Better</h3>
                    <p class="blog-description">
                        It’s not uncommon for children who have obesity to become overweight adults. Teaching children healthy ...
                    </p>
                    <a href="#" class="read-more-btn">READ MORE <span class="arrow">→</span></a>
                </div>
            </div>

            <!-- Blog Post 2 - Greatly Improves Flexibility -->
            <div class="col-md-6 col-lg-4">
                <div class="blog-card h-100">
                    <img src="https://picsum.photos/id/81/400/250" alt="Flexibility stretching" class="blog-img">
                    <h3 class="blog-title">Greatly Improves Flexibility</h3>
                    <p class="blog-description">
                        With summer in full swing, everyone is out exploring, adventuring, and being active in their ...
                    </p>
                    <a href="#" class="read-more-btn">READ MORE <span class="arrow">→</span></a>
                </div>
            </div>

            <!-- Blog Post 3 - Reduces the Risk of Injury -->
            <div class="col-md-6 col-lg-4">
                <div class="blog-card h-100">
                    <img src="https://picsum.photos/id/157/400/250" alt="Injury prevention" class="blog-img">
                    <h3 class="blog-title">Reduces the Risk of Injury</h3>
                    <p class="blog-description">
                        Stretching safely exposes your body to the strenuous limits that your sport or activity may ...
                    </p>
                    <a href="#" class="read-more-btn">READ MORE <span class="arrow">→</span></a>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- ========================
     TESTIMONIAL SECTION - EXACT MATCH TO IMAGE
     What patients say About Valeo
     ======================== -->

<div class="testimonial-exact">
    
    <div class="testimonial-inner">
        
        <!-- Heading -->
        <h2 class="testimonial-heading">What patients say About Valeo</h2>
        
        <!-- Quote Card -->
        <div class="testimonial-card">
           
            <p class="testimonial-quote">
                The Cancer team at Valeo are nothing short of miracle workers - they were able to help me overcome my Leukemia in just 6 months
            </p>
            <div class="patient-name">CHRISTINE BLANIE, BLOOD PATIENT</div>
            <div class="rating-stars">
                <span class="dot">●</span><span class="dot">●</span><span class="dot">●</span>
                
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
    <script>
        $(document).ready(function(){
            // custom carousel controls
            $('.custom-carousel-btn').on('click', function(){
                let dir = $(this).data('slide');
                $('#heroCarousel').carousel(dir);
            });

            // PLUS / MINUS TOGGLE FUNCTIONALITY: show/hide description and switch icon
           // Plus/Minus toggle for departments (works for all items including Rehabilitation Studio)
        $('.dept-item').each(function(){
            const $desc = $(this).find('.dept-description');
            const $icon = $(this).find('.toggle-icon i');
            const $toggleBtn = $(this).find('.toggle-icon');
            
            function toggleDesc(e) {
                if(e) e.stopPropagation();
                if($desc.is(':visible')) {
                    $desc.slideUp(200);
                    $icon.removeClass('fa-minus').addClass('fa-plus');
                } else {
                    $desc.slideDown(200);
                    $icon.removeClass('fa-plus').addClass('fa-minus');
                }
            }
            $toggleBtn.on('click', toggleDesc);
            $(this).find('.dept-header-flex').on('click', function(e){
                if($(e.target).closest('.toggle-icon').length) return;
                toggleDesc();
            });
        });

        // Form validation and success message
        $('#appointmentBtn').on('click', function(e){
            e.preventDefault();
            let fullName = $('#fullName').val().trim();
            let phone = $('#phoneNumber').val().trim();
            let email = $('#emailAddress').val().trim();
            let message = $('#message').val().trim();
            let department = $('#bookingDepartmentSelect').val();

            if(fullName === ""){
                alert("Please enter your full name.");
                $('#fullName').focus();
                return;
            }
            if(phone === ""){
                alert("Please enter your phone number.");
                $('#phoneNumber').focus();
                return;
            }
            if(email === ""){
                alert("Please enter your email address.");
                $('#emailAddress').focus();
                return;
            }
            if(message === ""){
                alert("Please enter your message.");
                $('#message').focus();
                return;
            }
            // Simple email validation
            let emailPattern = /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/;
            if(!emailPattern.test(email)){
                alert("Please enter a valid email address.");
                $('#emailAddress').focus();
                return;
            }

            // Show success message and reset form (optional)
            $('#successMessage').fadeIn(300);
            // Clear form fields
            $('#fullName').val('');
            $('#phoneNumber').val('');
            $('#emailAddress').val('');
            $('#message').val('');
            $('#bookingDepartmentSelect').val('Primary Health Care');
            
            // Hide success message after 4 seconds
            setTimeout(function(){
                $('#successMessage').fadeOut(500);
            }, 4000);
        });
    });



////// slider  doctor /////
   (function() {
        const wrapper = document.getElementById('teamCardsWrapper');
        const prevBtn = document.getElementById('prevTeamBtn');
        const nextBtn = document.getElementById('nextTeamBtn');
        
        if (!wrapper || !prevBtn || !nextBtn) return;
        
        const cards = Array.from(wrapper.children);
        const totalCards = cards.length;  // 6
        let currentIndex = 0;
        let visibleCards = 4;  // default for desktop
        
        function getVisibleCount() {
            if (window.innerWidth <= 576) return 1;
            if (window.innerWidth <= 991) return 2;
            return 4;
        }
        
        function updateSlider() {
            const visible = getVisibleCount();
            visibleCards = visible;
            const maxIndex = Math.max(0, totalCards - visibleCards);
            if (currentIndex > maxIndex) currentIndex = maxIndex;
            const percent = (currentIndex / Math.max(1, maxIndex)) * 100;
            const movePercent = (currentIndex * 100) / (totalCards - visible);
            // safer: translateX based on card width + gap
            const cardWidth = wrapper.firstElementChild?.offsetWidth || 0;
            const gap = 24; // 1.5rem = 24px
            const translateValue = currentIndex * (cardWidth + gap);
            wrapper.style.transform = `translateX(-${translateValue}px)`;
        }
        
        function nextSlide() {
            const visible = getVisibleCount();
            const maxIndex = totalCards - visible;
            if (currentIndex < maxIndex) {
                currentIndex++;
            } else {
                // optional: loop to start? but better stay at end
                if (currentIndex === maxIndex && maxIndex > 0) return;
                currentIndex = maxIndex;
            }
            updateSlider();
        }
        
        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
            }
            updateSlider();
        }
        
        // Recalculate on resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                updateSlider();
            }, 150);
        });
        
        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);
        
        // initial update
        setTimeout(() => {
            updateSlider();
        }, 100);
        // also observe images load
        window.addEventListener('load', updateSlider);
    })();

    </script>
</body>
</html>