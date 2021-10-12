<?php
session_start();
if(!isset($_SESSION["loggedin"]) ||  $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
// Include config file
require_once "config.php";

//Define variables and initialize with empty values
 $tencn = "";
 $tencn_err = "";

// Processing form data when form is submitted
if(isset($_POST["macn"]) && !empty($_POST["macn"])){
    // Get hidden input value
    $macn = $_POST["macn"];

    //Validate id

    //Validate name
    $input_tencn = trim($_POST["tencn"]);
    if(empty($input_tencn)){
        $tencn_err = "Please enter major name.";
    }else{
        $tencn = $input_tencn;
    }


    //Check input errors before inserting in database
    if( empty($tencn_err) ){
        //Prepare an update statement
        $sql = "update chuyennganh set tencn=?   where macn=?";

        if($stmt = $mysqli->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("si",$param_tencn,  $param_macn);

            //Set parameters
            $param_tencn = $tencn;

            $param_macn = $macn;

            //Attempt to execute the prepared statement
            if($stmt->execute()){
                //Records updated successfully. Redirect to landing page
                header("location: dashboard_major.php");
                exit();
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        //Close statement
        $stmt->close();
    }
    //Close connection
    $mysqli->close();
}else{
    //Check existence of id parameter before processing further
    if(isset($_GET["macn"]) && !empty(trim($_GET["macn"]))){
        //Get URL parameter
        $macn = trim($_GET["macn"]);

        //Prepare a select statement
        $sql = "SELECT * from chuyennganh where macn=?";
        if($stmt = $mysqli->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("i",$param_macn);

            //Set parameters
            $param_macn = $macn;

            //Attempt to execute the prepare statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    //Retrieve individual field value
                    $tencn = $row["tencn"];

                }else{
                    //URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        //Close statement
        $stmt->close();

        //Close connection
        $mysqli->close();
    }else{
        //URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Major</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Update Major</h2>
                <p>Please edit the input values and submit to update the major record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Major name</label>
                        <input type="text" name="tencn" class="form-control
                                 <?php echo (!empty($tencn_err)) ?'is-invalid' : ''; ?>" value="<?php echo $tencn; ?>">
                        <span class="invalid-feedback"><?php echo $tencn_err; ?></span>
                    </div>

                    <input type="hidden" name="macn" value="<?php echo $macn; ?>" />
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="dashboard_major.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
