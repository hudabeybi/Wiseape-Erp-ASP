var Project = Class({
	idProject:null,
	name: null,
	title: null,
	desc: null,
	icon: null,
	connectionInfo: null,
	dataModels: null,
	businessModels: null,
	uiModels: null,
	dbTables: null,
	constructor: function()
	{
		this.connectionInfo = new ConnectionInfo();
		this.dataModels = new Array();
		this.businessModels = new Array();
		this.uiModels = new Array();
		this.dbTables = new Array();
		this.idProject = makeid();
	}
	,
	getDataModel: function(id)
	{
		var idx = this.getDataModelIndex(id);
		return this.dataModels[idx];
	}
	,
	getDataModelByName: function(id)
	{
		for(var i = 0; i < this.dataModels.length; i++)
		{
			var model = this.dataModels[i];
			if(model.name == id)
				return model;
		}
	}
	,
	getDataModelIndex: function(id)
	{
		for(var i = 0; i < this.dataModels.length; i++)
		{
			var model = this.dataModels[i];
			if(model.idModel == id)
				return i;
		}
	}
	,
	addDataModel: function(model)
	{
		this.dataModels.push(model);
	}
	,
	updateDataModel: function(model)
	{
		var idx = this.getDataModelIndex(model.idModel);
		this.dataModels[idx] = model;
	}
	,
	removeDataModel: function(id)
	{
		var idx = this.getDataModelIndex(id);
		this.dataModels.splice(idx,1);
	}
	,
	getBusinessModel: function(id)
	{
		var idx = this.getBusinessModelIndex(id);
		return this.businessModels[idx];
	}
	,
	getBusinessModelByName: function(id)
	{
		for(var i = 0; i < this.businessModels.length; i++)
		{
			var model = this.businessModels[i];
			if(model.name == id)
				return i;
		}
	}
	,
	getBusinessModelIndex: function(id)
	{
		for(var i = 0; i < this.businessModels.length; i++)
		{
			var model = this.businessModels[i];
			if(model.idModel == id)
				return i;
		}
	}
	,
	addBusinessModel: function(model)
	{
		this.businessModels.push(model);
	}
	,
	updateBusinessModel: function(model)
	{
		var idx = this.getBusinessModelIndex(model.idModel);
		this.businessModels[idx] = model;
	}
	,
	removeBusinessModel: function(id)
	{
		var idx = this.getBusinessModelIndex(id);
		this.businessModels.splice(idx,1);
	}
	,
	getUIModel: function(id)
	{
		var idx = this.getUIModelIndex(id);
		return this.uiModels[idx];
	}
	,
	getUIModelByName: function(id)
	{
		for(var i = 0; i < this.uiModels.length; i++)
		{
			var model = this.uiModels[i];
			if(model.name == id)
				return i;
		}
	}
	,
	getUIModelIndex: function(id)
	{
		for(var i = 0; i < this.uiModels.length; i++)
		{
			var model = this.uiModels[i];
			if(model.idModel == id)
				return i;
		}
	}
	,
	addUIModel: function(model)
	{
		this.uiModels.push(model);
	}
	,
	updateUIModel: function(model)
	{
		var idx = this.getUIModelIndex(model.idModel);
		this.uiModels[idx] = model;
	}
	,
	removeUIModel: function(id)
	{
		var idx = this.getUIModelIndex(id);
		this.uiModels.splice(idx,1);
	}
	,
	getDbTable: function(id)
	{
		var idx = this.getDbTableIndex(id);
		return this.dbTables[idx];
	}
	,
	getDbTableByName: function(id)
	{
		for(var i = 0; i < this.dbTables.length; i++)
		{
			var model = this.dbTables[i];
			if(model.name == id)
				return model;
		}
	}
	,
	getDbTableIndex: function(id)
	{
		for(var i = 0; i < this.dbTables.length; i++)
		{
			var model = this.dbTables[i];
			if(model.idTable == id)
				return i;
		}
	}
	,
	addDbTable: function(table)
	{
		this.dbTables.push(table);
	}
	,
	updateDbTable: function(table)
	{
		var idx = this.getdbTableIndex(table.idTable);
		this.dbTables[idx] = model;
	}
	,
	removeDbTable: function(id)
	{
		var idx = this.getDbTableIndex(id);
		this.dbTables.splice(idx,1);
	}
	
});


var ConnectionInfo = Class({
	idConnectionInfo: null,
	name: null,
	dbHost: null,
	dbName: null,
	dbUsername: null,
	dbPassword: null,
	description: null,
	constructor: function()
	{
		this.idConnectionInfo = makeid();
	}
});


