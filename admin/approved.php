<?php
   include "connection1.php";

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   function email($order_id,$con)
   {
   	/* Exception class. */
   	require 'C:\PHPMailer\src\Exception.php';

   	/* The main PHPMailer class. */
   	require 'C:\PHPMailer\src\PHPMailer.php';

   	/* SMTP class, needed if you want to use SMTP. */
   	require 'C:\PHPMailer\src\SMTP.php';


   	$mail = new PHPMailer(true);
   	$mail->isSMTP();
   	$mail->Host = $_SESSION['emailHost'];
   	$mail->SMTPAuth = true;
   	// //paste one generated by Mailtrap
   	// //paste one generated by Mailtrap
   	$mail->Username =$_SESSION['emailUserID'];
   	$mail->Password =$_SESSION['emailPassword'];
   	$mail->SMTPSecure = 'tls';
   	$mail->Port = $_SESSION['emailPort'];
   	//$mail->Port = 465;
   	//From email address and name
   	$mail->From = $_SESSION['emailUserID'];
   	$mail->FromName = "ADR's Photo App";

   	//To address and name
   	// ;
   	// // //Recipient name is optional
   	// //;
   	// ;



   	//Address to which recipient will reply
   	$mail->addReplyTo($_SESSION['emailUserID'], "Reply");

    $get_orderdetail_query=mysqli_query($con,"SELECT * from orders WHERE id='$order_id'");
    $get_detail=mysqli_fetch_array($get_orderdetail_query);
    $pc_admin_id=$get_detail['pc_admin_id'];
  	$get_pcadmin_profile_query=mysqli_query($con,"SELECT * FROM `photo_company_profile` WHERE pc_admin_id=$pc_admin_id");
  	$get_profile=mysqli_fetch_assoc($get_pcadmin_profile_query);
  	$pcadmin_email=$get_profile['email'];
  	$pcadmin_contact=$get_profile['contact_number'];
   $pcadmin_org=$get_profile['organization_name'];
    $get_template_query=mysqli_query($con,"select * from email_template where pc_admin_id='$pc_admin_id' and template_title='Order Cost'");
 	  $get_template=mysqli_fetch_array($get_template_query);
 	  $order_cost_template=$get_template['template_body_text'];
    $realtor_id=$get_detail['created_by_id'];
    $get_realtor_name_query=mysqli_query($con,"SELECT * FROM user_login where id='$realtor_id'");
    $get_name=mysqli_fetch_assoc($get_realtor_name_query);
    $realtor_email=@$get_name["email"];
    $mail->addAddress($realtor_email);
   	$mail->isHTML(true);

   	$mail->Subject = "Order Cost Approved";
    $mail->Body = "<html><head><style>.titleCss {font-family: \"Roboto\",Helvetica,Arial,sans-serif;font-weight:600;font-size:18px;color:#0275D8 }.emailCss { width:100%;border:solid 1px #DDD;font-family: \"Roboto\",Helvetica,Arial,sans-serif; } </style></head><table cellpadding=\"5\" class=\"emailCss\"><tr><td align=\"left\"><img src=\"".$_SESSION['project_url']."logo.png\" /></td><td align=\"center\" class=\"titleCss\">ORDER COST APPROVED</td>
    <td align=\"right\"><img src=\"".$_SESSION['project_url'].$get_profile['logo_image_url']."\" width=\"110\" height=\"80\"/></td>  </tr><tr><td align=\"left\">".$_SESSION['support_team_email']."<br>".$_SESSION['support_team_phone']."</td><td colspan=\"2\" align=\"right\">".strtoupper($get_profile['organization_name'])."<br>".$pcadmin_email."<br>".$pcadmin_contact."</td></tr><tr><td colspan=\"2\"><br><br>";
   	//$mail->AltBody = "This is the plain text version of the email content";
    $mail->Body.=$order_cost_template;
   	$mail->Body.="
    </br>The cost on the order #{{Order_ID}} has been approved by {{Organization_Name}}. Please check the orders page for details</br>


Thank you for continued support.
<br><br><span style=\"font-size:10px;font-weight:bold;\">*This is an auto generated email notification from ADR's Photo App. Please do not reply back to this email. For any support please write to info@adrgrp.com</span><br><br>
Thanks,<br>
ADR's Photo App Team.";


   	  $mail->Body=str_replace('{{Order_ID}}',$order_id, $mail->Body);
        $mail->Body=str_replace('{{Organization_Name}}',$pcadmin_org, $mail->Body);

   	  $mail->Body.="<br><br></td></tr></table></html>";
   	// echo $mail->Body;exit;
   	try {
   	    $mail->send();
   	    echo "Message has been sent successfully";
   	} catch (Exception $e) {
   		echo $e->getMessage();
   	    echo "Mailer Error: " . $mail->ErrorInfo;
   	}
   }
   $order_id=$_REQUEST['id'];
   mysqli_query($con,"UPDATE `invoice` SET `approved`=1 WHERE order_id=$order_id");
   $get_order_query=mysqli_query($con,"select * from orders where id=$order_id");
   $get_order=mysqli_fetch_assoc($get_order_query);
   $loggedin_name=$_SESSION['admin_loggedin_name'];
   $loggedin_id=$_SESSION['admin_loggedin_id'];
   $realtor_id=$get_order['created_by_id'];
   $csr_id =$get_order['csr_id'];
   $get_realtor_name_query1=mysqli_query($con,"SELECT * FROM user_login where id='$realtor_id'");
   $get_name1=mysqli_fetch_assoc($get_realtor_name_query1);
   $realtor=$get_name1["first_name"]." ".$get_name1["last_name"];
   $realtor_email=$get_name1['email'];
   $date = date('m/d/Y h:i:s a', time());
   email($order_id,$con);
   $insert_action=mysqli_query($con,"INSERT INTO `user_actions`( `module`, `action`, `action_done_by_name`, `action_done_by_id`,`action_done_by_type`, `csr_id`,`Realtor_id`,`pc_admin_id`, `action_date`) VALUES ('Invoice','Created','$loggedin_name',$loggedin_id,'PCAdmin','$csr_id','$realtor_id',$loggedin_id,now())");
 ?>
