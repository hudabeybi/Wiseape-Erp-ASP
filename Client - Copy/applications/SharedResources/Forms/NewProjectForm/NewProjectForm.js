var  NewProjectForm = Class( WiseapeWindow, {
	project: null,
	constructor: function ( app )
	{
		NewProjectForm.$super.call( this, app, "formNewProject", "New Project", app.getPath() + "/Forms/htmls/new-project.html", { width: '70%', height: '550' } );
	}
	,
	onLoad: function(param)
	{
		var me = this;
		this.project = param.project;
		this.app.core.server.execute("connection/search", {}, function (cons){

			var cmb  = me.get("cmbConnection");
			while (cmb.options.length > 0) {                
					cmb.remove(0);
			}  

			var opt = document.createElement("option");
			opt.value = -1;
			opt.text = "------- Select Connection ---------";
			cmb.add(opt);

			for(var i = 0; i < cons.length; i++)
			{
				var con = cons[i];
				var opt = document.createElement("option");
				opt.data = con;
				opt.value = con.ConnectionName;
				opt.text = con.ConnectionName + "(" + con.DbUsername + "@" + con.DbName + "." + con.HostName + ")";
				cmb.add(opt);
			}

			var opt = document.createElement("option");
			opt.value = 0;
			opt.text = "------- Create Connection ---------";
			cmb.add(opt);


		});
	}
	,
	/* Fungsi untuk handle event ketika user pilih item 'Create new connection' */
	onConnectionSelect: function ()
	{
		var me = this;
		
		/* buat object form dari input */
		var form = this.getInputForm("formNewProject");

		/* datapatkan connectionId yang dipilih */
		var selected = form.projectConnectionId;


		/* Jika 'Create new connection' dipilih */
		if(selected == 0)
		{
			/* Jalankan aplikasi  appNewConnection dan panggil command : newConnection, untuk membuat connection baru */
			me.app.runApp("appNewConnection", "newConnection", {}, function (con)
			{
				/* Setelah form aplikasi connection ditutup, kita mendapat data connection yang baru dibuat, set ke combobox */
				$(me.cmbConnection).val(con.ConnectionName);
			});
		}
	}
	,
	/* Event handler ketika button save diclick */
	onBtnSaveClick: function()
	{
		/* Dapatkan data */
		var project = this.setObjectForm("formNewProject", this.project);

		/*Tutup window ini, dan kembalikan object form dari input kepada yang memanggil kita */
		this.close(project, false );
	}
	,
	onBtnCancelClick: function ()
	{
		this.close(false);
	}

});