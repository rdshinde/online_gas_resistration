


<style>
    .invoice-head td {
    padding: 0 8px;
}
.container {
  padding-top:30px;
}
.invoice-body{
  background-color:transparent;
}
.invoice-thank{
  margin-top: 60px;
  padding: 5px;
}
address{
  margin-top:15px;
}
</style>

<div id="divToPrint" style="display:none;">
  <div>
  <div class="container" style="padding-top:30px;">
    	<div class="row">
    		<div class="span4">
                <img src="http://webivorous.com/wp-content/uploads/2020/06/brand-logo-webivorous.png" class="img-rounded logo">
    			<address style="margin-top:15px;">
			        <strong>Webivorous Web services Pvt. Ltd.</strong><br>
                 
			       35, Lajpat Nagar<br>
                  Gurugram, Haryana-122001 (India)
		    	</address>
    		</div>
    		<div class="span4 well">
    			<table class="invoice-head" style="padding: 0 8px;">
    				<tbody>
    					<tr>
    						<td class="pull-right"><strong>Customer #</strong></td>
    						<td>21398324797234</td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Invoice #</strong></td>
    						<td>2340</td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Date</strong></td>
    						<td>10-08-2013</td>
    					</tr>
    					
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="row">
    		<div class="span8">
    			<h2>Invoice</h2>
    		</div>
    	</div>
    	<div class="row">
		  	<div class="span8 well invoice-body" style="background-color:transparent;">
		  		<table class="table table-bordered">
					<thead>
						<tr>
                          <th>Product</th>
							<th>Description</th>
                          <th>Month/Quantity</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>SEO Bronze</td>
						<td>www.swaransoft.com</td>
						<td>8 Months</td>
                      <td>$1000</td>
						</tr>
            <tr><td colspan="4"></td></tr>
<tr>
							<td colspan="2">&nbsp;</td>
							<td><strong>Total</strong></td>
							<td><strong>$1000.00</strong></td>
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
  		        <strong>Email:</strong> <a href="web@webivorous.com">web@webivorous.com</a>
  	    	</div>
  	    	<div class="span3">
  		        <strong>Website:</strong> <a href="http://webivorous.com">http://webivorous.com</a>
  	    	</div>
  		</div>
    </div>
            
  </div>
</div>
<div>
  <input type="button" value="print" onclick="PrintDiv();" />
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