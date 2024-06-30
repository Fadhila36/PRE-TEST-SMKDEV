<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highest Palindrome</title>
</head>

<body>
    <?php

    function findHighestPalindrome($str, $k)
    {
        $left = 0;
        $right = strlen($str) - 1;
        $strArray = str_split($str);

        while ($left < $right) {
            if ($strArray[$left] != $strArray[$right]) {
                $strArray[$left] = $strArray[$right] = max($strArray[$left], $strArray[$right]);
                $k--;
            }
            $left++;
            $right--;
        }

        // Second pass to make the string a palindrome with remaining k changes
        $left = 0;
        $right = strlen($str) - 1;

        while ($left <= $right) {
            if ($left == $right) {
                if ($k > 0) {
                    $strArray[$left] = '9';
                }
            }

            if ($strArray[$left] != '9') {
                if ($k >= 2 && ($strArray[$left] == $str[$left] || $strArray[$right] == $str[$right])) {
                    $strArray[$left] = $strArray[$right] = '9';
                    $k -= 2;
                } elseif ($k >= 1 && ($strArray[$left] != $str[$left] || $strArray[$right] != $str[$right])) {
                    $strArray[$left] = $strArray[$right] = '9';
                    $k--;
                }
            }

            $left++;
            $right--;
        }

        return $k < 0 ? -1 : implode("", $strArray);
    }

    // Soal 1
    $inputs1 = [
        ["string" => "12321", "k" => 1],
        ["string" => "45654", "k" => 2]
    ];
    $results1 = array_map(fn ($input) => findHighestPalindrome($input["string"], $input["k"]), $inputs1);

    // Soal 2
    $inputs2 = [
        ["string" => "765467", "k" => 1],
        ["string" => "812128", "k" => 2]
    ];
    $results2 = array_map(fn ($input) => findHighestPalindrome($input["string"], $input["k"]), $inputs2);

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