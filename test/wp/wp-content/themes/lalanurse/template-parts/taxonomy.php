<?php
/*
Template Name: 記事一覧ページテンプレート
*/

get_header(); ?>

							<nav class="posmenu">
								<div class="contentswidth">
									<a href="/">ホーム</a> &gt; <span>求人情報一覧</span>
								</div>
							</nav>

							<header id="contentsheaderblock" class="contentsheader">
								<div class="contentswidth">
									<h1 class="contentsheader-header">求人情報一覧</h1>
								</div>
							</header>

							<div class="contentsbody recruit-column">
								<div class="contentswidth">
									<div>絞り込み</div>
									<ul class="columnlist">
										<?php
										$tax_slug = $wp_query->get_queried_object();
										$tax_slug2 = $tax_slug->slug;
										print_r($term);
										$paged = (int) get_query_var('paged');
										$args = array(
											'paged' => $paged,
											'posts_per_page' => 9,
											'post_type' => 'articles',
											'tax_query' => array(
												'taxonomy' => $tax_slug2,
												'field' => 'slug',
												'terms' => $term
											),
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
														$terms = get_the_terms($post->ID, 'contents');
														foreach ($terms as $term) {
															echo '<span class="listitem__label catlabel-column">' . esc_html($term->name) . '</span>';
														}
													?>
												</div>
											<h3 class="listitem__title"><?php the_title(); ?></h3>
											</div>
										</a></li>
										<?php endwhile; endif; ?>
									</ul>
									<div class="home-column__schedule"><img src="/img/every-thursday.png" alt=""/></div>
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
