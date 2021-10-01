
<?php

    require('../header.html');

?>   
<?php
        $page = 'comments';
		 require '../../../dbConnect.inc';  
		$sql = "SELECT internalCSS FROM project2 where page='$page'";
		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			//output the data for each row
			while ($row = $result->FETCH_ASSOC()) {
				echo $row['internalCSS'];
			}
		}else{
			echo "0 results";
		}
	?>   


<?php

function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
        // Updated Friday November 15	
	$pagename = "Forum";
	require '../../../dbConnect.inc';

	// If we can use mysqli
	if ($mysqli) {
		// If both fields are set
	  if (isset($_POST['name']) && isset($_POST['comment'])) {
	

                 $name = $_POST['name'];
				$comment = $_POST['comment'];

				// Preparing the statment
                $stmt=$mysqli->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
				$stmt->bind_param("ss", $name,$comment);
          
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $name = test_input($_POST["name"]);
                  $comment = test_input($_POST["comment"]);
                }
				$stmt->execute(); 
                $stmt->close();
			} //end of if using isset
			
	  //get contents of table and send back...
	  $res=$mysqli->query('select name, comment from comments');
	  if($res){
		while($rowHolder = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			$records[] = $rowHolder;
		}//end the while loo
      }// end of if
     }//end of if $mysqli   
	


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
   <!-- Fonts from Adobe -->
	<link rel="stylesheet" href="https://use.typekit.net/hot3zdy.css">
	
	<link rel="stylesheet" href="ex8.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
	<script>
        
    function validate(object) {
    isvalid = false;
    // Getting the element and checking if it's empty
    if (document.getElementById(object).value == "") {
        // Styling the object's box to display error
        document.getElementById(object).style.borderColor = "red";
        document.getElementById(object).style.backgroundColor = 'pink';
        isvalid = false;
    } else {
        // The object validated
        document.getElementById(object).style = null;
        isvalid = true;
    }

    return isvalid;

}
    function validateForm() {
    nameValid = validate("name");
    commentValid = validate("comment");
    return (nameValid && commentValid);
} 
    
    </script>
		
</head>
<body>
	<div id="formContainer">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form" onsubmit="return validateForm();">	
			<div class="FormHeader">
				<h3 >Comment Form</h3>
			</div>
				
			<input type="text" id="name" name="name" placeholder="Name">	
			<input type="text" id="comment" name="comment" placeholder="Comment">

			<div id="formButton">
				<input class="button" type="submit" value="Comment" />
			</div>
			<!-- End of formButton-->
		</form>
	</div>

	<div id="commentBox">
			<div class="FormHeader">
				<h3>Comments</h3>
			</div>
		<?php
			if (mysqli_num_rows($res) > 0) {
			 //var_dump($records);
		         foreach($records as $this_row){
			  echo '<li>'.$this_row['name'] . " " . $this_row['comment'].'</li>' . "<br>"; 
			}//end of foreach loop
	

			}// End of IF rows are selected
			else {
				echo "<h3>No Comments to display</h3>";
			}	
		?>
		
  </div> <!-- end of div of commentBox  -->
		
		


</body>
</html>

<?php

    require('../footer.html');

?>