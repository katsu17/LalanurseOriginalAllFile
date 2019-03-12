		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->
		<meta name="keywords" content="看護師">
		<?php if(is_front_page()): ?>
		<meta name="description" content="LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。">
		<meta property="og:title" content="<?php echo wp_get_document_title(); ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://lalanurse.net">
		<meta property="og:image" content="https://lalanurse.net/img/ogp.png">
		<meta property="og:description" content="LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。">
		<?php elseif(is_singular('articles')): ?>
		<meta name="description" content="<?php echo my_description(); ?>">
		<meta property="og:title" content="<?php echo the_title(); ?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
		<meta property="og:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>">
		<meta property="og:description" content="<?php echo my_description(); ?>">
		<?php elseif(is_single()): ?>
		<meta name="description" content="<?php if (!empty(post_custom('wpcf-lead'))) { echo post_custom("wpcf-lead"); } else { echo esc_html('LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。'); } ?>">
		<meta property="og:title" content="<?php echo the_title(); ?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
		<meta property="og:image" content="<?php if (!empty(post_custom('wpcf-image'))) { echo wp_get_attachment_url($attachment_id=post_custom('wpcf-image')); } else { echo esc_html('https://lalanurse.net/img/ogp.png'); } ?>">
		<meta property="og:description" content="<?php if (!empty(post_custom('wpcf-lead'))) { echo post_custom("wpcf-lead"); } else { echo esc_html('LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。'); } ?>">
		<?php else: ?>
		<meta name="description" content="LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。">
		<meta property="og:title" content="<?php echo wp_get_document_title(); ?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
		<meta property="og:image" content="https://lalanurse.net/img/ogp.png">
		<meta property="og:description" content="LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。">
		<?php endif; ?>
		<meta property="og:site_name" content="LALANURSE(ララナース)">
		<meta property="fb:app_id" content="1477585108983544">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="/common_2017/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="/common_2017/img/favicon.ico" type="image/vnd.microsoft.ico">
		<link rel="icon" href="/common_2017/img/favicon.png" type="image/png">
		<link rel="stylesheet" href="/common_2017/css/import.css">
		<script src="https://www.days.ne.jp/lib/website-template/js/modernizr-2.8.3.min.js"></script>
		<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="//www.days.ne.jp/lib/support-util/support-util.js"></script>
		<script src="//www.days.ne.jp/lib/colorbox/jquery.colorbox-min.js"></script>
		<script src="/common_2017/js/init.js"></script>
		<meta name="format-detection" content="telephone=no">
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-100212322-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-1554747425116353",
			enable_page_level_ads: true
		  });
		</script>
