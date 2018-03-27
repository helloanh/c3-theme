# WP Helper

It's a simple way to grab data from wp (pages, posts, meta_boxes...)

## Source Folder
All our classes will be created in the "src" folder, and follow a specific namespace.
For example we created a global name space "CCC"

## Create Page Class
It's  important to follow the same code logic for the harmony of the project, for example:
The Our Work section got 3 pages (Mission, Model, Impact), and here's how to create the Mission class for instance
1) Create a class with name "Mission" on the `src > CCC > Wordpress > Data > Ourwork > Mission`
2) And make it extend the abstract class Data
3) we need to create the getHtmlBlocs() method to generate our html blocs

## Use The Mission Class
Declare the alias
```
use \CCC\Wordpress\Data\OurWork\Mission;
```
Create new instance of our class, and pass the path or the slug of the page
```
$ourWorkMission = new Mission('mission');
```
As the Mission page have 2 type of content:
1. The text area with title + text, we can get it by
```
echo $ourWorkMission->getPostContent();
```
2. 4 blocs, and each bloc is presented with a background + title,
In the next call, we will pass an array with a key/value row, for example of the first row.
title is the key of the text, and background is the key of the image for the history bloc
```
echo $ourWorkMission->getHtmlBlocs([
         'title' => 'background',
         'title_people' => 'background_people',
         'title_move' => 'background_move',
         'title_action' => 'background_action'
     ]);
```
