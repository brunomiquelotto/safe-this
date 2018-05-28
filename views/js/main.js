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

var GeneralFunctions = {};
GeneralFunctions.Format = function(mask, input) {
    var inputLength = input.value.length;
    var output = mask.substring(0, 1);
    var str = mask.substring(inputLength);
    
    if (str.substring(0,1) != output) {
    	input.value += str.substring(0,1);   	
    }
}


window.onload = function() {
    Components.FormControlFile.PrepareInputFiles();
    startCount();
    for(var i = 0; i < Components.FunctionsToLoad.length; i++) {
        Components.FunctionsToLoad[i]();
    }
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

function startCount(){
    var h2 = document.getElementsByClassName('count');
    for(var i = 0; i < h2.length; i++){
        countData(h2[i]);
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


async function countData(element){
    let h2 = element;
    for (var i = h2.dataset.start; i <= h2.dataset.end; i++) { 
        if(h2.dataset.end > 50){
            h2.innerText = '+ ' + parseInt(i/2);
            await sleep(12);
        }else{
            h2.innerText = i; 
            await sleep(40);
        }
    }
}

Components.FunctionsToLoad = [];

function onLoad(fn) {
    Components.FunctionsToLoad.push(fn);
}