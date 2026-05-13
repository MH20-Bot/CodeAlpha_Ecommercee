<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeAlpha | Premium Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --main-dark: #121212; --accent: #2563eb; }
        body { background-color: #f3f4f6; font-family: 'Inter', sans-serif; }
        .navbar { background: rgba(18, 18, 18, 0.95) !important; backdrop-filter: blur(10px); }
        .nav-link { font-weight: 500; transition: color 0.3s; }
        .btn-auth { border-radius: 50px; padding: 8px 25px; font-weight: 600; }
        .glass-card { background: white; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="index.php">
            <i class="fas fa-bolt text-warning me-2"></i>CODEALPHA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link px-3" href="index.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="about.php">About Us</a></li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <a href="cart.php" class="text-white text-decoration-none position-relative me-2">
                    <i class="fas fa-shopping-bag fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="font-size: 0.6rem;">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span>
                </a>
                <?php if(isset($_SESSION['user_name'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-auth dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> <?php echo $_SESSION['user_name']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-light btn-auth">Login</a>
                    <a href="register.php" class="btn btn-primary btn-auth shadow-sm">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>