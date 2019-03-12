			<?php 
			$bannerList = array(
				"tlc-ikejiri" => array("img" => "tlc-ikejiri.jpg", "name" => "トータルライフケア訪問看護ステーション池尻大橋", "url" => "http://recruit-tlc.com/"),
				"tlc-yoga" => array("img" => "tlc-yoga.jpg", "name" => "トータルライフケア訪問看護ステーション用賀", "url" => "http://recruit-tlc.com/"),
				"tlc-shinnakano" => array("img" => "tlc-shinnakano.jpg", "name" => "トータルライフケア訪問看護ステーション新中野", "url" => "http://recruit-tlc.com/"),
				"fussmedi" => array("img" => "fussmedi.png", "name" => "FUSSMEDI", "url" => "http://www.fussmedi.net/"),
				"generous" => array("img" => "generous.png", "name" => "株式会社ジェネラス", "url" => "http://www.generous.co.jp/"),
				"bluepoppy" => array("img" => "bluepoppy.jpg", "name" => "訪問看護ステーションブルーポピー", "url" => "http://www.wellness-kango.co.jp/"),
				"tamagawa" => array("img" => "tamagawa.png", "name" => "日産玉川病院", "url" => "http://www.tamagawa-nurse.com/"),
				"smilecare" => array("img" => "smilecare.jpg", "name" => "訪問看護・デイサービス・ケアプラン スマイルケア", "url" => "http://www.smile1165.jp/"),
				"kanaerulink" => array("img" => "kanaerulink.jpg", "name" => "かなえるリハビリ訪問看護ステーション", "url" => "http://www.kanaerulink.co.jp/"),
				"sakairehab" => array("img" => "sakairehab.jpg", "name" => "さかいリハ訪問看護ステーション", "url" => "http://www.reha.co.jp/"),
				"fussmedi" => array("img" => "fussmedi.png", "name" => "FUSSMEDI", "url" => "http://www.fussmedi.net/"),
				"wakokai" => array("img" => "wakokai.jpg", "name" => "和光会グループ", "url" => "http://www.wakokai.or.jp/"),
				"tlc" => array("img" => "tlc.jpg", "name" => "株式会社トータルライフケア", "url" => "http://recruit-tlc.com/")
			);
			$banner1 = array();
			$banner2 = array();
			$banner3 = array();
			function make_banner_arr($arrList,$target){ 		//指定した列を取り出す関数を定義
				$arrTarget = array();							//指定した列を格納する配列を用意
				foreach($arrList as $key => $value){ 			//第1引数の配列からキーを値として一つずつ取り出すループ
					if($key == $target){ 						//配列のキーが$target(関数の第２引数)と一致したら
						$arrTarget = $value; 					//$arrTargetに格納する
					}
				}
				return $arrTarget;								//指定した列が格納された配列を返す
			}
			if ( is_home() ){
				/* トップページに表示するバナー */
				$banner1 = make_banner_arr($bannerList,"generous");
				$banner2 = make_banner_arr($bannerList,"bluepoppy");
				$banner3 = make_banner_arr($bannerList,"fussmedi");
			} elseif ( is_page('seminar') ){
				/* 研修会一覧ページに表示するバナー */
				$banner1 = make_banner_arr($bannerList,"tamagawa");
				$banner2 = make_banner_arr($bannerList,"smilecare");
				$banner3 = make_banner_arr($bannerList,"tlc");
			} else {
				/* 記事一覧ページに表示するバナー */
				// $banner1 = make_banner_arr($bannerList,"kanaerulink");
				$banner1 = make_banner_arr($bannerList,"tlc");
				$banner2 = make_banner_arr($bannerList,"sakairehab");
				$banner3 = make_banner_arr($bannerList,"wakokai");
			}
			?>
			<div class="contentsbody bannerlist home-bannerlist">
				<div class="contentswidth">
					<div class="banner"><a href="<?php echo esc_html($banner1['url']) ?>" target="_blank"><img src="/img/banner/<?php echo esc_html($banner1['img']) ?>" width="320" alt="<?php echo esc_html($banner1['name']) ?>へのリンクバナー"/></a></div>
					<div class="banner"><a href="<?php echo esc_html($banner2['url']) ?>" target="_blank"><img src="/img/banner/<?php echo esc_html($banner2['img']) ?>" width="320" alt="<?php echo esc_html($banner2['name']) ?>へのリンクバナー"/></a></div>
					<div class="banner"><a href="<?php echo esc_html($banner3['url']) ?>" target="_blank"><img src="/img/banner/<?php echo esc_html($banner3['img']) ?>" width="320" alt="<?php echo esc_html($banner3['name']) ?>へのリンクバナー"/></a></div>
				</div>
				<?php require_once('common_2017/adsense2box.php'); ?>
				<?php require_once('common_2017/fbpagebox.php'); ?>
        
        
        <div class="contentswidth">
					<div class="banner"><a href="/inquiry-recruit/"><img src="/common_2017/img/bunner_interview.jpg" width="530" alt="インタビュー求人情報"/></a></div>
					<div class="banner"><a href="/jobpost/"><img src="/common_2017/img/bunner_sending.jpg" width="530" alt="どなたでもできる求人投稿"/></a></div>
        </div>
        
			</div>
