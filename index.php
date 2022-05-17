<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', '1');

if ($_POST) {

    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $visitor_message = "";
    $email_body = "<div>";
    $recipient = "contact@julienmoreno.fr";
    ini_set("SMTP", "smtp.julienmoreno.fr");


    if (isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
    <label><b>Nom:</b></label>&nbsp;<span>" . $visitor_name . "</span>
</div>";
    }
    if (isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
    <label><b>Email:</b></label>&nbsp;<span>" . $visitor_email . "</span>
</div>";
    }
    if (isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
    <label><b>Objet:</b></label>&nbsp;<span>" . $email_title . "</span>
</div>";
    }
    if (isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
    <label><b>Message:</b></label>
    <div>" . $visitor_message . "</div>
</div>";
    }

    $email_body .= "</div>";

    $headers = 'MIME-Version: 1.0' . "\r\n"
        . 'Content-type: text/html; charset=utf-8' . "\r\n"
        . 'From: ' . $visitor_email . "\r\n";

    if (mail($recipient, $email_title, $email_body, $headers)) {
        header("Location: " . $_SERVER['PHP_SELF']);
    } else {
        echo '<script type="text/javascript"> alert("Nous sommes désolés mais une ereure c\'est produite."); </script>';
    }

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index,follow">

    <title>MORENO Julien | Portfolio</title>
    <meta content="Portfolio de Julien Moreno - Étudiant & Développeur freelance en BTS SNIR (Systèmes Numériques) option SN (Informatique et Réseaux)"
          name="description">
    <meta content="MORENO,Julien,Julien Moreno,Portfolio,BTS,SN,SNIR,Lycée Maupertuis,Webmaster,Etudiant,Moreno's bros Corp,freelance,BT    SSNIR" name="keywords">
    <meta content="Julien Moreno" name="author">

    <!-- Icons -->
    <link rel="shortcut icon" href="./src/img/favicon/favicon-196.png">
    <link rel="icon" href="./src/img/favicon/favicon.png" type="image/png">
    <link rel="icon" sizes="32x32" href="./src/img/favicon/favicon-32.png" type="image/png">
    <link rel="icon" sizes="64x64" href="./src/img/favicon/favicon-64.png" type="image/png">
    <link rel="icon" sizes="96x96" href="./src/img/favicon/favicon-96.png" type="image/png">
    <link rel="icon" sizes="196x196" href="./src/img/favicon/favicon-196.png" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="./src/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./src/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./src/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./src/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./src/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./src/img/favicon/apple-touch-icon-144x144.png">
    <meta name="msapplication-TileImage" content="favicon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <!-- Fichier CSS -->
    <link rel="stylesheet" type="text/css" href="src/styles.css" media="screen"/>

    <meta name="google-site-verification" content="chwpdClL6-cdnPvTQSdtqPOddUgzmEnVJnhEZPfA2i4" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FVG4HKXM8V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-FVG4HKXM8V');
    </script>
<body>
<header class="header" id="header">
    <nav class="nav container ">
        <a href="#" class="nav-title">MORENO Julien</a>
        <div class="nav-menu" id="nav_menu">
            <ul class="nav-list grid">
                <li class="nav-item"><a class="link" href="#about"><i class="uil uil-user nav-icon"></i>A propos</a>
                </li>
                <li class="nav-item"><a class="link" href="#skills"><i class="uil uil-file-info-alt nav-icon"></i>Compétences</a>
                </li>
                <li class="nav-item"><a class="link" href="#experience"><i class="uil uil-suitcase nav-icon"></i>Expériences</a>
                </li>
                <li class="nav-item"><a class="link" href="#school"><i class="uil uil-graduation-cap nav-icon"></i>Formation</a>
                </li>
                <li class="nav-item"><a class="link" href="#portfolio"><i
                                class="uil uil-image nav-icon"></i>Porfolio</a>
                </li>
                <li class="nav-item"><a class="link" href="#contact"> <i
                                class="uil uil-message nav-icon"></i>Contact</a>
                </li>
            </ul>
            <i class="uil uil-times close" id="nav_close"></i>
        </div>
        <div class="nav-btns">
            <div class="moon">
                <i class="uil uil-moon" id="theme-button"></i>
            </div>
            <div class="toggle" id="nav_toggle">
                <i class="uil uil-apps"></i>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="page-content">
        <div class="page-header">
            <div class="container">
                <div class="profil-img">
                    <img src="./src/img/profile.png" alt="Photo de profile Kyoru">
                </div>
                <h2 class="profil-title">MORENO Julien</h2>
                <h4 class="profil-description">Étudiant & Développeur freelance</h4>
                <div class="button-group">
                    <a href="#contact" class="button button--flex button--round">
                        Me contacter<i class="uil uil-message icon"></i>
                    </a>
                    <a href="#about" class="button button--flex button--round">
                        En savoir plus<i class="uil uil-user icon"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <section class="section about" id="about">
        <div class="container container-shadow">
            <div class="card">
                <div class="card-body">
                    <h3 class="section__title">A propos</h3>
                    <div class="about-img">
                        <img src="./src/img/moi.jpg" alt="Photo de julien moreno">
                    </div>
                    <p class="card-description">Je suis passionné par la photographie, l'informatique
                        et les nouvelles technologies. Ètudiant & Développeur freelance en BTS SN
                        (Systèmes Numériques) option SN (Informatique et Réseaux), au lycée Maupertuis à Saint-Malo
                        (35400).
                        Je suis actuellement en 2éme année de BTS et CO-PDG de Moreno's bros & Co.</p>
                    <a href="./src/pdf/MORENO_Curriculum_Vitae.pdf" class="button button--flex">
                        Télécharger mon CV <i class="uil uil-file-download icon"></i>

                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="skills section" id="skills">
        <div class="card container-shadow container">
            <h2 class="section__title">Compétences</h2>
            <span class="section__subtitle">Mes compétences professionnelles</span>
            <div class="skills_container grid">
                <div>
                    <div class="skills_content skills_close">
                        <div class="skills_header">
                            <i class="uil uil-brackets-curly skills_icon"></i>
                            <div>
                                <h1 class="skills_titles">Développement Frontend</h1>
                                <span class="skills_subtitle"></span>
                            </div>
                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>

                        <div class="skills_list grid">
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">HTML</h3>
                                    <span class="skills_number">90%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_html"></span>
                                </div>
                            </div>
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">CSS</h3>
                                    <span class="skills_number">80%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_css"></span>
                                </div>
                            </div>
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">JavaScript</h3>
                                    <span class="skills_number">70%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_js"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skills_content skills_close">
                        <div class="skills_header">
                            <i class="uil uil-server-network skills_icon"></i>
                            <div>
                                <h1 class="skills_titles">Développement Backend</h1>
                                <span class="skills_subtitle"></span>
                            </div>
                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>

                        <div class="skills_list grid">
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">PHP</h3>
                                    <span class="skills_number">70%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_php"></span>
                                </div>
                            </div>
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">Node Js</h3>
                                    <span class="skills_number">60%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_node"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skills_content skills_close">
                        <div class="skills_header">
                            <i class="uil uil-window skills_icon"></i>
                            <div>
                                <h1 class="skills_titles">Programation</h1>
                                <span class="skills_subtitle"></span>
                            </div>
                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>

                        <div class="skills_list grid">
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">C / C++</h3>
                                    <span class="skills_number">85%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_cpp"></span>
                                </div>
                            </div>
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">VB / VBA</h3>
                                    <span class="skills_number">60%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_vba"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skills_content skills_close">
                        <div class="skills_header">
                            <i class="uil uil-database skills_icon"></i>
                            <div>
                                <h1 class="skills_titles">Base de donnée</h1>
                                <span class="skills_subtitle"></span>
                            </div>
                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>

                        <div class="skills_list grid">
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">MySQL, MariaDB</h3>
                                    <span class="skills_number">70%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_sql"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skills_content skills_close">
                        <div class="skills_header">
                            <i class="uil uil-windows skills_icon"></i>
                            <div>
                                <h1 class="skills_titles">Systèmes d'exploitation</h1>
                                <span class="skills_subtitle"></span>
                            </div>
                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>

                        <div class="skills_list grid">
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">Linux (Debian, Ubuntu, Kali)</h3>
                                    <span class="skills_number">70%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_linux"></span>
                                </div>
                            </div>
                        </div>
                        <div class="skills_list grid">
                            <div class="skills_data">
                                <div class="skills_titles">
                                    <h3 class="skills_name">Windows (Windows 8 à Windows 11)</h3>
                                    <span class="skills_number">95%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_windows"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skills_content skills_close">
                    <div class="skills_header">
                        <i class="uil uil-desktop-cloud-alt skills_icon"></i>
                        <div>
                            <h1 class="skills_titles">Virtualisation</h1>
                            <span class="skills_subtitle"></span>
                        </div>
                        <i class="uil uil-angle-down skills_arrow"></i>
                    </div>
                    <div class="skills_list grid">
                        <div class="skills_data">
                            <div class="skills_titles">
                                <h3 class="skills_name">Hyperviseur Type 2 (VMware, VirtualBox)</h3>
                                <span class="skills_number">90%</span>
                            </div>
                            <div class="skills_bar">
                                <span class="skills_percentage skills_vm"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skills_content skills_close">
                    <div class="skills_header">
                        <i class="uil uil-channel skills_icon"></i>
                        <div>
                            <h1 class="skills_titles">Réseau</h1>
                            <span class="skills_subtitle"></span>
                        </div>
                        <i class="uil uil-angle-down skills_arrow"></i>
                    </div>
                    <div class="skills_list grid">
                        <div class="skills_data">
                            <div class="skills_titles">
                                <h3 class="skills_name">IPv6 et IPv4</h3>
                                <span class="skills_number">80%</span>
                            </div>
                            <div class="skills_bar">
                                <span class="skills_percentage skills_ip"></span>
                            </div>
                        </div>
                        <div class="skills_data">
                            <div class="skills_titles">
                                <h3 class="skills_name">Routeur et Switch Cisco (Vlan, routage, NAT)</h3>
                                <span class="skills_number">70%</span>
                            </div>
                            <div class="skills_bar">
                                <span class="skills_percentage skills_routeur"></span>
                            </div>
                        </div>
                        <div class="skills_data">
                            <div class="skills_titles">
                                <h3 class="skills_name">Protocole (DHCP, DNS, POP, ect..)</h3>
                                <span class="skills_number">70%</span>
                            </div>
                            <div class="skills_bar">
                                <span class="skills_percentage skills_protocol"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="qualification section" id="experience">
        <div class="card container-shadow container">
            <h2 class="section__title">Expériences</h2>
            <span class="section__subtitle">Mon parcours professionnel </span>
            <div class="qualification_container container">
                <div class="qualification_content">
                    <div class="qualification_data">
                        <div>
                            <h3 class="qualification_title">Technicien Support Utilisateurs</h3>
                            <span class="qualification_subtitle">SFIL</span>
                            <div class="qualification_calendar">
                                <i class="uil uil-calendar-alt"></i>
                                Mai 2021 - Juillet 2021
                            </div>
                        </div>
                        <div>
                            <span class="qualification_rounder"></span>
                            <span class="qualification_line"></span>
                        </div>
                    </div>
                    <div class="qualification_data">
                        <div></div>

                        <div>
                            <span class="qualification_rounder"></span>
                            <!--                            <span class="qualification_line"></span>-->
                        </div>
                        <div>
                            <h3 class="qualification_title">Développeur freelance</h3>
                            <span class="qualification_subtitle">Moreno's bros Corp</span>
                            <div class="qualification_calendar">
                                <i class="uil uil-calendar-alt"></i>
                                Avril 2022 - Actuellement
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="school section" id="school">
        <div class="card container-shadow container">
            <h2 class="section__title">Formations</h2>
            <span class="section__subtitle">Mon parcours étudiant </span>
            <div class="qualification_container container">
                <div class="qualification_data">
                    <div>
                        <h3 class="qualification_title">Bac STI2D</h3>
                        <span class="qualification_subtitle">Lycée Pierre Mendes France</span>
                        <div class="qualification_calendar">
                            <i class="uil uil-calendar-alt"></i>
                            2016-2020
                        </div>
                    </div>
                    <div>
                        <span class="qualification_rounder"></span>
                        <span class="qualification_line"></span>
                    </div>
                </div>
                <div class="qualification_data">
                    <div></div>
                    <div>
                        <span class="qualification_rounder"></span>
                        <span class="qualification_line"></span>
                    </div>
                    <div>
                        <h3 class="qualification_title">HTML5 et CSS3</h3>
                        <span class="qualification_subtitle">Certification Open Classrooms</span>
                        <div class="qualification_calendar">
                            <i class="uil uil-calendar-alt"></i>
                            Mars 2020
                        </div>
                    </div>
                </div>
                <div class="qualification_data">
                    <div>
                        <h3 class="qualification_title">BTS SNIR</h3>
                        <span class="qualification_subtitle">Lycée Maupertuis</span>
                        <div class="qualification_calendar">
                            <i class="uil uil-calendar-alt"></i>
                            2020-2022
                        </div>
                    </div>
                    <div>
                        <span class="qualification_rounder"></span>
                        <!--                        <span class="qualification_line"></span>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio section" id="portfolio">
        <div class="card container-shadow container">
            <h2 class="section__title">Projet</h2>
            <span class="section__subtitle">Ci-dessous vous retrouverez tous mes anciens projets réalisés à ce jour. </span>
            <div class="portfolio_button-group button-group" id="myBtnContainer">
                <button class="portfolio_button button button--flex" data-filter="all">Tout afficher</button>
                <button class="portfolio_button button button--flex" data-filter="web"> Site Web</button>
                <button class="portfolio_button button button--flex" data-filter="app"> Application Web</button>
                <button class="portfolio_button button button--flex" data-filter="other"> Autres</button>
            </div>
            <div class="portfolio_container">
                <div class="portfolio_item portfolio_show" data-category="web">
                    <h3 class="portfolio_item_title">Portfolio</h3>
                    <span class="portfolio_item_date">Mai 2022</span>
                    <div class="portfolio_item_image">
                        <img src="./src/img/site2.png" alt="Photo Projet Portfolio">
                    </div>
                    <span class="portfolio_item_lang">Langages : HTML5, CSS3, JavaScript.</span>
                    <p class="portfolio_item_text">Réalisation d'un Portfolio, un média de présentation.</p>
                </div>
                <div class="portfolio_item portfolio_show" data-category="web">
                    <h3 class="portfolio_item_title">Pain d'Épices & Chocolat</h3>
                    <span class="portfolio_item_date">Avril 2022</span>
                    <div class="portfolio_item_image">
                        <img src="./src/img/site1.png" alt="Photo Projet Pain d'Épices & Chocolat">
                    </div>
                    <span class="portfolio_item_lang">Langages : HTML5, CSS3, JavaScript et PHP.</span>
                    <p class="portfolio_item_text">Pain d'Épices & Chocolat est un site vitrine, il permet à
                        l'utilisateur de regarder les dernières créations du pâtissier.</p>
                </div>
                <div class="portfolio_item portfolio_show" data-category="web">
                    <h3 class="portfolio_item_title">Big Hanna</h3>
                    <span class="portfolio_item_date">Mars 2022</span>
                    <div class="portfolio_item_image">
                        <img src="./src/img/site4.png" alt="Photo Projet Big Hanna">
                    </div>
                    <span class="portfolio_item_lang">Langages : HTML5, CSS3, JavaScript et PHP.</span>
                    <p class="portfolio_item_text">Big Hanna est un site réalisé au cours de mon BTS, il permet à
                        l'utilisateur de connaitre la température d'une unitée de compostage mobile</p>
                </div>
                <div class="portfolio_item portfolio_show" data-category="other">
                    <h3 class="portfolio_item_title">BDS Topographie</h3>
                    <span class="portfolio_item_date">Juin 2021</span>
                    <div class="portfolio_item_image">
                        <img src="./src/img/site3.PNG" alt="Photo Projet BDS Topographie">
                    </div>
                    <span class="portfolio_item_lang">Langages : VBA.</span>
                    <p class="portfolio_item_text">Outil de Gestion d'un parc informatique.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact section" id="contact">
        <div class="card container-shadow container">
            <h2 class="section__title">Me Contacter</h2>
            <span class="section__subtitle">Entrer en contact</span>
            <div class="contact_container container grid">
                <div>
                    <div class="contact_information">
                        <i class="uil uil-phone-alt icon"></i>
                        <div data-aos="fade-left">
                            <h3 class="contact_title">Téléphone</h3>
                            <span class="contact_subtitle">+33 6 51 45 21 73</span>
                        </div>
                    </div>
                    <a href="mailto:contact@julienmoreno.fr" target="_blank">
                        <div class="contact_information">
                            <i class="uil uil-envelope icon"></i>
                            <div data-aos="fade-left">
                                <h3 class="contact_title">Email</h3>
                                <span class="contact_subtitle">contact@julienmoreno.fr</span>
                            </div>
                        </div>
                    </a>
                    <a href="https://www.linkedin.com/in/moreno-julien-5b1874214/" target="_blank">
                        <div class="contact_information">
                            <i class="uil uil-linkedin icon"></i>
                            <div data-aos="fade-left">
                                <h3 class="contact_title">Linkedin</h3>
                                <span class="contact_subtitle">Moreno Julien</span>
                            </div>
                        </div>
                    </a>
                    <a href="https://github.com/Ky0ru" target="_blank">
                        <div class="contact_information">
                            <i class="uil uil-github icon"></i>
                            <div data-aos="fade-left">
                                <h3 class="contact_title">GitHub</h3>
                                <span class="contact_subtitle">Ky0ru</span>
                            </div>
                        </div>
                    </a>
                    <a href="https://www.instagram.com/julien_mr0/" target="_blank">
                        <div class="contact_information">
                            <i class="uil uil-instagram icon"></i>
                            <div data-aos="fade-left">
                                <h3 class="contact_title">Instagram</h3>
                                <span class="contact_subtitle">julien_mr0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <form class="contact_form grid" action="index.php" method="post">
                    <div class="contact_inputs grid" data-aos="zoom-in">
                        <div class="contact_content">
                            <label for="name" class="contact_label">Nom</label>
                            <input type="text" id="name" class="contact_input" name="visitor_name"
                                   placeholder="Prénom Nom" pattern=[A-Z\sa-z]{3,20} required>
                        </div>
                        <div class="contact_content">
                            <label for="email" class="contact_label">Email</label>
                            <input type="email" id="email" class="contact_input" name="visitor_email"
                                   placeholder="votreemail@email.fr" required>
                        </div>
                        <div class="contact_content">
                            <label for="title" class="contact_label">Objet</label>
                            <input type="text" class="contact_input" id="title" name="email_title" required
                                   placeholder="Objet de votre demande" pattern="[A-Za-z0-9\s]{8,60}">
                        </div>
                        <div class="contact_content">
                            <label for="text" class="contact_label">Message</label>
                            <textarea name="visitor_message" id="text" cols="1" rows="7" class="contact_input"
                                      placeholder="Dites moi ce que vous voulez." required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="button button--flex" data-aos="zoom-in">
                                Envoyer message
                                <i class="uil uil-message contact_icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<footer class="footer">
    <div class="footer_bg">
        <div class="footer_container container grid">
            <div>
                <h3 class="footer_title">Julien Moreno</h3>
                <span class="footer_subtitle">Étudiant & Développeur freelance</span>
            </div>

            <ul class="footer_links">
                <li><a class="footer_link" href="#">Qui&nbsp;suis-je&nbsp;?</a></li>
                <li><a class="footer_link" href="#experience">Expériences&nbsp;professionnel</a></li>
                <li><a class="footer_link" href="#school">Mes&nbsp;formations</a></li>
                <li><a class="footer_link" href="#portfolio">Mes&nbsp;réalisations</a></li>
                <li><a class="footer_link" href="#contact">Me&nbsp;contacter</a></li>
            </ul>
            <div class="footer_socials">
                <a href="https://www.instagram.com/julien_mr0/" target="_blank" class="footer_social">
                    <i class="uil uil-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/moreno-julien-5b1874214/" target="_blank" class="footer_social">
                    <i class="uil uil-linkedin"></i>
                </a>
                <a href="https://github.com/Ky0ru" target="_blank" class="footer_social">
                    <i class="uil uil-github"></i>
                </a>
            </div>
        </div>
        <p class="footer_copyright">&#169; Moreno's bros Corp. Tous droits réservés</p>
    </div>
</footer>

<a href="#" class="scrollup" id="scrollup">
    <i class="uil uil-arrow-up icon-scrollup"></i>
</a>
<script src="./src/js/main.js"></script>
</body>


</html>