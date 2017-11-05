<?php

    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
    
    
    if (!empty($_POST)) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        // Create some JSON response
        $response["success"] = 0;
        $response["message"] = "One or both of the fields are empty .";
          
        //die is used to kill the page, will not let the code below to be executed.
        //It will also display the parameter, that is the json data which our android
        //application will parse to be shown to the users
        die(json_encode($response));
        }
    }
      $response = $db->QueryForUser($username, $password);
      echo json_encode($response);
?>