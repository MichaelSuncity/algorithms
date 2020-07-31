<?php
/*Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1).
Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
[] => 1*/

function search($myArray)
{
	$start = 0; 				
	$end = count($myArray) - 1;	
	while ($start < $end) { 

		$base = floor(($start + $end) / 2); 
    
        $value = $base + 1;
        
        if ($myArray[$base] == $value) {
            if (($myArray[$base + 1] - $myArray[$base]) == 2) { 
                $result = $myArray[$base] + 1; 
                break;
            }
            $start = $base + 1;
        } else {
            if (($myArray[$base] - $myArray[$base - 1]) == 2) { 
                $result = $myArray[$base] - 1; 
                break;
            }
        $end = $base - 1;
        }
	}
    return !empty($myArray) ? $result : 1;
}

$myArray = [1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16];

echo "[" . implode(", ",$myArray) . "] => " . search($myArray);