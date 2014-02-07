<?php
                
                // read the questsions and answers file into an array			
                $quizArray = file("quiz/questions.txt");
                
                //process the array to get rid of the newlines
                for($i=0; $i<count($quizArray); $i++) {
                    
                    $quizArray[$i] = str_replace("\n", "", $quizArray[$i]);
                
                }
                
                $temp = 0; // this variable will increment by one while the loop increments by two
                    
                // we are going through the $quizArray by twos because the data is structured in pairs in the array, with elements 1&2, 2&3, etc. being common
                // the first line is the question, the second line is the answer, we are going to break the lines into an array for questions and an array for 
                // answers
                
                for($i=0;$i<20;$i+=2) {
                    
                    $answerInt = $i+1;
                    $questionArray[$temp]=$quizArray[$i];
                    $answerArray[$temp]=$quizArray[$answerInt];
                    $temp = $temp + 1;
                    
                }
                
                // Done with preprocessing. We now how have an array composed of the questions and another composed of the response options
                
                if(!isset($_POST['submit'])) { // if there is no answers[] array that means the form hasn't been submitted, display the form
                    
                    
                    
                    //  the form
                    
                    echo "<h1>Chinese Zodiac Quiz</h1>\n";
                    echo "<p>I have created a quick quiz about the Chinese Zodiac. Challenge your knowledge of this system of personal prognistication! Due to project requirements, all fields must be completed. A valid email address is required.</p>\n";
                    
                    // get quiz statistics
                    $myFile = file("quiz/statistics.txt");
                    $taken = $myFile[0];
                    $taken = str_replace("\n", "", $taken);
                    echo "<p>This quiz has been taken a total of $taken times.</p>\n";
                    
                    echo "<form action=\"midterm.php\" method=\"post\">\n";
                    echo "<p>Name: <input type=\"text\" name=\"name\"><br />\n";
                    echo "<p>Email: <input type=\"text\" name=\"email\"></p>\n";
                    
            
                    // start the output of question block
                    for($i=0;$i<10;$i++) {
                        
                        $qNum = $i+1;// question numbers are one more than the array index
                        
                        //output statements
                        echo "<h3>Question $qNum:</h3>\n"; 
                        echo "<p>$questionArray[$i]\n";
                        echo "<br />\n";
                        
                        // the data structure of the answer options is as follows:
                        // 		if the option is "text" the question gets a text input
                        // 		all other options are either true/false or multiple choice
                        //		options that will be spun into select menus
                        
                        // if the answer option is "text"
                        if($answerArray[$i] == "text") {
                            
                            echo "<input type=\"text\" name=\"answers[$i]\" />\n"; // output a text field
                            
                        } else { // otherwise, the answer option will be made into a select menu
                            
                            // start output
                            echo "<select name=\"answers[$i]\">\n";
                            
                            // if the option is true or false, it's simpler just output prepared statements
                            if($answerArray[$i] == "True, False") {
                                
                                echo "  <option value=\"\"></option>\n";
                                echo "  <option value=\"t\">True</option>\n";
                                echo "  <option value=\"f\">False</option>\n";
                                
                            } else { // otherwise, we have more work to do
                                
                                echo "  <option value=\"\"></option>\n"; // output an empty selector
                                
                                // Each item is separated by a comma in the questions.txt file
                                $opts = explode(",", $answerArray[$i]); // break the string into an array
                                
                                // loop through the array, outputting a selector each time through
                                foreach($opts as $thisAns) {
                                    
                                    echo "	<option value=\"$thisAns\">$thisAns</option>\n";
                                    
                                }
                            }
                            
                            echo "</select>\n"; // end the select menu
                        }
                        
                        echo "</p>\n"; // end output of question block
                        
                    }
                    
                    // output statements
                    echo "<p><input name=\"submit\" type=\"submit\" value=\"Check Answers!\" /><input name=\"reset\" type=\"reset\" value=\"Clear Answers\" /></p>\n";
                    echo "</form>\n"; // end form
                
                            
                } // end if(!isset($_POST['submit'])
                else { // if the submit variable is set, process the form
                
                    // Start Data Validation. We will build an error string to output once validation is done.
                    // makes sure a username was entered
                    
                    if($_POST['name'] == "") {
                        
                        $errString = "<p>Name is required</p>\n"; // start building the error string
                        
                    }
                    
                    // make sure an email was entered
                    if($_POST['email'] == "") {
                        
                        $errString .= "<p>Email is required</p>\n"; // add to error string
                        
                    } else {
                    
                        // validate the email string
                        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z09-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $_POST['email']) == 0) {
                            
                            $errString .= "<p>Test: $test A valid email is required</p>\n"; // add to error string
                                
                        }
                        
                    }
                    
                    // Validate responses to each question		
                    $answers = $_POST['answers']; // pull the answers[] array from the form submission
                    
                    for($i=0; $i<10; $i++) { // loop through the answers and store the number of any unanswered questions as an element of the incomplete array
                        
                        if($answers[$i] == "") { // if the element is empty, there was no answer given
                            
                            $incomplete[] = $i; // store the element number to warn the user
                        
                        }
                        
                    }
                    // end form validation
                    
                    // if an array called incomplete exists, then the form was not filled out completely. Warn the user and exit.
                    if(isset($incomplete)) { // begin error checking
                            
                            // count the number of elements in the array to get the number of unanswered questions
                            $count = count($incomplete);
                            $errString .= "<p>You must answer all the questions. You did not answer $count question(s): ";
                            
                            // warn the user which questions were unanswered by adding to the error string
                            for($i=0;$i<count($incomplete); $i++) {
                                
                                $incQ = $incomplete[$i] + 1; // remember that questions are numbered from 1 but arrays are indexed from 0
                                
                                if($i+1 != count($incomplete)) { // if this iteration is not the last one
                                    
                                    $errString .= "$incQ, "; // output the variable then a comma then a space
                                    
                                } else { // otherwise
                                    
                                    $errString .= "and $incQ."; // output the variable then a period. End of Sentence.
                                }
                                
                            } // end of loop
                            
                            $errString .= "</p>\n"; // done building the error string
                            
                            echo $errString; // so output it
                            
                            // start outputting the "sticky" part of the form
                            // output statements
                            echo "<h1>Chinese Zodiac Quiz</h1>\n";
                            echo "<p>I have created a quick quiz about the Chinese Zodiac. Challenge your knowledge of this system of personal prognistication! Due to project requirements, all fields must be completed. A valid email address is required.</p>\n";
                            echo "<form action=\"midterm.php\" method=\"post\">\n";
                            
                            // store the name and email in variables that are more output friendly
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            // continue output statements
                            echo "<p>Name: <input type=\"text\" name=\"name\" value=\"$name\"><br />\n";
                            echo "<p>Email: <input type=\"text\" name=\"email\" value=\"$email\"></p>\n";
                    
                            // start question output
                            for($i=0;$i<10;$i++) {
                                
                                $qNum = $i+1; // Questions number from 1, not 0.
                                
                                // Start question block
                                // output statements
                                echo "<h3>Question $qNum:</h3>\n";
                                echo "<p>$questionArray[$i]\n";
                                echo "<br />\n";
                                
                                //output text input, with value from previous submission
                                if($answerArray[$i] == "text") {
                                    
                                    echo "<input type=\"text\" name=\"answers[$i]\" value=\"$answers[$i]\" />\n";
                                    
                                } else { //otherwise, output select menus
                                    
                                    // start the select
                                    echo "<select name=\"answers[$i]\">\n";
                                    
                                    // output for True/False select
                                    if($answerArray[$i] == "True, False") {
                                        
                                        echo "  <option value=\"\"></option>\n";
                                        echo "  <option value=\"True\"";
                                        
                                        // evaluating whether this item was selected
                                        if($answers[$i] = "True") {
                                            
                                            echo " selected=\"selected\"";
                                            
                                        }
                                        
                                        // output statements
                                        echo ">True</option>\n";
                                        echo "  <option value=\"f\"";
                                        
                                        // evaluating whether this item was selected
                                        if($answers[$i] = "False") {
                                            
                                            echo " selected=\"selected\"";
                                            
                                        }
                                        
                                        echo ">False</option>\n"; // end True/False menu
                                        
                                    } else {
                                        // start multiple choice select
                                        echo "  <option value=\"\"></option>\n";
                                        
                                        // break the string of answer options into components
                                        $options = explode(",", $answerArray[$i]);
                                        
                                        //loop through each option and put it in a select
                                        foreach($options as $thisOpt) {
                                            
                                            echo "	<option value=\"$thisOpt\"";
                                            
                                            // check each time through to see if this item was selected
                                            if($thisOpt == $answers[$i]) {
                                                
                                                echo " selected=\"selected\"";
                                                
                                            }
                                            
                                            echo ">$thisOpt</option>\n";
                                            
                                        }
                                    }
                                    
                                    echo "</select>\n"; // end select menu
                                }
                                
                                echo "</p>\n"; // end question block
                                
                            }
                            // output buttons for form
                            echo "<p><input name=\"submit\" type=\"submit\" value=\"Check Answers!\" /><input name=\"reset\" type=\"reset\" value=\"Clear Answers\" /></p>\n";
                            echo "</form>\n";
                            
                    } // end error checking 
                    else { // no submission errors, quiz is complete. start correcting the quiz.
                        
                        // the correct answers, shhhh
                        $answerArray = array("False", 
                                            "Rat",
                                            "Dragon",
                                            "Ox",
                                            "Pig",
                                            "Rooster",
                                            "Dog",
                                            "Dragon",
                                            "True",
                                            "Wise");
                        
                        // open the statistics file into arrat
                        $statFile = file("quiz/statistics.txt");			
                        
                        // remove newlines
                        for($i=0;$i<count($myFile);$i++) {
                            
                            $statFile[$i] = str_replace("\n", "", $myFile[$i]);
                            
                        }
                        
                        // the stat file consists of three lines, the first line has the number of times the quiz has been taken total
                        // the second line has the statistics for the number of time each question has been answered correctly
                        // the third line has the statistics for grade totals
                        // lines two and three consist of 10 integers separated by commas, one for each question and grade possibility
                        
                        // useful variables
                        $quizTaken = $statFile[0] ;
                        
                        $qStats = $statFile[1]; // get the stats for the questions, we need to arrays for both current and old stats
                        $qStats = explode(",", $qStats); // qStats will hold the updated stats
                        $gradeStats = $statFile[2]; // same thing for grades
                        $gradeStats = explode(",", $gradeStats); // gradeStats holds the updated stats
                        // start correcting, none right yet
                        $correct = 0; // counter
                        
                        // loop through the correct answers from the form submission
                        for($i=0; $i<count($answerArray); $i++) {
                            
                            // we will compare the values in the correct answer array with the answers from the form submission
                            // put everything in lower case temporarily for analysis
                            $arrayLC = strtolower($answerArray[$i]);
                            $answerLC = strtolower($answers[$i]);
                            
                            // compare to correct the quiz
                            if( ($arrayLC == $answerLC) ) { // if the they are the same, the answer is correct
                                
                                $correct += 1; // increment the correct counter
                                $qStats[$i] = $qStats[$i] + 1; // add one to the total of correct answers for this question
                                
                            } // end correcting
                            
                        }
                        
                        $score = $correct * 10; // each question is worth 10 points
                        
                        // update statistics for grades
                        $thisGradeIndex = $correct-1; // the index starts at 0, not 1
                        $gradeStats[$thisGradeIndex] = $gradeStats[$thisGradeIndex] + 1; // increase the grade statistic
                        
                        // Start output of corrected quiz
                        echo "<p>You got $correct out of 10 right and scored $score% on the quiz! ";
                        
                        // different statements based on the grade achieved
                        switch($correct) {
                            
                            case 10:
                                echo "Perfect score! You must be an expert!</p>\n";
                                break;
                            case( ($correct == 8) || ($correct == 9) ):
                                echo "Excellent! You really know your Chinese Zodiac trivia!</p>\n";
                                break;
                            case( ($correct == 6) || ($correct == 7) ):
                                echo "You should study more, grasshopper!</p>\n";
                                break;
                            case( ($correct == 1) || ($correct == 2) || ($correct == 3) || ($correct == 4) || ($correct == 5) ):
                                echo "Your knowledge of the Chinese Zodiac is minimal, I'm sorry to say...";
                                break;
                            case 0:
                                echo "You know nothing, Jon Snow!</p>\n";
                                break;
                                
                        }
                        
                        $message = ""; // start the mail message string with an empty string
                        
                        // output questions and corrected responses.
                        for($i=0;$i<10; $i++) { // loop through each question
                            
                            $temp = $i+1; // questions number form 1, arrays from 0
                            
                            //Start question block output
                            echo "<h3>Question $temp</h3>\n"; //output question and number
                            echo "<p>$questionArray[$i]\n"; // output question
                            echo "<br />You said: $answers[$i]\n"; // output the response
                            echo "<br />Correct: $answerArray[$i]\n"; // output the correct answer
                            
                            // construct mail message
                            $message .= "$questionArray[$i]\n";
                            $message .= "Response $answers[$i]\n";
                            $message .= "Correct: $answerArray[$i]\n";
                            
                            // put everything in lower case for comparison
                            $arrayLC = strtolower($answerArray[$i]);
                            $answerLC = strtolower($answers[$i]);
                            
                            // determine whether to mark it right or wrong
                            if($arrayLC == $answerLC) {
                                
                                echo "<br /><i>Your answer was correct!</i>\n";
                                
                            } else {
                                
                                echo "<br /><i>Your answer was incorrect!</i>\n";
                                
                            }
                                
                        }
                        
                        //update the stats file
                        $quizTaken = $quizTaken + 1;
                        $fileString = $quizTaken."\n";
                        
                        $qStats = implode(",", $qStats);
                        
                        $fileString .= $qStats."\n";
                        $gradeStats = implode(",", $gradeStats);
                        $fileString .= $gradeStats;
                        file_put_contents("quiz/statistics.txt", $fileString);
                        //$fileString = str_replace("\n", "<br />", $fileString);
                        //echo "<p>$fileString</p>\n";
                        
                        
                        // mail to the quiz reviewer
                        
                        // $name = $_POST['name'];
                        // $email = $_POST['email'];
                        $to = $_POST['name'];
                        $subject = "Chinese Zodiac Quiz Response";
                        $headers = "From: Chinese Zodiac Quiz";
                                    
                        mail($to, $subject, $message, $headers);
						
						echo "<p><a href=\"quizStats.php\">View Quiz Statistics</a></p>\n";
                        
                    }
                    
                }
            
            ?>