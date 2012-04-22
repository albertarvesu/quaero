define([
	'jquery',
	'underscore',
	'backbone',
	'model/userModel'
	],
	function($, _, Backbone, UserModel) {
		var userCollection = Backbone.Collection.extend({
			model: UserModel,

			url: '/quaero',

			findAll: function onFindAll() {
				this.find('/user');
			},

			findBySearch: function onFindBySearch(param) {
				this.find('/user/search/q/'+param);
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

		return new userCollection;
	});

