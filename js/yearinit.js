function yearselector() {
    	var start=1999;
    	var end=new Date().getFullYear();
    	var options="";
	for(var year=start;year<=end;year++)
	{
		options+="<option>"+year+"</option>";
	}
	document.getElementById("year").innerHTML=options;
	document.getElementById("yearb").innerHTML=options;
}
