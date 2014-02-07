// JavaScript Document

	function displaySelected() {

		images = new Array('../welcometoengland/images/select/placeholder.jpg',
							'../welcometoengland/images/select/londonZoobutterfly.jpg',
							'../welcometoengland/images/select/stpaulsgarden.jpg',
							'../welcometoengland/images/select/towerofLondongate.jpg',
							'../welcometoengland/images/select/britishMuseumegypt.jpg',
							'../welcometoengland/images/select/londonEyepod.jpg',
							'../welcometoengland/images/select/londonAquariumfish.jpg',
							'../welcometoengland/images/select/westminsterAbbey.jpg',
							'../welcometoengland/images/select/themesCruiseshakesphere.jpg',
							'../welcometoengland/images/select/allHallowsroman.jpg');
		
		descriptions = new Array(
							'When you choose an item from the list, a complete description of the item and a price will appear in this window.',
							'The London Zoo - Tube Station: Regent\'s; British Pound: 20-23.00; Opening times: 10-17:30',
							'St. Paul\'s Cathedral - Tube Station: St. Paul\'s; British Pound: 15; Opening times: 8:30am - 4:30pm',
							'Tower of London - Tube Station: Tower Hill; British Pound: Free; Opening times: Tuesday - Saturday 9-16:30, Sunday-Monday 10-16:30',
							'British Museum - Tube Station: Tottenham Court Road (Great Russel Street); British Pound: 20-23.00; Opening times: 10-17:30',
							'London Eye - Tube Station: Waterloo; British Pound: 19.20-37.20; Opening times: 10-8:30/9:30pm',
							'The London Aquarium - Tube Station: Waterloo; British Pound: 23.70; Opening times: 10-6/7pm',
							'Westminster Abbey - Tube Station: Westminster; British Pound: 18.00; Opening times: 9:30:4:30',
							'Themes River Cruise - Tube Station: Westminster, London Tower, London Eye, and Greenwich; British Pound: 8.55-15.30; Opening times: leaving every 30 minutes from 10-18:05',
							'All Hallow\'s Church - Tube Station: Tower Hill; British Pound: Free; Opening times: Mon-Fri 8am-5pm, Sat 10a,-4pm, Sun 10am-1pm');
							

	
		
		selected = document.Attractions.attractionList.selectedIndex;
		document.Attractions.attractionPicture.src = images[selected];
		document.Attractions.attractionDescription.value = descriptions[selected];
		
	}