<?php

try {
    // this runs if the file uploaded is > the post_max__size limit
    if (empty($_FILES)){
        throw new Exception("Invalid upload");
    }
    switch ($_FILES['file']['error']){
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new Exception("No file uploaded!");
            break;
        case UPLOAD_ERR_INI_SIZE:
            // this runs if the file uploaded is > the upload_max_size limit
            throw new Exception("File is too large!");
            break;
        default:
            throw new Exception("An error occurred while uploading!");
    }
    // i choose to want to limit upload size to 5MB below
    if ($_FILES['file']['size'] > 5000000){
        throw new Exception("File is too large!");
    }

    // Specifying the type of MIME type
    $mime_types = ['image/gif', 'image/png', 'image/jpeg', 'image/webp', 'image/avif'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);
    // below means if the file is not of the type specified, throw an error
    if (!in_array($mime_type, $mime_types)){
        throw new Exception("Invalid file type!");
    }

    // moves the uploaded file from system's /tmp dir to project's root "uploads" dir
    //$destination = "../uploads/" . $_FILES['file']['name']; using this doesn't prevent code injection
    // prevent filename code injections first
    $pathinfo = pathinfo($_FILES['file']['name']);
    $base = $pathinfo['filename'];
    // replace any characters that ain't letters, numbers, underscores, or hypens with an underscore
    $base = preg_replace("/[^a-zA-Z0-9_-]/", "_", $base);
    // limits the filename to be 200 characters max
    $base = mb_substr($base, 0, 200);
    $filename = $base . "." . $pathinfo['extension'];

    $destination = "./public/assets/uploads/$filename"; // prevents code injection

    // check if the filename already exists first before moving the file to the "uploads" directory
    $i = 1;
    while (file_exists($destination)) {
        $filename = $base . "-$i." . $pathinfo['extension'];
        //$destination = "./uploads/$filename";
        $destination = "./public/assets/uploads/$filename";
        $i++;
    }

    // moves the file to the "uploads" directory
    move_uploaded_file($_FILES['file']['tmp_name'], $destination);

   
} catch (Exception $e){
    $error = $e->getMessage();
}