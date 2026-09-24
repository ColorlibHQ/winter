/**
 * Notice for Elementor
 *
 * Shown once in the Elementor preview: asks whether to switch off Elementor's
 * default colours and fonts in favour of the theme's. No jQuery.
 *
 * @package Winter
 */

/* global winterElementorNotice */

(function () {
	'use strict';

	function init() {

		var style = '<style>.winter-disable-elementor-styling{position:fixed;z-index:9999;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,.8)}.winter-elementor-notice-wrapper{position:fixed;top:50%;left:50%;max-width:380px;border-radius:6px;color:#6d7882;background-color:#fff;text-align:center;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.winter-elementor-notice-body{padding:10px 20px;font-size:12px;line-height:1.5}.winter-elementor-notice-header{padding:10px 0 20px;color:#6d7882;font-size:13px;font-weight:700}.winter-elementor-notice-buttons{border-top:1px solid #e6e9ec}.winter-elementor-notice-buttons>a{display:inline-block;width:50%;padding:13px 0;font-size:15px;font-weight:700;text-align:center}.winter-elementor-notice-buttons>a.winter-do-nothing{border-right:1px solid #e6e9ec;color:#6d7882}.winter-elementor-notice-buttons>a.winter-disable-default-styles{color:#9b0a46}</style>';

		var dialog = style + '<div class="winter-disable-elementor-styling">' +
			'<div class="winter-elementor-notice-wrapper">' +
				'<div class="winter-elementor-notice-header">winter supports default styling for Elementor widgets</div>' +
				'<div class="winter-elementor-notice-body">Do you want to disable Elementors\' default styles and use the theme defaults?</div>' +
				'<div class="winter-elementor-notice-buttons">' +
					'<a href="#" class="winter-do-nothing" data-reply="no">No</a>' +
					'<a href="#" class="winter-disable-default-styles" data-reply="yes">Yes</a>' +
				'</div>' +
			'</div>' +
		'</div>';

		document.body.insertAdjacentHTML( 'afterbegin', dialog );

		Array.prototype.forEach.call( document.querySelectorAll( '.winter-elementor-notice-buttons > a' ), function ( link ) {
			link.addEventListener( 'click', function () {

				var reply = link.getAttribute( 'data-reply' );
				var data = new URLSearchParams();
				data.append( 'reply', reply );
				data.append( 'nonce', winterElementorNotice.nonce );
				data.append( 'action', 'elementor_desiable_default_style' );

				fetch( winterElementorNotice.ajaxurl, { method: 'POST', body: data, credentials: 'same-origin' } ).then( function ( response ) {
					if ( ! response.ok ) {
						return;
					}
					if ( reply === 'yes' ) {
						parent.location.reload();
					} else {
						Array.prototype.forEach.call( document.querySelectorAll( '.winter-disable-elementor-styling' ), fadeOutAndRemove );
					}
				} );
			} );
		} );
	}

	function fadeOutAndRemove( el ) {
		function remove() {
			if ( el.parentNode ) {
				el.parentNode.removeChild( el );
			}
		}
		if ( ! el.animate ) {
			remove();
			return;
		}
		el.animate( [ { opacity: 1 }, { opacity: 0 } ], { duration: 500, fill: 'forwards' } ).onfinish = remove;
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
}());
