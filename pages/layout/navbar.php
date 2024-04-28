<!-- Mobile Offcanvas Navbar -->

<nav class="navbar bg-body-tertiary d-md-none fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="../../assets/img/logo.png" class="rounded-circle" alt="..." style="height: 40px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<?php if ($_SESSION['role'] == 'Admin') : ?>

    <!-- Desktop Navbar -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="<?= $logoPath ?>assets/img/logo.png" class="rounded-circle" alt="..." style="height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Grade</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Students</a></li>
                            <li><a class="dropdown-item" href="#">Instructors</a></li>
                            <li><a class="dropdown-item" href="<?= $filePath ?>department.php">Department</a></li>
                            <li><a class="dropdown-item" href="<?= $filePath ?>courses.php">Courses</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Users</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <span class="navbar-text m-2">
                        Administrator
                    </span>
                    <div class="dropdown">
                        <a href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $profilePath ?>assets/img/profileUser.jpg" class="rounded-circle border border-info border-3" alt="..." style="height: 50px;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="<?= $logout ?>logout.php" class="dropdown-item" method="post">
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Sidebar for Mobile -->
    <div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <a href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../assets/img/profileUser.jpg" class="rounded-circle border border-info border-3" alt="..." style="height: 50px;">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex mt-3" role="search">

            </form>
        </div>
    </div>

<?php elseif ($_SESSION['role'] == 'Instructor') : ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="<?= $logoPath ?>assets/img/logo.png" class="rounded-circle" alt="..." style="height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Grade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Faculty Loads</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <span class="navbar-text m-2">
                        Instructor
                    </span>
                    <div class="dropdown">
                        <a href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $profilePath ?>assets/img/profileUser.jpg" class="rounded-circle border border-info border-3" alt="..." style="height: 50px;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="<?= $logoutPath ?>logout.php" class="dropdown-item" method="post">
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<?php endif; ?>