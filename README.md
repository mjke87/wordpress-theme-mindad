# Mindad WordPress Theme
An ultra-minimalist, content-focused theme for WordPress blogs.

The theme focuses on providing a clean, speedy experience with the following simple features:
- Content-focused design for an optimal reading experience
- Minimal header & footer for less distraction
- Responsive optimized for mobile phones
- Integrated simple post scheduler
- Compatible with standard Gutenberg blocks

Other hand, many non-essential functions are omitted:
- No UI
- No sidebar
- No widgets
- No permanent search box
- No JavaScript
- No images & icons
- No copyright

A demo of the theme is available [here](https://mindad.ch/).

## Installation (required)
If you wish to use this theme on your own website follow the steps below.
1. Download the [theme zip file](https://mindad.ch/theme.zip) and install it as usual:
 _Appeareance > Themes > Add Themes > Uploads Themes_
2. Navigate to _Appeareance > Themes_ then activate the _mindad_ WordPress theme
3. Go to _Settings > General_ and set a nice site title and tagline; the theme will display these in the header on every site
4. Go to _Pages_ and create two new empty pages
   1. A homepage
   2. A blog archives page
5. Go to _Settings > Reading_ and make sure the option _Your homepage displays_ is set to _A static page_
   1. As _Homepage_ choose the previously created homepage; the theme will display the latest blog post on the front page
   2. As _Posts Page_ choose the previously created archives page; the theme will display a list of all blog posts sorted by year and month on this page

You're all set.

## Configuration (optional)
### Search Page
Go to pages and create a new empty search page, then on the right-hand side select _Template > Search_. Publish it and link to it as you wish.

### Header Menu
Go to _Appeareance > Menus_ and create a new menu for the header; add all links you need and make sure the _Display location_ is set to _Header menu_. The menu will be hidden by default and is accessible via a menu button which is displayed next to the tag line in the header. On mobile devices the button is displayed in the bottom right hand corner to improve [Thumb Reachability](http://uxmovement.com/mobile/why-mobile-menus-belong-at-the-bottom-of-the-screen/) according to the floating action button standard of the material design guide.

### Footer Menu
Go to _Appeareance > Menus_ and create a new menu for the footer; add all links you need and make sure the _Display location_ is set to _Footer menu_.

### Favicons
If you wish to use a favicon for your site, simply follow the [instructions of WordPress](https://codex.wordpress.org/Creating_a_Favicon) itself or navigate directly to _Appearance > Customize > Site Identity > Site Icon_ if you're familiar with the process.

## Customization (optional)
Be aware that further customization of this WordPress theme requires a certain level of programming.

### Child-Theme
For further customization, such as styling, hooks and overriding templates, it is highly recommended to create a [child theme](https://codex.wordpress.org/Child_Themes) first.

### Templates
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
- `front-page.php` — Homepage template that shows the latest blog post
- `404.php` — shows the good old 404 error page with a surprise

Simply copy any of these files to your child themes root folder and adjust as needed. Make sure to preserve the same file name, otherwise the template will not be overridden.

### Functions
All theme functions are pluggable, which means that you can override them in your child theme to change their behavior. Or you can remove the function callbacks from the WordPress action and filter hooks, to disable certain features completely.

**Examples**:
- Do not display post status as badges — `remove_action('init', 'mindad_display_post_status_as_badges');`
- Do not append the read more link — `remove_filter('the_excerpt', 'mindad_append_read_more_link', 15, 1);`
- Do not display scheduled posts for admin users — `remove_filter('the_title', 'mindad_display_scheduled_for_admin', 15, 2);`

### Filters
Use these filters to control certain WordPress theme functions that are active by default.

- Change the accent color of the theme (default is `#56a49f`):
  `add_filter('mindad_accent_color', function() { return '#123456'; })`