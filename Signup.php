<?php

    if(array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)){
        
        $link = mysqli_connect("localhost", "cl29-secretdi", "D-fnT^Hbz", "cl29-secretdi");
        if(mysqli_connect_error())
        {
            echo "There was an error connecting to the database.";
        } 
        
        if($_POST['email'] == ''){
            echo "<p>Email address is required.</p>";
        }else if ($_POST['password'] == ''){
            echo "<p>Password is required.</p>";
        }else{
            $query = "SELECT `id` FROM `users` WHERE email= '".mysqli_real_escape_string($link,$_POST['email'])."'"; 
            $result = mysqli_query($link,$query);
            if(mysqli_num_rows($result)> 0){
               echo "<p>The email address has already been taken.</p>"; 
            }else {
                $query= "INSERT INTO `users`(`email`,`password`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
                if(mysqli_query($link, $query)) {
                    echo "You have been signed up!";
                } else {
                    echo "There was a problem signing you up - please try again later.";
                }
            }
        }
        
    }
    
    
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

    
    </head>
    <body>
        <div class="container">
      
            <h1>Sign in/Log in</h1>
            <form method="post">
              <fieldset class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <small class="text-muted">We'll never share your email with anyone else.</small>
              </fieldset>
              <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" >
              </fieldset>
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    
    </body>


</html>
