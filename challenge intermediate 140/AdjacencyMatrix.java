import java.util.Scanner;

public class AdjacencyMatrix {
    public static void main(String[] args) throws NumberFormatException {
        Scanner in = new Scanner(System.in);
        
        // Get M and N
        String[] mn = in.nextLine().split(" ");
        int m = Integer.parseInt(mn[0]);
        int n = Integer.parseInt(mn[1]);

        // Create an N by N two dimensional array
        int[][] matrix = new int[n][n];

        // Get adjacency data from user input
        for (int i = 0; i < m; i++) {
            String[] line = in.nextLine().split(" -> ");
            int startNode = Integer.parseInt(line[0]);
            
            // Convert end nodes to integers and add to matrix
            String[] endNodeStrs = line[1].split(" ");
            for (int j = 0; j < endNodeStrs.length; j++) {
                int endNode = Integer.parseInt(endNodeStrs[j]);

                // Add to matrix
                matrix[startNode][endNode] = 1;
            }
        }

        // Print matrix
        for (int i = 0; i < n; i++) {
            for (int j = 0; j < n; j++) {
                System.out.print(matrix[i][j]);
            }
            System.out.println();
        }
    }
}