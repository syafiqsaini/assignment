<?php
    include_once '../config/Database.php';
    include_once '../models/User.php';

    try{
        // Instantiate DB & connect it
        $database = new Database();
        $db = $database->connect();

        //Instantiate filename etc
        $filelocation = $_SERVER['DOCUMENT_ROOT'].'/assignment';
        $filename = 'export-users.csv';
        $file_export = $filelocation.$filename;

        // Instantiate User object
        $user = new User($db);

        // run query to get all user
        $result = $user->viewUser();

        // Open file
        $data = fopen($file_export, 'w');

        $csv_fields = array();
        $csv_fields[] = 'id';
        $csv_fields[] = 'name';
        $csv_fields[] = 'email';
        $csv_fields[] = 'created_at';

        fputcsv($data, $csv_fields);

        // insert user data into file
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            fputcsv($data, $row);
        }

        alert('User data has SUCCESSFULLY been exported');
        
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
?>