<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/creationSite.json'), true);

$modulesPages = [
    '/modules/creationSite/introduction_creationSite.html.twig',
    '/modules/creationSite/fonctionnalites_creationSite.html.twig',
    '/modules/creationSite/rgpd_creationSite.html.twig',
    '/modules/creationSite/expertiseAccompagnement_creationSite.html.twig',
    '/modules/creationSite/hebergement_creationSite.html.twig',
    '/modules/creationSite/siteFacile_creationSite.html.twig',
    '/modules/creationSite/sea_creationSite.html.twig',
    '/modules/creationSite/identiteVisuelle_creationSite.html.twig',
    '/modules/creationSite/referenceSite_creationSite.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages
]);
