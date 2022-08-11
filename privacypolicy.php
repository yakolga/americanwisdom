<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>American Wisdom Gold</title>
  <link rel="stylesheet" href="css/style.min.css">
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
                <li class="header__item"><a href="index.php#promo">Home</a></li>
                <li class="header__item"><a href="index.php#about">About</a></li>
              </ul>
            </nav>
          </div>
          <a href="index.php#contact"><button class="header__button">Contact us</button></a>
        </div>
        <div class="header__hamburger hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </header>

  <section class="privacy">
    <div class="privacy__intro">
      <div class="container">
        <h1 class="privacy__title">Privacy Policy</h1>
      </div>
    </div>
    <div class="privacy__container container">
      <div class="privacy__wrapper">
        <div class="privacy__text">
          <p class="privacy__bold">American Wisdom Gold, respects your privacy and does not sell your personal information.</p>
          <p>If you are receiving this Privacy Policy, it is because you are applying to become a customer. This Privacy Policy explains how Oxford Gold Group, Inc. (hereafter, “Oxford,” “we,” or “us”) we treat the personal information that you provide to us in either applying to become a customer or as a customer. It also explains your privacy rights and how you can exercise them.</p>
          <p>We follow this privacy policy in accordance with applicable law of the United States and those of its states in which we operate. We do not operate in countries other than the United States, nor do we knowingly offer or provide our services to residents of countries other than the United States.</p>
          <p>This privacy policy applies only to our collection of information; it does not apply to information that you may provide to or is collected by a third-party. Indeed, in certain instances, we are obtaining information from you on behalf of a third-party, such as a precious metal custodian. While our collection and use of such information is governed by this policy, the collection and use of information by the other third-party is subject to their privacy practices and policies, including any privacy rights that the third party may offer.</p>
          <p>This privacy policy does not apply to our collection of information from you through our website or over the phone if you are not an applicant or customer. Information collected from you in those capacities are governed by the privacy policy available on our website at <a href="www.americanwisdomgold.com">www.americanwisdomgold.com/privacypolicy/</a></p>
          <p class="privacy__bold">American Wisdom Gold, respects your privacy and does not sell your personal information.</p>
          <p>We collect personal information from you during the application process and while you are a customer for the purposes of providing our services to you, to manage our relationship with you, and for legal and regulatory purposes. You will voluntarily provide most of the information directly to us. The specific information we collect and how we use that information are discussed in detail below.</p>
          <p class="privacy__bold">How We Store And Protect Your Personal Information</p>
          <p>The security and confidentiality of your information are important to us. In general, we keep your personal information for the duration of your relationship with us. Once you terminate your relationship with us, we generally will continue to store archived copies of your personal information for legitimate business purposes and to comply with the law.</p>
          <p>Your information will remain subject to the terms of this Policy even if we undergo a business transition. We may transfer your information to a successor person or entity upon an acquisition or other corporate reorganization. You hereby consent to such transfers, and we may assign and transfer all of the rights, benefits, duties, and obligations of this Policy.</p>
          <p>We do not store your personal information on our own servers but, instead, use third parties, who take commercially reasonable steps to safeguard and deter unauthorized access to your information. In this regard, access to this information is authorized only for those who have a business need for such access. Please know that no platform, application, website, electronic database or other format or system is completely secure. Moreover, no data transmission over the Internet is completely secure nor can any be guaranteed to be totally secure, and, for this reason, we cannot ensure or warrant the security of any information that you transmit. Therefore, we cannot guarantee that safeguards employed will prevent the disclosure of your information.</p>
          <p>If you become aware of a security breach, please notify us immediately at info@oxfordgoldgroup.com, or call us at (833) 600-4653.</p>
          <p class="privacy__bold">Changes to our Privacy Policy</p>
          <p>This policy may be changed from time to time to reflect changes in our practices concerning the collection and use of personal information related to your use of the site. If we make material changes to this policy, we will let you know by sending an email to you at the last email address you provided us and, where required by applicable law, we will obtain your consent.</p>
          <p class="privacy__bold">Contacting the Oxford Gold Group</p>
          <p>If there are any questions regarding this privacy policy you may contact us using the information below: <br> 
          American Wisdom Gold <br>
          9100 Wilshire Blvd., Suite 800E <br> 
          Beverly Hills, CA 90212 <br> 
          Website: <a href="https://www.americanwisdomgold.com/privacypolicy/">www.americanwisdomgold.com</a><br>
          Email: <a href="mailto:info@americanwisdomgold">info@americanwisdomgold</a> <br>
          Phone: <a href="phone:(789) 699-5678">(789) 789-4567</a>
          </p>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer__container container">
      <div class="footer__wrapper footer__padding">
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
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>