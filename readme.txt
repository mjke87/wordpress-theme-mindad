= Mindad WordPress Theme =
An ultra-minimalist, content-focused theme for WordPress blogs.

== Description ==
The theme focuses on providing a clean, speedy experience with the following simple features:
- Content-focused design for an optimal reading experience
- Minimal header & footer for less distraction
- Responsive optimized for mobile phones
- Integrated simple post scheduler
- Compatible with standard Gutenberg blocks
- [High page speed rating](https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2Fdemo.mindad.ch%2F)

Other hand, many non-essential functions are omitted:
- No sidebar
- No widgets
- No permanent search box
- No JavaScript
- No images & icons
- No copyright

A demo of the theme is available [here](https://demo.mindad.ch/). It's a bare WordPress and theme setup (no plugins), with some dummy content.

== Installation ==
If you wish to use this theme on your own website follow the steps below.
1. Install the theme as usual via the WordPress Backend or download it manually and install as follows:
 _Appeareance > Themes > Add Themes > Uploads Themes_
2. Navigate to _Appeareance > Themes_ then activate the _mindad_ WordPress theme

== Configuration ==
Most of the theme configuration can be done in the theme customizer. It's all optional, but recommended to have at least a look. First of, in your WordPress backend head over to _Appearance > Customize_ to load up the theme customizer.

= Site Identity
In the site identity section it is strongly recommended to set a nice _Site Title_ and _Tagline_, as the theme will display these in the header on *every* site.

If you wish to use a favicon for your site, you can upload a custom image as a _Site Icon_ right here as well. For further information about favicons check the [instructions from WordPress](https://codex.wordpress.org/Creating_a_Favicon).

= Colors
In the color section you can change some of the theme colors using the theme customizer.

= Menus
In the menus section you have the possibility to create menu and have them displayed in the header and/or footer. Both menus are optional, if no menu is assigned to a menu slot, nothing will be displayed by the theme.

Note that the header menu will be hidden by default and is accessible via a menu button which is displayed next to the tag line in the header. On mobile devices the button is displayed in the bottom right hand corner to improve [Thumb Reachability](http://uxmovement.com/mobile/why-mobile-menus-belong-at-the-bottom-of-the-screen/) according to the floating action button standard of the material design guide. Furthermore, the header menu works entirely without JavaScript, which makes it possible for the theme to leave out any _*.js_ files at all.

= Homepage Settings
The following instructions is the recommended configuration for your website:

1. Make sure the option _Your homepage displays_ is set to _A static page_.
2. In the _Homepage_ settings click new page, set a title (e.g. _Home_) and click add to create a new empty page; now select this page, or choose any previously created homepage. The theme will display the latest blog posts prominently on the front page.
3. In the _Posts Page_ settings click new page, set a title (e.g. _Archives_) and click add to create a new empty page; now select this page, or choose any previously created archives page. The theme will display a list of all blog posts sorted by year and month on this page.

= Header
Allows you to make the header sticky or non-sticky. Simple as that. On thing worth mentioning though, is that the header will always be non-sticky on mobile devices, as the vertical space is quite limited.

= Search Page
The search page cannot be configured in the theme customizer, but it's fairly easy. Simply go to _Pages_ and create a new empty search page, then on the right-hand side select _Page Attributes > Template > Search Page_. Publish the page and link to it as you wish, for example in your menu.

== Customization ==
All of the below is optional. Be aware that further customization of this WordPress theme requires a certain level of programming.

= Child-Theme =
For further customization, such as styling, hooks and overriding templates, it is highly recommended to create a [child theme](https://codex.wordpress.org/Child_Themes) first.

= Templates =
The mindad WordPress theme comes with some standard templates that you can override in your child theme.

- `header.php` — displays the header area
- `footer.php` — displays the footer area
- `index.php` — shows the current content like a static page
- `single.php` — shows a single blog post
- `page.php` — displays a static page
- `search.php` — displays the search results
- `searchform.php` — displays the search form
- `home.php` — post page template that shows the blog archives
- `category.php` — shows the blog archives for the current category
- `tag.php` — shows the blog archives for the current tag
- `comments.php` — shows the comment form and lists comments
- `latests-posts.php` — Shows the latest blog posts
- `404.php` — shows the good old 404 error page with a surprise

Simply copy any of these files to your child themes root folder and adjust as needed. Make sure to preserve the same file name, otherwise the template will not be overridden.

= Functions =
All theme functions are pluggable, which means that you can override them in your child theme to change their behavior. Or you can remove the function callbacks from the WordPress action and filter hooks, to disable certain features completely.

**Examples**:
- Do not display post status as badges — `remove_action('init', 'mindad_display_post_status_as_badges');`
- Do not append the read more link — `remove_filter('the_excerpt', 'mindad_append_read_more_link', 15, 1);`
- Do not display scheduled posts for admin users — `remove_filter('the_title', 'mindad_display_scheduled_for_admin', 15, 2);`

= Filters =
Use these filters as a more permanent alternative to using the theme customizer.

- Change the accent color of the theme (default is `#56a49f`):
  `add_filter('theme_mod_mindad_accent_color', function() { return '#123456'; })`
- Change the background color of the theme (default is `#ffffff`):
  `add_filter('theme_mod_mindad_background_color', function() { return '#123456'; })`
- Make the header always sticky (default is `false`):
  `add_filter('theme_mod_mindad_sticky_header', '__return_true')`
