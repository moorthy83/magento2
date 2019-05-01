<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$_POST = json_decode(file_get_contents('php://input'), true);

	$Email  = $_POST['Email'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$School  =$_POST['School'];
	$Municipality = $_POST['Municipality'];
	$Grade = $_POST['Grade'];
	$DeliveryAddress = $_POST['DeliveryAddress'];
	$ZipCode = $_POST['ZipCode'];
	$Place =$_POST['Place'];
	$DeliveryLocation = $_POST['DeliveryLocation'];
	$PhoneNo  = $_POST['PhoneNo'];
	$Title  = $_POST['Title'];
	$ReqDelivery = $_POST['ReqDelivery'];
	$MeetingName  =$_POST['MeetingName'];
	$OtherInfo  = $_POST['OtherInfo'];
	$Preschool  = $_POST['PreSchool'];
	$Elementary_Fk6  = $_POST['Elementary_Fk6'];
	$FK9  = $_POST['FK9'];
	$HighSchool_Other = $_POST['HighSchool_Other'];
	$FormName  =$_POST['FormName'];
	$Status  = "To Be Reviewed";
	$date = new DateTime();
	setlocale(LC_ALL, 'sv_SE'); 
	$RegisterDate = strftime("%d %B %Y %H:%M",$date->getTimestamp());



	// $baseURL = "https://api.smartsheet.com/2.0";
	// $sheetsURL = $baseURL. "/sheets/";
	// $shareSheetURL = $baseURL. "/sheet/2054572668675972/shares";
	// $getSheetURL = $baseURL. "/sheets/2054572668675972/rows";
	// $headers = array(
	// 		"Authorization: Bearer 5ovebvu8o6582to4ldgcid90zg",
	// 		"Content-Type: application/json"
	// 	);
	// 	// Connect to Smartsheet API to get Sheet List
	// 	$curlSession = curl_init($sheetsURL);
	// 	curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);
	// 	curl_setopt($curlSession, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, TRUE);
	// 	$smartsheetData = curl_exec($curlSession);
		
	// 	// Assign response to PHP object
	// 	$sheetsObj = json_decode($smartsheetData,true);

		
	// 	if (curl_getinfo($curlSession, CURLINFO_HTTP_CODE) != 200) {
	// 		echo "Oh No! Could not grab sheet list. Error: (". $sheetsObj->errorCode .") ". $sheetsObj->message ."\n";
	// 	} 
	// 	else {
	// 		// close curlSession
	// 		curl_close($curlSession);
	// 		// List Sheets
	// 		if (count($sheetsObj) > 0) {
	// 			$_POST = json_decode(file_get_contents('php://input'), true);
	// 			$Email  = $_POST['Email'];
	// 			$FirstName = $_POST['FirstName'];
	// 			$LastName = $_POST['LastName'];
	// 			$School  =$_POST['School'];
	// 			$Municipality = $_POST['Municipality'];
	// 			$Grade = $_POST['Grade'];
	// 			$DeliveryAddress = $_POST['DeliveryAddress'];
	// 			$ZipCode = $_POST['ZipCode'];
	// 			$Place =$_POST['Place'];
	// 			$DeliveryLocation = $_POST['DeliveryLocation'];
	// 			$PhoneNo  = $_POST['PhoneNo'];
	// 			$Title  = $_POST['Title'];
	// 			$ReqDelivery = $_POST['ReqDelivery'];
	// 			$MeetingName  =$_POST['MeetingName'];
	// 			$OtherInfo  = $_POST['OtherInfo'];
	// 			$Preschool  = $_POST['PreSchool'];
	// 			$Elementary_Fk6  = $_POST['Elementary_Fk6'];
	// 			$FK9  = $_POST['FK9'];
	// 			$HighSchool_Other = $_POST['HighSchool_Other'];
	// 			$FormName  =$_POST['FormName'];
	// 			$Status  = "To Be Reviewed";
	// 			$date = new DateTime();
	// 			setlocale(LC_ALL, 'sv_SE'); 
	// 			$RegisterDate = strftime("%d %B %Y %H:%M",$date->getTimestamp());
				

	// 			$fields = '[{"toTop":true,"cells": [

	// 				{"columnId": "7347096366933892", "value": "'.$Email.'", "displayValue": "'.$Email.'"},
	// 				{"columnId": "8286622341982084", "value": "'.$FirstName.'", "displayValue": "'.$FirstName.'"},
	// 				{"columnId": "968272947505028", "value": "'.$LastName.'", "displayValue": "'.$LastName.'"},
	// 				{"columnId": "1717596832720772", "value": "'.$School.'", "displayValue": "'.$School.'"},
	// 				{"columnId": "6221196460091268", "value": "'.$Municipality.'", "displayValue": "'.$Municipality.'"},
	// 				{"columnId": "3969396646406020", "value": "'.$Grade.'", "displayValue": "'.$Grade.'"},
	// 				{"columnId": "8472996273776516", "value": "'.$DeliveryAddress.'", "displayValue": "'.$DeliveryAddress.'"},
	// 				{"columnId": "310221949167492", "value": "'.$ZipCode.'", "displayValue": "'.$ZipCode.'"},
	// 				{"columnId": "4813821576537988", "value": "'.$Place.'", "displayValue": "'.$Place.'"},
	// 				{"columnId": "2562021762852740", "value": "'.$DeliveryLocation.'", "displayValue": "'.$DeliveryLocation.'"},
	// 				{"columnId": "7065621390223236", "value": "'.$PhoneNo.'", "displayValue": "'.$PhoneNo.'"},
	// 				{"columnId": "1436121856010116", "value": "'.$Title.'", "displayValue": "'.$Title.'"},
	// 				{"columnId": "5939721483380612", "value": "'.$ReqDelivery.'", "displayValue": "'.$ReqDelivery.'"},
	// 				{"columnId": "3687921669695364", "value": "'.$MeetingName.'", "displayValue": "'.$MeetingName.'"},
	// 				{"columnId": "8191521297065860", "value": "'.$OtherInfo.'", "displayValue": "'.$OtherInfo.'"},
	// 				{"columnId": "8719415727417220", "value": "'.$Preschool.'", "displayValue": "'.$Preschool.'","strict":false},
	// 				{"columnId": "996626442545028", "value": "'.$Elementary_Fk6.'", "displayValue": "'.$Elementary_Fk6.'","strict":false},
	// 				{"columnId": "5500226069915524", "value": "'.$FK9.'", "displayValue": "'.$FK9.'","strict":false},
	// 				{"columnId": "3248426256230276", "value": "'.$HighSchool_Other.'", "displayValue": "'.$HighSchool_Other.'","strict":false},
	// 				{"columnId": "7160722435139460", "value": "'.$FormName.'", "displayValue": "'.$FormName.'"},
	// 				{"columnId": "1531222900926340", "value": "'.$Status.'", "displayValue": "'.$Status.'"},
	// 				{"columnId": "3783022714611588", "value": "'.$RegisterDate.'", "displayValue": "'.$RegisterDate.'"}
	// 			  ]
	// 			}]';
				

	// 			$curlSession = curl_init($getSheetURL);
	// 			curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);
	// 			curl_setopt($curlSession, CURLOPT_HTTPHEADER, $headers);
	// 			curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, TRUE);
	// 			curl_setopt($curlSession, CURLOPT_POSTFIELDS,  $fields);
	// 			curl_setopt($curlSession, CURLOPT_CUSTOMREQUEST, "POST");
	// 			curl_setopt($curlSession, CURLOPT_POST, 1);
	// 			$getSheetResponseData = curl_exec($curlSession);
				
	// 			$sheetObj1 = json_decode($getSheetResponseData, true);
	// 			if (curl_getinfo($curlSession, CURLINFO_HTTP_CODE) != 200) {
	// 				echo "Whoops! The following error occured.\n";
	// 				//echo "Error: (". $sheetObj1 .") ". $sheetObj1 ."\n";
					
	// 			} 
	// 			} else {
	// 				echo "No sheets for you!";
	// 			}
	// 			curl_close($curlSession);
	// 			echo "Data Inserted. Goodbye!\n\n";
	// 	}

	

		if($_POST['FormName'] == "Pedagogträffsintresse")
		{
			
			
			$mail = new PHPMailer(true);
			//$mail->SMTPDebug  = 2;  
			$mail->isSMTP();
			$mail->Host = '01-smtp.midpoint.se';
			$mail->Port = 25;
			$mail->SMTPSecure = 'auto';
			$mail->SMTPAuth = true;
			$mail->Username = 'majema';
			$mail->Password = 'ispAV94WEJ';
			$mail->CharSet = "UTF-8";
			$mail->setFrom('info@majema.se', 'Majema');
			$mail->addReplyTo('info@majema.se', 'Majema');
			//$mail->AddCC('matti.moberg@majema.se', 'Matti');
			//$mail->AddCC('delivery@vsmarttec.com', 'Vsmarttec');
			//$mail->addAddress('weronica.hallden@majema.se', 'Weronica');
			$mail->addAddress('moorthy.a@pykara.net', 'Moorthy');
			
			$mail->Subject = 'Nytt enkätsvar på pedagogträff 2018';

			$body = '<!DOCTYPE html>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			</head>
			<body>
			<div style="background: #F6F6F6; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; margin: 0; padding: 0;">
			<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
			<tbody>
			<tr>
			<td style="padding: 20px 0 20px 0;" align="center" valign="top">
			<table style="border: 1px solid #e0e0e0; width: 482px;padding: 10px;" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF"><!-- [ header starts here] -->
			<tbody>
			<tr>
			<td valign="top" colspan="2"><a href=""><img style="margin-bottom: 10px;width:480px;" src="https://www.majema.se/media/images/1234_760_event_pedagogtraff.jpg" alt="https://www.majema.se/media/images/1234_760_event_pedagogtraff.jpg" border="0" /></a></td>
			</tr>
			<!-- [ middle starts here] -->
			<tr>
			<td valign="top" colspan="2" >
			<h1 style="font-size: 21px; font-weight: bold; margin: 0 0 11px 0;">Nytt enkätsvar på pedagogträff 2018</h1>
			</td>
			</tr>
			<tr>
			<td colspan="2" >
			<h2 style="font-size: 16px; font-weight: normal; margin: 0;">Ett nytt enkätsvar har inkommit.</h2>
			</td>
			</tr>
			<tr>
			<td colspan="2" >
			<h2 style="font-size: 16px; font-weight: normal; margin: 0;">Du behöver bekräfta personens plats via e-post inom 48 timmar.</h2>
			</td>
			</tr>
			<tr>
			<td colspan="2" >
			<h2 style="font-size: 16px; font-weight: normal; margin: 0;">Se svaret nedan</h2>
			</td>
			</tr>
			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Föreläsningsort</label>
			</td>
			<td style="width:50%;word-break: break-word;">
			<p style="font-family:Times New Roman;">'.$MeetingName.'</p>
			</td>
			</tr>
			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman"><font size="3px">E-post</font></label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman"><font size="3px">'.$Email.'</font></p>
			</td>
			</tr>

                        <tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Mobilnummer</label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman">'.$PhoneNo.'</p>
			</td>
			</tr>

			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Förnamn</label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman">'.$FirstName.'</p>
			</td>
			</tr>

			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Efternamn</label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman">'.$LastName.'</p>
			</td>
			</tr>

			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Skola</label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman">'.$School.'</p>
			</td>
			</tr>

			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Kommun</label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman">'.$Municipality.'</p>
			</td>
			</tr>

			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Årskurs</label>
			</td>
			<td style="width:50%">
			<p style="font-family:Times New Roman">'.$Grade.'</p>
			</td>
			</tr>

			<tr >
			<td style="width:50%">
			<label style="font-family:Times New Roman">Eventuella allergier eller övrig<br/>information du vill delge.</label>
			</td>
			<td style="width:50%;word-break: break-word;">
			<p style="font-family:Times New Roman">'.$OtherInfo.'</p>
			</td>
			</tr>

			</tbody>
			</table>
			</td>
			</tr>
			</tbody>
			</table>
			</div>
			</body>
			</html>';
			$mail->Body = $body;
			$mail->IsHTML(true);   
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			}


		}
                
               
?>
