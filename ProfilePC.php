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
    $sql = "SELECT * FROM parent WHERE  id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Initialize an empty array to store user data
        $users = array();
    
        while ($user = mysqli_fetch_assoc($result)) {
            // Store each user's data as an array inside the $users array
            $users[] = array(
                'id' => htmlspecialchars($user['id']),
                'firstname' => htmlspecialchars($user['firstname']),
                'lastname' => htmlspecialchars($user['lastname']),
                'middlename' => htmlspecialchars($user['middlename']),
                'address' => htmlspecialchars($user['address']),
                'birthday' => htmlspecialchars($user['birthday']),
                'contactno' => htmlspecialchars($user['contactno']),
                'Date' => htmlspecialchars($user['Date']),
                'time' => htmlspecialchars($user['time'])
                
                // Add more fields as needed
            );
        }
    
        // If you want to display this array directly, you could use var_dump($users) to view it
    
        // Create HTML content based on $users data
        $userInformationHTML = '';
        foreach ($users as $user) {
            $userInformationHTML .= "ID: " . $user['id'] . "<br>";
            $userInformationHTML .= "Firstname: " . $user['firstname'] . "<br>";
            $userInformationHTML .= "Lastname: " . $user['lastname'] . "<br>";
            $userInformationHTML .= "Middlename: : " . $user['middlename'] . "<br>";
            $userInformationHTML .= "Adress: " . $user['address'] . "<br>";
            $userInformationHTML .= "Birthday: " . $user['birthday'] . "<br>";
            $userInformationHTML .= "Contact#: " . $user['contactno'] . "<br>";
            $userInformationHTML .= "Date: " . $user['Date'] . "<br>";
            $userInformationHTML .= "Time: " . $user['time'] . "<br>";
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
    $sql = "SELECT * FROM parent WHERE  id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Initialize an empty array to store user data
        $users = array();
    
        while ($user = mysqli_fetch_assoc($result)) {
            // Store each user's data as an array inside the $users array
            $users[] = array(
                'id' => htmlspecialchars($user['id']),
                'firstname' => htmlspecialchars($user['firstname']),
                'lastname' => htmlspecialchars($user['lastname']),
                'middlename' => htmlspecialchars($user['middlename']),
                'address' => htmlspecialchars($user['address']),
                'birthday' => htmlspecialchars($user['birthday']),
                'contactno' => htmlspecialchars($user['contactno']),
                'Date' => htmlspecialchars($user['Date']),
                'time' => htmlspecialchars($user['time'])
                
                // Add more fields as needed
            );
        }
    
        // If you want to display this array directly, you could use var_dump($users) to view it
    
        // Create HTML content based on $users data
        $userInformationHTML = '';
        foreach ($users as $user) {
            $userInformationHTML .= "ID: " . $user['id'] . "<br>";
            $userInformationHTML .= "Firstname: " . $user['firstname'] . "<br>";
            $userInformationHTML .= "Lastname: " . $user['lastname'] . "<br>";
            $userInformationHTML .= "Middlename: : " . $user['middlename'] . "<br>";
            $userInformationHTML .= "Adress: " . $user['address'] . "<br>";
            $userInformationHTML .= "Birthday: " . $user['birthday'] . "<br>";
            $userInformationHTML .= "Contact#: " . $user['contactno'] . "<br>";
            $userInformationHTML .= "Date: " . $user['Date'] . "<br>";
            $userInformationHTML .= "Time: " . $user['time'] . "<br>";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    body{
    margin-top:20px;
    background:#f5f7fa;
    
}
.panel.panel-default {
    border-top-width: 3px;
}
.panel {
    box-shadow: 0 3px 1px -2px rgba(0,0,0,.14),0 2px 2px 0 rgba(0,0,0,.098),0 1px 5px 0 rgba(0,0,0,.084);
    border: 0;
    border-radius: 4px;
    margin-bottom: 16px;
}
.thumb96 {
    width: 96px!important;
    height: 96px!important;
}
.thumb48 {
    width: 48px!important;
    height: 48px!important;
}

.h4 {
    background-color: lightcoral;
    color: white;
    height: 60px;
    margin-bottom: 50px;    
}

.Form{
    background-color: lightblue;
    width: 100%;
    border-radius: 5px;
}


.media {
    border-spacing: 12px;
    flex-direction: column;

}
.panel-title {
    background-color: lightcoral;
    color: white;
}

.btn-primary {
 background-color: lightcoral;
 color: white;
 border-color: white;
}

/* Style for the SMS modal */
/* Style for the SMS modal */
.SMSmodal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.SMSmodal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

/* Modal content */
.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* Close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Style for the send message button */
.send-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #337ab7;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

.send-button:hover {
    background-color: #286090;
}

/* Style for the input box */
input[type="text"],
input[type="text"]:focus,
textarea,
textarea:focus {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

/* Adjust the appearance of the text inside the input and textarea */
textarea,
input[type="text"] {
    font-family: 'Arial', sans-serif;
}

.send-buttons {
    display: inline-block;
    padding: 10px 20px;
    background-color: #337ab7;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

.send-buttons:hover {
    background-color: #286090;
}

h1 {
    background-color: lightcoral;
    color: white;
}
</style>
<body>
<div class="container bootstrap snippets bootdey">
<div class="row ng-scope">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <br>
                <div class="pv-lg"><img class="center-block img-responsive img-circle img-thumbnail thumb96" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Contact"></div>
                <h3 class="m0 text-bold"></h3>
                <div class="mv-lg">
                    <p>ID: <?php echo $user['id']; ?></p>
                    <button class="send-button" data-action="send" data-id="<?php echo $id ?>">MESSAGE</button>




                    <!-------------------------SMS MODAL SEPERATE PHP PROCCESS---------------------------->
                    <div class="SMSmodal" id="SMSmodal">
    <div class="modal-content">
        <span class="close" onclick="closeSMSModal()">&times;</span>
        <h2>Send Message</h2>
        <br>
        
        <div id="contactDisplay" label="Number">Contact# </div>
        <?php echo '<p>' . $user['contactno'] . '</p>' ?>
        <br>
        <form id="messageForm" action="http://localhost/TumagaHealthTrack/PhpFlow/Sms-Profile.php" method="POST">
            <textarea id="messageContent" name="message" placeholder="Enter your message"></textarea>
            <input type = "text" name = "contact" value = "<?php echo $user['contactno']; ?>"  hidden>
            <button type="submit" class="send-buttons" name="submit" >Send</button>
        </form>
    </div>
</div>


                </div>

                <br>
            </div>
        </div>
        <?php
// Include your database connection code here

// Initialize the HTML variable to store the content
$htmlContent = '<div class="panel panel-default hidden-xs hidden-sm">';
$htmlContent .= '<div class="panel-heading">';
$htmlContent .= '<div class="panel-title text-center">Children</div>';
$htmlContent .= '</div>';
$htmlContent .= '<div class="panel-body">';


// Check if the ID is provided in the request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize the user ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Retrieve children information (only first name and last name) based on the parent_id
    $sql = "SELECT * FROM children WHERE parent_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch and add the children's first name and last name to the HTML content
        while ($row = mysqli_fetch_assoc($result)) {
            
            $htmlContent .= '<div class="media">';
            $htmlContent .= '<div class="media-left media-middle">';
            $htmlContent .= '<a href="#"><img class="media-object img-circle img-thumbnail thumb48" src="https://www.shareicon.net/data/512x512/2016/06/25/786530_people_512x512.png" alt="Contact"></a>';
            $htmlContent .= '</div>';
            $htmlContent .= '<div class="media-body pt-sm">';      
            $htmlContent .= '<div class="text-bold"> Name: ' . $row['cfirstname'] . '<br> LastName: ' . $row['clastname'] . '<br> MiddleName: ' .$row['cmiddlename']  .'<br> Birthday: '.$row['cbirthday'] .'<br> Gender: '. $row['cgender'];
            $htmlContent .= '</div>';
            $htmlContent .= '</div>';
            $htmlContent .= '</div>';
        }
    } else {
        // If there are no matching records, handle this scenario
        $htmlContent .= "No matching records found.";
    }
} else {
    // No ID provided, handle accordingly (redirect, display an error message, etc.)
    $htmlContent .= "No ID provided.";
}

$htmlContent .= '</div>';
$htmlContent .= '</div>';

// Echo the HTML content
echo $htmlContent;
?>


    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-right">
                    
                                 
                     </ul>
                    </div>
                </div>
                

                   
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
                                <label class="small mb-1" for="inputFirstName">NAME</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['firstname']
 ?></h5></label>
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">MIDDLENAME</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['middlename']
 ?></h5></label>
 
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">LASTNAME</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['lastname']
 ?></h5></label>
 
                            </div>

                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">ADRESS</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['address']
 ?></h5></label>
                            </div>
                        </div>
                        <!-- Form Row  -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Birthday)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">BIRTHDAY</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['birthday']
 ?></h5></label>
                            </div>
                            <!-- Form Group (Contact)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">CONTACT#</label>
                                <br>
                                <label class="small mb-1" for="inputFirstName"><h5><?php echo $user['contactno']
 ?></h5></label>
                            </div>
                        </div>
                    <!-- ADD MORE COLUMNS-->
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../TumagaHealthTrack/Js/Sms.js"></script>
    <script src="../TumagaHealthTrack/Js/Redirect-Profile.js"></script>
    <script src="../TumagaHealthTrack/Js/delete-record.js"></script>

</body>
</html>