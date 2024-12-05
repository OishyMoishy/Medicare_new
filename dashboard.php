<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    echo "Session data missing.";
    exit();
}

$userid = $_SESSION['id'];
$name = $_SESSION['name'];

$sql = "SELECT * FROM request WHERE userid=?";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $appointments = []; // Initialize an empty array to store multiple requests

    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row; // Store each request in the array
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare the SQL statement.";
    exit();
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <style>
    /* Responsive Layout */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        nav {
            width: 100%;
            height: auto;
            padding: 10px;
        }

        .right-section {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .welcome-message {
            font-size: 18px;
        }

        .card h2 {
            font-size: 20px;
        }

        .card p {
            font-size: 14px;
        }

        .appoint-button, .zoom-link {
            font-size: 14px;
            padding: 8px 16px;
        }

        .popup-form-content {
            padding: 15px;
        }

        .popup-form-content label {
            font-size: 14px;
        }

        .popup-form-content input, .popup-form-content select {
            padding: 8px;
            font-size: 14px;
        }

        .popup-form-content button {
            font-size: 14px;
            padding: 8px 16px;
        }
    }

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        min-height: 100vh; /* Change height to min-height */
        background-color: #f4f4f4;
    }

    .container {
        display: flex;
        width: 100%;
        min-height: 100vh;
    }

    nav {
        width: 250px;
        background: white;
        color: #16a085;
        padding-top: 30px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        position: fixed;
        height: 100%;
        top: 0;
        left: 0;
    }

    nav ul {
        list-style: none;
        padding: 0;
    }

    nav ul li {
        margin: 20px 0;
    }

    nav ul li a {
        color: #16a085;
        text-decoration: none;
        font-size: 20px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        transition: background 0.2s;
    }

    nav ul li a:hover {
        background: #16a085;
        color: white;
    }

    nav ul li a .nav-item {
        margin-left: 10px;
    }

    .right-section {
        flex: 1;
        padding: 40px;
        background: #ecf0f1;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-left: 250px; /* Offset for the fixed nav */
    }

    .header {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        padding: 20px;
    }

    .header-button {
        background: white;
        color: #16a085;
        padding: 10px 20px;
        border: 2px solid #16a085;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s, box-shadow 0.3s, color 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header-button:hover {
        background: #16a085;
        color: white;
        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
    }

    .welcome-message {
        margin-bottom: 20px;
        font-size: 30px;
        color: #333;
        font-weight: bold;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        text-align: center;
        border: 2px solid #16a085;
    }

    .card h2 {
        margin-bottom: 10px;
        color: #16a085;
        font-size: 20px;
    }

    .card p {
        margin: 10px 0;
        color: #555;
        font-size: 15px;
    }

    .zoom-link {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .zoom-link:hover {
        background: #2980b9;
    }

    .appoint-button {
        background: white;
        color: #16a085;
        padding: 10px 20px;
        border: 2px solid #16a085;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s, box-shadow 0.3s, color 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 15px;
    }
.appoint-button:hover {
    background: #16a085;
    color: white;
    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
}

.popup-form {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 999; /* Ensure the popup appears above other content */
}

.popup-form-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}

.popup-form-content label {
    display: block;
    margin-top: 10px;
    margin-bottom: 5px;
    color: #333;
}

.popup-form-content input, .popup-form-content select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.popup-form-content button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.popup-form-content .submit-button {
    background: #16a085;
    color: white;
}

.popup-form-content .submit-button:hover {
    background: #16a085;
    color: white;
}

.popup-form-content .close-button {
    background: #cd2f0c;
    color: white;
}

.popup-form-content .close-button:hover {
    background: #c0392b;
}

