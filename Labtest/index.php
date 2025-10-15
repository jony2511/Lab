<?php
session_start();
 class Earnings{
    public $income;
    public $expnese;
    public function __construct($acc)
    {
        if(!isset($_SESSION["total"]))
                $_SESSION["total"]=0;
    }
    public function add_income($income)
    {
        $_SESSION["total"]+=$income;
    }
    public function sub_expense($expnese)
    {
        $_SESSION["total"]-=$expnese;
    }
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Practice</title>
    </head>
    <body>
        <h3>Hello world</h3>
        <form method="post" action="index.php">
            <label>Enter you name:</label>
            <input tpye="text" name="username" placeholder="Enter your name here" required><br><br>
            <label>Enter you calculation:</label>
            <input type="number" name="income" placeholder="Enter you earnings here" required><br><br>
            <button type="submit" name="action" value="income_button">ADD Income</button>
            <button type="submit" name="action" value="expense_button">Expense</button>
       </form>
        <hr>
       <?php
         if($_SERVER["REQUEST_METHOD"]=="POST")
         {
            $name=$_POST["username"];
            $calc=$_POST["income"];
            $action=$_POST["action"];
            
            
            $obj=new Earnings(123);
            if($action==="income_button")
             $obj->add_income($calc);
            if($action==="expense_button")
                $obj->sub_expense($calc);
            echo "<p>Hello,$name Welcome to our page!<br>Your Total earning is: <strong>" .$_SESSION["total"]. "</strong></p>";
         }
       ?>
    </body>
</html>