<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

fscanf($_fp, '%d', $tests);

for(;$tests--;)
{
    fscanf($_fp, '%d', $dollars);
    fscanf($_fp, '%d', $flavors);
    $prices = fgets($_fp);
    $prices = array_map('intval', explode(' ', $prices));
    
    if ($dollars < min($prices))
    {
        echo 0, ' ', 0, PHP_EOL;
        continue;
    }
    
    //optim
    for ($j = 0; $j < count($prices); $j ++)
    {
        $total = $prices[$j];
        for ($i = $j + 1; $i < count($prices); $i ++)
        {
            if ($prices[$i] + $prices[$j] == $dollars)
            {
                echo $j + 1, ' ', $i + 1, PHP_EOL;
                break 2;
            }
        }
    }
}
