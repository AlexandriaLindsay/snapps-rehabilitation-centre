<?php


  require_once __DIR__ . '/../configsnapps.php';

  $title = 'chelydra serpentina';
  
  
  include('includes/header.php');
?>
    <div id="wrapper">
      <!-- Start of main content -->
      <main>
      
        <h1><?=$title?></h1>
        
        
           <img
            src="images/chelydra_serpentina_2.jpg"
            width="960"
            height="540"
            alt="Common Snapping Turtle"
            id="commonturtle"
          />
        
        <!-- Start of table -->
        <table>
        
          <caption>Chelydra Serpentina</caption>
          <tr>
            <th>Range</th>
            <td>
              <p>
                Snapping turtles range across the eastern United States to the Rocky Mountains, from southern Canada to the Gulf of Mexico, and into Central America. They have been introduced in some western states.
              </p>
            </td>
          </tr>

          <tr>
            <th>Habitat and Diet</th>
            <td> 
              <p>
                Snapping turtles are almost entirely aquatic and can be found in a wide variety of aquatic habitats, preferably with slow-moving water and a soft muddy or sandy bottom. As omnivores, snapping turtles feed on plants, insects, spiders, worms, fish, frogs, small turtles, snakes, birds, crayfish, small mammals, and carrion.
              </p>
            </td>
          </tr>

          <tr>
            <th>Life History</th>
            <td>  
              <p>
                Snapping turtles rarely leave their aquatic habitat except during the breeding season, at which time females travel great distances in search of a place to dig a nest and lay eggs. Some turtles have been found as far as a mile from the nearest water source. Selected nest sites include banks, lawns, gardens, road embankments, and sometimes muskrat burrows.
              </p>
            </td>
          </tr>

          <tr>
            <th>Interesting Facts</th>
            <td> 
              <p>
                Snapping turtles are nocturnal and spend most of the time underwater, lying on the bottom of the waterbody. Their dark-colored skin and moss-covered shell enables the turtles to lie in wait and ambush their prey. Usually docile in water, snapping turtles can be aggressive during the breeding season when they are found traveling across land.
              </p>
            </td>
          </tr>

          <tr>
            <th>Management of Problems</th>
            <td>  
              <p>
                Snapping turtles have a reputation for decimating game fish and waterfowl populations. Scientific research, however, indicates that this is rarely the case. Studies have shown that snapping turtles eat insignificant amounts of game fish, and that mammalian nest predators and large fish kill far more waterfowl than do snapping turtles. In natural situations, snapping turtles have no significant impact on fish or waterfowl populations.
              </p>
            </td>
          </tr>
        </table>
        <!-- End of table -->
      </main>
    </div>
    
   <?php
     include('includes/footer.php');
   ?>