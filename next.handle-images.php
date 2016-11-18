<?php 

$img = $_POST['image_data'];


list($type, $img) = explode(';', $img);
list(, $img) = explode(',', $img);
$img = base64_decode($img);

$file_name = "tmp/a-".time().".png";

$img = file_put_contents($file_name, $img);

$arr = split(4, $file_name, 400, 400);

function split($number, $img, $width, $height){

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
function createImage($newImage, $file){

    imagepng($newImage, $file);
    imagedestroy($newImage);
    $newImage = 'data:image/png;base64,'.base64_encode(file_get_contents($file));
    return $newImage;

}

?>