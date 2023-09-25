<?php

if(isset($_POST) == true){ 

    // Generate unique file name 
    $fileName = time().'_'.basename($_FILES["file"]["name"]);
    
     
    // File upload path 
    $targetDir = "../images/"; 
    $targetFilePath = $targetDir . $fileName; 
     
    // Allow certain file formats 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf'); 
     
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to server 
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
            $response['status'] = $fileName; 
        }else{ 
            $response['status'] = 'err'; 
        } 
    }else{ 
        $response['status'] = 'type_err'; 
    } 
     
    // Render response data in JSON format 
    echo json_encode($response); 
    // echo $fileName;
}