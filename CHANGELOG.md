## 1.0.9 (2018-10-08)

* Fix fatal error in the latest post query
* Add new filter to display ten search result at once


## 1.0.8 (2018-10-08)

* Update readme to comply with latests changes
* Include latest-posts template on the front page from within the home template
* Make pingback URL conditional and use WordPress configured charset
* Escape all values of HTML attributes and home URLs
* Add new utility function to get the archives page
* Rename the front-page template to latest-posts
* Respect sticky posts and the posts per page setting


## 1.0.7 (2018-09-05)

* Minor styling improvements for code blocks
* Init the post in the search page template to fix a display bug
* Display already added comments even if comments are now closed
* Update readme with new demo URL and minor text improvements
* Update screenshot according the new WordPress screenshot requirements
* Fix layering problem with sticky header and remove unnecessary styles
* Avoid header menu flashing on page load on some devices
* Display search page template in page table


## 1.0.6 (2018-08-17)

* Update the readme files with instructions about the new theme customizer
* Improve sticky header styling and responsive behavior
* Add theme customizer sections, settings and controls
* Improve theme configuration using the theme customizer
* Introduce background color CSS variable


## 1.0.5 (2018-08-16)

* Improve header menu with better animations, positioning and responsive behavior
* Move menu trigger to be able to control menu lines with checked state
* Change theme and demo URLs to new demo site
* Make search hint translatable


## 1.0.4 (2018-08-15)

* Add changelog to track history
* Add WordPress style readme file
* Improve styling of blog archive
* Add classic editor stylesheet
* Fix markdown level of subheadings
* Update readme for pluggable functions and highlight theme features
* Remove unessential functions, moved to separate plugin
* Rely on built-in WordPress functions for date localization
* Simplify 404 page
* Using pluggable functions rather than filter hook for standard features
* Improve styling of blockquotes using cite tag to indicate the origin
* Add missing text domains
* Improve align center for block style images
* Add layout compatibility with block style images


## 1.0.3 (2018-08-14)

* Improve mobile post pagination and menu header button
* Minor styling improvements for better browser compatibility
* Add post pagination for search results and according styling
* Add language attributes to opening html tag
* Add WP link pages navigation
* Add description of new comments and tag templates to readme
* Display tags on post pages if available
* Add comment reply javascript to groups configuration
* Add styles for max image width and improve cancel reply button styling
* Strip logged-in class from body tag
* Update screenshot with new header menu
* Add new template for displaying tag archives
* Add custom comments form which will be required in future WP versions
* Declare theme supports and enqueue comments reply script (if needed)
* Add explicit text domain
* Remove title and RSS header tags - newly handled via theme support declaration
* Fix wrong translation call


## 1.0.2 (2018-08-13)

* Clean up post classes using a blacklist
* Make several improvements using standard WordPress filters
* Display scheduled posts in the blog archives for admin users
* Remove Gutenberg styles as they now get dequeued
* Add groups configuration for compatibility with assets management
* Remove external font inclusion
* Add Roboto fonts
* Make the whole footer section optional
* Add header menu instructions and remove Google Tag Manager description
* Switch to post class function call, which allows better extensibility
* Add font declaration and improve header menu
* Preparing for release 1.0.1
* Merge branch 'feat/header-menu' into master
* (origin/feat/header-menu) Add new styles for the header menu
* Render the header menu next the tagline if available
* Add new header menu slot


## 1.0.0 (2018-08-09)

* Remove built-in minified CSS as we are not relying on enqueue styles
* Introduce theme accent color to highlight certain elements
* Change opening body action to `body_open` which is more commonly used
* Remove Google Tag Manager Integration
* Remove integrated favicons and rely on default WordPress procedure instead
* Enqueue stylesheet via action hook rather than directly in the header
* Unregister unnecessary functions to clean the head element
* Remove years shortcode
* Update version and add theme tags
* Add missing text domain to translation function call
* Add styles for `mark` HTML elements
* Add concrete examples for using the filter hooks provided by the theme
* Fix nested list format in readme according to GitHub Markdown spec
* Update readme with further information about the theme
* Add new styles for code blocks
* Add new font definition for code blocks