var DbTable = Class({
	idTable: null,
	name: null,
	alias: null,
	desc: null,
	dbColumns : null,
	connectionInfo: null,
	construction: function()
	{
		this.idTable = makeid();
		this.dbColumns = new Array();
	}
	,
	getDbColumn: function(id)
	{
		var idx = this.getdbColumnIndex(column.idColumn);
		return this.dbColumns[idx];
	}
	,
	getDbColumnIndex: function(id)
	{
		for(var i = 0; i < this.dbColumns.length; i++)
		{
			var column = this.dbColumns[i];
			if(column.idColumn == id)
				return i;
		}
	}
	,
	getDbColumnByName: function(id)
	{
		for(var i = 0; i < this.dbColumns.length; i++)
		{
			var column = this.dbColumns[i];
			if(column.name == id)
				return i;
		}
	}
	,
	addDbColumn: function(column)
	{
		this.dbColumns.push(column);
	}
	,
	updateDbColumn: function(column)
	{
		var idx = this.getdbColumnIndex(column.idColumn);
		this.dbColumns[idx] = column;
	}
	,
	removeDbColumn: function(id)
	{
		var idx = this.getDbColumnIndex(id);
		this.dbColumns.splice(idx,1);
	}
	,
	clearColumns: function()
	{
		this.dbColumns = new Array();
	}
});



var DbColumn = Class({
	idColumn: null,
	name:null,
	alias: null,
	isPrimaryKey: null,
	isAutonumber: null,
	isUnique: null,
	dataType: null,
	constructor: function ()
	{
		this.idColumn = makeid();
	}
});

var Property = Class({
	idProperty: null,
	dbColumn: null,
	constructor: function()
	{

		this.idProperty = makeid();
	}
});

var DbRelationship = Class({
	idRelation: null,
	name: null,
	DbColumn1: null,
	Dbcolumn2: null,
	relationType: null,
	constructor: function(col1, col2, relType)
	{
		this.idRelation = makeid();
		this.dbColumn1 = col1;
		this.dbColumn2 = col2;
		this.relationType = relType;
	}
});

var DataModel = Class({
	idModel: null,
	dbTable: null,
	name: null,
	description: null,
	group: null,
	properties: null,
	relationships: null,
	constructor: function()
	{
		this.idModel = makeid();
		this.properties = new Array();
		this.relationships = new Array();
	}
	,
	getProperty: function(id)
	{
		var idx = this.getPropertyIndex(id);
		return this.properties[idx];
	}
	,
	getPropertyIndex: function(id)
	{
		for(var i = 0; i < this.properties.length; i++)
		{
			var property = this.properties[i];
			if(property.idProperty == id)
				return i;
		}
	}
	,
	getPropertyByName: function(id)
	{
		for(var i = 0; i < this.properties.length; i++)
		{
			var property = this.properties[i];
			if(property.name == id)
				return i;
		}
	}
	,
	addProperty: function(property)
	{
		this.properties.push(property);
	}
	,
	updateProperty: function(property)
	{
		var idx = this.getPropertyIndex(property.idProperty);
		this.properties[idx] = property;
	}
	,
	removeProperty: function(id)
	{
		var idx = this.getPropertyIndex(id);
		this.properties.splice(idx,1);
	}
	,
	getRelation: function(id)
	{
		var idx = this.getRelationIndex(id);
		return this.relationships[idx];
	}
	,
	getRelationByName: function(id)
	{
		for(var i = 0; i < this.relationships.length; i++)
		{
			var relationship = this.relationships[i];
			if(relationship.name == id)
				return relationship;
		}
	}
	,
	getRelationIndex: function(id)
	{
		for(var i = 0; i < this.relationships.length; i++)
		{
			var relationship = this.relationships[i];
			if(relationship.idRelation == id)
				return i;
		}
	}
	,
	addRelation: function(relationship)
	{
		this.relationships.push(relationship);
	}
	,
	updateRelation: function(relationship)
	{
		var idx = this.getRelationIndex(relationship.idRelation);
		this.relationships[idx] = relationship;
	}
	,
	removeRelation: function(id)
	{
		var idx = this.getRelationIndex(id);
		this.relationships.splice(idx,1);
	}
	
});


var BusinessModel = Class({
	idModel: null,
	name: null,
	group: null,
	info: null,
	dataModel: null,
	functions: null,
	constructor: function()
	{
		this.functions = new Array();
	}
	,
	getFunction: function(id)
	{
		var idx = this.getFunctionIndex(id);
		return this.functions[idx];
	}
	,
	getFunctionIndex: function(id)
	{
		for(var i = 0; i < this.functions.length; i++)
		{
			var Function = this.functions[i];
			if(Function.idFunction == id)
				return i;
		}
	}
	,
	getFunctionByName: function(id)
	{
		for(var i = 0; i < this.functions.length; i++)
		{
			var Function = this.functions[i];
			if(Function.name == id)
				return Function;
		}
	}
	,
	addFunction: function(Function)
	{
		this.functions.push(Function);
	}
	,
	updateFunction: function(Function)
	{
		var idx = this.getFunctionIndex(Function.idFunction);
		this.functions[idx] = Function;
	}
	,
	removeFunction: function(id)
	{
		var idx = this.getFunctionIndex(id);
		this.functions.splice(idx,1);
	}
});



