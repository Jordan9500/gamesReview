<html>    
    <body>
        <div class="container">
            <div class="row">
                <?php
                    $base = base_url();
                    foreach ($result as $row) {
                        /* This outputs all the reviews in a card and sets up a button to drill into it */
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
        <!-- This the chat section -->
        <!-- Default dropup button -->
        <div class="fixed-bottom">
            <div class="btn-group dropup">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Chats
                </button>
                <div class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <!-- Open the chat -->
                    <button type="button" id="generalChatButton" class="btn btn-primary" data-toggle="modal" data-target="#generalChatMenu">General Chat</button>
                    <button type="button" id="gamingChatButton" class="btn btn-primary" data-toggle="modal" data-target="#gamingChatMenu">Gaming Chat</button>
                    <button type="button" id="adviceChatButton" class="btn btn-primary" data-toggle="modal" data-target="#adviceChatMenu">Advice Chat</button>

                </div>
            </div>
        </div>
        <!-- Modal 1: General Chat -->
        <div class="modal fade" id="generalChatMenu" tabindex="-1" role="dialog" aria-labelledby="chatMenuTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatMenuTitle">General Chat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Create an output for the chat service -->
                        <div id = "generalChatspace">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form id="generalForm">
                            <input type="text" id="generalMessage" placeholder="Message" autocomplete="off" autofocus>
                            <button id="sendbutton" class="btn btn-secondary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2: Gaming Chat -->
        <div class="modal fade" id="gamingChatMenu" tabindex="-1" role="dialog" aria-labelledby="chatMenuTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatMenuTitle">Gaming Chat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Create an output for the chat service -->
                        <div id = "gamingChatspace">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form id="gamingForm">
                            <input type="text" id="gamingMessage" placeholder="Message" autocomplete="off" autofocus>
                            <button id="sendbutton" class="btn btn-secondary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 3: Advice Chat -->
        <div class="modal fade" id="adviceChatMenu" tabindex="-1" role="dialog" aria-labelledby="chatMenuTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatMenuTitle">Advice Chat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Create an output for the chat service -->
                        <div id = "adviceChatspace">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form id="adviceForm">
                            <input type="text" id="adviceMessage" placeholder="Message" autocomplete="off" autofocus>
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