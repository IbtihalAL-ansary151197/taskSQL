<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){



if(!empty($_FILES['image']['name'])){
 

$imageTmp   =  $_FILES['image']['tmp_name'];
$imageName  =  $_FILES['image']['name'];
$imageSize  =  $_FILES['image']['size'];
$imageType  =  $_FILES['image']['type'];  

$allowdEx   = ['png','jpg'];

$TypeArray = explode('/',$imageType);

 if(in_array($TypeArray[1],$allowdEx)){
 
 $FinalName = rand(1,100).time().'.'.$TypeArray[1];

 $disPath = './uploads/'.$FinalName;

   if(move_uploaded_file($imageTmp,$disPath)){
       echo 'File Uploaded';
   }else{
       echo 'Error Try Again';
   }         

 }else{
     echo 'Not Allowed Extension';
 }

}else{

    echo 'Image Required';
}

}



function clean($input){

    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = trim($input);

    return $input;

}


   
function validate($input,$flag,$length = 50){
   
    $status = true;

    switch ($flag) {
        case 1:
            # code...
            if(empty($input)){
                $status = false;
            }
            break;
        
        case 2: 
            #code ... 
            if(strlen($input) > 50 ){
                $status = false;
            }    
            break;

            if(!filter_var($input,FILTER_VALIDATE_IMAGE)){
                $status = false;
            }    
            break;
        
    }
    return $status;

}
?>

