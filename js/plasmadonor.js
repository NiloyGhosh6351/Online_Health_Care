function validdate()
{
	var date=document.getElementById('plasmadonationdate').value;
	var xhttp = new XMLHttpRequest();
			xhttp.open('POST', '../php/test.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('date='+date);

			xhttp.onreadystatechange = function ()
			{
			if(this.readyState == 4 && this.status == 200)
				{
					if(this.responseText != "")
					{
						var b=this.responseText;
						var c=b.split(",");
						var sel = document.getElementById('time');
						var length = sel.options.length;
						for (i = length-1; i >= 0; i--) 
						{
						  sel.options[i] = null;
						}
						for (var i =0; i < c.length-1; i++) 
						{
							var opt = document.createElement('option');
							opt.appendChild( document.createTextNode(c[i]));
							opt.value = c[i];
							sel.appendChild(opt);
						}

							 
					}
				}	
			}
}
function combo() 
{
	var sel = document.getElementById('time');
	var length = sel.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  sel.options[i] = null;
	}
}

function load()
{
	var name = document.getElementById('name').value;
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/plasmadonorsearch.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('name='+name);
	xhttp.onreadystatechange = function ()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			if(this.responseText != "")
			{
				document.getElementById('searchdonor').innerHTML = this.responseText;
				//alert(this.responseText);
			}
			else
			{
				document.getElementById('searchdonor').innerHTML = "";
			}
			
		}	
	}
	document.getElementById('plasmadonationtable').innerHTML = "";	
	
}