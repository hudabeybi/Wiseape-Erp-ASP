var AppEditGalleryAlbum = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "galleryalbum/edit",
			formFile: "Forms/FormEditGalleryAlbum.js",
			lookupUrl: null,
			getDataUrl: "galleryalbum/get",
			keyColumnName: "IdGalleryAlbum",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});