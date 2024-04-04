<?php
session_start(); // Assurez-vous que la session est démarrée pour accéder à $_SESSION

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numbers']) && isset($_POST['operation'])) {
    $numbers = $_POST['numbers'];
    $operation = $_POST['operation'];
    $numberArray = explode(',', $numbers);
    $allNumbers = array_filter($numberArray, 'is_numeric');

    if (count($allNumbers) == count($numberArray) && !empty($allNumbers)) {
        switch ($operation) {
            case 'add':
                $result = array_sum($allNumbers);
                break;
            case 'subtract':
                $result = array_shift($allNumbers);
                foreach ($allNumbers as $num) {
                    $result -= $num;
                }
                break;
            case 'multiply':
                $result = array_product($allNumbers);
                break;
            case 'divide':
                $result = array_shift($allNumbers);
                foreach ($allNumbers as $num) {
                    if ($num == 0) {
                        $result = 'Error: Cannot divide by zero.';
                        break 2; // Break out of switch and foreach
                    }
                    $result /= $num;
                }
                break;
            default:
                $result = 'Invalid operation.';
        }
    } else {
        $result = 'Please enter valid numbers separated by commas.';
    }

    // Stockage du résultat dans la session
    $_SESSION['result'] = $result;
}

// Redirection vers index.php
header('Location: index.php');
exit();
