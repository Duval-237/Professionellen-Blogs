<?php

$file_css = 'views/layouts/article/style.css';
$file_js = '<script defer src="/views/layouts/article/script.js"></script>';  

$img_page = "$articles->id/$articles->img";
$title_page = "$articles->title | Technogan";
$description_page = $articles->description;
$author_page = $articles->name;
$date_page = $articles->date;

$url_page = $_SERVER[ 'HTTP_HOST' ].$_SERVER[ 'REQUEST_URI' ];
// echo $url_page;

$slug = [];
foreach ( $slugs as $key ) {
  switch ( $key->lang_code ) {
    case 'en':
      $slug[ 'en' ] = $key->slug;
        break;
    case 'de':
      $slug[ 'de' ] = $key->slug;
        break;
    case 'es':
      $slug[ 'es' ] = $key->slug;
        break;
    case 'zh':
      $slug[ 'zh' ] = $key->slug;
        break;
    default:
      $slug[ 'fr' ] = $key->slug;
  } 
}
?>

<article role="article" class="container" data-slug="<?= $slugArticle ?>">
  <div class="width-page content">

    <div class="content-post-menu">
      <div class="toggle">
        <svg viewBox="0 0 256 512"><path d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"/></svg>
      </div>
      <nav class="navigation">
        <h3>Dans cet article</h3>
        <ul class="menu-article">
        </ul>
      </nav>
    </div>

    <div class="content-post-article">
      
      <header class="header-post-article">
        <div class="chemin">
          <!-- <a href="/category">Categories » »</a> -->
          <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $articles->category ) ?>">#<?= $articles->category ?></a>
          <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $articles->category ) ?>/<?= $articles->tags ?>">#<?= $articles->tags ?></a>
        </div>
        <h1 class="title"><?= $articles->title ?></h1>
        <div class="author">Coécrit par <a href=""><?= $articles->name ?></a></div>
        <div class="update">Dernière mise à jour : <time datetime="<?= $articles->date ?>" pubdate="pubdate"><?= $articles->jour ?></time></div>
        <div class="options">
          <div class="download">
            <span>
              <svg viewBox="0 0 384 512"><path d="M88 304H80V256H88C101.3 256 112 266.7 112 280C112 293.3 101.3 304 88 304zM192 256H200C208.8 256 216 263.2 216 272V336C216 344.8 208.8 352 200 352H192V256zM224 0V128C224 145.7 238.3 160 256 160H384V448C384 483.3 355.3 512 320 512H64C28.65 512 0 483.3 0 448V64C0 28.65 28.65 0 64 0H224zM64 224C55.16 224 48 231.2 48 240V368C48 376.8 55.16 384 64 384C72.84 384 80 376.8 80 368V336H88C118.9 336 144 310.9 144 280C144 249.1 118.9 224 88 224H64zM160 368C160 376.8 167.2 384 176 384H200C226.5 384 248 362.5 248 336V272C248 245.5 226.5 224 200 224H176C167.2 224 160 231.2 160 240V368zM288 224C279.2 224 272 231.2 272 240V368C272 376.8 279.2 384 288 384C296.8 384 304 376.8 304 368V320H336C344.8 320 352 312.8 352 304C352 295.2 344.8 288 336 288H304V256H336C344.8 256 352 248.8 352 240C352 231.2 344.8 224 336 224H288zM256 0L384 128H256V0z"/></svg>
            </span>
            <span>Telecharger l'article</span>
          </div>
          <div class="share">
            <span>
              <svg  viewBox="0 0 448 512"><path d="M448 127.1C448 181 405 223.1 352 223.1C326.1 223.1 302.6 213.8 285.4 197.1L191.3 244.1C191.8 248 191.1 251.1 191.1 256C191.1 260 191.8 263.1 191.3 267.9L285.4 314.9C302.6 298.2 326.1 288 352 288C405 288 448 330.1 448 384C448 437 405 480 352 480C298.1 480 256 437 256 384C256 379.1 256.2 376 256.7 372.1L162.6 325.1C145.4 341.8 121.9 352 96 352C42.98 352 0 309 0 256C0 202.1 42.98 160 96 160C121.9 160 145.4 170.2 162.6 186.9L256.7 139.9C256.2 135.1 256 132 256 128C256 74.98 298.1 32 352 32C405 32 448 74.98 448 128L448 127.1zM95.1 287.1C113.7 287.1 127.1 273.7 127.1 255.1C127.1 238.3 113.7 223.1 95.1 223.1C78.33 223.1 63.1 238.3 63.1 255.1C63.1 273.7 78.33 287.1 95.1 287.1zM352 95.1C334.3 95.1 320 110.3 320 127.1C320 145.7 334.3 159.1 352 159.1C369.7 159.1 384 145.7 384 127.1C384 110.3 369.7 95.1 352 95.1zM352 416C369.7 416 384 401.7 384 384C384 366.3 369.7 352 352 352C334.3 352 320 366.3 320 384C320 401.7 334.3 416 352 416z"/></svg>
            </span>
            <span>Partager</span>
          </div>
          <div class="save <?= isset( $_SESSION[ 'user' ] ) ? 'add-collection' : 'connexion'; ?> <?= $collection == 1 ? 'enable' : ''?> ">
            <span class="svg">
                <svg viewBox="0 0 384 511.95"><defs><style>.cls{fill:#ffbf00;}</style></defs><path class="cls" d="M-2.76-645.79v431.9c0,24.7-26.8,39.2-48.1,27.63l-143.9-83.93-143.88,83.94a32,32,0,0,1-48.12-27.64v-431.9a48,48,0,0,1,48-48h288A48,48,0,0,1-2.76-645.79Z" transform="translate(386.76 693.79)"/></svg>
                <svg viewBox="0 0 384 512"><path d="M336 0h-288C21.49 0 0 21.49 0 48v431.9c0 24.7 26.79 40.08 48.12 27.64L192 423.6l143.9 83.93C357.2 519.1 384 504.6 384 479.9V48C384 21.49 362.5 0 336 0zM336 452L192 368l-144 84V54C48 50.63 50.63 48 53.1 48h276C333.4 48 336 50.63 336 54V452z"/></svg>
            </span>
            <span class="add-text">Ajouter a votre Collection</span>
            <span class="remove-text">Retirer de votre Collection</span>
          </div>
        </div>
        <p class="intro"><?= $articles->intro ?></p>
      </header>

      <main class="body-post-article">
        <div class="publicite">Publicite</div>
        <?= $articles->content ?>

        <section>
          <h2><span>1</span><span>Lorem ipsum dolor sit amet consectetur.</span></h2>
          <div class="box-img"><img src="/storage/confiant.jpeg" alt="Acceptez-vous tel que vous êtes"></div>
          <h3><a href=""><span>1.</span><span>Acceptez-vous tel que vous êtes.</span></a></h3>
          <p>La confiance en soi repose sur l'acceptation de soi. Il est essentiel de reconnaître et d'apprécier qui vous êtes, sans chercher à vous comparer à d'autres personnes. Plutôt que de gaspiller votre énergie à vouloir être quelqu'un d'autre, concentrez-vous sur votre propre être et apprenez à vous accepter tel que vous êtes. Il y a une citation qui dit : </p>
          <blockquote cite="Doris Mortman">« Tant que vous n’aurez pas accepté qui vous êtes, rien de ce que vous aurez ne vous satisfera jamais »</blockquote>
          <p>Cependant, cela ne signifie pas que vous ne pouvez pas vous améliorer. Il est toujours possible de progresser et de développer vos compétences. Suivre des formations en ligne en développement personnel et professionnel peut être un excellent moyen d'atteindre cet objectif. En investissant dans votre croissance personnelle, vous renforcerez votre confiance en vous et vous vous sentirez plus épanoui(e) dans votre vie.</p>
          <div class="box-img"><img src="/storage/confiant.jpeg" alt="Acceptez-vous tel que vous êtes"></div>
          <h3><a href=""><span>2.</span><span>Acceptez-vous tel que vous êtes.</span></a></h3>
          <p>La confiance en soi repose sur l'acceptation de soi. Il est essentiel de reconnaître et d'apprécier qui vous êtes, sans chercher à vous comparer à d'autres personnes. Plutôt que de gaspiller votre énergie à vouloir être quelqu'un d'autre, concentrez-vous sur votre propre être et apprenez à vous accepter tel que vous êtes. Il y a une citation qui dit : </p>
          <blockquote cite="Doris Mortman">« Tant que vous n’aurez pas accepté qui vous êtes, rien de ce que vous aurez ne vous satisfera jamais »</blockquote>
          <p>Cependant, cela ne signifie pas que vous ne pouvez pas vous améliorer. Il est toujours possible de progresser et de développer vos compétences. Suivre des formations en ligne en développement personnel et professionnel peut être un excellent moyen d'atteindre cet objectif. En investissant dans votre croissance personnelle, vous renforcerez votre confiance en vous et vous vous sentirez plus épanoui(e) dans votre vie.</p>
        </section>
        
        <section>
          <h2 ><span>1</span><span>dasfladl jldjflaks ads</span></h2>
          <div class="box-img"><img src="/storage/img/website/test.jpg" alt="Changez vos croyances"></div>
          <h3><span>2.</span><span>Changez vos croyances.</span></h3>
          <p>Il peut arriver que vous vous  dites parfois : "Je ne suis pas capable, il ou elle va me repousser". Ces pensées négatives et empreintes de peur peuvent vous bloquez dans votre progression et vous empêchez d'exploiter pleinement votre potentiel. Il est important de réaliser que ces croyances ne sont pas rares. De nombreux professionnels, y compris des entrepreneurs, luttent quotidiennement avec ces pensées qui entravent leur succès. <br><br> Quand vous n’avez pas confiance en vous, vous pensez que vous n’êtes pas important, mais si vous voulez changer votre vie vous devez d’abord commencer par changer vos croyances, remplacées les par des encouragements et des pensée positif en vous disant : </p>
          <ul>
            <li>"j’ai tous les capacités nécessaires pour réussir ce que j’entreprends"</li>
            <li>"personne ne vas le faire à ma place, vas-y bouge"</li>
          </ul>
          <p>La clé réside dans la capacité à reconnaître ces croyances pour mieux les surmonter.</p>
        </section>

        <section>
          <h2><span>3</span><span>Sortez de votre zone de confort.</span></h2>
          <img src="/storage/confiant3.jpeg" alt="Sortez de votre zone de confort">
          <p>Il est essentiel de sortir de sa zone de confort pour se développer personnellement. En osant expérimenter de nouvelles choses et affronter vos peurs, vous renforcez votre confiance en vous-même. Chaque défi surmonté représente une victoire qui vous permet de grandir et d'évoluer.</p>
          <pre class="code">
            <code class="language-html">
            </code>
          </pre>
          <p> En prenant des risques calculés et en vous confrontant à l'inconnu, vous progressez sur le chemin de l'épanouissement personnel. Ainsi, oser sortir de sa zone de confort devient un moyen efficace pour cultiver une confiance en soi et construire une estime de soi positive.</p>
        </section>
        
        <section>
          <h2><span>4</span><span>Ne vous comparez pas aux autres.</span></h2>
          <img src="/storage/confiant4.jpeg" alt="Sortez de votre zone de confort">
          <p>Il est inutile de se comparer à autrui, car cela ne fait que vous dévalorisez. Chacun possède ses propres talents et compétences, et il est important de les reconnaître et de les développer. Plutôt que de chercher à être aussi riche que son voisin, aussi mince que son ami ou aussi doué en public que son patron, il est préférable de se concentrer sur sa propre évolution. En se fixant des objectifs personnels et en cherchant à s'améliorer continuellement, on peut mesurer son progrès par rapport à soi-même. <br><br> La comparaison avec autrui peut être source de frustration et d'insatisfaction, tandis que la comparaison avec notre propre évolution peut être motivante et gratifiante. En mettant l'accent sur nos propres réalisations et en se fixant des défis personnels, on peut cultiver une estime de soi positive et construire une confiance en soi solide.</p>
        </section>

        <div class="publicite">Publicite</div>
        
        <section>
          <h2><span>5</span><span>Découvrez ce qui vous passionne.</span></h2>
          <img src="/storage/confiant5.jpeg" alt="Sortez de votre zone de confort">
          <p>Pour booster votre confiance en vous et votre épanouissement personnel, plongez-vous dans ce qui vous passionne. Que ce soit les arts martiaux, les voitures anciennes, la musique ou le basket-ball, consacrez du temps à votre passion. En explorant et en développant vos centres d'intérêt, vous renforcerez votre estime de soi et votre motivation. Chaque progrès et chaque réussite dans votre domaine de prédilection vous apporteront une satisfaction profonde et nourriront votre confiance en vous. N'hésitez pas à explorer de nouvelles activités, à participer à des événements liés à vos passions et à rencontrer des personnes partageant vos centres d'intérêt. En suivant votre passion, vous enrichirez votre vie et vous vous sentirez plus épanoui.</p>
        </section>
        
        <section>
          <h2><span>6</span><span>Prenez soin de vous.</span></h2>
          <img src="/storage/confiant6.jpeg" alt="Sortez de votre zone de confort">
          <p>Prendre soin de votre corps et de votre esprit en adoptant un mode de vie sain est essentiel pour votre bien-être global. Cela implique de faire de l'exercice régulièrement, de manger équilibré, de dormir suffisamment et de pratiquer la méditation ou la relaxation pour apaiser notre esprit. L'activité physique régulière aide à renforcer votre corps, à améliorer votre santé cardiovasculaire et à maintenir un poids santé. De plus, une alimentation équilibrée fournit à notre corps les nutriments dont il a besoin pour fonctionner de manière optimale. Le sommeil suffisant est crucial pour votre santé mentale et physique, car c'est pendant le sommeil que votre corps se régénère et que votre esprit se repose.</p>
        </section>

        <section>
          <h2><span>7</span><span>Adoptez une bonne posture.</span></h2>
          <img src="/storage/confiant7.jpeg" alt="Sortez de votre zone de confort">
          <p>Adopter une bonne posture peut réellement renforcer votre confiance en vous. Évitez de vous recroqueviller en rentrant vos épaules, cela envoie un message clair de manque de confiance. Assurez-vous d'avoir le dos bien droit, les épaules alignées et la poitrine légèrement vers l'avant (sans exagération pour ne pas paraître arrogant). Gardez le regard droit devant vous, évitez de fixer le sol et osez regarder les gens dans les yeux. En affichant une posture ouverte et assurée, vous témoignez d'une confiance en vous-même qui se reflétera également dans votre attitude et vos interactions. Soyez conscient de votre langage corporel et utilisez-le pour exprimer votre confiance intérieure.</p>
        </section>

        <section>
          <h2><span>8</span><span>Entourez-vous des personnes positives.</span></h2>
          <img src="/storage/confiant8.jpeg" alt="Sortez de votre zone de confort">
          <p>Entourez-vous de personnes bienveillantes et encourageantes pour vous accompagner dans la réalisation de vos projets. Évitez les individus toxiques qui peuvent nuire à votre estime de soi et à votre confiance en vous. Cultiver un cercle social positif est essentiel pour votre développement personnel et votre bien-être. Les personnes qui vous soutiennent et vous encouragent sont une source de motivation et d'inspiration, tandis que les individus toxiques peuvent avoir un impact négatif sur votre mental et votre énergie. <br><br> Apprenez à reconnaître les relations qui vous tirent vers le bas et prenez la décision de vous éloigner de ces influences néfastes. En vous entourant de personnes positives et bienveillantes, vous renforcez votre estime de soi, votre confiance en vous et votre capacité à atteindre vos objectifs.</p>
        </section>

        <section>
          <h2 class="mini-title">Conseil</h2>
          <ul>
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores omnis placeat adipisci aspernatur unde laudantium numquam voluptatem maxime?</li>
          </ul>
        </section>

        <section>
          <h2 class="mini-title">References</h2>
          <ol>
            <li><a href="#">http://technogan.com/comment_devenir_riche</a></li>
            <li><a href="#">https://blabla.com/dsafa-dsafdei/dasfa</a></li>
            <!-- <li><a href="#">http://technogan.com/Comment_debloquer_la_monetisation_TikTok_dans_les_pays_non-eligible</a></li> -->
            <li><a href="#">https://blabla.com/dsafa-dsafdei/dasfa</a></li>
            <li><a href="#">https://blabla.com/dsafa-dsafdei/dasfa</a></li>
          </ol>
        </section>
      </main>

      <footer class="footer-post-article">
        <div class="publicite">Publicite</div>
        <div class="other-articles">
          <h2>Articles similaires</h2>
          <div class="container-articles">
          <?php foreach ( $otherArticles6 as $otherArticle ): ?>
            <article>
                <a href="/<?= $otherArticle->slug ?>">
                  <div class="bximg">
                    <img src="uploads/articles/<?= $otherArticle->id ?>/<?= $otherArticle->img ?>" alt="">
                  </div>
                  <h3><span><?= $otherArticle->title ?></span></h3>
                </a>
            </article>
            <?php endforeach; ?>
            <article>
              <a href="">
                <div class="bximg">
                  <img src="/storage/img/website/test.jpg" alt="">
                </div>
                <h3><span>Comment avoir confiance en soi dsf dsf sdf  fdfada </span></h3>
              </a>
            </article>

          </div>
        </div>
        <div class="publicite">Publicite</div>
        <div class="about-article">
          <h2>A Propos de cette Article</h2>
          <div class="author">
            <span class="certificat">
              <svg viewBox="0 0 231.75 231.67"><defs><style>.cls-1-certificate{fill:#fff;}</style></defs><path d="M-216.57,498.7a33.17,33.17,0,0,1,21.12,11.91q4.62,5.64,9.15,11.35a17.73,17.73,0,0,0,11.13,6.79c4.63.79,9.26,1.59,13.89,2.43,18.54,3.38,30,18.54,28.11,37.29q-.71,7-1.51,14a17.7,17.7,0,0,0,3.41,12.58q3.95,5.55,7.83,11.13c10.66,15.39,8,34.19-6.46,46-3.57,2.93-7.2,5.79-10.79,8.69a17.5,17.5,0,0,0-6.6,11c-.94,5.34-1.68,10.74-2.94,16-4.15,17.39-18.74,27.69-36.55,26-4.84-.46-9.67-1-14.5-1.54a17.28,17.28,0,0,0-12.14,3.29c-3.91,2.74-7.8,5.52-11.74,8.23-14.93,10.28-33.78,7.63-45.31-6.37-2.83-3.44-5.66-6.89-8.37-10.42a18.76,18.76,0,0,0-12.32-7.49c-5.12-.82-10.27-1.57-15.3-2.78-17.4-4.17-27.69-18.74-26-36.55q.68-7,1.51-14a18.07,18.07,0,0,0-3.53-13q-4-5.52-7.83-11.12c-10.48-15.11-7.82-34.05,6.42-45.66,3.45-2.82,6.9-5.64,10.41-8.38a18.32,18.32,0,0,0,7.26-11.92c.72-4.48,1.52-8.94,2.33-13.4,3.39-18.54,18.57-30,37.3-28.1q6.9.69,13.77,1.49a18,18,0,0,0,13-3.53c3.82-2.74,7.68-5.43,11.53-8.11A33.32,33.32,0,0,1-216.57,498.7Zm-34.56,133.11c-.54-1-.9-1.78-1.4-2.5q-8-11.46-16.06-22.87c-3-4.24-7.6-5.25-11.35-2.57s-4.29,7.3-1.3,11.57l21.49,30.63c3.82,5.45,8.15,6.08,13.31,1.93l45.23-36.41c6.62-5.33,13.29-10.62,19.84-16a7.73,7.73,0,0,0-2-13.41c-3.11-1.16-5.82-.25-8.34,1.79q-22.86,18.48-45.78,36.9Z" transform="translate(348.68 -498.43)"/><path class="cls-1-certificate" d="M-259.75,646.07c3.83,5.45,8.16,6.08,13.32,1.93l45.23-36.41c6.62-5.33,13.29-10.62,19.84-16a7.73,7.73,0,0,0-2-13.41c-3.1-1.16-5.81-.25-8.34,1.79q-22.86,18.48-45.77,36.9l-13.64,11c-.54-1-.9-1.78-1.4-2.5q-8-11.44-16.06-22.87c-3-4.24-7.6-5.25-11.35-2.57s-4.29,7.31-1.3,11.57Q-270.5,630.75-259.75,646.07Z" transform="translate(348.68 -498.43)"/></svg>
            </span>
            <div class="bximg">
              <img src="/uploads/author/<?= $articles->img_author ?>" alt="<?= $articles->name ?>" title="<?= $articles->name ?>">
            </div>
            <div class="infos">
              <span class="title">Co-ecrit par:</span>
              <span class="author"><?= $articles->name ?></span>
              <span class="description"><?= $articles->author_description ?></span>
            </div>
          </div>
          <p>Cet article a ete Co-ecrit par <?= $articles->name ?>. <?= $articles->info ?> Entourez-vous de personnes bienveillantes et encourageantes pour vous accompagner dans la réalisation de vos projets. Évitez les individus toxiques qui peuvent nuire à votre estime de soi et à votre confiance en vous. Cultiver un cercle social positif est essentiel pour votre développement personnel et votre bien-être. Les personnes qui vous soutiennent et vous encouragent sont une source de motivation et d'inspiration, tandis que les individus toxiques peuvent avoir un impact négatif sur votre mental et votre énergie. </p>
          <span>Cette Page a ete consulte <?= number_format( $articles->view, 0, '', ' ' )  ?> fois</span>
        </div>
        <div class="evaluation">
          <h2>Cet article vous a-t-il étè utile ?</h2>
          <div class="box-reponse oui">
            <h3>Superbe !</h3>
            <p>Si vous avez une minute, nous aimerions savoir ce qui vous a ete le plus utile dans cet article</p>
            <form action="#">
              <textarea name="avis" id="" placeholder="Dites ce que vous pensez ici" required></textarea>
              <input type="submit" value="Envoyer">
            </form>
          </div>
          <div class="box-reponse non">
            <h3>Nous en sommes desole.</h3>
            <p>Qu'es-ce qui n'a pas bien fonctionne?</p>
            <form action="#">
              <ul class="list-item">
                <li class="item">
                  <input type="radio" name="non-raison" id="raison1" required>
                  <label for="raison1">Les Instructions donnes ne fonctionnent pas.</label>
                </li>
                <li class="item">
                  <input type="radio" name="non-raison" id="raison2" required>
                  <label for="raison2">je n'ai pas pu suivre les Instructions.</label>
                </li>
                <li class="item">
                  <input type="radio" name="non-raison" id="raison3" required>
                  <label for="raison3">L'article ne decrit pas mon probleme</label>
                </li>
                <li class="item">
                  <input type="radio" name="non-raison" id="raison4" required>
                  <label for="raison4">Le sujet traite est ridicule</label>
                </li>
                <li class="item btn-send">
                  <input type="submit" value="Envoyer">
                </li>
              </ul>
            </form>
          </div>
          <div class="box-evaluation">
            <div class="btn-evaluation yes">
              <span>
                <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 408.75 408.87"><path d="M3354.29,670.79H3233.71a24.46,24.46,0,0,0-3.45-.68,394.64,394.64,0,0,1-105-20.11c-2.93-1-3.44-2.43-3.43-5.12q.07-105.61,0-211.21a6.69,6.69,0,0,1,3-5.93c15.93-12.29,31.24-25.28,44.66-40.35,10.95-12.3,20.19-25.59,25.86-41.3,6.64-18.36,13.74-36.56,20.89-54.72a65.29,65.29,0,0,1,7.45-14.46c7.92-10.92,18.85-16.43,32.46-14.66,14.39,1.87,25,9.31,28.79,23.85a116.17,116.17,0,0,1,3.77,23.93c1.19,25.42-3.12,50.37-7.53,75.27-1.2,6.74-2.65,13.45-4.09,20.69h5.25c27.28,0,54.56.29,81.83-.07,31.18-.4,52.79,30.4,40.34,59.2-1,2.4-2.37,4.67-3.56,7l1.13-.61c4.64,5.54,10,10.65,13.68,16.76,2.93,4.83,3.83,10.89,5.63,16.4v7.18c-.28,1.27-.6,2.54-.84,3.82a42.26,42.26,0,0,1-16.06,26.22c-1.21.94-2.47,1.83-3.67,2.72,12.62,19,9.41,47.78-16.15,62,.38.81.75,1.65,1.16,2.46,9.31,18.18,4.87,39.16-10.83,52.15C3368.87,666.31,3361.72,668.79,3354.29,670.79Z" transform="translate(-3012.61 -261.92)"/><path d="M3097.44,441.56v201.7c-1.53.07-2.94.19-4.34.19q-32.73,0-65.45,0c-10.59,0-15-4.47-15-15.08q0-86,0-172c0-10.36,4.46-14.81,14.82-14.81h70Z" transform="translate(-3012.61 -261.92)"/></svg>
              </span>
              <span>Oui</span>
            </div>
            <div class="btn-evaluation no">
              <span>
                <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 408.75 408.87"><path d="M3079.69,261.92h120.57a21.92,21.92,0,0,0,3.45.68,394.26,394.26,0,0,1,105,20.12c2.93,1,3.44,2.42,3.44,5.12q-.09,105.6,0,211.21a6.68,6.68,0,0,1-3,5.92c-15.93,12.29-31.24,25.28-44.65,40.35-11,12.3-20.2,25.6-25.87,41.3-6.63,18.36-13.74,36.56-20.89,54.73a65.51,65.51,0,0,1-7.45,14.46c-7.92,10.92-18.84,16.43-32.45,14.66-14.4-1.88-25-9.31-28.8-23.85a116.94,116.94,0,0,1-3.77-23.94c-1.19-25.41,3.12-50.36,7.54-75.26,1.19-6.75,2.65-13.45,4.09-20.7h-5.25c-27.28,0-54.57-.28-81.84.07-31.18.41-52.79-30.39-40.34-59.19,1-2.4,2.37-4.68,3.56-7l-1.13.61c-4.63-5.55-10-10.66-13.68-16.77-2.92-4.83-3.83-10.88-5.63-16.39v-7.19c.29-1.27.6-2.53.85-3.81a42.15,42.15,0,0,1,16.06-26.22c1.21-.95,2.46-1.83,3.67-2.73-12.63-19-9.42-47.77,16.15-62-.39-.82-.76-1.65-1.17-2.46-9.31-18.18-4.87-39.17,10.83-52.16C3065.1,266.41,3072.25,263.93,3079.69,261.92Z" transform="translate(-3012.61 -261.92)"/><path d="M3336.53,491.16V289.46c1.53-.07,2.94-.19,4.34-.2h65.45c10.59,0,15,4.47,15,15.07q0,86,0,172c0,10.36-4.45,14.8-14.81,14.81h-70Z" transform="translate(-3012.61 -261.92)"/></svg>
              </span>
              <span>Non</span>
            </div>
          </div>
        </div>
        <div class="publicite">Publicite</div>
      </footer>

      <div id="share" class="">
        <div class="container"> 
          <div class="top-share">
            <span>share</span>
            <span class="btn-close">
              <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
            </span>
          </div>
          <ul class="social-media">
            <li class="item facebook" style="--clr:#1877f2;">
              <a href="" title="Facebook">
                <svg viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
              </a>
              <span>Facebook</span>
            </li>
            <li class="item whatsapp" style="--clr:#00c200;">
              <a href="" title="Whatsapp">
                <svg viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
              </a>
              <span>Whatsapp</span>
            </li>
            <li class="item twitter" style="--clr:#000;">
              <a href="" title="X">
                <svg viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
              </a>
              <span>X</span>
            </li>
            <li class="item instagram" style="--clr:linear-gradient(30deg,#f38334,#da2e7d 50%,#6b54c6);">
              <a href="" title="Instagram">
                <svg viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
              </a>
              <span>Instagram</span>
            </li>
            <li class="item linkedin" style="--clr:#0a66c2;">
              <a href="" title="Linkdekin">
                <svg viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
              </a>
              <span>linkedin</span>
            </li>
          </ul>
          <span>Copy the link :</span>
          <div class="bxlink">
            <span class="link">http://<?= $_SERVER[ 'HTTP_HOST' ] . '/' . $slugArticle ?></span>
            <div class="btn-copy">
              <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 206.72 248.17"><path d="M982.44,862.68q0,35.27,0,70.53c0,19.71-13,32.73-32.6,32.75q-50,0-99.94,0c-19.66,0-32.76-13.05-32.77-32.63q0-70.71,0-141.43c0-19.44,13-32.49,32.45-32.52q50.34-.07,100.68,0c19.21,0,32.14,13.11,32.16,32.39Q982.48,827.22,982.44,862.68ZM962,862.62q0-35.26,0-70.52c0-8.33-3.81-12.31-12-12.32q-50.14,0-100.3,0c-8.2,0-12.14,4-12.14,12.2q0,70.71,0,141.41c0,8.13,4,12.14,12.21,12.14q50,0,99.92,0c8.41,0,12.29-3.94,12.3-12.4Q962,897.88,962,862.62Z" transform="translate(-817.12 -717.8)"/><path d="M1023.83,799.25c0,17.28,0,34.55,0,51.82,0,7.23-4.15,11.52-10.57,11.31a9.76,9.76,0,0,1-9.46-8.18,33.53,33.53,0,0,1-.34-5.49q0-48.32,0-96.65c0-10.37-3.47-13.78-14-13.79q-49.07,0-98.14,0c-7.21,0-11.43-3.35-11.9-9.24a9.82,9.82,0,0,1,8.25-10.84,21.51,21.51,0,0,1,4-.35q49.8,0,99.61,0c16.28,0,28.55,9.5,31.83,24.51a42,42,0,0,1,.69,8.76C1023.86,767.16,1023.83,783.21,1023.83,799.25Z" transform="translate(-817.12 -717.8)"/></svg>
            </div>
          </div>
        </div>
      </div>

    </div>

    <section class="content-aside">
      <div class="blog-aside">
        <aside role="complementary" class="infos-articles" >
          <div class="author">
            <span class="certificat">
            <svg viewBox="0 0 231.75 231.67"><defs><style>.cls-1-certificate{fill:#fff;}</style></defs><path d="M-216.57,498.7a33.17,33.17,0,0,1,21.12,11.91q4.62,5.64,9.15,11.35a17.73,17.73,0,0,0,11.13,6.79c4.63.79,9.26,1.59,13.89,2.43,18.54,3.38,30,18.54,28.11,37.29q-.71,7-1.51,14a17.7,17.7,0,0,0,3.41,12.58q3.95,5.55,7.83,11.13c10.66,15.39,8,34.19-6.46,46-3.57,2.93-7.2,5.79-10.79,8.69a17.5,17.5,0,0,0-6.6,11c-.94,5.34-1.68,10.74-2.94,16-4.15,17.39-18.74,27.69-36.55,26-4.84-.46-9.67-1-14.5-1.54a17.28,17.28,0,0,0-12.14,3.29c-3.91,2.74-7.8,5.52-11.74,8.23-14.93,10.28-33.78,7.63-45.31-6.37-2.83-3.44-5.66-6.89-8.37-10.42a18.76,18.76,0,0,0-12.32-7.49c-5.12-.82-10.27-1.57-15.3-2.78-17.4-4.17-27.69-18.74-26-36.55q.68-7,1.51-14a18.07,18.07,0,0,0-3.53-13q-4-5.52-7.83-11.12c-10.48-15.11-7.82-34.05,6.42-45.66,3.45-2.82,6.9-5.64,10.41-8.38a18.32,18.32,0,0,0,7.26-11.92c.72-4.48,1.52-8.94,2.33-13.4,3.39-18.54,18.57-30,37.3-28.1q6.9.69,13.77,1.49a18,18,0,0,0,13-3.53c3.82-2.74,7.68-5.43,11.53-8.11A33.32,33.32,0,0,1-216.57,498.7Zm-34.56,133.11c-.54-1-.9-1.78-1.4-2.5q-8-11.46-16.06-22.87c-3-4.24-7.6-5.25-11.35-2.57s-4.29,7.3-1.3,11.57l21.49,30.63c3.82,5.45,8.15,6.08,13.31,1.93l45.23-36.41c6.62-5.33,13.29-10.62,19.84-16a7.73,7.73,0,0,0-2-13.41c-3.11-1.16-5.82-.25-8.34,1.79q-22.86,18.48-45.78,36.9Z" transform="translate(348.68 -498.43)"/><path class="cls-1-certificate" d="M-259.75,646.07c3.83,5.45,8.16,6.08,13.32,1.93l45.23-36.41c6.62-5.33,13.29-10.62,19.84-16a7.73,7.73,0,0,0-2-13.41c-3.1-1.16-5.81-.25-8.34,1.79q-22.86,18.48-45.77,36.9l-13.64,11c-.54-1-.9-1.78-1.4-2.5q-8-11.44-16.06-22.87c-3-4.24-7.6-5.25-11.35-2.57s-4.29,7.31-1.3,11.57Q-270.5,630.75-259.75,646.07Z" transform="translate(348.68 -498.43)"/></svg>
            </span>
            <div class="bximg">
              <img src="/uploads/author/<?= $articles->img_author ?>" alt="<?= $articles->name ?>" title="<?= $articles->name ?>">
            </div>
            <div class="infos">
              <span class="title">Co-ecrit par:</span>
              <span class="author"><?= $articles->name ?></span>
              <span class="description"><?= $articles->author_description ?></span>
            </div>
          </div>
          <div class="donnee">
            <div class="update">
              <span class="title">Update:</span>
              <span class="value"><?= $articles->jour ?></span>
            </div>
            <div class="views">
              <span class="title">Views:</span>
              <span class="value"><?= $articles->views ?></span>
            </div>
          </div>
        </aside>
        <aside role="complementary" class="other-articles">
          <h2>Articles similaires</h2>
          <div class="container-articles">
            <?php foreach ( $otherArticles as $otherArticle ): ?>
            <article>
                <a href="/<?= $otherArticle->slug ?>">
                  <div class="bximg">
                    <img src="uploads/articles/<?= $otherArticle->id ?>/<?= $otherArticle->img ?>" alt="">
                  </div>
                  <h3><span><?= $otherArticle->title ?></span></h3>
                </a>
            </article>
            <?php endforeach; ?>
          </div>
        </aside>
        <aside role="complementary" class="newsletter">
          <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 522 521.1"><defs><style>.m-1{fill:#0d4370;}.m-1,.m-2{stroke:#0d4370;stroke-miterlimit:10;stroke-width:10px;}.m-2,.m-4{fill:#fff;}.m-3{fill:#007fff;}</style></defs><path class="m-1" d="M-1924.25,2169.3h-165c3.12-2.25,5.87-4.25,9.12-6.5,16.8-12.37,50.2-41.87,73.4-41.5,23.3-.37,56.6,29.13,73.38,41.48C-1930.16,2165.09-1927.41,2167.09-1924.25,2169.3Z" transform="translate(2267.79 -2116.3)"/><path class="m-1" d="M-2214.79,2260.48v106l-48-34.68v-10.64a47.75,47.75,0,0,1,18.38-37.8C-2235.54,2276.36-2227.16,2269.86-2214.79,2260.48Z" transform="translate(2267.79 -2116.3)"/><path class="m-1" d="M-1750.79,2321.16v10.53l-48,34.68V2260.46c12.4,9.4,20.8,15.9,29.6,22.9A47.58,47.58,0,0,1-1750.79,2321.16Z" transform="translate(2267.79 -2116.3)"/><path class="m-2" d="M-1750.79,2331.69V2585.3c0,25.6-21.5,47.1-48,47.1h-416a48,48,0,0,1-48-48V2331.78l48,34.68,1.69,1.23,46.31,33.46,128.93,81.15a58.32,58.32,0,0,0,62.13,0l128.94-81.19,48-34.69Z" transform="translate(2267.79 -2116.3)"/><path class="m-3" d="M-1846.79,2223.36v184.7l-128.94,81.24a58.32,58.32,0,0,1-62.13,0l-128.93-81.11V2223.36Z" transform="translate(2267.79 -2116.3)"/><path d="M-1798.79,2223.3v150l-48,34.69V2223.36h-320v184.79l-46.31-33.46-1.69-1.23v-150.1a48,48,0,0,1,48-48h320A48,48,0,0,1-1798.79,2223.3Z" transform="translate(2267.79 -2116.3)"/><polygon class="m-4" points="335.29 180.5 335.29 204.69 228.51 204.69 228.51 277.27 204.46 277.27 204.46 204.69 176.85 204.69 176.85 180.5 335.29 180.5"/><path class="m-4" d="M-1995.31,2369.52h62.76v24H-1999a30.21,30.21,0,0,1-30.31-30.16v-30.17h79.41v24.05h-55.22a13.42,13.42,0,0,0,0,3.27A9.9,9.9,0,0,0-1995.31,2369.52Z" transform="translate(2267.79 -2116.3)"/></svg>
          <h3>Abonnez-vous a la <br> newsletter de <br> Technogan !</h3>
          <form action="#">
            <input type="text" placeholder="Numero whatsapp">
            <input type="submit" value="Je m'abonne">
          </form>
          <span>Rester a jour sur les dernieres posts</span>
        </aside>
        <aside role="complementary" class="pub">
          <span>Publicite</span>
          <a href="#"><img src="/uploads/website/test1.jpg" alt=""></a>
        </aside>
      </div>
      <div class="blog-aside">
        <aside role="complementary" class="other-articles">
          <h2>Vous pourriez aimez</h2>
          <div class="container-articles">
            <?php foreach ( $randomArticles as $otherArticle ): ?>
            <article>
                <a href="/<?= $otherArticle->slug ?>">
                  <div class="bximg">
                    <img src="uploads/articles/<?= $otherArticle->id ?>/<?= $otherArticle->img ?>" alt="">
                  </div>
                  <h3><span><?= $otherArticle->title ?></span></h3>
                </a>
            </article>
            <?php endforeach; ?>  
          </div>
        </aside>
        <aside role="complementary" class="pub">
          <span>Publicite</span>
          <a href="#"><img src="/uploads/website/test1.jpg" alt=""></a>
        </aside>
      </div>
    </section>

  </div>
</article>

