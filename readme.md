PHP Markdown Next
=================

PHP Markdown Next

by Nazar Mokrynskyi
<nazar@mokrynskyi.com>

based on PHP Markdown Extra by Michel Fortin
<http://michelf.ca/>

with changes from PHP Markdown Extra Extended by Egil Hansen
<egil@assimilated.dk>

based on original Markdown by John Gruber
<http://daringfireball.net/>


Introduction
------------

This is a library package that includes the PHP Markdown Next parser, which is based on PHP Markdown Extra and PHP Markdown Extra Extended parsers.

Markdown is a text-to-HTML conversion tool for web writers.
Markdown allows you to write using an easy-to-read, easy-to-write plain text format, then convert it to structurally valid XHTML (or HTML).

"Markdown" is two things: a plain text markup syntax, and a software tool, written in Perl, that converts the plain text markup to HTML.
PHP Markdown is a port to PHP of the original Markdown program by John Gruber.

Full documentation of Markdown's syntax is available on John's Markdown page: <http://daringfireball.net/projects/markdown/>
PHP Markdown Extra syntax is described by Michel Fortin: <http://michelf.ca/projects/php-markdown/extra/>
Changes in PHP Markdown Extra Extended are described in corresponding repository by Egil Hansen: <https://github.com/egil/php-markdown-extra-extended>

Requirements
-----------

This library package requires PHP 5.4 or later.

Usage
-----

In order to use this library, you can use composer:

	{
        "require": {
            "nazar-pc/php-markdown-next": "*"
        }
    }

Or include file `src/nazarpc/MarkdownNext.php` manually (see `example/index.php` file).

Then you can use class:

	use nazarpc\MarkdownNext;
	$my_html = MarkdownNext::defaultTransform($my_text);

Static method `defaultTransform` is used in example above, but if you want to customize default settings - you can create instance of `MarkdownNext` class:

	use nazarpc\MarkdownNext;
	$parser = new MarkdownNext;
	$parser->fn_id_prefix = "post22-";
	$my_html = $parser->transform($my_text);

To learn more, see the full list of [MarkdownExtra configuration variables].

 [configuration variables]: http://michelf.ca/projects/php-markdown/configuration/


Public API and Versioning Policy
---------------------------------

Version numbers are of the form *major*.*minor*.*patch*.

The public API of PHP Markdown consist of the two parser classes `Markdown`
and `MarkdownExtra`, their constructors, the `transform` and `defaultTransform`
functions and their configuration variables. The public API is stable for
a given major version number. It might get additions when the minor version
number increments.

**Protected members are not considered public API.** This is unconventional and deserves an explanation.
Incrementing the major version number every time the underlying implementation of something changes is going to give nonessential version numbers
for the vast majority of people who just use the parser.
Protected members are meant to create parser subclasses that behave in different ways. Very few people create parser subclasses.
I don't want to discourage it by making everything private, but at the same time I can't guarantee any stable hook between versions if you use protected members.

**Syntax changes** will increment the minor number for new features, and the patch number for small corrections.
A *new feature* is something that needs a change in the syntax documentation.

Bugs and Contributions
----

Reporting of issues and creating of pull requests are highly appreciated!

Also feel free to contact me via email <nazar@mokrynskyi.com>

Please include with your bug report: (1) the example of input; (2) the output you expected; (3) the output PHP Markdown Next actually produced.

Versions History
---------------

PHP Markdown Next 2.0.0 (10 Nov 2013):

This is first release of Next series.

* Git version of PHP Markdown repository on 4 Nov 2013 was taken as the base
* Code reformatted, some properties renamed, added proper PHPDoc sections so that IDE now can work with them
* Several rejected pull requests of PHP Markdown Extra were added:
 * GFM-Style Fenced Code Blocks by Jason Caldwell
 * Enhanced ordered list by Matt Gorle
 * Convert public member comments to PHPDoc format (partial work in this direction) by Mark Trapp
* Added changes from PHP Markdown Extra Extended, which was based on old version of PHP Markdown Extra
* Markdown and MarkdownExtra classes together with other changes merged into single class MarkdownNext
* Some internal changes, like moving of protected methods to closures in callbacks, short array syntax usage, short ternary operators


PHP Markdown Lib 1.3 (11 Apr 2013):

This is the first release of PHP Markdown Lib. This package requires PHP
version 4.3 or later and is designed to work with PSR-0 autoloading and,
optionally with Composer. Here is a list of the changes since
PHP Markdown Extra 1.2.6:

*	Plugin interface for WordPress and other systems is no longer present in
	the Lib package. The classic package is still available if you need it:
	<http://michelf.ca/projects/php-markdown/classic/>

*	Added `public` and `protected` protection attributes, plus a section about
	what is "public API" and what isn't in the Readme file.

*	Changed HTML output for footnotes: now instead of adding `rel` and `rev`
	attributes, footnotes links have the class name `footnote-ref` and
	backlinks `footnote-backref`.

*	Fixed some regular expressions to make PCRE not shout warnings about POSIX
	collation classes (dependent on your version of PCRE).

*	Added optional class and id attributes to images and links using the same
	syntax as for headers:

		[link](url){#id .class}
		![img](url){#id .class}

	It work too for reference-style links and images. In this case you need
	to put those attributes at the reference definition:

		[link][linkref] or [linkref]
		![img][linkref]

		[linkref]: url "optional title" {#id .class}

*	Fixed a PHP notice message triggered when some table column separator
	markers are missing on the separator line below column headers.

*	Fixed a small mistake that could cause the parser to retain an invalid
	state related to parsing links across multiple runs. This was never
	observed (that I know of), but it's still worth fixing.


Copyright and License
---------------------

BSD 3-Clause License

See `license.md` file for details
