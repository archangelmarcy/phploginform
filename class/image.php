<?php

class Image {
    public static function Upload(array $files) {
        $name = $files['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $name = sha1($name.microtime()).".webp";
        $tempPath = $files['tmp_name'];
        $imageString = file_get_contents($tempPath);
        $image = imagecreatefromstring($imageString);
        $path = "uploads/".$name;
        imagewebp($image, $path);
    }
}