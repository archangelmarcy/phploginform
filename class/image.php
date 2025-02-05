<?php

class Image {
    public static function Upload(array $files) {
        $name = $files['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $name = sha1($name.microtime().".".$extension);
        $tempName = $files['tmp_name'];
        $path = "uploads/".$name;
        move_uploaded_file($tempName, $path);
    }
}