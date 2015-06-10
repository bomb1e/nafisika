<?php
$connection = mysqli_connect("localhost","root","","")
		or die("Error ".mysqli_error($connection));
?>

<!DOCTYPE html>

<head>
 <title>Nafisika Trust Tracking Template</title>   
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/flat-ui.css" rel="stylesheet">
 <link href="css/demo.css" rel="stylesheet">
</head>
<body>
<div class="container">
 <div class="row">
    <div class="row">
    <div class="col-md-4"><button class="btn btn-block btn-lg btn-primary" onclick="javascript:inmatecheck();" name="exinmate" id="exinmate">Ex-Inmate</button></div>
    <div class="col-md-4"><button class="btn btn-block btn-lg btn-warning" onclick="javascript:volunteercheck();" name="volunteer" id="volunteer">Volunteer</button></div>
    <div class="col-md-4"><button class="btn btn-block btn-lg btn-inverse" onclick="javascript:interncheck();" name="intern" id="intern">Intern</button></div>
    </div>
    <!-- Intern -->
    <div id="internform" style="display:none">
    	<h3>Intern Information</h3>
    	<form action="index.php?type=intern" method="POST">
    		
                <label>Name: </label> <input class="form-control" type="text" name="name" id="name" required><br>
                <label>Gender: </label> <input class="custom-radio" data-toggle="radio" type="radio" name="gender" id="male">Male 
                                <input class="custom-radio" data-toggle="radio" type="radio" name="gender" id="female">Female<br>
                <label>Age: </label> <input class="form-control" type="number" name="age" id="age" required><br>
            
    		<label>Email:</label> <input class="form-control" type="email" placeholder="Enter your email" name="email" id="email" required><br>
    		<label>Phone Number:</label> <input class="form-control" type="text" placeholder = "254 (0) 722 123456" id="phone" name="phone" required><br>
    		<label>What is your role at Nafisika?</label> <input class="form-control" type="textarea" id="role" name="role" placeholder="counsellor,ICT, etc." required><br>
    		<label>What is the status of your role?</label><br> <select class="select2-container form-control select select-primary" id="role_status" name="role_status">
															  <option value="ongoing">On-going</option>
															  <option value="concluded">Concluded</option>
														</select><br>
			<label>Where do you study?</label> <input class="form-control" type="text" id="work" name="work" required><br>
    		<button type="submit" class="btn btn-block btn-lg btn-info">Submit</button>
    	</form>
    </div>
    <!-- Volunteer -->
    <div id="volunteerform" style="display:none">
        <h3>Volunteer Information</h3>
        <form action="index.php?type=volunteer" method="POST">
            
                <label>Name: </label> <input class="form-control" type="text" name="name" id="name" required><br>
                <label>Gender: </label> <input class="custom-radio" data-toggle="radio" type="radio" name="gender" id="male">Male               
                                <input class="custom-radio" data-toggle="radio" type="radio" name="gender" id="female">Female<br>
                <label>Age: </label> <input class="form-control" type="number" name="age" id="age" required><br>
            
            <label>Email:</label> <input class="form-control" type="email" placeholder="Enter your email" name="email" id="email" required><br>
            <label>Phone Number:</label> <input class="form-control" type="text" placeholder = "254 (0) 722 123456" id="phone" name="phone" required><br>
            <label>What is your role at Nafisika?</label> <input class="form-control" type="textarea" id="role" name="role" placeholder="counsellor,ICT, etc." required><br>
            <label>What is the status of your role?</label><br> <select class="select2-container form-control select select-primary" id="role_status" name="role_status">
                                                              <option value="ongoing">On-going</option>
                                                              <option value="concluded">Concluded</option>
                                                        </select><br>
            <label>Where do you work/study?</label> <input class="form-control" type="text" id="work" name="work" required><br>
            <button type="submit" class="btn btn-block btn-lg btn-info">Submit</button>
        </form>
    </div>
    <!-- ExInmate -->
    <div id="exinmateform" style="display:none">
        <h3>Ex-Inmate Information</h3>
        <form action="index.php?type=exinmate" method="POST">
            
                <label>Name: </label> <input class="form-control" type="text" name="name" id="name" required><br>
                <label>Gender: </label> <input class="custom-radio" data-toggle="radio" type="radio" name="gender" id="male">Male 
                                <input class="custom-radio" data-toggle="radio" type="radio" name="gender" id="female">Female<br>
                <label>Age: </label> <input class="form-control" type="number" name="age" id="age" required><br>
            
            <label>Email:</label> <input class="form-control" type="email" placeholder="Enter your email" name="email" id="email" required><br>
            <label>Phone Number:</label> <input class="form-control" type="text" placeholder = "254 (0) 722 123456" id="phone" name="phone" required><br>
            <label>What was your release date?</label> <input class="form-control" type="date" id="role" name="role" required><br>
            <label>Which is your prior prison?</label><br> <select class="select2-container form-control select select-primary" id="role_status" name="role_status">
                                                              <option value="kamiti">Kamiti Maximum Prison</option>
                                                              <option value="langata">Lang'ata Womens Prison</option>
                                                              <option value="remand">Remand Prison</option>
                                                              <option value="nairobiwest">Nairobi West Prison</option>
                                                        </select><br>
            <label>Where do you work/study?</label> <input class="form-control" type="text" id="work" name="work" required><br>
            <button type="submit" class="btn btn-block btn-lg btn-info">Submit</button>
        </form>
    </div>
    </div>
