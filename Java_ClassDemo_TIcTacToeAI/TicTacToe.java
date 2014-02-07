/**
 *
 * Author: Andrew Rush
 * Class: TicTacToe.java
 * Inherits From: Player
 * Date Created: 12/2/2013
 * Last Modified: 12/17/2013
 * 
 * Creates a TicTacToe game object with built-in UI suitable to play against 
 * a human player.
 * 
 */


package finalproject;

import java.util.Scanner;

public class TicTacToe {
    
    private int[] gameArray = new int[9];       // game board
    private int currentPlayer;                  // player taking their turn
    private int turns;                          // number of turns - max. 9
    private int firstMove;                      // player who went this game
    Player p1 = new Player("Player 1");         // live player
    Player p2 = new ComputerPlayer("Computer"); // computer player
    Scanner input = new Scanner(System.in);     // input
    public static int wins[][] = {{0,1,2},      // winning combinations
                                    {3,4,5},
                                    {6,7,8},
                                    {0,3,6},
                                    {1,4,7},
                                    {2,5,8},
                                    {0,4,8},
                                    {2,4,6}};
        
    public TicTacToe()
    {
        currentPlayer = 1;                      // player one starts
        turns = 0;                              // turn counter
        
        // gotta play one game, at least
        p1.incrementGamesPlayed();
        p2.incrementGamesPlayed();
        
        // player 1 goes first the first game
        setFirstMove(1);                       
        
        //output rules
        System.out.println("Ground Rules:\n\tThe grid is numbered 1-9");
        System.out.println("\tYou can play as many games as you want.");
        System.out.println("\tPlayer 1 will always play X, Computer will always play O.");
        System.out.println("\tThe loser of the previous game will start the next game.");;
        System.out.println("\tIn case of a draw, the same player goes first.\n\n");
        
        clearBoard();                           // make sure the board is clear
    }
    
    // displays game board as grid with X's and O's
    public void displayGrid()
    {
        
        System.out.println(SignatureBlock.getSignatureBlock() + "\n\n");
        // game board stores "0" , "1", "2", we need " ", "X", "O"
        // create a temp board for output
        String[] temp = new String[9];
        
        // translate
        for(int i = 0; i < temp.length; i++)
        {
            if(gameArray[i] == 0)
                temp[i] = " ";
            else if(gameArray[i] == 1)
                temp[i] = "X";
            else if(gameArray[i] == 2)
                temp[i] = "O";
         }
        
        // output
        System.out.printf("\t 1 | 2 | 3 \t\t\t\t%s | %s | %s\n", temp[0], temp[1], temp[2]);
        System.out.println("\t --+---+--\t\t\t\t--+---+--");
        System.out.printf("\t 4 | 5 | 6 \t\t\t\t%s | %s | %s\n", temp[3], temp[4], temp[5]);
        System.out.println("\t --+---+--\t\t\t\t--+---+--");
        System.out.printf("\t 7 | 8 | 9 \t\t\t\t%s | %s | %s\n\n", temp[6], temp[7], temp[8]);        
    }
    
    // clear the game board
    public void clearBoard()
    {
        for(int i = 0; i < gameArray.length; i++)
            gameArray[i] = 0;
    }
    
    // manages game data - number of turns & next player
    public void manageGame()
    {
        turns++;
        nextPlayer();
    }
    
    // sets the next player
    public void nextPlayer()
    {
        if(currentPlayer > 1)
            currentPlayer = 1;
        else
            currentPlayer =2;
    }
    
    // records a player turn
    public void takeTurn()
    {
        int move = 0;   // container for the move
        do{ // repeat until we get a valid move
            
            // prompt players - live player move comes as message from Player
            if(currentPlayer == 1){
                move = p1.move();
            }
            else {      // computer move, handled in-house
                p2.move();
                move = computerMove();
            }
            
            // lets humans enter 1-9 instead of 0-8
            move--;
            
            // if the move is on the board, make sure the square is open
            if( (move < 0) || (move > 8) )
                System.out.printf("%d is not a square. Enter a number (1-9)\n", move+1);
            else if(gameArray[move] != 0)
                System.out.println("That square is taken. Please try again.");/**/
        }
        while( move < 0 || move > 8 || gameArray[move] != 0 );
        gameArray[move] = currentPlayer; // record move
    }
    
    // looks for winning combinations
    public boolean gameWon()
    {
        // loop through the winning combinations looking for matches
        for(int i =0; i < wins.length; i++)
        {
            if((gameArray[wins[i][0]] == gameArray[wins[i][1]]) // two in a row
            && (gameArray[wins[i][1]] == gameArray[wins[i][2]])	// three in a row
            && gameArray[wins[i][0]] != 0)                      // and they aren't 0's
            {                                                   // we have a winner, record statistics
                if(currentPlayer == 1)                          // and notify
                {
                    p2.incrementWins();
                    System.out.printf("\n%s wins!", p2.getPlayerName());
                }
                else
                {
                    p1.incrementWins();
                    System.out.printf("\n%s wins!", p1.getPlayerName());
                }
                return true;                                        
            }
        }
        return false;                                           // no winner
    }
    
    // looks for a draw
    public boolean gameIsDraw()
    {
        // 9 grid slots, maximum of 9 turns
        if(turns == 9)
        {
            // record stats and notify
            p1.incrementDraws();
            p2.incrementDraws();
            System.out.println("It's a draw!");
            setCurrentPlayer(getFirstMove());
            return true;
        }
        else
        {
            return false;                                   // no draw
        }
    }
    
