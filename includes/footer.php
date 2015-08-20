	</div> <!-- end main area -->

	<!-- bootstrap -->	
	<script src="../js/bootstrap.min.js"></script>
		
	<script>
	$(document).ready(function() {

		$(window).scroll( function() {
			var myscroll = $(this).scrollTop();
			var menuHeight = $('.navbar').height();

			if ( myscroll > 0) {
				$('#header_area').css('padding-top', menuHeight + 'px');
				$('#header_top').addClass('fixed-menu');
				
			} else {
				$('#header_top').removeClass('fixed-menu');
				$('#header_area').css('padding-top', '0px');
			};
		});

		if ($(window).scroll() > 0) {
			$('#header_area').css('padding-top', menuHeight + 'px');
			$('#header_top').addClass('fixed-menu');
		};
	});	
	</script>	
		
</body>
</html>