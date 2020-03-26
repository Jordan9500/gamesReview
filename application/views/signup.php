<html>
    <body>        
        <div class="container justify-content-center">
            <div class="jumbotron my-auto">
                <div class="display-5">
                    <h3>Register here:</h3>
                    <!-- Form for signing up the users -->
                    <form method="post" action="<?php echo base_url('index.php/signup/setUser'); ?>">
                        <div class="form-group">
                            <input class="form-control" placeholder="Enter Username" name="username" type="username" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Enter Password" name="password" type="password">
                        </div>
                        <div class="form-group">                        
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="darkmode" name="darkMode" value="Dark">
                                <label class="form-check-label" for="darkmode">Dark Mode?</label>
                            </div>
                        </div>

                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register_submit" >
                        <?php
                            /* If the username exists tell them its invalid */
                            if($userExists == "True") {
                                echo "<h4 class='text-center'>Cannot Accept Username/Password</h4>";
                            } 
                        ?>

                        <h4 class="text-center"><b>Already Registered?</b><br> 
                        <a href="<?php echo base_url('index.php/login'); ?>">Login Here</a></h4>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <!-- Load in the required scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>