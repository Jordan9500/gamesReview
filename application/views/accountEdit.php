<html>
    <body> 
        <div class="container justify-content-center">
            <div class="jumbotron my-auto">
                <div class="display-5">
                    <h2>Edit Details: </h2>    
                    <?php 
                        /* Set up a form for the user to alter the infomation */
                        foreach($userDetails as $user) {
                            $baseUpdate = base_url('index.php/account/update');
                            $baseAcc = base_url('index.php/account');
                            echo <<<_END
                                <form method="post" action="$baseUpdate">
                                    <div class="form-group">
                                        <input class="form-control" value="$user->UserName" name="username" type="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" value="$user->UserPassword" name="password" type="password">
                                    </div>
                                    <div class="form-group">                        
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="darkmode" name="darkMode" value="Dark">
                                            <label class="form-check-label" for="darkmode">Dark Mode?</label>
                                        </div>
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Update">
                                </form>
                                <a class='btn btn-outline-primary btn-lg' href="$baseAcc">Cancel</a>
                            _END;
                            /* If the username exists in the database say it isnt accepted */
                            if($userExists == "True") {
                                echo "<h4 class='text-center'>Cannot Accept Username/Password</h4>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
    <!-- Load in the required scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>