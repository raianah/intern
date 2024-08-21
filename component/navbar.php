<?php
include 'server.php';

// Check which form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $name = $_POST['name'];

    if ($type == 'school') {
        // Insert into school table
        $sql = "INSERT INTO school (schoolname) VALUES (?)";
    } elseif ($type == 'course') {
        // Insert into coursetbl table
        $sql = "INSERT INTO coursetbl (coursename) VALUES (?)";
    } else {
        die("Invalid type");
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        echo '<script>showNotification("New record created successfully", "success");</script>';
    } else {
        echo '<script>showNotification("Error occurred while creating record", "error");</script>';
    }

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/navbar.css"> <!-- Link to CSS file -->
</head>

<body>
    <div class="notification-container" id="notification-container"></div>
    <nav class="sidebar">
        <ul>
            <div class="logo">
                <img src="img/logo-icon.png" alt="EACMed Logo" id="logo-not-hover">
                <img src="img/EACMed Complete.png" alt="" id="logo-hover">
            </div>
            <li data-page="dashboard"><a href="dashboard.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li data-page="students"><a href="students.php"><i class="fas fa-users"></i> <span>Interns</span></a></li>
            <li data-page="attendance"><a href="attendance.php"><i class="fas fa-chart-line"></i><span>Analytics</span></a></li>
            <li data-page="report"><a href="reports.php"><i class="fas fa-file-alt"></i><span>Report</span></a></li>
            <li data-page="report"><a href="archive.php"><i class="fas fa-archive"></i><span>Archive</span></a></li>
            <li data-page="settings">
                <span class="settings-link">
                    <div class="settings">
                        <i class="fas fa-cog"></i> <span class="settings-text">Settings</span>
                    </div>
                </span>
                <ul class="dropdown">
                <li><a href="#" onclick="openModal('course-modal', 'Course')">Course</a></li>
                <li><a href="#" onclick="openModal('school-modal', 'School')">School</a></li>
                <li><a href="#" onclick="openModal('student-modal', 'Student')">Student</a></li>
                </ul>
            </li>
        </ul>
        <!-- Modals -->
        <div id="course-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('course-modal')">&times;</span>
                <h2 class="modal-title">Add Course</h2>
                <form method="POST">
                    <input type="hidden" name="type" value="course">
                    <input type="text" name="name" placeholder="Enter course name" required>
                    <button type="submit" class="add-button">Add Course</button>
                </form>
            </div>
        </div>

        <div id="school-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('school-modal')">&times;</span>
                <h2 class="modal-title">Add School</h2>
                <form method="POST">
                    <input type="hidden" name="type" value="school">
                    <input type="text" name="name" placeholder="Enter school name" required>
                    <button type="submit" class="add-button">Add School</button>
                </form>
            </div>
        </div>

        <div id="student-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('student-modal')">&times;</span>
                <h2 class="modal-title">Add Student</h2>
                <form method="POST">
                    <input type="hidden" name="type" value="student">
                    <input type="text" name="name" placeholder="Enter student name" required>
                    <button type="submit" class="add-button">Add Student</button>
                </form>
            </div>
        </div>
        <div class="logout-container">
            <button class="Btn" onclick="logout()">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                        </path>
                    </svg>
                </div>
                <div class="text">Logout</div>
            </button>
        </div>
    </nav>
    <script>
        function openModal(modalId, label) {
            var modal = document.getElementById(modalId);
            var titleElement = modal.querySelector('.modal-title');
            var buttonElement = modal.querySelector('.add-button');

            // Set the modal title and button label
            titleElement.textContent = 'Add New ' + label;
            buttonElement.textContent = 'Add ' + label;

            modal.style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            var modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = "none";
                }
            }
        }

        function showNotification(message, type) {
            var notificationContainer = document.getElementById('notification-container');
            var notification = document.createElement('div');
            notification.className = 'notification ' + type;
            notification.innerHTML = '<p>' + message + '</p>';
            notificationContainer.appendChild(notification);

            setTimeout(function() {
                notification.classList.add('show');
            }, 10);

            // Increase the duration for which the notification remains visible for debugging
            setTimeout(function() {
                notification.classList.remove('show');
                setTimeout(function() {
                    notificationContainer.removeChild(notification);
                }, 500); // Delay before removing the notification
            }, 10000); // 10 seconds visibility
        }
    </script>

</body>

</html>