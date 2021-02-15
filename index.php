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

echo "[" . implode(", ",$myArray) . "] => " . search($myArray) . "<br><br>";


/*Доработать алгоритм бинарного поиска для нахождения кол-ва повторений в массиве. 
Сложность O(logn) не должна измениться. Учтите, что массив длиной n может состоять из одного значения [4, 4, 4, 4, ...(n)..., 4]*/

$myArray1 = [1, 2, 3, 4, 4, 4, 5, 6, 7];
$myArray2 = [1, 1, 1, 2 ,3, 4, 5, 6, 7];
$myArray3 = [1, 2, 3, 4, 5, 6, 7, 7, 8];
$myArray4 = [4, 4, 4, 4, 4, 5, 6, 7, 8];
$myArray5 = [1, 2, 2, 3, 4, 5, 6, 7, 8];
$myArray6 = [4, 4, 4, 4, 4, 4, 4];


const LEFT = 'left';
const RIGHT = 'right';


echo "[" . implode(", ", $myArray6) . "] " . binarySearchRepeat($myArray6, 4);

function binarySearchRepeat($myArray, $num)
{
	if (count($myArray) == 1 && $myArray[0] == $num) return "Число в массиве одно и соответствует поиску";

	$leftIndex = binarySearch($myArray, $num, LEFT);
	if ($leftIndex === null)
		return "Искомое число отсуствует";
	if (checkNumEdge($myArray, $leftIndex, RIGHT))
		return "Число $num имеет лишь индекс $leftIndex";

	$rightIndex = binarySearch($myArray, $num, RIGHT);
	$repeat = $rightIndex - $leftIndex + 1;
	return "Число $num повторяется $repeat раз от $leftIndex до $rightIndex индекса";

}

function checkNumEdge(array $myArray, $index, $check)
{
	if ($check == LEFT) {
		if ($index === 0) return true;
		if ($myArray[$index] === $myArray[$index - 1]) return false;
		return true;
	}
	elseif ($check == RIGHT) {
		if ($index == count($myArray) - 1) return true;
		if ($myArray[$index] === $myArray[$index + 1]) return false;
		return true;
	}
}

function binarySearch($myArray, $num, $check)
{

	$start = 0;
	$end = count($myArray) - 1;

	while ($start <= $end) {

		$base = floor(($start + $end) / 2);

		if ($myArray[$base] == $num) {
			if (checkNumEdge($myArray, $base, $check)) {
				return $base;
			} elseif ($check == RIGHT) {
				$start = $base + 1;
			} elseif ($check == LEFT) {
				$end = $base - 1;
			}
		} elseif ($myArray[$base] < $num) {
			$start = $base + 1;
		} elseif ($myArray[$base] > $num) {
			$end = $base - 1;
		}

	}
	return null;
}
