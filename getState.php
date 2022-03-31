<?php 
include "connection.php";

$city=$_REQUEST["city"];

$state=$_REQUEST["state"];

$stateQry=mysqli_query($con,"select distinct(States) from usa_states_cities where Cities='$city'");

$final_states ="";

while($stateIs=mysqli_fetch_array($stateQry)){
 
 $final_states = $stateIs['States'];

if ($state==$final_states) {

 echo "<option value='".$final_states."' selected>".$final_states."</option>";
}
else{

    echo "<option value='".$final_states."'>".$final_states."</option>";
}

}



?>