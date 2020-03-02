<?php
    include_once '../config/Database.php';
    include_once '../models/User.php';

    // Message variables
    $msg = '';
    $msgClass = '';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user object
    $user = new User($db);

    // Get input POST data
    $user->name = isset($_POST['name']) ? $_POST['name'] : $user->name = NULL;
    $user->email = isset($_POST['email']) ? $_POST['email'] : $user->email = NULL;

    // Create user class function
    if($user->name != NULL && $user->email != NULL){
        // SANITIZE & VALIDATE
        $user->email = filter_var($user->email, FILTER_SANITIZE_EMAIL);
        if(filter_var($user->email, FILTER_VALIDATE_EMAIL)){
            // Email is valid
            // So we run createUser funtion
            if($user->createUser()){
                // User created
                $msg = "User has been successfully created";
                $msgClass = 'alert-success';
            }else{
                // User not created
                $msg = "User creation FAILED";
                $msgClass = 'alert-danger';
            }
        }else{
            // Email is not valid
            $msg = "Email is not valid";
            $msgClass = 'alert-danger';
        }
    }

?>


<?php include('../inc/header.php'); ?>
    <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass ?>"><?php echo $msg ?></div>
    <?php endif; ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter name">
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>

<?php include('../inc/footer.php'); ?>