<?php
namespace PhpSolutions;
class Upload{
    protected $destination;
    protected $max = 2048000;
    protected $messages = [];
    protected $permitted = [
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/webp'
    ];
    protected $newName;
    public function __construct($path){
        if(is_dir($path) && is_writable($path)){
            $this->destination = rtrim($path, '/\\').DIRECTORY_SEPARATOR;
        }else{
            throw new \Exception("$path must be valid, writable directory");
        }
    }
    public function upload($fieldName){
        $uploaded = $_FILES[$fieldName];
        if($this->checkFile($uploaded)){
            $this->newName = $uploaded['name'];
            $this->renameDuplicate($uploaded['name']);
            $this->moveFile($uploaded);
        }
    }
    public function checkFile($file){
    if($file['size'] < $this->max){
        if(!in_array($file["type"], $this->permitted))
        {
            $this->messages[] = $file['name'] ." Image MIME type not allowed!"  ;
            return false;
        }
        return true;
       
    }else{
        $this->messages[] = $file['name'] ." failed to upload,  max  size : " . number_format(($this->max/1024)/1024, 1)." MB"  ;
        return false;
    }
    }
    function moveFile($file){
        $moved = move_uploaded_file($file['tmp_name'], $this->destination.$this->newName);
        $moved ? $this->messages[] = $file['name'] ." was uploaded successfully" : $this->messages[] = $file['name'] ." could not be uploaded!";
    }
    public function getMessages(){
        return $this->messages;
    }
    public function renameDuplicate($file){
        if(file_exists($this->destination.$file)){
            $baseName = pathinfo($file, PATHINFO_FILENAME);
            $extension =pathinfo($file, PATHINFO_EXTENSION);
           $this->newName = $baseName."_".date("Y_m_d_h_i_s_ms")." (bou-devlpr.xyz) .".$extension;
        }
    }
    public function getFullPath(){
        return $this->destination.$this->newName;
    }
}?>