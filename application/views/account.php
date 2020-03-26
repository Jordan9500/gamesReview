<html>
    <body>
    <!-- If the user exists then dont show the account detail infomation -->       
        <?php
            if($userExists == "True") {
        ?> 
        <div class="container justify-content-center">
            <div class="jumbotron my-auto">
                <div class="display-5">
                    <h2>User Details: </h2>
                    <div class="table-responsive">
                        <table class="table table-dark" style="width: 360px;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <!-- Take the user details and output into a table -->
                            <?php 
                                foreach($userDetails as $user) {
                                    echo <<<_END
                                        <tr>
                                            <td>User Name: </td>
                                            <td>$user->UserName</td>
                                        </tr>
                                        <tr>
                                            <td>Password: </td>
                                            <td>$user->UserPassword</td>
                                        </tr>
                                        <tr>
                                            <td>Dark Mode: </td>
                                            <td>$user->DarkMode</td>
                                        </tr>
                                    _END;
                                }
                            ?>
                        </table>
                    </div>
                    <a class="btn btn-lg btn-success btn-block" href="<?php echo base_url("index.php/account/edit");?>">Edit</a>
                </div>
            </div>
        </div>
        <!-- If it doesnt then show the user a login button -->
        <?php
            }
            else {
        ?>
        <div class="container justify-content-center">
            <div class="jumbotron my-auto">
                <div class="display-5">
                    <h1>You Are Not Logged In: </h1>
                    <a class="btn btn-lg btn-warning btn-block" href="<?php echo base_url("index.php/login")?>">Login Here!</a>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </body>
    <!-- Load in the required scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>