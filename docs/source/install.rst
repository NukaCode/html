Installation
====================================

Laravel-Base
------------------------------------
If you are adding HTML to Laravel-Base, you will need to make some minor changes.

- Remove ``Illuminate\Html\HtmlServiceProvider`` from ``config/app.php``.

Composer
------------------------------------
.. code::

    composer require nukacode/html:~1.0

Service Providers
------------------------------------
Add the following service providers to ``configs/app.php``.
.. code::

     'NukaCode\Html\HtmlServiceProvider',