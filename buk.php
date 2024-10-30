<?php
/**
 * Plugin Name: BUK for WordPress
 * Plugin URI: https://www.buk.app
 * Description: Online booking software for your business. With your own-branded booking page your clients can easily see if you're available and make appointments on the fly. Access your online calendar, manage your appointments and notify your clients with unlimited automatic reminders via SMS and email. With the plugin you can add a buk.app shortcode to your WordPress site.   
 * Version: 1.0.7
 * Author: Untold Ventures
 * Author URI: https://www.uvstudio.co
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: buk-appointments
 */

add_shortcode('buk', 'render_buk_iframe');

function render_buk_iframe($atts) {
    if ($atts['slug']) {
        $iframe = "<iframe id=\"buk-frame\" scrolling=\"no\" src=\"https://{$atts['slug']}.buk.pt?header=false&footer=false&wordpress=true\" height=\"200\" width=\"100%\" style=\"border:none;\"></iframe>";

        $script = '<script>';
        $script .= "window.addEventListener('message', receiveMessage, false);";
        $script .= 'function receiveMessage(evt) {';
        $script .= "if (evt && evt.data && evt.data.name === 'buk_wordpress' && evt.data.height) {";
        $script .= 'var iframe = document.getElementById("buk-frame"); iframe.height = evt.data.height + 20;';
        $script .= '}';
        $script .= '}';
        $script .= '</script>';

        return $iframe . $script;
    }
    return;
}




