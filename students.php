<?php

require 'server.php';
session_start();
// error_reporting(0);




?>




<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>

<!-- PHP for add intern -->

<?php

// if(isset($_POST['add'])){
//     $Fname = $_POST['firstName'];
//     $Mname = $_POST['middleName'];
//     $Lname = $_POST['lastName'];
//     $seex = $_POST['sex'];
//     $age = $_POST['age'];
//     $courses = $_POST['coursename'];
//     $schoolname = $_POST["schools"];
//     $reqhours = $_POST['hours'];
//     $Sdate = $_POST['startDate'];
//     $Edate = $_POST['endDate'];
//     $intern_image = $_FILES['fileUpload']['name'];
//     $intern_temp_name = $_FILES['fileUpload']['tmp_name'];
//     $img_folder = '../img/' . $intern_image;


//     if(empty($Fname) || empty($Mname) || empty($Lname) || empty($seex) || empty($age) || empty($courses) || empty($schoolname) || empty($reqhours) || empty($Sdate) || empty($Edate)){
//         echo "<script>window.alert('Fill All The Fields! Please Try Again!');</script>";
//     }
//     else {

//         $student = "INSERT INTO studentinfo(fname, mname, lname, age, sex, courseid, schoolid, hrequired, startdate, end_date) VALUES('$Fname','$Mname','$Lname', '$age', '$seex','$courses', '$schoolname', '$reqhours', '$Sdate', '$Edate');";
//         $query = mysqli_query($conn, $student); 

//         echo "<script>window.alert('Register Successfully!');</script>";
//         echo "<script>window.location,assign('dashboard.php')</script>";
//     } 

//         // if($query){
//         //     move_uploaded_file($intern_temp_name, $img_folder);

//         // }
//         // else {
//         //     echo "<script>window.alert('Error Occured!')</script>";
//         // }

//         // if($query){

//         //     $res = [
//         //         'status' => 200,
//         //         'message' => 'Register Successfully'
//         //     ];
//         //     echo json_encode($res);
//         //     return true;

//         // }
//         // else {

//         //     $res = [
//         //         'status' => 500,
//         //         'message' => 'Intern Not Created'
//         //     ];
//         //     echo json_encode($res);
//         //     return false;

//         // }




// }






?>

