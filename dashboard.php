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
        <nav class="sidebar">
            <ul>
                <div class="logo">
                    <img src="img/logo-icon.png" alt="EACMed Logo">
                </div>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
                <li><a href="students.php"><i class="fas fa-users"></i> <span>Interns</span></a></li>
                <li><a href="attendance.php"><i class="fas fa-chart-line"></i> <span>Analytics</span></a></li>
                <li><a href="addup.php"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            </ul>
            <div class="logout-container">
                <button class="Btn" onclick="logout()">
                    <div class="sign">
                        <svg viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                        </svg>
                    </div>
                    <div class="text">Logout</div>
                </button>
            </div>
        </nav>
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
