<?php
$save = str_replace('data:image/png;base64,', '', $_POST['image'] );
$code = file_put_contents( '../img/image.png', base64_decode( $save ) );

?>
OK
<? if ($code === FALSE) { echo "false"; } else { echo "okkkkayyyy"; } ?>