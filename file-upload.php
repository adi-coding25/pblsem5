<!DOCTYPE html>
<html>
<head>
    <title>PHP File Upload</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
<?php

//$_$FILES global variable
if(isset($_FILES['userfile'])){
    
    $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );

    $ext_error = false;
    //check for specific file extensions
    $extensions = array('jpeg','jpg','png','gif');
    
    //pre_r($_FILES);
    
    //explode() separates values with a delimiter and puts the result in an array
    $file_ext = explode('.',$_FILES['userfile']['name']);
    
    //pre_r($file_ext);die;
    
    $file_ext = end($file_ext);
   
    if (!in_array($file_ext, $extensions)){
        $ext_error = true;
    }
    
    //move tmp file to another directory
    //$_FILES['tmp_name'] = C:\localhost\php\upload-tmp-dir\phpEB00.tmp
        
    // Check $_FILES['upfile']['error'] value.
    if ($_FILES['userfile']['error']){
        ?> <div class="alert alert-danger"> <?php echo $phpFileUploadErrors[$_FILES['userfile']['error']]; 
        ?> </div> <?php 
    }
    elseif ($ext_error){
        ?> <div class="alert alert-danger"> <?php echo "Invalid file extension! "
        . "Please upload files with these extensions only: ("; 
        foreach ($extensions as $key => $extension){
            echo ".".$extension." ";
        }
        echo ")";
        ?> </div> <?php  
    }
    else {
        ?>
        <div class="alert alert-success"> <?php
        move_uploaded_file($_FILES['userfile']['tmp_name'],
            "images/".$_FILES['userfile']['name']);
        echo "Success! Image has been uploaded!";
        ?>
        </div>
        <?php
    }
}

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
        <form action="" method="POST" enctype="multipart/form-data">
           <input type="file" name="userfile"/>
           <input type="submit" value="Upload"/>
        </form>
   </body>
</html>