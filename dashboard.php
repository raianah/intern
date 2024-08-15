<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/dashboard2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>
<body>
<<<<<<< HEAD
    <aside>
        <div class="logo-div">
            <img class="logo" src="img/logo.jpg" alt="Logo">
        </div>
        <ul>
            <li><a href=""><img class="icon" src="img/home.png" alt="">Home </a></li>
            <li><a href=""><img class="icon" src="img/lock.png" alt="">Accounts </a></li>
            <li><a href="students.php"><img class="icon" src="img/profile.png" alt="">Students</a></li>
            <li><a href="#" onclick="logout()"><img src="icon" alt="Log-out"> Log-Out </a></li>
        </ul>
    </aside>
    <main>
        <!-- <a href="#" id="insert-btn">Insert</a>
        <div class="popup" >
			<a href="#" id="close">CLOSE</a> -->
			
        </div> 
    </main>
</body>
<script>
    // Log-out Function
=======
    <div class="container">
        <?php include 'component/navbar.php';?> 
    </div>

    <script>
        function logout(){
            let ask = confirm('Are you want to Log-out?');
>>>>>>> 9d845a1bc8416a8f912ff044552ffec67e4abc95

            if(ask){
                window.location.assign('logout.php');
            }
            else {
                window.location.assign('dashboard.php');
            }
        }
    </script>      
</body>
</html>
