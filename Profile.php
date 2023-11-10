<?php
    require('../TumagaHealthTrack/config.php'); // Adjust the path as needed
    include(CONNECTION_PATH); // Assuming CONNECTION is defined in your config.php
    require ('../TumagaHealthTrack/PhpFlow/Session-Token.php');


    
?>

<?php
// Include your database connection code here


// Initialize an HTML string variable to store user information
$userInformationHTML = '';

// Check if the ID is provided in the request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize the user ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Build and execute your SQL query to retrieve user data
    $sql = "SELECT * FROM healthtrack WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Initialize an empty array to store user data
        $users = array();
    
        while ($user = mysqli_fetch_assoc($result)) {
            // Store each user's data as an array inside the $users array
            $users[] = array(
                'id' => htmlspecialchars($user['id']),
                'Name' => htmlspecialchars($user['Name']),
                'Address' => htmlspecialchars($user['Adress']),
                'Contact' => htmlspecialchars($user['Contact']),
                'Zone Name' => htmlspecialchars($user['zone_name']),
                'Status' => htmlspecialchars($user['status']),
                'Date' => htmlspecialchars($user['Date']),
                'Time' => htmlspecialchars($user['Time']),
                'Diagnose' => htmlspecialchars($user['diagnose']),
                'Prescription' => htmlspecialchars($user['prescription']),
                'Medical Condition' => htmlspecialchars($user['medical_Condition']),
                'Age' => htmlspecialchars($user['Age'])
                // Add more fields as needed
            );
        }
    
        // If you want to display this array directly, you could use var_dump($users) to view it
    
        // Create HTML content based on $users data
        $userInformationHTML = '';
        foreach ($users as $user) {
            $userInformationHTML .= "ID: " . $user['id'] . "<br>";
            $userInformationHTML .= "Name: " . $user['Name'] . "<br>";
            $userInformationHTML .= "Address: " . $user['Address'] . "<br>";
            $userInformationHTML .= "Contact: " . $user['Contact'] . "<br>";
            $userInformationHTML .= "Zone Name: " . $user['Zone Name'] . "<br>";
            $userInformationHTML .= "Status: " . $user['Status'] . "<br>";
            $userInformationHTML .= "Date: " . $user['Date'] . "<br>";
            $userInformationHTML .= "Time: " . $user['Time'] . "<br>";
            $userInformationHTML .= "Diagnose: " . $user['Diagnose'] . "<br>";
            $userInformationHTML .= "Prescription: " . $user['Prescription'] . "<br>";
            $userInformationHTML .= "Medical Condition: " . $user['Medical Condition'] . "<br>";
            $userInformationHTML .= "Age: " . $user['Age'] . "<br><br>";
            // Add more fields as needed
        }
        
    } else {
        // The ID does not exist, redirect to the 404 error page
        header("Location: http://localhost/TumagaHealthTrack/ErrorHandling/404.html");
        exit;
    }
} else {
    // No ID provided, handle accordingly (redirect, display an error message, etc.)
    header("Location: http://localhost/TumagaHealthTrack/ErrorHandling/404.html");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">

<!-- Bootstrap JavaScript (Bundle) -->


    <title>Document</title>
</head>
<style>
   
    body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
font-family: 'Roboto Slab', serif;

}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}

h1 {
    color: white;
    background-color: lightcoral;
    width: 17em;
}

.btn-primary {
    color: white;
    background-color: lightcoral;
    
}

/* Styles for the modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 80%; /* Center horizontally */
  top: 65%; /* Center vertically */
  transform: translate(-50%, -50%);
  width: 100%;
  height: 100%;
}

.modal-content {
  background-color: lightcoral;
  padding: 30px; /* Increased padding */
  border-radius: 10px; /* Increased border radius */
  box-shadow: 5px 10px px rgba(0, 0, 0, 0.3); /* Increased box shadow */
  text-align: center;
  position: relative;
  width: 70%; /* Increased width */
  max-width: 600px; /* Set a maximum width */
}

.close {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 28px; /* Slightly larger font size */
  cursor: pointer;
}

/* Styles for the form */
form {
  display: flex;
  flex-direction: column;
}

/* Styles for the Add button */
button[type='submit'] {
  background-color: green;
  color: white;
  border: none;
  padding: 12px; /* Increased padding */
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px; /* Increased font size */
}
.btn-primary {
    border-color:  white;
}
</style>
<body>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="data:image/png;base64,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" alt="">
                    
                    <div class="small font-italic text-muted mb-4">USER-ID: <h5><?php echo $id; ?></h5></div>
                    <!-- Profile picture upload button-->
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                        <h1>PERSON<br>INFORMATION</h1>
                           
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">FULL NAME</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['Name']
 ?></h5></label>
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">AGE</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php $user['Age']
 ?></h5></label>
 
                            </div>
                           
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">CONTACT#</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['Contact']
 ?></h5></label>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">PUROK</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['Zone Name']
 ?></h5></label>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">ADRESS</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['Address']
 ?></h5></label>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                        <label class="small mb-1" for="inputFirstName">STATUS</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo  $user['Status']
 ?></h5></label>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">DATE AND TIME TURN IN</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo  $user['Date'] . " / ". $user['Time']
 ?></h5></label>
 
                            </div>
                 &nbsp;
                 
                 <div class="col-md-6">
    <h1>MEDICAL INFORMATION</h1>
    <table class="table">
        <tr>
            <td><label class="small mb-1">DIAGNOSE</label></td>
            <td><h8><?php echo $user['Diagnose']; ?></h8></td>
        </tr>
        <td><label class="small mb-1">PRESCRIPTION</label></td>
            <td><h8><?php echo $user['Prescription']; ?></h8></td>
            <tr>
            <td><label class="small mb-1">MEDICAL CONDITION</label></td>
            <td><h8><?php echo $user['Medical Condition']; ?></h8></td>
        </tr>
    </table>
</div>

                            </div>
                        </div>
                        
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button" onclick="openModal()">EDIT MEDICAL CONDITION</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="myModal" class="modal">
        <div class="modal-content">
            <h2 style="color:white"><bold>MEDICAL CONDITION UPDATE</bold></h2>
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="myForm" onsubmit="submitForm(event)">
                <input type="text" id="diagnose" placeholder="Diagnose" required>
                <input type="text" id="prescription" placeholder="Prescription"required >
                <input type="text" id="medicalCondition" placeholder="MedicalCondition" required>
                <label for="patientStatus">STATUS</label>
                <select id="patientStatus" name="patientStatus" required>
 
    <option value="Confirmed">Confirmed</option>
    <option value="Canceled">Canceled</option>
</select>
                &nbsp;
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script>
    const userID = <?php echo $id; ?>; // Replace $id with your PHP user ID variable
    console.log(userID);

    function openModal() {
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    function submitForm(event) {
        event.preventDefault();

        const diagnose = document.getElementById('diagnose').value;
        const prescription = document.getElementById('prescription').value;
        const medicalCondition = document.getElementById('medicalCondition').value;
        const patientStatus = document.getElementById('patientStatus').value;

        fetch('http://localhost/TumagaHealthTrack/PhpFlow/MedicalCondition.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ userID, diagnose, prescription, medicalCondition, patientStatus }),
            
        })
        .then(response => {
            if (response.ok) {
                console.log('Data inserted successfully');
                location.reload(); // Reload the page after submission
            } else {
                console.error('Failed to insert data');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>