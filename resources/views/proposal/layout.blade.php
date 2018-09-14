<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.6 Proposal App</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"/>
	<!-- jQuery ColorPanel css, i.e. for color-theme switching feature -->
	<link href="{{ asset('css/jquery.colorpanel.css') }}"  rel="stylesheet">
	
	<!-- default css setting = bootstrap 4 above + this default.css -->
    <link href="{{ asset('css/default.css') }}" id="cpswitch" rel="stylesheet"/>
</head>
<body>
<!-- vertical wrapper/icons for displaying the color-theme panel-->
<div id="wrapper">
    <div id="colorPanel" class="colorPanel" >
        <a id="cpToggle" href="#" title="color theme selection"></a>
        <ul></ul>
    </div>
</div>

<div class="container">
    <hr>
    @yield('content')
</div>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous">
  /* integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" */
  </script>
<script src="{{ asset('js/jquery.colorpanel.js') }}"> </script>

<script>
$(document).ready(function(){
        $('#colorPanel').ColorPanel({
            styleSheet: '#cpswitch',
            animateContainer:  '#wrapper',
			linkClass: 'linka',
			// theme selections
             colors: {				 
                '#808080': '{{ asset("css/gray.css") }}',        // gray theme
                '#ADD8E6': '{{ asset("css/lightblue.css") }}' ,  // lightblue theme  #ADD8E6
				'#2F4F4F': '{{ asset("css/dark.css") }}' ,       // darkslategray  #2F4F4F
                '#FFFAFA': '{{ asset("css/default.css") }}' ,   // default = bootstrap      
              }
        });
		var lastColorTheme = localStorage.getItem('myColorTheme');
		console.log("**layout.blade::get lastColorTheme > " + lastColorTheme); 
		
		/* when switching to a new page: 
		   Init page's theme with the last color theme chosen! */
		if (lastColorTheme)
		    $("#cpswitch").attr("href", lastColorTheme);   
		else $("#cpswitch").attr("href", '{{ asset("css/default.css") }}' ); 


});        
</script>



