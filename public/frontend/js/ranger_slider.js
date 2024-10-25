var FlatSliderObj;

(function ( $ ) {
	"use strict";

	FlatSliderObj = {

		/**
		 * Default-Options
		 */
		options: {
			min: 25000, // Valeur minimale mise à jour
			max: 200000, // Valeur maximale mise à jour
			value: 25000, // Valeur par défaut (pour un slider simple)
			step: 1000, // Incrément par défaut
			einheit: '', // Unité mise à jour
			range: false, // Changez ceci à false pour un seul slider
			values: [25000] // Un seul tableau de valeur
		},
		min_sichtbar: true,
		max_sichtbar: true,

		/** Konstruktor (UI Widget) */
		_create: function () {
			// Callbacks setzen
			var options = $.extend({}, this.options, {
				slide: $.proxy(this.on_slide, this)
			});
			// Slider bauen
			var css_class = this.element.attr('class');
			this.element.removeClass();
			if (css_class === "") {
				css_class = "flat-slider";
			}
			this.$slider_container = $('<div class="' + css_class + '">'
				+ '<div class="slider"></div>'
				+ '<div class="min">' + this.options.min + ' ' + this.options.einheit + '</div>'
				+ '<div class="max">' + this.options.max + ' ' + this.options.einheit + '</div>'
				+ '</div>');
			if (this.options.range === true) {
				this.$slider_container.append(
					'<div class="min_value">' + this.options.values[0] + ' ' + this.options.einheit + '</div>'
					+ '<div class="max_value">' + this.options.values[1] + ' ' + this.options.einheit + '</div>');
			} else {
				this.$slider_container.append(
					'<div class="value">' + this.options.value + ' ' + this.options.einheit + '</div>');
			}
			this.element.after(this.$slider_container);

			// schneller Zugriff in den Callbacks
			this.$slider = this.$slider_container.find('.slider');
			this.$min = this.$slider_container.find('.min');
			this.$max = this.$slider_container.find('.max');
			if (this.options.range === true) {
				this.$min_value = this.$slider_container.find('.min_value');
				this.$max_value = this.$slider_container.find('.max_value');
			} else {
				this.$wert = this.$slider_container.find('.value');
			}

			// jQuery UI Slider Init
			this.$slider.slider(options);
			var $this = this;
			if ($this.options.range === true) {
				// Code pour le range slider
			} else {
				var $handle = this.$slider.find('.ui-slider-handle');
				$handle.data('handle','einfach');
				this._update_normal_handle($handle);
			}
		},

		/** Destruktor (UI Widget) */
		_destroy: function () {
		},

		/** auf Änderung von Optionen reagieren (UI Widget) */
		_setOption: function ( key, value ) {
			this._super( "_setOption", key, value );
		},

		on_slide: function( event, ui ) {
			if (this.options.range === true) {
				this.element.val(ui.values[0] + ';' + ui.values[1]);
				this.$min_value.html(ui.values[0] + ' ' + this.options.einheit);
				this.$max_value.html(ui.values[1] + ' ' + this.options.einheit);
				this._update_range_handle($(ui.handle));
			} else {
				this.element.val(ui.value + ' ' + this.options.einheit);
				this.$wert.html(ui.value + ' ' + this.options.einheit);
				this._update_normal_handle($(ui.handle));
			}
		},

		_update_normal_handle: function($handle) {
			var lhandle = parseInt($handle.position().left,10);
			var lmin = parseInt(this.$min.position().left,10);
			var lmax = parseInt(this.$max.position().left,10);
			var wmax = this.$max.width();

			var wwert = this.$wert.width();
			var lwert = lhandle - Math.round(wwert / 2);
			if (lwert <= lmin) {
				lwert = lmin;
			}
			if (lwert + wwert >= lmax + wmax) {
				lwert = lmax + wmax - wwert;
			}
			this.$wert.css('left', lwert);
			// Min/Max Label ein/ausblenden
			if (this.min_sichtbar === true && lwert - wwert <= lmin) {
				this.$min.css('opacity',0);
				this.min_sichtbar = false;
			} else if (this.min_sichtbar === false && lwert - wwert > lmin) {
				this.$min.css('opacity',1);
				this.min_sichtbar = true;
			}
			if (this.max_sichtbar === true && lwert + wwert > lmax + wmax) {
				this.$max.css('opacity',0);
				this.max_sichtbar = false;
			} else if (this.max_sichtbar === false && lwert + wwert <= lmax + wmax) {
				this.$max.css('opacity',1);
				this.max_sichtbar = true;
			}
		}
	};

	/** Register UI Widget */
	$.widget( "yourNamespace.flatSlider", FlatSliderObj );
}( jQuery ));

$(function() {
	// Instantiation of FlatSlider
	$("#slider_range").flatSlider();
});
