# CONTENTS OF THIS FILE

  - Introduction
  - usage
  - MInstallation
  - Maintainers

## INTRODUCTION

This module adds an FieldFormatter for an Image field,
which let's you grab the URL of an image directly

While most of the code comes from the core module image's
ImageFormatter.php, some rewriting with templating has
been done. Should be stable.

## Usage:

1.After installation of this module you'll get a new
format type "Image URL" you can assign to any Image Field
in a Content Type. Just go to the Type's "Manage Display"
and choose "Image URL" instead of "Image" from the Format
Combo-Box.

2.Same goes for Image Content Fields in Views, choose
"Image URL" as format and an URL Type out of
'Full' (default), 'Absolute' or 'Relative'.

3.Now the image's URL in the chosen form will be returned
instead of the full <img> tag.

4.As there seems to be an issue with "Global: Custom Text"
at the moment (21/08/15), just use the Template TWIG
for formatting your output or overwrite the Template
in your Profile.

## INSTALLATION

  - Install the Image URL Formatter module as you would normally install a contributed
    Drupal module. Visit
    <https://www.drupal.org/node/1897420> for further information.

## MAINTAINERS

- g089h515r806 - <https://www.drupal.org/u/g089h515r806>
