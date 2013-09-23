Ext.onReady(function() {
					 
	// make sample array data
	// create the data store
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

});
