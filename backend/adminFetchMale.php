<?php
session_start();
include "../backend/myConnection.php";

function fetchMaleContestants($con) {
    $sql = "SELECT * FROM contestants WHERE gender = 'Male'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $contestantHtml = '';
        $contestantCount = 0;

        // Start the container
        $contestantHtml .= '<div class="container mt-5">';
        $contestantHtml .= '<div class="row row-cols-1 row-cols-md-3 g-4">';

        while ($row = mysqli_fetch_assoc($result)) {
            $contestantID = $row['id'];

            $contestantHtml .= '
                <div class="col mt-5">
                    <div class="card h-100">
                        <div class="container mt-5 text-center">
                            <img src="uploads/'. $row['image'] .'" class="card-img-top" alt="Contestant Image" style="width: 200px; height: 250px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'. $row['name'] .'</h5>
                            <p class="card-text">Age: '. $row['age'] .'</p>
                            <p class="card-text"> '. $row['address'] .'</p>
                            <p class="card-text">Gender: '. $row['gender'] .'</p>
                            <div class="d-flex justify-content-between mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal'. $contestantID .'">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('. $contestantID .')">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal'. $contestantID .'" tabindex="-1" aria-labelledby="editModalLabel'. $contestantID .'" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"  style="background: rgba(255, 255, 255, 0.449); backdrop-filter: blur(10px);">
                            <div class="modal-header">
                                <img src="img/logo.png" alt="" style="width: 50px;">
                                <h5 class="modal-title" id="editModalLabel'. $contestantID .'">Edit Female Contestant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm'. $contestantID .'" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="contestantID" value="'. $contestantID .'">
                                    
                                    <div class="form-group row my-4">
                                        <label for="contestantName'. $contestantID .'" class="col-sm-3 col-form-label">Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="contestantName'. $contestantID .'" name="contestantName" value="'. $row['name'] .'" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="contestantAge'. $contestantID .'" class="col-sm-3 col-form-label">Age:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="contestantAge'. $contestantID .'" name="contestantAge" value="'. $row['age'] .'" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="contestantAddress'. $contestantID .'" class="col-sm-3 col-form-label">Address:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="contestantAddress'. $contestantID .'" name="contestantAddress" value="'. $row['address'] .'" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="contestantGender'. $contestantID .'" class="col-sm-3 col-form-label">Gender:</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="contestantGender'. $contestantID .'" name="contestantGender" required>
                                                <option value="#" disabled selected>--- Select Gender</option>
                                                <option value="Female" '. ($row['gender'] == 'Female' ? 'selected' : '') .'>Female</option>
                                                <option value="Male" '. ($row['gender'] == 'Male' ? 'selected' : '') .'>Male</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="contestantImage'. $contestantID .'" class="col-sm-3 col-form-label">Image:</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="contestantImage'. $contestantID .'" name="contestantImage">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-6">
                                            <button type="button" class="btn btn-outline-light mt-3" onclick="updateContestant('. $contestantID .')">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Edit Modal -->
            ';

            $contestantCount++;

            if ($contestantCount % 3 == 0) {
                $contestantHtml .= '</div><div class="row row-cols-1 row-cols-md-3 g-4">';
            }
        }

        $contestantHtml .= '</div>';

        $contestantHtml .= '</div>';

        echo $contestantHtml;
    } else {
        echo "No male contestants found.";
    }
}

fetchMaleContestants($con);
?>
