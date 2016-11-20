<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Rancid Tomatoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="movie.css">
        <link rel="shortcut icon" type="image/gif" href="images/rotten.gif">
    </head>
    <body>
      <?php
        $movie = $_GET["film"];
        $infoText = file($movie."/info.txt");
        $info = $infoText[0]."(".$infoText[1].")";
        $reviewfile=glob($movie."/review*.txt");
        $overview_lines = file($movie."/overview.txt");

        $files = glob($movie."/".'*.txt');
        $num_of_files = count($reviewfile);

      function rating($rating){
            if ($rating>60) {
              return "fresh.jpg";
            }
            return "rottenbig.png";
         }
       ?>

        <div id="banner"><img src="images/banner.png" alt="banner" id="img"></div>
        <h1><?= $info ?></h1>
        <div id="overall">
            <div id="Overview">
                <img src="<?= $movie ?>/overview.png" alt="overview">
                <dl class="OverViewdl">
                  <?php
                    foreach ($overview_lines as $line=>$value) {
                        $dd_line=explode(":",$value)
                   ?>
                    <dt><?= $dd_line[0] ?></dt>
                    <dd>
                        <ul>
                          <?php
                            $li_line=explode(",",$dd_line[1]);
                            foreach($li_line as $dline=>$dvalue){
                          ?>
                            <li><?= $dvalue ?></li>
                            <?php
                          }
                           ?>
                        </ul>
                    </dd>
                  <?php
                    }
                  ?>
                </dl>
            </div>

            <div id="reviews">
                <div id="reviewsbar">
                   <img id="reviewsbarimg" src="images/<?= rating($infoText[2])  ?>" alt="overview">
                   <div id="rate"><?= $infoText[2]?><span class="out">(out of <?= $num_of_files ?> ) reviews</span></div>

                </div>
                <div class="reviewcol">
                <?php
                $counter=0;
                  for($j=0;$j<$num_of_files;$j+=2){
                      $counter++;
                      $review = file($reviewfile[$j]);
                 ?>
                    <div class="reviewquote">
                        <img class="likeimg" src="images/<?=strtolower($review[1])?>.gif" alt="rotten">
                      <?= $review[0] ?>
                    </div>
                    <div class="personalquote">
                        <img class="personimg" src="images/critic.gif" alt="critic">
                        <p><?= $review[2] ?><br><em><?= $review[3] ?></em></p>
                    </div>
                    <?php
                  }
                     ?>
                </div>
                <div class="reviewcol">
                <?php
                  for($j=1;$j<$num_of_files;$j+=2){
                      $counter++;
                      $review = file($reviewfile[$j]);
                 ?>
                    <div class="reviewquote">
                        <img class="likeimg" src="images/<?=strtolower($review[1])?>.gif" alt="rotten">
                      <?= $review[0] ?>
                    </div>
                    <div class="personalquote">
                        <img class="personimg" src="images/critic.gif" alt="critic">

                        <p><?= $review[2] ?><br><em><?= $review[3] ?></em></p>
                    </div>
                    <?php
                  }
                     ?>
                </div>
                </div>
                <div id="bottombar">
                    <p>(1-<?= $counter ?>) of <?= $num_of_files ?></p>
                </div>
                <div id="reviewsbar">
                  <?php
                  $pic="rottenbig.png";
                      if ($infoText[2]>60) {
                        $pic="fresh.jpg";
                      }
                   ?>
                   <img id="reviewsbarimg" src="images/<?= $pic ?>" alt="overview">
                   <div id="rate"><?= $infoText[2]."%" ?><span class="out">%(out of <?= $num_of_files ?> ) reviews</span></div>
                </div>
</div>
      <div id="banner"><img src="images/banner.png" alt="banner" id="imgf"></div>
        <div id="w3ccheck">
            <a href="http://validator.w3.org/check/referer"><img src="images/w3c-html.png" alt="Valid HTML5"></a> <br>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/w3c-css.png" alt="Valid CSS"></a>
	        </div>


</body></html>
