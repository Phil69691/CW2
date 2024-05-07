<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Function to validate UK postcode
function validateUKPostcode($postcode) {
    // UK postcode validation
    $pattern = "/^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][ABD-HJLNP-UW-Z]{2}$/i";
    return preg_match($pattern, $postcode);
}

{
    // Check if the student ID already exists in the table
    $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
    $check_query = "SELECT * FROM student WHERE studentid = '$studentid'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "Error: Student ID already exists.";
    } else {
        // Hash the password
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Extract form data
        $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
        $password = mysqli_real_escape_string($conn, $hashed_password);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $house = mysqli_real_escape_string($conn, $_POST['house']);
        $town = mysqli_real_escape_string($conn, $_POST['town']);
        $county = mysqli_real_escape_string($conn, $_POST['county']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

        // Handle file upload
        $picture = $_FILES['picture']['tmp_name'];
        $imagedata = addslashes(file_get_contents($picture));

        // Building the SQL query
        $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode, picture)
                 VALUES ('$studentid','$password','$dob','$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode', '$imagedata')";

        // Executing the SQL query
        $result = mysqli_query($conn, $sql);

        // Checksthe query was successful
        if ($result) {
            echo "<p>Student Record has been Added!</p>";
            header("Location: addstudent.php");
            exit; 
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }
}
?>