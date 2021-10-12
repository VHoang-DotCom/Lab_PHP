<?php
 session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: login.php");
     exit;
 }
 ?>

<?php
 //Include config file
require_once  "config.php";

$macn = $tencn = "";
$macn_err = $tencn_err = "";

//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validate id
    $input_macn = trim($_POST["macn"]);
    if(empty($input_macn)){
        $macn_err = "Please enter major id.";
    }elseif(!filter_var($input_macn, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $macn_err = "Please enter a valid major id.";
    }elseif(strlen(trim($_POST["macn"])) != 5){
        $macn_err = "Major ID must contain exactly 5 characters. ";
    }
    else{
        $macn = $input_macn;
    }

    //Validate name
    $input_name = trim($_POST["tencn"]);
    if(empty($input_name)){
        $tencn_err = "Please enter name of major.";
    }else{
        $tencn = $input_name;
    }

    //Check input errors before inserting in database
    if(empty($macn_err)&& empty($tencn_err)){
        //Prepare an insert statement
        $sql = "insert into chuyennganh (macn, tencn) values (?,?) ";

        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("ss",$param_macn, $param_tencn);

            $param_macn = $macn;
            $param_tencn = $tencn;

            //Attemp to execute the prepared statement
            if($stmt->execute()){
                    header("location: dashboard_major.php");
                    exit();
                }else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            $stmt->close();
        }
        $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Major</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Create Record</h2>
                <p> Please fill this form and submit to add employee record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label>Major ID</label>
                        <input type="text" name="macn" class="form-control
                                <?php echo (!empty($macn_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $macn; ?>">
                        <span class="invalid-feedback"><?php echo $macn_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Major name</label>
                        <input type="text" name="tencn" class="form-control
                                <?php echo (!empty($tencn_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tencn; ?>">
                        <span class="invalid-feedback"><?php echo $tencn_err; ?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="dashboard_major.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
</div>
</body>
</html>
