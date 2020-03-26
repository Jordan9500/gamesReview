<?php
class HomeModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    //Get for all games
    public function getGame() {
        // You can use the select, from, and where functions to simplify this as seen in Week 13.
        $query = $this->db->query("SELECT * FROM activereviews");
        return $query->result();
    }

    //Get the details for a game once it has been clicked on.
    public function getReview($slug = FALSE) {
        $this->db->select('*');
        $this->db->from('activereviews');
        $this->db->where('GameName', $slug);
        $query = $this->db->get();  

        return $query->result();
    }

    //Get the comments for a game once it has been clicked on.
    public function getReviewComments($slug = FALSE) {
        $query = $this->db->query("
            SELECT users.UserName, gamescomments.UserComment 
            FROM activereviews 
            INNER JOIN gamescomments 
            ON ID = gamescomments.ReviewID 
            INNER JOIN users 
            ON UserID = users.UID 
            WHERE activereviews.GameName = '$slug'
            ORDER BY gamescomments.UID Desc
        ");
        return $query->result();
    }


}