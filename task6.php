<?php

include 'uploadFile2.php';
include 'creat.php';
 
if($_SERVER['REQUEST_METHOD'] == "POST"){



  $title       =  clean($_POST['title']); 
  $content     =  clean($_POST['content']); 
  $image       =  clean($_POST['image']); 

  


     $errors = [];

    if(!validate($title,1)){
        $errors['title'] = "undefined";
    }

    if(!validate($content,1)){
        $errors['content'] = "undefined";
    }elseif(!validate($content,2) ){
        $errors['content'] = "content Length Must >= 50 ch";
    }

    if(!validate($image,1)){
        $errors['image'] = "undefined";
    }

    if(count($errors) > 0){
        foreach($errors as $key => $val ){
            echo '* '.$key.' :  '.$val.'<br>';
        }
    }else{
        echo 'Valid Data';
       }

       $sql = "insert into user (title,content,image) values ('$title','$content','$image')";
       $op  =  mysqli_query($con,$sql);
  
       if($op){
           echo 'Data Inserted';
       }else{
           echo 'Error Try Again';
       }
     
       mysqli_close($con);
  
    


}




?>



<!DOCTYPE html>
<html lang="en">

<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">



            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby=""
                    placeholder="Enter title">
            </div>


           <div class="form-group">
                <label for="exampleInputEmail1">Content </label>
                <input type="text" name="content" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter content">
            </div> 
        
         <h2>Upload Image</h2>

            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="image">
            </div>
          

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



            
    </div>

</body>

</html>