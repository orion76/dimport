<?php

namespace Drupal\dimport_config\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DimportSourceForm.
 */
class DimportSourceForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $dimport_source = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $dimport_source->label(),
      '#description' => $this->t("Label for the Source."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $dimport_source->id(),
      '#machine_name' => [
        'exists' => '\Drupal\dimport_config\Entity\DimportSource::load',
      ],
      '#disabled' => !$dimport_source->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $dimport_source = $this->entity;
    $status = $dimport_source->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Source.', [
          '%label' => $dimport_source->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Source.', [
          '%label' => $dimport_source->label(),
        ]));
    }
    $form_state->setRedirectUrl($dimport_source->toUrl('collection'));
  }

}
