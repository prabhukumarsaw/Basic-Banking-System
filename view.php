<!-- header -->

<?php include("header.php")?>
<div class="container">
<h1><span>V</span>iew All Customer</h1>  
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
$selectquery = "select * from user";
$query = mysqli_query($conn,$selectquery);



while($res = mysqli_fetch_array($query)){
	?>
	
	 <tr>
            <td data-th="id"><?php echo $res['id']; ?></td>
                <td data-th="Name"><?php echo $res['name']; ?></td><!--column not in bold-->
                <td data-th="Email"><?php echo $res['email']; ?></td>
                <td data-th="Balance"><?php echo $res['balance']; ?></td>
            </tr>
			<?php
}

?> 
			
			
           
           
        </tbody>
       
</table>
</div>
</div>





<?php include("footer.php")?>