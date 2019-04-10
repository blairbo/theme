<?php
/**
 * Generate CF7 form schema.
 * Still needs a lot of work and probably has bugs.
 *
 * @package  HeadlessPress
 */


function hp_rest_get_contact_form( WP_REST_Request $request ) {

	$id = (int) $request->get_param( 'id' );
  $item = wpcf7_contact_form( $id );
  $properties = $item->get_properties();
  $rawForm = $properties['form'];
  $form = array();

  preg_match_all("/<label>(.*?)<\/label>/s", $rawForm, $labels);
  preg_match_all("/\[[^\]]*\]/", $rawForm, $inputs);

  foreach ($labels[1] as $key=>$label) {
    // create object
    $object = new stdClass();
    // get input
    $input = $inputs[0][$key];
    // collect input meta
    $inputMeta = explode(' ', $input);
    // get input type
    $inputType = preg_replace('/[^a-zA-Z* ]/', '', $inputMeta[0]);
    $inputTypeCleaned = trim($inputType,'*');
    // test required input
    $inputRequired = strpos($inputType, '*') !== false;
    // get input name
    $inputName = str_replace(array('[',']'), '', trim($inputMeta[1]));
    // test placeholder    
    $testPlaceholder = strpos($input, 'placeholder "') !== false;
    
    // create object and push to array
    $object->type       = $inputTypeCleaned;
    $object->label      = trim($label);
    $object->required   = $inputRequired;
    $object->name       = $inputName;
    
    // add placeholder
    if($testPlaceholder) {
      $placeholder = explode("placeholder ", $input);
      $placeholderCleaned = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $placeholder[1]);
      $object->placeholer = trim($placeholderCleaned);
    }

    // add [date] specific
    if($inputTypeCleaned == 'date'){
      $min = explode("min:", $input);
      $max = explode("max:", $input);
      
      $object->min = str_replace("]", "", strtok($min[1], " "));
      $object->max = str_replace("]", "", strtok($max[1], " "));
    }

    // add [select] specific
    if($inputTypeCleaned == 'select'){
      $testMultiple = strpos($input, 'multiple') !== false;
      $object->multiple = $testMultiple;
    }

    // add [checkbox] specific
    if($inputTypeCleaned == 'checkbox'){
      $testExclusive = strpos($input, 'exclusive') !== false;
      $object->exclusive = $testExclusive;
    }

    // add [radio] specific
    if($inputTypeCleaned == 'radio'){
      $default = explode("default:", $input);
      $object->default = $default[1][0];
    }

    // add options from [select], [checkbox], [radio]
    if($inputTypeCleaned == 'select' || $inputTypeCleaned == 'checkbox' || $inputTypeCleaned == 'radio'){
      preg_match_all('/"([^"]+)"/', $input, $options);
      $object->options = $options[1];
    }

    // add input to array
    $form[] = $object;
  }

  // geneate submit object
  $getSubmit = array_search_partial($inputs[0], "[submit");
  $submit = hp_input_submit($inputs[0][$getSubmit]);
  $form[] = $submit;

  
	$response = array(
    'id' => $item->id(),
    'slug' => $item->name(),
    'title' => $item->title(),
    'endpoint' => (get_rest_url(null, 'contact-form-7/v1/contact-forms/') . $id . '/feedback'),
    'form' =>  $form
	);

	return rest_ensure_response( $response );
}


function array_search_partial($arr, $keyword) {
  foreach($arr as $index => $string) {
      if (strpos($string, $keyword) !== FALSE)
          return $index;
  }
}

function hp_input_submit($input){
  $object = new stdClass();
  $label = explode("[submit ", $input);
  $labelCleaned = preg_replace('/[ ](?=[ ])|[^-_,A-Za-z0-9 ]+/', '', $label[1]);
  $object->type = 'submit';
  $object->label = $labelCleaned;
  return $object;
}