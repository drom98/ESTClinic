const url = window.location.pathname;
const filename = url.substring(url.lastIndexOf('/')+1);



switch(filename) {
  case 'index.php': 
		console.log('index');
		break;
	default: 
		console.log('ESTClinic');
}