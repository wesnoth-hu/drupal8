# The wesnoth.fsf.hu Project

## Magyar

A wesnoth.fsf.hu portál fájljai.

### Telepítés

#### Drupal 6

A __telepítéshez__ szükség van [composerre](http://getcomposer.org/). A következő lépéseket kövesd:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project
composer.phar install
cd web
sudo update-alternatives --set php /usr/bin/php5.6
../vendor/bin/drush.phar site-install default --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal6_ --locale=hu
../vendor/bin/drush.phar pm-enable advanced_forum author_pane comment_subject login_destination pathauto token transliteration image bbcode mass_contact privatemsg smileys captcha taxonomy_image wysiwyg views votingapi ctools
```

__Megjegyzés:__ mbstring hiba esetén tedd a sites/default/default.settings fájlba:
```shell
ini_set('mbstring.http_input', 'pass');
ini_set('mbstring.http_output', 'pass');
```

#### Drupal 8

A __telepítéshez__ szükség van [composerre](http://getcomposer.org/) és [drushra](http://www.drush.org/en/master/). A következő lépéseket kövesd:

```shell
git clone git@github.com:wesnoth-hu/drupal8.git
cd drupal8
composer.phar install
cd web
drush.phar site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal8_ --locale=hu
```

A __migrációhoz__ a következő lépéseket kövesd:

```shell
drush.phar pm-enable -y migrate_upgrade migrate_plus migrate_tools
drush.phar migrate-upgrade --legacy-db-url=mysql://USER:PASSWORD@HOST/DATABASE --legacy-root=/var/www/filesystem --legacy-db-prefix=drupal_
drush.phar php-script profiles/wesnoth_hu/wesnoth_hu_postmigration.php
```

#### Dokumentáció

A `docs/weshu-d8.tjp` fájl egy [TaskJuggler](http://www.taskjuggler.org/) projekt fájl. A segítségével HTML készíthető belőle.

A `docs/specifikacio.adoc` fájl egy AsciiDoc fájl, az [Asciidoctorral](http://asciidoctor.org/) HTML készíthető belőle.

A `docs/mergedocs.sh` fájl egy bash script, ami a fenti kettő generálást elvégzi, és az eredményüket összefésüli egy index.html fájlba.

### English

Project related files for the wesnoth.fsf.hu site

### Installation

#### Drupal 6

For the __installation__ you need [composer](http://getcomposer.org). Follow these steps:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project
composer.phar install
cd web
sudo update-alternatives --set php /usr/bin/php5.6
../vendor/bin/drush.phar site-install default --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal6_ --locale=hu
../vendor/bin/drush.phar pm-enable advanced_forum author_pane comment_subject login_destination pathauto token transliteration image bbcode mass_contact privatemsg smileys captcha taxonomy_image wysiwyg views votingapi ctools
```

__Note:__ in case of an mbstring error put the following into sites/default/default.settings file:
```shell
ini_set('mbstring.http_input', 'pass');
ini_set('mbstring.http_output', 'pass');
```

#### Drupal 8

For the __installation__ you need [composer](http://getcomposer.org) and [drush](http://www.drush.org/en/master). Follow these steps:

```shell
git clone git@github.com:wesnoth-hu/drupal8.git
cd drupal8
composer.phar install
cd web
drush.phar site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal8_ --locale=hu
```

For the __migration__ follow these steps:

```shell
drush.phar pm-enable -y migrate_upgrade migrate_plus migrate_tools
drush.phar migrate-upgrade --legacy-db-url=mysql://USER:PASSWORD@HOST/DATABASE --legacy-root=/var/www/filesystem --legacy-db-prefix=drupal_
drush.phar php-script profiles/wesnoth_hu/wesnoth_hu_postmigration.php
```

#### Documentations

The `docs/weshu-d8.tjp` file is a [TaskJuggler](http://www.taskjuggler.org/) project file. You can compile it to HTML.

The `docs/specifikacio.adoc` file is an AsciiDoc file, you can use [Asciidoctor](http://asciidoctor.org/) to create a HTML page.

The `docs/mergedocs.sh` file is a bash script which executes the two conversions above, and merges them into an index.html file.
