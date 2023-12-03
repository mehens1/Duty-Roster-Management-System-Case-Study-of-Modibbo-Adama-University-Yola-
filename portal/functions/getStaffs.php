<?php
    // Establish database connection (replace these variables with your DB credentials)
    include "../includes/db.php";

    // Fetch data from the database
    $sql = "SELECT users.*, ranks.rank
            FROM users
            JOIN ranks ON users.rank_id = ranks.rank_id";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Return JSON encoded data to be used in DataTables
    echo json_encode(array('data' => $data));
?>