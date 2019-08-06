var total = 0;
function upprice(x) {
	var id = x.match(/[0-9]+$/) [0];
	var quant = "yy" + id;
	var unit = "zz" + id;
	var resval = "xx" + id;
	var tot = 0;
	var qu = parseFloat(_(quant).value);
	var un = parseFloat(_(unit).value);
	var prod = (qu * un).toFixed(2);
	_(resval).innerText = '$'+prod;
	var tot = 0;
	for (var i = 0; i < document.querySelectorAll(".price-tags").length; i++) {
		if (document.querySelectorAll('.price-tags')[i].innerText != 'FREE') {
			tot = tot + parseFloat(document.querySelectorAll(".price-tags")[i].innerHTML.replace('$',''));
		}
	}
	tot = tot.toFixed(2);
	_("total").innerText = 'Total: $'+tot;
	total = tot;
}
function totalbuy(x) {
	if (total != 0) {
		x = parseFloat(total);
	}
	else {
		x = parseFloat(x);
	}
	if (x == 0) {
	   var xhttp;
       if (XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
       }
       else {
            xhttp = new ActiveXObject('Microsoft.XMLHTTP');
       }
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
               if (this.ResponseText != 'error') {
                   errr("Thanks for buying our product");
               }
               else {
                   err("Unable to complete payment");
               }
           }
       }
       xhttp.open('GET','http://localhost/Ecommerce/settings.php?paid=0&ref=0000000000',true);
       xhttp.send();
	}
	payWithPaystack(parseFloat(x));
}