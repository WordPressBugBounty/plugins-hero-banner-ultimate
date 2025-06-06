<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package Buttons With Style Pro
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $wp_version;

// Taking some variables
$prefix						= HBU_META_PREFIX; // Metabox prefix
$banner_type_list			= hbu_banner_type();
$banner_layout_list			= hbu_banner_layout();
$banner_bg_size_list		= hbu_bg_size();
$banner_bg_attachemnt_list	= hbu_bg_attachemnt();
$banner_button_class_list	= hbu_button_type();

// Getting saved values
$banner_type				= get_post_meta( $post->ID, $prefix.'banner_type', true );
$banner_bg_size				= get_post_meta( $post->ID, $prefix.'banner_bg_size', true );
$banner_bg_attachemnt		= get_post_meta( $post->ID, $prefix.'banner_bg_attachemnt', true );
$banner_bg_position			= get_post_meta( $post->ID, $prefix.'banner_bg_position', true );
$banner_padding_top			= get_post_meta( $post->ID, $prefix.'banner_padding_top', true );
$banner_padding_right		= get_post_meta( $post->ID, $prefix.'banner_padding_right', true );
$banner_padding_bottom		= get_post_meta( $post->ID, $prefix.'banner_padding_bottom', true );
$banner_padding_left		= get_post_meta( $post->ID, $prefix.'banner_padding_left', true );
$banner_layout				= get_post_meta( $post->ID, $prefix.'banner_layout', true );
$banner_bg_color			= get_post_meta( $post->ID, $prefix.'banner_bg_color', true );
$banner_video_url			= get_post_meta( $post->ID, $prefix.'banner_video_url', true );
$banner_vmvideo_url			= get_post_meta( $post->ID, $prefix.'banner_vmvideo_url', true );
$banner_image_url			= get_post_meta( $post->ID, $prefix.'banner_image_url', true );
$banner_ovelay_color		= get_post_meta( $post->ID, $prefix.'banner_ovelay_color', true );
$banner_ovelay_opacity		= get_post_meta( $post->ID, $prefix.'banner_ovelay_opacity', true );
$banner_title_color			= get_post_meta( $post->ID, $prefix.'banner_title_color', true );
$banner_content_color		= get_post_meta( $post->ID, $prefix.'banner_content_color', true );
$banner_title_fontsize		= get_post_meta( $post->ID, $prefix.'banner_title_fontsize', true );
$banner_subtitle_fontsize	= get_post_meta( $post->ID, $prefix.'banner_subtitle_fontsize', true );
$banner_button_one_name		= get_post_meta( $post->ID, $prefix.'banner_button_one_name', true );
$banner_button_one_link		= get_post_meta( $post->ID, $prefix.'banner_button_one_link', true );
$banner_button_two_name		= get_post_meta( $post->ID, $prefix.'banner_button_two_name', true );
$banner_button_two_link		= get_post_meta( $post->ID, $prefix.'banner_button_two_link', true );
$banner_wrap_width			= get_post_meta( $post->ID, $prefix.'banner_wrap_width', true );
$banner_button_one_class	= get_post_meta( $post->ID, $prefix.'banner_button_one_class', true );
$banner_button_two_class	= get_post_meta( $post->ID, $prefix.'banner_button_two_class', true );

$banner_bgcolor_style	= '';
$banner_image_style		= 'style = "display:none"';
$banner_video_style		= 'style = "display:none"';
$banner_bggran_style	= '';

