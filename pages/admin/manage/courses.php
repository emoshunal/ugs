<?php
session_start();
require_once '../../session/session_restriction.php';
require_once '../../session/session_admin.php';
require_once 'actions/action.php';
include '../../../path.php';
$path = "../../../";
$filePath = "";
$logoPath = "../../../";
$profilePath = "../../../";
$logout = "../../../";
include $layoutPath . 'layout/header.php';

?>

<body>
    <?php include $layoutPath . 'layout/navbar.php'; ?>
    <div class="container">
        <div class="my-4 m-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Courses</li>
                </ol>
            </nav>
        </div>

        <div class="table-responsive m-2">
            <?php if (isset($_SESSION["message"])) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["message"]; ?>
                </div>
                <?php unset($_SESSION["message"]); ?>
            <?php endif; ?>
            <button class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#coursesAddModal">New</button>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">Abbreviation</th>
                        <th scope="col">Courses</th>
                        <th scope="col">Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course) : ?>
                        <tr>
                            <td><?php echo $course['CourseAbbr']; ?></td>
                            <td><?php echo $course['CourseName']; ?></td>
                            <td><?= $course['abbr']; ?></td>
                            <td><a href="#" onclick="editId(<?= $course['CourseID'] ?>)" class="btn btn-warning edit  me-2">Edit</a>
                                <a href="actions/action.php?id=<?= $course['CourseID'] ?>&type=course" class="btn btn-danger delete me-2" data-id="<?= $department['DepartmentID'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
        <h1 id="display">Display Here</h1>
    </div>
    <?php include_once 'modals/modals.php' ?>
</body>

<?php include $layoutPath . 'layout/script.php'; ?>
<script>
        function editId(id) {
        const xhttp = new XMLHttpRequest();
        var x = document.getElementById("coursesEditModal");
        xhttp.onload = function() {
            document.getElementById("display").innerHTML = this.responseText;
            const raw = this.responseText;
            const data = JSON.parse(raw);
            document.getElementById("editcourseName").value = data.CourseName
            document.getElementById("editcourseAbbr").value = data.CourseAbbr
            document.getElementById("editcourseID").value = data.CourseID
             document.getElementById("editdepartmentID").value = data.DepartmentID
            $(x).modal('show');
        }
        xhttp.open("GET", "actions/action.php?editId=" + id + "&type=course", true);
        xhttp.send();
    }
</script>

</html>