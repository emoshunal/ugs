<!-- Department -->
<!-- Add -->
<div class="modal fade" id="departmentAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Department</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/action.php" method="POST">
                    <div class="form-floating m-3">
                        <input required type="text" name="departmentName" class="form-control" id="floatingInput" placeholder="College of Computer Science">
                        <label for="floatingInput">Department*</label>
                    </div>
                    <div class="form-floating m-3 ">
                        <input required type="text" name="departmentAbbr" class="form-control" id="floatingPassword" placeholder="CCS">
                        <label for="floatingPassword">Abbreviation*</label>
                    </div>
                    <div class="d-flex m-3 flex-row justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="departmentSave" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="fw-2 m-auto">All fields are required</p>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="departmentEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Department</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/action.php" method="POST">
                    <input type="hidden" name="editId" id="editId">
                    <div class="form-floating m-3">
                        <input required type="text" name="editDepartmentName" class="form-control" id="editDepartmentName" placeholder="College of Computer Science">
                        <label for="floatingInput">Department*</label>
                    </div>
                    <div class="form-floating m-3 ">
                        <input required type="text" name="editDepartmentAbbr" class="form-control" id="editDepartmentAbbr" placeholder="CCS">
                        <label for="floatingPassword">Abbreviation*</label>
                    </div>
                    <div class="d-flex m-3 flex-row justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="departmentUpdate" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="fw-2 m-auto">All fields are required</p>
            </div>
        </div>
    </div>
</div>


<!-- Courses -->
<div class="modal fade" id="coursesAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/action.php" method="POST">
                    <div class="form-floating m-3">
                        <input required type="text" name="courseName" class="form-control" id="floatingInput" placeholder="College of Computer Science">
                        <label for="floatingInput">Course*</label>
                    </div>
                    <div class="form-floating m-3 ">
                        <input required type="text" name="courseAbbr" class="form-control" id="floatingPassword" placeholder="CCS">
                        <label for="floatingPassword">Abbreviation*</label>
                    </div>
                    <div class="m-3">
                        <select class="form-select form-select-lg" aria-label="Large select example" name="departmentID">
                            <?php require_once 'select.php';  ?>
                            <?php $dept = new selectDepartment($conn);  ?>
                            <?php $departments = $dept->getDepartment();  ?>

                            <option selected disabled>Select Department*</option>
                            <?php foreach ($departments as $department) : ?>
                                <option value="<?= $department['DepartmentID'] ?>"><?= $department['DepartmentName'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="d-flex m-3 flex-row justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="courseSave" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="fw-2 m-auto">All fields are required</p>
            </div>
        </div>
    </div>
</div>

<!-- Edit Course -->
<div class="modal fade" id="coursesEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/action.php" method="POST">
                    <input type="hidden" name="editcourseID" id="editcourseID">
                    <div class="form-floating m-3">
                        <input required type="text" name="editcourseName" class="form-control" id="editcourseName" placeholder="College of Computer Science">
                        <label for="floatingInput">Course*</label>
                    </div>
                    <div class="form-floating m-3 ">
                        <input required type="text" name="editcourseAbbr" class="form-control" id="editcourseAbbr" placeholder="CCS">
                        <label for="floatingPassword">Abbreviation*</label>
                    </div>
                    <div class="m-3">
                        <select class="form-select form-select-lg" aria-label="Large select example" name="editdepartmentID" id="editdepartmentID">
                            <?php require_once 'select.php';  ?>
                            <?php $dept = new selectDepartment($conn);  ?>
                            <?php $departments = $dept->getDepartment();  ?>

                            <option selected disabled>Select Department*</option>
                            <?php foreach ($departments as $department) : ?>
                                <option value="<?= $department['DepartmentID'] ?>"><?= $department['DepartmentName'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="d-flex m-3 flex-row justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="courseUpdate" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="fw-2 m-auto">All fields are required</p>
            </div>
        </div>
    </div>
</div>