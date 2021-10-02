<?php

namespace Alex;

class Validator
{

  private $errors = [];
  private $clean = [];
  
  /**
   * Constructor
   * @return Int
   */
  public function __construct()
  {
    $this->clean = $this->cleanArray($_POST); 
  }
  

  public function getErrors() 
  {
  
    return $this->errors;
  }

  
  public function getClean() 
  {
  
    return $this->clean;
  }


  /**
   * Check for empty fields
   * @param Int $field_name 
   * @return Int
   */
  public function required($field_name)
  {

    if(empty($_POST[$field_name])){
  
    $this->errors[$field_name] = "$field_name is a required field";
    }
  }


  /**
   * Check for valid email address
   * @param Int $field_name 
   * @return Int
   */
  public function email($field_name)
  {

    if(filter_var($_POST[$field_name], FILTER_VALIDATE_EMAIL) != $_POST[$field_name]){
    
      $this->errors[$field_name] = 'Invalid email';
    }

  }


  /**
   * Check if passwords match
   * @return Int
   */
  public function confirmPass($field_name1, $field_name2, $errors)
  {

    if($_POST[$field_name1] != $_POST[$field_name2]){
  
      $this->errors[$field_name2] = 'passwords do not match';
    }
  
    return $errors;
  }
  

  public function validPass($field_name)
  {
    if(!empty($_POST[$field_name])) {

      $pattern = '/(?=.*[A-Z]+)(?=.*[a-z]+)(?=.*[\d]+)(?=.*[\!\@\#\$\%\^\&\*\(\)\-\+]+)[A-Za-z0-9\!\@\#\$\%\^\&\*\(\)\-\+]{10,}/';

      $pass_array = [

          ':$field_name' => $_POST[$field_name]
      ];

      foreach($pass_array as $string) {

        preg_match($pattern, $string, $matches);

        if(!isset($matches[0]) || ($string != $matches[0])) {

          $this->errors[$field_name] = "Password must contain<br /><ul><li>Capital letter</li><li>Number</li><li>Special character</li></ul>";
        }
      }
    }
  }


  public function validPhone($field_name)
  {
    if(!empty($_POST[$field_name])) {

      $pattern = '/^([1]?[\d]{3})[-\.\s]?([\d]{3})[-\.\s]?([\d]{4})$/';

      $phone_array = [

          ':field_name' => $_POST[$field_name]
      ];

      foreach($phone_array as $string) {

        preg_match($pattern, $string, $matches);

        if(!isset($matches[0]) || ($string != $matches[0])) {

          $this->errors[$field_name] = "{$string} is not a valid phone number";
        }
      }
    }
  }
   

  /**
     * Check if postal code is valid
     * @param Int $field_name 
     * @return Int
     */  
  public function postal($field_name)
  {
    if(!empty($_POST[$field_name])) {

      $pattern = '/([a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9])-?\s?([a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9])/';

      $zip_array = [          

          ':$field_name' => $_POST[$field_name]
      ];

      foreach($zip_array as $string) {

        preg_match($pattern, $string, $matches);
      
      
        if(!isset($matches[0]) || ($string != $matches[0])) {

          $this->errors[$field_name] = "{$string} is not a valid postal code";
        }
      }
    }
  }


  /**
   * Clean form input values
   * @param Int $tainted_array 
   * @return Int
   */
  private function cleanArray($tainted_array)
  {
    
    $clean = [];

    foreach($tainted_array as $key => $value){

      $clean[$key] = htmlentities(strip_tags($value));
    }
    return $clean;
  }

    
}// End class






