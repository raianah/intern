<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modals Example</title>
    <link rel="stylesheet" href="addup.css">
</head>
<body>
    <h1>Manage Entities</h1>
    
    <!-- Buttons to open modals -->
    <button id="openAddCourseModal">Add Course</button>
    <button id="openAddSchoolModal">Add School</button>
    <button id="openAddStudentModal">Add Student</button>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAddCourseModal">&times;</span>
            <h2>Add Course</h2>
            <form id="addCourseForm">
                <label for="courseName">Course Name:</label>
                <input type="text" id="courseName" name="courseName" required>
                <button type="submit">Add Course</button>
            </form>
        </div>
    </div>

    <!-- Add School Modal -->
    <div id="addSchoolModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAddSchoolModal">&times;</span>
            <h2>Add School</h2>
            <form id="addSchoolForm">
                <label for="schoolName">School Name:</label>
                <input type="text" id="schoolName" name="schoolName" required>
                <button type="submit">Add School</button>
            </form>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAddStudentModal">&times;</span>
            <h2>Add Student</h2>
            <form id="addStudentForm">
                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" required>
                <button type="submit">Add Student</button>
            </form>
        </div>
    </div>

    <script src="addup.js"></script>
</body>
</html>
