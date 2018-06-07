var WiseapeBaseInputForm = Class(WiseapeWindow, {
	constructor: function(app, formName, title, file, option)
	{
		var me = this;
		WiseapeBaseInputForm.$super.call(this, app, formName, title, file, option);
		me.uiRenderer.uploadUrl = SharedConfig.fileWs + "/file/upload";
		me.uiRenderer.downloadUrl = SharedConfig.fileWs + "/file/download";
		me.uiRenderer.deleteUrl = SharedConfig.fileWs + "/file/delete";
		
		me.uiRenderer.onUploaded = function(id, fileInpId, result)
		{
		    
			var val = $(me.get(id)).val();
			if($("#" + fileInpId).hasAttr("multiple"))
    			val = val + result.Data + ";";
    		else
    		    val =  result.Data;
			$(me.get(id)).val(val);

			//me.uiRenderer.setImageDisplay(fileInpId, val);
		}

		me.uiRenderer.onFileDeleted = function(id, fileInpId, fileName)
		{
			var val = $(me.get(id)).val();
			val = val.replace(fileName + ";", "");
			$(me.get(id)).val(val);
		}
	}
	,
	initializeControls: function(me)
	{

		me.uiRenderer.initialize();
	}
	,
	fillCombo: function(me, id, data)
	{

		var cmb = me.get(id);
		var valueField = $(cmb).attr("value-field");
		var displayField = $(cmb).attr("display-field");

		for(var i = 0; i < data.length; i++)
		{
			var item = data[i];
			var value = item[valueField];
			var text = item[displayField];
			$(cmb).append("<option value='" + value + "'>" + text + "</option>");
		}
	}
	,
	getData: function()
	{
		var me = this;
		return me.uiRenderer.getData();
	}
	,
	setData: function(form)
	{
		var me = this;
		me.uiRenderer.setData(form);
	}
	,
	save: function()
	{
		var form = this.getData();
		console.log("FORM DATA");
		console.log(form);
		if(this.onSaveData != null)
			this.onSaveData(form);
	}
	,
	delete: function()
	{
		var me = this;
		var data = me.getData();
		console.log("delete");
		console.log(data);
		me.app.raiseEvent( "saveDelete", data);
	}

});