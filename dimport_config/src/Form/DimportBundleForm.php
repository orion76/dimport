<?php

namespace Drupal\dimport_config\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DimportBundleForm.
 */
class DimportBundleForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $dimport_bundle = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $dimport_bundle->label(),
      '#description' => $this->t("Label for the Bundle."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $dimport_bundle->id(),
      '#machine_name' => [
        'exists' => '\Drupal\dimport_config\Entity\DimportBundle::load',
      ],
      '#disabled' => !$dimport_bundle->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $dimport_bundle = $this->entity;
    $status = $dimport_bundle->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Bundle.', [
          '%label' => $dimport_bundle->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Bundle.', [
          '%label' => $dimport_bundle->label(),
        ]));
    }
    $form_state->setRedirectUrl($dimport_bundle->toUrl('collection'));
  }

}
