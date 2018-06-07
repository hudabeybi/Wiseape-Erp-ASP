var OAuthClient = 
{
	//baseUrl: "http://localhost/com.wiseape.tools.oauthservermanager",
	baseUrl: "http://localhost/com.wiseape.tools.oauthservermanager",
	clientId: "WISEAPEERP",
	clientSecret: "abcdefghijkl",
	authenticate: function(callback)
	{
		var accessToken = OAuthClient.readCookie("Access-Token");
		if(accessToken == null)
			accessToken = "aaa";
		var url = OAuthClient.baseUrl + "/OAuthService.svc/oauth/authorize/" + OAuthClient.clientId;
		$.ajax({
			url: url,
			type: 'GET',
			headers: {"Authorization" : "Bearer " + accessToken },
			dataType: "text",
			success: function (result) {
				console.log(result);
				try
				{
					var oResult = JSON.parse(result);
					console.log(oResult);
					if(oResult.Result)
					{
						if(callback != null)
							callback();
					}else
						OAuthClient.authenticate(callback);				
				}
				catch (e)
				{
					console.log("error");
					$(document.body).html(result);
				}
				
            },
            error: function (error) {
				console.log("Error ");
                console.log(error);
            }
		});
	}
	,
	requestAccessToken: function(authCode)
	{
		var url =  OAuthClient.baseUrl + "/OAuthService.svc/oauth/accesstoken/" + authCode + "/" + OAuthClient.clientId + "/" + OAuthClient.clientSecret;
		$.get(url, function(result)
		{
			console.log("request access token result:");
			console.log(result);
			OAuthClient.createCookie("Access-Token", result.Data.AccessTokenString);
			OAuthClient.createCookie("Refresh-Token", result.Data.RefreshToken);
			//
			OAuthClient.getUserInfo(function(oResult)
			{
				console.log("oResult");
				console.log(oResult);
				OAuthClient.createCookie("OAuthUsername", oResult.Data[0].Username);
				OAuthClient.createCookie("OAuthFirstName", oResult.Data[0].FirstName);
				OAuthClient.createCookie("OAuthLastName", oResult.Data[0].LastName);
				OAuthClient.createCookie("OAuthGender", oResult.Data[0].GenderId);
				OAuthClient.createCookie("OAuthOtherData", oResult.Data[0].Address);
				location = "./";
			});
		});
	}
	,
	getUserInfo: function(callback)
	{
		var accessToken = OAuthClient.readCookie("Access-Token");
		console.log("accesstoken");
		console.log(accessToken);

		var url = OAuthClient.baseUrl + "/OAuthService.svc/oauth/userinfo";
		console.log(url);
		console.log(url);
		$.ajax({
			url: url,
			type: 'GET',
			headers: {"Authorization" : "Bearer " + accessToken },
			dataType: "text",
			success: function (result) {
				console.log(result);
				try
				{
					var oResult = JSON.parse(result);
					console.log("Result of userinfo");
					console.log(oResult);
	
					
					if(callback != null)
						callback(oResult);
				}
				catch (e)
				{
					console.log("error");
					//$(document.body).html(result);
				}
				
            },
            error: function (error) {
				console.log("Error ");
                console.log(error);
            }
		});
	}
	,
	getLoginPage: function(callback)
	{
		var url = OAuthClient.baseUrl + "/OAuthService.svc/oauth/getloginpage/" + OAuthClient.clientId + "/" + OAuthClient.clientSecret;
		$.get(url, function(result)
		{
			var result = JSON.parse(result);
			var redirect = result.Data;
			location = redirect;
		});
	}
	,
	readCookie: function(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
   }
   ,
   createCookie(name, value, days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		}
		else var expires = "";               

		document.cookie = name + "=" + value + expires + "; path=/";
	}

}