<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weighted Strings</title>
</head>

<body>
    <?php

    function getCharWeight($char)
    {
        return ord($char) - ord('a') + 1;
    }

    function calculateWeights($string)
    {
        $weights = [];
        $length = strlen($string);
        $currentStreak = 1;

        for ($i = 0; $i < $length; $i++) {
            $weight = getCharWeight($string[$i]);
            $currentStreak = ($i > 0 && $string[$i] == $string[$i - 1]) ? $currentStreak + 1 : 1;
            $weights[$weight * $currentStreak] = true;
        }

        return array_keys($weights);
    }

    function checkQueries($string, $queries)
    {
        $weights = calculateWeights($string);
        return array_map(fn ($query) => in_array($query, $weights) ? "Yes" : "No", $queries);
    }

    $string1 = "deeffggg";
    $queries1 = [5, 10, 21, 15];
    $result1 = checkQueries($string1, $queries1);

    $string2 = "aaabbccccd";
    $queries2 = [3, 6, 12, 24];
    $result2 = checkQueries($string2, $queries2);

    echo "<h2>Hasil Soal 1:</h2><pre>";
    print_r($result1);
    echo "</pre>";

    echo "<h2>Hasil Soal 2:</h2><pre>";
    print_r($result2);
    echo "</pre>";

    ?>
</body>

</html>