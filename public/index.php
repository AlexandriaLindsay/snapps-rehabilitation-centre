<?php

  require_once __DIR__ . '/../configsnapps.php';

  $title = 'home page';
  
  
  
  
  include('includes/header.php');
?>
    
    <!-- All contents of the page needs to be wrapped -->
    <div id="wrapper">
      <!-- Start of main content -->
      <main>
        <!-- ID is given to override other h1 headings -->
        <h1 id="snapps"><?=$title?></h1>

        <p>
          <img 
            src="images/cabin.jpg" 
            width="352" 
            height="227" 
            alt="Rehabilitation Center Cabin" 
            id="cabin" 
            title="Snapps Rehabilitation Center"
          />
          
          <!-- The span is styled to contribute design around the paragraph -->
          <span class="innerpara">
            Our goal here at Snapps is to rescue and rehabilitate snapping 
            turtles in need of medical assistance. Our facility has been
            up and running since 2008. We have a strong passion for these endangered
            creatures and we are currently expanding across the country. Please contact 
            us for any inquiries regarding snapping turtles or information about how to keep 
            them protected and be sure to check in on our upcoming events.
          </span>
        </p>
        

        
      </main>
      <!-- End of main content -->
      
      <!-- Start of middle content -->
      <section id="middlecontent">
        
        <h2>Volunteering &amp; Donations</h2>
        
        <a href="#">
        <img 
          src="images/volunteering.jpg" 
          width="230" 
          height="151" 
          alt="Volunteering Link" 
          id="volunteering" 
          title="Volunteering"
        />
        </a>
        
        <a href="donations.php">
        <img 
          src="images/donations.jpg" 
          width="230" 
          height="151" 
          alt="Donations Link" 
          id="donations"
          title="Donations"
        />
        </a>
        
        <!-- contributes to design in the middle content of the page -->
        <div id="verticalrule"></div>
        
        <!-- Call to action for the main page -->
        <a href="#">
        <div id="subscribe">
          Subscribe to Newsletter
        </div>
        </a>
   
      <!-- End of middle content -->
      </section>
      
      <!-- Start of bottom content -->
      <section id="bottomcontent">
       
        <h3>Meet Franklin, the Snapping Turtle!</h3>
        
        <p> 
         <img 
            src="images/franklin_the_turtle_15.jpg"
            width="314"
            height="311"
            alt="Franklin The Turtle"
            id="franklinimage"
            title="Franklin the Snapping Turtle"
          />
          <!-- the Span is styled and contributes design to the bottom content paragraph -->
          <span class="innerpara">
            Franklin was only a hatchling when found by Snapps' certified rescue team.
            Like most hatchlings born, these wonderful creatures make their way to the 
            water to begin their journey of life. Unfortunately many did not make it to the water...
            but one did
            Many of the little ones parished by vehicles as they were crossing the road to get to the 
            river. As the little ones hurried accrossthe road to get to the river, cars left and right 
            zoomed in and 
          </span>
        </p>
      
      
      <!-- End of bottom content -->
      </section>
    </div>
    <!-- End of wrapped contents -->
   <?php
     include('includes/footer.php');
   ?>