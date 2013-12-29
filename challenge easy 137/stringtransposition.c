#include <stdio.h>
#include <string.h>

#define BUFFER_LENGTH 256

int main() {
    char *p;

    // Get number of lines
    int lines = 0;
    scanf("%d", &lines);

    // Create a line by BUFFER_LENGTH matrix
    char matrix[lines][BUFFER_LENGTH];
    for (int i = 0; i < lines; i++) {
        for (int j = 0; j < BUFFER_LENGTH; j++) {
            matrix[i][j] = '\0';
        }
    }

    // Clear new line thing
    p = fgets(matrix[0], BUFFER_LENGTH, stdin);

    // Read lines and put into matrix
    int max_str_length = 0;
    for (int i = 0; i < lines; i++) {
        p = fgets(matrix[i], BUFFER_LENGTH, stdin);
        
        // Set max string length
        int str_length = (int) strlen(matrix[i]);
        if (str_length > max_str_length) {
            max_str_length = str_length;
        }

        // Put end character in
        matrix[i][str_length] = '\0';
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

}