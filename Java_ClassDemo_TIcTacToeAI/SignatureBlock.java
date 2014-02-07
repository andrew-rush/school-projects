
/**
 *
 * SignatureBlock
 * Author: Andrew Rush
 * Email: andrew.rush@maine.edu
 * Course: CIS 214 Java Programming
 *
 * This class defines a signature block for the author. It offers a full set of
 * accessors for each instance variable.
 * 
 * Version 1.0
 * Signature is contained in one long string    - Deprecated
 * getSigString() returns the string            - Deprecated  
 * 
 * no ability to change signature string if desired
 * 
 * Version 2.0
 * 
 * Signature is broken into component instance variables,
 *  name
 *  email
 *  course
 *  quote
 *  attrib
 * 
 * getSignatureBlock() returns a completed signature block, with each instance
 * variable appearing on one line. Preferred method to call the signature block
 * as a whole, use instead of the deprecated getSigString();
 * 
 * Accessor methods created for each instance variable, allowing the values to
 * be changed
 * 
 * To-do:
 * Constructor methods to set the instance variables on instantiation, rather
 * than using default values
 * 
 * 
 */
package finalproject;

public class SignatureBlock {
    
    // legacy code - deprecated
    private String sigString = "Andrew Rush\n"
                                + "andrew.rush@maine.edu\n"
                                + "CIS 214\n"
                                + "When the only tool you have is a hammer everything looks like a nail\n"
                                + "~Phish";
    
    // instance variables, static because they won't change
    private static String name = "Andrew Rush"; // author name
    private static String email = "andrew.rush@maine.edu"; // author email
    private static String course = "CIS 214 - Java Programming"; // course info
    private static String quote = "Every silver lining's got a touch of grey"; // quote
    private static String attrib = "Robert Hunter"; // attribution
    
    // legacy method - deprecated
    public String getSigString(){
        return sigString;
    }
    
    public static String getSignatureBlock(){
        String theString = name + "\n" +
                            email + "\n" +
                            course + "\n" +
                            quote + "\n" +
                            "~" + attrib;
        return theString;
    }
    
    // accessors for name
    public static String getName(){
        return name;
    }
    
    public void setName(String a){
        name = a;
    }
    
    // accessors for email
    public static String getEmail(){
        return email;
    }
    
    public void setEmail(String a){
        email = a;
    }
    
    //accessors for course
    public static String getCourse(){
        return course;
    }
    
    public void setCourse(String a){
        course = a;
    }
    
    // accessors for quote
    public static String getQuote(){
        return quote;
    }
    
    public void setQuote(String a){
        quote = a;
    }
    
    // accessors for attrib
    public static String getAttrib(){
        return attrib;
    }
    
    public void setAttrib(String a){
        attrib = a;
    }
}
