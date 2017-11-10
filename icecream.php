<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, "%d", $t);
$trips = array();

$daysInfo    = array();
$lineNumber  = 1;
$dayNumber   = 1;
$currentDate = [];
$keys        = ['sum', 'flavourNumber', 'costs'];

while ($line = fgets($_fp))
{
    $currentDate[] = $line;

    if ($lineNumber % 3 == 0)
    {
        $daysInfo[]  = array_combine($keys, $currentDate);
        $currentDate = [];
    }

    $lineNumber++;

}
fclose($_fp);


foreach ($daysInfo as $index => $dayInfo)
{
    $m         = $dayInfo['sum'];
    $flavoures = explode(' ', $dayInfo['costs']);
    $result    = getCombination($flavoures, $m);
    echo implode(' ', $result) . PHP_EOL;

}


function getCombination($arr, $m)
{

    foreach ($arr as $index => $item)
    {
        $m = (int)$m;
        if ($item > $m)
        {
            continue;
        }

        for ($i = 1; $i < count($arr); $i++)
        {
            $value = $arr[$i];
            if (($item + $value) == $m && $index != $i)
            {
                if ($index > $i)
                {
                    return [$i + 1, $index + 1];

                }
                else
                {
                    return [$index + 1, $i + 1];
                }

            }
        }

    }
}


?>