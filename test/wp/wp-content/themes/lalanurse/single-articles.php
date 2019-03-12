<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

							<?php if(have_posts()): while(have_posts()): the_post(); ?>
							
							<?php
								$isRecruit = False;
								$terms = get_the_terms($post->ID, 'contents');
								foreach ($terms as $term) {
									$contents = array("name" => $term->name,"slug" => $term->slug,"taxo" => $term->taxonomy);
								}
								$terms = get_the_terms($post->ID, 'target');
								if (!empty($terms)) {
									foreach ($terms as $term) {
										$target = array("name" => $term->name,"slug" => $term->slug,"taxo" => $term->taxonomy);
									}
								}
								if (strpos(post_custom("is-recruit"), 'true') !== false){
									$isRecruit = True;
									$terms = get_the_terms($post->ID, 'pref');
									foreach ($terms as $term) {
										$pref = array("name" => $term->name,"slug" => $term->slug,"taxo" => $term->taxonomy);
									}
									$terms = get_the_terms($post->ID, 'company');
									foreach ($terms as $term) {
										$company = array("name" => $term->name,"slug" => $term->slug,"taxo" => $term->taxonomy);
									}
								}
							?>
							<nav class="posmenu">
								<div class="contentswidth">
									<?php if($isRecruit): ?>
									<a href="/">ホーム</a> &gt; <a href="/articles">求人情報</a> &gt; <h1><?php echo esc_html($pref['name']).' '.esc_html($company['name']).'の求人情報'; ?></h1>
									<?php else: ?>
									<a href="/">ホーム</a> &gt; <a href="/articles">キャリアコラム</a> &gt; <h1><?php the_title(); ?></h1>
									<?php endif; ?>
								</div>
							</nav>

							<?php
							if ( has_post_thumbnail() ) {
								$thumbnail_id = get_post_thumbnail_id();
								$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
								$eye_img_src = $eye_img[0];
							}
							else {
								$eye_img_src = "/common_2017/img/dummy.jpg";
							}
							?>
							<header id="contentsheaderblock" class="contentsheader" style="background:url('<?php echo esc_html("$eye_img_src") ?>') center center no-repeat; background-size: cover;">
								<div class="contentswidth">
									<p class="contentsheader-header"><?php the_title(); ?></p>
									<?php if($isRecruit) {echo '<span>'.esc_html($company['name']).'</span>';} ?>
									<span><?php echo get_the_date('Y.m.d'); ?></span>
								</div>
							</header>

							<div class="contentsbody detail-label">
								<div class="contentswidth">
									<div class="detail-label__category">
										<a href="<?php echo esc_html($contents['taxo'] . '/' . esc_html($contents['slug'])) ?>"><span class="listitem__label catlabel-<?php echo esc_html($contents['taxo']) ?>"><?php echo esc_html($contents['name']) ?></span></a>
										<a href="<?php echo esc_html($target['taxo'] . '/' . esc_html($target['slug'])) ?>"><span class="listitem__label catlabel-<?php echo esc_html($target['taxo']) ?>"><?php echo esc_html($target['name']) ?></span></a>
										<?php if($isRecruit): ?>
											<a href="<?php echo esc_html($pref['taxo'] . '/' . esc_html($pref['slug'])) ?>"><span class="listitem__label catlabel-<?php echo esc_html($pref['taxo']) ?>"><?php echo esc_html($pref['name']) ?></span></a>
											<a href="<?php echo esc_html($company['taxo'] . '/' . esc_html($company['slug'])) ?>"><span class="listitem__label catlabel-<?php echo esc_html($company['taxo']) ?>"><?php echo esc_html($company['name']) ?></span></a>
										<?php endif; ?>
									</div>
									<div class="detail-label__sns">
										<div class="snsbox">
											<a href="https://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" ><img src="/common_2017/img/sns-facebook.png" alt="Facebook共有ボタン"></a>
											<a href="http://twitter.com/share?url=<?php echo get_the_permalink(); ?>" target="_blank"><img src="/common_2017/img/sns-twitter.png" alt="Twitter共有ボタン"></a>
											<a href="http://b.hatena.ne.jp/entry/<?php echo get_the_permalink(); ?>" target="_blank"><img src="/common_2017/img/sns-hatena.png" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple" alt="はてなブックマーク共有ボタン"></a>
										</div>
									</div>
								</div>
							</div>

							<div class="contentsbody detail-content">
								<div class="contentswidth">
									<?php echo get_post_field('post_content',$post->ID) ?>
										<div class="snsbox">
											<a href="https://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" ><img src="/common_2017/img/sns-facebook.png" alt="Facebook共有ボタン"></a>
											<a href="http://twitter.com/share?url=<?php echo get_the_permalink(); ?>" target="_blank"><img src="/common_2017/img/sns-twitter.png" alt="Twitter共有ボタン"></a>
											<a href="http://b.hatena.ne.jp/entry/<?php echo get_the_permalink(); ?>" target="_blank"><img src="/common_2017/img/sns-hatena.png" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple" alt="はてなブックマーク共有ボタン"></a>
										</div>
								</div>
							</div>
							
							<?php if($isRecruit): ?>
							<?php get_post($post->ID); ?>
							<div class="contentsbody detail-recruit">
								<div class="contentswidth">
									<h2 class="contentsh1">求人概要</h2>
									<h3 class="contentsh2"><?php echo esc_html($company['name']) ?></h3>
									<div class="detail-recruit__data">
										<table class="datatable2">
											<tbody>
												<tr>
													<th>募集職種</th>
													<td><?php echo nl2br(post_custom("recruit-job")); ?></td>
												</tr>
												<tr>
													<th>所在地・勤務地</th>
													<td><?php echo nl2br(post_custom("recruit-area")); ?></td>
												</tr>
												<tr>
													<th>雇用形態</th>
													<td><?php echo nl2br(post_custom("recruit-parttime")); ?></td>
												</tr>
												<tr>
													<th>勤務時間</th>
													<td><?php echo nl2br(post_custom("recruit-time")); ?></td>
												</tr>
												<tr>
													<th>年収・給与条件</th>
													<td><?php echo nl2br(post_custom("recruit-guarantee")); ?></td>
												</tr>
												<?php if(post_custom('recruit-sub1title')): ?>
												<tr>
													<th><?php echo post_custom("recruit-sub1title"); ?></th>
													<td><?php echo nl2br(post_custom("recruit-sub1contents")); ?></td>
												</tr>
												<?php endif; ?>
												<?php if(post_custom('recruit-sub2title')): ?>
												<tr>
													<th><?php echo post_custom("recruit-sub2title"); ?></th>
													<td><?php echo nl2br(post_custom("recruit-sub2contents")); ?></td>
												</tr>
												<?php endif; ?>
												<?php if(post_custom('recruit-sub3title')): ?>
												<tr>
													<th><?php echo post_custom("recruit-sub3title"); ?></th>
													<td><?php echo nl2br(post_custom("recruit-sub3contents")); ?></td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
									<div class="detail-recruit__contactbtn button--brown"><a href="#" class="button">この求人に問い合わせる</a></div>
								</div>
							</div>
							<?php endif; ?>

							<div class="contentsbody detail-share">
								<div class="contentswidth">
									<div class="sharebox sharebox<?php if(is_mobile()): ?>-line<?php else: ?>-fb<?php endif; ?>">
										<div class="detail-share__image"><img src="<?php echo esc_html("$eye_img_src") ?>" width="470" alt=""/></div>
										<?php if(is_mobile()): ?>
										<p class="detail-share__text">この記事が気に入ったら、<br>
										あなたの周りにいる看護師のご友人・<br>
										ご家族にもぜひ教えてあげてください。</p>
										<div class="line-it-button" data-lang="ja" data-type="share-a" data-url="http://lalanurse.net" style="display: none;"></div>
										<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
										<?php else: ?>
										<p class="detail-share__text">この記事が気に入ったら<br>
										いいね！しよう</p>
										<div class="fb-like" data-href="https://www.facebook.com/lalanurse.net" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
										<p class="detail-share__text">最新情報をお届けします</p>
										<?php endif; ?>
										<!--<div class="detail-share__button"><a href="#" class="button button--line">LINEで共有</a></div>-->
										<p class="detail-share__renew">LALANURSEは毎週水曜日更新です。</p>
									</div>
								</div>
							</div>

							<?php endwhile; endif; ?>
							<?php wp_reset_postdata(); ?>

<?php get_footer();
