<?php
include 'includes/header.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        header("Location: index.php");
    } else {
        $error = "Invalid Email or Password";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="glass-card p-5 mt-5">
                <h2 class="fw-bold text-center mb-4">Welcome Back</h2>
                <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">EMAIL ADDRESS</label>
                        <input type="email" name="email" class="form-control py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted small fw-bold">PASSWORD</label>
                        <input type="password" name="password" class="form-control py-2" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100 py-2 fw-bold">Sign In</button>
                </form>
                <p class="text-center mt-4 text-muted small">New here? <a href="register.php" class="text-primary fw-bold">Create Account</a></p>
            </div>
        </div>
    </div>
</div>