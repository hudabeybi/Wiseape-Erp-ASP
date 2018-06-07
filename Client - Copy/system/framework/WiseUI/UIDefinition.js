var UIJson =
{
	controls: 
	[

		{	type: "row", width: "100%", 
			controls:
			[
				{ type: "textbox", id:"txt-FirstName", label: "First Name", dataField: "firstName" },
				{ type: "textbox", id:"txt-LastName", label: "Last Name", dataField: "lastName" }
			]
		}
		,
		{	type: "row", width: "100%", 
			controls:
			[
				{	type: "radio", id:"radGender", label: "Gender", dataField: "Gender.IdGender", 
					dataSource: [
						{ IdGender: "1", GenderName: "Pria" },
						{ IdGender: "2", GenderName: "Wanita" }
					], 
					dataSourceInfo: { valueField: "IdGender", displayField: "GenderName"  } }
			]
		}
		,
		{	type: "row", width: "100%", 
			controls:
			[
				{	type: "combobox", id:"cmbDept", label: "Department", dataField: "Department.IdDepartment", 
					dataSourceInfo: { valueField: "IdDepartment", displayField: "DepartmentName"  }, onchange: "setDepartmentName()" },
				{	type: "textbox", id:"txt-DepartmentName", label: "", dataField: "lastName" }
			]
		}
		,
		{
			type: "row", width: "100%",
			controls: 
			[
				{	id: "gridEmployee", type: "grid", columns: 
					[ 
						{ dataField: "IdEmployee", dataType: "number", label: "Id", width: "0" }, 
						{ dataField: "FirstName", dataType: "string", label: "First Name", width: "100" }, 
						{ dataField: "LastName", dataType: "string", label: "Last Name", width: "100" }, 
					] 
				}
			]
		}
		,
		{
			type: "row", width: "100%", 
			controls:
			[
				{ id: "btnSave", type: "button", label: "Save", onclick: "save" },
				{ id: "btnClose", type: "button", label: "Close", onclick: "close" }
			]
		}
	]
	
}





