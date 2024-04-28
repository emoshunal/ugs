<?php
    session_start();
    require_once 'Database.php';

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $row['Username'];
            $_SESSION['id'] = $row['UserID'];
            $_SESSION['message'] = "Login successful. Welcome, $username!";
            $_SESSION['role'] = $row['UserType'];
            $_SESSION["loggedin"] = true;

            require_once 'pages/session/session_direct_page.php';
           // header('location: pages/admin/home.php');
        }else{
            $_SESSION['message'] = "Invalid username or password";
            $_SESSION["loggedin"] = false;
            header('location: index.php');
        }
    }



?>