<?php
session_start();
include "../backend/myConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contestantID = $_POST['contestantID'];

    $sql = "DELETE FROM contestants WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $contestantID);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Contestant deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete contestant.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
