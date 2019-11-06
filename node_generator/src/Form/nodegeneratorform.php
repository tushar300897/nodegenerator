<?php
/**
  * @file
  * Contains\Drupal\Node Generator\Form\Form
  */
namespace Drupal\node_generator\Form;

//use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
/**
  * Provides an Node Generator form
  */
class nodegeneratorform extends FormBase {
  /**
    * (@inheritdoc)
    */
  public function getFormId() {
    return 'node_generatorform';
  }	
  /**
    * (@inheritdoc)
    */
  public function buildForm(array $form, FormStateInterface $form_state){
  	$form['content_type'] = array(
	  '#title' => t('SELECT'),
	  '#type' => 'select',
	  '#description' => 'A select list with  all the available content types',
	  '#options' => array(t('Content Types'), t('article'), t('basic page')
	));

  	$form['no_of_nodes'] = array(
  '#title' => t('No. of Nodes'),
  '#type' => 'textfield',
  '#description' => 'A select list with  all the available content types'
);
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit')
  );
  return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('No. of Nodes');
    if ($value < 2 or $value > 10) {
      $form_state->setErrorByName ('No. of Nodes', t('Node value should not be greater than 5'));
      }
    }
  public function submitForm(array &$form,FormStateInterface $form_state){
  	 $value = $form_state->getValue('No. of Nodes');
     $value1 = $form_state->getValue('content_type');

     for ($x = 1; $x < $value; $x++){
     	$nodeObj = Node::create([
      'type' => 'article',
      'title' => 'Programatically created Article',
      ]);
     	$nodeObj->save(); // Saving the Node object.
      
      
 
     }

  }
}