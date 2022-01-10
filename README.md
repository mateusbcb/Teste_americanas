# Teste_americanas

Instalação

Esse projeto foi desenvolvido na plataforma Windows utilizando o Wampserver64 como
base da configuração, as configurações do httpd-vhosts.conf do wamp e
a edição do arquivo host no system 32

Para as configurações do servidor
1 - Faça a instalação do wamoserver (https://sourceforge.net/projects/wampserver/files/)

2 - Altere o arquivo host no diretório do Windows (C:\Windows\System32\drivers\etc)
    Acrescente a seguinte linha:
    
    127.0.0.1 www.b2w.com.br

    salve como administrador.

3 - Faça o clone deste projeto na pasta WWW do Wamp

4 - Altere o arquivo httpd-vhosts.conf ([PASTA RAIZ DO WAMPSERVER]\bin\apache\apache2.4.46\conf\extra)
    acrescente as seguintes linhas:

    <VirtualHost *:80>
    ServerName www.b2w.com.br
    ServerAlias www.b2w.com.br
    DocumentRoot "${INSTALL_DIR}/www/[DIRETORIO PUBLIC DO PROJETO]"
    <Directory "${INSTALL_DIR}/www/[DIRETORIO PUBLIC DO PROJETO]/">
        Options +Indexes +Includes +FollowSymLinks +MultiViews
        AllowOverride All
        Require local
    </Directory>
    </VirtualHost>

    Para que as alterações funcionem será necessário reiniciar os servidores do Wampserver.

5 - Acesse pelo navegador a url http://localhost/phpmyadmin e crie um Banco de dados 
    com nome de db_b2w.

6 - Dentro da pasta raiz do projeto altere o arquivo .env adicionando as configurações
    do banco. Segue exemplo:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_b2w
    DB_USERNAME=root
    DB_PASSWORD=

7 - Abra o terminal na pasta raiz do projeto e insira a seguinte linha de comando:
        php artisan migrate
    Depois para rodar o seed e popular o banco insira o comando abaixo:
        php artisan migrate:fresh --seed

8 - No navegador, acesse www.b2w.com.br ou o endereço que tenha colocado no arquivo host.
    Atenção: o endereço deve ser o mesmo do discriminado em httpd-vhosts.conf

    Nesse momento, você deverá ver a pagina de login, podendo criar uma conta ou acessar com:
	e-mail : admin@admin.com
	senha  : password

OBS. talvez seja necessário gerar uma nova API_KEY no '.env'. Para isso, na raiz do projeto digite
    a seguinte linha de comando:
        php artisan apikey:generate {name}
    

Qualquer dúvida favor entrar em contato via e-mail: mateusbcb@gmail.com ou (47) 9 8417-1346 (WhatsApp)

Obrigado!
Mateus Brandt

