<?php
// validate an email

if (filter_var("jjoselon3167@hotmail.com", FILTER_VALIDATE_EMAIL) === false) {
  // bad email !!
}

// Romper (rip) etiquetas HTML para evitar Cross-site Scripting
//http://php.net/manual/es/function.strip-tags.php#110280
function rip_tags($string) { 
    
    // ----- remove HTML TAGs ----- 
    $string = preg_replace ('/<[^>]*>/', ' ', $string); 
    
    // ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    
    // ----- remove multiple spaces ----- 
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    
    return $string; 

}

// validate if an string has not whitespaces at the beginning AND the end
// https://stackoverflow.com/questions/37142882/php-check-if-string-contains-space-between-words-not-at-begining-or-end/37144463#37143044
if (preg_match("/(^\s|\s$)/", $sCellValue) === 1) {
  // string has whitespaces left or right
}

// validate if all values in the array are empty
// https://stackoverflow.com/questions/5040811/checking-if-all-the-array-items-are-empty-php
if (strlen(implode($aRow)) == 0) {
   echo "all values of the array are empty";
}