<body>

    <?php include 'component/navbar.php'; ?>

    <div class="main-content">
        <header>
            <h1>Intern Records</h1>
            <button type="button" class="button" id="openModal">
                <span class="button__text">Add Intern</span>
                <span class="button__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none"
                        class="svg">
                        <line y2="19" y1="5" x2="12" x1="12"></line>
                        <line y2="12" y1="12" x2="19" x1="5"></line>
                    </svg>
                </span>
            </button>
        </header>
        <!-- Modal -->
        <div id="addInternModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add Intern</h2>
                <form id="addInternForm" method="POST" action="addstudent.php" enctype="multipart/form-data">
                    <!-- Add enctype attribute for file uploads -->
                    <div>
                        <input type="text" id="firstName" name="firstName" placeholder="First Name">
                    </div>
                    <div>
                        <input type="text" id="middleName" name="middleName" placeholder="Middle Name">
                    </div>
                    <div>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name">
                    </div>
                    <div>
                        <!-- <select id="" name="Sex">
                    <option value="" disabled selected>Sex</option>
                    <option value="M"> Male </option>
                    <option value="F"> Female </option>
                </select> -->
                        <select name="sex">
                            <option value="" disabled selected>Sex</option>
                            <option value="M"> Male </option>
                            <option value="F"> Female </option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="age" placeholder="Age">
                    </div>
                    <div>
                        <input type="text" id="hours" name="hours" placeholder="Hours Required">
                    </div>
                    <div>
                        <select id="course" name="course">
                            <option value="" disabled selected>Course</option>
                            <?php
                            $fetching = "SELECT * FROM coursetbl";
                            $fetchquery = mysqli_query($conn, $fetching);

                            while ($row = mysqli_fetch_assoc($fetchquery)) {
                                $courseid = $row['courseid'];
                                $course = $row['course'];
                                ?>
                                <option value="<?php echo $courseid; ?>"><?php echo $course; ?></option>
                                <?php
                            }


                            ?>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" id="startDate" name="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" id="endDate" name="endDate">
                    </div>
                    <div>
                        <select id="" name="school">
                            <option disabled selected>School Name</option>
                            <?php
                            $school = "SELECT * FROM school ORDER BY schoolname";
                            $query = mysqli_query($conn, $school);

                            while ($row = mysqli_fetch_assoc($query)) {
                                $Sid = $row['id'];
                                $school = $row['schoolname'];
                                ?>
                                <option value="<?php echo $Sid; ?>"><?php echo $school; ?></option>
                                <?php
                            }
                            ?>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="file-upload-container">
                        <label for="fileUpload" class="file-upload-label">Profile Picture</label>
                        <label for="fileUpload" class="custom-file-upload">
                            <span>Choose File</span>
                        </label>
                        <input type="file" id="fileUpload" name="fileUpload" accept="image/*" style="display: none;" />
                    </div>
                    <div style="flex: 1 1 100%;">
                        <button type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="search-bar-container">
            <div class="search-bar">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <button class="filter-button">Filter Results</button>
        </div>

        <div class="table-container">
                <table id="myTable">
                    <thead>
                    <tr>
                        <th onclick="sortTable(0)">ID</th>
                        <th onclick="sortTable(1)">Name</th>
                        <th onclick="sortTable(2)">School / University</th>
                        <th onclick="sortTable(3)">Course</th>
                        <th onclick="sortTable(4)">Started Date</th>
                        <th onclick="sortTable(5)">End Date</th>
                        <th onclick="sortTable(6)">Hours Required</th>
                        <th onclick="sortTable(7)">Overall Remaining Hours</th>
                        <th onclick="sortTable(8)">Status</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    if (isset($_POST['btn'])) {
                        $search = $_POST['search'];

                        $find = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.id = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR hrequired LIKE '%$search%' OR startdate LIKE '%$search%' OR end_date LIKE '%$search%' OR schoolname LIKE '%$search%' OR course LIKE '%$search%' ORDER BY studentinfo.studid DESC;";
                        $searchquery = mysqli_query($conn, $find);
                        $exist = mysqli_num_rows($searchquery);

                        if ($exist > 0) {
                            while ($row = mysqli_fetch_all($searchquery)) {
                                $id = $row['id'];
                                $fname = $row['fname'];
                                $mname = $row['mname'];
                                $lname = $row['lname'];
                                $course = $row['course'];
                                $sex = $row['sex'];
                                $age = $row['age'];
                                $schoolname = $row['schoolname'];
                                $hours = $row['hrequired'];
                                $start = $row['startdate'];
                                $end = $row['end_date'];

                                echo "<tr class='highlight'>";
                                echo "<td>" . $id . "</td>";
                                echo "<td>" . $lname . "," . $fname . " " . $mname . "</td>";
                                echo "<td>" . $schoolname . "</td>";
                                echo "<td>" . $course . "</td>";
                                echo "<td>" . $start . "</td>";
                                echo "<td>" . $end . "</td>";
                                echo "<td>" . $hours . " hours</td>";
                                echo "<td></td>"; // Adjust this for remaining hours
                                echo "<td>Active</td>"; // Adjust this for status
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' style='text-align:center'> No Data Found ..... </td></tr>";
                        }
                    } else {
                        $sql = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid ORDER BY studentinfo.studid DESC;";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($query)) {
                            $id = $row['studid'];
                            $fname = $row['fname'];
                            $mname = $row['mname'];
                            $lname = $row['lname'];
                            $course = $row['course'];
                            $sex = $row['sex'];
                            $age = $row['age'];
                            $school = $row['schoolname'];
                            $start = $row['startdate'];
                            $end = $row['end_date'];
                            $hours = $row['hrequired'];
                            $status = $row['status'];

                            echo "<tr class='highlight'>";
                            echo "<td>" . $id . "</td>";
                            echo "<td>" . $lname . "," . $fname . " " . $mname . "</td>";
                            echo "<td>" . $school . "</td>";
                            echo "<td>" . $course . "</td>";
                            echo "<td>" . $start . "</td>";
                            echo "<td>" . $end . "</td>";
                            echo "<td>" . $hours . " hours</td>";
                            echo "<td></td>"; // Adjust this for remaining hours
                            echo "<td>" . $status . "</td>"; // Adjust this for status
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            </main>
        </div>
        <script>
            var modal = document.getElementById("addInternModal");
            var btn = document.getElementById("openModal");
            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function() {
                modal.style.display = "block";
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            function sortTable(columnIndex) {
                var table = document.getElementById("myTable");
                var rows = table.rows;
                var switching = true;
                var shouldSwitch;
                var direction = "asc"; 
                var switchCount = 0;

                while (switching) {
                    switching = false;
                    var rowsArray = Array.prototype.slice.call(rows, 1); 

                    for (var i = 0; i < rowsArray.length - 1; i++) {
                        shouldSwitch = false;
                        var x = rowsArray[i].getElementsByTagName("TD")[columnIndex];
                        var y = rowsArray[i + 1].getElementsByTagName("TD")[columnIndex];

                        var xValue = x.innerHTML.toLowerCase();
                        var yValue = y.innerHTML.toLowerCase();

                        if (direction === "asc") {
                            if (xValue > yValue) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (direction === "desc") {
                            if (xValue < yValue) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }

                    if (shouldSwitch) {
                        rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
                        switching = true;
                        switchCount++;
                    } else {
                        if (switchCount === 0 && direction === "asc") {
                            direction = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>
        <!-- Ajax Script -->
        <!-- <script>
        $(document).on('submit', '#addInternForm' ,function(e){
            
        e.preventDefault();
        
        let formData = new FormData(this);
        formData.append("add_intern", true);
        $.ajax({
            type : "method",
            url: "students.php",
            data: "formData",
            processData: false,
            contentType: false,
            success:function(response) {
                let res = jQuery.parseJSON(response);
                
                if(res.status == 422){
                    alert(res.message);
                    
                    }
                    else if (res.status == 200){
                        alert('Successfully Added!');
                        $('#addInternForm').modal('hide');
                        $('#addInternModal')[0].reset();
                        }
                        }
                        });
                        
                        
                        
                        });
                    </script> -->

        <script>

            document.addEventListener('DOMContentLoaded', function() {
                var tableRows = document.querySelectorAll('table tbody tr');

                tableRows.forEach(function(row) {
                    row.addEventListener('dblclick', function() {
                        // Get intern details from the row (e.g., intern ID)
                        var internId = this.getAttribute('data-intern-id');
                        // Redirect to the intern's detail page
                        window.location.href = 'internInfo.php'
                    });
                });
            });

            document.querySelector('.custom-file-upload').addEventListener('click', function() {
                document.getElementById('fileUpload').click();
            });


        </script>
        <script src="js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


</body>

</html>