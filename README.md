# drupal8

## Magyar

A Drupal 8 migrációval kapcsolatos projekt fájljai

### Portál

A telepítéshez szükség van [composerre](http://getcomposer.org/) és [drushra](http://www.drush.org/en/master/). A következő lépéseket kövesd:

```shell
git clone git@github.com:wesnoth-hu/drupal8.git
cd drupal8
composer.phar install
cd web
drush.phar site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal8_ --locale=hu
```

### Dokumentáció

A `docs/weshu-d8.tjp` fájl egy [TaskJuggler](http://www.taskjuggler.org/) projekt fájl. A segítségével HTML készíthető belőle.

A `docs/specifikacio.adoc` fájl egy AsciiDoc fájl, az [Asciidoctorral](http://asciidoctor.org/) HTML készíthető belőle.

A `docs/mergedocs.sh` fájl egy bash script, ami a fenti kettő generálást elvégzi, és az eredményüket összefésüli egy index.html fájlba.

## English

Project related files for Drupal 8 migration

### Webportal

For the installation you need [composer](http://getcomposer.org) and [drush](http://www.drush.org/en/master). Follow these steps:

```shell
git clone git@github.com:wesnoth-hu/drupal8.git
cd drupal8
composer.phar install
cd web
drush.phar site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal8_ --locale=hu
```

### Documentations

The `docs/weshu-d8.tjp` file is a [TaskJuggler](http://www.taskjuggler.org/) project file. You can compile it to HTML.

The `docs/specifikacio.adoc` file is an AsciiDoc file, you can use [Asciidoctor](http://asciidoctor.org/) to create a HTML page.

The `docs/mergedocs.sh` file is a bash script which executes the two conversions above, and merges them into an index.html file.