</div>
</body>

<?php 
if (isset($_GET["type"])) {

    $type = $_GET["type"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone_number =$_POST["phone"];
    $role = $_POST["role"];
    $role_status = $_POST["role_status"];
    $work_study = $_POST["work"];

    // exinmate query
    if ($type=="exinmate") {

        $query = "INSERT INTO exinmate (name,age,gender,email,phone_number,release_date,prior_prison,work_study)
                    values ('$name','$age','$gender','$email','$phone_number','$role','$role_status','$work_study') ";
        echo "<div class='row container'>";
        if (mysqli_query($connection, $query)) {
            echo "Thank You for Your Submission";
            } 
            else {
                echo "Something went wrong :(";
            }
            echo '<a href="/nafisika"><button class="btn btn-block btn-lg btn-info">New Record</button></a>';
            echo "</div>";
        mysqli_close($connection);
    }
    // intern query
    if ($type=="intern") {
        $query = "INSERT INTO intern (name,age,gender,email,phone_number,role,role_status,study)
                    values ('$name','$age','$gender','$email','$phone_number','$role','$role_status','$work_study')";
        if (mysqli_query($connection, $query)) {
            echo "Thank You for Your Submission";
            } 
            else {
                echo "Something went wrong :(";
            }
            echo '<a href="/nafisika"><button class="btn btn-block btn-lg btn-info">New Record</button></a>';

        mysqli_close($connection);
    }
    // volunteer query
    if ($type=="volunteer") {
        $query = "INSERT INTO volunteer (name,age,gender,email,phone_number,role,role_status,work_study)
                    values ('$name','$age','$gender','$email','$phone_number','$role','$role_status','$work_study') ";
        echo "<div class='row container'>";
        if (mysqli_query($connection, $query)) {
            echo "Thank You for Your Submission";
            } 
            else {
                echo "Something went wrong :(";
            }
            echo '<a href="/nafisika"><button class="btn btn-block btn-lg btn-info">New Record</button></a>';
            echo "</div>";
        mysqli_close($connection);
    }
    
}
 ?>
<script type="text/javascript">
function volunteercheck() {
    if (document.getElementById('volunteer').onclick) {
    	document.getElementById('volunteerform').style.display = 'block';
        document.getElementById('intern').disabled = 'disabled';
        document.getElementById('exinmate').disabled = 'disabled';
    }
    else {
    	document.getElementById('volunteerform').style.display = 'none';
    }
}
function interncheck(){
	if (document.getElementById('intern').onclick){
    	document.getElementById('internform').style.display = 'block';
        document.getElementById('volunteer').disabled = 'disabled';
        document.getElementById('exinmate').disabled = 'disabled';
	}
	else {
    	document.getElementById('internform').style.display = 'none';
    }
}
function inmatecheck(){
	if (document.getElementById('exinmate').onclick) {
        document.getElementById('exinmateform').style.display = 'block';
        document.getElementById('intern').disabled = 'disabled';
        document.getElementById('volunteer').disabled = 'disabled';
    }
	else {
    	document.getElementById('exinmateform').style.display = 'none';
	}
}
</script>
