<?php

/**
 * @file
 * Contains \Drupal\raw_html_formatter\Plugin\Field\FieldFormatter\RawHtmlFormatter.
 */

namespace Drupal\raw_html_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'raw_html' formatter.
 *
 * @FieldFormatter(
 *   id = "raw_html",
 *   label = @Translation("Raw HTML (use with caution!)"),
 *   field_types = {
 *     "string",
 *     "string_long"
 *   }
 * )
 */
class RawHtmlFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {

      // Close unclosed HTML tags first.
      $doc = new \DOMDocument();
      @$doc->loadHTML($item->value);
      $value = $doc->saveHTML();

      // The #markup element is autoescaped, so we use inline template.
      $elements[$delta] = [
        '#type' => 'inline_template',
        '#template' => $value,
      ];
    }
    return $elements;
  }

}
