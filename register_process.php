<?php
session_start();
include 'db.php';

if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $role = $_POST['role'];
    $sql = ""; // Initialize empty query

    if($role == 'patient'){
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $city = mysqli_real_escape_string($conn, $_POST['city_p']);
        
        $sql = "INSERT INTO patients (name, email, password, address, city, role) 
                VALUES ('$name', '$email', '$password', '$address', '$city', 'patient')";
    } 
    else if($role == 'doctor'){
        $spec = mysqli_real_escape_string($conn, $_POST['specialty']);
        $exp = (int)$_POST['experience'];
        $fees = (int)$_POST['fees'];
        $city = mysqli_real_escape_string($conn, $_POST['city_d']);
        
        $sql = "INSERT INTO doctors (name, email, password, specialty, experience, fees, city, role) 
                VALUES ('$name', '$email', '$password', '$spec', $exp, $fees, '$city', 'doctor')";
    }

    // Sirf tab chalega jab $sql khali na ho
    if(!empty($sql) && mysqli_query($conn, $sql)){
        echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>