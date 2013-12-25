import java.util.Scanner;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map.Entry;
import java.util.ArrayList;

public class FranceColors {
    public static void main(String[] args) throws NumberFormatException {
        Scanner in = new Scanner(System.in);
        
        // Get number of departments
        int numberOfDepartments = Integer.parseInt(in.nextLine());

        // Create an array of departments
        HashMap<Integer, Integer> departments = new HashMap<Integer, Integer>();

        // Get department graph information
        int numberOfColors = 1;
        for (int i = 0; i < numberOfDepartments; i++) {
            String[] line = in.nextLine().split(" ");

            // Get the source node and give it a color if it doesn't have one
            int sourceNode = Integer.parseInt(line[0]);
            if (departments.get(sourceNode) == null) {
                departments.put(sourceNode, 0);
            }

            // Create a colors used list
            ArrayList<Integer> colorsUsed = new ArrayList<Integer>();
            colorsUsed.add(departments.get(sourceNode));

            // Get connected nodes and give each node a color
            for (int j = 1; j < line.length; j++) {
                int node = Integer.parseInt(line[j]);
                if (departments.get(node) == null) {

                    // Get a color
                    int color = -1;
                    for (int k = 0; k < numberOfColors; k++) {
                        if (!colorsUsed.contains(k)) {
                            color = k;
                            break;
                        }
                    }
                    if (color == -1) {
                        color = numberOfColors++;
                        colorsUsed.add(color);
                    }

                    departments.put(node, color);
                }
            }
        }

        // Print department information
        Iterator<Entry<Integer, Integer>> iterator = departments.entrySet().iterator();
        while (iterator.hasNext()) {
            Entry<Integer, Integer> entry = iterator.next();
            System.out.printf("%d\t%d\n", entry.getKey(), entry.getValue());
        }

    }
}