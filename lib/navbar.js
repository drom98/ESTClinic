'use strict';

var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/') + 1);

var navItems = document.querySelectorAll('.navbar-end');

navItems.forEach(function (element) {
		console.log(element);
});

switch (filename) {
		case 'index.php':
				console.log('index');
				break;
		default:
				console.log('ESTClinic');
}