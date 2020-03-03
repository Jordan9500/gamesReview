<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Link CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title><?php echo $title?></title>
        
        <!-- These classes onlywork if you attach Bootstrap. -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
            <a class="navbar-brand" href="">Game Reviews</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url("index.php/Home");?>"s>Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-lg-0">
                    <?php
                        if ($userExists) {
                            echo "<a class='btn btn-outline-primary mr-2' href=".base_url('index.php/Account').">Account</a>";
                            echo "<a class='btn btn-outline-primary' href=".base_url('index.php/Logout').">Log Out</a>";
                        }
                        else {
                            echo "<a class='btn btn-outline-primary' href=".base_url('index.php/Login').">Login</a>";
                        }
                    ?>
                        <input class="form-control m-2 my-sm-0" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </head>
</html>