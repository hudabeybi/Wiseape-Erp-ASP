var AppAddGalleryAlbum = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "galleryalbum/add",
			formFile: "Forms/FormAddGalleryAlbum.js",
			lookupUrl: null,
			getDataUrl: "galleryalbum/get",
			keyColumnName: "IdGalleryAlbum",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});