Ext.application({
    name: 'new_routes',
    launch: function() {
     Ext.create('Ext.container.Viewport', {
     layout:'border',
		defaults: {
			collapsible: true,
			split: true,
			bodyStyle: 'padding:15px'
		},
		items: [{
			title: 'Trip Details',
			region: 'south',
			height: 250,
			minSize: 75,
			maxSize: 250,
			cmargins: '5 0 0 0'
		},{
			title: 'Trips',
			region:'west',
			margins: '5 0 0 0',
			cmargins: '5 5 0 0',
			width: 675,
			minSize: 400,
			maxSize: 650
		},{
			title: 'Basic Features',
			collapsible: false,
			region:'center',
			margins: '5 0 0 0', 
			xtype:'tabpanel',
			items:[ 
				   {title:'Patients' },
				   {title:'Destinations'},
				   {title:'Destination Categories'},
				   {title:'Special Requirements'},
				   {title:'Transportations'},
				   {title:'Drivers'},
				  ]
			
		}]
				});
			}
});
	var result = Ext.define('results', {
	extend: 'Ext.data.Model',
	fields: ['id', 'name', 'position', 'ambition']
	});
	
	var store = Ext.create('Ext.data.Store', {
	model: 'results',
	proxy: {
	type: 'ajax',
	url : 'data.php',
	reader: {
	type: 'json',
	model: 'results'
	}
	},
	autoLoad: true
	});
	
	
	
	// create the grid
	var grid = Ext.create('Ext.grid.Panel', {
		store: store,
		columns: [
			{id:'id',header: 'ID', width: 30, sortable: true, dataIndex: 'id'},
			{header: 'Name', width: 100, dataIndex: 'name'},
			{header: 'Position', width: 100, dataIndex: 'position'},
			{header: 'Ambition', width: 250, dataIndex: 'ambition'}
		],
		stripeRows: true,
		height:180,
		width:480,
		renderTo: 'grid-example',
		title:'Straw Hats Crew'
	});
