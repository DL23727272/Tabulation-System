<?php
include "../backend/myConnection.php";

$tables = ['denimattire',];
$candidates = ['male' => [], 'female' => []];

    foreach ($tables as $table) {
        $sql = "SELECT gender, candidate, SUM(score) as total_score
                FROM $table
                GROUP BY gender, candidate";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $gender = $row['gender'];
                $candidate = $row['candidate'];
                $score = $row['total_score'];

                if (!isset($candidates[$gender][$candidate])) {
                    $candidates[$gender][$candidate] = 0;
                }

                $candidates[$gender][$candidate] += $score;
            }
        }
    }

    echo '<h2 class="fst-italic text-center text-white">Overall Denim Summary</h2>';

    // Male candidates table
    echo '<h4 class="fst-italic text-center text-white">Male Candidates</h4>';
    echo '<table class="table table-bordered">';
    echo '<thead>
            <tr>
                <th>Candidate</th>
                <th>Total Score</th>
                <th>Rank</th>
            </tr>
        </thead>';
    echo '<tbody>';

    $maleCandidates = $candidates['male'];
    arsort($maleCandidates);  // Sort by total score in descending order
    $rank = 1;
    foreach ($maleCandidates as $candidate => $totalScore) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($candidate) . '</td>';
        echo '<td>' . htmlspecialchars(number_format($totalScore, 2)) . '</td>';
        echo '<td>' . $rank++ . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    // Female candidates table
    echo '<h4 class="fst-italic text-center text-white">Female Candidates</h4>';
    echo '<table class="table table-bordered">';
    echo '<thead>
            <tr>
                <th>Candidate</th>
                <th>Total Score</th>
                <th>Rank</th>
            </tr>
        </thead>';
    echo '<tbody>';

    $femaleCandidates = $candidates['female'];
    arsort($femaleCandidates);  // Sort by total score in descending order
    $rank = 1;
    foreach ($femaleCandidates as $candidate => $totalScore) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($candidate) . '</td>';
        echo '<td>' . htmlspecialchars(number_format($totalScore, 2)) . '</td>';
        echo '<td>' . $rank++ . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

$con->close();
?>
