<?php

    $data = $_POST['imgBase64'];
    $overlayname = $_POST['overlayname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);

    $file_name = 'assets/temp'. time() .'.png';
    file_put_contents($file_name, $data);
    $imgpath = $file_name;

    $filename_result = 'assets/'. time() .'.png';

    $dest = imagecreatefrompng($file_name);

    $src = imagecreatefrompng($overlayname);
    imagealphablending($src, true);
    imagesavealpha($src, true);

    imagecopy($dest, $src, 0, 0, 0, 0, 400, 400);

    imagepng($dest,$filename_result);
    unlink($file_name);

    try{

        $pdo = new PDO("mysql:host=localhost;dbname=handwashing", "root", "root");

        $query = $pdo->prepare("INSERT INTO entries(fname, email, phone, img) VALUES (:name, :email, :phone, :img)");

        $query->bindValue(':name', $name);
        $query->bindValue(':email', $email);
        $query->bindValue(':phone', $phone);
        $query->bindValue(':img', $filename_result);

        if ($query->execute()) {
            $json = array('status' => 1, 'message' => 'New record created successfully', 'filename' => $filename_result);
            echo json_encode($json);

        } else {
            $json = array('status' => 0, 'message' => 'Error Occurred');
            echo  json_encode($json);
        }

        $pdo = null;

    }catch(PDOException $e){

        echo $e->getMessage();

    }