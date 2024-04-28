<?php

$serverPath = $_SERVER['DOCUMENT_ROOT'] . '/ugs/index.php';
if (!isset($_SESSION['id'])) {
    echo '<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">404 Not Found</h5>
                <h6 class="card-subtitle mb-2 text-muted">Oops! The page you are looking for does not exist.</h6>
                <p class="card-text">The page you are trying to reach may have been removed, renamed, or is temporarily unavailable.</p>
                <a href="'.$serverPath.'" class="btn btn-primary">Go Back to Home</a>
            </div>
        </div>
    </div>
   ';
    exit();
}
