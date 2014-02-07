/**
 *
 * Author: Andrew Rush
 * Class: FinalProject.java
 * Inherits From: Player
 * Date Created: 12/2/2013
 * Last Modified: 12/17/2013
 * 
 * Control object for the TicTacToe.java object.
 * 
 * 
 */


package finalproject;

import java.util.Scanner;

public class FinalProject {

    public static void main(String[] args) 
    {
        TicTacToe theGame = new TicTacToe();            // create a game
        boolean loop = true;                            // set up a loop
        do{
            play(theGame);                              // and play
            loop = willRepeat(theGame);                 // over and over
        }while(loop);
        
        
        // and when done, output stats
        theGame.p1.displayStats();
        theGame.p2.displayStats();
        
        
    }
    // game sequencer - display board, player turn, manage game, repeat 
    // until quit.
    public static void play(TicTacToe g)
    {
        g.displayGrid();
        do
        {
            g.takeTurn();
            g.manageGame();
            g.displayGrid();
        }
        while( !g.gameWon() && !g.gameIsDraw());
    }
    
    // prompt the player to repeat the game - if the player wants to repeat, 
    // reset the game board, chalk up another game played and start again.
    public static boolean willRepeat(TicTacToe g)
    {
        @SuppressWarnings("resource")
		Scanner input = new Scanner(System.in);
        System.out.println("\nPlay again? Y/N");
        String response = input.nextLine();
        if(response.matches(".*\\d.*"))
        {
            System.out.printf("I didn't understand %s\n", response);
            willRepeat(g);
        }
        switch (response) {
            case "N":
            case "n":
                return false;
            case "Y":
            case "y":
                g.clearBoard();                                     // reset board
                g.clearTurns();                                     // clear turns
                g.p1.incrementGamesPlayed();                        // chalk it up
                g.p2.incrementGamesPlayed();
                return true;
            default:
                System.out.println("I didn't understand you.");
                willRepeat(g);
                return true;
        }
        
    }
    
    
    
    
    
    
    
    
}


