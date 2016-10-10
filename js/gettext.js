function company_change()
{
	
  	var x=$('#selectcar option:selected').text();
            	document.getElementById("company").value = x;	
}
function fuel_change()
{
  	var x=$('#fuel option:selected').text();
            	document.getElementById("fuelh").value = x;
}
function state_change()
{
  	var x=$('#selectstate option:selected').text();
            	document.getElementById("stateh").value = x;
}
function company_change_bike()
{
	
  	var x=$('#selectbike option:selected').text();
            	document.getElementById("bcompany").value = x;	
}
function state_change_bike()
{
  	var x=$('#bselectstate option:selected').text();
            	document.getElementById("bstateh").value = x;
}