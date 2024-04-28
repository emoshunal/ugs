<?php

    switch($_SESSION['role']){
        case 'Admin':
            header('Location: pages/admin/home.php');
            break;
        case 'Instructor';
            echo 'Instructor';
            header('Location: pages/instructor/home.php');
            break;
        case 'Student';
            echo 'Student';
            break;
        default:
            echo 'Unknown';
            break;
    }

?>