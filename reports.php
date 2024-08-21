<?php
    // Database connection
    include 'server.php';

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
            exit;
        } elseif ($action == 'fetch_students' && isset($_GET['schoolid'])) {
            // Fetching students by school ID
            $schoolId = $_GET['schoolid'];

            $sql = "SELECT IFNULL(image, '../img/default_profile.jpg') AS image, name FROM studentinfo WHERE schoolid = ?";
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
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
    <link rel="stylesheet" href="css/reports.css">
    <title>Report</title>
</head>
<body>
    <?php include 'component/navbar.php';?>
    
    <div class="main-content">
        <div class="calendar-container">
            <div class="calendar-column">
                <h2>Monthly Calendar</h2>
                <div class="calendar" id="monthly-calendar">
                    <!-- Monthly Calendar will be generated here -->
                </div>
            </div>
            <div class="calendar-column">
                <h2>Weekly Calendar</h2>
                <div class="calendar" id="weekly-calendar">
                    <!-- Weekly Calendar will be generated here -->
                </div>
            </div>
            <div class="calendar-column">
                <h2>Daily Calendar</h2>
                <div class="calendar" id="daily-calendar">
                    <!-- Daily Calendar will be generated here -->
                </div>
            </div>
        </div>

        <div class="second-container">
    <div id="collapsible-container">
        <!-- Collapsible sections will be generated here -->
    </div>
</div>

    </div>
    
    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            generateMonthlyCalendar();
            generateWeeklyCalendar();
            generateDailyCalendar();
            fetchSchools();
        });

        function generateMonthlyCalendar() {
            const calendar = document.getElementById('monthly-calendar');
            const today = new Date();
            const currentMonth = today.getMonth();
            const currentYear = today.getFullYear();

            const holidays = {
                // Format: "MM-DD": "Holiday Name"
                "01-01": "New Year's Day",
                "02-25": "People Power Revolution",
                "04-09": "Araw ng Kagitingan",
                "05-01": "Labor Day",
                "06-12": "Independence Day",
                "08-21": "Ninoy Aquino Day",
                "08-28": "National Heroes Day",
                "11-01": "All Saints' Day",
                "11-02": "All Souls' Day",
                "11-30": "Bonifacio Day",
                "12-25": "Christmas Day",
                "12-30": "Rizal Day",
            };

            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            const daysOfWeek = ['S', 'M', 'T', 'W', 'Th', 'F', 'S'];

            const table = document.createElement('table');
            table.className = 'calendar-table';

            // Create the header row for days of the week
            const headerRow = document.createElement('tr');
            daysOfWeek.forEach(day => {
                const th = document.createElement('th');
                th.innerHTML = day;
                headerRow.appendChild(th);
            });
            table.appendChild(headerRow);

            // Create the rows for days in the month
            let date = 1;
            for (let i = 0; i < 6; i++) { // 6 weeks to cover all possibilities
                const row = document.createElement('tr');

                for (let j = 0; j < 7; j++) { // 7 days a week
                    const cell = document.createElement('td');

                    if (i === 0 && j < firstDay) {
                        cell.innerHTML = '';
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const monthDay = `${String(currentMonth + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                        cell.innerHTML = date;
                        
                        // Highlight Philippine holidays
                        if (holidays[monthDay]) {
                            cell.classList.add('holiday');
                            cell.title = holidays[monthDay]; // Tooltip to show holiday name
                        }

                        if (date === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                            cell.classList.add('today');
                        }
                        date++;
                    }
                    row.appendChild(cell);
                }

                table.appendChild(row);
            }

            calendar.appendChild(table);
        }

        function generateWeeklyCalendar() {
            const calendar = document.getElementById('weekly-calendar');
            const today = new Date();
            const currentDay = today.getDay();
            const firstDayOfWeek = new Date(today);
            firstDayOfWeek.setDate(today.getDate() - currentDay);

            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            const holidays = {
                // Format: "MM-DD": "Holiday Name"
                "01-01": "New Year's Day",
                "02-25": "People Power Revolution",
                "04-09": "Araw ng Kagitingan",
                "05-01": "Labor Day",
                "06-12": "Independence Day",
                "08-21": "Ninoy Aquino Day",
                "08-28": "National Heroes Day",
                "11-01": "All Saints' Day",
                "11-02": "All Souls' Day",
                "11-30": "Bonifacio Day",
                "12-25": "Christmas Day",
                "12-30": "Rizal Day",
                // Add other holidays as needed
            };

            const table = document.createElement('table');
            table.className = 'weekly-calendar-table';

            for (let i = 0; i < 7; i++) {
                const row = document.createElement('tr');

                // Day label column
                const dayCell = document.createElement('th');
                dayCell.innerHTML = daysOfWeek[i];
                row.appendChild(dayCell);

                // Date column
                const dateCell = document.createElement('td');
                const date = new Date(firstDayOfWeek);
                date.setDate(firstDayOfWeek.getDate() + i);

                // Format the date as (Month Day, Year)
                const options = { month: 'long', day: 'numeric', year: 'numeric' };
                const formattedDate = date.toLocaleDateString(undefined, options);
                dateCell.innerHTML = `${formattedDate}`;

                // Check if the date is a holiday
                const monthDay = `${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
                if (holidays[monthDay]) {
                    // Highlight both the day label and the date if it's a holiday
                    dayCell.classList.add('holiday');
                    dateCell.classList.add('holiday');
                    dateCell.title = holidays[monthDay]; // Tooltip to show holiday name
                }

                row.appendChild(dateCell);
                table.appendChild(row);
            }

            calendar.appendChild(table);
        }

        function generateDailyCalendar() {
            const calendar = document.getElementById('daily-calendar');

            const table = document.createElement('table');
            table.className = 'daily-calendar-table';

            // Add table header
            const headerRow = document.createElement('tr');

            const timeHeader = document.createElement('th');
            timeHeader.innerHTML = 'Time';
            headerRow.appendChild(timeHeader);

            const eventHeader = document.createElement('th');
            eventHeader.innerHTML = 'Event';
            headerRow.appendChild(eventHeader);

            table.appendChild(headerRow);

            // Add time slots for AM
            for (let i = 1; i <= 12; i++) {
                const row = document.createElement('tr');

                const hourCell = document.createElement('td');
                hourCell.innerHTML = `${i}:00 AM`;
                hourCell.className = 'hour';
                row.appendChild(hourCell);

                const eventCell = document.createElement('td');
                eventCell.className = 'event';
                eventCell.innerHTML = ''; // Blank for now
                row.appendChild(eventCell);

                table.appendChild(row);
            }

            // Add time slots for PM
            for (let i = 1; i <= 12; i++) {
                const row = document.createElement('tr');

                const hourCell = document.createElement('td');
                hourCell.innerHTML = `${i}:00 PM`;
                hourCell.className = 'hour';
                row.appendChild(hourCell);

                const eventCell = document.createElement('td');
                eventCell.className = 'event';
                eventCell.innerHTML = ''; // Blank for now
                row.appendChild(eventCell);

                table.appendChild(row);
            }

            calendar.appendChild(table);
        }

        // collapsible
        function fetchSchools() {
            fetch('?action=fetch_schools')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('collapsible-container');
                    data.forEach(school => {
                        const collapsible = document.createElement('button');
                        collapsible.className = 'collapsible';
                        collapsible.innerHTML = school.schoolname;
                        container.appendChild(collapsible);

                        const content = document.createElement('div');
                        content.className = 'collapsible-content';
                        container.appendChild(content);

                        collapsible.addEventListener('click', function() {
                            this.classList.toggle('collapsible-active');
                            const isActive = this.classList.contains('collapsible-active');
                            content.style.display = isActive ? 'block' : 'none';
                            if (isActive) {
                                fetchStudentImages(school.id, content);
                            }
                        });
                    });
                })
                .catch(error => console.error('Error fetching schools:', error));
        }

        function fetchStudentImages(schoolId, content) {
            fetch('?action=fetch_students&schoolid=' + schoolId)
                .then(response => response.json())
                .then(data => {
                    content.innerHTML = ''; // Clear previous content
                    data.forEach(student => {
                        const img = document.createElement('img');
                        img.src = student.image_url;
                        img.alt = student.name;
                        content.appendChild(img);
                    });
                })
                .catch(error => console.error('Error fetching student images:', error));
        }
    </script>
</body>
</html>
