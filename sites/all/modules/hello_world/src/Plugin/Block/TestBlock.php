<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'Test' Block.
 *
 * @Block(
 *   id = "test_block",
 *   admin_label = @Translation("Test block by the block module"),
 *   category = @Translation("Hello World"),
 * )
 */
class TestBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    return array(
      '#markup' => $this->t('This is my first test block ! By ').$config['test_block_name'] ,
    );
  }


  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['test_block_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['test_block_name']) ? $config['test_block_name'] : '',
    );

    $form['test_block_force'] = array(
      '#type' => 'number',
      '#title' => $this->t('How many force ?'),
      '#description' => $this->t('Choose the force of your block ! (it\'s very badass)?'),
      '#default_value' => isset($config['test_block_force']) ? $config['test_block_force'] : 1,
    );


    return $form;
  }
  
    /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['test_block_name'] = $values['test_block_name'];
    $this->configuration['test_block_force'] = $values['test_block_force'];
  }
}
