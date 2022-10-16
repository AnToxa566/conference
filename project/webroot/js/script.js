
/* Cganged conferences' text color START */

let conferences = document.getElementsByClassName('conference');

for(var i = 0; i < conferences.length; i++) {
	conferences[i].onmouseenter = conferences[i].onmouseleave = handler;
}

function handler(event) {
	if (event.type == 'mouseenter') {
		event.target.classList.add('text-primary');

	    for (var title of event.target.getElementsByClassName('conference_title')) {
	    	title.classList.remove('text-body');
	    }

	    for (var address of event.target.getElementsByClassName('conference_address')) {
	    	address.classList.remove('text-muted');
	    }

	    for (var conf_btn of event.target.getElementsByClassName('conference_btn')) {
	    	conf_btn.classList.remove('d-none');
	    }
	}

	if (event.type == 'mouseleave') {
		event.target.classList.remove('text-primary');

	    for (var title of event.target.getElementsByClassName('conference_title')) {
	    	title.classList.add('text-body');
	    }

	    for (var address of event.target.getElementsByClassName('conference_address')) {
	    	address.classList.add('text-muted');
	    }

	    for (var conf_btn of event.target.getElementsByClassName('conference_btn')) {
	    	conf_btn.classList.add('d-none');
	    }
	}
}

/* Cganged conferences' text color END */