<?php
include "../backend/myConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judgeId = $_POST['judgeId'];
    $gender = $_POST['gender'];
    $scores = $_POST['scores'];

    $tables = ['denimattire', 'formalattire', 'qanda', 'sportswear', 'swimsuitandtrunks'];
    
    foreach ($scores as $candidate => $scoreSet) {
        foreach ($scoreSet as $table => $score) {
            if (in_array($table, $tables)) {
                $sql = "UPDATE $table 
                        SET score = ? 
                        WHERE JudgeId = ? AND gender = ? AND candidate = ?";
                
                $stmt = $con->prepare($sql);
                $stmt->bind_param("diss", $score, $judgeId, $gender, $candidate);
                
                if (!$stmt->execute()) {
                    echo json_encode(["status" => "error", "message" => "Failed to update scores."]);
                    exit();
                }
            }
        }
    }

    echo json_encode(["status" => "success", "message" => "Scores updated successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$con->close();
?>
