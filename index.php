<?php

function prints($data) {
    echo $data . '<br>';
    return;
}

//----------TASK 1-------------
function getAbr(string $str) :string {
    $arr = explode(' ', $str);
    $result = array_map(function($word){
        return mb_strtoupper(mb_substr($word, 0, 1));
    },$arr);
    return implode($result);
}
prints(getAbr("Донбасская государственная машиностроительная академия"));

//----------TASK 2-------------
function truncate_string(string $str, int $maxsymbol) :string {
    return (mb_strlen($str) > $maxsymbol) ? (mb_substr($str,0, ($maxsymbol-3)) . "...") : $str ;
}
prints(truncate_string("12345678905345346346345", 10));

//----------TASK 3-------------
// Variant 1
function getCountSymbol(string $str, string $symbol) :int {
    return (mb_strlen($symbol) == 1) ? mb_substr_count($str,$symbol) : 0;
}
prints(getCountSymbol("телефон", "е"));

// Variant 2
function getCountSymbol_(string $str, string $symbol) :int {
    if (mb_strlen($symbol > 1)) { return 0; }
    $count = 0;
    for ($i = 0; $i < mb_strlen($str); $i++) {
        if (mb_substr($str, $i, 1) == $symbol) {
            $count++;
        }
    }
    return $count;
}
prints(getCountSymbol_("телефон", "е"));

//----------TASK 4-------------
function toValidString(string $str) :string {
    return trim(htmlspecialchars(strip_tags($str)));
}
prints(toValidString("<span> Текст из формы </span>"));

//----------TASK 5-------------
function getShortFio(string $str) :string {
    $arr = explode(' ', $str);
    return $arr[0] . " " . mb_substr($arr[1], 0, 1) . ". " . mb_substr($arr[2], 0, 1) . ".";
}
prints(getShortFio("Иванов Иван Иванович"));

//----------TASK 6-------------
function getFileType(string $path) :string {
    return substr($path, strrpos($path, ".")+1);
}
prints(getFileType("C:/Users/vladm/Downloads/ospanel/domains/localhost/index.php"));
//------------END--------------








?>

