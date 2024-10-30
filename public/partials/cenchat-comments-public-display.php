<?php
/**
 * Provide a public area view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link https://cenchat.com
 * @since 0.0.2
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/public/partials
 */
$cenchat_id = get_option( 'cenchat_id' );
$cenchat_id_value = isset( $cenchat_id ) ? esc_attr( $cenchat_id ) : '';
$cenchat_start_chat_button_text_color = get_option( 'cenchat_start_chat_button_text_color' );
$cenchat_start_chat_button_text_color_value = isset( $cenchat_start_chat_button_text_color ) ? esc_attr( $cenchat_start_chat_button_text_color ) : '';
$cenchat_start_chat_button_background_color = get_option( 'cenchat_start_chat_button_background_color' );
$cenchat_start_chat_button_background_color_value = isset( $cenchat_start_chat_button_background_color ) ? esc_attr( $cenchat_start_chat_button_background_color ) : '';
$page_id = get_the_ID();
$page_id_value = isset( $page_id ) ? esc_attr( $page_id ) : '';
?>

<button
    id="cenchat-widget-button"
    data-site-id="<?php echo esc_attr( $cenchat_id_value ); ?>"
    data-page-id="<?php echo esc_attr( $page_id_value ); ?>"
    style="display: none; fill: <?php echo esc_attr( $cenchat_start_chat_button_text_color_value ); ?>; background-color: <?php echo esc_attr( $cenchat_start_chat_button_background_color_value ); ?>"
>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.604 25.4">
        <title>Cenchat</title>

        <g transform="translate(-26.256 -180.92)">
            <path d="M43.113 180.92q3.676 0 6.095 1.163 2.465 1.163 2.465 2.977 0 .79-.512 1.442-.511.605-1.302.605-.605 0-.977-.186-.326-.186-.93-.605-.28-.28-.884-.651-.559-.28-1.582-.465-1.023-.187-1.86-.187-2.42 0-4.28 1.117-1.862 1.116-2.885 3.117-1.023 1.954-1.023 4.373 0 2.465.977 4.42 1.023 1.953 2.837 3.07 1.815 1.116 4.14 1.116 2.42 0 3.908-.744.326-.187.884-.605.465-.372.791-.558.372-.187.884-.187.93 0 1.442.605.558.558.558 1.489 0 .977-1.256 1.954-1.21.93-3.303 1.535-2.047.605-4.42.605-3.535 0-6.233-1.629-2.698-1.674-4.187-4.559-1.442-2.93-1.442-6.512 0-3.582 1.535-6.467 1.536-2.93 4.28-4.559 2.745-1.674 6.28-1.674z"/>
            <circle cx="29.431" cy="203.145" r="3.175"/>
        </g>
    </svg>
</button>
