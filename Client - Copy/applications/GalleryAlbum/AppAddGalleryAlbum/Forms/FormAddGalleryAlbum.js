var FormAddGalleryAlbum = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddGalleryAlbum.$super.call(this, app, "formGalleryAlbumAdd", "GalleryAlbum Add", "Forms/FormAddGalleryAlbum.json", {width: '50%'});
	}
	,
	onLoad: function(param)
	{
		console.log("onLoad");
		console.log(param);
		this.displayLookupData(this, param.Data.Lookups);
		this.initializeControls(this);
		
	}
	,
	displayLookupData: function(me, lookups)
	{	
	}
});