<?php


require_once 'vendor/autoload.php';

// use the factory to create a myanmarFaker\Generator instance
$faker = myanmarFaker\Factory::create();



?><!DOCTYPE html>
<html lang="en">
   <head>
      <title>myanmarFaker example</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link id="theme-stylesheet" rel="stylesheet" href="https://utteranc.es/stylesheets/themes/github-light/index.css">
      <link href="https://unpkg.com/@primer/css@^16.0.0/dist/primer.css" rel="stylesheet" />

   </head>
   <body>
      <main class="timeline">
         <article class="timeline-comment">
            <div class="comment">
                <article class="markdown-body">
                    <h1>myanmarFaker example</h1>
                </article>





                <header class="comment-header"> 
                   <span class="comment-meta"> 
                       <h2>Image</h2>
                    </span> 
                </header>
                <article class="markdown-body">


                    <p>Code</p>
<pre>for ($i = 0; $i < 5; $i++) {
    $faker->imageUrl(640, 480, 'animals', true) . "\n";
}</pre>
                    <p>Output</p>
                    <pre><?php 
                    for ($i = 0; $i < 5; $i++) {
                        echo $faker->imageUrl(250, 250, null, true) . "\n";
                    }
                    ?></pre>


                    <p>Image Preview</p>
                    <div class="border d-flex flex-nowrap">
                        <?php 
                        for ($i = 0; $i < 5; $i++) {
                            ?>
                                <div class="p-0 px-0 border color-bg-subtle">
                                    <img src="<?=$faker->imageUrl(640, 480, null, true);?>" alt="Some" />
                                </div>
                            <?php
                        }
                        ?>
                    </div>


                </article>



                <header class="comment-header"> 
                    <span class="comment-meta"> 
                        <h2>Name</h2>
                    </span> 
                </header>
                <article class="markdown-body">
                    <p>Code</p>
<pre>for ($i = 0; $i < 5; $i++) {
    echo $faker->name() . "\n";
}</pre>
                    <p>Output</p>
                    <pre><?php 
                    for ($i = 0; $i < 5; $i++) {
                        echo $faker->name() . "\n";
                    }
                    ?></pre>
                </article>




                <header class="comment-header"> 
                    <span class="comment-meta"> 
                        <h2>Email</h2>
                    </span> 
                </header>
                <article class="markdown-body">
                    <p>Code</p>
<pre>for ($i = 0; $i < 5; $i++) {
    echo $faker->email() . "\n";
}</pre>
                    <p>Output</p>
                    <pre><?php 
                    for ($i = 0; $i < 5; $i++) {
                        echo $faker->email() . "\n";
                    }
                    ?></pre>
                </article>









            </div>
         </article>
      </main>
   </body>
</html>