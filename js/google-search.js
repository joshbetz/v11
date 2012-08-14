google.load('search', '1');

/**
 * Extracts the users query from the URL.
 */ 
function getQuery() {
	var url = '' + window.location;
	var queryStart = url.indexOf('?') + 1;
	if (queryStart > 0) {
		var parts = url.substr(queryStart).split('&');
		for (var i = 0; i < parts.length; i++) {
			if (parts[i].length > 2 && parts[i].substr(0, 2) == 'q=') {
				return decodeURIComponent(
						parts[i].split('=')[1].replace(/\+/g, ' '));
			}
		}
	}
	return '';
}

function onLoad() {
	// Create a custom search control that uses a CSE restricted to
	// code.google.com
	var customSearchControl = new google.search.CustomSearchControl(
			'010175855548164516950:zxya1uapa3s');

	var drawOptions = new google.search.DrawOptions();
	drawOptions.setAutoComplete(true);

	// Draw the control in content div
	customSearchControl.draw('results', drawOptions);

	// Run a query
	customSearchControl.execute(getQuery());
}

google.setOnLoadCallback(onLoad);