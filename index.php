<!DOCTYPE html>
<?php
  exec("[ ! -f init.lock ] && touch init.lock && cd bash && mkdir ffmpeg && wget 'https://github.com/ly-temp/heroku-ffmpeg/releases/download/0.0.0/ffmpeg-release-amd64-static.tar.xz' -O ffmpeg.tar && tar xf ffmpeg.tar -C ffmpeg --strip-components=1 && rm ffmpeg.tar");
?>
<html>
<head>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input name="upload[]" type="file" multiple />
  <input type="submit" value="Send files" />
</form>

<br>
<a href="send_ffmpeg.php">process file</a>
<br>
<a href="move_to_output.php">move output file</a>
<br>
<a href="file_manage.php">download / manage</a>
<br>
<a href="download_external.php">download_external.php?url=</a>
<br>
upload list:
<form action="download_external_upload_list.php " method="post" enctype="multipart/form-data">
  <input name="file" type="file" multiple />
  <input type="submit" value="Send files" />
</form>
<br>
<a href="/cmd.php">cmd</a>
</body>
</html>
