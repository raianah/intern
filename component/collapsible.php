<?php

// Database connection
$conn = mysqli_connect("dono-01.danbot.host", "root", "grade7class", "interndb", 1499);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request is to fetch schools or students
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'fetch_schools') {
        // Fetching schools
        $sql = "SELECT id, schoolname FROM school";
        $result = mysqli_query($conn, $sql);

        $schools = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $schools[] = $row;
        }

        echo json_encode($schools);
        } elseif ($action == 'fetch_students' && isset($_GET['schoolid'])) {
            // Fetching students by school ID
            $schoolId = $_GET['schoolid'];

            $sql = "SELECT IFNULL(image_url, 'img/default_profile.jpg') AS image_url, name FROM studentinfo WHERE schoolid = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $schoolId);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $students = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $students[] = $row;
            }

            echo json_encode($students);
            mysqli_stmt_close($stmt);
            exit;
        }
    } else {
        echo json_encode(["error" => "No action specified"]);
    }

// Close connection
mysqli_close($conn);

?>
