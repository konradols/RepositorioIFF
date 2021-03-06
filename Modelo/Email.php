<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__.'/../vendor/autoload.php';


class Email {

    private $emailObject;
    private $corpoHTML;
    private $corpoHTML2;
    private $corpoHTML3;
    private $parametros;
    private $titulo = '';
    private $mensagem = '';
    private $liberar = false;

    public function __construct() {
        $this->emailObject = new PHPMailer(true);
        $this->constroiMensagem();
        try {
            //Server settings
            $this->emailObject->isSMTP();                                            // Set this->emailObjecter to use SMTP
            $this->emailObject->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $this->emailObject->SMTPAuth = true;                                   // Enable SMTP authentication
            $this->emailObject->Username = 'dspaceiffarsvs@gmail.com';                     // SMTP username
            $this->emailObject->Password = 'ankqenjijgpgxmdz';                               // SMTP password
            $this->emailObject->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $this->emailObject->Port = 465;                                    // TCP port to connect to
            $this->emailObject->setFrom('dspaceiffarsvs@gmail.com', "Reposiorio Iffar");
            $this->emailObject->addReplyTo('dspaceiffarsvs@gmail.com', "Repositorio Iffar");
            $this->emailObject->isHTML(true);                                  // Set ethis->emailObject format to HTML
            $this->emailObject->AltBody = "Sua caixa de entrada não suporta este E-mail.";
        } catch (Exception $e) {
            $hora = new DateTime();
            file_put_contents("../Logs/this->emailObjectLog.txt", $e->getMessage() . "\nHORA: " . $hora->format('d/m/Y H:i:s'), FILE_APPEND);
        }
    }

    public function setEmailResposta(string $remetente) {
        $this->emailObject->addReplyTo($remetente);
    }

    private function constroiMensagem() {
        $this->corpoHTML = '<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Email de confirmação</title>
    </head>
    <body style="max-width: 100%; margin: 0; padding: 0; font-family: Arial">

        <style>

            .detalheSuaveE {
                background-color: #f5f5f5;
                -webkit-box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -1px rgba(0, 0, 0, 0.2);
                box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -1px rgba(0, 0, 0, 0.2);
            }

            .horizontal-dividerE{
                background-image: linear-gradient(to right, transparent, black , transparent);
                height: 1px;
            }
        </style>

        <table class="detalheSuaveE" align="center" cellpadding="0" cellspacing="0" width="90%" style="max-width: 100%; border-collapse: collapse;">
            <tr>
                <td align="center" style="padding: 20px 0 20px 0;">
                    <img src="https://www.iffarroupilha.edu.br/cache/images/novamarca_iff_login_125x157-equal.png" alt="Criando Mágica de E-mail" width="300" height="230" style="display: block; height: 10rem; width: auto" />
                </td>
            </tr>
            <tr class="horizontal-dividerE">
                <td>

                </td>
            </tr>

            <tr>
                <td bgcolor="#ffffff" style="padding: 20px 30px 40px 30px;">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" style="font-size: 1rem">
                               ';
        $this->corpoHTML2 = '</td>
            </tr><tr>
                <td bgcolor="#ffffff" style="padding: 20px 30px 40px 30px;">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" style="font-size: 1rem">
                               
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 20px 0px 30px 0; font-size: 1rem;">';
        $this->corpoHTML3 = '</td>
                        </tr>
                    </table>
                </td>
            <tr class="horizontal-dividerE">
                <td>

                </td>
            </tr>
            <tr >
                <td bgcolor="#ffffff" style="padding: 20px 20px 20px 20px;" style="font-size: 1rem">
                    <table cellpadding="0" cellspacing="0" width="100%" style="font-size: 1.5rem">
                        <tr>
                            <td align="center">
                                dspaceiffarsvs@gmail.com Repositório Iffar
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 20px 20px 0px 20px;" style="font-size: 1rem">
                                Repositório digital do Iffar SVS
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
';
    }

    public function addDestinatario(string $destinatario, string $nome = "") {
        if ($destinatario != "" && $destinatario != null) {
            $this->emailObject->addAddress($destinatario, $nome);
            $this->liberar = true;
        }
    }

    public function addCopia(string $enderecoCopia) {
        $this->emailObject->addCC($enderecoCopia);
    }

    public function addCopiaComNome(string $enderecoCopia, string $nome) {
        $this->emailObject->addCC($enderecoCopia, $nome);
    }

    public function addCopiaOculta(string $enderecoCopia) {
        $this->emailObject->addBCC($enderecoCopia);
    }

    public function addCopiaOcultaComNome(string $enderecoCopia, string $nome) {
        $this->emailObject->addBCC($enderecoCopia, $nome);
    }

    public function setAssunto(string $assunto) {
        $this->emailObject->Subject = $assunto;
    }

    public function setMensagemHTML(string $mensagem) {
        $this->emailObject->Body = $mensagem;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function setTituloModeP($titulo) {
        $this->titulo = $titulo;
    }

    function setMensagemModeP($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function setMensagemNaoHTML(string $mensagem) {
        $this->emailObject->AltBody = $mensagem;
    }

    public function setServerUsername(string $username) {
        $this->emailObject->Username = $username;
    }

    public function setServerPassword(string $password) {
        $this->emailObject->Password = $password;
    }

    public function enviar(bool $registraBanco =false, bool $modeloPadrao = true) {
        if ($modeloPadrao) {
            $this->emailObject->Body = $this->corpoHTML . htmlspecialchars($this->titulo) . $this->corpoHTML2 . htmlspecialchars($this->mensagem) . $this->corpoHTML3;
        }
        if ($this->liberar) {
            return $this->emailObject->send();
        }else{
            return false;
        }
    }

}
