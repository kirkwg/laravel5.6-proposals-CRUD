(function ($) {
    $.fn.ColorPanel = function (options) {
        var settings = $.extend({
            styleSheet: '#cpswitch'
            , colors: {
                '#1abc9c': 'skins/default.css'
                , '#2980b9': 'skins/blue.css'
                , '#c0392b': 'skins/red.css'
            , }
            , linkClass: 'linka'
            , animateContainer: false
        }, options);
        var panelDiv = this;
		
		$('#cpToggle').click(function(e){
			e.preventDefault();
			 $('ul',panelDiv).slideToggle();
		});
		
		//var CssFile = '/css/default.css';
		//var lastColorTheme = CssFile;
        var colors = settings.colors || null;
        if (colors) {
            $.each(colors, function (key, value) {
                var li = $("<li/>");
                var e = $("<a />", {
                    href: value
                    , "class": settings.linkClass, // you need to quote "class" since it's a reserved keyword
                }).css('background-color', key);
                li.append(e);
                $(panelDiv).find('ul').append(li);
            });
		
		
		
		
            $('ul',panelDiv).on('click', 'a', function (e) {
                e.preventDefault();
                var CssFile = $(this).attr('href') || '/css/dafault.css';
				
                if (settings.animateContainer) {
					                  console.log("**jquery.colorpanel.js::Inside animateCon > cssfile > " +  CssFile);
									  /* e.g. return:  http://127.0.0.1:8000/css/default.css */
									  // Store CssFile into the localStorage
									  localStorage.setItem('myColorTheme', CssFile );
									  console.log("**jquery.colorpanel.js::Stored 'myColorTheme' to localStorage: " + CssFile);
									  
										  
                    $(settings.animateContainer).fadeOut(function () {
                        $(settings.styleSheet).attr('href', CssFile);
                        // And then:
                        $(this).fadeIn();
                    });									
                                      							  
                }
                else {
					
                    $(settings.styleSheet).attr('href', lastColorTheme);
                }
            });
        }
    };
}(jQuery));