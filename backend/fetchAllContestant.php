<?php
session_start();
include "../backend/myConnection.php";

function fetchAllContestants($con) {
    $sql = "SELECT * FROM contestants";
    $result = mysqli_query($con, $sql);
    $contestants = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $contestants[] = $row;
        }
    }
    
    echo json_encode($contestants);
}

fetchAllContestants($con);
?>
