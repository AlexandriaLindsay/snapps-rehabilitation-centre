<?php

  require_once __DIR__ . '/../configsnapps.php';

  $title = 'donations';
  
  
  
  include('includes/header.php')
?>
  
    <div id="wrapper">
      
      <!-- Start of main content -->
      <main>
        
        <h1><?=$title?></h1>
        
        <div id="innerborder">
        <!-- Start of form -->
        <form
          method="post"
          action="http://scott-media.com/test/form_display.php"
          id="Shipping_Info"
          autocomplete="on"
        >
          <fieldset>
            <legend>Address Information</legend>

            <p>
              <label for="firstName">First Name:</label>
              <input
                type="text"
                id="firstName"
                name="firstName"
                maxlength="35"
                size="20"
                required="required"
              />
            </p>

            <p>
              <label for="lastName">Last Name:</label>
              <input
                type="text"
                id="lastName"
                name="lastName"
                maxlength="35"
                size="20"
                required="required"
              />
            </p>

            <p>
              <label for="address">Address:</label> 
              <input
                type="text"
                id="address"
                name="address"
                maxlength="35"
                size="20"
                required="required"
              />
            </p>

             <p>
              <label for="phoneNumber">Telephone:</label>
              <input
                type="tel"
                id="phoneNumber"
                name="phoneNumber"
                maxlength="35"
                size="20"
                required="required"
              />
            </p>

            <p>
              <label for="city">City:</label>
              <input
                type="text"
                id="city"
                name="city"
                maxlength="35"
                size="20"
                required="required"
              />
            </p>

            <p>
              Province/State: 

              <select id="provstate" name="provstate">
                <option value="not selected">Choose a Province or State</option>

                <optgroup label="Canada">
                  <option value="Manitoba">Manitoba</option>
                  <option value="Albert">Alberta</option>
                  <option value="Ontario">Ontario</option>
                  <option value="Newfoundland">Newfoundland</option>
                  <option value="British Columbia">British Columbia</option>
                </optgroup>

                <optgroup label="United States">
                  <option value="Arizona">Arizona</option>
                  <option value="Alabama">Alabama</option>
                  <option value="California">California</option>
                  <option value="Delaware">Delaware</option>
                  <option value="Mississippi">Mississippi</option>
                </optgroup>
              </select>
            </p>

            <p>
              <label for="zcode">Zip Code:</label>
              <input
                type="text"
                id="zcode"
                name="zcode"
                maxlength="6"
                size="3"
                required="required"
              />
            </p>

            <p>
              <label>Country:</label>
              <input list="country" name="country" />

              <datalist id="country">
                <option value="Canada"></option>
                <option value="United States"></option>
              </datalist>
              
            </p>
          </fieldset> <br />

          <fieldset>
            <legend>Billing Information</legend>

            <p>
              <input
                type="radio"
                id="visa"
                name="cardtype"
                value="Visa"
              />
              <label for="visa">Visa</label>
            </p>
            
            <p>
              <img 
                src="images/visa.png"
                id="visaC"
                width="64"
                height="64"
                alt="Visa Card Icon"
              /> <br />
            </p>
            
            
            <p>
              <input
                type="radio"
                id="mastercard"
                name="cardtype"
                value="Mastercard"
              />
              <label for="mastercard">Mastercard</label>
            </p>
            
            <p>
              <img 
                src="images/mastercard.png"
                id="masterC"
                width="64"
                height="64"
                alt="Mastercard Icon"
              /> <br />
            </p>
            
            <p>
               <input
                type="radio"
                id="paypal"
                name="cardtype"
                value="Paypal"
              />
              <label for="paypal">Paypal</label>
            </p>
            
            <p>
              <img 
                src="images/paypal.png"
                id="payP"
                width="64"
                height="64"
                alt="Paypal Icon"
              /> 
            </p> <br />

            <p>
              <label for="cardNum">Card Number:</label>
              <input
                type="text"
                id="cardNum"
                name="cardNum"
                maxlength="35"
                size="20"
                required="required"
              />
            </p>

            <p>

              Expiration Date: <br /> 
              <select id="month" name="month">
                <option value="not selected">Month</option>

                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>

              <select id="year" name="year">
                <option value="not selected">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
            </p>

            <p>
              <label for="cvv">CVV:</label>
              <input
                type="text"
                id="cvv"
                name="cvv"
                maxlength="3"
                size="3"
                required="required"
              />
            </p>
          </fieldset>

          <fieldset id="placeorder">
            <legend>Confirm Donation</legend>
            
            <p>
              <input
                type="checkbox"
                id="subscribe"
                name="subscribe"
                value="yes"
                accesskey="s"
              />
              <label for="subscribe">Subscribe for Updates</label>
            </p>

            <p>
              <input type="submit" value="Confirm" /> &nbsp;
              <input type="reset" value="Clear" />
            </p>
          </fieldset>
        </form>
        <!-- End of form -->
        </div>
      
      </main>
      
    </div>
    
    <?php
      include('includes/footer.php');
    ?>