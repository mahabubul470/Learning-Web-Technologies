//dropdown
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

// Sidebar
var mySidebar = document.getElementById("mySidebar");
var overlayBg = document.getElementById("myOverlay");
function w3_open() {
  if (mySidebar.style.display === "block") {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = "block";
    overlayBg.style.display = "block";
  }
}
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function idAlert() {
  var x = document.forms["myForm"]["exampleInputEmail1"].value;

  if (x == "") {
    alert("ID must be filled out");
    return false;
  }
}

function idFocusFunction() {
  document.getElementById("exampleInputEmail1").style.background = "#beebec";
}

function passAlert() {
  var x = document.forms["myForm"]["exampleInputEmail1"].value;
  var y = document.forms["myForm"]["exampleInputPassword1"].value;

  if (x == "") {
    alert("ID must be filled out");
    return false;
  } else if (y == "") {
    alert("Password must be filled out");
    return false;
  }
}

function passFocusFunction() {
  document.getElementById("exampleInputPassword1").style.background = "#beebec";
}

function printMsg() {
  alert("You are about to print this document!");
}

//ajax
function checkId(oid) {
  if (oid.length == 0) {
    document.getElementById("oidErr").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("oidErr").innerHTML = this.responseText;
        document.getElementById("oid").style.borderColor = "red";
      }
    };
    xmlhttp.open("GET", "../controller/check.php?oid=" + oid, true);
    xmlhttp.send();
  }
}

function emailValidation(email) {
  console.log(email);
  if (oid.length == 0) {
    document.getElementById("oidErr").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("emailErr").innerHTML = this.responseText;
        document.getElementById("email").style.borderColor = "red";
      }
    };
    xmlhttp.open("GET", "../controller/check.php?email=" + email, true);
    xmlhttp.send();
  }
}

function searchTeacher(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      var output = "";
      for (var i in data) {
        output +=
          "<tr>" +
          '<td><a style="color:black" href="viewTeacher.php?oid=' +
          data[i].oid +
          ' "> ' +
          data[i].oid +
          "</a></td>" +
          "<td>" +
          data[i].name +
          "</td>" +
          "<td>" +
          data[i].email +
          "</td>" +
          "<td>" +
          data[i].dob +
          "</td>" +
          "<td>" +
          data[i].gender +
          "</td>" +
          '<td><a class="btn btn-primary" href="editTeacher.php?oid=' +
          data[i].oid +
          '">Edit</a>&nbsp<a class="btn btn-danger" href="../controller/deleteTeacher.php?o-id=' +
          data[i].oid +
          '">Delete</a></td>' +
          "</tr>";
      }
      document.getElementById("output-data").innerHTML = output;
    }
  };
  xmlhttp.open("GET", "../controller/searchTeacher.php?str=" + str, true);
  xmlhttp.send();
}

//validation
function nameValidation(name) {
  if (name.length === 0) {
    document.getElementById("nameErr").innerText = "Cannot be empty";
    document.getElementById("name").style.borderColor = "red";
  } else if (isNaN(name) === false) {
    document.getElementById("nameErr").innerText = "Must have letters";
    document.getElementById("name").style.borderColor = "red";
  } else if (name.length <= 2) {
    document.getElementById("nameErr").innerText =
      "Must have more than two charecters";
    document.getElementById("name").style.borderColor = "red";
  } else {
    document.getElementById("name").style.borderColor = "green";
    document.getElementById("nameErr").innerText = "";
  }
}

function passwordValidation(password) {
  var regex = new RegExp("(?=.*[!@#$%^&*])");
  if (password.length === 0) {
    document.getElementById("passErr").innerText = "Cannot be empty";
    document.getElementById("pass").style.borderColor = "red";
  } else if (password.length < 8) {
    document.getElementById("passErr").innerText =
      "Must have more than 7 charecters";
    document.getElementById("pass").style.borderColor = "red";
  } else if (regex.exec(password) == null) {
    document.getElementById("passErr").innerText =
      "Must have a special charecters";
    document.getElementById("pass").style.borderColor = "red";
  } else {
    document.getElementById("pass").style.borderColor = "green";
    document.getElementById("passErr").innerText = "";
  }
}

function rePassValidation(repass) {
  if (repass == document.getElementById("pass").value) {
    document.getElementById("repass").style.borderColor = "green";
    document.getElementById("repassErr").innerText = "";
  } else {
    document.getElementById("repassErr").innerText = "Password doesnt match";
    document.getElementById("repass").style.borderColor = "red";
  }
  if (repass.length === 0) {
    document.getElementById("repassErr").innerText = "Cannot be empty";
    document.getElementById("repass").style.borderColor = "red";
  }
}

/*function emailValidation(email) {
  var regex = new RegExp(
    "/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/"
  );
  if (email.length === 0) {
    document.getElementById("emailErr").innerText = "Cannot be empty";
    document.getElementById("email").style.borderColor = "red";
  } else {
    document.getElementById("email").style.borderColor = "green";
    document.getElementById("emailErr").innerText = "";
  }
}*/

function oidValidation(oid) {
  var x = document.getElementById("oidValErr").innerText;
  oid = oid.replace("-", "");
  if (isNaN(oid) === true && x != "") {
    document.getElementById("oidValErr").innerText = "Must have numbers";
    document.getElementById("oid").style.borderColor = "red";
  } else if (oid.length === 0) {
    document.getElementById("oidValErr").innerText = "Cannot be empty";
    document.getElementById("oid").style.borderColor = "red";
  } else {
    document.getElementById("oid").style.borderColor = "green";
    document.getElementById("oidValErr").innerText = "";
  }
}

function show_result(string) {
  if (string.length == 0) {
    return;
  }

  load_users(string);
}

function show_Quiz(string) {
  if (string.length == 0) {
    return;
  }
  load_Quiz(string);
}

function load_Quiz(string) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };

  xhr.open("GET", "../controller/viewAllQuiz.php?q=" + string, true);
  xhr.send();
}

function load_users(string) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };
  //since it is asyncronous
  xhr.open("GET", "../controller/viewTeacher.php?q=" + string, true);
  //send request
  xhr.send();
}

document.getElementById("allquiz").addEventListener("click", show_all_Quiz);

function show_all_Quiz(e) {
  e.preventDefault();
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };

  xhr.open("GET", "../controller/viewAllQuiz.php?data=all", true);

  xhr.send();
}

document.getElementById("viewall").addEventListener("click", showall);

function showall(e) {
  e.preventDefault();
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };

  xhr.open("GET", "../controller/viewTeacher.php?data=all", true);

  xhr.send();
}
