<?php
namespace PhpSolutions;
class Thumbnail{
    protected $original;
    protected $original_width;
    protected $original_height;
    protected $base_name;
    protected $ratio;
    protected $image_type;
    protected $destination;
    protected $new_name;
    protected $messages = [];
    public function __construct($image, $destination, $ratio){
        if(is_file($image) && is_readable($image)){
            $details = getimagesize($image);
        }else{
            throw new \Exception("Cannot open $image");
        }
        if(!is_array($details)){
            throw new \Exception("$image is not an image !");
        }else{
            if($details[0] == 0){
                throw new \Exception("cannot determine the size of the image !");
            }
            if(!$this->checkType($details['mime'])){
                throw new \Exception("Cannot process that type of file !");
            }
            $this->original = $image;
            $this->original_width = $details[0];
            $this->original_height = $details[1];
            $this->base_name = pathinfo($image, PATHINFO_FILENAME);
            $this->setDestination($destination);
            $this->ratio = $ratio;
        }
    }
    public function checkType($img){
        $permitted = ['image/gif','image/jpeg', 'image/pjpeg', 'image/png', 'image/webp'];
        if(in_array($img, $permitted)){
            $this->image_type = substr($img, strpos($img, '/')+1);
            return true;
        }
        return false;
    }
    public function create($startX, $startY, $endX, $endY, $scale){
        $thumbWidth = round($this->original_width * $this->ratio);
        $thumbHeight = round($this->original_height * $this->ratio);
        $resource = $this->createImageResource();
        if($scale){
            $thumb=imagecreatetruecolor($thumbWidth,$thumbHeight);
                imagecopyresampled($thumb, $resource, 0, 0, 0, 0, $thumbWidth, $thumbHeight,
                                    $this->original_width, $this->original_height); 
        }else{
            $thumb = imagecreatetruecolor($endX- $startX, $endY- $startY);
            imagecopyresampled($thumb, $resource, 0, 0, $startX, $startY, $thumbWidth, $thumbHeight, $endX , $endY );
        }
        $this->new_name = $this->base_name ."_".date("Y_m_d_h_i_s_ms")."(bou-devlpr.xyz) .".$this->image_type;
        switch ($this->image_type) {
            case 'jpeg':
                $success = imagejpeg($thumb, $this->destination . $this->new_name);
                break;
            case 'png':
                $success = imagepng($thumb, $this->destination . $this->new_name);
                break;
            case 'jif':
                $success = imagejif($thumb, $this->destination . $this->new_name);
                break;
            case 'webp':
                $success = imagewebp($thumb, $this->destination . $this->new_name);
                break;
        }
        if($success){
            $this->messages [] = "$this->new_name created successfully !";
        }else{
            throw new \Exception("Could not create a thumbnail for ". basename($this->original));
        }
        imagedestroy($resource);
        imagedestroy($thumb);
        unlink($this->original);
    }
    public function getFullPath(){
        return $this->destination. $this->new_name;
    }
    protected function createImageResource(){
        switch ($this->image_type) {
            case 'jpeg':
                return imagecreatefromjpeg($this->original);
            case 'png':
                return imagecreatefrompng($this->original);
            case 'gif':
                return imagecreatefromjif($this->original);
            case 'webp':
                return imagecreatefromwebp($this->original);
        }
    }
    protected function setDestination($destination){
        if(is_dir($destination) && is_writable($destination)){
            $this->destination = rtrim($destination, "/\\").DIRECTORY_SEPARATOR;
        }else{
            throw new \Exception("$destination is not a valid Dir !");
        }
    }
}?>