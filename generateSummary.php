<?php
include "myConnection.php";

$tables = ['denimattire', 'formalattire', 'qanda', 'sportswear', 'swimsuitandtrunks'];
$judges = [];

foreach ($tables as $table) {
    $sql = "SELECT JudgeId, gender, candidate, SUM(score) as total_score
            FROM $table
            GROUP BY JudgeId, gender, candidate";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $judgeId = $row['JudgeId'];
            $gender = $row['gender'];
            $candidate = $row['candidate'];
            $score = $row['total_score'];

            if (!isset($judges[$judgeId])) {
                $judges[$judgeId] = ['male' => [], 'female' => []];
            }

            if (!isset($judges[$judgeId][$gender][$candidate])) {
                $judges[$judgeId][$gender][$candidate] = 0;
            }

            $judges[$judgeId][$gender][$candidate] += $score;
        }
    }
}

foreach ($judges as $judgeId => $genders) {
    echo '<h2 class="fst-italic text-center text-white">Judge ID: ' . htmlspecialchars($judgeId) . '</h2>';
    echo ' <h2 class="fst-bold text-center text-white">Overall Score(100 Points)</h2>';
    // Male candidates table
    echo '<h4 class="fst-bold text-center text-white">Male Candidates</h4>';
    echo '<table class="table table-bordered">';
    echo '<thead>
            <tr>
                <th>Candidate</th>
                <th>Gender</th>
                <th>Total Score</th>
                <th>Rank</th>
            </tr>
          </thead>';
    echo '<tbody>';
    
    $maleCandidates = $genders['male'];
    arsort($maleCandidates);  // Sort by total score in descending order
    $rank = 1;
    foreach ($maleCandidates as $candidate => $totalScore) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($candidate) . '</td>';
        echo '<td>Male</td>';
        echo '<td>' . htmlspecialchars(number_format($totalScore, 2)) . '</td>';
        echo '<td>' . $rank++ . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    // Female candidates table
    echo '<h4 class="fst-bold text-center text-white">Female Candidates</h4>';
    echo '<table class="table table-bordered">';
    echo '<thead>
            <tr>
                <th>Candidate</th>
                <th>Gender</th>
                <th>Total Score</th>
                <th>Rank</th>
            </tr>
          </thead>';
    echo '<tbody>';
    
    $femaleCandidates = $genders['female'];
    arsort($femaleCandidates);  // Sort by total score in descending order
    $rank = 1;
    foreach ($femaleCandidates as $candidate => $totalScore) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($candidate) . '</td>';
        echo '<td>Female</td>';
        echo '<td>' . htmlspecialchars(number_format($totalScore, 2)) . '</td>';
        echo '<td>' . $rank++ . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

$con->close();
?>
