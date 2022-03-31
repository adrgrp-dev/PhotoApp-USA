<?php 
include "connection.php";
$target_file="norway.csv";
           // Reading file
           $file = fopen($target_file,"r");
           $i = 0;

           $importData_arr = array();
                       
           while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($data);

             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = mysqli_real_escape_string($con, $data[$c]);
             }
             $i++;
           }
           fclose($file);

           $skip = 0;
           // insert import data
           foreach($importData_arr as $data){
            if($skip>0)
			{
			$state=$data[1];
			$city=$data[2];
			$pincode=$data[3];
			
		mysqli_query($con,"INSERT INTO `norway_states_cities` (`States`, `Cities`, `Zipcode`) VALUES ('$state', '$city','$pincode')");
	
			
}
$skip++;
         }
		 
		 ?>
		 
		 
		 
		 
		 
		 
		 
		
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
         