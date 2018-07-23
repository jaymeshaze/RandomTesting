<?php

$firstName = '';
$lastName = '';
$building = '';
$eventName = '';
$eventDescription = '';
$numAttendees = '';
$attendeeList = '';
$vendor = '';
$amount = '';

function clean_text($string)
{
//        $string = trim($string);
//        $string = stripslashes($string);
//        $string = htmlspecialchars($string);
          return $string;
}

if(isset($_POST["submit"]))
{
        $firstName = clean_text($_POST["firstName"]);
        $lastName = clean_text($_POST["lastName"]);
        $building = clean_text($_POST["building"]);
        $eventName = clean_text($_POST["eventName"]);
	$eventDescription = clean_text($_POST["eventDescription"]);
	$numAttendees = clean_text($_POST["numAttendees"]);
	$attendeeList = clean_text($_POST["attendeeList"]);
	$vendor = clean_text($_POST["vendor"]);
	$amount = clean_text($_POST["amount"]);

        $file_open = fopen("receipt_data.csv", "a");
        $no_rows = count(file("receipt_data.csv"));

//php script to upload image file to 'uploads' server folder

//	$img = $_FILES['file_uploaded']['name'];
//	$image_temp = $_FILES['file_uploaded']['tmp_name'];
//	if(move_uploaded_file($image_tmp, "uploads/" . $img)){
//		$fullpath = dirname(__FILE__) . '\\images\\' . $img;
//	}
//	else
//		echo 'Failed';


        if($no_rows > 1)
        {
                $no_rows = ($no_rows - 1) + 1;
        }

        $form_data = array(
                'sr_no'         	=>      $no_rows,
                'firstName'     	=>      $firstName,
                'lastName'         	=>      $lastName,
                'building'       	=>      $building,
                'eventName'       	=>      $eventName,
		'eventDescription'  	=>  	$eventDescription,
		'numAttendees'		=>	$numAttendees,
		'attendeeList'		=>	$attendeeList,
		'vendor'		=>	$vendor,
		'amount'		=>	$amount
        );

        fputcsv($file_open, $form_data);
        $firstName = '';
        $lastName = '';
        $building = '';
        $eventName = '';
	$eventDescription = '';
	$numAttendees = '';
	$attendeeList = '';
	$vendor = '';
	$amount = '';
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  
  <title>Receipt Submission</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Receipt Submission</a>
        </div>
      </div>
  </nav>
  
  <div class="container">

    <div class="box">
      <h2 class="text-left">Please complete the following form to submit a receipt</h2>
    </div>

    <div class="input-form">
      <form method="post" class="needs-validation">
        <div class="form-group">

          <label for="inputFirstName">First Name</label>
          <input type="text" name="firstName" class="form-control is-valid" id="inputFirstName" placeholder="First Name" value="<?php echo $firstName; ?>" required>

          <label for="inputLastName">Last Name</label>
          <input type="text" name="lastName" class="form-control is-valid" id="inputLastName" placeholder="Last Name" value="<?php echo $lastName; ?>" required>
          
          <label for="buildingSelect">Building</label>
          <select name="building" class="form-control is-valid" id="buildingSelect" value="<?php echo $building; ?>" required>
            <option>Acacia Hall</option>
            <option>Ironwood Hall</option>
            <option>Juniper Hall</option>
            <option>Willow Hall</option>
          </select>

          <label for="inputEventName">Event Name</label>
          <input type="text" name ="eventName" class="form-control is-valid" id="inputEventName" placeholder="Event Name" value="<?php echo $eventName; ?>" required>

          <label for="inputEventDescription">Event Description</label>
          <input type="text" name="eventDescription" class="form-control is-valid" id="inputEventDescription" placeholder="Event Description" value="<?php echo $eventDescription; ?>" required>

          <label for="inputAttendance">Number of Attendees</label>
          <input type="number" name="numAttendees" class="form-control is-valid" id="inputAttendance" placeholder="Number of Attendees" value="<?php echo $numAttendees; ?>" required>

          <label for="inputAttendees">List Attendees (if less than 10)</label>
          <input type="text" name="attendeeList" class="form-control is-valid" id="inputAttendees" placeholder="Name of Attendees" value="<?php echo $attendeeList; ?>">
          
          <label for="inputVendor">Vendor</label>
          <input type="text" name="vendor" class="form-control is-valid" id="inputVendor" placeholder="Vendor Name" value="<?php echo $vendor; ?>" required>

          <label for="inputAmount">Amount</label> 
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" name="amount" class="form-control is-valid" id="inputAmount" min="0" step="0.01" placeholder="$0.00" value="<?php echo $amount; ?>" required>
          </div>

          <label for="uploadReceipt">Upload Receipt</label> 
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose Receipt</label>
          </div>

        </div>
        <div class="">
          <button name="submit" class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer text-center">
    <h4>Created by Kris Hayes</h4>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>


