<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lab Task 2</title>
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
	$nameErr = $emailErr = $genderErr = $ddErr = $mmErr = $yyErr = $degErr = $bgErr = "";
	$name = $email = $gender = $dd = $mm = $yy = $bg = "";
	$flag = false;
	$degrees;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);

			$search = ' ';
			if (!preg_match("/{$search}/i", $name)) {
				$nameErr = 'Must Contains Two Words';
			}
			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}
		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}

		if (empty($_POST["deg"])) {
			$degErr = "Degree is required";
		} else if ($_POST["deg"] > 2) {
			$degErr = "At Least 2 must be checked";
		} else {
			$flag = true;
			global $degrees;
			$degrees = $_POST["deg"];
		}

		if (empty($_POST["bg"])) {
			$bgErr = "Blood Group is required";
		} else {
			$bg = test_input($_POST["bg"]);
		}
		if (empty($_POST["dd"])) {
			$ddErr = "Day is required";
		} else {
			$dd = test_input($_POST["dd"]);
		}
		if (empty($_POST["mm"])) {
			$mmErr = "Month is required";
		} else {
			$mm = test_input($_POST["mm"]);
		}
		if (empty($_POST["yy"])) {
			$yyErr = "Year is required";
		} else {
			$yy = test_input($_POST["yy"]);
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
		<h2>PHP Form Validation Example</h2>
		<p><span class="error">* required field</span></p>
		Name: <input type="text" name="name" value="<?php echo $name; ?>">
		<span class="error">* <?php echo $nameErr; ?></span>
		<br><br>
		E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
		<span class="error">* <?php echo $emailErr; ?></span>
		<br><br>
		Gender:
		<input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
		<input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
		<input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
		<span class="error">* <?php echo $genderErr; ?></span>
		<br><br>
		DOB:
		<input type="number" name="dd" value="<?php echo $dd; ?>" min="1" max="31">
		<span class="error">* <?php echo $ddErr; ?></span>
		<input type="number" name="mm" value="<?php echo $dd; ?>" min="1" max="12">
		<span class="error">* <?php echo $mmErr; ?></span>
		<input type="number" name="yy" value="<?php echo $dd; ?>" min="1900" max="10000">
		<span class="error">* <?php echo $yyErr; ?></span>
		<br><br>
		Degree:
		<input type="checkbox" name="deg[]" <?php if (isset($degree) && $degree == "ssc") echo "checked"; ?> value="ssc">SSC
		<input type="checkbox" name="deg[]" <?php if (isset($degree) && $degree == "hsc") echo "checked"; ?> value="male">HSC
		<input type="checkbox" name="deg[]" <?php if (isset($degree) && $degree == "bsc") echo "checked"; ?> value="other">BSC
		<input type="checkbox" name="deg[]" <?php if (isset($degree) && $degree == "msc") echo "checked"; ?> value="other">MSC
		<span class="error">* <?php echo $degErr; ?></span>
		<br><br>
		Blood Group:
		<select name="bg">
			<option></option>
			<option value="a+">A+</option>
			<option value="b+">B+</option>
			<option value="ab+">AB+</option>
			<option value="o+">O+</option>
		</select>
		<span class="error">* <?php echo $bgErr; ?></span>
		<br><br>
		<button type="submit">Submit</button>




		<?php
		echo "<h2>Your Input:</h2>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $gender;
		echo "<br>";
		echo $dd . '/' . $mm . '/' . $yy;
		echo "<br>";
		if ($flag) {
			foreach ($degrees as $items) {
				echo $items;
				echo "<br>";
			}
		}
		echo $bg;
		echo "<br>";

		?>

	</form>


</body>

</html>