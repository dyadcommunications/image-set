<?php

/**
 * 
 * Image Set Block Template.
 * Use Dyad Image Block for indivudual images
 *
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = "image-set";
$block_styles = "";
if (!empty($block['className'])) {
	$classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
	$classes .= sprintf(' align%s', $block['align']);
}

// Create id attribute allowing for custom "anchor" value.
$id = $block['id'] . '';
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}
if (get_field('fade_in') == true) $classes .= " fade-in";

$block_styles .= get_field('margin-top') ? "--margin-top:" . get_field('margin-top')  . "em;" : "";
$block_styles .= get_field('images_gap') ? "--image-set-gap:" . get_field('images_gap')  . "em;" : "";


// Image Options
$distribute_images = get_field('distribute_images');
if ($distribute_images == "is-even") {
	$classes .= " " . $distribute_images;
	$even_padding_top = get_field('row_ratio') ?? NULL;
	$block_styles .= $even_padding_top ? "--row-padding:" . $even_padding_top . "%;" : "";
}
$allowed_blocks = array('acf/dyad-image');

$template = array(
	array(
		'acf/dyad-image',
		array(
			'placeholder' => __('locale'),
			'align'       => 'center',
			'level'       => '2',
		),
	)
);
?>

<div id="<?= esc_attr($id); ?>" class="<?php echo $classes; ?>" style="<?= $block_styles ?>">
	<InnerBlocks className="image-set-innerblock acf-innerblocks-container" orientation="horizontal" allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
</div>