<!-- header -->

<?php include("header.php")?>
<div class="container">
<h1><span>H</span>istory</h1>  
<div style="overflow-x:auto;">
<table id="customers">
        <thead><!--heading -->
            <tr><!--for row-->
            <th>Serial No.</th>
                <th>Sender</th><!--column in bold-->
                <th>Receiver</th>
                <th>Balance</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody><!--body of table-->
			<?php
                    include 'config.php';

                    $selectquery = "SELECT * FROM `transaction`";
                    $query = mysqli_query($conn, $selectquery);

                    while ($res = mysqli_fetch_assoc($query)) {

                    ?>
			
			
			
            <tr>
            <td data-th="id"><?php echo $res['sno']; ?></td>
                <td data-th="Name"><?php echo $res['sender']; ?></td><!--column not in bold-->
                <td data-th="name"><?php echo $res['receiver']; ?></td>
                <td data-th="Balance"><?php echo $res['balance']; ?></td>
                <td data-th="time"><?php echo $res['datetime']; ?></td>
            </tr>
			
			
                    <?php
                    }

                    ?>
        
        </tbody>
       
</table>
</div>
</div>


<?php include("footer.php")?>