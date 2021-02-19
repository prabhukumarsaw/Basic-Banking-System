<?php include("header.php")?>


<section class="contact-section">
        <div class="container">
            <div class="contact">
                <h2>Pay Money</h2>

                <form action="" method="POST">
                    <label for="name">Name</label>
                    <input type="text" placeholder="NAME" id="name" name="user">

                    <label for="Email">Email</label>
                    <input  placeholder="EMAIL" type="email" name="email" required>

                    <label for="message">Balance</label>
                    <input  placeholder="BALANCE" type="number" name="balance" required>

                    <input type="submit" name="submit" class="send-message-cta" value="Submit">
                </form>
            </div>
           

        </div>
    </section>

<?php
if(isset($_POST['submit'])){
	$name = $_POST['user'];
	$email = $_POST['email'];
	$balance = $_POST['balance'];
	
	$insertquery = "insert into user(name,email,balance) values('$name','$email','$balance')";
	
	$res = mysqli_query($conn,$insertquery);
	if($res){
		?> <script>
				alert("inserted");
			</script>
<?php
		
	}else{
		?>
 <script>
				alert(" not inserted");
			</script>
<?php

	}
}

?>

    
    <?php include("footer.php")?>