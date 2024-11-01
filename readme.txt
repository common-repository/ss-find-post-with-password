=== SS Find Post with Password ===

Contributors: Spotlight Studios
Plugin Name: SS Find Post with Password
Plugin URI: http://spotlightstudios.co.uk/plugins/ss-postpassword/
Description: Find a post/page using a password - Usage: <code>[ss_postpassword]</code>
Tags: page, post, password, wordpress, spotlight, studios, gallery, photography
Author URI: http://spotlightstudios.co.uk
Author: Spotlight Studios
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=62YBJTBQ7HXLG
Requires at least: 2.3
Tested up to: 3.9.1
Stable tag: 1.0.0
Version: 1.0.0
License: GPLv2

== Description ==

This plugin allows you to search out and find posts with a specific password.

The plugin was developed with photographers in mind who may want to password protect their albums and give that password to clients, without having to provide dedicated links and or user-name login details each time.

This plugin will integrate with most custom post types and Gallery plugins including NexGenGallery and WP Photo Seller

== Installation ==

To install the plugin, just place the shortcode: `[ss_postpassword]` into any page / post / widget that you would like the seach to be placed.

You can use the following variables within the shortcode to specify it to your needs:

* `[ss_postpassword submit="Submit"]` – change the button label
* `[ss_postpassword error="Your error message here"]` – change the error message
* `[ss_postpassword text="Your text here"]` – change the internal text
* `[ss_postpassword errortext="Your error text here"]` – this is the internal text on error
* `[ss_postpassword uikit="on"]` – turn on UIKit style for error and alert message (requires UIKit)

== Upgrade Notice ==

http://spotlightstudios.co.uk/plugins/ss-postpassword/

== Screenshots ==

http://spotlightstudios.co.uk/plugins/ss-postpassword/

== Changelog ==

1.0.0
Plugin Launch

== Frequently Asked Questions ==

How does it work?
The plugin writes a simple password field with a submit button. On submitting the form, if a post / page exists with that password then the user will be redirected to that page and automatically logged in. If no post / page is found then an error will be displayed.

What if I use the same password for two pages?
The plugin will redirect to the first page with the specified password. It is your responsibility to maintain unique passwords throughout your website.

== Donations ==

Please Donate to: admin@spotlightstudios.co.uk or use the link below
https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=62YBJTBQ7HXLG