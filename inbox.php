<?php
    require('../TumagaHealthTrack/config.php'); // Adjust the path as needed
    include(CONNECTION_PATH); // Assuming CONNECTION is defined in your config.php
    require ('../TumagaHealthTrack/PhpFlow/Session-Token.php');
?>

<!DOCTYPE html>
<html lang="en" class="light">

  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <title>CodePen - Products Dashboard UI</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link rel="stylesheet" href="../TumagaHealthTrack/Css/style.css" />
    <link rel="stylesheet" href="../TumagaHealthTrack/Css/modal-profile.css" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/draggabilly/2.3.0/draggabilly.pkgd.min.js"></script>

  </head>
  <style>
    .edit-button {
  background-color: indigo;
  color: white;
  border: none;
  padding: 4px 8px;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
  margin: 4px;
}

.send-button {
  background-color: green;
  color: white;
  border: none;
  padding: 4px 8px;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
  margin: 4px;
}

.view-button {
  background-color: darkcyan;
  color: white;
  border: none;
  padding: 4px 8px;
  border-radius: 4px;
  cursor: pointer;
  width: 60px;
  margin: 5px;
}

.delete-button {
  background-color: red;
  color: white;
  border: none;
  padding: 4px 8px;
  border-radius: 4px;
  cursor: pointer;
}

@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

.info-msg,
.success-msg,
.warning-msg,
.error-msg {
  margin: 10px 0;
  padding: 10px;
  border-radius: 3px 3px 3px 3px;
}
.info-msg {
  color: #059;
  background-color: #BEF;
}
.success-msg {
  color: #270;
  background-color: #DFF2BF;
}
.warning-msg {
  color: #9F6000;
  background-color: #FEEFB3;
}
.error-msg {
  color: #D8000C;
  background-color: #FFBABA;
}