var OFunction = Class({
	idFunction: null,
	name: null,
	parameters: null,
	constructor: function ()
	{
		this.parameters = new Array();
	}
	,
	getParameter: function(id)
	{
		var idx = this.getParameterIndex(id);
		return this.parameters[idx];
	}
	,
	getParameterIndex: function(id)
	{
		for(var i = 0; i < this.paramaters.length; i++)
		{
			var Parameter = this.paramaters[i];
			if(Parameter.idParameter == id)
				return i;
		}
	}
	,
	getParameterByName: function(id)
	{
		for(var i = 0; i < this.paramaters.length; i++)
		{
			var Parameter = this.paramaters[i];
			if(Parameter.name == id)
				return Parameter;
		}
	}
	,
	addParameter: function(Parameter)
	{
		this.paramaters.push(Parameter);
	}
	,
	updateParameter: function(Parameter)
	{
		var idx = this.getParameterIndex(Parameter.idParameter);
		this.paramaters[idx] = Parameter;
	}
	,
	removeParameter: function(id)
	{
		var idx = this.getParameterIndex(id);
		this.paramaters.splice(idx,1);
	}
});


var Parameter = Class({
	idParameter: null,
	name: null,
	type: null,
	value: null
});




var UIModel = Class({
	idModel: null,
	name: null,
	group: null,
	info: null,
	controls: null,
	constructor: function()
	{
		this.controls = new Array();
	}
	,
	getControl: function(id)
	{
		var idx = this.getControlIndex(id);
		return this.controls[idx];
	}
	,
	getControlByName: function(id)
	{
		for(var i = 0; i < this.controls.length; i++)
		{
			var control = this.controls[i];
			if(control.name == id)
				return control;
		}
	}
	,
	getControlIndex: function(id)
	{
		for(var i = 0; i < this.controls.length; i++)
		{
			var control = this.controls[i];
			if(control.idControl == id)
				return i;
		}
	}
	,
	addControl: function(control)
	{
		this.controls.push(control);
	}
	,
	updateControl: function(control)
	{
		var idx = this.getControlIndex(control.idControl);
		this.controls[idx] = control;
	}
	,
	removeControl: function(id)
	{
		var idx = this.getControlIndex(id);
		this.controls.splice(idx,1);
	}
	
});



var ProjectProcessor = {
	currentProject: null,
	addProject: function (project)
	{
		this.currentProject = project;
	}
	,
	getProject: function (name)
	{

	}
	,
	createDataModelFromTable: function (tableName)
	{
		var dbTable = this.currentProject.getDbTableByName(tableName);
		var model = new DataModel();
		for(var i = 0; i < dbTable.dbColumns.length; i++)
		{
			var col = dbTable.dbColumns[i];
			var prop = new Property();
			prop.name = col.name;
			prop.dbColumn = col;
			model.addProperty(prop);
		}
		return model;
	}
	,
	addDataModel: function (model)
	{
		this.currentProject.addDataModel(model);
	}
	,
	updateDataModel: function (model)
	{
		this.currentProject.updateDataModel(model);
	}
	,
	removeDataModel: function (id)
	{
		this.currentProject.removeDataModel(id);
	}
	,
	getDataModel: function(id)
	{
		this.currentProject.getDataModel(id);
	}
	,
	getDataModelByName: function(name)
	{
		this.currentProject.getDataModelByName(name);
	}
	,
	getAllDataModels: function()
	{
		return this.currentProject.dataModels;
	}
	,
	addBusinessModel: function (model)
	{
		this.currentProject.addBusinessModel(model);
	}
	,
	updateBusinessModel: function (model)
	{
		this.currentProject.updateBusinessModel(model);
	}
	,
	removeBusinessModel: function (id)
	{
		this.currentProject.removeBusinessModel(id);
	}
	,
	getBusinessModel: function(id)
	{
		this.currentProject.getBusinessModel(id);
	}
	,
	getBusinessModelByName: function(name)
	{
		this.currentProject.getBusinessModelByName(name);
	}
	,
	getAllBusinessModels: function()
	{
		return this.currentProject.businessModels;
	}
	,
	addUIModel: function (model)
	{
		this.currentProject.addUIModel(model);
	}
	,
	updateUIModel: function (model)
	{
		this.currentProject.updateUIModel(model);
	}
	,
	removeUIModel: function (id)
	{
		this.currentProject.removeUIModel(id);
	}
	,
	getUIModel: function(id)
	{
		this.currentProject.getUIModel(id);
	}
	,
	getUIModelByName: function(name)
	{
		this.currentProject.getUIModelByName(name);
	}
	,
	getAllUIModels: function()
	{
		return this.currentProject.uiModels;
	}
	,
	getProperty: function( modelName, propertyName)
	{

	}
};

