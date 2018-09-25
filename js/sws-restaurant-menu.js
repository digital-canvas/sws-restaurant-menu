(function () {
	var menus;
	tinymce.create('tinymce.plugins.swsmenu', {
		init: function (ed, url) {
			ed.addButton('swsmenu', {
				title: 'Restaurant Menu',
				icon: 'swsmenuicon dashicons-carrot',
				onclick: function () {

					var openWindow = function(editor, menus){
						editor.windowManager.open({
							title: 'Insert Restaurant Menu',
							body: [{
								type: 'listbox',
								name: 'menu',
								label: 'Menu',
								values: menus
							}],
							onsubmit: function (e) {
								ed.insertContent('[restaurant-menu id="' + e.data.menu + '"]');
							}
						});
					};

					if (menus === undefined) {
						jQuery.post(ajaxurl, {
							'action': 'sws_restaurant_menu_menus'
						}, function (response) {
							menus = response;
							openWindow(ed, menus);
						}, 'json');
					} else {
						openWindow(ed, menus);
					}
				}
			});
		},
		createControl: function (n, cm) {
			return null;
		},
		getInfo: function () {
			return {
				longname: "Restaurant Menu",
				author: 'Digital Canvas',
				authorurl: 'http://www.digitalcanvas.com',
				infourl: '',
				version: "1.0"
			};
		}
	});
	tinymce.PluginManager.add('swsmenu', tinymce.plugins.swsmenu);
})();
