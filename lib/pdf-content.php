<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://technogan.com/uploads/website/technogan.ico" type="image/x-icon">
    <title><?= $article->title ?></title>
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      /* @page {
        margin: 8in;
      } */
      body {
        background: #fff;
      }
      #cover {
        position: relative;
        width: 100%; height: 210mm;
        background: #007fff;
        color: #fff;
      }
      #cover .brand {
        position: absolute;
        top: 40px; left: 30px;
      }
      #cover .description {
        position: absolute;
        top: 50%; left: 0;
        padding: 0 30px;
        transform: translateY(-50%);
      }
      /* #cover .description h1 {
        font-weight: 800;
      } */
      #cover .description span {
        display: inline-block;
        width: min-content;
        padding: 3px 15px;
        font-size: 0.8em;
        background: var(--clr);
        margin-top: 10px;
      }
      #cover .description p {
        margin-top: 50px;
      }
      #cover .source {
        position: absolute;
        bottom: 40px; left: 0;
        padding: 0 30px;
        columns: 2;
      }
      #cover .link {
        position: absolute;
        right: -10px; bottom: 90px;
        padding: 0px 10px;
        font-size: 0.9em;
        font-weight: 600;
        transform: rotate(-90deg);
        background: #fff;
        color: #007fff;
      }
      .container section {
        position: relative;
        background: var(--bg-light-mode);
      }
      .container section h2 {
        position: relative;
        padding: 10px;
        font-size: 1.1em;
        font-weight: 600;
        color: #fff;
        background: #007fff;
      }
      .container section h2 span:first-child {
        font-size: 1.4em;
        text-transform: uppercase;
        padding: 10px;
        margin-right: 10px;
      }
      .container section .box-img {
        position: relative;
        width: 100%;
        margin-bottom: 15px;
      }
      .container section img {
        position: relative;
        width: 100%;
      }
      
      .container section img:not(:first-of-type){
        margin-top: 10px;
      }
      .container section h2 ~ h3 {
        font-size: 1.05em;
        font-weight: 600;
        margin-left: 15px;
        margin-bottom: 5px;
        line-height: 20px;
      }
      .container section h2 ~ h3 span:first-child {
        font-size: 1.2em;
      }
      /*
      .container section > h2.step {
        display: flex;
        font-size: 1.2em;
        line-height: 22px;
        margin-bottom: 5px;
        font-weight: 600;
        padding: 0px;
        color: var(--bg-dark-mode);
      }
      .container section > h2.step span:first-child {
        font-size: 1.5em;
      }
      .container section > h2.conseil {
        color: var(--color-website);
      }
      .container section > h2.step a {
        color: var(--color-website);
        display: flex;
      }
      .container section > h2.step span:first-child {
        margin-right: 5px;
      }*/

      .container section p,
      .container section ul {
        font-size: 1em;
        font-weight: 400;
        letter-spacing: 0.5px;
        color: #111;
        padding: 0 20px;
        margin-bottom: 5px;
        text-align: justify;
      }
      .container section blockquote {
        display: inline-block;
        font-size: 0.95em;
        padding: 10px 20px;
        margin: 0 20px 5px 20px;
        font-weight: 400;
        border-left: 3px solid #007fff;
        color: #000;
        background: #007fff45;
      }
      .container section b {
        font-weight: 600;
      }
      .container section ul {
        font-size: 0.95em;
        list-style-type: disc;
        padding: 0px 10px 0px 50px;
      }
      .container section pre {
        padding: 20px;
        height: fit-content;
        color: #fff;
        background: #222;
        margin: 5px 20px;
        overflow: auto;
      }
    </style>
  </head>

  <body>
    <div id="cover">
      <div class="brand">
        <?php
          $svg = '<svg viewBox="0 0 1140.34 138.6"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M-836.24-751.32H-937.76a43.27,43.27,0,0,1-43.41-43.21v-43.22h88.73v34.45h-54.08a18.65,18.65,0,0,0,0,4.69,14.17,14.17,0,0,0,14.06,12.85h64.89V-786S-861.27-754.54-836.24-751.32Z" transform="translate(1075.06 889.92)"/><polygon class="cls-1" points="481.03 0 481.03 0.21 481.02 0.2 481.02 0 481.03 0"/><polygon class="cls-1" points="866.01 136.33 866.01 138.6 864.87 138.6 866.01 136.33"/><path class="cls-1" d="M-209-837.75v84.16l-1.14,2.27h-94.05a43.1,43.1,0,0,1-43.21-43.21v-52a43.14,43.14,0,0,1,43.21-43.41h82.75v34.65h-79.38a17.92,17.92,0,0,0-8.87,4.89,14.39,14.39,0,0,0-3.26,9.17V-800a14.13,14.13,0,0,0,14.06,14.27h55.44V-803.3h-36.69v-34.45Z" transform="translate(1075.06 889.92)"/><polygon class="cls-1" points="953.54 38.72 1001.74 134.74 1001.74 138.6 965.16 138.6 934.38 77.25 903.39 138.6 866.01 138.6 866.01 136.33 914.74 39.27 911.19 31.08 895.65 0 934.17 0 934.38 0.2 953.54 38.72"/><polygon class="cls-1" points="1140.34 0 1140.34 138.6 1097.13 138.6 1036.18 57.47 1036.18 138.6 1003.68 138.6 1001.74 134.74 1001.74 0 1036.18 0 1036.18 0.2 1105.89 92.74 1105.89 0 1140.34 0"/><polygon class="cls-1" points="1003.68 138.6 1001.74 138.6 1001.74 134.74 1003.68 138.6"/><polygon class="cls-1" points="864.87 138.6 866.01 136.33 866.01 138.6 864.87 138.6"/><polygon class="cls-1" points="1003.68 138.6 1001.74 138.6 1001.74 134.74 1003.68 138.6"/><path class="cls-1" d="M-835.55-889.92c-25,3.22-31.33,34.65-31.33,34.65h-134.19v103.95h-34.45V-855.27h-39.54v-34.65Z" transform="translate(1075.06 889.92)"/><path class="cls-1" d="M-828.14-841.21V-800a14.18,14.18,0,0,0,14.27,14.27h77.46v34.44h-83a43.23,43.23,0,0,1-43.21-43.21v-52a43.27,43.27,0,0,1,43.21-43.41h83v34.65h-76.31c-6.64.38-11.95,4.89-11.95,4.89A13.52,13.52,0,0,0-828.14-841.21Z" transform="translate(1075.06 889.92)"/><path class="cls-1" d="M-447.45-751.32H-533.1L-594-832.44v81.12h-34.45v-52H-698v52h-34.65v-138.6H-698v52.17h69.51v-52.17H-594v.2h0l69.69,92.53v-92.74h76.89a43.23,43.23,0,0,0-42.44,35.22v68.3A43.24,43.24,0,0,0-447.45-751.32Z" transform="translate(1075.06 889.92)"/><rect class="cls-1" x="446.57" width="0.01" height="52.17"/><rect class="cls-1" x="446.57" y="86.62" width="0.01" height="51.98"/><path class="cls-1" d="M-352-848.79v2.28s0-.46,0-1.29C-352.08-848.09-352.06-848.42-352-848.79Z" transform="translate(1075.06 889.92)"/><path class="cls-1" d="M-352-848.79c0,.37,0,.7,0,1a43.26,43.26,0,0,0-43.19-42.12h69C-349.15-878-351.81-855.91-352-848.79Z" transform="translate(1075.06 889.92)"/><path class="cls-1" d="M-326.23-751.32h-69A43.23,43.23,0,0,0-352-794.53C-351-756.53-326.23-751.32-326.23-751.32Z" transform="translate(1075.06 889.92)"/><rect class="cls-1" x="618.85" y="34.65" width="69.51" height="69.51" rx="13.8"/></svg>';
        ?>
        <img src="data:image/svg+xml;base64,<?= base64_encode( $svg ) ?>" alt="Technogan" width="150">
      </div>
      <div class="description">
        <h1><?= $article->title ?></h1>
        <span style="--clr:#<?= $article->color ?> ;"><?= $article->category ?> </span>
        <p><?= $article->intro ?></p>
      </div>
      <div class="source">Ecrit par <?= $article->first_name ?> <?= $article->name ?></div>
      <div class="link">Technogan.com</div>
    </div>
    <div class="container">
      <?= str_replace( '/uploads/articles/', 'http://technogan.com/uploads/articles/', $article->content) ?>
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
    </div>
  </body>
</html>
