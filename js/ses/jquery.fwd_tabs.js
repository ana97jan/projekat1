(function ( $ ) {
	$.fn.fwd_tabs = function() {
		return this.each(function() {
			var tabs = $(this);
			var tabMenuList = $(".tab-menu", tabs).children();

			for (i = $(".tab-content", tabs).length, j = tabMenuList.length; i < j; i++ ) {
				tabs.append('<div class="tab-content"></div>');
	    		}

			var tabContent = $(".tab-content", tabs);

			tabContent.slice(1).hide();

			tabMenuList.eq(0).addClass("active");

			tabMenuList.find("a").click(function(e) {
				var theParent = $(this).parent().index();

				tabMenuList.removeClass('active').eq(theParent).addClass('active');

				tabContent.hide().eq(theParent).show();

				if (tabContent.eq(theParent).html().length == 0 && $(this).attr("href").substr(0, 1) != "#") {
					var fragment = ($(this).data("fragment") ? " " + $(this).data("fragment") : "");
					tabContent.eq(theParent).append('<div class="tab-loading"></div>').load($(this).attr("href") + fragment, function(response, status, xhr) {
						if (status == "error") {
							tabContent.eq(theParent).html("Sorry, the content could not be loaded");
						}
					});
				}
				e.preventDefault();
			});
		});
	}
}(jQuery));