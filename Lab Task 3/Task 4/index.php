<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Task 4</title>
	<style>
		body {
			background-color: #FDFEFE;
			margin: 0;
			padding: 0;
		}

		.error {
			color: orangered;
		}

		form {
			width: 60%;
			margin: 0 auto;
			margin-top: 5%;
			background-color: #EAECEE;
			padding: 2%;
		}

		fieldset {
			background-color: #eeeeee;
			margin: 20px;
		}

		legend {
			background-color: #2471A3;
			color: #eeeeee;
			padding: 5px 10px;
			font-size: 15px;
		}

		.button {
			display: block;
			width: 100%;
			border: none;
			background-color: #4CAF50;
			padding: 14px 15px;
			font-size: 20px;
			cursor: pointer;
			text-align: center;
			color: #eeeeee;
		}

		h3,
		sup {
			color: orangered;
		}

		label {
			font-weight: bold;

		}

		a:hover {
			color: red;
		}
	</style>
</head>

<body>

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
	?>



	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h2>JSON</h2>
		Name: <input type="text" name="name"><?php echo $nameErr; ?>
		<br><br>
		E-mail: <input type="text" name="email"><?php echo $emailErr; ?>
		<br><br>
		User Name: <input type="text" name="user-name"><?php echo $UnameErr; ?> <br><br>
		Password: <input type="password" name="password"> <?php echo $passErr; ?><br><br>
		Conferm Password: <input type="password" name="re-pass"><?php echo $rePassErr; ?><br><br>
		Gender:
		<input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
		<input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
		<input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
		<?php echo $genderErr; ?>
		<br><br>
		DOB:
		<input type="number" name="dd" value="<?php echo $dd; ?>" min="1" max="31">
		<input type="number" name="mm" value="<?php echo $dd; ?>" min="1" max="12">
		<input type="number" name="yy" value="<?php echo $dd; ?>" min="1953" max="70000">
		<?php echo $dobErr; ?>
		<br><br>
		<button type="submit">Submit</button>
	</form>

	<form>
		<?php
		$jsondata = file_get_contents("data.json");
		$json = json_decode($jsondata, true);
		//echo var_dump($json);
		foreach ($json as $key => $value) {
			echo $value["name"] . "<br>";
			echo $value["email"] . "<br>";
			echo $value["username"] . "<br>";
			echo $value["password"] . "<br>";
			echo $value["gender"] . "<br>";
			echo $value["dob"] . "<br>";
		}

		?>
	</form>


</body>

</html>