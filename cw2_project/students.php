<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if logged in
if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    $sql = "SELECT * FROM student;";
    $result = mysqli_query($conn, $sql);

    // Start form
    echo "<body>";
    echo "<form action='deletestudent.php' method='post' onsubmit='return confirm(\"Are you sure you want to update the form?\")'>";
    // Prepare page content
    $data['content'] .= "<div class='table-responsive'>";
    $data['content'] .= "<table class='table table-bordered'>";
    $data['content'] .= "<thead class='thead-dark'>";
    $data['content'] .= "<tr>";
    $data['content'] .= "<th>Picture</th>";
    $data['content'] .= "<th>Student ID</th>";
    $data['content'] .= "<th>Password</th>";
    $data['content'] .= "<th>DOB</th>";
    $data['content'] .= "<th>First Name</th>";
    $data['content'] .= "<th>Surname</th>";
    $data['content'] .= "<th>House</th>";
    $data['content'] .= "<th>Town</th>";
    $data['content'] .= "<th>County</th>";
    $data['content'] .= "<th>Country</th>";
    $data['content'] .= "<th>Postcode</th>";
    $data['content'] .= "<th>Delete</th>";
    $data['content'] .= "</tr>";
    $data['content'] .= "</thead>";
    $data['content'] .= "<tbody>";

    // Display the student data in the HTML table
    while ($row = mysqli_fetch_array($result)) {
        $data['content'] .= "<tr>";
        if (!is_null($row['picture'])) {
            $base64Image = base64_encode($row['picture']);
        } else {
            $base64Image = ""; 
        }
        $data['content'] .= "<td><img src='data:image/jpeg;base64,$base64Image' height='100' width='100'></td>";
        $data['content'] .= "<td>$row[studentid]</td>";
        $data['content'] .= "<td>$row[password]</td>";
        $data['content'] .= "<td>$row[dob]</td>";
        $data['content'] .= "<td>$row[firstname]</td>";
        $data['content'] .= "<td>$row[lastname]</td>";
        $data['content'] .= "<td>$row[house]</td>";
        $data['content'] .= "<td>$row[town]</td>";
        $data['content'] .= "<td>$row[county]</td>";
        $data['content'] .= "<td>$row[country]</td>";
        $data['content'] .= "<td>$row[postcode]</td>";
        // Check box that uses student id as the value
        $data['content'] .= "<td><input type='checkbox' name='students[]' value='$row[studentid]' /></td>";
        $data['content'] .= "</tr>";
    }
    $data['content'] .= "</tbody>";
    $data['content'] .= "</table>";
    $data['content'] .= "</div>";

    // Delete button
    $data['content'] .= "<button type='submit' class='btn btn-danger'>Delete</button>";
    $data['content'] .= "</form>";

    echo template("templates/default.php", $data);

} else {
    header("Location: index.php");
}

echo template("templates/partials/footer.php");
?>
