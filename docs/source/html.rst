HTML
====================

Image Links
-----------

linkImage
~~~~~~~~~
=========== ======== ======= =========================================
Parameters  Required Default Notes
=========== ======== ======= =========================================
$url        Yes              The url the image will link to.
$imageSrc   Yes              The location of the image.
$attributes No       []      Any attributes to add to the anchor tag.
$https      No       null    Whether to use https.
=========== ======== ======= =========================================

.. code:: HTML

    {{ HTML::linkImage('/home', public_path('img/test.png')) }}

linkRouteImage
~~~~~~~~~~~~~~
=========== ======== ======= =========================================
Parameters  Required Default Notes
=========== ======== ======= =========================================
$route      Yes              The route the image will link to.
$parameters Yes              Any parameters the route may need.
$imageSrc   Yes              The location of the image.
$attributes No       []      Any attributes to add to the anchor tag.
$https      No       null    Whether to use https.
=========== ======== ======= =========================================

.. code:: HTML

    {{ HTML::linkRouteImage('user.profile', ['id' => 1], public_path('img/test.png')) }}

Icon Links
----------

linkIcon
~~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$url         Yes              The url the image will link to.
$iconClasses Yes              The icon classes to use.
$iconText    No       null    Any text to display after the icon.
$attributes  No       []      Any attributes to add to the anchor tag.
$https       No       null    Whether to use https.
============ ======== ======= =========================================

.. code:: HTML

    {{ HTML::linkIcon('/home', 'fa fa-home', 'Go Home') }}

linkRouteIcon
~~~~~~~~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$route       Yes              The route the image will link to.
$parameters  Yes              Any parameters the route may need.
$iconClasses Yes              The icon classes to use.
$iconText    No       null    Any text to display after the icon.
$attributes  No       []      Any attributes to add to the anchor tag.
$https       No       null    Whether to use https.
============ ======== ======= =========================================

.. code:: HTML

    {{ HTML::linkRouteIcon('user.profile', ['id' => 1], 'fa fa-user', 'Admin's Profile') }}

Typography
----------
span
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::span('this is a span') }}

bold
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::bold('This is bold text') }}

italic
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::italic('This is italicized text') }}

delete
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::delete('This is deleted text') }}

strike
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::strike('This text is striked out') }}

insert
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::insert('This is inserted text') }}

underline
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::underline('This is underlined text') }}

mark
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    This is {{ HTML::mark('marked') }} text

small
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    This is {{ HTML::small('small') }} text

quote
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$source      No       null    The source of the quote.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::quote('This is quoted text.', 'By Stygian') }}

Code
----------

code
~~~~~~~
============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$value       Yes              The text inside the tag.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    This is {{ HTML::code('code') }} text

Iframes
----------

iframe
~~~~~~~
This will create a generic iframe with whatever you pass to it.

============ ======== ======= =========================================
Parameters   Required Default Notes
============ ======== ======= =========================================
$url         Yes              The url the iframe will point to.
$attributes  No       []      Any attributes to add to the tag.
============ ======== ======= =========================================

Code
^^^^^^^^
.. code:: HTML

    {{ HTML::iframe('http://google.com') }}