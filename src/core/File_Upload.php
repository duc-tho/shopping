<?php
class File_Upload
{
     protected $file = null;
     protected $targetDir = null;
     protected $targetFile = null;
     protected $fileType = null;
     protected $err = "";

     public function __construct($file)
     {
          $_ = $GLOBALS["_"];
          $this->file = $file;
          $this->targetDir = "{$_(PATH_PUBLIC)}";
          $this->fileName = "{$_(uniqid(""))}_{$_(basename($this->file['name']))}";
          $this->targetFile = "{$this->targetDir}/img/Product/{$this->fileName}";
          $this->FileType = strtolower(pathinfo($this->targetFile, PATHINFO_EXTENSION));
     }

     public function checkFileIsImage()
     {
          $check = getimagesize($this->file["tmp_name"]);
          if ($check == false)  $this->err = "File không phải hình ảnh";
     }

     public function getFileURL()
     {
          return "/public/img/Product/{$this->fileName}";
     }

     public function checkFileExist()
     {
          if (file_exists($this->targetFile)) $this->err = "File đã tồn tại!";
     }

     public function checkFileSize()
     {
          if ($this->file["size"] > 20000000) {
               $this->err = "File quá lớn chỉ nhận file dưới 20MB";
          }
     }

     public function checkFileType()
     {
          if ($this->FileType != "jpg" && $this->FileType != "png" && $this->FileType != "jpeg") {
               $this->err = "File không hợp lệ chỉ nhận các loại file JPG, JPEG, PNG";
          }
     }

     public function upload()
     {
          $_ = $GLOBALS["_"];
          $this->checkFileExist();
          $this->checkFileIsImage();
          $this->checkFileType();
          $this->checkFileSize();

          if ($this->err != "") {
               $this->err = "File chưa được tải lên \n- Lỗi: {$this->err}";
          } else {
               if (!move_uploaded_file($this->file["tmp_name"], $this->targetFile)) {
                    $this->err = "Đã có lỗi xảy ra trong quá trình Upload File";
               }
          }

          return $this->err;
     }
}
