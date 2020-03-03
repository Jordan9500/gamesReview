<html>    
    <body>
        <div class="container">
            <div class="row">
                <?php
                    $base = base_url();
                    foreach ($result as $row) {
                        // These classes onlywork if you attach Bootstrap.
                        echo <<<_END
                            <div class="card-group">
                                <div class="card text-white bg-dark" style="width: 360px; margin: 5px;">
                                    <img class="card-img-top" src="$base/images/$row->ReviewImage" alt="Card image cap">
                                    <div class="card-header">
                                        <h3>
                                            Game: 
                                            <small>$row->GameName</small>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Game Blurb: </strong>$row->GameBlurb</p>
                                        <p><strong>Game Review: </strong></p>
                                        $row->GameReview
                                    </div>
                                    <a class='btn btn-outline-primary btn-lg' href="$base/index.php/review/$row->GameName">View More!</a>
                                </div>
                            </div>
                        _END;
                    }
                    ?>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary fixed-bottom" data-toggle="modal" data-target="#chatMenu">
        Chat
        </button>

        <!-- Modal -->
        <div class="modal fade" id="chatMenu" tabindex="-1" role="dialog" aria-labelledby="chatMenuTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatMenuTitle">Chat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Create an output for the chat service -->
                        <div id = "chatspace">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form>
                            <input type="text" id="message" placeholder="Message" autocomplete="off" autofocus>
                            <button id="sendbutton" class="btn btn-secondary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </body>


    <!-- Load in the required scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Adding Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.22/dist/vue.js"></script>

    <!-- Don't forget to load in Vue abd socket.io -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src=<?php echo base_url("scripts/chat.js"); ?>></script>

    


    <!-- Load in your custom scripts -->

</html>