function checkEmail(email) 
{
	var reg = /^([A-Za-z0-9.\-\_])+\@([A-Za-z])+\.([A-Za-z]{2,4})$/;
	if (reg.test(email)==false) 
	{
	    return false;
	}
	return true;
}

function checkUsername(username) 
{
	var reg = /^([A-Za-z0-9.\-\_])$/;
	if (reg.test(username)==false) 
	{
	    return false;
	}
	return true;
}

function checkPassword(password) 
{
	var reg= /^([A-Za-z0-9\_\=\!\_\-])$/;
	if(password.match(reg))
	{
		reg.test(password)==false;
	}	
	else
	{
		if(password.length<8)
		{
			return false;
		}
	}
	return true;
}