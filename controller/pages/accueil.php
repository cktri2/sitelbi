<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/accueil.json'), true);

$modulesPages = [
    '/modules/accueil/introduction_accueil.html.twig',
    '/modules/accueil/logicielHektor_accueil.html.twig',
    '/modules/accueil/fabrikSite_accueil.html.twig',
    '/modules/accueil/referencement_accueil.html.twig',
    '/modules/accueil/webmarkImmo_accueil.html.twig',
    '/modules/accueil/interkab_accueil.html.twig',
    '/modules/accueil/lbiAcademy_accueil.html.twig',
    '/modules/accueil/groupeLbi_accueil.html.twig',
    '/modules/accueil/actuBlog_accueil.html.twig',
    '/modules/accueil/newsletter_accueil.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionAccueil" => $text['introductionAccueil'],
    "logicielHektorAccueil" => $text['logicielHektorAccueil'],
    "fabrikSiteAccueil" => $text['fabrikSiteAccueil'],
    "referencementAccueil" => $text['referencementAccueil'],
    "webmarkImmoAccueil" => $text['webmarkImmoAccueil'],
    "interkabAccueil" => $text['interkabAccueil'],
    "lbiAcademyAccueil" => $text['lbiAcademyAccueil'],
    "groupeLbiAccueil" => $text['groupeLbiAccueil'],
    "actuBlogAccueil" => $text['actuBlogAccueil'],
    "newsletterAccueil" => $text['newsletterAccueil']
]);
