const editButtons = document.querySelectorAll('.edit-button');

editButtons.forEach(function (button) {
  button.addEventListener('click', function () {
    const id = button.getAttribute('data-id');

    if (!id || isNaN(id)) {
      window.location.href = 'http://localhost/TumagaHealthTrack/404.php';
    } else {
      fetch(
        'http://localhost/TumagaHealthTrack/PhpFlow/Fetch-User-Data.php?id=' +
          id
      )
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error('Network response was not ok.');
          }
        })
        .then((data) => {
          if (data && !data.error) {
            const profileURL =
              'http://localhost/TumagaHealthTrack/Profile.php?id=' + data.id;
            window.location.href = profileURL;
          } else {
            console.error('Error in user data:', data.error);
            window.location.href = 'http://localhost/TumagaHealthTrack/404.php';
          }
        })
        .catch((error) => {
          console.error('Fetch error:', error);
          window.location.href = 'http://localhost/TumagaHealthTrack/404.php';
        });
    }
  });
});
