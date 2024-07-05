<?php
include "../backend/myConnection.php";

//Fetch table for the judge

// Function to fetch contestants by gender
function fetchContestants($gender) {
    global $con;

    $query = "SELECT id, name FROM contestants WHERE gender = '$gender'";
    $result = mysqli_query($con, $query);

    $contestants = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $contestants[] = [
                'id' => $row['id'],
                'name' => $row['name']
            ];
        }
    }

    return $contestants;
}

// Fetch male contestants
$maleContestants = fetchContestants('male');
// Fetch female contestants
$femaleContestants = fetchContestants('female');

$response = [
    'status' => 'success',
    'maleContestants' => $maleContestants,
    'femaleContestants' => $femaleContestants
];

header('Content-Type: application/json');
echo json_encode($response);
?>
