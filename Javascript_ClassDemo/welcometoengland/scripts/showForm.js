// JavaScript Document

 	function displayForm() {
		var form_element = document.getElementById('memForm');
		var show_link = document.getElementById('show');
		var noshow_link = document.getElementById('noshow');
		var show = form_element.style;
		
		if(show.display == '' || show.display == 'none') {
			show.display = 'block';
			show_link.style.display = 'none';
			noshow_link.style.display = '';
		} else {
			show.display = 'none';
			show_link.style.display = 'block';
			noshow_link.style.display = 'none';
		}
	}