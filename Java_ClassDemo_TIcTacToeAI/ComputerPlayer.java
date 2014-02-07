/**
 *
 * Author: Andrew Rush
 * Class: ComputerPlayer.java
 * Inherits From: Player
 * Date Created: 12/2/2013
 * Last Modified: 12/17/2013
 * 
 * Creates a player object suitable for the AI built into the TicTacToe.java
 * object. Overrides the parent classes move() method to prompt the
 * computer in a quieter manner than the human.
 * 
 */

package finalproject;

public class ComputerPlayer extends Player {

    public ComputerPlayer(String name) {
        super("Computer");
        
    }
    
    @Override
    public int move(){
        System.out.printf("\n%s moves.\n", super.getPlayerName());
        System.out.println();
        return 1;
    }
    
}
