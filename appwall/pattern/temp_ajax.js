var moo = "cow noise";

$.ajax({
    type: "POST",
    url: "",
    data: "",
    success: function(data){
            //return the variable here
            alert(moo);
    }
});


var moo = "cow noise";

(function(moo){
	$.ajax({
		type: "POST",
		url: "",
		data: "",
		success: function(data){
			//return the variable here
			alert(moo);
		}
	});
})(moo);