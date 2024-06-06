<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $mensagem = $_POST['mensagem'];

    $result = mysqli_query($conexao, "INSERT INTO tabela_contatos(nome, email, celular, mensagem) VALUES ('$nome', '$email', '$celular', '$mensagem')");
    // Configurações do servidor SMTP
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $mensagem = $_POST['mensagem'];

    // Configurações do e-mail
    $mail->setFrom($email, $nome);
    $mail->addAddress('yurealves.gg@gmail.com');
    $mail->Subject = utf8_decode('Um contato do portfólio!');
    $mail->Body = "Nome: $nome\nEmail: $email\nCelular: $celular\nMensagem: $mensagem";

    // Autenticação com senha de aplicativo
    $mail->SMTPAuth = true;
    $mail->Username = 'yurealves.gg@gmail.com'; // Use seu e-mail aqui
    $mail->Password = $ggSenha; // Use a senha de aplicativo gerada

    // Envia o e-mail
    try {
        $mail->send();
        // Redireciona para a página de agradecimento após o envio bem-sucedido
        header('Location: obrigado.html');
        exit; // Certifique-se de encerrar o script após o redirecionamento
    } catch (Exception $e) {
        echo "Erro no envio de e-mail: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/y3.png" type="image/x-icon">
    <script src="menu.js" defer></script>
    <script src="scroll-animation.js"></script>
    <title>Yure WebDev | O portfólio definitivo</title>
</head>
<body>
    <header id="inicio">
        <div class="interface">
            <div class="logo">
                <a href="#">
                    <img src="images/y2.png" alt="logo do portfólio">
                </a>
            </div><!--logo-->
            <nav class="menu-desktop">
                <ul>
                    <li>
                        <a href="#inicio">Início</a>
                    </li>
                    <li>
                        <a href="#especialidades">Especialidades</a>
                    </li>
                    <li>
                        <a href="#sobre">Sobre</a>
                    </li>
                    <li>
                        <a href="#projetos">Projetos</a>
                    </li>
                </ul>
            </nav><!-- menu-desktop -->
            <div class="btn-contato">
                <a href="#contato">
                    <button>Contato</button>
                </a><!-- btn-contato -->
            </div><!--btn-contato-->
            <div class="btn-abrir-menu" id="btn-menu">
                <i class="bi bi-list"></i>
            </div><!-- btn-abrir-menu -->
            <div class="menu-mobile" id="menu-mobile">
                <div class="btn-fechar">
                    <i class="bi bi-x-lg"></i>
                </div><!-- btn-fechar -->
                <nav>
                    <ul>
                        <li>
                            <a href="#inicio">Início</a>
                        </li>
                        <li>
                            <a href="#especialidades">Especialidades</a>
                        </li>
                        <li>
                            <a href="#sobre">Sobre</a>
                        </li>
                        <li>
                            <a href="#projetos">Projetos</a>
                        </li>
                        <li>
                            <a href="#contato">Contato</a>
                        </li>
                    </ul>
                </nav>
            </div><!-- menu-mobile -->
            <div class="overlay-menu" id="overlay-menu">

            </div><!-- overlay-menu -->
        </div><!--interface-->
    </header>
    <main>
        <section class="topo-do-site">
            <div class="interface">
                <div class="flex">
                    <div class="txt-topo-site">
                        <h1>TRANSFORMANDO SONHOS EM PROJETOS<span>.</span></h1>
                        <p>Criatividade e inovação nunca têm limites! Independente do design ser impactante ou
                            minimalista, cada projeto possui funcionalidade intuitiva (pode testar, é bem fácil usar) e
                            otimização para resultados. Seja site, API ou software, aqui você tem presença online, onde
                            quer que seja.</p>
                        <div class="btn-contato">
                            <a href="#">
                                <button>Entre em contato</button>
                            </a>
                        </div><!--btn-contato-->
                    </div><!-- txt-topo-site -->
                    <div class="img-topo-site">
                        <img src="images/imagem-yure.png" alt="Foto do desenvolvedor">
                    </div><!-- img-topo-site -->
                </div><!-- flex -->
            </div><!-- interface -->
        </section><!-- topo-do-site -->
        <section class="especialidades" id="especialidades">
            <div class="interface">
                <h2 class="titulo">MINHAS <span>ESPECIALIDADES</span></h2>
                <div class="flex">
                    <div class="especialidades-box">
                        <i class="bi bi-code-square"></i>
                        <h3>Website</h3>
                        <p>Elit culpa labore mollit consequat dolore commodo magna deserunt aliquip consequat tempor.
                        </p>
                    </div><!-- especialidades-box -->
                    <div class="especialidades-box">
                        <i class="bi bi-cart"></i>
                        <h3>Loja</h3>
                        <p>Elit culpa labore mollit consequat dolore commodo magna deserunt aliquip consequat tempor.
                        </p>
                    </div><!-- especialidades-box -->
                    <div class="especialidades-box">
                        <i class="bi bi-wordpress"></i>
                        <h3>Blog</h3>
                        <p>Elit culpa labore mollit consequat dolore commodo magna deserunt aliquip consequat tempor.
                        </p>
                    </div><!-- especialidades-box -->
                </div><!-- flex -->
                <p>Mais linguagens sob domínio:</p>
                <div class="linguagens">
                    <div class="especialidades-box">
                        <img src="images/html.png" alt="HTML">
                        <p>HTML</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box">
                        <img src="images/css-3.png" alt="CSS">
                        <p>CSS</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box">
                        <img src="images/js.png" alt="JS">
                        <p>JS</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box">
                        <img src="images/php.png" alt="PHP">
                        <p>PHP</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box">
                        <img src="images/python.png" alt="Python">
                        <p>Python</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box">
                        <img src="images/bootstrap.png" alt="Bootstrap">
                        <p>Bootstrap</p>
                    </div><!-- linguagens flex -->
                </div><!-- linguagens -->
                <div class="linguagens2">
                    <div class="especialidades-box item1">
                        <img src="images/sql-server.png" alt="SQL">
                        <p>SQL</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box item2">
                        <img src="images/java.png" alt="Java">
                        <p>Java</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box item3">
                        <img src="images/letter-c.png" alt="C">
                        <p>C</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box item4">
                        <img src="images/c-logo.png" alt="C++">
                        <p>C++</p>
                    </div><!-- linguagens flex -->
                    <div class="especialidades-box item5">
                        <img src="images/hashtag.png" alt="C#">
                        <p>C#</p>
                    </div><!-- linguagens flex -->
                </div><!-- linguagens2 -->
            </div><!-- interface -->
        </section><!-- especialidades -->
        <section class="sobre" id="sobre">
            <div class="interface">
                <div class="flex">
                    <div class="img-sobre">
                        <img src="images/imagem-yure-sobre.png" alt="Foto do desenvolvedor">
                    </div><!-- img-sobre-->
                    <div class="txt-sobre">
                        <h2 class="h2">MUITO PRAZER,<br><span>SOU YURE OLIVEIRA</span></h2>
                        <p>Incididunt magna eu nostrud exercitation amet excepteur in ex consectetur eu id officia.
                            Deserunt consequat elit anim cillum irure ad anim Lorem nostrud do. Pariatur duis velit et
                            esse mollit. Occaecat dolore id excepteur aute anim veniam ex veniam pariatur. Reprehenderit
                            tempor qui ipsum proident veniam laborum.</p>
                        <p>Reprehenderit ex sit enim fugiat nulla esse reprehenderit. Et quis laborum pariatur ea et.
                            Occaecat dolore laborum minim voluptate minim ad pariatur consequat. Aute mollit nulla sunt
                            non quis officia sint dolor consectetur officia veniam. Ea enim deserunt ipsum deserunt
                            incididunt reprehenderit do laborum. Et laboris ipsum mollit minim sit incididunt ipsum eu
                            dolor non do labore.</p>
                        <div class="btn-contato">
                            <a href="#">
                                <button>
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                            </a>
                            <a href="#">
                                <button>
                                    <i class="bi bi-instagram"></i>
                                </button>
                            </a>
                            <a href="#">
                                <button>
                                    <i class="bi bi-linkedin"></i>
                                </button>
                            </a>
                        </div><!-- btn-contato -->
                    </div><!-- txt-sobre-->
                </div><!-- flex-->
            </div><!-- interface -->
        </section><!-- sobre -->
        <section class="portfolio" id="projetos">
            <div class="interface">
                <h2 class="h2">MEU <span>PORTFÓLIO</span></h2>
                <div class="flex">
                    <div class="img-port" style="background-image: url(images/imagem.jpg);">
                        <div class="overlay">Projeto 1</div>
                    </div><!-- img-port -->
                    <div class="img-port" style="background-image: url(images/imagem.jpg);">
                        <div class="overlay">Projeto 2</div>
                    </div><!-- img-port -->
                    <div class="img-port" style="background-image: url(images/imagem.jpg);">
                        <div class="overlay">Projeto 3</div>
                    </div><!-- img-port -->
                </div><!-- flex -->
            </div><!-- interface -->
        </section><!-- portfolio -->
        <section class="formulario" id="contato">
            <div class="interface">
                <h2 class="h2">ENTRE EM <span>CONTATO</span></h2>
                <form action="index.php" method="POST">
                    <input type="text" name="nome" id="nome" placeholder="Seu nome completo:" required>
                    <input type="email" name="email" id="email" placeholder="Seu email:" required>
                    <input type="text" name="celular" id="celular" placeholder="Seu celular (opcional):">
                    <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem:" required></textarea>
                    <div class="btn-enviar">
                        <input type="submit" name="submit" id="submit" value="Enviar">
                    </div><!-- btn-enviar -->
                </form>
            </div><!-- interface -->
        </section><!-- formulario -->
            </main>
    <footer>
        <div class="interface">
            <div class="line-footer">
                <div class="flex">
                    <div class="logo-footer">
                        <img src="images/y3.png" alt="">
                    </div><!-- logo-footer -->
                    <div class="btn-contato">
                        <a href="#">
                            <button>
                                <i class="bi bi-whatsapp"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button>
                                <i class="bi bi-instagram"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button>
                                <i class="bi bi-linkedin"></i>
                            </button>
                        </a>
                    </div><!-- btn-contato -->
                </div>
            </div><!-- line-footer -->
            <div class="line-footer borda">
                <p><i class="bi bi-envelope"></i><a href="mailto:yurealves.gg@gmail.com"> yurealves.gg@gmail.com</a></p>
            </div><!-- line-footer -->
            <div id="botao-scroll" data-scroll="suave" data-anima="scroll">
                <a href="#inicio">
                    <div class="topo">
                        <i class="bi bi-chevron-up" alt="voltar ao topo"></i>
                    </div>
                </a>
            </div>
        </div><!-- interface -->
    </footer>
</body>
</html>