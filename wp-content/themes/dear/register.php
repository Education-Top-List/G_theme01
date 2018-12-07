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
    background: url('/wp-content/themes/dear/images/bg_register.jpg') fixed;
    background-size: cover;
    padding: 0;
    margin: 0;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */

.register {
    position: absolute;
    top: 35%;
    padding: 0px 6% 20px 6%;
    background: rgb(225, 222, 222);
    border: 1px solid rgba(147, 184, 189,0.8);
    border-radius: 20px;
}


.wrap {
    right: 0px;
    min-height: 560px;
    margin: 0px auto;
    width: 500px;
    position: relative;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 2px 0 10px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
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
            <div class="register">
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                    <h1>Sign Up</h1>
                    <hr>
                    <span><?php if (count($errors) > 0) {
                        foreach ($errors as $e) {
                          echo $e;
                          echo "<br>";
                        }
                    } ?></span>

                    <label for="username"><b>Username</b></label>  
                    <input type="text" name="username" id="username" placeholder="Tên Đăng Nhập" autocomplete="off">  

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Email" name="email" required autocomplete="off">

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Password" name="password" required autocomplete="off">

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="off">

                    <input name="terms" id="terms" type="checkbox" checked value="Yes">  
                    <label for="terms">I agree to the Terms of Service</label>  
                    <button type="submit" class="registerbtn">Register</button>
                    <hr>
                    <div class="container">
                        </a>Already have an account? <a href="<?php echo wp_login_url(); ?>">Sign in</a>.
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
 
  
