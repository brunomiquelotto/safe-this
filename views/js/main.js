var Components = Components || {};
Components.FormControlFile = {};

Components.FormControlFile.OnChangeHandler = function(value) {
	var file = this.files.length ? this.files[0] : null;
	if (!file) return;
	var fileName = this.files[0].name;
    this.labels[0].innerText = fileName;
}

Components.FormControlFile.PrepareInputFiles = function() {
    var elements = document.getElementsByClassName('form-control-file');
    for(var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('change', Components.FormControlFile.OnChangeHandler);
    }
};


window.onload = function() {
    Components.FormControlFile.PrepareInputFiles();
}

function createElementFromHTML(htmlString) {
	var div = document.createElement('div');
	div.innerHTML = htmlString.trim();
	return div.firstChild;
}

function createElementsFromHTML(htmlString) {
	var div = document.createElement('div');
	div.innerHTML = htmlString.trim();
	return div.childNodes;	
}