<?php
include('../header.html');
?>

<?php
        $page = 'community';
		 require '../../../dbConnect.inc';  
		$sql = "SELECT content FROM project2 where page='$page'";
		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			//output the data for each row
			while ($row = $result->FETCH_ASSOC()) {
				echo $row['content'];
			}
		}else{
			echo "0 results";
		}
?>


	<?php
        $page = 'community';
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
    include('../footer.html');
?>

