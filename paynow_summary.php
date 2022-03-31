<?php
ob_start();

include "connection1.php";

?>
 <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  
<?php include "header.php";  ?>
 <div class="bgimage9">



        <div class="container" style="margin-left:0px;height:inherit;width:100%;">
            <div class="row">
			<hr class="space s">
                <div class="col-md-2" style="left:-10px;">
	<?php include "sidebar.php"; ?>

</div>

                 <div class="col-md-8" style="padiding-left:20px;">
 
				<div style="font-weight:500;width:100%; background: #FFF!important;
color:#000!important;padding:3%;border-radius:10px;">
				<h4 class="text-center">Payment Summary</h4>

				<hr class="space s"/>
			
         <div style="background:#FFF;padding:10px;border-radius:5px;max-height:fit-content;min-height: 400px;">
  <?php
              $order_id=$_REQUEST['id'];
              $get_summary_query=mysqli_query($con,"SELECT * from orders WHERE id='$order_id'");
              $get_summary=mysqli_fetch_array($get_summary_query);

              ?>

<script>
	
	$(function(){
   $(".pushme").click(function () {
      $(this).text(function(i, text){
          return text === "Show Breakup" ? "Hide Breakup" : "Show Breakup";
      })
   });
})

</script>              

  				<table style="color:#000;font-weight:600;margin-left: 110px;">

                  				<tr>
                  			  <td align="right" id="label_order_no" adr_trans="label_order_no" style="width:150px;font-size: 13px;">Order #</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td style="font-size: 13px;"><?php echo $get_summary['id']; ?><hr class="space xs"></td>
                  				</tr>

                  				<tr>
                  			  <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Total Amount</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td><span style="font-size:13">$1336</span> <a href="#collapseExample" class="pushme" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration:underline;color:blue;font-size: 9px;" data-toggle="collapse">Show Breakup</a><hr class="space xs"><div class="collapse" id="collapseExample" style="z-index: 999;position: absolute;">
  <div style="width: 300px;margin-top: -10px;">

 <table style="color:#000;font-weight:600;
    background: #EEE;opacity: 0.9;">
<hr class="space xs">
<tr>
                  			  <td align="center" colspan="3" style="font-size:9px;text-decoration:underline;">Products & Other costs<hr class="space xs"></td>
                  				</tr>

                  				<tr>
                  			  <td align="center" id="" adr_trans="" style="width:100px;font-size: 9px;">Standard Shoot</td><td align="left" class="td-space" style="width:30px;font-size: 9px;">:</td><td style="width:50px;font-size: 9px;">$200<hr class="space xs"></td>
                  				</tr>

                  				<tr>
                  			  <td align="center" id="" adr_trans="" style="width:100px;font-size: 9px;">Premium Shoot</td><td align="left" class="td-space" style="width:30px;font-size: 9px;">:</td><td style="width:50px;font-size: 9px;">$400<hr class="space xs"></td>
                  				</tr>

                  				<tr>
                  			  <td align="center" id="" adr_trans="" style="width:100px;font-size: 9px;">Elite Shoot</td><td align="left" class="td-space" style="width:30px;font-size: 9px;">:</td><td style="width:50px;font-size: 9px;">$600<hr class="space xs"></td>
                  				</tr>

                  					<tr>
                  			  <td align="center" id="" adr_trans="" style="width:100px;font-size: 9px;">Other Cost</td><td align="left" class="td-space" style="width:30px;font-size: 9px;">:</td><td style="width:50px;font-size: 9px;">$100<hr class="space xs"></td>
                  				</tr>


                  					<tr>
                  			  <td align="center" id="" adr_trans="" style="width:100px;font-size: 9px;">Tax(3%)</td><td align="left" class="td-space" style="width:30px;font-size: 9px;">:<hr style="border-top: 1px solid;"></td><td style="width:50px;font-size: 9px;">$36<hr style="border-top: 1px solid;"></td>
                  				</tr>

                  					<tr>
                  			  <td align="center" id="" adr_trans="" style="width:100px;font-size: 9px;">Total</td><td align="left" class="td-space" style="width:30px;font-size: 9px;">:</td><td style="width:50px;font-size: 9px;">$1336<hr class="space xs"></td>
                  				</tr>
             
                  			</table>

  </div>
</div></td>
                  				</tr>
<script>

$(function() {
   $("input[name='payment']").click(function() {
     if ($("#card").is(":checked")) {
       $("#card_details").show();
        $("#bank_details").hide();
         $("#wallet_details").hide();


         }

          if ($("#nbank").is(":checked")) {
       $("#bank_details").show();
        $("#wallet_details").hide();
        $("#card_details").hide();


         }

          if ($("#Wallet").is(":checked")) {
       $("#wallet_details").show();
        $("#card_details").hide();
        $("#bank_details").hide();


         }

     });

 });

</script>
                  				<tr>
                  			  <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Payment Options</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td style="font-size: 13px;">

                  			  	<input type="radio" id="card" name="payment" value="card">
<label for="card">Credit / Debit Card</label><br>
<input type="radio" id="nbank" name="payment" value="net_banking">
<label for="nbank">Net Banking</label><br>
<input type="radio" id="Wallet" name="payment" value="Wallet">
<label for="Wallet">Wallet</label>
                  			  	<hr class="space xs"></td>
                  				</tr>
   
                           </table>
<div id="card_details" style="display:none">

 <div class="col-md-6">
                        <p>Name on the card</p>
                        <input id="name" name="name" placeholder="Enter the name" type="text" autocomplete="off"
                        value="" class="form-control form-value">
    </div>

     <div class="col-md-6">
                        <p>Card Number</p>
                        <input id="card_name" name="card_name" placeholder="Enter the card number" type="text" autocomplete="off"
                        value="" class="form-control form-value">
    </div>

     <div class="col-md-6">
                        <p>Expiry Date</p>
                        <input id="expiry_date" name="name" type="date" autocomplete="off"
                        value="" class="form-control form-value">
    </div>
     <div class="col-md-6">
                        <p>Security Code</p>
                        <input id="sec_code" name="sec_code" placeholder="Enter the security code" type="text" autocomplete="off"
                        value="" class="form-control form-value">
    </div>

</div>

<div id="bank_details" style="display: none;" align="center">
<div class="col-md-2">
</div>
 <div class="col-md-6">
                        <p>Select your bank</p>
                        <select name="bank" class="form-control form-value" id="bank">
       <option value="" disabled selected>Select bank</option>
       <option value="">HSBC</option>
       <option value="">U.S. Bancorp</option>
       <option value="">Citigroup Inc.</option>
                    </select>
    </div>

     <div class="col-md-2">
     	<br>
                        <a href="" class="btn btn-default btn-sm adr-save" style="margin-top:2px;">Submit</a>
    </div>

    

</div>

<div id="wallet_details" style="display: none;" align="center">
<div class="col-md-12">

<hr class="space s">
	<h4>Your wallet balance is $0</h4>
</div>  
</div>
<hr class="space m">
<div class="col-md-3">
	<a href="order_payment_summary.php?id=<?php echo $order_id; ?>" style="text-decoration:underline;color:blue;font-size: 10px;" >Transaction Status</a>
</div>
<div class="col-md-8">
 <p align="center" style="" ><a href="" class="btn btn-default btn-sm adr-save" style="margin-right: 130px;">Confirm Payment</a></p>
                        </div>
                    </div>
</div>
</div>


    </div>
        </div>


		<?php include "footer.php";  ?>
