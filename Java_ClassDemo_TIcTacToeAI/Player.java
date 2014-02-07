/**
 *
 * Author: Andrew Rush
 * Class: Player.java
 * Inherits From: Player
 * Date Created: 12/2/2013
 * Last Modified: 12/17/2013
 * 
 * Creates a player object suitable a human to play the computer AI built into
 * the TicTacToe.java object.
 * 
 */

package finalproject;

import java.util.Scanner;

public class Player {
    
    private String playerName;                  // players have names
    private int gamesPlayed;                    // number of games played
    private int wins;                           // games won
    private int draws;                          // games not lost
    Scanner input = new Scanner(System.in);     // input
    
    
    public Player(String name){
        
        // computers don't have player names, skip for computer player
        if(name.equals("Computer")){
            setPlayerName(name);
        }
        else // ask for the name, collect it
        {
            System.out.println("Please enter your name. Press x to skip this.");
            String theName = input.nextLine();
            if((theName.equals("x") )|| (theName.equals("X")))
                playerName = name;
            else
                playerName = theName;
        }
        
        // initialize stat values
        gamesPlayed = 0;
        wins = 0;
        draws = 0;
    }
    
    // accessors for playerName
    public void setPlayerName(String name)
    {
        playerName = name;
    }
    
    public String getPlayerName()
    {
        return playerName;
    }
    
    // accessor/incrememtor for gamesPlayed
    public void incrementGamesPlayed()
    {
        gamesPlayed++;
    }
    
    public int getGamesPlayed()
    {
        return gamesPlayed;
    }
    // accessor/incrememtor for wins
    public void incrementWins()
    {
        wins++;
    }
    
    public int getWins()
    {
        return wins;
    }
    // accessor/incrememtor for draws
    public void incrementDraws()
    {
        draws++;
    }
    
    public int getDraws()
    {
        return draws;
    }
    
    // output player stats
    public void displayStats()
    {
        System.out.printf("%s\n\tPlayed: %d\n", getPlayerName(), getGamesPlayed());
        System.out.printf("\tWon: %d\n", getWins());
        System.out.printf("\tLost: %d\n", (getGamesPlayed() - (getWins() + getDraws())));
        System.out.printf("\tDraws: %d\n", getDraws());
    }
    
    // prompt the human to do something, make sure he does it right
    public int move(){
        boolean loop = true;
        int move = 0;
        System.out.printf("\n%s, enter your move: ", getPlayerName());
        do
        {
            try
            {
                move = input.nextInt();
                loop = false;
            }
            catch(Exception e)
            {
                System.out.println("Must enter an integer 1-9");
                input.nextLine();
            }
        }while(loop);
        
        
        System.out.println();
        return move;
    }
    
    @Override
    public String toString()
    {
        String retval = String.format("%s Played: %d Win: %d Draws: %d", 
                getPlayerName(),
                getGamesPlayed(),
                getWins(),
                getDraws());
        
        return retval;
    }
}
