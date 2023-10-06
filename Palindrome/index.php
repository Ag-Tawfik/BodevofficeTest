<?php

function isPalindrome(string $word): bool
{
    return strtolower($word) === strtolower(strrev($word));
}

function findPalindromes(string $paragraph): array
{
    $palindromes = [];
    $words = preg_split('/\W+/', $paragraph);

    $filteredSmallWords = array_filter($words, function ($word) {
        return strlen($word) > 2;
    });

    foreach ($filteredSmallWords as $word) {
        if (isPalindrome($word)) {
            $palindromes[] = $word;
        }
    }

    return $palindromes;
}

$paragraph = "Wow! Madam, I'm Adam. Go hang a salami, I'm a lasagna hog. Sit on a potato pan, Otis. Civic! Rotor! Level! Noon! Mom! Deed! Kayak!";

$palindromes = findPalindromes($paragraph);

if ($palindromes) {
    echo "Palindromes in the paragraph:";
    foreach ($palindromes as $palindrome) {
        echo " $palindrome";
    }
    echo "\n";
} else {
    echo "No palindromes found in the paragraph.\n";
}
