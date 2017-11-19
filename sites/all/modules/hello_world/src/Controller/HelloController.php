<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 */
namespace Drupal\hello_world\Controller;
class HelloController {

  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, World!'),
    );
  }
  
  public function test() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This is a test!'),
    );
  }
}