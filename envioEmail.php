<?php
	require("EmailPHP/PHPMailer/src/PHPMailer.php");
	require("EmailPHP/PHPMailer/src/SMTP.php");
	require("EmailPHP/PHPMailer/src/Exception.php");

	$nome = trim($_POST['nome']);
	$email = trim($_POST['email']);
	$assunto = trim($_POST['assunto']);
	$mensagem = trim($_POST['mensagem']);
	
    $Mailer = new PHPMailer\PHPMailer\PHPMailer();
    
    try {
        //Server settings
        $Mailer->isSMTP();        
        $Mailer->SMTPSecure = 'tls';                         
        $Mailer->Host       = 'mail.terraurbanizada.com';                    
        $Mailer->SMTPAuth   = true;                                   
        $Mailer->Username   = 'contato@terraurbanizada.com';                     
        $Mailer->Password   = 's31uegd1l7hc';                              
        $Mailer->Port       = 587; 
        $Mailer->CharSet = 'UTF-8';                             
    
        //Recipients
        $Mailer->setFrom($email, $nome);
        $Mailer->addAddress('atendimentoead@terraurbanizada.com', 'Terra Urbanizada - MAPA');  
        $Mailer->addCC(
            'suporteead@terraurbanizada.com', 
            'comunicacaoead@terraurbanizada.com', 
            'contatoead@terraurbamizada.com', 
        );
    
        // Content
        $Mailer->isHTML(true);                            
        $Mailer->Subject = "[FALE CONOSCO] $assunto";
        $Mailer->Body    = $mensagem;
        $Mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $Mailer->send();
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <title>Document</title>
            <style>
                html{
                    overflow-y: hidden;
                    overflow-x: hidden;
                }
                body{
                    height: 100vh; 
                    width: 100vw;
                    background-image: linear-gradient(to right, #224359, #257334);
                    
                }
                .imgConfig{
                    height: 7rem;
                    margin-bottom: 10rem;
                }
        
                @media(max-width: 658px){
                    .imgConfig{
                        height: 5rem;
                        margin-bottom: 6rem;
                    }
                }
        
                .margin-top{
                    margin-top: 17rem;
                }
                .txt-btn-increvase{
                    color:  #257334 !important;
                    font-size: .9rem;
                    font-family: "Roboto", sans-serif;
                    font-weight: 500;
                    margin-top: -9px !important;
                    border-radius: 1rem;
                }
            </style>
        </head>
        <body class="m-0 p-0 w-100 h-100">
            <div class="d-flex flex-column justify-content-center align-items-center margin-top">
                <img class="m-0 p-2 imgConfig" src="./assets/images/logo01.png" alt="">
                <p style="font-size: 20px;" class="m-0 p-0 text-white">Mensagem enviada com sucesso!</p>
                <p style="font-size: 14px;" class="m-0 p-0 text-white">Resposta em até 24 horas</p>
                <span class="mt-3">
                    <a class="btn btn-warning nav-link txt-btn-increvase p-0 pl-2 pr-2" href="#" onclick="history.back()"> VOLTAR</a>
                </span>
            </div>
        
        </body>
        </html>';
    } catch (Exception $e) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <title>Document</title>
            <style>
                html{
                    overflow: hidden;
                }
                body{
                    height: 100vh; 
                    width: 100vw;
                    background-image: linear-gradient(to right, #224359, #257334);
                    
                }
                .imgConfig{
                    height: 7rem;
                    margin-bottom: 10rem;
                }
        
                @media(max-width: 658px){
                    .imgConfig{
                        height: 6rem;
                        margin-bottom: 6rem;
                    }
                }
        
                .margin-top{
                    margin-top: 17rem;
                }
                .txt-btn-increvase{
                    color:  #257334 !important;
                    font-size: .9rem;
                    font-family: "Roboto", sans-serif;
                    font-weight: 500;
                    margin-top: -9px !important;
                    border-radius: 1rem;
                }
            </style>
        </head>
        <body class="m-0 p-0 w-100 h-100">
            <div class="container">
                <div class="d-flex flex-column justify-content-center align-items-center margin-top">
                    <img class="m-0 p-2 img-fluid imgConfig" src="./assets/images/logo01.png" alt="">
                    <p style="font-size: 20px;" class="m-0 p-0 text-white">Mensagem não enviada com sucesso!</p>
                    <p style="font-size: 14px;" class="m-0 p-0 text-white">Volte e tente novamente!</p>
                    <span class="mt-3">
                        <a class="btn btn-warning nav-link txt-btn-increvase p-0 pl-2 pr-2" href="#"> VOLTAR</a>
                    </span>
                </div>
                </div>
        
        </body>
        </html>';
    }
	
?>