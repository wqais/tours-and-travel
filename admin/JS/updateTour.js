document.querySelector('#tour-id').addEventListener('change', updateTourDetails);

function updateTourDetails() {
    // Get the selected tour ID from the form
    var tour_id = document.getElementById('tour-id').value;
  
    // Create a new AJAX request
    var xhr = new XMLHttpRequest();
  
    // Set up the AJAX callback
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Parse the JSON response
        var tour_details = JSON.parse(xhr.responseText);
  
        // Update the HTML of the page with the tour details
        document.getElementById('tour-title').innerHTML = tour_details.tour_title;
        document.getElementById('tour_description').innerHTML = tour_details.tour_desc;
        // ...
      }
    }
  
    // Send the AJAX request to the PHP script
    xhr.open('GET', 'editTour.php?tour_id=' + tour_id +"&submit-btn=Edit Tour", true);
    xhr.send();
  }
  