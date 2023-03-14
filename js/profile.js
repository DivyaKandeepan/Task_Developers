$(document).ready(function() {
	// Retrieve user session details from localstorage
	var user_id = localStorage.getItem("user_id");
	var email = localStorage.getItem("email");

	// Display user profile details in form
	$.ajax({
		url: "get_profile.php",
		type: "POST",
		data: {email: email},
		dataType: "json",
		success: function(data) {
			$("#name").val(data.name);
			$("#age").val(data.age);
			$("#dob").val(data.dob);
			$("#contact").val(data.contact);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(text)
		}
	})})