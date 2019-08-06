var head = document.querySelectorAll('.head');
var field = document.querySelectorAll('.field');
function _(elem) {
	return document.getElementById(elem); //This minifies the document.getElementById(elementID) function
}
//Controls form input field behaviours
for (var i=0; i < head.length; i++) {
	head[i].addEventListener('click',function(){
		var x = this.id;
		var x1 = this.id.match(/^[a-z]/i);
		var x2 = parseInt(this.id.match(/[0-9]+$/)[0])+ 1;
		var child = x1 + x2;
		this.style.fontSize = '15px';
		this.style.top = '0px';
		this.style.paddingLeft = '0px';
		_(child).style.height = '30px';
		_(child).style.fontSize = '16px';
		_(child).focus();
		_(child).style.borderBottom = '2.5px solid hotpink';
		for (var j = 0; j < head.length; j++) {
			if (head[j].id != x  && field[j].value == '') {
				head[j].style.fontSize = '16px';
				head[j].style.paddingLeft = '2px';
				head[j].style.top = '2px';
			}
			if (field[j].id != child && field[j].value == '') {
				field[j].style.height = '0px';
				field[j].style.fontSize = '0px';
				field[j].style.borderBottom = '2.5px solid lightgray';
			}
		}
	});
}
var e1 = _("email-error");
var e2 = _("password-error");
var e3 = _("repeat-error");
var em = _("c2");
var pass = _("d2");
var repeat = _("e2");
var a1 = false;
var a2 = false;
var a3 = false;
function validatorem() { //Validates email address
	var emailvalue = em.value;
	var str = ' ' + emailvalue;
    var regex = /^\s(\W|\w)+@([a-z]+)\.[a-z]+$/ig; //Email address validation regular expression
    var t = str.match(regex);
    var cnt;
    if (t == null) {
        e1.style.display = 'block';
        e1.innerHTML = 'Invalid email address provided';
        a1 = false;
    } else {
    	e1.style.display = 'none';
    	a1 = true;
    }
    if (a1 == true && a2 == true && a3 == true) {
    	valid('true');
    }
    else {
    	valid('false');
    }
}
function validatorpass() { //Validates Password
	if (pass.value.length < 8) {
    	e2.style.display = 'block';
        e2.innerHTML = 'Must be at least 8 characters long';
        a2 = false;
    }
    else {
    	e2.style.display = 'none';
    	a2 = true;
    }
    if (a1 == true && a2 == true && a3 == true) {
    	valid('true');
    }
    else {
    	valid('false');
    }
}
function validatorre() { //Validates the password evenness
	if (repeat.value != pass.value) {
    	e3.style.display = 'block';
        e3.innerHTML = 'Passwords do not match';
        a3 = false;
    }
    else {
    	e3.style.display = 'none';
    	a3 = true;
    }
    if (a1 == true && a2 == true && a3 == true) {
    	valid('true');
    }
    else {
    	valid('false');
    }
}
function create() {
	if (a1 == true && a2 == true && a3 == true) {
    	var xhttp;
    	if (XMLHttpRequest) {
    		xhttp = new XMLHttpRequest();
    	}
    	else {
    		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	var data = new FormData(_("form"));
    	xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			if (this.responseText != 'error') {
                    window.location.replace('http://localhost/Ecommerce/index.php');
               }
               else {
                    err("A user with that email address exists already!");
               }
    		}
    	}
    	xhttp.open('POST','http://localhost/Ecommerce/settings.php',true);
    	xhttp.send(data);
    }
    else {
        err('All parameters must be satisfied!');
    }
}
function ev(event) {
	if (event.keyCode == 32) {
		event.preventDefault();	
	}
}
function valid(x) {
	if (x == 'true') {
		_("subm").style.backgroundColor = 'hotpink';
		_("subm").style.color = 'white';
	}
}
function err(message) {
    document.querySelectorAll("#error")[0].style.display = 'block';
    document.querySelectorAll("#error")[0].innerHTML = '<center>'+message+'</center>';
    document.querySelectorAll("#error")[0].style.transition = '0.6s';
    setTimeout(function(){
        document.querySelectorAll("#error")[0].style.opacity = '1';
        document.querySelectorAll("#error")[0].style.top = '10vh';
    },100);
    setTimeout(function(){
        fin();
    },2500);
}
function fin() {
    document.querySelectorAll("#error")[0].style.transition = '0.6s';
    document.querySelectorAll("#error")[0].style.opacity = '0';
    document.querySelectorAll("#error")[0].style.top = '-200px';
    setTimeout(function(){
        document.querySelectorAll("#error")[0].style.display = 'none';
    },500);
}
function errr(message) {
    document.querySelectorAll("#error")[0].style.display = 'block';
    document.querySelectorAll("#error")[0].innerHTML = '<center>'+message+'</center>';
    document.querySelectorAll("#error")[0].style.transition = '0.6s';
    setTimeout(function(){
        document.querySelectorAll("#error")[0].style.opacity = '1';
        document.querySelectorAll("#error")[0].style.top = '10vh';
    },100);
    setTimeout(function(){
        finn();
    },2500);
}
function finn() {
    document.querySelectorAll("#error")[0].style.transition = '0.6s';
    document.querySelectorAll("#error")[0].style.opacity = '0';
    document.querySelectorAll("#error")[0].style.top = '-200px';
    setTimeout(function(){
        window.location.replace('http://localhost/Ecommerce/options.php');
        document.querySelectorAll("#error")[0].style.display = 'none';
    },500);
}

var s = 0;
function slider() {
    if (s == 0) {
        document.querySelectorAll(".slideout")[0].style.opacity = '1';
        document.querySelectorAll(".slideout")[0].style.right = '0px';
        s = 1;
    }
    else {
        document.querySelectorAll(".slideout")[0].style.opacity = '0';
        document.querySelectorAll(".slideout")[0].style.right = '-300px';
        s = 0;
    }
}
function login() {
    if (_("c2").value == '' || _("d2").value == '') {
        err("No field must be left blank!");
    }
    else {
        var xhttp;
        if (XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        }
        else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var data = new FormData(_("form"));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               if (this.responseText != 'error') {
                    window.location.replace('http://localhost/Ecommerce/index.php');
               }
               else {
                    err("Invalid email address or pasword!");
               }
            }
        }
        xhttp.open('POST','http://localhost/Ecommerce/settings.php',true);
        xhttp.send(data);
    }
}
function searchnow(x) {
    department = 'default';
    category = 'default';
    _("navigator").style.display = 'none';
    if (x.length >= 2) {
        var xhttp;
        if (XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        }
        else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                _("products").innerHTML = this.responseText;
            }
        }
        xhttp.open('POST','http://localhost/Ecommerce/settings.php?qstr='+x,true);
        xhttp.send();
    }
}