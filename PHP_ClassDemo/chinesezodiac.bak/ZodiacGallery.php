<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Chinese Zodiac</title>
    <style type="text/css">
        
        #main {
            
            width: 100%;
            
        }
        
        #container {
            
            margin: auto;
            width:  960px;
            
        }
        
        #header {
            
            width: 950px;
            text-align: center;
            
        }
        
        #buttonLinks {
            
            width: 260px;
            float: left;
            
        }
        
        #textLinks {
            
            width: 950px;
            height: 50px;
            text-align: center;
            font: normal 0.8em sans-serif;
            
        }
        
        a.text {
            
            padding: 10px;
            
        }
        
        #content {
            
            width: 600px;
            float: left;
            font: normal 1em sans-serif;
            
        }
        
        #footer {
            
            width: 850px;
            clear: both;
            text-align: center;
            
        }
        
    </style>
    
</head>
<body>
    <div id="main">
        <div id="container">
            <div id="header">
                <?php
                
                    include("includes/inc_header.php");
                    
                ?>
            </div>
            <div id="textLinks">
                
                <?php
                
                    include("includes/inc_text_links.php");
                    
                ?>
                
            </div>
            <div id="buttonLinks">
                
                <?php
                
                    include("includes/inc_button_nav.php");
                    
                ?>
                
            </div>
            <div id="content">
                
                <?php
				
				if(!isset($_GET['image'])) {
					
					$images=array("Rat"=>"rat.png",
									"Ox"=>"ox.png",
									"Tiger"=>"tiger.png",
									"Rabbit"=>"rabbit.png",
									"Dragon"=>"dragon.png",
									"Snake"=>"snake.png",
									"Horse"=>"horse.png",
									"Goat"=>"goat.png",
									"Monkey"=>"monkey.png",
									"Rooster"=>"rooster.png",
									"Dog"=>"dog.png",
									"Pig"=>"pig.png");
									
					foreach($images as $k=>$v) {
						
						echo "<div style=\"float:left; margin: 20px\" width = \"100\" border = \"1\"><a href=\"ZodiacGallery.php?image=$k\"><img src=\"images/$v\" alt =\"$k\" width = \"50\" height = \"50\"/></a><br />$k</div>\n";
						
					}

					
				} else {
				
					$images=array("Rat"=>"rat200.png",
									"Ox"=>"ox200.png",
									"Tiger"=>"tiger200.png",
									"Rabbit"=>"rabbit200.png",
									"Dragon"=>"dragon200.png",
									"Snake"=>"snake200.png",
									"Horse"=>"horse200.png",
									"Goat"=>"goat200.png",
									"Monkey"=>"monkey200.png",
									"Rooster"=>"rooster200.png",
									"Dog"=>"dog200.png",
									"Pig"=>"pig200.png");
									
					$captions = array("Rat"=>"Those born under the Chinese Zodiac sign of the Rat are quick-witted, clever, charming, sharp and funny. They have excellent taste, are a good friend and are generous and loyal to others considered part of its pack. Motivated by money, can be greedy, is ever curious, seeks knowledge and welcomes challenges. Compatible with Dragon or Monkey.",
									"Ox"=>"Another of the powerful Chinese Zodiac signs, the Ox is steadfast, solid, a goal-oriented leader, detail-oriented, hard-working, stubborn, serious and introverted but can feel lonely and insecure. Takes comfort in friends and family and is a reliable, protective and strong companion. Compatible with Snake or Rooster.",
									"Tiger"=>"Those born under the Chinese Zodiac sign of the Tiger are authoritative, self-possessed, have strong leadership qualities, are charming, ambitious, courageous, warm-hearted, highly seductive, moody, intense, and they’re ready to pounce at any time. Compatible with Horse or Dog.",
									"Rabbit"=>"Those born under the Chinese Zodiac sign of the Rabbit enjoy being surrounded by family and friends. They’re popular, compassionate, sincere, and they like to avoid conflict and are sometimes seen as pushovers. Rabbits enjoy home and entertaining at home. Compatible with Goat or Pig.",
									"Dragon"=>"A powerful sign, those born under the Chinese Zodiac sign of the Dragon are energetic and warm-hearted, charismatic, lucky at love and egotistic. They’re natural born leaders, good at giving orders and doing what’s necessary to remain on top. Compatible with Monkey and Rat.",
									"Snake"=>"Those born under the Chinese Zodiac sign of the Snake are seductive, gregarious, introverted, generous, charming, good with money, analytical, insecure, jealous, slightly dangerous, smart, they rely on gut feelings, are hard-working and intelligent. Compatible with Rooster or Ox.",
									"Horse"=>"Those born under the Chinese Zodiac sign of the Horse love to roam free. They’re energetic, self-reliant, money-wise, and they enjoy traveling, love and intimacy. They’re great at seducing, sharp-witted, impatient and sometimes seen as a drifter. Compatible with Dog or Tiger.",
									"Goat"=>"Those born under the Chinese Zodiac sign of the Goat enjoy being alone in their thoughts. They’re creative, thinkers, wanderers, unorganized, high-strung and insecure, and can be anxiety-ridden. They need lots of love, support and reassurance. Appearance is important too. Compatible with Pig or Rabbit.",
									"Monkey"=>"Those born under the Chinese Zodiac sign of the Monkey thrive on having fun. They’re energetic, upbeat, and good at listening but lack self-control. They like being active and stimulated and enjoy pleasing self before pleasing others. They’re heart-breakers, not good at long-term relationships, morals are weak. Compatible with Rat or Dragon.",
									"Rooster"=>"Those born under the Chinese Zodiac sign of the Rooster are practical, resourceful, observant, analytical, straightforward, trusting, honest, perfectionists, neat and conservative. Compatible with Ox or Snake.",
									"Dog"=>"Those born under the Chinese Zodiac sign of the Dog are loyal, faithful, honest, distrustful, often guilty of telling white lies, temperamental, prone to mood swings, dogmatic, and sensitive. Dogs excel in business but have trouble finding mates. Compatible with Tiger or Horse.",
									"Pig"=>"Those born under the Chinese Zodiac sign of the Pig are extremely nice, good-mannered and tasteful. They’re perfectionists who enjoy finer things but are not perceived as snobs. They enjoy helping others and are good companions until someone close crosses them, then look out! They’re intelligent, always seeking more knowledge, and exclusive. Compatible with Rabbit or Goat.");
									
					$getThis = $_GET['image'];
					
					echo "<div><img style=\"float:left; margin: 20px\" src=\"images/$images[$getThis]\" />$captions[$getThis]</div>\n";
					
				}
                
				
                    
                ?>
                
            </div>
            <div id="footer">
                
                <?php
                
                    include("includes/inc_footer.php");
                    
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
