var FormDeleteGalleryAlbum = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteGalleryAlbum.$super.call(this, app, "formGalleryAlbumDelete", "GalleryAlbum Delete", "Forms/FormDeleteGalleryAlbum.json", {width: '50%'});
	}
	,
	onLoad: function(param)
	{
		console.log("onLoad");
		console.log(param);
		this.setData(param.Data.Items);
		this.initializeControls(this);
	}

});