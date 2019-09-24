<?php
//Test Connection


require_once("isdk.php");	
$app = new iSDK;

if( $app->cfgCon("kf342")){ 

//Get the data
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$WebsiteUserId = $_REQUEST['WebsiteUserId'];
	$TC = $_REQUEST['tc'];
//Other fields
	$street = $_REQUEST['street'];
	$postalcode = $_REQUEST['postalcode'];
	$country = $_REQUEST['country'];
	$city = $_REQUEST['city'];
	$FacebookHandURL = $_REQUEST['FacebookHandURL'];
	
//Create User
	$contactData = array('FirstName' => $firstname,
    'LastName'  => $lastname,
    'Email'     => $email,
	'Phone1' => $phone,
	'_websiteUserID' => $WebsiteUserId,
	'StreetAddress1' => $street, 
	'PostalCode' => $postalcode,
	'Country' => $country,
	'City' => $city);
	
	$conID = $app->addCon($contactData); 
	
	//return result
	echo $conID;
//Insert into facebook handle url
	$data = array('AccountName' => $FacebookHandURL,
	'AccountType' => 'Facebook',
	'ContactId' => $conID);
	$app->dsAdd("SocialAccount", $data);	 
	
	//result result

//Add tag	
	if($TC = 1){ 
		$tagId = 456;
		$result = $app->grpAssign($conID, 11600);
		echo $result;
	}

//Achieve a Goal
$Integration = 'kf342';
$callName = 'Create User';

$app->achieveGoal($Integration, $callName, $conID);
} 
?>