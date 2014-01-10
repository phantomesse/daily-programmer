import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        
        // Get key
        int key = in.nextInt();
        in.nextLine();

        // Get message
        String message = in.nextLine();
        String code = encrypt(key, message);

        System.out.println("Message = " + message);
        System.out.println("\nEncoded with key = " + key + "\n" + code);
        System.out.println("\nDecoded with key = " + key + "\n" + decrypt(key, code));
    }

    public static String encrypt(int key, String message) {
        char[] messageArray = message.toCharArray();
        for (int i = 0; i < messageArray.length; i++) {
            messageArray[i] = shift(key, messageArray[i]);
        }
        return new String(messageArray);
    }

    public static String decrypt(int key, String message) {
        char[] messageArray = message.toCharArray();
        for (int i = 0; i < messageArray.length; i++) {
            messageArray[i] = shift(-key, messageArray[i]);
        }
        return new String(messageArray);
    }

    private static char shift(int key, char c) {
        if (c >= 'A' && c <= 'Z') {
            char shifted = (char)((c - 'A' + key)%('Z'-'A'+1) + 'A');
            while (shifted < 'A')
                shifted += 'Z'-'A'+1;
            return shifted;
        }
        if (c >= 'a' && c <= 'z') {
            char shifted = (char)((c - 'a' + key)%('z'-'a'+1) + 'a');
            while (shifted < 'a')
                shifted += 'z'-'a'+1;
            return shifted;
        }
        return c;
    }
}