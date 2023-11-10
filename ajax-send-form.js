document.addEventListener('DOMContentLoaded', function () {
  const patientForm = document.getElementById('patientForm');
  const successMsg = document.querySelector('.success-msg');
  const submitButton = document.getElementById('submitButton');

  submitButton.addEventListener('click', function () {
    // Get form data
    const formData = new FormData(patientForm);

    // Send data to the server using AJAX
    fetch('http://localhost/TumagaHealthTrack/PhpFlow/Admit-Patience.php', {
      method: 'POST',
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (!data.success) {
          // Display success message
          window.location.href = 'error_page.php';
          location.reload();
        } else {
          // Redirect to an error page
          window.location.href = 'error_page.php';
          location.reload();
        }
      })
      .catch((error) => {
        //DISPLAY SUCCESS MESSAGE
        successMsg.style.display = 'block';
        patientForm.reset();
        location.reload();
      });
  });
});
