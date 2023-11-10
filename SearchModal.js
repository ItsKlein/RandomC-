// Function to open the SearchModal
function openSearchModal() {
  var modal = document.getElementById('SearchModal');
  modal.style.display = 'block';
}

function closeSearchModal() {
  var modal = document.getElementById('SearchModal');
  modal.style.display = 'none';
}

document
  .getElementById('searchInput')
  .addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      var searchValue = e.target.value;
      console.log('Search value:', searchValue);

      fetch(
        'http://localhost/TumagaHealthTrack/Phpflow/Search.php?searchValue=' +
          searchValue
      )
        .then((response) => {
          if (!response.ok) {
            throw new Error('User not found');
          }
          return response.json();
        })
        .then((data) => {
          openSearchModal();
          const userDetails = document.getElementById('userDetails');
          userDetails.innerHTML = ''; // Clear previous content

          if (data.length === 0) {
            userDetails.innerHTML = '<p>User not found</p>';
          } else {
            let tableHTML = `
            <table class="user-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
          `;

            data.forEach((user) => {
              tableHTML += `
              <tr>
                <td class="user-cell">${user.id}</td>
                <td class="user-cell">${user.Name}</td>
                <td class="user-cell">${user.Date}</td>
                <td class="user-cell">${user.Time}</td>
                <td class="user-cell">${user.status}</td>
                <td class="user-cell">
                  <button class="edit-button" data-action="view" data-id="${user.id}">VIEW</button>
                </td>
              </tr>
            `;
            });

            tableHTML += `
              </tbody>
            </table>
          `;

            userDetails.innerHTML = tableHTML;
            attachEditButtonListeners(); // Call the function to attach event listeners after adding buttons
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          alert('User not found');
        });
    }
  });

function attachEditButtonListeners() {
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
              window.location.href =
                'http://localhost/TumagaHealthTrack/404.php';
            }
          })
          .catch((error) => {
            console.error('Fetch error:', error);
            window.location.href = 'http://localhost/TumagaHealthTrack/404.php';
          });
      }
    });
  });
}