if($banner_type == 'bgcolor' || $banner_type == '') {
	$banner_bgcolor_style	= 'style = "display:table"';
	$banner_image_style		= 'style = "display:none"';
	$banner_video_style		= 'style = "display:none"';
} elseif($banner_type == 'image') {
	$banner_image_style		= 'style = "display:table"';
	$banner_video_style		= 'style = "display:none"';
	$banner_bgcolor_style	= 'style = "display:none"';
}  elseif($banner_type == 'video') {
	$banner_video_style		= 'style = "display:table"';
	$banner_image_style		= 'style = "display:none"';
	$banner_bgcolor_style	= 'style = "display:none"';
}  elseif($banner_type == 'bgcolor_image') {
	$banner_image_style		= 'style = "display:table"';
	$banner_bgcolor_style	= 'style = "display:table"';
	$banner_video_style		= 'style = "display:none"';
} elseif($banner_type == 'video_image') {
	$banner_video_style 	= 'style = "display:table"';
	$banner_image_style 	= 'style = "display:table"';
	$banner_bgcolor_style 	= 'style = "display:none"';
} ?>
<table class="form-table hbupro-post-sett-tbl">
	<tbody>
		<!-- Layout -->
		<tr valign="top">
			<th scope="row">
				<label for="hbupro-banner-layout"><?php esc_html_e('Select Banner Layout', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<select name="<?php echo esc_attr($prefix); ?>banner_layout" class="hbupro-select-box banner-layout" id="hbupro-banner-layout">
					<?php
					if( ! empty( $banner_layout_list)) {
						foreach ( $banner_layout_list as $key => $value ) {
							echo '<option value="'.esc_attr($key).'" '.selected( $banner_layout,$key ).'>'.esc_attr($value).'</option>';
						}
					}
					?>
				</select>
				<br/>
				<span class="description"><?php esc_html_e('Select banner layout', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<!-- banner button text -->
		<tr valign="top">
			<th scope="row">
				<label for="banner-btn-type"><?php esc_html_e('Banner Type', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<select name="<?php echo esc_attr($prefix); ?>banner_type" class="hbupro-select-box banner-btn-type" id="banner-btn-type">
					<?php
					if( ! empty( $banner_type_list )) {
						foreach ( $banner_type_list as $key => $value ) {
							echo '<option value="'.esc_attr($key).'" '.selected( $banner_type,$key ).'>'.esc_attr($value).'</option>';
						}
					}
					?>
				</select>
				<br/>
				<span class="description"><?php esc_html_e('Select on click type ie where user going to click.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<!-- Simple button settings -->
		<tr valign="top">
			<td colspan="2" class="hbupro-no-padding">

				<!-- Bg Color-->
				<table class="form-table hbupro-bgcolor" <?php echo $banner_bgcolor_style; ?>>
					<tr>
						<th scope="row">
							<label for="hbupro-bgcolor"><?php esc_html_e('Banner Background Color', 'hero-banner-ultimate'); ?>:</label>
						</th>
						<td>
							<input type="text" value="<?php echo esc_attr($banner_bg_color); ?>" id="hbupro-bgcolor" name="<?php echo esc_attr($prefix); ?>banner_bg_color" class="hbupro-color-box" /><br/>
							<span class="description"><?php esc_html_e('Select banner background color.', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>

					<tr class="hbupro-feature">
						<th>
							<label><?php esc_html_e('Select Background Color Type ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></span>
							</label>
						</th>
						<td>
							<select name="<?php echo esc_attr($prefix); ?>color_type" class="hbupro-select-box" disabled="">
								<option ><?php esc_html_e('Plain Color', 'hero-banner-ultimate'); ?></option>
							</select><br/>
							<!-- <span class="description"><?php // esc_html_e('Select background color type.', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
							<span class="description"><?php esc_html_e('Select background color type.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
						</td>
					</tr>

					<tr class="hbupro-feature">	

						<th scope="row">
							<label><?php esc_html_e('Gradient Color Position ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
						</th>
						<td>
							<select name="<?php echo $prefix;?>banner_gradient_position" class="hbupro-select-box" disabled="">
								<option ><?php esc_html_e('Left to Right', 'hero-banner-ultimate'); ?></option>
							</select><br />
							<!-- <span class="description"><?php //esc_html_e('Gradient Color Position. This option works in background color option Gradient Color.', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
							<span class="description"><?php esc_html_e('Gradient Color Position. This option works in background color option Gradient Color.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
						</td>
					</tr>
				</table>

				<!-- Image URL-->
				<table class="form-table hbupro-image" <?php echo $banner_image_style; ?> >

					<tr>
						<th>
							<?php esc_html_e('Upload Image','');?>
						</th>
						<td>
							<input type="text" name="<?php echo esc_attr($prefix).'banner_image_url';?>" value="<?php echo esc_url($banner_image_url);?>" id="banner-default-img" class="regular-text banner-default-img banner-img-upload-input" />
							<input type="button" name="banner_default_img" class="button-secondary banner-img-uploader" value="<?php esc_html_e( 'Upload Image', 'hero-banner-ultimate'); ?>" />
							<input type="button" name="popu_default_img_clear" id="banner-default-img-clear" class="button button-secondary banner-image-clear" value="<?php esc_html_e( 'Clear', 'hero-banner-ultimate'); ?>" /> <br />
							<span class="description"><?php esc_html_e( 'Upload banner button image.','hero-banner-ultimate' ); ?></span>
							<?php
								$default_img = '';
								if( !empty($banner_image_url)) { 
									$default_img = '<img src="'.esc_url($banner_image_url).'" alt="" />';
								}
							?>
							<div class="banner-imgs-preview"><?php echo $default_img; ?></div>
						</td>
					</tr>
					<!-- Image Bg size -->
					<tr valign="top">
						<th scope="row">
							<label for="banner-bg-size"><?php esc_html_e('Background Image Size', 'hero-banner-ultimate'); ?></label>
						</th>
						<td class="row-meta">
							<select name="<?php echo esc_attr($prefix);?>banner_bg_size" class="hbupro-select-box" id="banner-bg-size">
								<?php
								if( !empty($banner_bg_size_list) ) {
									foreach ($banner_bg_size_list as $key => $value) {
										echo '<option value="'.esc_attr($key).'" '.selected($banner_bg_size,$key).'>'.esc_attr($value).'</option>';
									}
								}
								?>
							</select>
							<br/>
							<span class="description"><?php esc_html_e('Select bacground image size.', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>
					<!-- Image Bg Attachment -->
					<tr valign="top">
						<th scope="row">
							<label for="banner-bg-attachemnt"><?php esc_html_e('Background Image Attachment', 'hero-banner-ultimate'); ?></label>
						</th>
						<td class="row-meta">
							<select name="<?php echo esc_attr($prefix); ?>banner_bg_attachemnt" class="hbupro-select-box" id="banner-bg-attachemnt">
								<?php
								if( !empty($banner_bg_attachemnt_list) ) {
									foreach ($banner_bg_attachemnt_list as $key => $value) {
										echo '<option value="'.esc_attr($key).'" '.selected($banner_bg_attachemnt,$key).'>'.esc_attr($value).'</option>';
									}
								}
								?>
							</select>
							<br/>
							<span class="description"><?php esc_html_e('Select bacground image attachment.', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>
					<!-- Image Bg position -->
					<tr valign="top">
						<th scope="row">
							<label for="banner-bg-position"><?php esc_html_e('Background Image Left & Right Position', 'hero-banner-ultimate'); ?></label>
						</th>
						<td class="row-meta">
							<input type="number" id="banner-bg-position" name="<?php echo esc_attr($prefix); ?>banner_bg_position" value="<?php echo esc_attr($banner_bg_position); ?>" min="0" max="100" step="1" class="regular-text" placeholder="<?php esc_html_e(' Range: 0 to 100', 'hero-banner-ultimate'); ?>" /> % <br/>
							<span class="description"><?php esc_html_e('Set the background image position level. Range: 0 to 100 in %.', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>
				</table>
				<!-- Video URL-->
				<table class="form-table hbupro-video" <?php echo $banner_video_style;?>>
					<tr>
						<th><label for=""><?php esc_html_e('Video Url','hero-banner-ultimate');?></label></th>
						<td class="row-meta">
							<input type="text" name="<?php echo esc_attr($prefix);?>banner_video_url"  value="<?php echo esc_attr($banner_video_url); ?>" class="large-text" placeholder="<?php esc_html_e('eg. wuY3TAeixus', 'hero-banner-ultimate'); ?>" /><br/>
							<span class="description"><?php esc_html_e('You Tube eg wuY3TAeixus', 'hero-banner-ultimate'); ?></span>
						</td>
						<td class="row-meta">
						OR
						</td>
						<td class="row-meta">
							<input type="text" name="<?php echo esc_attr($prefix);?>banner_vmvideo_url"  value="<?php echo esc_attr($banner_vmvideo_url); ?>" class="large-text" placeholder="<?php esc_html_e('eg. 187799034', 'hero-banner-ultimate'); ?>" /><br/>
							<span class="description"><?php esc_html_e('vimeo eg 187799034', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>
					<tr class="hbupro-feature">

						<th>
							<label><?php esc_html_e('Upload Poster ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
						</th>
						<td class="row-meta">
							<input type="text" class="regular-text banner-default-img banner-img-upload-input" name="<?php echo esc_attr($prefix).'banner_poster_url';?>" disabled="" />
							<input type="button" name="banner_default_img" class="button-secondary" value="<?php esc_html_e( 'Upload Poster', 'hero-banner-ultimate'); ?>" disabled="" />
							<input type="button" class="button button-secondary" name="popu_default_poster_clear" value="<?php esc_html_e( 'Clear', 'hero-banner-ultimate'); ?>" disabled="" /><br />
							<!-- <span class="description"><?php // esc_html_e('Upload Video Poster image.', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
							<span class="description"><?php esc_html_e('Upload Video Poster image.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
						</td>
					</tr>

				</table>	
			</td>
		</tr>
		<tr valign="top" style="border-bottom:1px solid #ddd;">
			<th scope="row" colspan="2"><h3 style="padding-bottom:0px;margin-bottom:0px;"><?php esc_html_e('Banner Setting', 'hero-banner-ultimate'); ?></h3></th>
		</tr>

		<!-- banner Wrap Width -->
		<tr valign="top">
			<th scope="row">
				<label for="hbupro-banner-warp-width"><?php esc_html_e('Banner Inner Wrap Width', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<input type="number" name="<?php echo esc_attr($prefix);?>banner_wrap_width" id="hbupro-banner-warp-width" value="<?php echo esc_attr($banner_wrap_width); ?>" class="regular-text" placeholder="<?php esc_html_e('1024', 'hero-banner-ultimate'); ?>" /> px <br/>
				<span class="description"><?php esc_html_e('Enter banner inner warp width in PX', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<!-- Title Size -->
		<tr valign="top">
			<th scope="row">
				<label for="hbupro-banner-title-size"><?php esc_html_e('Title Font Size', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<input type="number" name="<?php echo esc_attr($prefix);?>banner_title_fontsize" id="hbupro-banner-title-size" value="<?php echo esc_attr($banner_title_fontsize); ?>" class="regular-text" placeholder="<?php esc_html_e('30', 'hero-banner-ultimate'); ?>" /> px <br/>
				<span class="description"><?php esc_html_e('Enter title font size in PX', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>

		<tr class="hbupro-feature">
			<th>
				<label><?php esc_html_e('Uppercase Title ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
			</th>
			<td>
				<input type="checkbox" name="<?php echo esc_attr($prefix);?>banner_title_upper" value="Title Uppercase" disabled="" /><br />
				<!-- <span class="description"><?php //esc_html_e('Check to Display Title Text on UPPERCASE', 'hero-banner-ultimate'); ?></span><?php //echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
				<span class="description"><?php esc_html_e('Check to Display Title Text on UPPERCASE.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
			</td>
		</tr>
		<!-- SubTitle Size -->
		<tr valign="top">
			<th scope="row">
				<label for="hbupro-banner-subtitle-size"><?php esc_html_e('Sub Title Font Size', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<input type="number" name="<?php echo esc_attr($prefix);?>banner_subtitle_fontsize" id="hbupro-banner-subtitle-size" value="<?php echo esc_attr($banner_subtitle_fontsize); ?>" class="regular-text" placeholder="<?php esc_html_e('18', 'hero-banner-ultimate'); ?>" /> px <br/>
				<span class="description"><?php esc_html_e('Enter sub title font size in PX', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>

		<tr class="hbupro-feature">
			<th>
				<label><?php esc_html_e('Uppercase Sub Title ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
			</th>
			<td>
				<input type="checkbox" name="<?php echo esc_attr($prefix);?>banner_title_upper" value="Title Uppercase" disabled="" /><br />
				<!-- <span class="description"><?php // esc_html_e('Check to Display Subtitle Text on UPPERCASE', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
				<span class="description"><?php esc_html_e('Check to Display Subtitle Text on UPPERCASE.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
			</td>
		</tr>

		<!-- Banner Padding -->	
		<tr valign="top">
			<th scope="row">
				<label for="hbupro-banner-padding"><?php esc_html_e('Banner Inner Padding', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<table id="hbupro-banner-padding">
					<tr>
						<td class="hbupro-no-padding-left">
						<input type="text" name="<?php echo esc_attr($prefix); ?>banner_padding_top" id="hbupro-banner-subtitle-size" value="<?php echo esc_attr($banner_padding_top); ?>" class="medium-text" placeholder="<?php esc_html_e('100px OR 30%', 'hero-banner-ultimate'); ?>" /> <br/>
						<span class="description"><?php esc_html_e('Top', 'hero-banner-ultimate'); ?></span>
						</td>
						<td class="hbupro-no-padding-left">
						<input type="text" name="<?php echo $prefix;?>banner_padding_right" id="hbupro-banner-subtitle-size" value="<?php echo $banner_padding_right; ?>" class="medium-text" placeholder="<?php esc_html_e('100px OR 30%', 'hero-banner-ultimate'); ?>" /> <br/>
						<span class="description"><?php esc_html_e('Right', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>
					<tr>
						<td class="hbupro-no-padding-left">
						<input type="text" name="<?php echo esc_attr($prefix); ?>banner_padding_bottom" id="hbupro-banner-subtitle-size" value="<?php echo esc_attr($banner_padding_bottom); ?>" class="medium-text" placeholder="<?php esc_html_e('100px OR 30%', 'hero-banner-ultimate'); ?>" /> <br/>
						<span class="description"><?php esc_html_e('Bottom', 'hero-banner-ultimate'); ?></span>
						</td>
						<td  class="hbupro-no-padding-left">
						<input type="text" name="<?php echo esc_attr($prefix);?>banner_padding_left" id="hbupro-banner-subtitle-size" value="<?php echo esc_attr($banner_padding_left); ?>" class="medium-text" placeholder="<?php esc_html_e('100px OR 30%', 'hero-banner-ultimate'); ?>" />  <br/>
						<span class="description"><?php esc_html_e('Left', 'hero-banner-ultimate'); ?></span>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<!-- banner overlay -->
		<tr valign="top" style="border-bottom:1px solid #ddd;">
			<th scope="row" colspan="2"><h3 style="padding-bottom:0px;margin-bottom:0px;"><?php esc_html_e('Banner Color Setting', 'hero-banner-ultimate'); ?></h3></th>
		</tr>
		<!-- Title Color -->
		<tr>
			<th scope="row">
					<label for="hbupro-banner-title-color"><?php esc_html_e('Title Color', 'hero-banner-ultimate'); ?>:</label>
			</th>
			<td>
				<input type="text" value="<?php echo esc_attr($banner_title_color); ?>" id="hbupro-banner-title-color" name="<?php echo esc_attr($prefix); ?>banner_title_color" class="hbupro-color-box" /><br/>
				<span class="description"><?php esc_html_e('Select title color.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<!-- Content Color -->
		<tr>
			<th scope="row">
					<label for="hbupro-banner-content-color"><?php esc_html_e('Content Color', 'hero-banner-ultimate'); ?>:</label>
			</th>
			<td>
				<input type="text" value="<?php echo esc_attr($banner_content_color); ?>" id="hbupro-banner-content-color" name="<?php echo esc_attr($prefix); ?>banner_content_color" class="hbupro-color-box" /><br/>
				<span class="description"><?php esc_html_e('Select content font color.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<!-- banner overlay -->
		<tr valign="top" style="border-bottom:1px solid #ddd;">
			<th scope="row" colspan="2"><h3 style="padding-bottom:0px;margin-bottom:0px;"><?php esc_html_e('Banner Overlay Setting', 'hero-banner-ultimate'); ?></h3></th>
		</tr>
		<tr>
			<th scope="row">
					<label for="hbupro-overlay-bgcolor"><?php esc_html_e('Banner Overlay Color', 'hero-banner-ultimate'); ?>:</label>
			</th>
			<td>
				<input type="text" value="<?php echo esc_attr($banner_ovelay_color); ?>" id="hbupro-overlay-bgcolor" name="<?php echo esc_attr($prefix);?>banner_ovelay_color" class="hbupro-color-box" /><br/>
				<span class="description"><?php esc_html_e('Select banner overlay background color.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="banner-ovelay-opacity"><?php esc_html_e('Banner Overlay Opacity', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<input type="number" id="banner-ovelay-opacity" name="<?php echo esc_attr($prefix);?>banner_ovelay_opacity" value="<?php echo esc_attr($banner_ovelay_opacity); ?>" min="0" max="1" step="0.1" class="regular-text" placeholder="<?php esc_html_e(' Range: 0 to 1', 'hero-banner-ultimate'); ?>" /><br/>
				<span class="description"><?php esc_html_e('Set the overlay opacity level. Range: 0 to 1.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<!--Buttons-->
		<tr valign="top" style="border-bottom:1px solid #ddd;">
			<th scope="row" colspan="2"><h3 style="padding-bottom:0px;margin-bottom:0px;"><?php esc_html_e('Call to Action Setting', 'hero-banner-ultimate'); ?></h3></th>
		</tr>
		<tr>
			<th><label for="hbupro-button-one-name"><?php esc_html_e('Button - 1 Name','hero-banner-ultimate');?></label></th>
			<td class="row-meta">
				<input type="text" name="<?php echo esc_attr($prefix); ?>banner_button_one_name" id="hbupro-button-one-name" value="<?php echo esc_attr($banner_button_one_name); ?>" class="large-text" placeholder="<?php esc_html_e('Read More', 'hero-banner-ultimate'); ?>" /><br/>
				<span class="description"><?php esc_html_e('Enter button name.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="hbupro-button-one-link"><?php esc_html_e('Button - 1 Link','hero-banner-ultimate');?></label></th>
			<td class="row-meta">
				<input type="text" name="<?php echo esc_attr($prefix); ?>banner_button_one_link" id="hbupro-button-one-link" value="<?php echo esc_url($banner_button_one_link); ?>" class="large-text" placeholder="https://www.essentialplugin.com/" /><br/>	
				<span class="description"><?php esc_html_e('Enter button link url ie.', 'hero-banner-ultimate'); ?> https://www.essentialplugin.com/</span>
			</td>
		</tr>
		<!-- Button class -->
		<tr valign="top">
			<th scope="row">
				<label for="banner-button-class-1"><?php esc_html_e('Button - 1 Class', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<select name="<?php echo esc_attr($prefix); ?>banner_button_one_class" class="hbupro-select-box" id="banner-button-class-1">
					<?php
					if( !empty($banner_button_class_list) ) {
						foreach ($banner_button_class_list as $key => $value) {
							echo '<option value="'.esc_attr($key).'" '.selected($banner_button_one_class, $key).'>'.esc_attr($value).'</option>';
						}
					}
					?>
				</select>
				<br/>
				<span class="description"><?php esc_html_e('Select button class.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="hbupro-button-two-name"><?php esc_html_e('Button - 2 Name','hero-banner-ultimate'); ?></label></th>
			<td class="row-meta">
				<input type="text" name="<?php echo esc_attr( $prefix ); ?>banner_button_two_name" id="hbupro-button-two-name" value="<?php echo esc_attr( $banner_button_two_name ); ?>" class="large-text" placeholder="<?php esc_html_e( 'Read More', 'hero-banner-ultimate' ); ?>" /><br/>
				<span class="description"><?php esc_html_e('Enter button name.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="hbupro-button-two-link"><?php esc_html_e('Button - 2 Link','hero-banner-ultimate');?></label></th>
			<td class="row-meta">
				<input type="text" name="<?php echo esc_attr($prefix);?>banner_button_two_link" id="hbupro-button-two-link" value="<?php echo esc_url($banner_button_two_link); ?>" class="large-text" placeholder="https://www.essentialplugin.com" /><br/>
				<span class="description"><?php esc_html_e('Enter button link url ie.', 'hero-banner-ultimate'); ?> https://www.essentialplugin.com/</span>
			</td>
		</tr>
		<!-- Button class -->
		<tr valign="top">
			<th scope="row">
				<label for="banner-button-class-2"><?php esc_html_e('Button - 2 Class', 'hero-banner-ultimate'); ?></label>
			</th>
			<td class="row-meta">
				<select name="<?php echo esc_attr($prefix);?>banner_button_two_class" class="hbupro-select-box" id="banner-button-class-2">
					<?php
					if( ! empty( $banner_button_class_list )) {
						foreach ($banner_button_class_list as $key => $value) {
							echo '<option value="'.esc_attr($key).'" '.selected( $banner_button_two_class, $key ).'>'.esc_attr($value).'</option>';
						}
					}
					?>
				</select>
				<br/>
				<span class="description"><?php esc_html_e('Select button class.', 'hero-banner-ultimate'); ?></span>
			</td>
		</tr>


		<!-- Start Mobile Setting -->
		<tr valign="top" style="border-bottom:1px solid #ddd;">
			<th scope="row" colspan="2"><h3 style="padding-bottom:0px;margin-bottom:0px;"><?php esc_html_e('Mobile Settings', 'hero-banner-ultimate'); ?></h3></th>
		</tr>

		<tr class="hbupro-feature">
			<th>
				<label><?php esc_html_e('Title Font Size ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
			</th>
			<td>
				<input type="number" name="<?php echo esc_attr($prefix);?>banner_mobile_title_fontsize" class="regular-text" placeholder="<?php esc_html_e('30', 'hero-banner-ultimate'); ?>" disabled="" /> px <br/>
				<!-- <span class="description"><?php // esc_html_e('Enter title font size in PX', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
				<span class="description"><?php esc_html_e('Enter title font size in PX.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
			</td>
		</tr>

		<!-- SubTitle Size -->	
		<tr class="hbupro-feature">
			<th>
				<label><?php esc_html_e('Sub Title Font Size ', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
			</th>
			<td>
				<input type="number" name="<?php echo esc_attr($prefix);?>banner_mobile_subtitle_fontsize" class="regular-text" placeholder="<?php esc_html_e('18', 'hero-banner-ultimate'); ?>" disabled="" /> px <br/>
				<!-- <span class="description"><?php // esc_html_e('Enter sub title font size in PX', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
				<span class="description"><?php esc_html_e('Enter sub title font size in PX.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
			</td>
		</tr>

		<tr class="hbupro-feature">
			<th scope="row">
				<label for="banner-bg-size"><?php esc_html_e('Background Image Size', 'hero-banner-ultimate'); ?><span class="hbupro-tag"><?php esc_html_e('PRO','hero-banner-ultimate');?></label>
			</th>
			<td class="row-meta">
				<select name="<?php echo esc_attr($prefix);?>banner_mobile_bg_size" class="hbupro-select-box" disabled="">
					<option value=""><?php esc_html_e('Cover', 'hero-banner-ultimate'); ?></option>
				</select>
				<br/>
				<!-- <span class="description"><?php //esc_html_e('Select bacground image size for mobile.', 'hero-banner-ultimate'); ?></span><?php // echo sprintf( __( ' Upgrade to <a href="%s" target="_blank">Premium Version</a> to get this option.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?> -->
				<span class="description"><?php esc_html_e('Select bacground image size for mobile.', 'hero-banner-ultimate'); ?></span> <strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'hero-banner-ultimate'), HBU_PLUGIN_LINK_UNLOCK); ?></strong>
			</td>
		</tr>

	</tbody>
</table><!-- end .hbupro-post-sett-tbl -->