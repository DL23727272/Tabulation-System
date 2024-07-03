<?php
include "../backend/myConnection.php";

$response = [
    'status' => 'error',
    'message' => 'An error occurred while processing your request.'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['gender']) && isset($_POST['data']) && isset($_POST['judgeId'])) {
        $gender = $con->real_escape_string($_POST['gender']);
        $data = json_decode($_POST['data'], true);
        $judgeId = $con->real_escape_string($_POST['judgeId']); // Retrieve judgeId from POST data

        // Check if judge has already voted for formal attire
        $checkSql = "SELECT * FROM formalattire WHERE gender = '$gender' AND JudgeId = '$judgeId'";
        $result = $con->query($checkSql);

        if ($result && $result->num_rows > 0) {
            // Judge has already voted for this category
            $response['status'] = 'error';
            $response['message'] = 'You have already submitted your scores for this category.';
        } else {
            // Judge has not voted yet, proceed to insert scores
            if (is_array($data)) {
                $errors = [];
                foreach ($data as $item) {
                    $candidate = $con->real_escape_string($item['candidate']);
                    $score = $con->real_escape_string($item['score']);
                    $rank = $con->real_escape_string($item['rank']);

                    $sql = "INSERT INTO formalattire (gender, candidate, score, rank, JudgeId) VALUES ('$gender', '$candidate', '$score', '$rank', '$judgeId')"; // Include judgeId in the SQL query

                    if ($con->query($sql) !== TRUE) {
                        $errors[] = "Error: " . $con->error;
                    }
                }
                if (empty($errors)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Thank you for your response!';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = implode(', ', $errors);
                }
            } else {
                $response['message'] = 'Invalid data format.';
            }
        }
    } else {
        $response['message'] = 'Required fields are missing.';
    }
}

$con->close();
echo json_encode($response);
?>
