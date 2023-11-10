document.querySelectorAll('.send-button').forEach((button) => {
  button.addEventListener('click', function () {
    var userId = button.getAttribute('data-id'); // Get the user ID from the clicked button

    // Show SMS modal
    document.getElementById('SMSmodal').style.display = 'block';

    // Fetch contact number based on user ID
    fetchContact(userId);
    console.log(userId);
  });
});

document.addEventListener('click', function () {
  var contact = document.getElementById('contactDisplay').dataset.contactNumber; // Retrieve the stored contact
});

let contactFetched = ''; // Global variable to store the contact

function fetchContact(userId) {
  fetch('http://localhost/TumagaHealthTrack/PhpFlow/Sms-Endpoint.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ id: userId }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log('Contact fetched:', data.contact); // Log the retrieved contact number
      contactFetched = data.contact; // Storing the fetched contact in the global variable
      showContactInModal(data.contact);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

function showContactInModal(contact) {
  var contactElement = document.getElementById('contactDisplay');
  var contactInput = document.getElementById('contactInput');
  if (contactElement && contactInput) {
    contactElement.textContent = 'Contact Number: ' + contact;
    contactElement.dataset.contactNumber = contact;
    contactInput.value = contact; // Store the contact in the hidden input for form submission
  }
}

function closeSMSModal() {
  document.getElementById('SMSmodal').style.display = 'none';
}
