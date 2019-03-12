<?php
/*
Template Name: 記事一覧ページテンプレート
*/

get_header(); ?>

							<nav class="posmenu">
								<div class="contentswidth">
									<a href="/">ホーム</a> &gt; <span>掲載記事一覧</span>
								</div>
							</nav>

							<header id="contentsheaderblock" class="contentsheader">
								<div class="contentswidth">
									<h1 class="contentsheader-header">掲載記事一覧</h1>
								</div>
							</header>

							<div class="contentsbody recruit-column">
								<div class="contentswidth">
									<div class="searchbox">
										<p>絞り込み</p>
										<ul>
											<li class="head catlabel-contents">種類</li>
											<?php
												$contents = get_terms('contents');
												foreach ($contents as $content) {
													echo '<li><a href="/' . esc_html($content->taxonomy) . '/' . esc_html($content->slug) . '">' . esc_html($content->name) . '</a></li>';
												}
											?>
											<li class="head catlabel-pref">地域</li>
											<?php
												$prefs = get_terms('pref');
												foreach ($prefs as $pref) {
													echo '<li><a href="/' . esc_html($pref->taxonomy) . '/' . esc_html($pref->slug) . '">' . esc_html($pref->name) . '</a></li>';
												}
											?>
											<li class="head catlabel-company">団体</li>
											<?php
												$companies = get_terms('company');
												foreach ($companies as $company) {
													echo '<li><a href="/' . esc_html($company->taxonomy) . '/' . esc_html($company->slug) . '">' . esc_html($company->name) . '</a></li>';
												}
											?>
											<li class="head catlabel-target">職種</li>
											<?php
												$targets = get_terms('target');
												foreach ($targets as $target) {
													echo '<li><a href="/' . esc_html($target->taxonomy) . '/' . esc_html($target->slug) . '">' . esc_html($target->name) . '</a></li>';
												}
											?>
										</ul>
									</div>
									<ul class="columnlist">
										<?php
										$paged = (int) get_query_var('paged');
										$args = array(
											'paged' => $paged,
											'posts_per_page' => 9,
											'post_type' => 'articles',
											'orderby' => 'date',
											'order' => 'DESC',
											'post_status' => 'publish'
										);
										$the_query = new WP_Query($args);
										if ( $the_query->have_posts() ) :
											while ( $the_query->have_posts() ) : $the_query->the_post();
										?>
										<li class="listitem">
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
											<a href="<?php the_permalink(); ?>" style="background:url(<?php echo $eye_img_src; ?>) center; background-size:cover;">
											<div class="listitem__header">
												<div class="listitem__labels">
													<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
													<?php
														$contents = get_the_terms($post->ID, 'contents');
														foreach ($contents as $content) {
															echo '<span class="listitem__label catlabel-'. esc_html($content->taxonomy). '">' . esc_html($content->name) . '</span>';
															if ($content->term_id == 7) { //求人情報なら
																$prefs = get_the_terms($post->ID, 'pref');
																foreach ($prefs as $pref) {
																	echo '<span class="listitem__label catlabel-'. esc_html($pref->taxonomy). '">' . esc_html($pref->name) . '</span>';
																}
																$companies = get_the_terms($post->ID, 'company');
																foreach ($companies as $company) {
																	echo '<span class="listitem__label catlabel-'. esc_html($company->taxonomy). '">' . esc_html($company->name) . '</span>';
																}
															}
														}
														$targets = get_the_terms($post->ID, 'target');
														foreach ($targets as $target) {
															echo '<span class="listitem__label catlabel-'. esc_html($target->taxonomy). '">' . esc_html($target->name) . '</span>';
														}
													?>
												</div>
											<h3 class="listitem__title"><?php the_title(); ?></h3>
											</div>
										</a></li>
										<?php endwhile; endif; ?>
									</ul>
									<div class="home-column__schedule">
										<p>毎週水曜日更新<span>※第5水曜日の更新はおやすみです。</span></p>
									</div>
									<div class="wp-pagenavi">
										<?php
										if ($the_query->max_num_pages > 1) {
											echo paginate_links(array(
												'base' => get_pagenum_link(1) . '%_%',
												'format' => '?paged=%#%',
												'current' => max(1, $paged),
												'total' => $the_query->max_num_pages
											));
										}
										?>
									</div>
  								</div>
							</div>
							<?php wp_reset_postdata(); ?>

							<?php require_once('common_2017/bannerblock.php'); ?>

<?php get_footer();
