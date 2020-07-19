<?php

echo "Задание № 1 <br>  Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.<br><br>";

if (isset($_GET['path'])){
    getDirectory($_GET['path']);
} else {
    getDirectory('/');
}

function getDirectory($path) {
    $dir = new DirectoryIterator(realpath($path));
    foreach ($dir as $item) {
        if($item->isDot()) // проверка на . ..
            continue;
        if($item->isDir()) { // проверка директория или файл
            echo "папка <a href='?path={$item->getPathname()}'>{$item}</a><br>";
        } else {
            echo "файл {$item}<br>";
        }
    }

    echo "<br><br><a href='/'>На главную</a>";
}


/*
    Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности испольщовать SplStack.

    Примеры:
        "Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}" - true
        ((a + b)/ c) - 2 - true
        "([ошибка)" - false
        "(") - false
*/

echo "<br><br>Задание № 2 <br>  Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности испольщовать SplStack.<br><br>
    Примеры:<br>
    \"Это тестовый вариант проверки (задачи со скобками).<br> 
    И вот еще скобки: {[][()]}\" - true<br>
    ((a + b)/ c) - 2 - true<br>
    \"([ошибка)\" - false<br>
    \"(\") - false<br><br>";
   

function checkBrackets($str, $brackets){
    $input = str_split($str); //перевод строки в массив
    $keys = array_keys($brackets); // массив ключей скобок ( [ {
    $stack = new SplStack (); //инициализируем стек
    foreach ($input as $item) { // пробегаемся поэлементно по массиву, который был введен
        if (in_array($item, $keys)) // если элемент массива соответствует  ключу ( [ { то добавляем в стек и переходим на следующий элемент массива
            $stack->push($item);
            continue;
       //если текущий элемент массива равен закрывающему .....
     
    }
    var_dump($stack);
    die();
}
$brackets = [
    '(' => ')', 
    '{' => '}', 
    '[' => ']', 
];

$str = "()()){}[]";
echo "$str - " . checkBrackets($str, $brackets);


/*
    Простые делители числа 13195 - это 5, 7, 13 и 29.
    Каков самый большой делитель числа 600851475143, являющийся простым числом? 
*/