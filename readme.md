# [TI] Whitelabel

[![license](https://img.shields.io/github/license/thoughtsideas/ti-whitelabel.svg)](https://github.com/thoughtsideas/ti-whitelabel)  [![GitHub release](https://img.shields.io/github/release/thoughtsideas/ti-whitelabel.svg)](https://github.com/thoughtsideas/ti-whitelabel)  [![Build Status](https://travis-ci.org/thoughtsideas/ti-whitelabel.svg?branch=master)](https://travis-ci.org/thoughtsideas/ti-whitelabel)  [![Packagist](https://img.shields.io/packagist/v/thoughtsideas/ti-whitelabel.svg)](https://packagist.org/packages/thoughtsideas/ti-whitelabel)  [![Packagist](https://img.shields.io/packagist/dt/thoughtsideas/ti-whitelabel.svg)](https://packagist.org/packages/thoughtsideas/ti-whitelabel)  [![GitHub issues](https://img.shields.io/github/issues/thoughtsideas/ti-whitelabel.svg)](https://github.com/thoughtsideas/ti-whitelabel)  [![Libraries.io for GitHub](https://img.shields.io/librariesio/github/thoughtsideas/ti-whitelabel.svg)](https://github.com/thoughtsideas/ti-whitelabel)

Rebrand your WordPress install's in to match your company or clients branding.

- [Readme](https://github.com/thoughtsideas/ti-whitelabel/blob/master/readme.md)
- [Issues](https://github.com/thoughtsideas/ti-whitelabel/issues/)
- [Continuous Integration](/#0)

## Dependencies

- [GIT](https://git-scm.com/downloads/)
- [PHP](http://www.php.net/)
- [NodeJS](https://nodejs.org/)

## Installation

*We recommend installing this dependency via Composer.*

### As a Composer Dependency

To include these standards as part of a project. Require this repository
as a development dependency:

```
composer require thoughtsideas/ti-whitelabel
```

## Making Your Changes

Make your changes locally on a new branch based off `origin/master`. Commit your changes to your new branch and regularly push your work to the same named branch on the server.
When you need feedback or help, or you think the branch is ready for merging, open a pull request.
After someone else has reviewed and signed off on the feature, you can merge it into master.

## Documentation

During the Alpha/Beta stages, due to constant changes, documentation will be mainly written in-line. With a dedicated section being created at the first major release.

### Customize WordPress Login

#### Custom CSS

```
/**
 * Apply our custom styles to the WordPress Login page.
 *
 * @param  array $defaults Default values set by the plugin.
 * @return array           Our modified styles.
 */
function my_customized_login_css( $defaults ) {

	$args = array(
		'background-color' => 'SlateGray', // Accepts all CSS color values.
		'logo'             => array(
			'url'             => get_theme_mod( 'custom_logo' ), // Relative or absolute.
			'width'           => '275px', // Accepts all CSS units.
			'height'          => '100px', // Accepts all CSS units.
		),
		'color'             => 'rgb(51, 51, 51)', // Accepts all CSS color values.
		'link'             => '#ffffff', // Accepts all CSS color values.
		'hover'            => 'hsl(0, 0%, 0%)', // Accepts all CSS color values.
	);

	return wp_parse_args( $args, $defaults );
}

add_filter(
	'ti_whitelable_login_css',
	'my_customized_login_css'
);
```

#### Custom Header URL

```
/**
 * Apply our custom url to the WordPress Login page logo.
 *
 * @param  string $default  Default values set by the plugin.
 * @return string           Our modified value.
 */
function my_customized_header_url( $default ) {

	return 'https://thoughtsideas.uk';

}

add_filter(
	'ti_whitelabel_login_header_url',
	'my_customized_login_header_url'
);
```

#### Custom Header Title

```
/**
 * Apply our custom heading text to the WordPress Login page logo.
 *
 * @param  string $default  Default values set by the plugin.
 * @return string           Our modified value.
 */
function my_customized_header_title( $default ) {

	return 'Thoughts &amp; Ideas - Simplifying your promotion.';

}

add_filter(
	'ti_whitelabel_login_header_title',
	'my_customized_login_header_title'
);
```

### Customize WordPress Admin

#### Custom Admin Footer Text

```
/**
 * Apply our custom admin footer text to the WordPress admin page.
 *
 * @return string           Our modified value.
 */
function my_customized_admin_footer_text() {
	return sprintf(
		'%1$s <a href="%3$s" target="_blank">%2$s</a>.',
		esc_html( 'Created by' ),
		esc_html( 'Thoughts & Ideas' ),
		esc_url( 'https://www.thoughtsideas.uk/' )
	);
}

add_filter(
	'ti_whitelabel_admin_footer_text',
	'my_customized_admin_footer_text'
);
```