/* Just for CodePen styling - don't include if you copy paste */
html {
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
  font-weight: 300;

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

  </style>

  
  <body>
    <!-- partial:index.partial.html -->
    <div class="app-container">
      <div class="sidebar">
        <div class="sidebar-header">
          <div class="app-icon">
            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
              <path
                fill="currentColor"
                d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z"
              />
            </svg>
          </div>
        </div>
        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="http://localhost/TumagaHealthTrack/main-dashboard.php">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-home"
              >
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
              <span >Home</span>
              
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="http://localhost/TumagaHealthTrack/Patient-Record.php">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-shopping-bag"
              >
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
              </svg>
              <span>Patient <br />Schedule <br />Record</span>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="http://localhost/TumagaHealthTrack/Parents-Children.php">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-pie-chart"
              >
                <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
                <path d="M22 12A10 10 0 0 0 12 2v10z" />
              </svg>
              <span>Immunization</span>
            </a>
          </li>
       
          <li class="sidebar-list-item active">
            <a href="http://localhost/TumagaHealthTrack/inbox.php">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-inbox"
              >
                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
                <path
                  d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"
                />
              </svg>
              <span>Inbox</span>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="http://localhost/TumagaHealthTrack/Resident-Record.php">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-shopping-bag"
              >
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
              </svg>
                <span
                  >Resident <br />
                  Record</span
              >
            </a>
          </li>
        </ul>
        <div class="account-info">
          <div class="account-info-picture">
            <img
              src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
              alt="Account"
            />
          </div>
          <div class="account-info-name"><?php echo "MidWife";  ?></div>
          <button class="account-info-more">
           
        </div>
        <div style="background-color: white; padding: 10px; text-align: center;">
  <a href="http://localhost/TumagaHealthTrack/PhpFlow/Session-Logout.php" style="text-decoration: none; color: black;">Logout</a>
</div>
      </div>
      <div class="app-content">
        <div class="app-content-header">
          <h1 class="app-content-headerText">
            Healthcare Profiling System of Barangay Tumaga Residence
          </h1>
          <button class="mode-switch" title="Switch Theme">
            <svg
              class="moon"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>


<!--- FOR FUTHER USE --->

        </div>
        <div class="app-content-actions">
        
  
          <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
            <button class="action-button filter jsFilter" style="display: none;"></button>

                <span hidden>Filter</span
                ><svg hidden
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-filter"
                >
                  <polygon
                    points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"
                  />
                </svg>
              </button>
              <div class="filter-menu">
                <label>Category</label>
                <select>
                  <option>ZONE-1</option>
                  <option>ZONE-2</option>
                  <option>ZONE-3</option>
                  <option>ZONE-4</option>
                  <option>ZONE-5</option>
                  <option>ZONE-6</option>
                </select>
                <label>Status</label>
                <select>
                  <option>All Status</option>
                  <option>Active</option>
                  <option>Disabled</option>
                </select>
                <div class="filter-menu-buttons">
                  <button class="filter-button reset">Reset</button>
                  <button class="filter-button apply">Apply</button>
                </div>
              </div>
            </div>
            <button class="action-button list active" title="List View">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-list"
              >
                <line x1="8" y1="6" x2="21" y2="6" />
                <line x1="8" y1="12" x2="21" y2="12" />
                <line x1="8" y1="18" x2="21" y2="18" />
                <line x1="3" y1="6" x2="3.01" y2="6" />
                <line x1="3" y1="12" x2="3.01" y2="12" />
                <line x1="3" y1="18" x2="3.01" y2="18" />
              </svg>
            </button>
            <button class="action-button grid" title="Grid View">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-grid"
              >
              
                <rect x="3" y="3" width="7" height="7" />
                <rect x="14" y="3" width="7" height="7" />
                <rect x="14" y="14" width="7" height="7" />
                <rect x="3" y="14" width="7" height="7" />
              </svg>
            </button>
          </div>
        </div>
        <div class="products-area-wrapper tableView">
        <?php
$sql = "SELECT * FROM healthtrack WHERE status = 'Confirmed'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Output data in an HTML table
    echo '<table style="width: 100%;">';
    echo '<thead>';
    echo '<tr class="products-header">';
    echo '<th class="product-cell image">Name</th>';
    echo '<th class="product-cell category">Date</th>';
    echo '<th class="product-cell status-cell">Time</th>';
    echo '<th class="product-cell sales">Status</th>';
    
    echo '<th class="product-cell price">Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
      $originalTime = $row['Time'];
      $formattedTime = date("h:i A", strtotime($originalTime));
        echo '<tr class="products-row">';
     
        echo '<td class="product-cell category">' . $row['Name'] . '</td>';
        echo '<td class="product-cell status-cell">' . $row['Date'] . '</td>';
        echo '<td class="product-cell status-cell">' . $formattedTime . '</td>';
        echo '<td class="product-cell status-cell">' . $row['status'] . '</td>';
      
     
        echo '<td class="product-cell price">';
        
        // Include the ID in the data attributes of the buttons
        echo '<button class="send-button" data-action="send" data-id="' . $row['id'] . '">MESSAGE</button>';

      
        
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No records found.";
}
?>
<div class="SMSmodal" id="SMSmodal">
    <div class="modal-content">
        <span class="close" onclick="closeSMSModal()">&times;</span>
        <h2>Send Message</h2>
        <br>
        <div id="contactDisplay" data-contact-number=""></div>
        <br>
        <form id="messageForm" action="http://localhost/TumagaHealthTrack/PhpFlow/Sms.php" method="POST">
            <textarea id="messageContent" name="message" placeholder="Enter your message"></textarea>
            <input type="hidden" id="contactInput" name="contact" value="">
            <button type="submit" class="send-buttons" name="submit" >Send</button>
        </form>
    </div>
</div>






<script src="../TumagaHealthTrack/Js/Sms.js"></script>
    <script src="../TumagaHealthTrack/Js/Redirect-Profile.js"></script>
    <script src="../TumagaHealthTrack/Js/delete-record.js"></script>
    <script src="../TumagaHealthTrack/Js/script.js"></script>
  </body>
</html>
