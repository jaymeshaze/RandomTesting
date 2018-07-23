<?php

$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	$name = clean_text($_POST["name"]);
	$email = clean_text($_POST["email"]);
	$subject = clean_text($_POST["subject"]);
	$message = clean_text($_POST["message"]);
	
	$file_open = fopen("contact_data.csv", "a");
	$no_rows = count(file("contact_data.csv"));

	if($no_rows > 1)
	{
		$no_rows = ($no_rows - 1) + 1;
	}

	$form_data = array(
		'sr_no'		=>	$no_rows,
		'name'		=>	$name,
		'email'		=>	$email,
		'subject'	=>	$subject,
		'message'	=>	$message
	);

	fputcsv($file_open, $form_data);
	$name = '';
	$email = '';
	$subject = '';
	$message = '';
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>How to Store Form data in CSV File using PHP</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">How to Store Form data in CSV File using PHP</h2>
			<br />
			<div class="col-md-6" style="margin:0 auto; float:none;">
				<form method="post">
					<h3 align="center">Contact Form</h3>
					<br />
					<div class="form-group">
						<label>Enter Name</label>
						<input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
					</div>
					<div class="form-group">
						<label>Enter Email</label>
						<input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
					</div>
					<div class="form-group">
						<label>Enter Subject</label>
						<input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
					</div>
					<div class="form-group">
						<label>Enter Message</label>
						<textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
					</div>
					<div class="form-group" align="center">
						<input type="submit" name="submit" class="btn btn-info" value="Submit" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
