<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if logged in

    if (isset($_POST['students'])) {
        // Loop over $_POST['students']
        foreach ($_POST['students'] as $student_id) {
            // Build SQL query to delete student
            $sql = "DELETE FROM student WHERE studentid = '$student_id'";
            // Run the query
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                // Handle any errors if the query fails
                echo "Error deleting student: " . mysqli_error($conn);
            }
        }
        // Redirect to the students page after deletion
        header("Location: students.php");
        exit(); // Make sure no code below is executed after the redirect
    } else {
        // If no students are selected for deletion, redirect to index.php
        header("Location: index.php");
        exit();
    }


?>
