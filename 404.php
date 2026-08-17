<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package grandeur-shinohara
 */

get_header();
?>
<main class="main">
	<div class="container">
		<section class="page-404">
			<h1 class="page-404__title">お探しのページは存在しません。</h1>
			<h2 class="page-404__subtitle">ご迷惑をおかけしております</h2>
			<p>申し訳ありませんが、お探しのページが見つかりませんでした。一時的にリンク切れが生じている可能性があります。
				お手数ですが、前のページにお戻りいただくか、下のメニューからご覧になりたいページをお探しください。 </p>
			<?php // トップに戻るボタン ?>
			<a href="<?php echo esc_url(home_url('/')); ?>">トップページにお戻りになる方はこちらからどうぞ<div </div>
				</div>
		</section>
		<section class="contact">
			<?php get_template_part('template-parts/contact-info'); ?>
		</section>
	</div>
</main>
<?php
get_footer();