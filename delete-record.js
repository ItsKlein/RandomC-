// Add a click event listener to all delete buttons with the "delete-button" class
const deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach((button) => {
  button.addEventListener('click', function () {
    // Confirm the deletion with the user
    if (confirm('Are you sure you want to delete this record?')) {
      // Get the ID of the record to delete
      const recordId = this.getAttribute('data-id');

      // Make an AJAX request to the PHP script for deletion
      fetch('http://localhost/TumagaHealthTrack/PhpFlow/Delete.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${recordId}`, // Send the ID to be deleted
      })
        .then((response) => response.json()) // Assuming the PHP script responds with JSON
        .then((data) => {
          if (data.success) {
            alert('Record deleted successfully.');
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            alert('Failed to delete the record.');
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          alert('An error occurred during deletion.');
        });
    }
  });
});
