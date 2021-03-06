<?php

	$error = "";
	$successMessage = "";

	if($_POST){
	
	
	if(!$_POST["email"]){
		
		$error .= "An email address is required.<br>";
		
	}
	
	if(!$_POST["content"]){
		
		$error .= "A content field is required.<br>";
		
	}
	
	if(!$_POST["subject"]){
		
		$error .= "The subject is required.<br>";
		
	}
	
	if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
		
		$error .= "The email address is invalid.<br>";
		
	}
	
	if($error != ""){
		
		$error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form</strong></p>' . $error . ' </div>';
		
	}else{
		
		$emailTo = "urvapatel1@gmail.com";
		
		$subject = $_POST['subject'];
		
		$content = $_POST['content'];
		
		$headers = "From: ".$_POST['email'];
		
		if (mail($emailTo, $subject, $content, $headers)) {
			
			$successMessage = '<div class="alert alert-success" role="alert">Your message was sent, I\'ll get back to you ASAP!</div>';
			
		}else{
			
			$error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</strong></p></div>';
			
		}
		
	}
		
	}
	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/3f406e8389.js"></script>
  
   <style>

 body {
    overflow-x: hidden;
	background-color:#eceeef;
	
 }
 
 #verticalLine{
	 border-right: thick solid #DCDCDC;
 }
 
 .display-4{
	 font-size: 35px;
 }

/* Toggle Styles */



#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
	border: 1px solid #3B3738;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
	overflow-x: hidden;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}


/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

#list1{

	text-indent: 10px;

}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

#col1{

padding-right:0;

}

#col2{

padding-left:0;

}

#pic1{



}

@media(min-width:768px) {
    #wrapper {
        padding-left: 200px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 200px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}
  
  </style>
  
  
  </head>
 
  
  
  <body>
	
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        Home
                    </a>
                </li>
                <li>
                    <a href="AboutMe.html">About me</a>
                </li>
				<li id="list1">
                    <a href="#" data-target="#item2" data-toggle="collapse"><i class="fa fa-caret-down"></i> My Games</a>
                    <ul class="nav nav-stacked collapse left-submenu " id="item2">
                        <li><a href="Asteroid.html">Asteroid</a></li>
						<li><a href="Bouncy.html">Bouncy Ball</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="Workout.html">Workout</a>
                </li>
                <li>
                    <a href="Basketball.html">Basketball</a>
                </li>
                
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		<nav class="navbar navbar-top navbar-light bg-faded" id="nav1">
						<button href="#menu-toggle" class="btn btn-p" id="menu-toggle"><i class="fa fa-caret-left" aria-hidden="true"></i> Toggle Menu</button>
						<form class="form-inline float-lg-right">
						<a href="https://www.linkedin.com/in/urva-patel-a0a25a113"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
						<a href="https://www.facebook.com/urva.patel1"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						</form>
		</nav>
		<div id="error"><? echo $error.$successMessage; ?></div>
		<div class="row">
		<div class="col-sm-12" id="col1">
		<div class="jumbotron">
					<h1 class="display-3">Welcome to my website!</h1>
						<p class="lead">This website is mainly for practice purposes, I made it from scratch using bootstrap 4, Jquery, and css. Feel free to look around!</p>
						<hr class="my-2">
						<div class="row">
						<div class="col-sm-3" id="verticalLine">
						<p>My contact information:</p>
						<p class="lead">
						<a href="https://www.facebook.com/urva.patel1"><i class="fa fa-facebook-official fa-5x"></i></a>
						<a href="https://www.linkedin.com/in/urva-patel-a0a25a113"><i class="fa fa-linkedin-square fa-5x"></i></a>
						<p> Email: urvapatel1@gmail.com</p>
						<p> Phone: (613)-400-8928</p>
						</div>
						<div class="col-sm-4">
						<div class="container">
							<h2 class="display-4">Send me an Email!</h2>
							
							<form method="post">
						  <div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter your email">
							<small id="emailHelp" class="form-text text-muted">Your email will not be shared with anyone else.</small>
						  </div>
						  <div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" class="form-control" id="subject" name="subject">
						  </div>
						  </div>
						  </div>
						  
						 <div class="col-sm-5">
						<div class="container">
						  <div class="form-group">
						  
							<label for="exampleTextarea">What would you like to ask me?</label>
							<textarea class="form-control" id="content" name="content" rows="8"></textarea>
						  </div>
						  
						  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
						</form>
						  <div>
						</div>
						</div>
						
						</p>
				</div>
				</div>
				</div>
        <div id="page-content-wrapper">
		
            <div>
				
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
	  
    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	
	
	<script type="text/javascript">
	
	
	
	$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
	
	$("form").submit(function (e) {
	  
	  var error = "";
	  
	  if($("#email").val() == "") {
	  
		error += "The email field is required.<br>"
	  
	  }
	  
	  if($("#subject").val() == "") {
	  
		error += "The subject field is required.<br>"
	  
	  }
	  
	  if($("#content").val() == "") {
	  
		error += "The content field is required."
	  
	  }
	  
	  if (error != ""){
		  
		  e.preventDefault();
		  $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form</strong></p>'+ error +' </div>');
		  
	  } else{
		  
		  $("form").unbind("submit").submit();
		  
	  }
	  
	});
	
	
	
	</script>
  </body>
</html>