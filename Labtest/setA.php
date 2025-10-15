<?php
session_start();

// --- BankAccount class definition ---
class BankAccount {
    public $accountNumber;
    public $balance;

    public function __construct($accountNumber) {
        $this->accountNumber = $accountNumber;
        $this->balance = isset($_SESSION['balance']) ? $_SESSION['balance'] : 0;
    }

    public function deposit($amount) {
        if ($amount > 0 && $amount <= 1000) {
            $this->balance += $amount;
            $_SESSION['balance'] = $this->balance;// Update session balance
            $_SESSION['message'] = "✅ Successfully deposited $$amount.";
        } else {
            $_SESSION['message'] = "❌ Deposit failed: Deposit limit is $1000 per transaction.";
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
            $_SESSION['balance'] = $this->balance;// Update session balance
            $_SESSION['message'] = "✅ Successfully withdrew $$amount.";
        } else {
            $_SESSION['message'] = "❌ Withdraw failed: Insufficient balance.";
        }
    }

   
}

// --- Processing user input ---
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $amount = (int)$_POST['amount'];
    $action = $_POST['action'];

    $account = new BankAccount("123456");

    if ($action == "deposit") {
        $account->deposit($amount);
    } elseif ($action == "withdraw") {
        $account->withdraw($amount);
    }

    
    header("Location: setA.php"); // Reload page
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bank Account Form</title>
</head>
<body>
    <h2>Bank Account Form</h2>
    <form method="post" action="setA.php">
        <label>Amount:</label>
        <input type="number" name="amount" required>
        <button type="submit" name="action" value="deposit">Deposit</button>
        <button type="submit" name="action" value="withdraw">Withdraw</button>
    </form>

    <p>Current balance: $<?php echo $_SESSION['balance'] ?? 0; ?></p>

    <?php if (isset($_SESSION['message'])): ?>
        <p><b><?php echo $_SESSION['message']; ?></b></p>
        <?php unset($_SESSION['message']); // clear after showing ?>
    <?php endif; ?>
</body>
</html>
