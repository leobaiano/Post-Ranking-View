=== Plugin Name ===
Contributors: leobaiano
Donate link: http://lbideias.com.br/donate
Tags: ranking views, ranking posts, posts views, popular, popular posts
Requires at least: 3.8
Tested up to: 3.8
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin counts the number of visitors to each post and generates a ranking of most viewed posts.

== Description ==

This plugin generates a list of more pupulares posts based on the number of visits the post received. The plugin uses cookies to ensure that the user's visit is counted only once in each post, making the manipulation of the ranking.

You can set how many posts will be displayed in the ranking set that only posts from a particular CPT or a particular category will be taken into consideration, among other settings.

= Credits =

* JS Script [Jonathan Schnittger](http://www.developerdrive.com/)

== Installation ==

To install just follow the installation steps of most WordPress plugin's:

e.g.

1. Download the file lb-back-to-top.zip;
2. Unzip the file on your computer;
3. Upload folder lb-back-to-top, you just unzip to `/wp-content/plugins/` directory;
4. Activate the plugin through the 'Plugins' menu in WordPress;
1. Be happy.

Important: This plugin uses the wp_footer action, then it is necessary that it be called in your theme.

== Frequently Asked Questions ==

= I activated the plugin but the button does not appear when you scroll the scroll bar of my site. =

The plugin uses the wp_footer action, make sure it is called in your theme. Usually the action is called the footer file of the theme with the wp_footer () code;

== Screenshots ==

1. Button back to top

== Changelog ==

= 1.0 2013-01-02 =

* Creation of the plugin, the initial version.

== Upgrade Notice ==

= 1.1 =

The next version will include translation of the text that appears on the button and the ability to style with CSS, or replace the button with an image.