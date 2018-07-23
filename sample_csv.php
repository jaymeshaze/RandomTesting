<?php
if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    //if no errors carry on
    if(!isset($error)){

        # Title of the CSV
        $Content = "Name, Email\n";

        //set the data of the CSV
        $Content .= "$name, $email\n";

        # set the file name and create CSV file
        $FileName = "formdata.csv";
        header('Content-Type: application/csv'); 
        header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
        echo $Content;
        exit();
    }
}
?>

<form action='' method='post'>
<p><label>Name</label><br><input type='text' name='name' value=''></p> 
<p><label>Email</label><br><input type='text' name='email' value=''></p> 
<p><input type='submit' name='submit' value='Submit'></p> 
</form>
