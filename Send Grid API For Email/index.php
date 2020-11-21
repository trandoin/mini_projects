


 <!DOCTYPE html>
 <html>
 <head>
     <title>Send Grid</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>
 <body>
 
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="nameu" class="form-control">
            <label for="email">Email</label>
            <input type="email" id="email" name="emailu" class="form-control">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subjectu" class="form-control">
            <label for="message">Message</label>
            <input type="text" id="message" name="messageu" class="form-control mb-3">
            <input type="submit" name="Submit" class="btn btn-primary btn-block">
        </form>
    </div>
    </div>
</div>




 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html>



 <?php 

require 'vendor/autoload.php';
$API_KEY = "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";

if (isset($_POST["Submit"])) {
    
    $Name = $_POST["nameu"];
    $Email_id = $_POST["emailu"];
    $Subject = $_POST["subjectu"];
    $Message = $_POST["messageu"];


$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("govindsuman118@gmail.com", "Funda of Web ID");
$email->setSubject($Subject);
$email->addTo($Email_id, $Name);
$email->addContent("text/plain", $Message);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid($API_KEY);

if ($sendgrid->send($email));
 {
    
    echo "Email sent successfully";
}

// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }
}
 ?>