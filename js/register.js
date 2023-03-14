$(document).ready(function() {
	// Handle form submission using AJAX
	$("form").submit(function(event) {
	  event.preventDefault();
	  $.ajax({
		type: "POST",
		url: "register.php",
		data: $(this).serialize(),
		success: function(response) {
		  alert(response);
		},
		error: function(xhr, status, error) {
		  alert("Registration failed: " + error);
		}
	  });
	});
  });
  