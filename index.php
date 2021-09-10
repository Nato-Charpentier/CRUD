<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="stylesheet" href="publichtml/css/style.css" type="text/css">
        <script src="publichtml/js/jquery.js" text="text/javascript"></script>
    </head>
    <body>

        <?php 
            include 'pagehome/navbar.php';
        ?>
     
    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">
                    Bonjour,&nbsp;
                    je m'appelle
                </div>
                <div class="text-2">
                    Charpentier Nato
                </div>
                <div class="text-3">
                    Et je suis <span>Développeur</span>
                </div>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">Présentation</h2>
            <div class="about-content">
               <div class="column left">
                   <img src="images/photo_portrait.jpeg" alt="">
               </div>
               <div class="column right">
                    <div class="text">
                       Je m'appelle Charpentier Nato et je suis <span>Développeur</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, harum sapiente nobis fuga recusandae nihil. Temporibus vitae facere cumque reiciendis expedita est perferendis mollitia exercitationem rem quasi, adipisci ullam, tempore eum ab repudiandae reprehenderit illo repellendus corrupti omnis quisquam ex quod fugit qui natus! Quisquam qui dolore architecto repellendus, mollitia nulla perferendis. Impedit itaque fugiat sit sed dignissimos odit nesciunt.</p>
                </div>
            </div>
        </div>
    </section>
    0
    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">Mes Compétences</h2>
             <div class="skills-content">
                 <div class="column left">
                    <div class="text">
                        Mes compétences
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quaerat quo excepturi magni labore, aliquid ratione? Voluptates eligendi quidem deserunt eos nemo. Odit tenetur aperiam consequatur. Sunt fuga neque blanditiis quos perspiciatis, repudiandae placeat dolores dignissimos reprehenderit sed quasi incidunt recusandae culpa expedita laboriosam saepe earum? Repellat quam natus ad iure. Nihil officiis nesciunt quae vel, quibusdam animi laudantium totam?</p>
                </div>
                 <div class="column right">
                     <div class="bars">
                         <div class="info">
                             <span>HTML</span>
                             <span>80%</span>
                         </div>
                         <div class="line html"></div>
                     </div>
                     <div class="bars">
                         <div class="info">
                             <span>CSS</span>
                             <span>50%</span>
                         </div>
                         <div class="line css"></div>
                     </div>
                     <div class="bars">
                         <div class="info">
                             <span>Javascript</span>
                             <span>30%</span>
                         </div>
                         <div class="line js"></div>
                     </div>
                     <div class="bars">
                         <div class="info">
                             <span>PHP</span>
                             <span>50%</span>
                         </div>
                         <div class="line php"></div>
                     </div>
                     <div class="bars">
                         <div class="info">
                             <span>MySQL</span>
                             <span>70%</span>
                         </div>
                         <div class="line mysql"></div>
                     </div>
                 </div>
             </div>
        </div>
    </section>

    <!-- works section start -->
    <section class="works" id="works">
        <div class="max-width">
            <h2 class="title">Mes Travaux</h2>
            <div class="works-content">
              <div class="card">
                  <div class="box">
                    <?php include 'pagehome/works.php'?>
                  </div>
              </div>
            </div>
        </div>
    </section>
    
    <!-- footer section start -->
    <?php
      include 'pagehome/footer.php'
    ?>

    <script src="publichtml/js/script.js" text="text/javascript"></script>
    </body>
</html>

