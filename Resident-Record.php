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

/* MODAL SEARCH BAR  */
/* Style for the search-modal */
.modal.search-modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    width: 80%; /* Adjust the width as needed */
    max-width: 600px; /* Set a maximum width */
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    overflow-y: auto; /* Enable vertical scrolling if content exceeds the modal height */
}

/* Style for individual search results */
.search-result {
    border: 1px solid #eee;
    background-color: #f9f9f9;
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style for specific paragraphs within the results */
.search-result p {
    margin: 8px 0;
    color: #333;
    font-size: 16px;
    line-height: 1.5;
}

/* Style for the 'Close' button */
.modal.search-modal .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.modal.search-modal .close:hover,
.modal.search-modal .close:focus {
    color: black;
    text-decoration: none;
}

.user-table {
  border-collapse: collapse;
  width: 100%;
}

.user-table th,
.user-table td {
  padding: 8px;
  text-align: left;
}

.user-cell {
  padding: 12px; /* Adjust the padding to create more space */
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
          <li class="sidebar-list-item">
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
      
            
          <li class="sidebar-list-item active">
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
              
            </svg>
          </button>


<!--- SEARCH MODAL!! --->

        </div>
        <div class="app-content-actions">
        <input class="search-bar" id="searchInput" placeholder="Search..." type="text" hidden/>
        <div class="modal search-modal" id="SearchModal">
    <div class="modal-content">
        <span class="close" onclick="closeSearchModal()">&times;</span>
         <div id="userDetails"></div>
        
    </div>
</div>

          
          <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
            <button class="action-button filter jsFilter" style="display: none;"></button>
            
                <svg hidden
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
        <style>
    .label-box-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: minmax(100px, auto);
        gap: 20px;
        padding: 20px;
        background-color: #f0f0f0;
    }

    .label-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Adding transform to the transition */
    }

    .label-box h3 {
        font-size: 24px;
        margin-bottom: 10px;
        color: white;
    }

    .label-box p {
        color: white;
    }

    .indigo {
        background-color: rgba(63, 81, 181, 0.7); /* Indigo with some transparency */
        border: 1px solid rgba(63, 81, 181, 1); /* Adjust the alpha for the border color */
        color: #fff; /* Text color for the indigo box */
    }

    .label-box:not(.indigo):hover {
        background-color: rgba(255, 0, 0, 0.7); /* Change to red on hover - modify as desired */
        color: #fff; /* Text color on hover for non-indigo boxes */
        transform: scale(1.1); /* Zoom effect on hover for non-indigo boxes */
    }

    .label-box.indigo:hover {
        background-color: rgba(63, 81, 181, 0.9); /* Lighter indigo on hover */
        transform: scale(1.1); /* Zoom effect on hover for indigo box */
    }

    a {
            text-decoration: none;
            color: #333;
        }
</style>


<div class="label-box-container">
        <a href="http://localhost/TumagaHealthTrack/Zone/Zone-1.php">
            <div class="label-box">
                <h3>PUROK 1</h3>
                
            </div>
        </a>
        <a href="http://localhost/TumagaHealthTrack/Zone/Zone-2.php">
            <div class="label-box">
                <h3>PUROK 2</h3>
                
            </div>
        </a>
        <a href="http://localhost/TumagaHealthTrack/Zone/Zone-3.php">
            <div class="label-box">
                <h3>PUROK 3</h3>
                
            </div>
        </a>
        <a href="http://localhost/TumagaHealthTrack/Zone/Zone-4.php">
            <div class="label-box">
                <h3>PUROK 4</h3>
                
            </div>
        </a>
        <a href="http://localhost/TumagaHealthTrack/Zone/Zone-5.php">
            <div class="label-box">
                <h3>PUROK 5</h3>
               
            </div>
        </a>
        <a href="http://localhost/TumagaHealthTrack/Zone/Zone-6.php">
            <div class="label-box">
                <h3>PUROK 6</h3>
               
            </div>
        </a>
    </div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const labelBoxes = document.querySelectorAll('.label-box:not(.indigo)');

        labelBoxes.forEach(box => {
            const randomColor = getRandomColor();
            box.style.backgroundColor = randomColor;
        });

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    });
</script>

    <!-- partial -->
    <script src="../TumagaHealthTrack/Js/Redirect-Profile.js"></script>
    <script src="../TumagaHealthTrack/Js/delete-record.js"></script>
   
    <script src="../TumagaHealthTrack/Js/SearchModal.js"></script>
  </body>
</html>
