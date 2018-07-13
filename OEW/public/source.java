import java.util.Scanner;
import java.io.*;
import java.util.*;
public class source {
   public static void main(String[] args) {
     try{
	     Scanner inFile = new Scanner(new FileInputStream("inputFile.txt")); 
	   String num1 = inFile.nextLine();
	   String num2 = inFile.nextLine();
	  int sum= Integer.parseInt(num1)+Integer.parseInt(num2);
	  int diff= Integer.parseInt(num1)-Integer.parseInt(num2);
	   
         System.out.println(Integer.toString(sum));
         System.out.println(Integer.toString(diff));


	  }
	  catch (FileNotFoundException fnfe)
      {
           System.out.println("File data.txt was not found!");
       } 

   }