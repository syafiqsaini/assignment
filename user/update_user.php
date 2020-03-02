<?php
    include_once('../config/Database.php');
    include_once('../models/User.php');

    // Message variables
    $msg = '';
    $msgClass = '';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user object
    $user = new User($db);

    // Check if submit
    if(isset($_POST['submit'])){
        // Get form post data
        $user->id = $_POST['update_id'];
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];

        // run update
        if($user->updateUser()){
            header('Location: ../index.php');
        }
    }else{
        // GET id
        $user->id = $_GET['id'];

        // query to get name and email
        $result = $user->getUserById();
        $row = $result->fetch(PDO::FETCH_ASSOC);
    }
?>


<?php include('../inc/header.php'); ?>
    <div class="container">
        <h1>Edit User</h1>
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass ?>"><?php echo $msg ?></div>
        <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <h3>ID: <?php echo $row['id']; ?></h3>
                <input type="hidden" name="update_id" class="form-control" value="<?php echo $row['id']; ?>">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" ">
            </div>
            <input type="submit" value="Update" name="submit" class="btn btn-primary">
        </form>
    </div>


<?php include('../inc/footer.php'); ?>