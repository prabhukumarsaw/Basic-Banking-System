
<?php
	include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $showquery = "SELECT * from user where id=$from";
    $query = mysqli_query($conn, $showquery);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $showquery = "SELECT * from user where id=$to";
    $query = mysqli_query($conn, $showquery);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $showquery = "UPDATE user set balance=$newbalance where id=$from";
        mysqli_query($conn, $showquery);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $showquery = "UPDATE user set balance=$newbalance where id=$to";
        mysqli_query($conn, $showquery);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $showquery = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $showquery);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>




<?php include("header.php")?>

<style>
	select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
		border-radius: .3em;
   border: 1px solid gray;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
 
  background-image: none;
}
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
/* Custom Select */
.select {
  position: relative;
  display: flex;
  width: 20em;
  height: 3em;
  line-height: 3;
  background: ;
  overflow: hidden;
  border-radius: .25em;
}
select {
  flex: 1;
  padding: 0 .5em;
  color: #000;
  cursor: pointer;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  padding: 0 1em;
  background: ;
  cursor: pointer;
  pointer-events: none;
  -webkit-transition: .25s all ease;
  -o-transition: .25s all ease;
  transition: .25s all ease;
}
/* Transition */
.select:hover::after {
  color: black;
}
</style>



<section class="contact-section">
	<h1><span>T</span>ransction</h1>

<div style="overflow-x:auto;">
<table id="customers">
        <thead><!--heading -->
            <tr><!--for row-->
            <th>Serial No.</th>
                <th>Name</th><!--column in bold-->
                <th>Email Id</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody><!--body of table-->
		<?php
      include 'config.php';
		$ids = $_GET['id'];
	$showquery = "SELECT * FROM user where id={$ids}";
	$showdata = mysqli_query($conn,$showquery);
	if(!$showdata){
    echo "Error : " . $showquery  . "<br>" . mysqli_error($conn);
        
	}
	
	  $res = mysqli_fetch_assoc($showdata);
	?>
			
	
	 <tr>
            <td data-th="id"><?php echo $res['id'] ?></td>
                <td data-th="Name" value=""><?php echo $res['name']; ?></td><!--column not in bold-->
                <td data-th="Email"><?php echo $res['email'] ?></td>
                <td data-th="Balance"><?php echo $res['balance'] ?></td>
            </tr>
			<?php
	

?>
	
			
			
           
           
        </tbody>
       
</table>
</div>
	<br>
	<br>
	
	   <div class="container">
            <div class="contact">
                

                <form action="" method="post" >
                    <label for="name">AMOUNT</label>
                    <input type="number" placeholder="Enter Amount" id="name" name="amount" required>

                    <label for="message">TRANSFER TO</label>
                   <div class="select">
  <select name="to" id="slct" required>
 
    <option value="" disabled selected>Choose</option>
    
	       <?php
              include 'config.php'; 
   $ids = $_GET['id'];
                $showquery = "SELECT * FROM user where id!=$ids";
                $showdata = mysqli_query($conn, $showquery);
                if (!$showdata) {
                    echo "Error " . $showquery . "<br>" . mysqli_error($conn);
                }

while($res = mysqli_fetch_assoc($showdata)){
	?>
                    <option  value=" <?php echo $res['id']; ?>">

                        <?php echo $res['name']; ?> (Balance:
                        <?php echo $res['balance']; ?> )

                    </option>
                <?php
                }
                ?>
  </select>
</div><br>
                    <input type="submit" name="submit" class="send-message-cta" value="TRANSFER">
                </form>
            </div>
           
			

</div>
			
		
    </section>


    
    <?php include("footer.php")?>

