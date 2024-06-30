<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balanced Bracket</title>
</head>

<body>
    <?php

    function isBalanced($string)
    {
        $brackets = ['(' => ')', '{' => '}', '[' => ']'];
        $stack = [];

        foreach (str_split($string) as $char) {
            if (isset($brackets[$char])) {
                array_push($stack, $char);
            } elseif (in_array($char, [')', '}', ']'])) {
                if (empty($stack) || $brackets[array_pop($stack)] != $char) {
                    return "NO";
                }
            }
        }

        return empty($stack) ? "YES" : "NO";
    }

    // Soal 1
    $inputs1 = ["([{}])", "([{]})", "({[]})"];
    $results1 = array_map('isBalanced', $inputs1);

    // Soal 2
    $inputs2 = ["{[(())]}", "{[(])}", "[{()}]"];
    $results2 = array_map('isBalanced', $inputs2);

    // Menampilkan hasil
    echo "<h2>Hasil Soal 1:</h2><pre>";
    print_r($results1);
    echo "</pre>";

    echo "<h2>Hasil Soal 2:</h2><pre>";
    print_r($results2);
    echo "</pre>";

    ?>
</body>

</html>