<?php
include "../backend/myConnection.php";

$response = [
    'status' => 'error',
    'message' => 'An error occurred while processing your request.'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check for required fields
    if (isset($_POST['data']) && isset($_POST['judgeId'])) {
        $data = json_decode($_POST['data'], true);
        $judgeId = $con->real_escape_string($_POST['judgeId']); 

        // Check if data is an array
        if (is_array($data)) {
            $errors = [];
            foreach ($data as $item) {
                $gender = $con->real_escape_string($item['gender']);
                $candidate = $con->real_escape_string($item['candidate']);
                $score = $con->real_escape_string($item['score']);
                $rank = $con->real_escape_string($item['rank']);

                // Check if judge has already voted for this gender and candidate
                $checkSql = "SELECT * FROM sportswear WHERE gender = '$gender' AND JudgeId = '$judgeId' AND candidate = '$candidate'";
                $result = $con->query($checkSql);

                if ($result && $result->num_rows > 0) {
                    // Judge has already voted for this candidate
                    $errors[] = "You have already submitted your scores for $gender category.";
                } else {
                    // Judge has not voted yet, proceed to insert scores
                    $sql = "INSERT INTO sportswear (gender, candidate, score, rank, JudgeId) 
                            VALUES ('$gender', '$candidate', '$score', '$rank', '$judgeId')";

                    if ($con->query($sql) !== TRUE) {
                        $errors[] = "Error: " . $con->error;
                    }
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
    } else {
        $response['message'] = 'Required fields are missing.';
    }
} else {
    $response['message'] = 'Invalid request method.';
}

$con->close();
echo json_encode($response);
?>
