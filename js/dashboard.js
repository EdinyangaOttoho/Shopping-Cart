var id = 0;
var uscanada = ['Next Day Delivery ($20)','3-4 Days ($10)','7 Days ($5)'];
var europe = ['By air (7 days, $25)','By sea (28 days, $10)'];
var other = ['By air (10 days, $35)','By sea (28 days, $30)'];
var shippingid = '1';
var nation = '';
function pop(x) {
	_("full-screen-size").style.display = 'block';
	id = x;
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
    	window.location.replace("http://localhost/Ecommerce/options.php");
        document.querySelectorAll("#error")[0].style.display = 'none';
    },500);
}
function inptype(x,y) {
	if (x == 'region') {
		if (y == 'US/Canada') {
			_("type").innerHTML = '';
			for (var i = 0; i < uscanada.length; i++) {
				_("type").innerHTML += '<option>'+uscanada[i]+'</option>';
			}
			shippingid = '2';
		}
		else if (y == 'Europe') {
			_("type").innerHTML = '';
			for (var i = 0; i < europe.length; i++) {
				_("type").innerHTML += '<option>'+ europe[i]+'</option>';
			}
			shippingid = '3';
		}
		else {
			_("type").innerHTML = '';
			for (var i = 0; i < other.length; i++) {
				_("type").innerHTML += '<option>'+other[i]+'</option>';
			}
			shippingid = '4';
		}
	}
}
_("uporders").onclick = function(){
	nation = _("nation").value;
	type = _("type").value;
	var xhttp;
    	if (XMLHttpRequest) {
    		xhttp = new XMLHttpRequest();
    	}
    	else {
    		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
                    err("Successfully Updated!");
    		}
    	}
    	xhttp.open('POST','http://localhost/Ecommerce/settings.php?id='+ id +'&shippingid='+shippingid+'&nation='+nation+'&type='+type,true);
    	xhttp.send();
}