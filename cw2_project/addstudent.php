<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if logged in
if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    // Display the form
    $data['content'] = <<<EOD
    <div class="text-center"> 
        <h2>Add New Student</h2>
    </div>
    <form name="frmdetails" action="Adddetails.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="studentid">Student ID:</label>
                <input name="studentid" type="text" class="form-control form-control-xs" required />
                <label for="password">Password:</label>
                <input name="password" type="password" class="form-control form-control-xs" required />
                <label for="dob">Date of Birth:</label>
                <input name="dob" type="date" class="form-control form-control-xs" />
                <label for="firstname">First Name:</label>
                <input name="firstname" type="text" class="form-control form-control-xs" required />
            </div>
            <div class="col-md-6">
                <label for="lastname">Last Name:</label>
                <input name="lastname" type="text" class="form-control form-control-xs" required />
                <label for="house">Number and Street:</label>
                <input name="house" type="text" class="form-control form-control-xs" required />
                <label for="town">Town:</label>
                <input name="town" type="text" class="form-control form-control-xs" required />
                <label for="county">County:</label>
                <input name="county" type="text" class="form-control form-control-xs" required />
                <label for="country">Country:</label>
                <input name="country" type="text" class="form-control form-control-xs" required />
                <label for="postcode">Postcode:</label>
                <input name="postcode" type="text" class="form-control form-control-xs" required />
            </div>
        </div>
        <label for="picture">Profile Photo:</label>
        <input type="file" name="picture" accept="image/jpeg, image/png ,image/jpg" class="form-control form-control-xs" required />
        <br/>
        <input type="submit" value="Save" name="submit" class="btn btn-primary"/>
    </form>
EOD;

    echo template("templates/default.php", $data);

} else {
    header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
