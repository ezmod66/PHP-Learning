<?php

    //f -> c = f-32     * 0,55555555555555555555555555555556 (5/9)
    //c -> f = c * 1,8 (9/5) + 32 

    $temp = 0;

    function converCtoF($c)
    {
        $f = $c * 1.8 + 32;
        
        return round($f,1);
    }

    while($temp <= 100)
    {
        echo "$temp c = ".converCtoF($temp)."F<br>";
        $temp++;
    }
?>