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
  <section class="hero">
    <img src="images/case-study/hero-mockup.jpg" alt="Eat My Food website overview">
  </section>

  <!-- Intro Section -->
  <section class="intro">
    <h2>CASE STUDY: EAT MY FOOD</h2>
    <p>A full-stack recipe platform built with PHP and MySQL for IDM 232</p>
  </section>

  <!-- Main Case Study Content -->
  <section class="recipes">
    
    <!-- Overview -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">The Overview</h2>
      
      <div class="cards" style="margin-bottom: 2rem;">
        <div class="card" style="padding: 1.5rem;">
          <h4>Project Type</h4>
          <p>Full-Stack Recipe Database Application</p>
        </div>
        
        <div class="card" style="padding: 1.5rem;">
          <h4>Timeline</h4>
          <p>10-Week Academic Project (Fall 2024)</p>
        </div>
        
        <div class="card" style="padding: 1.5rem;">
          <h4>Technologies</h4>
          <p>PHP, MySQL, HTML, CSS</p>
        </div>
      </div>

      <div style="text-align: center; max-width: 800px; margin: 0 auto; padding: 0 2rem;">
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;"><strong>Eat My Food</strong> is a recipe website built for Drexel's IDM 232 class. The site uses PHP and MySQL to dynamically display recipes from a database, making it easy to search and browse through different meal options.</p>
        
        <p style="font-size: 1.1rem;">Instead of creating 40+ individual HTML pages, everything is pulled from one database. This makes the site easier to update and maintain while giving users a smooth browsing experience.</p>
      </div>

      <!-- NOTE: INSERT IMAGE HERE - Screenshot of homepage or key feature -->
      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/case-study/homepage-screenshot.jpg" alt="Eat My Food homepage" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Homepage featuring hero image and featured recipe cards</p>
      </div>
    </div>

    <!-- Context and Challenge -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">Context and Challenge</h2>
      
      <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem; padding: 0 2rem;">
        <p style="font-size: 1.1rem;">The goal was to build a recipe website using PHP and MySQL instead of making individual HTML pages for each recipe. This was part of a 10-week class project at Drexel, and it was my first time working with databases and server-side code.</p>
      </div>

      <div class="cards">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Learning MySQL & PHP</h4>
          <p>This was my first time using databases and PHP. I had to figure out how to set up MySQL tables, connect them to PHP, and pull data dynamically instead of hard-coding everything.</p>
        </div>

        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Making Pages Dynamic</h4>
          <p>Instead of creating separate HTML files for 40+ recipes, I needed to create one template that could display any recipe based on what the database sends. This meant handling different ingredient lengths and step counts.</p>
        </div>

        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Design & Branding</h4>
          <p>I wanted the site to have personality beyond just being functional. The challenge was balancing the playful, slightly sarcastic tone ("eat my food") with a clean, usable interface.</p>
        </div>
      </div>

      <!-- NOTE: INSERT IMAGE HERE - Database schema or wireframes -->
      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/case-study/database-structure.jpg" alt="Database architecture" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Database schema and table relationships</p>
      </div>
    </div>

    <!-- Process and Insight -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">Process and Insight</h2>

      <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem; padding: 0 2rem;">
        <p style="font-size: 1.1rem;">I built this site step-by-step over 10 weeks. Started with the database, then wrote PHP code to connect everything, and finally designed the frontend. Here's how it came together:</p>
      </div>

      <!-- Step 1 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">01. Setting Up the Database</h4>
          <p>Created a MySQL database to store all the recipe info titles, ingredients, steps, images, and categories. Used prepared statements in PHP to prevent SQL injection attacks.</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>What I did:</strong> Split ingredients and steps using asterisks (*) as separators, so PHP could easily break them apart</li>
            <li><strong>What I learned:</strong> Good database structure makes everything else easier later on</li>
          </ul>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">02. Writing the PHP Code</h4>
          <p>Built separate PHP files for different parts of the site one for database connections (db.php), one for headers/footers, and one for displaying recipe cards. This made the code reusable instead of copying and pasting everywhere.</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>What I did:</strong> Made a recipe card function that both the homepage and recipes page could use</li>
            <li><strong>What I learned:</strong> Breaking code into small pieces saves tons of time when you need to change something</li>
          </ul>
        </div>
      </div>

      <!-- NOTE: INSERT IMAGE HERE - Code snippet or development process -->
      <div style="text-align: center; margin: 3rem 0;">
        <img src="images/case-study/code-structure.jpg" alt="Code architecture" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Modular PHP component structure</p>
      </div>

      <!-- Step 3 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">03. Adding Search & Filters</h4>
          <p>Added a search bar in the header so you can search from any page. Also made category filters (meat, vegetarian, pasta, etc.) on the recipes page. Used SQL queries to find matching recipes.</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>What I did:</strong> Put the search bar in the header instead of hiding it on a separate page</li>
            <li><strong>What I learned:</strong> People use features more when they're easy to find</li>
          </ul>
        </div>
      </div>

      <!-- Step 4 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">04. Designing the Look</h4>
          <p>Chose a color scheme (dark greens, tans, browns) and the Open Sans font. Wanted it to look clean and professional but with some personality in the copy and branding.</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>What I did:</strong> Used CSS variables so I could change colors easily across the whole site</li>
            <li><strong>What I learned:</strong> Consistency matters using the same colors and fonts everywhere makes it look more professional</li>
          </ul>
        </div>
      </div>

      <!-- NOTE: INSERT IMAGE HERE - Design system or style guide -->
      <div style="text-align: center; margin: 3rem 0;">
        <img src="images/case-study/design-system.jpg" alt="Color palette and typography" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Brand colors, typography, and UI components</p>
      </div>

      <!-- Step 5 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">05. Making It Responsive</h4>
          <p>Used CSS Grid and Flexbox to make the layout work on any screen size. Added the HTML picture element to serve different image sizes depending on whether you're on mobile or desktop.</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>What I did:</strong> CSS Grid automatically adjusts the number of columns based on screen width</li>
            <li><strong>What I learned:</strong> Smaller images on mobile = faster loading times</li>
          </ul>
        </div>
      </div>

      <!-- Step 6 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">06. Polish & Details</h4>
          <p>Added hover effects on recipe cards, smooth page transitions, and a custom 404 error page that matches the site's personality ("It might've been eaten 🍽️").</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>What I did:</strong> Made the error page funny instead of generic</li>
            <li><strong>What I learned:</strong> Small animations make the site feel more polished</li>
          </ul>
        </div>
      </div>

    <!-- The Solution -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">The Solution</h2>

      <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem; padding: 0 2rem;">
        <p style="font-size: 1.1rem;">The final site is a working recipe database with search, filters, and responsive design. Everything pulls from one MySQL database, so updating or adding recipes is easy.</p>
      </div>

      <!-- Feature 1 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">Dynamic Recipe Pages</h4>
          <p>One PHP template creates all the recipe pages. Instead of 40+ separate HTML files, the database sends the info and PHP builds the page:</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li>Recipe images (different sizes for mobile vs. desktop)</li>
            <li>Ingredient lists pulled from the database</li>
            <li>Step-by-step instructions with photos</li>
            <li>All images organized by recipe folder</li>
          </ul>
          <!-- NOTE: INSERT IMAGE HERE - Single recipe page example -->
          <div style="text-align: center; margin-top: 2rem;">
            <img src="images/case-study/recipe-detail.jpg" alt="Recipe detail page" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
            <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Dynamic recipe page with ingredients and step-by-step instructions</p>
          </div>
        </div>
      </div>

      <!-- Feature 2 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">Search & Filters</h4>
          <p>Two ways to find recipes:</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li>Search bar in the header—works from any page</li>
            <li>Category filters on the recipes page (Meat, Vegetarian, Dairy, Pasta, Seafood)</li>
            <li>Can combine search + filters for specific results</li>
            <li>Searches recipe titles, subtitles, and descriptions</li>
          </ul>
          <!-- NOTE: INSERT IMAGE HERE - Search/filter interface -->
          <div style="text-align: center; margin-top: 2rem;">
            <img src="images/case-study/search-filter.jpg" alt="Search and filter interface" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
            <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Category filtering and search functionality on recipes page</p>
          </div>
        </div>
      </div>

      <!-- Feature 3 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">Organized Code Structure</h4>
          <p>Split everything into reusable pieces:</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>db.php:</strong> Database connection that all pages use</li>
            <li><strong>recipe_card.php:</strong> Function that makes recipe cards for homepage and recipes page</li>
            <li><strong>header.php & footer.php:</strong> Navigation and footer on every page</li>
            <li><strong>Prepared statements:</strong> Keeps the site safe from SQL injection</li>
          </ul>
        </div>
      </div>

      <!-- Feature 4 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">Works on All Devices</h4>
          <p>Mobile-friendly design:</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li>CSS Grid adjusts from 1 to 4 columns depending on screen size</li>
            <li>Navigation collapses vertically on phones</li>
            <li>Different image sizes for mobile vs. desktop (faster loading)</li>
            <li>Touch-friendly buttons and links</li>
          </ul>
        </div>
      </div>

      <!-- Feature 5 -->
      <div style="margin-bottom: 3rem;">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4 style="font-size: 1.4rem; margin-bottom: 1rem;">Design & Personality</h4>
          <p>Clean design with some attitude:</p>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li>Green/tan/brown color scheme with CSS variables</li>
            <li>Open Sans font with different weights</li>
            <li>Hover effects and smooth transitions</li>
            <li>Custom 404 page that stays on-brand</li>
            <li>Playful copy ("whatever is rotting in your fridge")</li>
          </ul>
        </div>
      </div>

      <!-- NOTE: INSERT IMAGE HERE - Feature showcase or UI components -->
      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/case-study/ui-components.jpg" alt="UI component showcase" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Key UI components and interactive elements</p>
      </div>
    </div>

    <!-- The Results -->
    <div style="margin-bottom: 4rem;">
      <h2 style="text-align: center; margin-bottom: 2rem;">The Results</h2>

      <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem; padding: 0 2rem;">
        <p style="font-size: 1.1rem;">The site works. It's a functional recipe database with search, filters, and responsive design. I went from knowing nothing about PHP/MySQL to building a complete web application.</p>
      </div>

      <div class="cards">
        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>What I Built</h4>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>100% database-driven</strong> – No hard-coded recipe pages</li>
            <li><strong>6 PHP pages</strong> – Clean, organized code</li>
            <li><strong>Prepared statements</strong> – Safe from SQL attacks</li>
            <li><strong>Fully responsive</strong> – Works on any device</li>
          </ul>
        </div>

        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Features That Work</h4>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>Search function</strong> – Searches titles, subtitles, and descriptions</li>
            <li><strong>Category filters</strong> – 5 categories to narrow results</li>
            <li><strong>Smart images</strong> – Different sizes for different screens</li>
            <li><strong>Custom 404 page</strong> – Error handling with personality</li>
          </ul>
        </div>

        <div class="card" style="text-align: left; padding: 2rem;">
          <h4>Design Choices</h4>
          <ul style="list-style: disc; margin-left: 1.5rem; margin-top: 1rem; line-height: 1.7;">
            <li><strong>Consistent look</strong> – Same colors and fonts everywhere</li>
            <li><strong>Reusable code</strong> – No copy-pasting</li>
            <li><strong>Clean HTML</strong> – Semantic tags and labels</li>
            <li><strong>Fast loading</strong> – Optimized images and queries</li>
          </ul>
        </div>
      </div>

      <!-- What I Learned -->
      <div style="margin-top: 3rem;">
        <h2 style="text-align: center; margin-bottom: 2rem;">What I Learned</h2>
        
        <div style="margin-bottom: 2rem;">
          <div class="card" style="text-align: left; padding: 2rem;">
            <h4 style="font-size: 1.3rem;">Database Setup Is Important</h4>
            <p>How you structure your database affects everything else. Using asterisks to separate ingredients made it easy to split them in PHP later. If I did it again, I might use separate tables for more flexibility.</p>
          </div>
        </div>

        <div style="margin-bottom: 2rem;">
          <div class="card" style="text-align: left; padding: 2rem;">
            <h4 style="font-size: 1.3rem;">Break Code Into Pieces</h4>
            <p>Making reusable PHP functions saved so much time. The recipe card function worked on multiple pages, so I only had to write it once. This is something I'll use in future projects.</p>
          </div>
        </div>

        <div style="margin-bottom: 2rem;">
          <div class="card" style="text-align: left; padding: 2rem;">
            <h4 style="font-size: 1.3rem;">Design + Code Both Matter</h4>
            <p>You can have solid code and still make it look good. The playful copy and branding made the site more memorable while still being functional.</p>
          </div>
        </div>
      </div>

      <!-- NOTE: INSERT IMAGE HERE - Final product showcase or mockup -->
      <div style="text-align: center; margin-top: 3rem;">
        <img src="images/case-study/final-showcase.jpg" alt="Final product showcase" style="max-width: 100%; border-radius: var(--radius); box-shadow: var(--shadow);">
        <p style="font-size: 0.9rem; color: #5a5047; margin-top: 1rem; font-style: italic;">Complete product showcase across multiple pages</p>
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