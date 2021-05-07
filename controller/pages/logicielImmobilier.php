<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('vueTemplate');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);
$text = json_decode(file_get_contents(JSON . DS . 'modules/text/logicielImmobilier.json'), true);

$modulesPages = [
    '/modules/logicielImmobilier/introduction_logicielImmobilier.html.twig',
    '/modules/logicielImmobilier/hektorAdapt_logicielImmobilier.html.twig',
    '/modules/logicielImmobilier/presentationLogiciel_logicielImmobilier.html.twig',
    '/modules/generique/demoLogiciel.html.twig',
    '/modules/logicielImmobilier/interkab_logicielImmobilier.html.twig',
    '/modules/logicielImmobilier/appMobile_logicielImmobilier.html.twig',
    '/modules/logicielImmobilier/lbiAcademy_logicielImmobilier.html.twig',
    '/modules/logicielImmobilier/videoHektor_logicielImmobilier.html.twig',
    '/modules/generique/formulaireContact.html.twig',
];

echo $twig->render('uikit/index.html.twig', [
    "modulesPages" => $modulesPages,
    "introductionLogicielImmobilier" => $text['introductionLogicielImmobilier'],
    "hektorAdaptLogicielImmobilier" => $text['hektorAdaptLogicielImmobilier'],
    "presentationLogicielLogicielImmobilier" => $text['presentationLogicielLogicielImmobilier'],
    "demoLogicielGenerique" => $text['demoLogicielGenerique'],
    "interkabLogicielImmobilier" => $text['interkabLogicielImmobilier'],
    "appMobileLogicielImmobilier" => $text['appMobileLogicielImmobilier'],
    "lbiAcademyLogicielImmobilier" => $text['lbiAcademyLogicielImmobilier']
]);
