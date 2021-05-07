<?php
use Devscreencast\ResponseClass\JsonResponse;


class JsonReponseController {
    use Singleton;
    protected $context;
    protected $container;
    public function __construct() {  }
    public function sendMail() 
    {
        $data = (isset($_REQUEST['data']) && !!$_REQUEST['data'])? $_REQUEST['data'] : [];
        $dataContact = (isset($data['contact']) && !!$data['contact'])? $data['contact'] : [];
        $mailContent = $this->getMailContent($dataContact);
        $send = $this->send('chiheb.khemir@hotmail.com', "Concact Site LBI", $mailContent);
        $this->jsonReponse($data);
    }
    protected function isLocalhost() 
    {
        $host =  (!!$_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
        return (strpos($host, 'localhost') !== false);
    }
    public function send($to='ck.chiheb.khemir@gmail.com', $subject="demande", $contents='', $from="no-reply@la-boite-immo.com", $cc = null, $reply = null)
    {
        if($this->isLocalhost()){
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername('ck.chiheb.khemir@gmail.com')
                ->setPassword('MYPASSWORDGMAIL');            
        } else {
            $transport = (new Swift_SendmailTransport());
        }
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to);
        if(!!$cc){
            $message->setCc($cc);
        }
        if(!!$reply){
            $message->setReplyTo($reply);
        }
        if(is_array($contents)){
            foreach($contents as $mime => $content){
                $message->addPart($content, $mime);
            }
        } else {
            $message->setBody($contents, 'text/html');
        }
        $message->getHeaders()->addPathHeader('Return-Path', 'no-reply@la-boite-immo.com');
        
        if (!$mailer->send($message, $errors)) {
            throw new \Exception(print_r($errors, true));
        }
        return true;
    }
    protected function getMailContent($data = []) 
    {
        $loader = new Twig_Loader_Filesystem('vueTemplate');
        $twig = new Twig_Environment($loader, [
            'cache' => false,
        ]);
        return $twig->render('modules/mail/content_mail.html.twig', ['data' => $data]);
    }


    protected function jsonReponse($data=[], $status = 'ok', $message='') 
    {
        ob_clean();
        header_remove(); 
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        new JsonResponse($status, $message, $data);
        die();exit();
    }

}
