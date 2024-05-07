<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if logged in
if (isset($_SESSION['id'])) {
    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    if (isset($_POST['selmodule'])) {
        $studentId = $_SESSION['id'];
        $moduleCode = $_POST['selmodule'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO studentmodules (studentid, modulecode) VALUES (?, ?)");
        $stmt->bind_param("ss", $studentId, $moduleCode);
        
        if ($stmt->execute()) {
            $data['content'] .= "<div class='alert alert-success' role='alert'>The module $moduleCode has been assigned to you</div>";
        } else {
            $data['content'] .= "<div class='alert alert-danger' role='alert'>Error assigning module: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        // Build SQL statement that selects all the modules
        $sql = "SELECT * FROM module";
        $result = mysqli_query($conn, $sql);

        $data['content'] .= "<div class='container'>";
        $data['content'] .= "<form name='frmassignmodule' action='' method='post'>";
        $data['content'] .= "<div class='form-group text-center'>";
        $data['content'] .= "<h2 style='font-weight: ;'>Select a Module to Assign</h2>";
        $data['content'] .= "<select class='form-control mx-auto mb-3' name='selmodule' id='selmodule'>";
        
        // Display the module names in a dropdown selection box
        while ($row = mysqli_fetch_array($result)) {
            $data['content'] .= "<option value='" . $row['modulecode'] . "'>" . $row['name'] . "</option>";
        }
        $data['content'] .= "</select>";
        $data['content'] .= "<button type='submit' class='btn btn-primary'>Save</button>";
        $data['content'] .= "</div>";
        $data['content'] .= "</form>";
        $data['content'] .= "</div>";
    }

    // Render the template
    echo template("templates/default.php", $data);
} else {
    header("Location: index.php");
}
echo template("templates/partials/footer.php");
?>