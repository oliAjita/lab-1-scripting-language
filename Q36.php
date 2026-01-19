<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $income = $_POST["income"];
    $marital = $_POST["marital"];
    $gender = $_POST["gender"];
    $tax = 0;

    if($marital == "Married") {
        if ($income > 0 && $income <= 450000) {
            $tax = $income * 0.01;
        }
        elseif ($income > 450000 && $income <= 550000) {
            $tax = 4500 + ($income - 450000) * 0.1;
        }
        elseif ($income > 550000 && $income <= 750000) {
            $tax = 4500 + 10000 + ($income - 550000) * 0.2;
        }
        elseif ($income > 750000 && $income <= 1300000) {
            $tax = 4500 + 10000 + 40000 + ($income - 750000) * 0.3;
        }
        elseif ($income > 1300000) {
            $tax = 4500 + 10000 + 40000 + 165000 + ($income - 1300000) * 0.35;
        }
    }
    elseif($marital == "Unmarried") {
        if ($income > 0 && $income <= 400000) {
            $tax = $income * 0.01;
        }
        elseif ($income > 400000 && $income <= 500000) {
            $tax = 4000 + ($income - 400000) * 0.1;
        }
        elseif ($income > 500000 && $income <= 750000) {
            $tax = 4000 + 10000 + ($income - 500000) * 0.2;
        }
        elseif ($income > 750000 && $income <= 1300000) {
            $tax = 4000 + 10000 + 50000 + ($income - 750000) * 0.3;
        }
        elseif ($income > 1300000) {
            $tax = 4000 + 10000 + 50000 + 165000 + ($income - 1300000) * 0.35;
        }
    }

    if($gender == "f") {
        $tax = $tax - ($tax * 0.1);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tax Calculator</title>
</head>
<body>
    <form method="post">
        <label>Annual income: </label>
        <input type="number" name="income" required value="<?= $_POST['income'] ?? '' ?>"><br><br>

        <label for="gender">Gender: </label>
        <input type="radio" name="gender" value="m" <?= (isset($gender) && $gender=='m')?'checked':'' ?> />Male
        <input type="radio" name="gender" value="f" <?= (isset($gender) && $gender=='f')?'checked':'' ?> />Female
        <br><br>

        <label for="marital">Marital status: </label>
        <select name="marital" id="marital">
            <option value="">Select marital status</option>
            <option value="Married" <?= (isset($marital) && $marital=='Married')?'selected':'' ?> >Married</option>
            <option value="Unmarried" <?= (isset($marital) && $marital=='Unmarried')?'selected':'' ?> >Unmarried</option>
        </select> 
        <br><br>
        <button type="submit">Calculate tax</button>
    </form>
    <?= isset($tax) ? "<h3>Tax Amount: Rs. $tax</h3>" : "" ?>
</body>
</html>
