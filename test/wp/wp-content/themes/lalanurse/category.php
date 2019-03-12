<?php
/*
Template Name: 研修会一覧ページテンプレート
*/

get_header(); ?>

							<nav class="posmenu">
								<div class="contentswidth">
									<a href="/">ホーム</a> &gt; <span>セミナー・研修会情報</span>
								</div>
							</nav>
              
							<header id="contentsheaderblock" class="contentsheader">
								<div class="contentswidth">
									<h1 class="contentsheader-header">セミナー・研修会情報</h1>
								</div>
							</header>

							<div class="contentsbody seminar-list">
								<div class="contentswidth">
									<div class="searchbox">
										<p>絞り込み</p>
										<ul>
											<li class="head catlabel-pref">地域</li>
											<?php
												$args = array(
													'type'                     => 'post',
													'child_of'                 => 0,
													'parent'                   => '',
													'orderby'                  => 'id',
													'order'                    => 'ASC',
													'hide_empty'               => 1,
													'hierarchical'             => 1,
													'exclude'                  => '',
													'include'                  => '',
													'number'                   => '',
													'taxonomy'                 => 'category',
													'pad_counts'               => false 
												); 
												$categories = get_categories( $args );
												foreach ($categories as $category) {
													echo '<li><a href="' . esc_html($category->slug) . '">' . esc_html($category->name) . '</a></li>';
												}
											?>
										</ul>
									</div>
									<ul class="seminarlist">
										<?php
										$paged = (int) get_query_var('paged');
										$now = date_format(date_create(),"Y-m-d");
										$cats = get_the_category();
										foreach ($cats as $cat) {
											$cat_slug = $cat->slug;
										}
										$args = array(
											'posts_per_page' => 9,
											'paged' => $paged,
											'meta_query' => array(
												array(
													'key'	=> 'wpcf-date',
													'value'	=> $now,
													'compare' => '>',
													'type' => 'DATE',
												)
											),
											'meta_key' => 'wpcf-date',
											'orderby' => 'meta_value',
											'order' => 'ASC',
											'post_type' => 'post',
											'tax_query' => array(
												'relation' => 'AND', array(
													'taxonomy' => 'category',
													'field' => 'slug',
													'terms' => $cat_slug
												)
											),
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
									</ul>
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
										<?php wp_reset_postdata(); ?>
								</div>
							</div>
							
							<div class="contentsbody seminarbox">
								<div class="contentswidth">
									<p><span>研修会開催団体の方は、研修会情報を投稿できます。</span></p>
									<div class="seminarbox__allposts">
										<a href="/press" class="button button--white"><span>研修会情報を投稿する</span></a>
									</div>
								</div>
							</div>

							<?php require_once('common_2017/bannerblock.php'); ?>

<?php get_footer();
