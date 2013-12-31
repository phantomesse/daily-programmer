public class GenerateMN {
    private static final int MAX_JULIAN_YEARS = 500;
    private static final int MAX_LUNAR_MONTHS = 6000;

    public static void main(String[] args) {
        System.out.printf("%-15s%-15s%-15s\n", "Julian Years", "Lunar Months", "Days");
        for (int julianYears = 0; julianYears <= MAX_JULIAN_YEARS; julianYears++) {
            for (int lunarMonths = 0; lunarMonths <= MAX_LUNAR_MONTHS; lunarMonths++) {
                int synchronize = SynchronizingCalendars.synchronizingCalendars(julianYears, lunarMonths);
                if (synchronize > 0) {
                    System.out.printf("%-15d%-15d%-15d\n", julianYears, lunarMonths, synchronize);
                }
            }
        }
    }
}