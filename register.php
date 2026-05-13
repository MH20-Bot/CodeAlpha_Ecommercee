<?php 
include 'includes/header.php'; 

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Expert security

    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Account created! Please login.'); window.location='login.php';</script>";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-center mb-4">Join Us</h3>
                    <form method="POST">
                        <input type="text" name="name" class="form-control mb-3 py-2" placeholder="Full Name" required>
                        <input type="email" name="email" class="form-control mb-3 py-2" placeholder="Email Address" required>
                        <input type="password" name="password" class="form-control mb-4 py-2" placeholder="Password" required>
                        <button type="submit" name="register" class="btn btn-primary w-100 rounded-pill py-2">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>