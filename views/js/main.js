function prepareInputFiles() {
    var elements = document.getElementsByClassName('form-control-file');
    for(var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('change', function(value) {
            debugger;
            var fileName = this.files[0].name;
            this.labels[0].innerText = fileName;
        });
    }
}

window.onload = function() {
    prepareInputFiles();
}