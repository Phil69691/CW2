<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if logged in
if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    // If the form has been submitted
    if (isset($_POST['submit'])) {

      
        $sql = "UPDATE student SET firstname ='" . $_POST['txtfirstname'] . "',";
        $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
        $sql .= "house ='" . $_POST['txthouse']  . "',";
        $sql .= "town ='" . $_POST['txttown']  . "',";
        $sql .= "county ='" . $_POST['txtcounty']  . "',";
        $sql .= "country ='" . $_POST['txtcountry']  . "',";
        $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
        $sql .= "WHERE studentid = '" . $_SESSION['id'] . "';";
        $result = mysqli_query($conn, $sql);

        $data['content'] = "<p>Your details have been updated</p>";

    } else {
        $sql = "SELECT * FROM student WHERE studentid='" . $_SESSION['id'] . "';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        
        $data['content'] = <<<EOD

   <h2 style="font-weight:; text-align: center;">My Details</h2>
   <form name="frmdetails" action="" method="post">
      <div class="mb-3 row">
         <label for="txtfirstname" class="col-sm-2 col-form-label">First Name:</label>
         <div class="col-sm-10">
            <input name="txtfirstname" type="text" class="form-control" value="{$row['firstname']}">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="txtlastname" class="col-sm-2 col-form-label">Last Name:</label>
         <div class="col-sm-10">
            <input name="txtlastname" type="text" class="form-control" value="{$row['lastname']}">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="txthouse" class="col-sm-2 col-form-label">Number and Street:</label>
         <div class="col-sm-10">
            <input name="txthouse" type="text" class="form-control" value="{$row['house']}">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="txttown" class="col-sm-2 col-form-label">Town:</label>
         <div class="col-sm-10">
            <input name="txttown" type="text" class="form-control" value="{$row['town']}">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="txtcounty" class="col-sm-2 col-form-label">County:</label>
         <div class="col-sm-10">
            <input name="txtcounty" type="text" class="form-control" value="{$row['county']}">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="txtcountry" class="col-sm-2 col-form-label">Country:</label>
         <div class="col-sm-10">
            <input name="txtcountry" type="text" class="form-control" value="{$row['country']}">
         </div>
      </div>
      <div class="mb-3 row">
         <label for="txtpostcode" class="col-sm-2 col-form-label">Postcode:</label>
         <div class="col-sm-10">
            <input name="txtpostcode" type="text" class="form-control" value="{$row['postcode']}">
         </div>
      </div>
      <div class="mb-3 row">
         <div class="col-sm-10 offset-sm-2">
            <input type="submit" value="Save" name="submit" class="btn btn-primary">
         </div>
      </div>
   </form>

EOD;

    }

    
    echo template("templates/default.php", $data);

} else {
    header("Location: index.php");
}

echo template("templates/partials/footer.php");
?>