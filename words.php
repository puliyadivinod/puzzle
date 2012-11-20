<?php
$vowels = array('a','e','i','o','u');
$words = file('test.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$words = array_map('strtolower', $words);

$vowel_words = array();
foreach($words as $line_num => $word){
    $place = array();
    foreach($vowels as $key => $vowel){
        if(substr_count($word, $vowel) == 1){
            $position = stripos($word, $vowel);
            if($position !== false){
                $place[$vowel] = $position;
            }
        }
    }
    if(count($place) == 5){
        $success = true;
        foreach ($vowels as $key => $vowel) {
            if(array_search(min($place), $place) != $vowel){
                $success = false;
            }
            unset($place[$vowel]);
        }
        if($success){
            $vowel_words[] = $word;
        }
    }
}

echo 'Puzzle 1'.PHP_EOL;
echo '-----------------------------------------------'.PHP_EOL;
echo 'Total Words: '. count($words).PHP_EOL;
echo 'Vowel Words: '. count($vowel_words).PHP_EOL;
echo 'List: '. implode(', ', $vowel_words).PHP_EOL;
echo '-----------------------------------------------'.PHP_EOL;

/* End Of Puzzle one */

$alphabets = range('a','z');
$alphabet_words = array();

foreach($words as $line_num => $word){
    if(strlen($word) >= 6){    
        $place = array();
        foreach($alphabets as $key => $alphabet){
            $position = stripos($word, $alphabet);
            if($position !== false){
                $place[$alphabet] = $position;
            }
        }

        $success = true;
        foreach ($alphabets as $key => $alphabet) {
            //echo $alphabet.PHP_EOL;
            echo min($place).PHP_EOL;
            echo array_search(min($place), $place).PHP_EOL;
            if(array_search(min($place), $place) != $alphabet){
               if(substr_count($word, $alphabet) == 1){
                    $success = false;
                }
            }
        }
        if($success){
            $alphabet_words[] = $word;
        }
        print_r($place);
    }
}

echo 'Puzzle 2'.PHP_EOL;
echo '-----------------------------------------------'.PHP_EOL;
echo 'Total Words: '. count($words).PHP_EOL;
echo 'Alphabets Words: '. count($alphabet_words).PHP_EOL;
//echo 'List: '. implode(', ', $alphabet_words).PHP_EOL;
echo '-----------------------------------------------'.PHP_EOL;
?>