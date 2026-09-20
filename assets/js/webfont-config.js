(function () {
	'use strict';

	window.WebFontConfig = {
		google: {
			families: ['Noto+Sans+JP']
		},
		active: function () {
			window.sessionStorage.setItem('fonts', 'true');
		}
	};
}());
