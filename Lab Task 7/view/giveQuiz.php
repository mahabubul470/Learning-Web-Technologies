<?php
session_start();
if (isset($_COOKIE["usertype"]) && $_COOKIE["usertype"] == "student" && isset($_GET['id'])) {
  include_once "partials/navbar.php";
  include_once "partials/studentSidebar.php";
} else{
    header('Location: index.php');
}
   
  include_once "../controller/viewStudent.php";
  include_once "../controller/viewAllQuiz.php";
  if (isset($_GET["id"])) {
    $quizs = viewAll_Quiz($_GET["id"]);
    $questions = fetchAllQuestions($_GET["id"]);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (!empty($_POST["submit"])) {
        $message = '<p class="alert alert-success"> Successfully submitted! <button data-dismiss="alert" class="close"> &times; </button></p>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> Home | <?php if (isset($_SESSION["name"])) echo $_SESSION["name"] ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../script//dropdown.js"></script>
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="w3-light-grey">
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  <div class="w3-main">
  <div class="main">
        <h2>Quiz </h2>
        <div class="card">
            <div class="card-body">
                <!-- <a class="btn btn-primary btn-left" href="editStudent.php?oid=<?php //echo $data['oid'] ?>">Edit</a> <a class="btn btn-danger btn-left" href="../controller/deleteStudent.php?o-id=<?php //echo $data['oid'] ?>">Delete</a></td> -->
        
                <?php 
                    
                 if (isset($_POST['submit'])) {
                    setMsg("submission Successful!");
                 }
               
               ?>
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
                
                 <?php if(isset($questions)) foreach ($questions as $i => $question) : ?>
                 <?php 
                    $options = fetchAllOptions($question['ID']);
                 ?>
                    <div class="container-fluid add-frm">
                   
                         <hr>
                         <div class="mb-3">
                             <?php echo $question['ID'];?>
                             <label for="name" class="form-label"><b><?php echo $question['qns'] ?></b></label>
                             <sup style="color: red;">*</sup>
                             <br>
                             <br>
                             <?php if(isset($options)) foreach ($options as $i => $option) : ?>
                             &nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" type="radio" name="name" value="<?php  echo $option['option']?>"><span>&nbsp;<?php  echo $option['option']?></span>
                             <span style="color:orangered"></span>
                             <br>
                             <?php endforeach; ?>
                         </div>
    
                         <?php endforeach; ?>
                       <br>
                       <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                   </div>
               </form>
    
            </div>
        </div>
  </div>


  <script>


  </script>
</body>

</html>