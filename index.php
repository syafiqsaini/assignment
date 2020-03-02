<?php
    include_once 'config/Database.php';
    include_once 'models/User.php';

    // Instantiate DB & connect it
    $database = new Database();
    $db = $database->connect();

    // Instantiate user object
    $user = new User($db);

    // run query
    $result = $user->viewUser();
    // get row count for validation
    $count = $result->rowCount();

    // Check if there is any user in $result
    if($count > 0){
        // create array to store data
        $user_arr = array();

        // Loop to fetch data 
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $user_item = array(
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'created_at' => $created_at
            );

            // Push each item into user array
            array_push($user_arr, $user_item);
        }
        
    }
    
?>
<?php include('inc/header.php'); ?>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Action</th>
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
                            <td>
                                <a href="<?php echo ROOT_URL; ?>/user/update_user.php?id=<?php echo $u['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php include('inc/footer.php'); ?>