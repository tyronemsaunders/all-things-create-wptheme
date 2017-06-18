# All Things Create
Theme Name: All Things Create
Theme URI: http://www.github.com/tyronemsaunders/all-things-create-wptheme
Description: All Things Create theme.  A child theme of JointsWP
Author:  Tyrone Saunders
Author URI: http://www.mintyross.com
Template: JointsWP-master
Version: 1.0.0

## Description
All Things Create is a WordPress child theme of JointsWP.  The theme functions similar
to a single page app with the front page consisting of a timeline that implements
a pure CSS parallax effect with floaters providing a unique visual effect.  

* Mobile-first, responsive design
* Blog ready

## Installation
1. Copy the repository to your server.
2. Prerequisites
  * [Install node.js](https://nodejs.org)
  * Install Gulp globally by running:
    `npm install gulp -g`
3. Activate the Foundation flex-grid in the JointsWP parent theme.
   See (http://foundation.zurb.com/sites/docs/flex-grid.html#importing)
   Edit the parent theme's `style.scss` file which is usually found at SERVER_ROOT/wp-content/themes/JointsWP-master/assets/scss/style.scss and then:
   * Comment out
     `// @include foundation-grid;`
   * Uncomment
     `@include foundation-flex-classes;
      @include foundation-flex-grid;`
4. Navigate to the parent theme's directory, usually found at SERVER_ROOT/wp-content/themes/JointsWP-master, and run the following commands:
  * Run `npm install`
  * Run `gulp`
5. Setup the child theme.
  * Navigate to the child theme's directory, usually found at SERVER_ROOT/wp-content/themes/all-things-create
  * Run `npm install`
  * Run `gulp`

## Setup
1. In your admin panel, go to Appearance -> Themes and click on the 'Activate' button for the All Things Create Theme.
2. Navigate to Appearance > Customize and add a site logo and other values to customize the site to your taste.

## Usage
The usage of this theme is based on categories.  The general concept is that posts that are added to a specific category are added to the timeline section matching that category.  

### Creating Categories
1. In your admin panel go to Posts -> Categories
2. Complete the form to add a new category.  
3. Add a featured image to the category which will act as the background for the timeline section matching that category.
4. Click the 'Add New Category' button to publish the category.

### Adding sections to the timeline
1. In your admin panel go to Appearance -> Menus
2. In the dropdown list labeled "Select a menu to edit:" select 'Timeline Navigation' and click the 'Select' button.
3. Add 'Categories' to the 'Menu Structure'
4. Arrange the categories in the order you want them to appear on the timeline and then click the 'Save Menu' button.

### Adding posts to the timeline
1. In your admin panel go to Posts -> Add New
2. Enter the following information and then click the 'Publish' button.
  * Title (required)
  * Content (optional)
  * Featured Image (required)
  * Categories (required), make sure the category has previously been added to the 'Timeline Navigation' menu that was created in the above section.

### Adding floaters to the timeline
1. In your admin panel go to Floater -> Add New
2. Enter the following information and then click the 'Publish' button
  * Title (required)
  * Content (optional), content will never be seen on the website.
  * Featured Image (required)
  * Categories (required), make sure the category has previously been added to the 'Timeline Navigation' menu that was created in the above section.
  * Speed (required), the speed determines how fast the floater will move relative to page scrolling.
  * X Coordinate (required), the x coordinate determines the starting location of the floater.
  * Y Coordinate (required), the y coordinate determines the starting location of the floater.
  * Width (required), the width determines how wide the floater will be.
