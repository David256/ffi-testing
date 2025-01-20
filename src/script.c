#include <stdio.h>

void fome_calc(int *array1, int *array2, int *result, int length)
{
    for (int i = 0; i < length; i++)
    {
        result[i] = array1[i] + array2[i];
    }
}
