<?php

$img = $_POST['obj'];

list($type, $img) = explode(';', $img);
list(, $img) = explode(',', $img);
$img = base64_decode($img);

$file_name = "tmp/a-".time().".png";

$base64_file = base64_encode(time().".png");

$img = file_put_contents($file_name, $img);

$arr = split_file(4, $file_name, 400, 400);

function split_file($number, $img, $width, $height){

    $array = array();

    $x = 0;
    $y = 0;

    for($i=1; $i<= $number; $i++){

        $oldImage = imagecreatefrompng($img);
        $new = imagecreatetruecolor($width, $height);

        imagesavealpha($new, true);
        $transparent = imagecolorallocatealpha($new, 0, 0, 0, 127);
        imagefill($new, 0, 0, $transparent);

        imagecopyresized($new, $oldImage, $x, $y, $x, $y, 200, 200, 200, 200);

        $file='tmp/'.microtime().'.png';

        $image = createImage($new, $file);

        $array[] = $image;

        if($x == 0){

            $x+=200;

        }else if($x == 200){

            $x = 0;
            $y += 200;

        }

    }

    return $array;

}

//function blurImage($img){
//
//    $image = new Imagick($img);
//    $image->gaussianBlurImage(5, 2);
//
//    return $image->getImageBlob();
//
//}

function createImage($newImage, $file){

    imagepng($newImage, $file);
    imagedestroy($newImage);
    $newImage = 'data:image/png;base64,'.base64_encode(file_get_contents($file));
    return $newImage;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>#MySpecialOne</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/crop.css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/next.css" type="text/css">
</head>
<body>
<div id="horizontal-scroll-bg"></div>
    <div id="background-opaque"></div>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top" id="main-navigation">
        <div class="container-fluid header-main-container">
          <div class="navbar-header">
             <a class="navbar-brand" href="index.html">
              <img alt="Brand" src="img/tecno_logo_black.png">
            </a>
          <div class="top-addBlur-holder">
                <button href="#" class="btn" id="done-button" style="margin: auto; width: 100%; margin-top: 23px">Done</button>
          </div> 
          </div>    
        </div>
      </nav>
    </header>
    <div class="container next-main-container" style="padding-top: 50px;
        padding-bottom: 80px;">
        <section class="pagination-holder pagination-holder-1 col-xs-12">
            <h2>Refocus Your Image</h2>
            <div class="top-pagination top-pagination-2"></div>
            <p class="tag-info">Move Circle around to change focus.</p>

        </section>
        <section>
            <div id="final-image-container">
                <div id="finalPicture-holder" class="col-xs-12">
                <div id='photoframe'>
                        <img id='img-full' src=<?php echo $file_name; ?> />
                        <div id="drag-ball-holder" draggable="true"><img class="img-responsive" src="img/ball_handle.png"></div>
                        <img id="final-image" src="">
                        <canvas id="next-canvas" width="500" height="500"></canvas>
                </div>
                <p style="width: 100%; text-align: center; font-weight: 200; margin-top: 40px;">Click 'Done' to Continue</p>        
            </div>
            </div>
        </section>
    </div>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/crop.js"></script>
<script type="text/javascript" src="js/jcanvas/jcanvas.min.js"></script>
<script type="text/javascript" src="js/html2canvas/html2canvas.js"></script>
<script type="text/javascript" src="js/html2canvas/jquery.plugin.html2canvas.js"></script>
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery-ui/jquery-ui-touch-punch.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/glfx/glfx.js"></script>
<script type="text/javascript" src="js/next.js"></script>
</body>
</html>
