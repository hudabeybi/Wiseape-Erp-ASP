var WiseapeBaseListForm = Class(WiseapeWindow, 
{
	currentPage: 1,
	onLoad: function( param )
	{
		var me = this;
		me.beforeLoad(param);
		me.setCmbMaxDisplay(me);
		me.refresh(me, param);
		me.afterLoad(param);
	}
	,
	onResizeEnd: function(me, win)
	{
		me.resizeGrid(me);
	}
	,
	beforeLoad: function(param)
	{
	}
	,
	afterLoad: function(param)
	{
	}
	,
	refresh: function(me, param)
	{
		//var me = this;
		me.setCmbPage(me, param.OtherData);
		console.log("Param");
		console.log(param);
		var adapter = me.getDataAdapter(me, param.Data);
		me.fillGrid( me, adapter);	
	}
	,
	addItem: function()
	{
		var me = this;
		me.app.raiseEvent("addItem", me.getSelectedItem());		
	}
	,
	editItem: function()
	{
		var me = this;
		me.app.raiseEvent("editItem", me.getSelectedItem());
	}
	,
	deleteItem: function ()
	{
		var me = this;
		me.app.raiseEvent("deleteItem", me.getSelectedItem());
	}
	,
	refreshData: function()
	{
		var me = this;
		me.app.raiseEvent("refreshData", me.getFilterParameter(me));
	}
	,
	search: function()
	{
		var me = this;
		me.refreshData();
	}
	,
	getFilterParameter: function(me)
	{
		var filter = {};
		filter.page = $(me.get("cmbPage")).val();
		filter.max = $(me.get("cmbMax")).val();
		filter.keyword = $(me.get("txtSearch")).val();
		if(filter.keyword == "")
			filter.keyword = "all";
		console.log(filter);
		me.currentPage = filter.page;
		return filter;
	}
	,
	setCmbPage: function(me, totalData)
	{
		var l = totalData;
		var mx = $(me.get("cmbMax")).val();
		var ll = l / mx + 1;

		$(me.get("cmbPage")).html("");
		for(var i = 1; i <= ll; i++)
		{
			$(me.get("cmbPage")).append("<option value='" + i + "'>" + i + "</option>");
		}	
		
		$(me.get("cmbPage")).val(me.currentPage);
	}
	,
	setCmbMaxDisplay: function(me)
	{
		$(me.get("cmbMax")).html("");
		for(var i = 1; i < 10; i++)
		{
			var max = i * 10;
			$(me.get("cmbMax")).append("<option value='" + max + "'>" + max + "</option>");
		}
	}
	,
	selectedItem: null
	,
	getSelectedItem: function()
	{
		return this.selectedItem;
	}
	,
	getDataAdapter: function(me, data)
	{
		var source =
		{
			localdata: data,
			datafields: me.getDataFields()
			,
			datatype: "array"
		};

		var adapter = new $.jqx.dataAdapter(source);
		return adapter;
	}
	,
	resizeGrid: function(me)
	{
		var gridW = $(me.get(me.getGridId())).attr("width");
		var gridH = $(me.get(me.getGridId())).attr("height");
		//alert(gridH);
		var gridW = me.width() * 99/100; //$(me.get(me.getGridId())).attr("width");
		var gridH = me.height() * 65/100; //$(me.get(me.getGridId())).attr("height");


		$(me.get(me.getGridId())).jqxGrid({
			width: gridW,
			height: gridH
		});
	}
	,
	fillGrid: function(me, dataAdapter)
	{

		me.createGrid(me, dataAdapter);
		me.resizeGrid(me);

	}
	,
	createGrid: function(me, dataAdapter)
	{
		var gridW = me.width(); //$(me.get(me.getGridId())).attr("width");
		var gridH = me.height(); //$(me.get(me.getGridId())).attr("height");
		$(me.get(me.getGridId())).jqxGrid(	
		{
			source: dataAdapter,
			filterable: true,
			sortable: true,
			groupable: true,
			selectionmode: 'singlerow',
			autoshowfiltericon: true,
			columnsresize: true,
			altrows: true,
			columns: me.getGridColumns()
		});
		
		me.resizeGrid(me);

		$(me.get(me.getGridId())).bind("rowselect", function(event)
		{
			var row = event.args.rowindex;
			me.selectedItem = $(me.get(me.getGridId())).jqxGrid('getrowdata', row);
			console.log(me.selectedItem);
		});
	}
	,
	getGridColumns: function()
	{
		var me = this;
		var colstr = $(me.get(me.getGridId())).attr("column-info");
		colstr = colstr.replace(/[\']/g, "\"");
		var columns = JSON.parse(colstr);
		var columnNew = new Array();
		for(var i = 0; i < columns.length; i++)
		{
			var col = columns[i];
			columnNew.push({ text: col.text, datafield: col.datafield, width: col.width, filtertype: col.type, cellsformat: col.cellformat });
		}
		return columnNew;
	}
	,
	getFancyGridColumns: function()
	{
		var me = this;
		var colstr = $(me.get(me.getGridId())).attr("column-info");
		colstr = colstr.replace(/[\']/g, "\"");
		var columns = JSON.parse(colstr);
		var columnNew = new Array();
		for(var i = 0; i < columns.length; i++)
		{
			var col = columns[i];
			columnNew.push({ title: col.text, index: col.datafield, width: col.width, type: col.type });
		}
		return columnNew;
	}
	,
	getDataFields: function()
	{
		var me = this;
		var colstr = $(me.get(me.getGridId())).attr("column-info");
		colstr = colstr.replace(/[\']/g, "\"");
		var columns = JSON.parse(colstr);

		var columnNew = new Array();
		for(var i = 0; i < columns.length; i++)
		{
			var col = columns[i];
			columnNew.push({  name: col.datafield, type: col.type });
		}
		return columnNew;
	}
	,
	getGridId: function()
	{
		return "grid";
	}
});