var ct = 0;
function discart() {
	if (ct == 0) {
		_('shopcart').style.display = 'block';
		ct = 1;
	}
	else {
		_('shopcart').style.display = 'none';
		ct = 0;
	}
}
function addcart(x){
	workOn(x);
}
function see(){
	if (cartnum >= 1) {
		_("num-cart").style.display = 'block';
	}
}
function workOn(x) {
	var xhttp;
    	if (XMLHttpRequest) {
    		xhttp = new XMLHttpRequest();
    	}
    	else {
    		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			if (this.responseText != 'error') {
    				_("num-cart").style.display = 'block';
    				_("num-cart").innerText = this.responseText.split("||||")[1];
    				document.querySelectorAll(".checkout-inner")[0].innerHTML = this.responseText.split("||||")[0];
                    err("Added to cart");
               }
               else {
                    err("Unable to complete. Item already included");
               }
    		}
    	}
    	xhttp.open('POST','http://localhost/Ecommerce/settings.php?id='+x,true);
    	xhttp.send();
}
var cartarray = new Array();
function checkbuy() {
		cartarray = [];
        for (var i = 0;i<document.querySelectorAll(".ids").length;i++) {
            cartarray.push(document.querySelectorAll(".ids")[i].id);
        }
        var xhttp;
        if (XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        }
        else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    _("view-details").style.display = 'block';
                    _("inner").innerHTML = this.responseText;
               }
               else {
                    err("Unable to complete!");
               }
        }
        xhttp.open('GET','http://localhost/Ecommerce/settings.php?arr='+cartarray,true);
        xhttp.send();
}
function remelem(x) {
		var xhttp;
    	if (XMLHttpRequest) {
    		xhttp = new XMLHttpRequest();
    	}
    	else {
    		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			if (this.responseText != 'error') {
    				_("num-cart").style.display = 'block';
    				_("num-cart").innerText = this.responseText.split("||||")[1];
    				document.querySelectorAll(".checkout-inner")[0].innerHTML = this.responseText.split("||||")[0];
                    err("Removed from cart!");
               }
               else {
                    err("Unable to complete!");
               }
    		}
    	}
    	xhttp.open('POST','http://localhost/Ecommerce/settings.php?remid='+x,true);
    	xhttp.send();
}