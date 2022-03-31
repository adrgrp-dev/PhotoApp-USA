<?php
ob_start();

include "connection1.php";

?>


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
				<h4 class="text-center">Transaction Status</h4>

				<hr class="space s"/>
			
         <div style="background:#FFF;padding:10px;border-radius:5px;max-height:fit-content;min-height: 450px;">
  <?php
              $order_id=$_REQUEST['id'];
              $get_summary_query=mysqli_query($con,"SELECT * from orders WHERE id='$order_id'");
              $get_summary=mysqli_fetch_array($get_summary_query);

              ?>

              <div class="col-md-12">

              <p align="center"><img src="smiley.png" alt="Success smiley" width="100" height="100"></p>
              <hr class="space s"/>

          </div>

  				<table style="color:#000;font-weight:600;margin-left: 160px;">

                  				<tr>
                  			  <td align="right" id="label_order_no" adr_trans="label_order_no" style="width:150px;font-size: 13px;">Order #</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td><?php echo $get_summary['id']; ?><hr class="space xs"></td>
                  				</tr>

                  				<tr>
                  			  <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Transaction ID</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>634535725345<hr class="space xs"></td>
                  				</tr>

                                 <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Amount</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>$1336<hr class="space xs"></td>
                                </tr>

                                <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Status</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td><span adr_trans='' style='color: #fff; font-weight: bold;display: block;background:#008000;padding-top: 5px; max-width: 58px;padding-bottom: 5px;text-align: center;'>Success</span></td>
                                </tr>

                                <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Status Message</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>Transaction Successful<hr class="space xs"></td>
                                </tr>

                                 <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Mode of Transaction</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>Credit Card (<i class="fa fa-cc-visa" aria-hidden="true"></i>)<hr class="space xs"></td>
                                </tr>

                                 <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Transaction Date & Time</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>25/03/2022, 12:54 pm (GMT-4)<hr class="space xs"></td>
                                </tr>

                            </table>

                            <div class="col-md-12">

<hr class="space m">
    <p align="center">Thanks for the payment. Now you can continue tracking your order in the <a href="order_list.php?status=1" style="text-decoration:underline;color:blue;" >Orders</a> sections</p>
</div>  

                        </div>
</div>
</div>


    </div>
        </div>


		<?php include "footer.php";  ?>
