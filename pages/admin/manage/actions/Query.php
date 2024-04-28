<?php
class Query {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
// ******************DEPARTMENT ****************
    // Create
    public function createDepartment($departmentName, $abbr) {
        $sql = "INSERT INTO departments (DepartmentName, abbr) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $departmentName, $abbr);
        return $stmt->execute();
    }

    // Read
    public function getDepartment() {
        $sql = "SELECT * FROM departments";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Get Id

    public function getDepartmentById($id) {
        $sql = "SELECT * FROM departments WHERE departmentID =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Update
    public function updateDepartment($id, $departmentName, $abbr) {
        $sql = "UPDATE departments SET DepartmentName=?, abbr=? WHERE DepartmentID=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $departmentName, $abbr, $id);
        return $stmt->execute();
    }

    // Delete
    public function deleteDepartment($id) {
        $sql = "DELETE FROM departments WHERE departmentID=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }



//*****************COURSE*******************
     // Create
     public function createCourse($courseName, $abbr, $departmentID) {
        $sql = "INSERT INTO courses (CourseName, CourseAbbr, DepartmentID) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $courseName, $abbr, $departmentID);
        return $stmt->execute();
    }

    // Read
    public function getCourse() {
        $sql = "SELECT courses.*, departments.* FROM courses 
                INNER JOIN departments ON courses.DepartmentID = departments.DepartmentID";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

       
    // Get Id

    public function getCourseById($id) {
        $sql = "SELECT * FROM courses WHERE CourseID =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Update
    public function updateCourse($id, $courseName, $abbr, $departmentID) {
        $sql = "UPDATE courses SET CourseName=?, CourseAbbr=?, DepartmentID=? WHERE CourseID=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $courseName, $abbr, $departmentID, $id);
        return $stmt->execute();
    }

    // Delete
    public function deleteCourse($id) {
        $sql = "DELETE FROM courses WHERE CourseID=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
