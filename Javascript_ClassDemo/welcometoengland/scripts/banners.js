// JavaScript Document

myBanners = new Array("../welcometoengland/images/london_banner_1.png",
							"../welcometoengland/images/view_from_stpauls.png",
							"../welcometoengland/images/london_night.png");
picCounter = 0;

function changePic() {
	
	if(picCounter == myBanners.length) {
		
		picCounter = 0;
		
	}
	
	document.Banner.src = myBanners[picCounter];
	picCounter++;
	setTimeout("changePic()", 3000);
}