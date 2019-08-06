var offset = 1;
var price = 'default';
var category = 'default';
var department = 'default';
function getOffset(x) {
    offset = x;
    fetchData();
}
function reduce() {
    if (offset >= 10) {
        offset = offset - 9;
        fetchData();
    }
    else {
        fetchData();
    }
}
function increase() {
    if (offset <= 92) {
        offset = offset + 9;
        fetchData();
    }
    else {
        fetchData();
    }
}
function fetchData() {
    if (offset == 1) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x1").style.backgroundColor = 'hotpink';
    }
    if (offset >= 10) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x2").style.backgroundColor = 'hotpink';
    }
    if (offset >= 19) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x3").style.backgroundColor = 'hotpink';
    }
    if (offset >= 28) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x4").style.backgroundColor = 'hotpink';
    }
    if (offset >= 37) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x5").style.backgroundColor = 'hotpink';
    }
    if (offset >= 46) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x6").style.backgroundColor = 'hotpink';
    }
    if (offset >= 55) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x7").style.backgroundColor = 'hotpink';
    }
    if (offset >= 64) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x8").style.backgroundColor = 'hotpink';
    }
    if (offset >= 73) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x9").style.backgroundColor = 'hotpink';
    }
    if (offset >= 82) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x10").style.backgroundColor = 'hotpink';
    }
    if (offset >= 91) {
        for (var i = 0; i < document.querySelectorAll(".click").length;i++) {
            document.querySelectorAll(".click")[i].style.backgroundColor = 'white';
        }
        _("x11").style.backgroundColor = 'hotpink';
    }
    _("products").innerHTML = '<center><i class="fas fa-spin fa-spinner fa-2x"></i></center>';
     _("products").style.animation = '';
    var xhttp;
    if (XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    }
    else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           _("products").style.animation = 'fadein 0.5s ease-in-out';
           _("products").innerHTML = this.responseText;
        }
    }
    xhttp.open('GET','http://localhost/Ecommerce/settings.php?offset='+offset+'&cat='+category+'&dep='+department,true);
    xhttp.send();
}
function cat(x) {
    department = 'default';
    _("navigator").style.display ='none';
    category = x;
    fetchData();
}
function dep(x) {
    category = 'default';
    if (x == '1') {
        _("category").style.display = 'block';
        _("category").innerHTML = '<label class="headings">Category</label><hr/><br/><label class="captions" onclick="cat(1)">French</label><br/><br/><label class="captions" onclick="cat(2)">Italian</label><br/><br/><label class="captions" onclick="cat(3)">Irish</label><br/><br/><br/>';
    }
    else if (x == '2') {
        _("category").style.display = 'block';
        _("category").innerHTML = '<label class="headings">Category</label><hr/><br/><label class="captions" onclick="cat(4)">Animal</label><br/><br/><label class="captions" onclick="cat(5)">Flower</label><br/><br/><br/>';
    }
    else {
         _("category").style.display = 'block';
        _("category").innerHTML = '<label class="headings">Category</label><hr/><br/><label class="captions" onclick="cat(6)">Christmas</label><br/><br/><label class="captions" onclick="cat(7)">Valentine\'s</label><br/><br/><br/>';
    }
    _("navigator").style.display ='none';
    department = x;
    fetchData();
}