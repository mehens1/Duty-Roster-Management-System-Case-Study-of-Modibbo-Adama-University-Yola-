<?php
    // Establish database connection
    include "../includes/db.php";

    $admin_id = $_GET['user_id'];;

    // Generate Week Number and Year
    $currentDay = date('w');

    if($currentDay == 0){
        $currentWeekNumber = date('W');
        $currentWeekNumber++;
    }else{
        $currentWeekNumber = date('W');
    }

    $currentYear = date('Y');

    // Fetch available staff IDs for morning and night duties
    $availableStaffQuery = "SELECT user_id FROM users WHERE is_admin = 0 AND user_id NOT IN (SELECT COALESCE(staff_on_morning_duty_id, staff_on_night_duty_id) FROM duty_post WHERE week_number = $currentWeekNumber AND year = $currentYear)";
    $availableStaffResult = $conn->query($availableStaffQuery);

    if ($availableStaffResult->num_rows > 0) {
        $availableStaff = array();
        while ($rowStaff = $availableStaffResult->fetch_assoc()) {
            $availableStaff[] = $rowStaff['user_id'];
        }
        
        $dutyPositionsQuery = "SELECT position_id FROM duty_positions WHERE position_id NOT IN (SELECT COALESCE(duty_position_id) FROM duty_post WHERE week_number = $currentWeekNumber AND year = $currentYear)";
        $dutyPositionsResult = $conn->query($dutyPositionsQuery);

        if ($dutyPositionsResult->num_rows > 0) {
            shuffle($availableStaff); // Shuffle the array of available staff
            while ($rowPositions = $dutyPositionsResult->fetch_assoc()) {
                // Get the first available staff for morning duty
                $morningStaff = array_shift($availableStaff);

                // Get the next available staff for night duty
                $nightStaff = array_shift($availableStaff);

                // Insert data into duty_post for each position
                $insertQuery = "INSERT INTO duty_post (duty_position_id, staff_on_morning_duty_id, staff_on_night_duty_id, week_number, year, created_by) VALUES ({$rowPositions['position_id']}, $morningStaff, $nightStaff, $currentWeekNumber, $currentYear, $admin_id)";

                if ($conn->query($insertQuery) !== TRUE) {
                    echo "Error inserting record: " . $conn->error;
                }
            }

            echo "Duty Roaster Generated Successfully!";
        } else {
            echo "No duty positions found without a staff attached!.";
        }
    } else {
        echo "No available staff found for this action, every staff is being booked for a duty position.";
    }

    $conn->close(); 
?>
