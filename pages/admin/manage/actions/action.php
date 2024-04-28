<?php

try {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
} catch (Exception $e) {

    echo 'Error starting session: ' . $e->getMessage();
}

include $_SERVER['DOCUMENT_ROOT'] . '/ugs/config.php';

require_once ROOT_PATH . '/ugs/Database.php';
include 'Query.php';

$user = new Query($conn);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    departmentActions($user);
    courseActions($user);
}

function departmentActions($user)
{
    $location =  header("Location:../department.php");
    if (isset($_POST['departmentName']) && isset($_POST['departmentAbbr'])) {
        $result = $user->createDepartment($_POST['departmentName'], $_POST['departmentAbbr']);
        handleResult($result, "Successfully created", "There was an error creating! Please double check your inputs.", $location);
    }

    if (isset($_POST['editId']) && isset($_POST['editDepartmentName']) && isset($_POST['editDepartmentAbbr'])) {
        $result = $user->updateDepartment($_POST['editId'], $_POST['editDepartmentName'], $_POST['editDepartmentAbbr']);
        handleResult($result, "Successfully updated", "There was an error updating! Please double check your inputs.", $location);
    }
}


function courseActions($user)
{
    $location =  header("Location:../courses.php");
    if (isset($_POST['courseName']) && isset($_POST['courseAbbr']) && isset($_POST['departmentID'])) {
        $result = $user->createCourse($_POST['courseName'], $_POST['courseAbbr'], $_POST['departmentID']);
        handleResult($result, "Successfully created", "There was an error creating! Please double check your inputs.", $location);
    }

    if (isset($_POST['editcourseID']) && isset($_POST['editcourseName']) && isset($_POST['editcourseAbbr']) && isset($_POST['editdepartmentID'])) {
        $result = $user->updateCourse($_POST['editcourseID'],$_POST['editcourseName'], $_POST['editcourseAbbr'], $_POST['editdepartmentID']);
        handleResult($result, "Successfully updated", "There was an error updating! Please double check your inputs.", $location);
    }
}
function handleResult($result, $successMessage, $errorMessage, $location)
{
    switch ($result) {
        case true:
            $_SESSION['message'] = $successMessage;
            $_SESSION['status'] = 'success';
            break;
        case false:
            $_SESSION['message'] = $errorMessage;
            $_SESSION['status'] = 'danger';
            break;
        default:
            $_SESSION['message'] = "Contact the administrator! Something went wrong to the codebase.";
            $_SESSION['status'] = 'danger';
            break;
    }
    $location;
    exit();
}
// Delete

if (isset($_GET['id']) && isset($_GET['type'])) {
    if ($_GET['type'] == 'department') {
        $result = $user->deleteDepartment($_GET['id']);
        if ($result) {
            $_SESSION["message"] = "Successfully deleted the department";
            $_SESSION['status'] = 'warning';
            echo $_SESSION['message'];
        } else {
            $_SESSION['message'] = "Error deleting the department";
            $_SESSION['status'] = 'danger';
        }
        header("location:../department.php");
        exit();
    } elseif ($_GET['type'] === 'course') {
        $result = $user->deleteCourse($_GET['id']);
        if ($result) {
            $_SESSION["message"] = "Successfully deleted the course";
            $_SESSION['status'] = 'warning';
        } else {
            $_SESSION['message'] = "Error deleting the course";
            $_SESSION['status'] = 'danger';
        }
        header("location:../courses.php");
        exit();
    }
}
// Read ID
if (isset($_GET['editId']) && isset($_GET['type'])) {
    if ($_GET['type'] === 'department') {
        $departmentId = $user->getDepartmentById($_GET['editId']);
        echo json_encode($departmentId);
    }
    if ($_GET['type'] === 'course') {
        $courseId = $user->getCourseById($_GET['editId']);
        echo json_encode($courseId);
    }
}
// Read
$departments = $user->getDepartment();
$courses = $user->getCourse();
