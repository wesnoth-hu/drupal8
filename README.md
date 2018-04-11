# The wesnoth.fsf.hu Project

## Magyar

A wesnoth.fsf.hu portál fájljai.

### Telepítés

#### Drupal 6

A telepítéshez szükség van [composerre](http://getcomposer.org/). A következő lépéseket kövesd:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project/drupal6
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

#### Drupal 7

A telepítéshez szükség van [composerre](http://getcomposer.org/) és [drushra](http://www.drush.org/en/master/). A következő lépéseket kövesd:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project/drupal7
composer.phar install
cd web
drush site-install standard --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal7_ --locale=hu
```

#### Drupal 8

A telepítéshez szükség van [composerre](http://getcomposer.org/) és [drushra](http://www.drush.org/en/master/). A következő lépéseket kövesd:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project/drupal8
composer.phar install
cd web
drush site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal8_ --locale=hu
```

### Frissítés

#### Drupal 6-ról 7-re

Telepítsük az előző fejezetben leírtak alapján a 6 és 7-es verziót. A site-aliases mappában másoljuk le a sample fájlt, majd töltsük ki a Drupal 7 oldal megfelelő adataival. Ezután lépjünk bele a Drupal 6-os könyvtárba, majd adjuk ki a következő parancsot:

```shell
cd drupal6/web
../vendor/bin/drush site-upgrade --alias-path=../../site-aliases/ @wesnoth-d7
```

#### Drupal 6-ról 8-ra

__FONTOS!__ A Drupal 6-ról 8-ra frissítés sokáig tervben volt, azonban a 7-re frissítés egyszerűbb és gyorsabb, ezért a portálnál ezt a módszert választottuk.

```shell
drush.phar pm-enable -y migrate_upgrade migrate_plus migrate_tools
drush.phar migrate-upgrade --legacy-db-url=mysql://USER:PASSWORD@HOST/DATABASE --legacy-root=/var/www/filesystem --legacy-db-prefix=drupal_
drush.phar php-script profiles/wesnoth_hu/wesnoth_hu_postmigration.php
```

### Dokumentáció

A `docs/weshu-d8.tjp` fájl egy [TaskJuggler](http://www.taskjuggler.org/) projekt fájl. A segítségével HTML készíthető belőle.

A `docs/specifikacio.adoc` fájl egy AsciiDoc fájl, az [Asciidoctorral](http://asciidoctor.org/) HTML készíthető belőle.

A `docs/mergedocs.sh` fájl egy bash script, ami a fenti kettő generálást elvégzi, és az eredményüket összefésüli egy index.html fájlba.

## English

Project related files for the wesnoth.fsf.hu site

### Installation

#### Drupal 6

For the installation you need [composer](http://getcomposer.org). Follow these steps:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project/drupal6
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

#### Drupal 7

For the __installation__ you need [composer](http://getcomposer.org) and [drush](http://www.drush.org/en/master). Follow these steps:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project/drupal7
composer.phar install
cd web
drush.phar site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal7_ --locale=hu
```

#### Drupal 8

For the __installation__ you need [composer](http://getcomposer.org) and [drush](http://www.drush.org/en/master). Follow these steps:

```shell
git clone git@github.com:wesnoth-hu/project.git
cd project/drupal8
composer.phar install
cd web
drush.phar site-install wesnoth_hu --db-url=mysql://USER:PASSWORD@HOST/DATABASE --db-prefix=drupal8_ --locale=hu
```

### Upgrade

#### From Drupal 6 to 7

Install both instances as discribed in the last section. Then we should copy and modify hte sample file in the site-aliases folder with the correct parameters of the Drupal 7 site. Then step into the Drupal 7 folder and issue the site-upgrade command:

```shell
cd drupal6/web
../vendor/bin/drush site-upgrade --alias-path=../../site-aliases @wesnoth-d7
```

#### From Drupal 6 to 8

__IMPORTANT!__ The Drupal 6 to 8 upgrade was planned for a long time, but upgrading to 7 seems easier and faster, therefore we choose that one for the site.

```shell
drush.phar pm-enable -y migrate_upgrade migrate_plus migrate_tools
drush.phar migrate-upgrade --legacy-db-url=mysql://USER:PASSWORD@HOST/DATABASE --legacy-root=/var/www/filesystem --legacy-db-prefix=drupal_
drush.phar php-script profiles/wesnoth_hu/wesnoth_hu_postmigration.php
```

#### Documentations

The `docs/weshu-d8.tjp` file is a [TaskJuggler](http://www.taskjuggler.org/) project file. You can compile it to HTML.

The `docs/specifikacio.adoc` file is an AsciiDoc file, you can use [Asciidoctor](http://asciidoctor.org/) to create a HTML page.

The `docs/mergedocs.sh` file is a bash script which executes the two conversions above, and merges them into an index.html file.
