<?php 
$foldername="../Photo-25-05-2021-Sid/raw_images";
$daysOlder=-10;

$foldername = array($foldername);
function recursiveRemove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
if (filemtime($file) < time() - (60 * 60 * 24 * $daysOlder) ) {
        if (is_dir($file)) recursiveRemove($file);
        elseif (is_file($file)) unlink($file);
    }
        }
    
    
}
//rmdir($dir);
}
foreach($foldername as $fname){
     recursiveRemove($fname);}
?>