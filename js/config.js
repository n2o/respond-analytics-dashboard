// create a namespace for plugins
if(typeof plugin == "undefined" || !plugin) {
	var plugin = {};
}

// the type of plugin must match the JS singleton (e.g. respond_analytics_dashboard) name
plugin.respond_analytics_dashboard = {

	showUpdate:true, // shows/hides the submit button
	pageUniqId:null,
	pluginUniqId:null,

	// initialize plugin
	init:function(pageUniqId, pluginUniqId){

		plugin.respond_analytics_dashboard.pageUniqId = pageUniqId;
		plugin.respond_analytics_dashboard.pluginUniqId = pluginUniqId;

		$('#respond_analytics_dashboard-var1').val($('#'+plugin.respond_analytics_dashboard.pluginUniqId).data('var1'));

	},

	// handles the click of the submit button
	update:function(el){

		// an easy way to pass data to your plugin is to set data-[var] attributes
		$('#'+plugin.respond_analytics_dashboard.pluginUniqId).data('var1', $('#respond_analytics_dashboard-var1').val());

		// show a success message when you are done
		message.showMessage('success', 'Plugin updated successfully');

		// returning true will automatically close the dialog
		return true;
	}

}
