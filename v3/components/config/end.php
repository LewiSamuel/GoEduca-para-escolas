
<?php
	if(!isset($hideFooter)||!$hideFooter)
	include $APP_PATH_ROOT."/components/footer.php";
?>
	</div>
	<!-- JavaScript -->
	<!-- JQuery -->
	<script src=<?php echo "'".$APP_PATH_VERSION."/src/js/jq.js'"; ?>></script>
	<!-- Hotjar Tracking Code for goeduca.com -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:689009,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- Materizlize JS -->
	<script src=<?php echo "'".$APP_PATH_VERSION."/src/js/materialize.js'"; ?>></script>
	<!-- General Script -->
	<script src=<?php echo "'".$APP_PATH_VERSION."/src/js/script.js'"; ?>></script>
	<!-- Local Script -->
	<?php
		if(isset($hideNav)&&!$hideNav) echo "
	<script src='".$APP_PATH_VERSION."/src/js/nav.js'></script>";
		if(isset($hideFooter)&&!$hideFooter) echo "
	<script src='".$APP_PATH_VERSION."/src/js/footer.js'></script>";
		if(isset($localJS)) echo "
	<script src='".$APP_PATH_VERSION."/src/js/".$localJS.".js'></script>";
		if(!isset($localJS)) echo "<!-- !set -->";
	?>
</body>
</html>