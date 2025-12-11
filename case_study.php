<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Case Study: Eat My Food | Recipe Database Project</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php include 'header.php'; ?>

<!-- CASE STUDY MAIN CONTENT -->
<main>
  
  <!-- Hero Section -->
      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/casestudy2.jpg" alt="Eat My Food homepage" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
      </div>

  <!-- Intro Section -->
  <section class="intro">
    <h2>CASE STUDY: EAT MY FOOD</h2>
    <p>A full stack recipe platform built with PHP and MySQL for IDM 232</p>
  </section>

  <!-- Main Case Study Content -->
  <section class="recipes">
    
    <!-- Overview -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">The Overview</h2>
      
      <div class="cards" style="margin-bottom: 2rem;">
        <div class="card" style="padding: 1.5rem;">
          <h4>Project Type</h4>
          <p>Recipe Database Application</p>
        </div>
        
        <div class="card" style="padding: 1.5rem;">
          <h4>Timeline</h4>
          <p>10 Week Academic Project (Fall 2024)</p>
        </div>
        
        <div class="card" style="padding: 1.5rem;">
          <h4>Technologies</h4>
          <p>PHP, MySQL, HTML, CSS</p>
        </div>
      </div>

      <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
        <p style="font-size: 1.1rem;"><strong>Eat My Food</strong> is a recipe website built for Drexel's 
        IDM 232 class. The site uses PHP and MySQL to dynamically display recipes from a database, making it easy to search and
         browse through different meal options. Instead of creating 40+ individual HTML pages, everything is pulled from one database.
          This makes the site easier to update and maintain while giving users a smooth browsing experience.</p>
      </div>

      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/casestudy1.jpg" alt="Eat My Food homepage" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Homepage hero section</p>
      </div>
    </div>

    <!-- Context and Challenge -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">Context and Challenge</h2>
      
      <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto 3rem;">
        <p style="font-size: 1.1rem;">The goal was to build a recipe website using PHP and MySQL instead of making individual HTML 
          pages for each recipe. This was part of a 10 week class project at Drexel, and it was my first time working with databases 
          and server side code.</p>
      </div>

      <div class="cards">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Learning MySQL & PHP</h4>
          <p>This was my first time using databases and PHP. I had to figure out how to set up MySQL tables, connect them to PHP, and pull 
            data dynamically instead of hard coding everything.</p>
        </div>

        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Making Pages Dynamic</h4>
          <p>Instead of creating separate HTML files for 40+ recipes, I needed to create some templates that could display any recipe based on
             what the database sends. This meant handling different ingredient lengths and step counts.</p>
        </div>

        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Design & Branding</h4>
          <p>I wanted the site to have personality beyond just being functional. The challenge was balancing the playful, slightly sarcastic 
            tone ("eat my food") with a clean, usable interface.</p>
        </div>
      </div>

      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/casestudy3.jpg" alt="Eat My Food homepage" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
      </div>
    </div>

    <!-- Process and Insight -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">Process and Insight</h2>

      <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto 3rem;">
        <p style="font-size: 1.1rem;">I built this site step by step over 10 weeks. Started with the basic CSS, the database, then wrote PHP code to connect 
          everything.</p>
      </div>

      <!-- Step 1 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">01. Setting Up the Database</h4>
          <p>Imported a spreadsheet (CSV) into phpMyAdmin with all the recipe info like title, 
            description, ingredients, steps, and image names. Each recipe is one row in the database. 
            Setting this up in a spreadsheet first was way easier than typing in 40+ recipes by hand.</p>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">02. Writing the PHP Code</h4>
          <p>Made separate PHP files for different parts of the site. One file connects to the database 
            (db.php), another handles the header and footer, and another displays recipe cards. This way I could 
            reuse the same code on multiple pages instead of copying and pasting. The recipe card 
            code works on both the homepage and recipes page, so if I need to change something, I 
            only fix it once.</p>
        </div>
      </div>

      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/casestudy4.jpg" alt="Eat My Food homepage" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);"><br><br>
      </div>

      <!-- Step 3 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">03. Adding Search & Filters</h4>
          <p>Added a search bar in the header so you can search from any page. Also added category 
            buttons (meat, vegetarian, pasta, etc.) on the recipes page to narrow things down. The 
            database finds matching recipes based on what you type or select. Putting the search bar 
            where people can always see it made it easier to use.</p>
        </div>
      </div>

      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/casestudy5.jpg" alt="Eat My Food homepage" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);"><br><br>
      </div>

      <!-- Step 4 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">04. Designing the Look</h4>
          <p>Picked a color scheme (dark greens, tans, browns) and the Open Sans font. I 
            set up the colors as variables in CSS so I could use them everywhere without 
            remembering the exact codes. Keeping the same colors and fonts on every page 
            makes it look more put together.</p>
        </div>
      </div>
    </div>

    <!-- The Solution -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">The Solution</h2>

      <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">The site runs off one MySQL database. 
          Instead of making 40+ separate HTML pages, one PHP template pulls the recipe info (title, 
          ingredients, steps, images) and builds the page on the fly.</p>
        
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">There's a search bar in the header that 
          works from any page, plus category filters (meat, vegetarian, pasta, etc.) on the recipes page. 
          The code is broken into reusable files. db.php handles the database connection, recipe_card.php 
          displays the cards, and the header and footer are shared across every page.</p>
        
        <p style="font-size: 1.1rem;">The layout adjusts automatically based on screen size, going down to 1 column on phones. The look is 
          tied together with a green/tan/brown color scheme, Open Sans font, hover effects, and a custom 404 page that keeps the same playful vibe.</p>
      </div>
    </div>

    <!-- The Results -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">The Results</h2>

      <div class="card" style="text-align: left; padding: 2rem; max-width: 900px; margin: 0 auto;">
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">The final site makes it easy for users to find what they want. 
          The search bar is always visible in the header, filters let people narrow down by category, and the recipe cards give 
          a quick preview before clicking in.</p>
        
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">From a development side, planning the database structure early made 
          the rest of the project smoother. Breaking the code into reusable pieces like the recipe card function means less repetition 
          and fewer places for things to break.</p>
        
        <p style="font-size: 1.1rem;">Overall the site does what it needs to do. Users can browse, search, and view recipes.</p>
      </div>
    </div>

    <!-- CTA -->
    <div class="see-all">
      <a href="index.php" class="see-all-link">Visit Eat My Food →</a>
    </div>

  </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>