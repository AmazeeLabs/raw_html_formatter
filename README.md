# Raw HTML Formatter

A Drupal 8 module that allows to output text fields as raw HTML. For example, it can be used to insert video embed code.

## Use with caution!

**This formatter makes your website open to XSS attacks!** The [corresponding feature request](https://www.drupal.org/node/1678572) was marked as **won't fix** on drupal.org due to security gaps it can bring.

The only filter the module applies to the user input: the text is [processed with DOMDocument](http://stackoverflow.com/a/10988758/580371). This corrects badly formatted HTML, like unclosed tags.
