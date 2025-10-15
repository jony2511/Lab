<?php
 $connection= new mysqli("localhost","root","","mydb");
 
 if($connection->connect_error)
 {
 die("Connection failed: " .$connection->connect_error); 
}



//Hospital System Class
 class HospitalSystem {
  public $hospitalID;
  public $beds;

  public function __construct($hospitalID)
  {
    global $connection;
   $sql="select beds from hospital";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

    $this->hospitalID=$hospitalID;
    $this->beds= $row["beds"];
  }
  
  public function appoint($no_of_beds)
  {
     
     if($no_of_beds>20)
     {
      echo "You cannot appoint more than 20 beds at a time";
     }elseif($this->beds>$no_of_beds)
     {
      $this->beds-=$no_of_beds;
     }
    else
      {
      echo "Insufficient Beds"; 
      }
   
  }
  
  public function release($no_of_beds)
  {
    
     if($this->beds+$no_of_beds>500)
     {
         echo "No release can be made!<br>Maximum limit reached.";
       }else
       {
         $this->beds+=$no_of_beds;  
       }
  }
  
  public function showAvailabeBeds()
  {
   return $this->beds;
  }

  public function updateSeats()
 {
    global $connection;
   $sql="update hospital set beds=$this->beds";
   $connection->query($sql);
 }
}


//Processing User Input
 if(isset($_POST['action']))
{
   $bed_no=(int)$_POST['bed_no'];
   $action=$_POST['action'];
   
   $hosp= new HospitalSystem(123123);
   if($action == "appoint")
     $hosp->appoint($bed_no);
   elseif($action == "release")
     $hosp->release($bed_no);
      
   $hosp->updateSeats();
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
</head>
<body>
    <h2>Hospital Management System</h2>
    <form method="post" action="setB.php">
    <label for="bed_no">No of Beds: </label>
     <input type="number" name="bed_no" required>
     <button type="submit" name="action" value="appoint">Appoint</button>
     <button type="submit" name="action" value="release">Release</button>
     </form>
     <p>Current Number of Available Beds: <?php 
    global $connection;
    $sql="select beds from hospital";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();
    echo $row["beds"];
     ?></p>
    
</body>
</html>