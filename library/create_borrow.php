<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
// Include config file
require_once "config.php";

//Define variables and initialize with empty values
$mabd = $tensach = $ngaymuon = $ngaytra = "";
$mabd_err = $tensach_err = $ngaymuon_err = $ngaytra_err= "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"]== "POST"){
    //Validate ID
    if(empty(trim($_POST["mabd"]))){
        $mabd_err = "Please enter Reader ID.";
    }elseif (!preg_match('/^[0-9]+$/', trim($_POST["mabd"]))){
        $mabd_err = " Reader ID just contains exactly 5 numbers.";
    }elseif(strlen(trim($_POST["mabd"])) != 5){
        $mabd_err = " Reader ID just contains exactly 5 numbers.";
    }
    else{
        $sql = "select bd_id from bandoc where mabd=?";

        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s",$param_mabd);

            $param_mabd = trim($_POST["mabd"]);

            if($stmt->execute()){
                $stmt->store_result();

                if($stmt->num_rows !=1){
                    $mabd_err = "This ID is not existed.";
                }else{
                    $mabd = trim($_POST["mabd"]);
                }
            }else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }


    // Validate name
    $input_diachi = trim($_POST["diachi"]);
    if(empty($input_diachi)){
        $diachi_err = "Please enter an address.";
    }else{
        $diachi = $input_diachi;
    }
    // Validate name
    $input_tenbd = trim($_POST["tenbd"]);
    if(empty($input_tenbd)){
        $tenbd_err = "Please enter the salary amount.";
    }elseif(!filter_var($input_tenbd, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $tenbd_err = "Reader name is invalid.";
    }else{
        $tenbd = $input_tenbd;
    }
    //Check input errors before inserting in database
    if(empty($mabd_err) && empty($tenbd_err) && empty($diachi_err)){
        //Prepare an insert statement
        $sql = "insert into bandoc (mabd, tenbd, diachi) values (?,?,?)";

        if($stmt = $mysqli->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss",$param_mabd, $param_tenbd, $param_diachi);

            //Set parameters
            $param_tenbd = $tenbd;
            $param_mabd = $mabd;
            $param_diachi = $diachi;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                //Records created successfully. Redirect to landing page
                header("location: dashboard_reader.php");
                exit();
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();
    }
    //Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                <h2 class="mt-5">Create Record</h2>
                <p> Please fill this form and submit to add reader record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label>Reader ID</label>
                        <input type="text" name="mabd" class="form-control
                                <?php echo (!empty($mabd_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mabd; ?>">
                        <span class="invalid-feedback"><?php echo $mabd_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Reader name</label>
                        <input type="text" name="tenbd" class="form-control
                             <?php echo(!empty($tenbd_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tenbd;  ?>">
                        <span class="invalid-feedback"><?php echo $tenbd_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Dia chi</label>
                        <textarea name="diachi" class="form-control
                          <?php echo (!empty($diachi_err)) ? 'is-invalid' : ''; ?>"><?php echo $diachi; ?></textarea>
                        <span class="invalid-feedback"><?php echo $diachi_err; ?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="dashboard_reader.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
