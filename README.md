Test application for Veeam Software
=======================

Introduction
------------
This is a simple application for Veeam Software, which I had done during my recruitment
process in September 2014.

The application is a list of job offers. Each job offer has a department property,
and may be translated to different languages. The list has a filter, which allows to
find items either by a department or by a language. If an offer isn't translated to
some language, it's displayed in the list in English.

Installation
------------

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies:

    cd my/project/dir
    git clone git://http://github.com/ikarpovich/veeam-test.git
    cd veaam-test
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)