<?php

$hash = md5_file($_GET['file']);

if(file_exists('cache/'.$hash.'.jpg')){
    $img = imagecreatefromjpeg('cache/'.$hash.'.jpg');
    header("Content-Type: image/jpg");
    imagejpeg($img);
    imagedestroy($img);
}

// if(file_exists('cache/'.$hash.'.png')){
//     $img = imagecreatefrompng('cache/'.$hash.'.png');
//     header("Content-Type: image/png");
//     imagepng($img);
//     imagedestroy($img);
// }

if(substr($_GET['file'], -3) === 'jpg'){
    $img = imagecreatefromjpeg($_GET['file']);
}
if(substr($_GET['file'], -3) === 'png'){
    $img = imagecreatefrompng($_GET['file']);
}

if(imagesx($img) >= 1000){
    $img = imagescale($img, 1000);
}

// comment out this, if you want to have colors
Header("Content-type: image/jpg");
imagejpeg ($img, 'cache/'.$hash.'.jpg', 90);
imagejpeg ($img, NULL, 90);
imagedestroy($img);

die();

// this following part would implement a dither filter to extremely compress the images served
imagefilter($img, IMG_FILTER_GRAYSCALE); 
$width = imagesx($img);
$height = imagesy($img);

// Parse image (can be combined with dither stage, but combining them is slower.)

for($x=0; $x < $width; $x++){
    for($y=0; $y < $height; $y++){
        $img_arr[$x][$y] = imagecolorat($img, $x, $y);
    }
}


// make a b/w output image.
$output = imagecreate($width, $height);
$black = imagecolorallocate($output, 0, 0, 0); //background color.
$white = imagecolorallocate($output, 0xff, 0xff, 0xff);

// Dither image with Atkinson dither

/* Atkinson Error Diffusion Kernel:

1/8 is 1/8 * quantization error.

+-------+-------+-------+-------+
|       | Curr. |  1/8  |  1/8  |
+-------|-------|-------|-------|
|  1/8  |  1/8  |  1/8  |       |
+-------|-------|-------|-------|
|       |  1/8  |       |       |
+-------+-------+-------+-------+

*/

for($y=0; $y < $height; $y++){
    for($x=0; $x < $width; $x++){
        $old = $img_arr[$x][$y];
        if($old > 0xffffff*.5){ // This is the b/w threshold. Currently @ halfway between white and black.
            $new = 0xffffff;
            imagesetpixel($output, $x, $y, $white); // Only setting white pixels, because the image is already black.
        }else{
            $new = 0x000000;
        }
        $quant_error = $old-$new;
        $error_diffusion = (1/8)*$quant_error; //I can do this because this dither uses 1 value for the applied error diffusion.
        //dithering here.
        $img_arr[$x+1][$y] += $error_diffusion;
        $img_arr[$x+2][$y] += $error_diffusion;
        $img_arr[$x-1][$y+1] += $error_diffusion;
        $img_arr[$x][$y+1] += $error_diffusion;
        $img_arr[$x+1][$y+1] += $error_diffusion;
        $img_arr[$x][$y+2] += $error_diffusion;
    }
}


// plop out a png of the dithered image.

Header("Content-type: image/png");
imagepng($output, 'cache/'.$hash.'.png');
imagepng($output, NULL, 9);
imagedestroy($img);

?>