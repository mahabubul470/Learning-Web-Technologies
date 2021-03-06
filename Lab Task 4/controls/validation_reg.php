<?php
// define variables and set to empty values
$nameErr = $passErr = $emailErr = $UnameErr = $genderErr = $dobErr = $rePassErr = "";
$name  = $email = $Uname = $password = $gender = $dd = $mm = $yy = $rePass = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		$flag = false;
	} else {
		$name = test_input($_POST["name"]);
		$flag = true;
	}
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$flag = false;
	} else {
		$email = test_input($_POST["email"]);
		$flag = true;
	}
	if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
		$flag = false;
	} else {
		$gender = test_input($_POST["gender"]);
		$flag = true;
	}
	if (empty($_POST["dd"])) {
		$dobErr = "DOB is required";
		$flag = false;
	} else {
		$dd = test_input($_POST["dd"]);
		$flag = true;
	}
	if (empty($_POST["mm"])) {
		$dobErr = "DOB is required";
		$flag = false;
	} else {
		$mm = test_input($_POST["mm"]);
		$flag = true;
	}
	if (empty($_POST["yy"])) {
		$dobErr = "DOB is required";
		$flag = false;
	} else {
		$yy = test_input($_POST["yy"]);
		$flag = true;
	}

	if (empty($_POST["password"])) {
		$passErr = "Password is required";
		$flag = false;
	} else {
		$password = test_input($_POST["password"]);
		if (!preg_match("/(?=.*?[#@$%])/", $password)) {
			$passErr = ". Password must contain at least one of the special characters (@, #, $,%)";
			$flag = false;
		}
		if (strlen($password) < 8) {
			$passErr = "Password must not be less than eight (8) characters";
			$flag = false;
		}
		$flag = true;
	}

	if (empty($_POST["user-name"])) {
		$UnameErr = "UserName is required";
	} else {
		$Uname = test_input($_POST["user-name"]);
		if (strlen($Uname) < 2) {
			$UnameErr = "User Name must contain at least two (2) characters";
			$flag = false;
		}
		if (!preg_match("/^[-a-zA-Z0-9 .]+$/", $Uname)) {
			$UnameErr = "User Name can contain alpha numeric characters, period, dash or
					underscore only";
			$flag = false;
		}
		$flag = true;
	}
	if (empty($_POST["re-pass"])) {
		$rePassErr = "Retype Password";
		$flag = false;
	} else {
		$rePass = test_input($_POST["re-pass"]);
		$flag = true;
		if ($rePass != $password) {
			$rePassErr = "Passwords donesnt match";
			$flag = false;
		}
	}
	if ($flag) {
		$dob = $dd . "-" . $mm . "-" . $yy;
		$jsondata = file_get_contents("data.json");
		$CurrentJson = json_decode($jsondata, true);
		$person = array(
			"name" => $name,
			"email" => $email,
			"username" => $Uname,
			"password" => $password,
			"gender" => $gender,
			"dob" => $dob
		);
		$CurrentJson[] = $person;
		$personJSON = json_encode($CurrentJson);
		if (file_put_contents("data.json", $personJSON))
			echo "JSON file created successfully...";
		else
			echo "Oops! Error creating json file...";
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
