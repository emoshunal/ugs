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
                    <li class="breadcrumb-item active" aria-current="page">Department</li>
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
            <button class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#departmentAddModal">New</button>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">Abbreviation</th>
                        <th scope="col">Department Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($departments as $department) : ?>
                        <tr>
                            <td><?php echo $department['abbr']; ?></td>
                            <td><?php echo $department['DepartmentName']; ?></td>
                            <td><a href="#" onclick="editId(<?= $department['DepartmentID'] ?>)" class="btn btn-warning edit  me-2" data-id="<?= $department['DepartmentID'] ?>">Edit</a>
                                <a href="actions/action.php?id=<?= $department['DepartmentID'] ?>&type=department" class="btn btn-danger delete me-2" data-id="<?= $department['DepartmentID'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <h1 id="display">Display Here</h1>
        </div>
    </div>
    <?php include_once 'modals/modals.php' ?>
</body>

<?php include $layoutPath . 'layout/script.php'; ?>
<script>
    function editId(id) {
        const xhttp = new XMLHttpRequest();
        var x = document.getElementById("departmentEditModal");
        xhttp.onload = function() {
            document.getElementById("display").innerHTML = this.responseText;
            const raw = this.responseText;
            const data = JSON.parse(raw);
            document.getElementById("editDepartmentName").value = data.DepartmentName
            document.getElementById("editDepartmentAbbr").value = data.abbr
            document.getElementById("editId").value = data.DepartmentID
            $(x).modal('show');
        }
        xhttp.open("GET", "actions/action.php?editId=" + id + "&type=department", true);
        xhttp.send();
    }


</script>
   
</html>