/* Additional responsiveness for smaller screens */
@media (max-width: 480px) {
    .container {
        padding: 20px; /* Add padding to container for smaller screens */
    }

    .right-section {
        padding: 20px;
        margin-left: 0; /* Remove left margin for smaller screens */
    }

    nav {
        width: 100%;
        position: static; /* Remove fixed positioning for smaller screens */
        height: auto;
        box-shadow: none; /* Remove box-shadow for smaller screens */
    }
}
.cancel {
        background:  #16a085;
        color: white;
        padding: 10px 20px;
        border: 2px solid #16a085;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s, box-shadow 0.3s, color 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 15px;
    }
    .cancel:hover {
    background: white;
    color: #16a085;
    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
}
</style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="#" class="logo">
                        <img src="logo.jpg" alt="Logo" style="width: 40px; height: 40px; border-radius: 50%;">
                        <span class="nav-item">Medi Care</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="help.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="right-section">
            <div class="welcome-message">
                Welcome, <?= htmlspecialchars($name) ?>!
            </div>
            <?php if (!empty($appointments)): ?>
    <?php foreach ($appointments as $appointment): ?>
        <div class="card">
            <h2>Request Details</h2>
            <p>You have made a request for appointments:</p>
            <p><span class="category">Doctor Type: <?= htmlspecialchars($appointment['category']) ?></span></p>
            <p><span class="docname">Doctor Name: <?= htmlspecialchars($appointment['docname']) ?></span></p>

            <?php if (!empty($appointment['zoomlink'])): ?>
                <p class="accepted-message">Your request has been accepted.</p>
                <p class="zoom-details">Zoom Link: <a href="<?= htmlspecialchars($appointment['zoomlink']) ?>" target="_blank"><?= htmlspecialchars($appointment['zoomlink']) ?></a></p>
                <p class="zoom-date-time">Meeting Date: <?= htmlspecialchars($appointment['zoom_date']) ?></p>
                <p class="zoom-date-time">Meeting Time: <?= htmlspecialchars($appointment['zoom_time']) ?></p>
            <?php else: ?>
                <p class="pending-message">Your request is still pending.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="card">
        <h2>No Requests Found</h2>
    </div>
<?php endif; ?>

            <button class="appoint-button" onclick="openForm()">Appoint a Doctor</button>
        </div>
    </div>

    <div class="popup-form" id="popupForm">
    <div class="popup-form-content">
        <form action="requestprocess.php" method="post">
            <label for="category">Doctor Type</label>
            <select id="category" name="category" required onchange="fetchDoctorsAndDaysByCategory()">
                    <option value="Gastro liver">Gastro liver</option>
                    <option value="Child specialist">Child specialist</option>
                    <option value="Cardiac Surgery">Cardiac Surgery</option>
                    <option value="Thoracic Surgery">Thoracic Surgery</option>
                    <option value="Chest & Esophageal Surgeon">Chest & Esophageal Surgeon</option>
                    <option value="Rheumatism specialist">Rheumatism specialist</option>
                    <option value="Chest (Lung) & Esophageal Specialist">Chest (Lung) & Esophageal Specialist</option>
                    <option value="Mother & Child Disease">Mother & Child Disease</option>
                    <option value="Pedodontics">Pedodontics</option>
                    <option value="Prosthodontics">Prosthodontics</option>
                    <option value="Orthodontics">Orthodontics</option>
                    <option value="Oral & Maxilofacial Surgery">Oral & Maxilofacial Surgery</option>
                    <option value="Conservative Dentistry">Conservative Dentistry</option>
                    <option value="Hepatology">Hepatology</option>
                    <option value="Family medicine">Family medicine</option>
                    <option value="Drug addiction">Drug addiction</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Physical Medicine and Rehabilitation">Physical Medicine and Rehabilitation</option>
                    <option value="Specialist/Physiatrist">Specialist/Physiatrist</option>
                    <option value="Skin Specialist">Skin Specialist</option>
                    <option value="Paralysis">Paralysis</option>
                    <option value="Arthritis Pain">Arthritis Pain</option>
                    <option value="Venereology">Venereology</option>
                    <option value="Diabetes">Diabetes</option>
                    <option value="Sonologist">Sonologist</option>
                    <option value="Radiotherapist">Radiotherapist</option>
                    <option value="Oral & Dental Surgery">Oral & Dental Surgery</option>
                    <option value="Endoscopist">Endoscopist</option>
                    <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                    <option value="Laparoscopic Surgery">Laparoscopic Surgery</option>
                    <option value="Nutritionist">Nutritionist</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Rehabilitation Medicine">Rehabilitation Medicine</option>
                    <option value="Orthopedician">Orthopedician</option>
                    <option value="Nephrology">Nephrology</option>
                    <option value="Oncology">Oncology</option>
                    <option value="Pediatric Endocrinology">Pediatric Endocrinology</option>
                    <option value="Cytopathology">Cytopathology</option>
                    <option value="Hepatopancreatobiliary Surgery">Hepatopancreatobiliary Surgery</option>
                    <option value="Neuro Medicine">Neuro Medicine</option>
                    <option value="Neuro Surgeon">Neuro Surgeon</option>
                </select>
                <label for="docname">Doctor Name</label>
