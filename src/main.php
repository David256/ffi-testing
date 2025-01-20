<?php

echo "Así que vuelve arrastrándose... ¿eh?\n";

$ffi = FFI::cdef(
    "
    void fome_calc(int* array1, int* array2, int* result, int length);
    ",
    "./our_fome_library.so" // The path
);

echo "Cargué esta cuestión\n";

$length = 5;

$array1 = [3, 4, 2, 2, 0];
$array2 = [5, -2, 0, 1, 10];

// An empty array for the result
$result = array_fill(0, $length, 0);

// Convert to the C pointer data
$ffi_array1 = FFI::new("int[$length]");
$ffi_array2 = FFI::new("int[$length]");
$ffi_result = FFI::new("int[$length]");

// Copy each value
for ($i = 0; $i < $length; $i++) {
    $ffi_array1[$i] = $array1[$i];
    $ffi_array2[$i] = $array2[$i];
}

// Call the external function with the same name
$ffi->fome_calc($ffi_array1, $ffi_array2, $ffi_result, $length);

// Get the result and convert to the PHP data
for ($i = 0; $i < $length; $i++) {
    $result[$i] = $ffi_result[$i];
}

print_r($result);
