document.addEventListener("DOMContentLoaded", function() {
    var loginSection = document.getElementById("loginSection");
    var loggedInSection = document.getElementById("loggedInSection");
    var usernameElement = document.getElementById("email");
    var logoutButton = document.getElementById("logoutButton");
  
    // Check if user is logged in by checking for the presence of the username session variable
    if (usernameElement.innerHTML.trim() !== "") {
      loginSection.style.display = "none";
      loggedInSection.style.display = "block";
    } else {
      loginSection.style.display = "block";
      loggedInSection.style.display = "none";
    }
  
    // Handle logout button click event
    logoutButton.addEventListener("click", function() {
      // Send an AJAX request to the logout.php file
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "logout.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE);}
      })
    })