<?php
// I did it this way as i couldnt get the MVC to work with it


// Check if the comment has been posted
if (empty($_POST['comment'])) {

} else {
    // IF it has Run the function 
    AddComments();
}

//Below it connects to the database selects the UserID and GameID before inserting into the database and closing the connection
function AddComments() {
    // Load in your Models below.
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Games-Review";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $gameName = $_POST['gamename'];
    echo "$username + $comment + $gameName";

    $sql = "SELECT ID FROM activereviews WHERE GameName = '$gameName'";
    $reviewIDSQL = mysqli_query($conn, $sql);  

    $sql = "SELECT UID FROM users WHERE Username = '$username'";
    $userIDSQL = mysqli_query($conn, $sql);

    if (mysqli_num_rows($reviewIDSQL) > 0 && mysqli_num_rows($userIDSQL) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($reviewIDSQL)) {
            $reviewID = $row['ID'];
        }
        while($row = mysqli_fetch_assoc($userIDSQL)) {
            $userID = $row['UID'];
        }
    }

    echo "$userID, $reviewID, $comment"; 
    /* Insert the user data  */
    $sql = "insert into gamescomments (UserID, ReviewID, UserComment)
            values ('$userID', '$reviewID', '$comment')";
    if ($conn->query($sql) == 1)  {  
        echo "Row Inserted"; 
        return true;
    } else { 
        echo "Row Not Inserted $userID, $reviewID, $comment"; 
 
        return false;  
    }   
    $conn->close();
}
?>