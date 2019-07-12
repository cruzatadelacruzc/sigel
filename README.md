Link para o código-fonte sem dependências: Link[https://drive.google.com/open?id=1kSDLAALyhfiRWvAO0PI8ng1aEPHfdUVs]

   Para baixar as dependências, execute o seguinte comando em um console [cmd, PowerShell ] no Windows ou no Linux em um Terminal.

   O console ou terminal deve estar apontando para a pasta raiz da solução do computador e executar este comando.

   composer install [se você tiver esse programa global instalado em seu computador]

   php composer.phar install [arquivo que está dentro da solução do computador]

   Link para baixar o Composer no site oficial: Link [https://getcomposer.org/Composer-Setup.exe]

  

Links para o código-fonte com as dependências: Link [https://drive.google.com/open?id=1q94ycXmAnhetEVEIvQhTRe2xaIjpq3ld]

  

**Execute a solução no Windows**

  Instale o servidor de aplicativos:

    XAMPP para Windows Link do site oficial: Link [https://www.apachefriends.org/xampp-files/7.2.19/xampp-windows-x64-7.2.19-2-VC15-installer.exe]

   *Base de datos*

     Nome: sigel

     utilizador[user]: root

    sem chave[no password]:

    Agrupamento[collolation]: utf8_general_ci

   

**Executar no Linux**

  Instalar servidor de aplicativos:

    Instalar Apache2

    Instalar o PHP 7.2 em diante

   Base de datos

    Nome: sigel

    utilizador[user]: root

    sem chave[no password]:

    Agrupamento[collolation]: utf8_general_ci

    O salvamento dele está na pasta do projeto: sigel.sql  



Caso deseje alterar os parâmetros do aplicativo, acesse: 

    a pasta raiz[sigel] -> app -> config -> parameters.yml

    Link para acessar a solução do computador:  http://localhost/sigel/web/



A solução de TI é desenvolvida com:

    Framework Synfony 3.4.18 LTS

 A linguagem PHP em sua versão 7.2.10

    Servidor de aplicativos Apache2

    Servido de banco de dados: Mysql ou MariaDB [variante de código aberto]   