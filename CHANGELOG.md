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
