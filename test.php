<?php 



 new GoodZipArchive('raw_images/order_2',    'raw_images/order_2/output_zip_file.zip') ;
class GoodZipArchive extends ZipArchive 
{
	//@author Nicolas Heimann
	public function __construct($a=false, $b=false) { $this->create_func($a, $b);  }
	
	public function create_func($input_folder=false, $output_zip_file=false)
	{
		if($input_folder !== false && $output_zip_file !== false)
		{
			$res = $this->open($output_zip_file, ZipArchive::CREATE);
			if($res === TRUE) 	{ $this->addDir($input_folder, basename($input_folder)); $this->close(); }
			else  				{ echo 'Could not create a zip archive. Contact Admin.'; }
		}
	}
	
    // Add a Dir with Files and Subdirs to the archive
    public function addDir($location, $name) {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    }

    // Add Files & Dirs to archive 
    private function addDirDo($location, $name) {
        $name .= '/';         $location .= '/';
      // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))    {
            if ($file == '.' || $file == '..') continue;
          // Rekursiv, If dir: GoodZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } 
}







$date=date("d-M-Y h:i A");
$remote_file = "raw_images/output_zip_file.zip";
 
/* FTP Account (Remote Server) */
$ftp_host = 'adrgrp.com'; /* host */
$ftp_user_name = 'fotopia@adrgrp.com'; /* username */
$ftp_user_pass = 'Fotopia1#$'; /* password */
 
 
/* File and path to send to remote FTP server */
$local_file = 'raw_images/order_2/output_zip_file.zip';
 
/* Connect using basic FTP */
$connect_it = ftp_connect($ftp_host,21,100000 );
 
/* Login to FTP */
$login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass );
 ftp_pasv($connect_it, true);
/* Send $local_file to FTP */
if (ftp_put( $connect_it, $remote_file, $local_file, FTP_BINARY ) ) {
    echo "WOOT! Successfully transfer $local_file\n";
}
else {
    echo "Doh! There was a problem\n";
}
 
/* Close the connection */
ftp_close( $connect_it );


exit;
$remote_file_url = 'https://www.adrgrp.com/fotopia/output_zip_file.zip';
 
/* New file name and path for this file */
$local_file = 'raw_images/order_2/output_zip_file.zip';
 
/* Copy the file from source url to server */
$copy = copy( $remote_file_url, $local_file ) or die();
 
/* Add notice for success/failure */
if(!$copy ) {
    echo "Doh! failed to copy $file...\n";
}
else{
    echo "WOOT! success to copy $file...\n";
}

exit;







exit;
$web = 'www.adrgrp.com';
$user = 'fotopia@adrgrp.com';
$pass = 'Fotopia1#$';
// file location
$server_file = '/public_html/fotopia/1.JPG';
$local_file = './BG-Images/9.jpg';
//connect
$conn_id = ftp_connect($web);
$login_result = ftp_login($conn_id,$user,$pass);
//uploading
if (ftp_put($conn_id, $server_file, $local_file, FTP_BINARY))
 {echo "Success";} 
else {echo "Failed";}
exit;
// connect and login to FTP server
$filename="c:/xampp/htdocs/photo-uat/BG-Images/9.jpg";
$usr = "fotopia@adrgrp.com";
$pwd = "Fotopia1#$";
$ftp_server = "adrgrp.com";

$local_file=fopen('php://temp', 'r+');
fwrite($local_file, $filename);
rewind($local_file); 

$ftp_conn = ftp_connect($ftp_server,21) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $usr, $pwd);    
$ftp_path = '/home/aadiya1011/public_html/fotopia/9.JPG';  
chmod("ftp://fotopia@adrgrp.com:Fotopia1#$@adrgrp.com/fotopia/9.JPG",0777);  

	file_put_contents('ftp://fotopia@adrgrp.com:Fotopia1#$@adrgrp.com/fotopia/', $filename);
    echo $upload=ftp_put($ftp_conn, $ftp_path, $filename, FTP_BINARY) or die();    

 
// check upload status:
print (!$upload) ? 'Cannot upload' : 'Upload complete';
print "\n";

// close connection
ftp_close($ftp_conn);
exit;


$src = 'BG-Images';
$dst = 'https://www.adrgrp.com/fotopia/';
$files = glob("BG-Images/*.*");
      foreach($files as $file){
      $file_to_go = str_replace($src,$dst,$file);
      copy($file, $file_to_go);
      }
exit;
$str='./temp/order_80';
function unlinkr($dir, $pattern = "*") {
    // find all files and folders matching pattern
    $files = glob($dir . "/$pattern"); 

    //interate thorugh the files and folders
    foreach($files as $file){ 
    //if it is a directory then re-call unlinkr function to delete files inside this directory     
        if (is_dir($file) and !in_array($file, array('..', '.')))  {
            echo "<p>opening directory $file </p>";
            unlinkr($file, $pattern);
            //remove the directory itself
            echo "<p> deleting directory $file </p>";
            rmdir($file);
        } else if(is_file($file) and ($file != __FILE__)) {
            // make sure you don't delete the current script
            echo "<p>deleting file $file </p>";
            unlink($file); 
        }
    }
}
unlinkr($str);
exit;
$fi = new FilesystemIterator("./raw_images/order_80", FilesystemIterator::SKIP_DOTS);

$fileCount = 0;
foreach ($fi as $f) {
    if ($f->isFile()) {
        $fileCount++;
    }
}
echo("There were %d Files".$fileCount);
exit;
$array = str_split("512990856326512987150086512990852250", 12);


for($i=0;$i<count($array);$i++)
{
echo $array[$i]."<br>";
}

echo implode(",",$array);
echo "<br>";

$string="   512990                8563265129871 5008651             2990    852250      ";
$stringResult = preg_replace('/\s+/', '', $string);
echo $stringResult;
?>

<table class="table-stripped" cellpadding="10" cellspacing="10" width="100%"><thead><tr style="font-weight:bold;font-size:14px;"><td style="padding:5px;"><span adr_trans="label_product_name">Product Name</span></td><td style="padding:5px"><span adr_trans="label_timeline"> Timeline</span></td><td style="padding:5px" rowspan="2"><span adr_trans="label_product_cost">Product Cost</span></td></tr></thead><tbody><tr><td style="padding:5px;font-size:14px;">30 STANDARD PHOTOS</td><td style="padding:5px">1 hour</td><td style="padding:5px">200</td></tr><tr><td style="padding:5px">40 STANDARD PHOTOS</td><td style="padding:5px">2 hours</td><td style="padding:5px">250</td></tr><tr><td style="padding:5px">DRONE SHOOT</td><td style="padding:5px">2 hours</td><td style="padding:5px">300</td></tr><tr><td style="padding:5px">FLOOR PLAN</td><td style="padding:5px">1 hour</td><td style="padding:5px">100</td></tr></tbody></table>