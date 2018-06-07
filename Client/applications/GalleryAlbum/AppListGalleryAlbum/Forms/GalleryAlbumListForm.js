var GalleryAlbumListForm = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		GalleryAlbumListForm.$super.call(this, app, "formGalleryAlbumList", "GalleryAlbum List", "Forms/GalleryAlbumListForm.html");
	}
	,
	getGridColumns: function()
	{
		return	[
			  { text: 'Id GalleryAlbum', datafield: 'IdGalleryAlbum', width: 0 },
			  { text: 'Title', datafield: 'AlbumTitle', width: 260 },
			  { text: 'Description', datafield: 'AlbumDescription', width: 160 },
			  { text: 'Tag', datafield: 'Tag', width: 160 },
			  { text: 'Created Date', datafield: 'AlbumCreatedDate', width: 100, filtertype: 'date', width: 160, cellsformat: 'dd-MMMM-yyyy' }
			];
	}
	,
	getDataFields: function()
	{
		return [
				{ name: 'IdGalleryAlbum', type: 'string' },
				{ name: 'AlbumTitle', type: 'string' },
				{ name: 'AlbumDescription', type: 'string' },
				{ name: 'Tag', type: 'string' },
				{ name: 'AlbumCreatedDate', type: 'date' }
			];
	}
	,
	getGridId: function()
	{
		return "gridGalleryAlbum";
	}

	
});