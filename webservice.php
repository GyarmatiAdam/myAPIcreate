<?php
header("Content-Type:application/json");

// Check if the id has a value
if(!empty($_GET['cust_id'])){

        // Get the id value in the variable
        $id=$_GET['cust_id'];

        // Require db_check.php file (check the id in the database and get the name and the price)
        require_once "db_check.php";

        // If the name and the price are empty - id doesn't exist - car not found
        if(empty($first_name) && empty($last_name)){
            response(200, "customer not found", NULL, NULL, NULL, NULL);
        }
        // If the name and the price aren't empty - id exists - car found
        else{
            response(200, "customer found" , $first_name, $last_name,$email,$dob);
        }
}

/**Be aware of response(200, "customer not found", NULL, NULL, NULL, NULL);
 * because as many places in response we have
 * as many array we have to have in the function
 * like: function response($status,$status_message,$first_name,$last_name,$email,$dob)
 */

// If the id is not set - request is not valid
    else {
            response(400, "Invalid request", NULL, NULL,NULL,NULL);
    }


// Function for delivering a JSON response
function response($status,$status_message,$first_name,$last_name,$email,$dob){
        
        /*HTTP 1.1 provides a persistent connection 
        that allows multiple requests to be batched 
        or pipelined to an output buffer */
        header("HTTP/1.1 $status $status_message");

        // $response array
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['first_name']=$first_name;
        $response['last_name']=$last_name;
        $response['c_email']=$email;
        $response['dob']=$dob;


        //Generating JSON from the $response array
        $json_response=json_encode($response);

        // Outputting JSON to the client
        echo $json_response;
}

?>