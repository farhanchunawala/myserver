function listMaker(ic, sv) {
	let text = '';
	if (sv!=0) {
		text += '<ul id="myUL">';
		for (let myObj in myObjs) text += '<li><a href="#" onclick="myFunction2(\''+myObj+'\', \''+ic+'\')">'+myObj+'</a></li>';
		text += '</ul>';
	}
	document.getElementById('searchFilter'+ic).innerHTML = text;
	
}

let ct=0;
const cnt = (function (ct) {
	let counter = ct;
	return function () { counter += 1; return counter }
})(ct);

function myFunction2(val, ic) {
	if (ic!=0) {
		document.getElementById("inp"+ic).value = val;
		document.getElementById("protein"+ic).value = myObjs[val]['protein'];
		listMaker((ic), 0);
	}
	if (ct==ic) {
		ct = cnt();  ic=parseInt(ic)+1;
		let text = 
			'<input type="text" class="myInput" name="inp'+ic+'" id="inp'+ic+'" onkeyup="searchFilter(\''+ic+'\')" placeholder="Ingr Name" >'+
			'<input type="text" class="myInput" name="qty'+ic+'" :value="prot" placeholder="Qty" >'+
			'<input type="text" class="myInput" name="protein'+ic+'" id="protein'+ic+'" placeholder="prt" >'+
			'<div id="searchFilter'+ic+'"></div>'+
			'<div id="listRow'+ic+'"></div>';
		document.getElementById('listRow'+(ic-1)).innerHTML = text;
		document.getElementById('inp'+ic).addEventListener("click", function(){listMaker(ic, 1)});
	}
}

function searchFilter(ic) {
	var input, filter, ul, li, a, i, txtValue;
	input = document.getElementById('inp'+ic);
	filter = input.value.toUpperCase();
	ul = document.getElementById("myUL");
	li = ul.getElementsByTagName("li");
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		txtValue = a.textContent || a.innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}