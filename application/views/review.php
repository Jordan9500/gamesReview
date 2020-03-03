<html>    
    <body>
        <div class="container">
            <div class="row">
                <?php
                    $base = base_url();
                    $commentAdd = false;
                    foreach ($result as $row) {
                        // These classes onlywork if you attach Bootstrap.
                        echo <<<_END
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <img class="rounded img-fluid" src="$base/images/$row->ReviewImage" alt="Game Image" style="width: 360px;">
                                    </div>
                                    <div class="col">
                                        <div class="card-block px-2">
                                            <h4 class="card-title">
                                                Game: 
                                                <small>$row->GameName</small>
                                            </h4>
                                            <p class="card-text"><strong>Game Blurb: </strong>$row->GameBlurb</p>
                                            <p class="card-text"><strong>Game Review: </strong></p>
                                            <p class="card-text">$row->GameReview</p>
                                        </div>
                                    </div>
                                </div>
                        _END;
                        if($row->GameComments_YN == 'Y') {
                            if($userExists) {
                                echo <<<_END
                                    <div class="card mb-2">
                                        <h5 class="card-header">Add Comment</h5>
                                        <div class="card-body">
                                            <form method="post" action="$base/index.php/addComment/$row->GameName">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Enter Comment" name='addedComment' type='text'>
                                                </div>
                                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Comment" name="login_submit" >
                                            </form>
                                        </div>
                                    </div>
                                _END;
                            }
                            echo <<<_END
                                <div class='card-footer w-100 text-muted'>
                                    <h4>Comments: </h4>
                            _END;
                            foreach ($commentResult as $commentRow) {
                                echo <<<_END
                                    <div class="card mb-2">
                                        <h5 class="card-header">$commentRow->UserName</h5>
                                        <div class="card-body">
                                            <p class="card-text">$commentRow->UserComment</p>
                                        </div>
                                    </div>
                                _END;
                            }
                        }
                        else {
                            echo "
                            <div class='card-footer w-100 text-muted'>
                                <h4 class='text-center'>Comments Disabled</h4>
                            ";
                        }   
                        echo <<<_END
                                </div>
                            </div>
                        _END;
                    }
                    ?>
            </div>
        </div>
        
    </body>


    <!-- Load in the required scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Adding Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.22/dist/vue.js"></script>
    


    <!-- Load in your custom scripts -->

</html>