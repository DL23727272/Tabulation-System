<?php
include "../backend/myConnection.php";

if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['address']) && isset($_POST['gender']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    // Handle image upload
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image = $targetFile;
    } else {
        $response = [
            'status' => 'error',
            'message' => 'There was an error uploading the image.'
        ];
        echo json_encode($response);
        exit();
    }

    $query = "INSERT INTO contestants (name, age, address, gender, image)
              VALUES ('$name', '$age', '$address', '$gender', '$image')";

    if (mysqli_query($con, $query)) {
        $response = [
            'status' => 'success',
            'message' => 'Contestant added successfully!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to add contestant: ' . mysqli_error($con)
        ];
    }
    mysqli_close($con);
} else {
    $response = [
        'status' => 'error',
        'message' => 'All fields are mandatory'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
