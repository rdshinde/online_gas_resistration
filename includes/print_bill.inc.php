<?php
	include_once '../public/base.php';
	include_once 'dbh.inc.php';
	include_once 'functions.inc.php';
	
	if(isset($_GET["err"])){
		$id = $_GET["err"];
		$sql = "SELECT * FROM Booking WHERE booking_id=$id";
                    $results = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($results);
                    if($resultCheck >0){
						$row = mysqli_fetch_assoc($results);
						$consumerID = $row["consumer_id"];
						$time = $row["mtimestamp"];
						$status = $row["status_field"];
						$price = getBookingPrice($conn, $id);
						$billId =getBillId($conn, $id);
					}
	}
	
?>

<div id="divToPrint" >
  <div>
  <div class="container" style="padding-top:30px;">
    	<div class="row">
    		<div class="span4">
				<h1 class="display-2">AAR Gas Agency</h1>
                <!-- <img src="http://webivorous.com/wp-content/uploads/2020/06/brand-logo-webivorous.png" class="img-rounded logo"> -->
    			<address style="margin-top:15px;">
			        <strong>AAR Gas Agency Pvt. Ltd.</strong>
						<p class="mb-0">Shivajinagar, Pune</p>
						<p>Tal. Pune, Dist. Pune, State Maharashtra - 412001</p>
			       
		    	</address>
    		</div>
    		<div class="span4 well">
    			<table class="invoice-head" style="padding: 0 8px;">
    				<tbody>
    					<tr>
    						<td class="pull-right"><strong>Customer ID</strong></td>
    						<td> <?php echo $consumerID ?> </td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Bill ID</strong></td>
    						<td> <?php echo $billId ?> </td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Date & Time</strong></td>
    						<td> <?php echo $time ?> </td>
    					</tr>
    					
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="row pt-3">
    		<div class="span8">
    			<h2 class="display-6">Invoice</h2>
    		</div>
    	</div>
    	<div class="row m-1 m-lg-1">
		  	<div class="
            container
            table-responsive
            shadow
            p-3
            rounded
            border-0
            col-lg-6 col-xxl-12 col-centered
            text-center
			span8 well invoice-body
          ">
		  		<table class="table table-bordered">
					<thead>
						<tr>
                          <th scope="col">Customer Name</th>
							<th scope="col">Address</th>
                          <th scope="col">Booking ID</th>
                          <th scope="col">Booking Status</th>
							<th scope="col">Amount</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td><?php echo $_SESSION["name"] ?></td>
						<td><?php echo $_SESSION["address"].' '.$_SESSION["city"].' - '.$_SESSION["pincode"] ?></td>
						<td><?php echo $id ?></td>
						<td><?php echo $status ?></td>
                      <td>&#8377;<?php echo $price ?></td>
						</tr>
            <tr><td colspan="4"></td></tr>
<tr>
							<td colspan="2">&nbsp;</td>
							<td><strong>Total</strong></td>
							<td><strong>&#8377;<?php echo $price ?></strong></td>
						</tr>
					</tbody>
				</table>
		  	</div>
  		</div>
  		<div class="row">
  			<div class="span8 well invoice-thank" style="margin-top: 60px;
  padding: 5px;">
  				<h5>Thank You!</h5>
  			</div>
  		</div>
  		<div class="row">
  	    	<div class="span3">
  		        <strong>Phone:</strong>+91-124-111111
  	    	</div>
  	    	<div class="span3">
  		        <strong>Email:</strong> <a href="mailto:info@aarmail.com">info@aarmail.com</a>
  	    	</div>
  	    	<div class="span3">
  		        <strong>Website:</strong> <a href="../index.php">AAR Gas Agency.com</a>
  	    	</div>
  		</div>
    </div>
            
  </div>
</div>
<div class="w-100 h-75 mt-5 d-flex justify-content-center align-items-center mb-5">
  <input type="button" class="btn btn-primary" value="Print Bill" onclick="PrintDiv();" />
</div>

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<?php
	include_once '../public/footer.php'
?>
