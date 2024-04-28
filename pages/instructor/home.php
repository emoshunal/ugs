<?php
session_start();
require_once '../session/session_restriction.php';
require_once '../session/session_instructor.php';
include '../../path.php';
$path = "../../";
$filePath = "manage/";
$logoPath="../../";
$profilePath="../../";
$logoutPath="../../";
include $layoutPath . 'layout/header.php';
?>

<body>
   
<?php include $layoutPath . 'layout/navbar.php'; ?>
   <h1>This is instructors page</h1>    
</body>

<?php include $layoutPath . 'layout/script.php'; ?>

</html>