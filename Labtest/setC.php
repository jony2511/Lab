<?php
session_start();

class GradingSystem{
    public $studentID;
    public $number;
    public function __construct()
    {
        if(!isset($_SESSION["a"]))
            $_SESSION["a"]=0;
        if(!isset($_SESSION["b"]))
            $_SESSION["b"]=0;
        if(!isset($_SESSION["c"]))
            $_SESSION["c"]=0;
        if(!isset($_SESSION["f"]))
            $_SESSION["f"]=0;
    }
    public function setGrade($number)
    {
        if($number>=80 and $number<=100)
            $_SESSION["a"]+=1;
        else if($number>=60 and $number<=79)
            $_SESSION["b"]+=1;
        else if($number>=40 and $number<=59)
            $_SESSION["c"]+=1;
        else if($number>=0 and $number<=39)
            $_SESSION["f"]+=1;
    }
}
$grade= new GradingSystem();
if($_SERVER["REQUEST_METHOD"]=="POST")
         {
            $mark=$_POST["number"];
            $grade->setGrade($mark);
         }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Labtest set C</title>
    </head>
    <body>
        <h3>Grade Management System</h3>
        <form method="post">
           <label>Student ID </label>
           <input type="text" name="studentID" placeholder="Enter student ID here"><br><br>
           <label>Number </label>
           <input type="number" name="number" placeholder="Enter Mark here"><br><br>
           <button type="submit" name="action">Submit</button><br><br>
           <p>Current Number of A+: <?php echo $_SESSION["a"]?></p>
           <p>Current Number of B+: <?php echo $_SESSION["b"]?></p>
           <p>Current Number of C+: <?php echo  $_SESSION["c"]?></p>
           <p>Current Number of F: <?php echo $_SESSION["f"]?></p>
        </form>
    
    </body>
</html>