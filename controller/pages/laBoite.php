<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$text = json_decode(file_get_contents(JSON . DS . 'modules/text/laBoite.json'), true);

$modulesPages = [
    '/modules/laBoite/introduction_laBoite.html.twig',
    '/modules/laBoite/infosEntreprise_laBoite.html.twig',
    '/modules/laBoite/groupeLbi_laBoite.html.twig',
    '/modules/laBoite/nouveauProjet_laBoite.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionLaBoite" => $text['introductionLaBoite'],
    "infosEntrepriseLaBoite" => $text['infosEntrepriseLaBoite'],
    "groupeLbiLaBoite" => $text['groupeLbiLaBoite'],
    "nouveauProjetLaBoite" => $text['nouveauProjetLaBoite']
]);
