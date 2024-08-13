<?php
require 'server.php';



if(isset($_POST['add'])){
    $Fname = $_POST['firstName'];
    $Mname = $_POST['middleName'];
    $Lname = $_POST['lastName'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $courses = $_POST['course'];
    $school = $_POST['school'];
    $reqhours = $_POST['hours'];
    $Sdate = $_POST['startDate'];
    $Edate = $_POST['endDate'];
    $intern_image = $_FILES['fileUpload']['name'];
    $intern_temp_name = $_FILES['fileUpload']['tmp_name'];
    $img_folder = '../img/' . $intern_image;


    if(empty($Fname) || empty($Mname) || empty($Lname) || empty($sex) || empty($age) || empty($courses) || empty($school) || empty($reqhours) || empty($Sdate) || empty($Edate)){
        echo "<script>window.alert('Fill All The Fields! Please Try Again!');</script>";
        echo "<script>window.location.assign('students.php');</script>";
    }
    else {
        
        $student = "INSERT INTO studentinfo(fname, mname, lname, age, sex, courseid, schoolid, hrequired, startdate, end_date) VALUES('$Fname','$Mname','$Lname', 
        '$age', '$seex','$courses', '$school', '$reqhours', '$Sdate', '$Edate');";
        $query = mysqli_query($conn, $student); 

        echo "<script>window.alert('Register Successfully!');</script>";
        echo "<script>window.location,assign('dashboard.php')</script>";
    } 
    
        // if($query){
        //     move_uploaded_file($intern_temp_name, $img_folder);

        // }
        // else {
        //     echo "<script>window.alert('Error Occured!')</script>";
        // }

        // if($query){
            
        //     $res = [
        //         'status' => 200,
        //         'message' => 'Register Successfully'
        //     ];
        //     echo json_encode($res);
        //     return true;

        // }
        // else {
            
        //     $res = [
        //         'status' => 500,
        //         'message' => 'Intern Not Created'
        //     ];
        //     echo json_encode($res);
        //     return false;

        // }
    
        
    

}






?>