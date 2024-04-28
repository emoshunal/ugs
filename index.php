<?php
session_start();
include 'path.php';

$path = "";
include $layoutPath . 'layout/header.php';

?>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="assets/img/login.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="card-body">
                        <div class="lh-1  m-3 pb-2">
                 
                            <h2 class="card-title">Welcome Back</h2>
                            <p class="fw-light">Please provide your credentials</p>
                        </div>
                        <?php if (isset($_SESSION["message"])) : ?>
                            <div class="m-3 alert alert-<?php echo isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] ? "success" : "danger"; ?>" role="alert">
                                <?php echo $_SESSION["message"]; ?>
                            </div>
                                <?php unset($_SESSION["message"]); ?>
                        <?php endif; ?>
                        <form action="loginAction.php" method="POST">
                            <div class="form-floating m-3">
                                <input type="username" name="username" class="form-control" id="floatingInput" placeholder="juande013">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating m-3 ">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex m-3 flex-row justify-content-between">
                                <a href="#">Forgot Password</a>
                                <button type="submit" name="login" class="btn btn-secondary btn-lg">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

<?php include $layoutPath . 'layout/script.php'; ?>

</html>