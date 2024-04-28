<?php
session_start();
require_once '../session/session_restriction.php';
require_once '../session/session_admin.php';
include '../../path.php';
$path = "../../";
$filePath = "manage/";
$logoPath = "../../";
$profilePath = "../../";
$logout = "";
include $layoutPath . 'layout/header.php';
?>

<body>
   <?php include $layoutPath . 'layout/navbar.php'; ?>

   <div class="container">
      <?php if (isset($_SESSION["message"])) : ?>
         <div class="m-3 alert alert-success" role="alert">
            <?php echo $_SESSION["message"]; ?>
         </div>
         <?php unset($_SESSION["message"]); ?>
      <?php endif; ?>
   </div>
</body>

<?php include $layoutPath . 'layout/script.php'; ?>

</html>