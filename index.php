<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>American Wisdom Gold</title>
  <link rel="apple-touch-icon" sizes="57x57" href="fav.ico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="fav.ico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="fav.ico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="fav.ico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="fav.ico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="fav.ico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="fav.ico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="fav.ico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="fav.ico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="fav.ico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="fav.ico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="fav.ico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="fav.ico/favicon-16x16.png">
  <link rel="manifest" href="fav.ico/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="fav.ico/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/style.min.css">
</head>
<body id="menu">
  <header class="header">
      <?php
      require_once "shd.php";
      setlocale(LC_MONETARY,"en_US");
      $ch='https://widget.nfusionsolutions.com/widget/ticker/1/7510570b-0dae-4731-a0ec-b3e7c1b4a6c7/40478be8-44c9-4d76-9747-ea005a67a0d6';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_URL, $ch);
      curl_setopt($curl, CURLOPT_REFERER, $ch);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
      $res = curl_exec($curl);
      curl_close($curl);
      $html = new simple_html_dom();
      $html->load($res);
      foreach($html->find('span.value') as $element) {
          $currentrate=html_entity_decode($element->innertext);
          $pref=substr($currentrate,0,1);
          if ($pref=='+' || $pref=='-') {
             $prefix=$pref;
          }
          $currentrate=str_replace([',','$','+','-'],'',html_entity_decode($currentrate));
          if(isset($prefix)){
              $currentrate=$prefix.($currentrate*1.02);
              $element->innertext=$currentrate;
              unset($prefix);
          }else{
            $currentrate=money_format("%10n",$currentrate*1.02);
            $element->innertext=$currentrate;
          }
      }?><?if($html){?>
      <style>.datastore{margin:0;max-width:100%}</style>
      <div class='header_exc'><?=$html;$html->clear();unset($html);unset($res);?></div><?}?>
    <div class="header__container container">
      <div class="header__wrapper">
        <a href="index.php" class="header__logo">
          <img src="images/logo.svg" alt="logo">
        </a>
        <div class="header__menu menu">
          <div class="header__navigation">
            <nav>
              <ul>
                <a href="index.php" class="header__logo_media">
                  <img src="images/logo.svg" alt="logo">
                </a>
                <li class="header__item"><a href="#promo">Home</a></li>
                <li class="header__item"><a href="#about">About</a></li>
              </ul>
            </nav>
          </div>
          <a href="#contact"><button class="header__button">Contact us</button></a>
        </div>
        <div class="header__hamburger hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <div class="header__add"></div>
  </header>
  <section class="promo" id="promo">
    <div class="promo__container container">
      <div class="promo__wrapper">
        <div class="promo__text animate__animated animate__fadeInLeft">
          <h1 class="promo__title">A Multifunctional Service Created<br>Just For You</h1>
          <p class="promo__paragraph">Our mission is to effectively help thousands of Americans diversify and protect their retirement savings, from precious metals IRAs to direct purchases of gold and silver</p>
          <a href="#contact"><buttton class="promo__button gold_button">Learn more</buttton></a>
        </div>
        <div class="promo__image animate__animated animate__fadeInRight">
          <img src="images/maingold.png" alt="gold">
        </div>
      </div>
    </div>
    <a href="#contact" class="promo__arrow animate__animated animate__pulse animate__infinite	infinite">
      <img src="images/arrow.svg" alt="arrow">
    </a>
  </section>

  <section class="contact" id="contact">
    <div class="contact__container container">
      <div class="contact__wrapper">
        <div class="contact__white">
          <h3 class="contact__title">Fill out the form and we will contact you</h3>
          <form action="#" class="contact__form" id="contactform">
            <label for="firstname">
              First name*
              <input type="text" id="firstname" name="name" placeholder="First name" class="contact__input">
            </label>
            <label for="lastname">
              Last name*
              <input type="text" id="lastname" name="surname" placeholder="Last name" class="contact__input">
            </label>
            <label for="telepone">
              Phone number*
              <input id="telepone" name="phone" placeholder="Your phone" class="contact__input">
            </label>
            <label for="email">
              Email*
              <input type="text" id="email" name="email" placeholder="Email" class="contact__input">
            </label>
            <div class="contact__policy">
              <input name="privacypolicy" type="checkbox">
              <span>I agree with <a href="privacypolicy.html">privacy policy</a></span>
            </div>
            <button class="contact__button">SEND</button>
          </form>
        </div>
        <div class="contact__text animate__animated animate__fadeInRight animate__delay-2s">
          <h4 class="contact__subtitle">Get in touch</h4>
          <p class="contact__paragraph">We provide opportunities for thousands of Americans to diversify and effectively protect their assets, and retirement savings, from IRAs in precious metals to direct purchases of gold and silver. We are the only precious metals company recommended by various international communities.</p>
          <div class="contact__points">
            <div class="contact__point">
              <span class="icon-guarantee"></span>
              A+ rating from the Better Business Bureau
            </div>
            <div class="contact__point">
              <span class="icon-guarantee"></span>
              Triple-A rating from the Business Consumer Alliance
            </div>
            <div class="contact__point">
              <span class="icon-guarantee"></span>
              The company of 2021
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about" id="about">
    <div class="about__container container">
      <div class="about__wrapper">
        <div class="about__info animate__animated animate__fadeInLeft animate__delay-3s">
          <h2 class="about__title">About us</h2>
          <p class="about__text">We know that you have many options when it comes to choosing a precious metals company that you want to actively work with. Our company adjusts investment strategies in full accordance with the phenomena of the alleged financial risks of its clients. We allow you to protect and preserve your capital and provide a real opportunity to significantly increase your investments over time using our services.</p>
          <p class="about__text">We have created a wide range of customer-friendly products and services that fit any investment strategy. The key purpose of our activity is to offer retail investors the opportunity to invest in a portfolio of fixed assets. We try to understand the needs of our investors and accurately protect their interests.</p>
          <a href="#contact"><button class="about__button gold_button">Contact us</button></a>
        </div>
        <div class="about__background">
          <img src="images/goldback.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="benefits" id="benefits">
    <div class="benefits__container container">
      <div class="benefits__wrapper">
        <h2 class="benefits__title">What Is The Performance Of A Precious Metal<span>IRA?</span></h2> 
          <div class="benefits__elements">
            <div class="benefits__elem benefits__elem_bg animate__animated animate__backInLeft animate__delay-4s">Precious metals IRAs are somewhat similar to traditional IRAs. However, as the name suggests, the precious metal IRA allows for physical gold, silver, platinum, or palladium. Precious metals IRAs are similar to traditional IRAs. However, as the name suggests, precious metals IRAs can contain physical gold, silver, platinum, or palladium.</div>
            <div class="benefits__elem benefits__elem_middle animate__animated animate__backInUp animate__delay-4s">A Precious Metals IRA is similar to a traditional IRA. However, as the name suggests, a Precious Metals IRA allows for physical gold, silver, platinum or palladium. A Precious Metals IRA is similar to a traditional IRA. However, as the name suggests, a Precious Metals IRA allows for physical gold, silver, platinum or palladium to be held.</div>
            <div class="benefits__elem benefits__elem_bg animate__animated animate__backInRight animate__delay-4s">A Precious Metals IRA is similar to a traditional IRA. However, as the name suggests, a Precious Metals IRA allows for physical gold, silver, platinum or palladium. A Precious Metals IRA is similar to a traditional IRA. However, as the name suggests, a Precious Metals IRA allows for physical gold, silver, platinum or palladium to be held.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="coin" id="coin">
    <div class="coin__container container">
      <div class="coin__wrapper">
        <div class="coin__title">Why The Americanwisdomgold Is Your <span>Best Choice</span></div>
        <div class="coin__info">
          <div class="coin__text">A large number of products and services, created by experienced employees of our company, fully correspond to any investment strategy. With our help, investors got an effective opportunity to invest in a portfolio of fixed assets, our employees clearly understand the needs of investors and protect their legitimate interests.</div>
          <a href="#contact"><button class="coin__button gold_button">Contact us</button></a>
        </div>
        <div class="coin__coin">
          <img src="images/coin.png" alt="coin">
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer__container container">
      <div class="footer__wrapper">
        <a href="index.php" class="footer__logo">
          <img src="images/logo.svg" alt="logo">
        </a>
        <div class="footer__links">
          <a href="privacypolicy.php" class="footer__link">Privacy Policy</a>
        </div>
        <div class="footer__rights">Statements on this page are opinions and past performance is not indicative of future earnings or results. Like all investments, precious metals come with risk. Gold, silver, and platinum coins and bars can go up, down, or stay the same in value depending on several factors. We cannot give a 100% guarantee that the metal purchased will be graded sufficiently to benefit customers. Buying or selling precious metals and determining which precious metals to buy or sell is your personal decision and should be made solely by you and no one else.</div>
        <div class="footer__copyright">© Copyright 2022 Americanwisdomgold. All Rights Reserved.</div>
      </div>
    </div>
  </footer>

  <div class="overlay">
    <div class="modal modal_mini" id="thanks">
      <div class="modal__close">&times;</div>
      <div class="modal__logo"><img src="images/logo.svg" alt="logo"></div>
      <div class="modal__subtitle">Thank You for request</div>
      <div class="modal__descr">We will contact You within 24h</div>
    </div>
  </div>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
