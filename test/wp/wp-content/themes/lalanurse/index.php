<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

							<div class="home-topimage">
								<div class="contentswidth">
									<div class="home-topimage__text">
										<img src="img/home-maincaption1.png" alt="看護師の５年後の"/><img src="img/home-maincaption2.png" alt="キャリアを考える"/>
										<p>LALANURSEは、ナースのキャリア形成のお手伝いをするメディアです。<br class="nowrap">
										コラムや求人、セミナー情報など、役立つ情報を定期的にお届けします。</p>
									</div>
								</div>
							</div>

							<div class="contentsbody home-column">
								<div class="contentswidth">
									<ul class="columnlist">
										<?php
										$args = array(
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
										<?php wp_reset_postdata(); ?>
									</ul>
									<div class="home-column__schedule">
										<p>毎週水曜日更新<span>※第5水曜日の更新はおやすみです。</span></p>
									</div>
								</div>
							</div>

							<div class="contentsbody home-seminar seminarbox">
								<div class="contentswidth">
									<header>
										<h2><img src="img/seminarh2.png" width="377" alt="セミナー・研修会情報"/></h2>
										<p><span>キャリアアップに役立つ<br>セミナー情報を掲載しています。</span></p>
									</header>
									<ul class="seminarlist">
										<?php
										$args = array(
											'posts_per_page' => 3,
											'post_type' => 'post',
											'orderby' => 'date',
											'order' => 'DESC',
											'post_status' => 'publish'
										);
										$the_query = new WP_Query($args);
										if ( $the_query->have_posts() ) :
											while ( $the_query->have_posts() ) : $the_query->the_post();
										?>
										<li class="listitem">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="listitem__excerpt"><?php echo post_custom("wpcf-lead"); ?></div>
											<table class="listitem__table datatable1">
												<tbody>
													<tr>
														<th>開催日</th>
														<td><?php echo date("Y年m月d日", strtotime(post_custom("wpcf-date"))); ?></td>
													</tr> 
													<tr>
														<th>開催地</th>
														<td><?php the_category(', '); ?></td>
													</tr>
												</tbody>
											</table>
											<div class="listitem__button button--brown"><a href="<?php the_permalink(); ?>" class="button">詳しく見る</a></div>
										</li>
										<?php endwhile; endif; ?>
										<?php wp_reset_postdata(); ?>
									</ul>
									<div class="seminarbox__allposts">
										<a href="seminar" class="button button--white"><span>すべての情報を見る</span></a>
									</div>
								</div>
							</div>
							
							<?php require_once('common_2017/bannerblock.php'); ?>

<?php get_footer();
