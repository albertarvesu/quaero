define([
	'jquery',
	'underscore',
	'backbone',
	'collection/userCollection',
	'text!templates/user/list.html'
	],
	function($, _, Backbone, userCollection, usersListTemplate) {
		var usersListView = Backbone.View.extend({

			el: ".user-search",
			timeout: null,

			initialize: function onInitialize() {
				userCollection
					.bind("reset", this.render, this)
					.findAll();
			},

			events:{
				"keyup .search-query":"search"
			},

			search: function onSearch(event) {
				var self = this;
				var target = event.target;
				var value = $(target).val();

				if(self.timeout) {
					clearTimeout(self.timeout);
				}

				self.timeout = setTimeout(function() {
					userCollection.findBySearch(value);
				}, 100);
			},

			render: function onRender(users) {
				$(this.el)
					.find(".search-results")
					.html( _.template(usersListTemplate, {"data":users}) )
			}
		});
		return new usersListView;
	});
