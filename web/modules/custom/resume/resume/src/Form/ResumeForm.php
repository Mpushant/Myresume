<?php
/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm.
 */
namespace Drupal\resume\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;


class ResumeForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'resume_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['form_type'] = array (
      '#type' => 'select',
      '#title' => ('Form Type'),
      '#required' => TRUE,
      '#options' => array(
        'Resume Form' => t('Resume Form'),
      ),
    );

    $form['full_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Full Name:'),
      '#required' => TRUE,


    );


    // $form['candidate_gender'] = array (
    //   '#type' => 'select',
    //   '#title' => ('Gender'),
    //   '#options' => array(
    //     'Select' =>t('Select'),
    //     'Male' => t('Male'),
    //     'Female' => t('Female'),
    //   ),
    // );

    $form['email_id'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#required' => TRUE,
    );

    $form['phone_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Phone no'),
      '#required' => TRUE,
      '#attributes' => array('placeholder' => t('Enter Your Mobile Number'),)
    );

    // $form['candidate_address'] = array (
    //   //'#type' => 'multivalue',
    //   '#type' => 'textarea',
    //   '#title' => t('Address'),
    //   '#attributes' => array('placeholder' => t('Enter your current address!'),)
    // );
    // $form['candidate_dob'] = array (
    //   '#type' => 'date',
    //   '#title' => t('Date of Birth'),
    //   '#required' => TRUE,
    // );
    $form['achievements'] = array(
      '#type' => 'textarea',
      '#title' => t('Achievements'),
      '#required' => TRUE,
    );
    $form['ssc'] = array(
      '#type' => 'textfield',
      '#title' => t('SSC'),
      '#required' => TRUE,
    );
    $form['hsc'] = array(
      '#type' => 'textfield',
      '#title' => t('HSC'),
      '#required' => TRUE,
    );
    $form['ug_pg'] = array(
      '#type' => 'textfield',
      '#title' => t('UG/PG'),
      '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit Resume'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
    // public function validateForm(array &$form, FormStateInterface $form_state) {

    //   // if (strlen($form_state->getValue('candidate_number')) < 10) {
    //   //   $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
    //   // }

    // }

  /**
   * {@inheritdoc}
   */

public function submitForm(array &$form, FormStateInterface $form_state) {
      //foreach ($form_state->getValues() as $key => $value) {
       //\Drupal::messenger()->addMessage($this->t($key . ': ' . $value));

       $node = Node::create(['type' => resume ]);
       $node->title= $form_state->getValue('form_type');
       $node->field_name= $form_state->getValue('full_name');
       $node->field_email= $form_state->getValue('email_id');
       $node->field_contact_no= $form_state->getValue('phone_number');
      //  $node->field_address= $form_state->getValue('candidate_address');
      //  $node->field_date_of_birth= $form_state->getValue('candidate_dob');
       $node->field_achievements= $form_state->getValue('achievements');
      //  $node->field_gender= $form_state->getValue('candidate_gender');
       $node->field_ssc= $form_state->getValue('ssc');
       $node->field_hsc_diploma= $form_state->getValue('hsc');
       $node->field_degree= $form_state->getValue('ug_pg');



       $node->save();
       $nid=$node->id();
             \Drupal::messenger()->addMessage($this->t('Resume data has been saved!'));
             $url = \Drupal\Core\Url::fromRoute('resume.resumecreate', ['nid' => $node->id()]);
            $form_state->setRedirectUrl($url);
        }
       
        }
