<?php
$save2 = str_replace('data:application/pdf;base64,', '', $_POST['image'] );
$code2 = file_put_contents( '../img/image2.pdf', base64_decode( $save ) );
?>