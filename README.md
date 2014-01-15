# Post Ranking View #
**Contributors:** leobaiano  
**Donate link:** http://lbideias.com.br/donate  
**Tags:** ranking views, ranking posts, posts views, popular, popular posts  
**Requires at least:** 3.8  
**Tested up to:** 3.8  
**Stable tag:** 1.1  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

This plugin counts the number of visitors to each post and generates a ranking of most viewed posts.

## Description ##

This plugin generates a list of more pupulares posts based on the number of visits the post received. The plugin uses cookies to ensure that the user's visit is counted only once in each post, making the manipulation of the ranking.

You can set how many posts will be displayed in the ranking set that only posts from a particular CPT or a particular category will be taken into consideration, among other settings.

### Contribute ###

You can contribute to the source code in our [GitHub](https://github.com/leobaiano/Post-Ranking-View) page.

## Installation ##

To install just follow the installation steps of most WordPress plugin's:

e.g.

1. Download the file lb-back-to-top.zip;
2. Unzip the file on your computer;
3. Upload folder post-ranking-view, you just unzip to `/wp-content/plugins/` directory;
4. Activate the plugin through the `Plugins` menu in WordPress;
5. Be happy.

### Showing the ranking of posts ###

To display a list of posts you have two options:

1 - Let the plugin generate the HTML
`<?php
if ( function_exists( 'displayRanking' ) ) {
displayRanking();
}
?>`

2 - Save an array with the data in a variable
`<?php
if (function_exists ('displayRanking')) {
$posts = displayRanking( '','','', true );
?>`

### Parameters of the function ###

`
	displayRanking( $amount, $post_type, $category, $print, $thumb );

	$amount - Amount of posts to be displayed. Default = 5
	$post_type - Type of post that should be considered in the ranking, if not set all kind of posts will enter the ranking. Default = null
	$category - Category that should be considered in the ranking, if not set posts from all categories will enter the ranking. Default = null
	$print - Sets whether HTML is returned or an array with the posts ranking. Default = null ( display HTML )
	$thumb - Show thumbnail or not - true to display thumbnail, default false
`

## Frequently Asked Questions ##

### How do I change the look of the list of posts? ###

The plugin does not bring any CSS style for the list of posts, the visual follows the style sheet theme, so to change the look just customize the CSS of the theme.

### How do I change the amount of posts being displayed in the rankings? ###

The first parameter of the function to set the number of posts by default 5 posts will be listed, but if you want to change this value just set the value in the first parameter. For example, if you want the 10 most viewed posts are displayed use the following code to call the ranking:

`<?php
if ( function_exists( 'displayRanking' ) ) {
displayRanking(10);
}
?>`

### How to display the thumbnail of the post? ###

To show the thumbnail you need to set the parameter to true $ thumb, below an example of displaying the ranking with thumbnail image:

`<?php
if ( function_exists( 'displayRanking' ) ) {
displayRanking( '', '', '', '', true );
}
?>`

## Changelog ##

### 1.1 2014-01-15 ###

* Including the option to show the post thumbnail

### 1.0 2014-01-04 ###

* Creation of the plugin, the initial version.