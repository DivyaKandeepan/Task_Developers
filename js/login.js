$(document).ready(function() {
	$('#login-form').submit(function(event) {
		event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "login.php",
			data: form_data,
			success: function(response) {
				localStorage.setItem("user", response);
				window.location.href = "profile.html";
			},
			error: function() {
				alert("Invalid email or password!");
			}
		});
	});
});
