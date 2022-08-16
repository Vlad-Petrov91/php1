<?php

function getGallery(){
    $images = scandir(IMAGES_DIR);
  return $images = array_splice($images, 2);
}