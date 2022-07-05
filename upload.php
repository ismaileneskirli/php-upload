<?php
function parse_size($size) {
  $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
  $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
  if ($unit) {
    // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
    return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
  }
  else {
    return round($size);
  }
}

echo "Looking good" . json_encode(empty($_FILES));
echo "<br/>" ;

//Forms posted
if(!empty($_FILES)) {
  $target_dir = "uploads/";
  echo "file name: ";
  echo $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo "target file: $target_file"  ;
echo "<br/>" ;

$upload_max = parse_size(ini_get('upload_max_filesize'));
echo "max size: $upload_max" ;
echo "<br/>" ;



$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  echo "<br/>" ;
  $uploadOk = 0;
}

// Check file size

echo "file size : ";
echo $_FILES["fileToUpload"]["size"];
echo "<br/>" ;

// if ($_FILES["fileToUpload"]["size"] > 50000000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
else {
  echo "empty, else girdi " ;
}
?>

