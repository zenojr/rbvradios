<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Central de compartilhamento de áudios - RBV</title>
    <link rel="stylesheet" href="web-files/css/main.css"/>
</head>
<body>

    <div id="content-login">

        <div class="md-login">

            <div id="topo">
                
                <div class="logo">
                    <img src="web-files/imagem/marca_logo.png">
                </div><!-- Fim .logo -->

            </div><!-- Fim #topo -->
            
            <div class="login-centro"><!--começa lofin centro -->  

                <form class="lg-form" method="post" action="service/login/">
                    <label>Email:</label>
                    <input type="text" name="usuario" maxlength="50" />
                    
                    <label>Senha</label>
                    <input type="password" name="senha" maxlength="50" />
                    
                    <input type="submit" class="btn btn-success" value="Entrar" />
                </form>

            </div><!--fim login centro -->   

        </div><!-- Fim .md-login -->
        
    </div><!-- Fim #conteudo -->
    
</body>
</html>