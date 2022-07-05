<!DOCTYPE html>
<html>
<body>
<?php
echo '
<h2>Upload</h2>	 
 <form role="form" name="form1" action="upload.php" method="post" enctype="multipart/form-data" >
  <div class="form-group">
   <label for="inputClassifier">Classifier:</label>
   <input type="text" class="form-control" name="short_name" id="inputClassifier" value="test123" readonly>
  </div>
  <div class="form-group">
  <input type="file" name="fileToUpload" id="fileToUpload">
   <p class="help-block"><i class="glyphicon glyphicon-compressed"></i> Upload your results (.zip)</p>
  </div>
  <button type="submit" class="btn btn-default">Upload</button>
 </form>
';
?>


</body>
</html>