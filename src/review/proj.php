 <?php
$visitor = $_GET['visitor'];
$group = $_GET['group'];
$visitDate = $_GET['visitDate'];
$rating = $_GET['rating'];
$favePlace = $_GET['fplace'];
$email = $_GET['email'];

$destination_email = strval($email);
$email_body = "Vistor name: $visitor\n";
$email_body .= "Group number: $group\n";
$email_body .= "Rating:  $rating\n";
$email_body .= "Favorite Place:  $favePlace\n";
$email_body .= "Date:  $visitDate\n";



$email_subject = "( 2191 iSchoool Bloomfiled,NJ-Thimothee)";
mail($destination_email,$email_subject,$email_body);
echo "\n\n DATA SENT";
?>
<!DOCTYPE html>
<html lang = "en">
<!-- THANK YOU GRAPHIC--> 
    <head>
        <title> Thank you</title>
        <link rel="stylesheet" type="text/css" href = "style.css">
        <meta charset="utf-8">
    </head>
    <body id = "phpReview">
        
         <div id = "videoPhp">
            <video autoplay muted loop id = "townVideo">
                <source src = "video/bloomfieldVid.mp4" type="video/mp4">
            </video>
        </div>
        
        <div id = "thankYou">
            <p>
            Thank you very much for taking this form. <br>Please come visit Bloomfiled again!
            </p>
        </div>
    </body>
</html>
 
