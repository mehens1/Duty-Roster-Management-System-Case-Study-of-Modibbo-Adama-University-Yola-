<?php
    // Establish database connection (replace these variables with your DB credentials)
    include "../includes/db.php";

    $query = "SELECT 
                dp.duty_post_id,
                dp.duty_position_id,
                dp.staff_on_morning_duty_id,
                dp.staff_on_night_duty_id,
                dp.week_number,
                dp.year,
                position.*,
                morning_user.user_id AS morning_user_id,
                morning_user.first_name AS morning_first_name,
                morning_user.last_name AS morning_last_name,
                morning_user.other_name AS morning_other_name,
                morning_user.email AS morning_email,
                morning_user.phone_number AS morning_phone_number,
                morning_rank.rank AS morning_user_rank_name,
                morning_user.address AS morning_address,
                night_user.user_id AS night_user_id,
                night_user.first_name AS night_first_name,
                night_user.last_name AS night_last_name,
                night_user.other_name AS night_other_name,
                night_user.email AS night_email,
                night_user.phone_number AS night_phone_number,
                night_rank.rank AS night_user_rank_name,
                night_user.address AS night_address
            FROM 
                duty_post dp
            JOIN 
                duty_positions position ON dp.duty_position_id = position.position_id
            JOIN 
                users morning_user ON dp.staff_on_morning_duty_id = morning_user.user_id
            LEFT JOIN 
                ranks morning_rank ON morning_user.rank_id = morning_rank.rank_id
            LEFT JOIN 
                users night_user ON dp.staff_on_night_duty_id = night_user.user_id
            LEFT JOIN 
                ranks night_rank ON night_user.rank_id = night_rank.rank_id
            WHERE
                dp.week_number = WEEK(NOW()) AND dp.year = YEAR(NOW())";

    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Return JSON encoded data to be used in DataTables
    echo json_encode(array('data' => $data));
?>