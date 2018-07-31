# Mindad WordPress Theme
An ultra-minimalist, content-focused theme for WordPress blogs.

## Installation (required)
1. Download the [theme zip file](https://mindad.ch/theme.zip) and install it as usual:
 _Appeareance > Themes > Add Themes > Uploads Themes_
2. Navigate to _Appeareance > Themes_ then activate the _mindad_ WordPress theme
3. Go to _Settings > General_ and set a nice site title and tagline; the theme will display these in the header on every site
4. Go to _Pages_ and create two new empty pages
 1. A homepage
 2. A blog archives page
4. Go to _Settings > Reading_ and make sure the option _Your homepage displays_ is set to _A static page_
 1. As _Homepage_ choose the previously created homepage; the theme will display the latest blog post on the front page
 2. As _Posts Page_ choose the previously created archives page; the theme will display a list of all blog posts sorted by year and month on this page

 You're all set.

## Configuration (optional)
### Search Page:
Go to pages and create a new empty search page, then on the right-hand side select _Template > Search_. Publish it and link to it as you wish.

### Footer Menu:
Go to _Appeareance > Menus_ and create a new menu for the footer; add all links you need and make sure the _Display location_ is set to _Footer menu_

### Google Tag Manager
The theme supports tracking via Google Tag Manager, simply add the following configuration with your custom code to your `wp-config.php` file to activate tracking:
```
define('GOOGLE_TAG_MANAGER', 'YOUR-CODE-HERE');
```

## Customization (optional)
### Favicons
The theme includes default favicons that you can replace with our own:
1. Go to [RealFaviconGenerator](https://realfavicongenerator.net/) website and follow the instructions of the website
2. At the end you'll be able to download a zip file with all favicons and CSS defintions; unzip it somewhere
3. Delete all contents in the theme folder `./assets/img` and replace with your newly generated favicons
4. Usually this is it, if you need further fine-tuning check the file `header.php`, that's were all favicons get included; ajust it as needed





### Filters
`mindad_add_readmore_link`
`mindad_add_years_shortcode`
`mindad_disable_jquery`
`mindad_disable_emoji`
`mindad_disable_embed`