<?php
/**
   * desription ѹ��ͼƬ
   * @param sting $imgsrc ͼƬ·��
   * @param string $imgdst ѹ���󱣴�·��
   */
   function compressedImage($imgsrc, $imgdst) {
    list($width, $height, $type) = getimagesize($imgsrc);
     
    $new_width = $width;//ѹ�����ͼƬ��
    $new_height = $height;//ѹ�����ͼƬ��
         
    if($width >= 600){
      $per = 600 / $width;//�������
      $new_width = $width * $per;
      $new_height = $height * $per;
    }
     
    switch ($type) {
      case 1:
        $giftype = check_gifcartoon($imgsrc);
        if ($giftype) {
          header('Content-Type:image/gif');
          $image_wp = imagecreatetruecolor($new_width, $new_height);
          $image = imagecreatefromgif($imgsrc);
          imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
          //90�������������ѹ��ͼƬ������С
          imagejpeg($image_wp, $imgdst, 90);
          imagedestroy($image_wp);
          imagedestroy($image);
        }
        break;
      case 2:
        header('Content-Type:image/jpeg');
        $image_wp = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($imgsrc);
        imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        //90�������������ѹ��ͼƬ������С
        imagejpeg($image_wp, $imgdst, 90);
        imagedestroy($image_wp);
        imagedestroy($image);
        break;
      case 3:
        header('Content-Type:image/png');
        $image_wp = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefrompng($imgsrc);
        imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        //90�������������ѹ��ͼƬ������С
        imagejpeg($image_wp, $imgdst, 90);
        imagedestroy($image_wp);
        imagedestroy($image);
        break;
    }
  }
?>