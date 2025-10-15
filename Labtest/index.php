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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8f9fa;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            background: #ffffff;
            padding: 20px;
            width: 350px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0px 0px 8px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .results {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Grade Management System</h2>

    <form action="index.php" method="post">
        <label for="studentid">Student ID</label>
        <input type="text" id="studentid" name="studentid" required>

        <label for="number">Number</label>
        <input type="number" id="number" name="number" min="0" max="100" required>

        <input type="submit" value="Submit">
    </form>

    <div class="results">
        <p>Current Number of A+: <?php echo $_SESSION["a"]; ?></p>
        <p>Current Number of B+: <?php echo $_SESSION["b"]; ?></p>
        <p>Current Number of C+: <?php echo $_SESSION["c"]; ?></p>
        <p>Current Number of F: <?php echo $_SESSION["f"]; ?></p>
    </div>

</body>
</html>
