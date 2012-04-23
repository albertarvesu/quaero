define([
	'jquery',
	'underscore',
	'backbone',
	'view/contactList'
], function($, _, Backbone, UserListView) {
	var AppRouter = Backbone.Router.extend({
		routes: {
			'': 'start'
		},

		start: function onStart() {
		}
	});

	var initialize = function(){
		var app_router = new AppRouter;
		Backbone.history.start();
	};

	return {
		initialize: initialize
	};
});
