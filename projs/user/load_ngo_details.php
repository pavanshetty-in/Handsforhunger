 <?php  
 //load_data.php  
   
 require './../config.php';  
 $output = '';  
 if(isset($_POST["city"]))  
 {  
      if($_POST["city"] != '')  
      {  
           $sql = "SELECT * FROM ngo WHERE ngo_workcity  = '".$_POST["city"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM ngo";  
      }  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<input   type="radio" id='.$row["ngo_id"].' name="ngo" value='.$row["ngo_id"].' required >';  
           $output .= '<label for='.$row["ngo_id"].'>'.strtoupper($row["ngo_name"]).',<sub>'.$row["ngo_workarea"].' </sub> '.$row["ngo_workcity"].'<br>'.$row["ngo_phonenumber"].'</label>'; 
      }  
      echo $output;  
 }  
 ?>  