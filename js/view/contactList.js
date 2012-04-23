define([
	'jquery',
	'underscore',
	'backbone',
	'collection/contactCollection',
	'text!templates/contact/list.html'
	],
	function($, _, Backbone, contactCollection, contactsListTemplate) {
		var contactsListView = Backbone.View.extend({

			el: ".contact-search",
			timeout: null,

			initialize: function onInitialize() {
				contactCollection
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
					contactCollection.findBySearch(value);
				}, 100);
			},

			render: function onRender(contacts) {
				$(this.el)
					.find(".search-results")
					.html( _.template(contactsListTemplate, {"data":contacts}) )
			}
		});
		return new contactsListView;
	});
