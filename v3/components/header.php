<?php
	require_once $APP_PATH_ROOT."/components/config/action-global.php";

	if(!isset($pgLang)) 				$pgLang 				= "pt-br";
	//general metaTags
	if(!isset($meta_robots)) 			$meta_robots 			= "index,follow";
	if(!isset($meta_title)) 			$meta_title 			= "Go Educa: educação sem limites";
	if(!isset($meta_keywords)) 			$meta_keywords		 	= "goeduca, go educa, educação";
	if(!isset($meta_description)) 		$meta_description 		= "Plataforma de conteúdo educativo. Acesse e se surpreenda.";
	if(!isset($meta_image)) 			$meta_image 			= ""; //logo go educa
	//OG (Facebook)
	if(!isset($meta_type)) 				$meta_type 				= "website";
	// // if(!isset($meta_url)) 				$meta_url 				= $currentLink;
	if(!isset($meta_siteName)) 			$meta_siteName 			= "Go Educa";
	if(!isset($meta_admins)) 			$meta_admins 			= "1679914192023599";
	//Twitter
	if(!isset($meta_twitterUser)) 		$meta_twitterUser 		= "@goeducaoficial"; //@twitterUser
	if(!isset($meta_twitterAuthor)) 	$meta_twitterAuthor 	= "@goeducaoficial"; //@twitterAuthor
	//GooglePlus
	if(!isset($meta_gPProfile)) 		$meta_gPProfile 		= "website"; // https://plus.google.com/[Google+_Profile]/posts
	if(!isset($meta_gPPageProfile)) 	$meta_gPPageProfile 	= "website"; // https://plus.google.com/[Google+_Page_Profile]

	//Favicon
	if(!isset($srcFavicon)) 			$srcFavicon 			= $APP_PATH_VERSION."/src/img/goeduca-favicon.png"; // src favicon.ico
?>

<!DOCTYPE html>
<html lang="pt-br"> 
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109599054-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-109599054-1');
	</script>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<meta name="robots" 				content	= <?php echo "'".$meta_keywords."'"; ?> />
	<title>										  <?php echo $meta_title; ?></title><!-- 50a60 -->

	<!-- Meta -->
	<meta name="description" 			content	= <?php echo "'".$meta_description."'"; ?> /> <!-- <155 -->
	<meta name="keywords" 				content	= <?php echo "'".$meta_keywords."'"; ?> />
	<!-- OG -->
	<meta property="og:title" 			content	= <?php echo "'".$meta_title."'"; ?>/>
	<meta property="og:type" 			content	= <?php echo "'".$meta_type."'"; ?>/>
	<!-- <meta property="og:url" 			content	= <?php //echo "'".$meta_url."'"; ?>/> -->
	<meta property="og:image" 			content	= <?php echo "'".$meta_image."'"; ?>/>
	<meta property="og:description" 	content	= <?php echo "'".$meta_description."'"; ?>/>
	<meta property="og:site_name" 		content	= <?php echo "'".$meta_siteName."'"; ?>/>
	<meta property="fb:admins" 			content	= <?php echo "'".$meta_admins."'"; ?>/>
	<!-- Twitter Card -->
	<meta name="twitter:card" 			content = "summary"/>
	<meta name="twitter:site" 			content	= <?php echo "'".$meta_twitterUser."'"; ?>/> <!-- @twitterUser -->
	<meta name="twitter:title" 			content	= <?php echo "'".$meta_title."'"; ?>/>
	<meta name="twitter:description" 	content	= <?php echo "'".$meta_description."'"; ?>/> <!-- <200 -->
	<meta name="twitter:creator" 		content	= <?php echo "'".$meta_twitterAuthor."'"; ?>/> <!-- @twitterAuthor -->
	<meta name="twitter:image" 			content	= <?php echo "'".$meta_image."'"; ?>/>
	<!-- Schema.org markup - Google+ -->
	<meta itemprop="name" 				content = <?php echo "'".$meta_title."'"; ?>/>
	<meta itemprop="description" 		content = <?php echo "'".$meta_description."'"; ?>/>
	<meta itemprop="image" 				content = <?php echo "'".$meta_image."'"; ?>/>
	<!-- Google Authorship & Publisher Markup -->
	<link rel="author" 					href	= "https://plus.google.com/[Google+_Profile]/posts"/>
	<link rel="publisher" 				href	= "https://plus.google.com/[Google+_Page_Profile]"/>

	<!-- Favicon -->
	<link href=<?php echo "'".$srcFavicon."'"; ?> rel="shortcut icon" type="image/x-icon" />


	<link rel='stylesheet' type='text/css' href=<?php echo "'".$APP_PATH_VERSION."/src/css/dashboard.css'"; ?>>
	
	<!-- CSS  -->
	<!-- GoogleFonts -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
	<!-- MaterializeCss -->
	<link rel="stylesheet"  href=<?php echo "'".$APP_PATH_VERSION."/src/css/materialize.css'"; ?> />
	<!-- Global CSS -->
	<link rel="stylesheet" type="text/css" href=<?php echo "'".$APP_PATH_VERSION."/src/css/style.css'"; ?> />
	<!-- Local CSS -->

	<link rel='stylesheet' type='text/css' href=<?php echo "'".$APP_PATH_VERSION."/src/css/content-goeduca-para-escolas.css'"; ?>  >
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php
		if(isset($hideNav)&&!$hideNav) echo "
	<link rel='stylesheet' type='text/css' href='".$APP_PATH_VERSION."/src/css/nav.css'/>";
		if(isset($hideNav)&&!$hideFooter) echo "
	<link rel='stylesheet' type='text/css' href='".$APP_PATH_VERSION."/src/css/footer.css'/>";
		if(isset($localCss)) echo "
	<link rel='stylesheet' type='text/css' href='".$APP_PATH_VERSION."/src/css/".$localCss.".css'>";
	?>
</head>
<body>
	<?php include $APP_PATH_ROOT."/components/preloader.php"; ?>
	<div class="loaded hide">
		<?php
			if(!isset($hideNav)||!$hideNav)
				include $APP_PATH_ROOT."/components/nav.php";
		?>