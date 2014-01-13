import java.util.Scanner;

public class Main {
    public static void main(String[] args) throws NumberFormatException {
        Scanner in = new Scanner(System.in);

        int n = Integer.parseInt(in.nextLine());

        for (int index = 1; index <= n; index++) {
            String line = in.nextLine();
            String checkSums = checkSums(line).toUpperCase();
            System.out.println(index + " " + checkSums);
        }
    }

    private static String checkSums(String input) {
        int sum1 = 0;
        int sum2 = 0;
        
        for (int i = 0; i < input.length(); ++i) {
            sum1 = (sum1 + input.charAt(i)) % 255;
            sum2 = (sum2 + sum1) % 255;
        }

        return Integer.toString((sum2 << 8) | sum1, 16);
    }
}