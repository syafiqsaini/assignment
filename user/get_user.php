<?php
    include_once '../config/Database.php';
    include_once '../models/User.php';

    // Instantiate DB & connect it
    $database = new Database();
    $db = $database->connect();

    // Instantiate User object
    $user = new User($db);

    // Get input, name
    $user->name = isset($_POST['name']) ? $_POST['name'] : $user->name = NULL;

    // Check if there is any input
    if($user->name != NULL){
        // run function to get user
        $result = $user->getUser();
        // Get row count to check if there is any user
        $count = $result->rowCount();
        // Check if there is any user
        if($count > 0){
            // create a user array to store
            $user_arr = array();

            // start looping through query result
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $user_item = array(
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'created_at' => $created_at
                );

                // Push user item into user array
                array_push($user_arr, $user_item);
            }
        }else{
            // No posts
        }
    }
    
    

?>
<?php include('../inc/header.php'); ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="container">
            <div class="form-group">
                <label>View User</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" value="">
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>
    </form>

    <br><br>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($user_arr)): ?>
                    <?php foreach($user_arr as $u): ?>
                        <tr>
                            <td><?php echo $u['id']; ?></td>
                            <td><?php echo $u['name']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td><?php echo $u['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php include('../inc/footer.php'); ?>