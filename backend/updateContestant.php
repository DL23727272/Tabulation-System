<?php
session_start();
include "../backend/myConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['contestantID'];
    $name = $_POST['contestantName'];
    $age = $_POST['contestantAge'];
    $address = $_POST['contestantAddress'];
    $gender = $_POST['contestantGender'];

    if ($_FILES['contestantImage']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['contestantImage']['tmp_name'])) {
        $image_name = $_FILES['contestantImage']['name'];
        $image_tmp = $_FILES['contestantImage']['tmp_name'];
        $image_path = '../uploads/' . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {

            $sql = "UPDATE contestants SET name=?, age=?, address=?, gender=?, image=? WHERE id=?";

            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssssi", $name, $age, $address, $gender, $image_path, $id);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Contestant updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update contestant in database.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
        }
    } else {
        $sql = "UPDATE contestants SET name=?, age=?, address=?, gender=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $name, $age, $address, $gender, $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Contestant updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update contestant in database.']);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
