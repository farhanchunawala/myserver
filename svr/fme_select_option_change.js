
var GarbStyles = {};
GarbStyles['shirt'] = ['oshirt', 'bshirt', 'bshirtsc'];
GarbStyles['kurta'] = ['straight', 'round', 'kali'];
GarbStyles['kandura'] = [];
GarbStyles['pant'] = ['pant', 'bpyjama'];
GarbStyles['salwar'] = ['kali', 'nokali', 'aligard'];

function ChangeGarbStyle() {
	var garbList = document.getElementById("garbtype");
	var styleList = document.getElementById("garbstyle");
	var selGarb = garbList.options[garbList.selectedIndex].value;
	while (styleList.options.length) {
		styleList.remove(0);
	}
	var styles = GarbStyles[selGarb];
	if (styles) {
		var i;
		for (i = 0; i < styles.length; i++) {
			var garbtype = new Option(styles[i], i);
			styleList.options.add(garbtype);
			//styleList.options.value = "Johnny Bravo";
		}
	}
}