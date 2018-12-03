<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Barry Seroff - Flute, Guitar, Shakuhachi Music for All Occasions</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/contact.css">
		<link href="img/barry_favicon_2.jpg" rel="icon">
	</head>



	<body>
		<div class="container p-0">
		
		    <!-- H E A D  S E C T I O N -->		
            <ul class="flex-container nav-container">
                <li class="flex-item" id="flex-image">
                    <img src="img/barry_favicon_2.jpg" style="margin:auto; border-radius:20px 0 0 0;" width="200px" height="200px">
                </li>
                
                <li class="flex-item" id="flex-list">
                    <ul style="margin:auto;list-style:none;padding:0;width:100%;height:100%;text-align: center;font-size:1.5rem;font-family: gogoia-regular;">
                        <li class="flex-list-item" style="padding-top: 5px;">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="flex-list-item" style="padding-top: 5px;">
                            <a href="music.html">Music</a>
                        </li>
                        <li class="flex-list-item" style="padding-top: 5px;">
                            <a href="testimonials.html">Testimonials</a>
                        </li>
                        <li class="flex-list-item" style="padding-top: 5px;">
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </li>         
            </ul>

		    <!-- M A I N  S E C T I O N -->
            
           
            <div class="container-fluid main-div">
                <div class="row">
                    <div class="col-md-5 p-5">
                        <img src="img/barry_headshot.jpg" class="img-fluid" alt="Barry Headshot">
                        <ul class="social-media">
                            <li><a href="https://www.facebook.com/barryseroff" target="_blank"><img src="img/socmed/facebook.svg" alt="Facebook Icon"></a></li>
                            <li><a href="https://twitter.com/barryseroff" target="_blank"><img src="img/socmed/twitter.svg" alt="Twitter Icon"></a></li>
                            <li><a href="https://www.instagram.com/barryseroff" target="_blank"><img src="img/socmed/instagram.svg" alt="Instagram Icon"></a></li>
                            <li><a href="https://www.youtube.com/channel/user/BarrySeroff" target="_blank"><img src="img/socmed/youtube.svg" alt="Youtube Icon"></a></li>
                        </ul>
                    </div>
                    
                    <?php 
                    // define some variables
                    $firstNameErr = $lastNameErr = $emailErr = "";
                    $firstname = $lastname = $email = $subject = "";
                    $firstname_ok = $lastname_ok = $email_ok = $subject_ok = false;
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["firstname"])) {
                        $firstNameErr = "First name is required";
                      } else {
                        $name = test_input($_POST["firstname"]);
                        // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                          $nameErr = "Only letters and white space allowed"; 
                        } else {
                            $firstname_ok = true;
                        }
                      }
                        
                     
                      if (empty($_POST["lastname"])) {
                          $lastNameErr = "Last name is required";
                      } else {
                          $name = test_input($_POST["lastname"]);
                        // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                          $nameErr = "Only letters and white space allowed"; 
                        } else {
                            $lastname_ok = true;
                        }
                      }

                      if (empty($_POST["email"])) {
                          $emailErr = "Email is required";
                      } else {
                          $email = test_input($_POST["email"]);
                        // check if e-mail address is well-formed
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                          $emailErr = "Invalid email format"; 
                        } else {
                            $email_ok = true;
                        }
                      }

                      if (empty($_POST["subject"])) {
                        $comment = "";
                      } else {
                        $subject = test_input($_POST["subject"]);
                          $subject_ok = true;
                      }
                    }
                    
                    function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                    ?>

                    <div class="col-md-7 p-5">
                        <h1 class="display-2">Contact</h1>
                        <p style="margin-bottom:0;">
                            Please fill out this form for questions, comments, prices, and availability.
                        </p>
                        <p class='err-msg'>
                            '*' marks required fields.
                        </p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <span class="err-msg">* <?php echo $firstNameErr;?></span>
                                <input type="text" name="firstname" placeholder="First Name" value="<?php echo $firstname;?>">
                                <span class="err-msg">* <?php echo $lastNameErr;?></span>
                                <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $lastname;?>">
                                <span class="err-msg">* <?php echo $emailErr;?></span>
                                <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
                                
                                <textarea id="subject" name="subject" placeholder="Write something here..." value="<?php echo $subject;?>"></textarea>
                                <input type="submit" name="Submit">
                          </form>
                        
                        <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && $firstname_ok == true && $lastname_ok == true && $email_ok == true && $subject_ok == true) {
                            include 'php-contact-form-ex.php';
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>