    public void setCurrentPlayer(int a)
    {
        currentPlayer = a;
    }
    
    public int getCurrentPlayer()
    {
        return currentPlayer;
    }
    
    public void clearTurns()
    {
        turns = 0;
    }
    
    public void setFirstMove(int a)
    {
        if(a > 2)
            a = 1;
        else if(a < 0)
            a = 1;
        firstMove = a;
    }
    
    public int getFirstMove()
    {
        return firstMove;
    }
    
    // computer AI
    // determine the next move using a look-up table of winning combinations
    public int computerMove ()
    {  
        // UI hierarchy: look for win, look for block, block opponent's fork, 
        // play center, play corner, play sides
        
        // lookup table of preferred moves in descending order
        int[] preferred = {5, 1, 9, 3, 7, 2, 4, 6, 8};
        
        // find a move that wins the game - if see if you have 2 of the 3 
        // numbers in a winning combination. If you do, see if the third slot
        // is available
        
        for(int i = 0; i < wins.length; i++){
            //System.out.printf("Wins: %d %d %d\n", wins[i][0], wins[i][1], wins[i][2]);
            if(gameArray[wins[i][0]] == 2 && gameArray[wins[i][1]] == 2)      // one match
            {
                //System.out.printf("&d) Match: gameArray[wins[%d][0]]\n", i, i);
                if(gameArray[wins[i][2]] == 0)
                        return (wins[i][2]+1);
            }
            else if(gameArray[wins[i][0]] == 2 && gameArray[wins[i][2]] == 2)
            {
                //System.out.printf("&d) Match: gameArray[wins[%d][2]]\n", i, i);
                //System.out.println("Winning!");
                if(gameArray[wins[i][1]] == 0)
                    return (wins[i][1]+1);
            }
            
        }
        
        // look for blocking move -- testing
        
        
        // block other players winning move - loop through the winning
        // combinations, looking to match one number in the combination. if a 
        // match is found, look for second. if a second, look to see if the
        // third slot is open.
        for(int i = 0; i < wins.length; i++)
        {
            //System.out.printf("Blocks: %d %d %d\n", wins[i][0], wins[i][1], wins[i][2]);
            if(gameArray[wins[i][0]] == 1)          // match one
            {
                //System.out.printf("Block: gameArray[%d]\n", wins[i][0]);
                if(gameArray[wins[i][1]] == 1)      // match two
                {
                    //System.out.printf("Block: gameArray[%d]\n", wins[i][1]);
                    if(gameArray[wins[i][2]] == 0 ) // check slot
                        return (wins[i][2]+1);      // return if open
                }
                else if(gameArray[wins[i][2]] == 1) // match two
                {
                    //System.out.printf("Block: gameArray[%d]\n", wins[i][2]);
                    if(gameArray[wins[i][1]] == 0 ) // check
                        return (wins[i][1]+1);      // return
                }
            }
            //System.out.println();
            if(gameArray[wins[i][1]] == 1)          // match one
            {
                //System.out.printf("Block: gameArray[%d]\n", wins[i][1]);
                if(gameArray[wins[i][2]] == 1)      // match two
                {
                    //System.out.printf("Block: gameArray[%d]\n", wins[i][2]);
                    if(gameArray[wins[i][0]] == 0 ) // check
                        return (wins[i][0]+1);      // return
                }
            }
        }
        
        
        /**/
        // make sure opponent cannot fork - if the opponent has opposing corners
        // he can sometimes set up a fork, giving himself two ways to win. If 
        // the situation exists, check to see if a fork can be created, and
        // block it
        
        // look to see if the opponent has opposing corners
        if( (gameArray[0] == 1) && (gameArray[8] == 1) ||
               (gameArray[2] == 1) && (gameArray[6] == 1) )
        {
            //System.out.println("Searching for block");
            // the fork can be blocked by playing a side slot, search to see
            // if one is available
            int[] search = {1, 3, 5, 7};
            boolean blocked = false;     
            for(int i = 0; i < search.length; i++)
            {
                if(gameArray[search[i]] == 2)   // if we have a side
                    blocked = true;             // the fork is blocked
            }
            
            if(!blocked)                        // otherwise
            {
                //System.out.println("Not blocked, do not play a corner");
                for(int i = 0; i < search.length; i++)  // find a side to play
                {
                    if(gameArray[search[i]] == 0)
                        return search[i] + 1;
                }
            }
        }
        
        // if the center is available, take it
        if(gameArray[4] == 0)
            return 5;
        
        // if player is in one corner, take the opposite if available
        if(gameArray[0] == 1)
        {
            if(gameArray[8] == 0)
                return 9;
        }
        if(gameArray[2] == 1)
        {
            if(gameArray[6] == 0)
                return 7;
        }
        if(gameArray[6] == 1)
        {
            if(gameArray[2] == 0)
                return 3;
        }
        if(gameArray[8] == 1)
        {
            if(gameArray[0] == 0)
                return 1;
        }
            
        // default moves - for those times when there's nothing better to do
        
        int i = 0;                              // array pointer
        int check;                              // lookup table value
        boolean loop = true;                    // loop
        do{
            check = preferred[i];               // get the next lookup value
            int currentValue = gameArray[check-1];
            if(currentValue == 0)
                loop = false;
            i++;
        }while(loop);
        
        return check;
    }
    
}