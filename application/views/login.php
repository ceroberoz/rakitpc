<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>rakitpc | login</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/rakitpc/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php
            	$attribute = array('class' => 'form-signin');
             	echo form_open('auth/login',$attribute);
             ?>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="identity" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <?php echo form_close();?>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <SCRIPT TYPE="text/javascript">
    	$( document ).ready(function() {
		    // DOM ready

		    // Test data
		    /*
		     * To test the script you should discomment the function
		     * testLocalStorageData and refresh the page. The function
		     * will load some test data and the loadProfile
		     * will do the changes in the UI
		     */
		    // testLocalStorageData();
		    // Load profile if it exits
		    loadProfile();
		});

		/**
		 * Function that gets the data of the profile in case
		 * thar it has already saved in localstorage. Only the
		 * UI will be update in case that all data is available
		 *
		 * A not existing key in localstorage return null
		 *
		 */
		function getLocalProfile(callback){
		    var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
		    var profileName        = localStorage.getItem("PROFILE_NAME");
		    var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

		    if(profileName !== null
		            && profileReAuthEmail !== null
		            && profileImgSrc !== null) {
		        callback(profileImgSrc, profileName, profileReAuthEmail);
		    }
		}

		/**
		 * Main function that load the profile if exists
		 * in localstorage
		 */
		function loadProfile() {
		    if(!supportsHTML5Storage()) { return false; }
		    // we have to provide to the callback the basic
		    // information to set the profile
		    getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
		        //changes in the UI
		        $("#profile-img").attr("src",profileImgSrc);
		        $("#profile-name").html(profileName);
		        $("#reauth-email").html(profileReAuthEmail);
		        $("#inputEmail").hide();
		        $("#remember").hide();
		    });
		}

		/**
		 * function that checks if the browser supports HTML5
		 * local storage
		 *
		 * @returns {boolean}
		 */
		function supportsHTML5Storage() {
		    try {
		        return 'localStorage' in window && window['localStorage'] !== null;
		    } catch (e) {
		        return false;
		    }
		}

		/**
		 * Test data. This data will be safe by the web app
		 * in the first successful login of a auth user.
		 * To Test the scripts, delete the localstorage data
		 * and comment this call.
		 *
		 * @returns {boolean}
		 */
		function testLocalStorageData() {
		    if(!supportsHTML5Storage()) { return false; }
		    localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" );
		    localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
		    localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
		}
    </SCRIPT>
  </body>
</html>