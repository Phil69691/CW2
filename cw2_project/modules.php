<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if logged in
if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    // Build SQL statement that selects a student's modules
    $sql = "SELECT sm.modulecode, m.name, m.level FROM studentmodules sm JOIN module m ON m.modulecode = sm.modulecode WHERE sm.studentid = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['id']);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        // Prepare page content
        $data['content'] .= "<div class='table-responsive'>";
        $data['content'] .= "<table class='table table-striped table-bordered'>";
        $data['content'] .= "<thead><tr><th colspan='3' class='text-center' style='font-size: 24px; font-weight: ; text-align: center;'>Modules</th></tr></thead>";
        $data['content'] .= "<thead><tr><th>Code</th><th>Type</th><th>Level</th></tr></thead>";
        $data['content'] .= "<tbody>";

        // Display the modules within the HTML table
        while ($row = $result->fetch_assoc()) {
            $data['content'] .= "<tr><td>{$row['modulecode']}</td><td>{$row['name']}</td><td>{$row['level']}</td></tr>";
        }
        $data['content'] .= "</tbody></table>";
        $data['content'] .= "</div>";

        // Close the prepared statement
        $stmt->close();
    } else {
        // Error handling if the SQL query fails
        $data['content'] .= "<p>Error fetching modules: " . $stmt->error . "</p>";
    }

    // Render the template
    echo template("templates/default.php", $data);

} else {
    header("Location: index.php");
}

echo template("templates/partials/footer.php");
?>