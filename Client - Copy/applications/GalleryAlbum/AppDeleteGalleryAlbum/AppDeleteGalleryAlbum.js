var AppDeleteGalleryAlbum = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "galleryalbum/delete",
			formFile: "Forms/FormDeleteGalleryAlbum.js",
			lookupUrl: null,
			getDataUrl: "galleryalbum/get",
			keyColumnName: "IdGalleryAlbum",
			configFile: me.appPath + "/../config.js",
			appType: "delete"
		}

		return config;
	}
	,
	getWindowOptions: function()
	{
		return { height: "300" };
	}
	,
	afterSaveData: function(me, result)
	{
		Util.showNotif("Success", "Saved");
		me.winEdit.close();
	}
});