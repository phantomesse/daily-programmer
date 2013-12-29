#include <stdio.h>
#include <string.h>

#define BUFFER_LENGTH 256

int main() {
    char *p;

    // Get number of lines
    int lines = 0;
    scanf("%d", &lines);

    // Clear new line thing
    scanf("%*c");

    // Create a line by BUFFER_LENGTH matrix
    char matrix[lines][BUFFER_LENGTH];
    for (int i = 0; i < lines; i++) {
        for (int j = 0; j < BUFFER_LENGTH; j++) {
            matrix[i][j] = '\0';
        }
    }

    // Read lines and put into matrix
    int max_str_length = 0;
    for (int i = 0; i < lines; i++) {
        p = fgets(matrix[i], BUFFER_LENGTH, stdin);
        
        // Get string length
        int str_length = (int) strlen(matrix[i]);

        // Put end character in
        if (matrix[i][str_length - 1] == '\n') {
            matrix[i][str_length - 1] = '\0';
            str_length = str_length - 1;
        } else {
            matrix[i][str_length] = '\0';
        }

        // Set max string length
        if (str_length > max_str_length) {
            max_str_length = str_length;
        }
    }

    // Print matrix vertically
    for (int i = 0; i < max_str_length; i++) {
        for (int j = 0; j < lines; j++) {
            if (matrix[j][i] == '\0') {
                printf(" ");
            } else {
                printf("%c", matrix[j][i]);
            }
        }
        printf("\n");
    }

    return 0;
}