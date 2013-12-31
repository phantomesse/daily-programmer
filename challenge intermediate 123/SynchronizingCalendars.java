import java.util.Scanner;

public class SynchronizingCalendars {
    public static void main(String[] args) throws NumberFormatException {
        Scanner in = new Scanner(System.in);
        
        while (in.hasNextLine()) {
            String[] line = in.nextLine().split(", ");

            int julianYears = Integer.parseInt(line[0]);
            int lunarMonths = Integer.parseInt(line[1]);

            System.out.println(synchronizingCalendars(julianYears, lunarMonths));
        }
    }

    public static int synchronizingCalendars(int julianYears, int lunarMonths) {
        int julianDays = (int) (365.25*julianYears);
        int lunarDays = (int) Math.round(29.53059*lunarMonths);
        return julianDays == lunarDays ? julianDays : 0;
    }
}