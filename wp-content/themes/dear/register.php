<?php  
/* 
Template Name: Register 
*/  
   
global $wpdb, $user_ID;  
//Check whether the user is already logged in  
if ($user_ID) 
{  
   
    // They're already logged in, so we bounce them back to the homepage.  
   
    header( 'Location:' . admin_url() );  
   
} else
 {  
   
    $errors = array();  
   
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
      {  
   
        // Check username is present and not already in use  
        $username = $wpdb->escape($_REQUEST['username']);  
        if ( strpos($username, ' ') !== false )
        {   
            $errors['username'] = "Sorry, no spaces allowed in usernames";  
        }  
        if(empty($username)) 
        {   
            $errors['username'] = "Please enter a username";  
        } elseif( username_exists( $username ) ) 
        {  
            $errors['username'] = "Username already exists, please try another";  
        }  
   
        // Check email address is present and valid  
        $email = $wpdb->escape($_REQUEST['email']);  
        if( !is_email( $email ) ) 
        {   
            $errors['email'] = "Please enter a valid email";  
        } elseif( email_exists( $email ) ) 
        {  
            $errors['email'] = "This email address is already in use";  
        }  
   
        // Check password is valid  
        if(0 === preg_match("/.{6,}/", $_POST['password']))
        {  
          $errors['password'] = "Password must be at least six characters";  
        }  
   
        // Check password confirmation_matches  
        if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
         {  
          $errors['password_confirmation'] = "Passwords do not match";  
        }  
   
        // Check terms of service is agreed to  
        if($_POST['terms'] != "Yes")
        {  
            $errors['terms'] = "You must agree to Terms of Service";  
        }  
   
        if(0 === count($errors)) 
         {  
   
            $password = $_POST['password'];  
   
            $new_user_id = wp_create_user( $username, $password, $email );  
   
            // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
   
            $success = 1;  
   
            header( 'Location:' . admin_url() );  
   
        }  
   
    }  
}  
  
?>  
  
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

.container .register {
    position: absolute;
    top: 0px;
    width: 88%;
    padding: 18px 6% 60px 6%;
    margin: 0 0 35px 0;
    background: rgb(247, 247, 247);
    border: 1px solid rgba(147, 184, 189,0.8);
}


.wrap {
    right: 0px;
    min-height: 560px;
    margin: 0px auto;
    width: 600px;
    position: relative;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
</style>
</head>
    <body>
        <div class="wrap">
            <div class="container">
                <div class="register">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                        <h1>Register</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <span><?php if (count($errors) > 0) {
                            foreach ($errors as $e) {
                              echo $e;
                              echo "<br>";
                            }
                        } ?></span>

                        <label for="username"><b>Username</b></label>  
                        <input type="text" name="username" id="username" placeholder="Con thú omi">  

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="password_confirmation" required>

                        <input name="terms" id="terms" type="checkbox" checked value="Yes">  
                        <label for="terms">I agree to the Terms of Service</label>  

                        <hr>
                        <button type="submit" class="registerbtn">Register</button>

                        <div class="container">
                            <p>Already have an account? <a href="<?php echo wp_login_url(); ?>">Sign in</a></p>
                            <p><a href="<?php echo home_url(); ?>">Quay lại Yangradio.com</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
 
  
