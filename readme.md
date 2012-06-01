SimpleNews
============

SimpleNews is a basic module which builds upon the default functionality of the phpVMS News system, allowing you to show a list of links to latest news items, a paginated view of news items and an individual page per item.

No attribution or link back is required (see License).

###Installation

To install, simply extract the contents of the zip archive and drag the contents into the root public folder of your phpVMS installation.

###Usage

To display a list of latest news items anywhere on your site, call the following:

```<?php SimpleNews::NewstList(); ?>```

By default the list will show the 5 latest items, however you can configure it to show however many you wish, as follows:

```<?php SimpleNews::NewstList(10); ?>```

You can link to a paginated list of news items at `index.php/SimpleNews` or a certain page of the list at `index.php/SimpleNews/page/2` etc.

You can also link to a single news item like so: `index.php/SimpleNews/item/1`

###License

Released under the [&#9786; Licence](http://licence.visualidiot.com/)

Feel free to edit this code however you want. Please also don't hesitate to fork this repo and raise pull requests in order to extend the module however you feel is appropriate.