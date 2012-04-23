define([
	'jquery',
	'underscore',
	'backbone',
	'model/contactModel'
	],
	function($, _, Backbone, UserModel) {
		var contactCollection = Backbone.Collection.extend({
			model: UserModel,

			url: '/quaero',

			findAll: function onFindAll() {
				this.find('/contact');
			},

			findBySearch: function onFindBySearch(param) {
				this.find('/contact/search/q/'+param);
			},

			find: function find(api) {
				var self = this;
				$.ajax({
						url: self.url + api,
						dataType:"json",
						success:function (data) {
							self.reset(data);
						}
				});
			}
		});

		return new contactCollection;
	});