<select id="docname" name="docname" required onchange="fetchAvailableDays()">
    <option value="">Select Doctor</option>
</select>
<label for="visiting_days">Available Day</label>
<select id="visiting_days" name="day" required>
    <option value="">Select Day</option>
</select>



<button type="submit" class="submit-button">Submit</button>
<button type="button" class="close-button" onclick="closeForm()">Cancel</button>

<script>
function openForm() {
    document.getElementById('popupForm').style.display = 'flex'; // Show the popup form
}

function closeForm() {
    document.getElementById('popupForm').style.display = 'none'; // Hide the popup form
}

function fetchDoctorsAndDaysByCategory() {
    const category = document.getElementById("category").value;
    const nameDropdown = document.getElementById("docname");
    const dayDropdown = document.getElementById("visiting_days");

    if (!category) {
        nameDropdown.innerHTML = '<option value="">Select Doctor Type First</option>';
        dayDropdown.innerHTML = '<option value="">Select Doctor First</option>';
        return;
    }

    // Fetch doctors and their visiting days from the PHP backend
    fetch('get_doctors_with_days.php?category=' + encodeURIComponent(category))
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); // Convert the response to JSON
        })
        .then(data => {
            console.log('Fetched data:', data); // Debugging - Check what data is returned
            nameDropdown.innerHTML = '<option value="">Select Doctor</option>'; // Reset doctor dropdown
            dayDropdown.innerHTML = '<option value="">Select Doctor First</option>'; // Reset days dropdown

            if (data.length > 0) {
                data.forEach(doctor => {
                    // Populate doctor dropdown
                    const option = document.createElement('option');
option.value = JSON.stringify({ id: doctor.id, days: doctor.visiting_days }); // Fixed key
option.textContent = doctor.docname; // Fixed key
nameDropdown.appendChild(option);
                });
            } else {
                nameDropdown.innerHTML = '<option value="">No doctors available</option>';
            }
        })
        .catch(error => {
            console.error('Error fetching doctors and days:', error);
            nameDropdown.innerHTML = '<option value="">Error loading doctors</option>';
            dayDropdown.innerHTML = '<option value="">Error loading days</option>';
        });
}

function fetchAvailableDays() {
    const selectedDoctor = document.getElementById("docname").value; // Get the selected doctor value
    const dayDropdown = document.getElementById("visiting_days");

    if (!selectedDoctor) {
        dayDropdown.innerHTML = '<option value="">Select Doctor First</option>';
        return;
    }

    try {
        const { days } = JSON.parse(selectedDoctor); // Parse the JSON string to get days
        dayDropdown.innerHTML = '<option value="">Select Day</option>'; // Reset dropdown

        if (days.length > 0) {
            days.forEach(day => {
                const option = document.createElement('option');
                option.value = day; // Set the value of the option to the day
                option.textContent = day; // Display the day in the dropdown
                dayDropdown.appendChild(option);
            });
        } else {
            dayDropdown.innerHTML = '<option value="">No available days</option>';
        }
    } catch (error) {
        console.error('Error parsing doctor data:', error);
        dayDropdown.innerHTML = '<option value="">Error loading days</option>';
    }
}



</script>
</body>
</html>