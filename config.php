<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "sawraj_bank";

$conn = mysqli_connect($server,$username,$password,$db);

if($conn){
	//echo "connecton successful";
	?>
	<script>
		alert('connection successful')
		
		</script>
<?php
}else{
	//echo "no connection";
	die("no connection". mysqli_connect_error());
}


?>