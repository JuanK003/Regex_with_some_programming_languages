import java.io.BufferedReader;
import java.io.FileReader;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class java_regex{
    public static void main(String[] args){
        String file = "./results_4f052c2d-43b0-40fc-97a4-6672a196f4fb.csv";
        
        Pattern pat = Pattern.compile("^2011\\-.*[zk].*$");

        try{
            BufferedReader br = new BufferedReader(new FileReader(file));
            String line;
            while((line = br.readLine()) != null){
                Matcher matcher = pat.matcher(line);
                if(matcher.find()) {
                    System.out.println(line);
                }
            }
        } catch (Exception e) {
            System.out.println("nope!");
        }
    }
}