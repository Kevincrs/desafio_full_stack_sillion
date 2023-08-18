# Projeto de Demonstração: Visualização de Dados de Usuários de API

Este é um projeto desenvolvido com Laravel e Bootstrap. O projeto abrange funcionalidades de login, cadastro e acesso a um menu básico. Além disso, inclui uma tela que exibe dados de usuários provenientes de uma API externa. Esses dados são tratados e apresentados de forma organizada por meio de um datatable.

## Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas em sua máquina antes de começar:

- [PHP](https://www.php.net/downloads.php) (>= 8.x)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/)
- [Git](https://git-scm.com/downloads)
- [MySQL](https://dev.mysql.com/downloads/installer/) ou outro sistema de gerenciamento de banco de dados suportado
- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/) 

## Configuração usando Docker (opcional)

1. Clone este repositório em sua máquina local:

       git clone https://github.com/Kevincrs/desafio_full_stack_sillion.git

2. Navegue até o diretório do projeto

       cd desafio_full_stack_sillion
    
3. Copie o arquivo .env.example e renomeie-o para .env. Configure as variáveis de ambiente, incluindo as configurações do banco de dados, crie o banco de dados:
   
    3.1 Abra o arquivo .env em um editor de texto e insira as seguintes configurações de banco de dados que estão pré-definidas no arquivo Dockerfile. Caso deseje mudar, você precisará alterar as configurações em ambos os arquivos Dockerfile e .env:

        DB_CONNECTION=mysql
        DB_HOST=mysql_db
        DB_PORT=3306
        DB_DATABASE=dfss
        DB_USERNAME=root
        DB_PASSWORD=root

4. Construa e inicie os contêineres Docker com o seguinte comando:

       docker-compose build

       docker-compose up -d

5. Instale as dependências do Composer no contêiner Laravel (isso é necessário antes de executar as migrações):
        
        docker exec -it desafio-full-stack composer install


6. Aguarde até que os contêineres estejam em execução e então execute as migrações para criar as tabelas no banco de dados:

       docker exec -it desafio-full-stack php artisan migrate

7. Abra o navegador e acesse http://localhost:9000 para visualizar o projeto.

## Configuração sem Docker

1. Clone este repositório em sua máquina local:

       git clone https://github.com/Kevincrs/desafio_full_stack_sillion.git

2. Navegue até o diretório do projeto

       cd desafio_full_stack_sillion

3. Instale as dependências do PHP usando o Composer:

       composer install

4. Copie o arquivo .env.example e renomeie-o para .env. Configure as variáveis de ambiente, incluindo as configurações do banco de dados, crie o banco de dados:
   
        cp .env.example .env
       copy .env.example .env

    Configure a conexão dentro do arquivo .env com o banco de sua preferência:

        PostgreSQL : 
            DB_CONNECTION=pgsql
            DB_HOST=127.0.0.1
            DB_PORT=5432 # Porta padrão, pode ser alterada durante configuração do postgre.
            DB_DATABASE=dfss # O banco de dados deverá ser criado previamente, o nome pode ser de sua preferência.
            DB_USERNAME=postgres # Username padrão, pode ser alterado.
            DB_PASSWORD= xxx # Informe a senha

        MySQL: 
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306 # Porta padrão, pode ser alterada durante configuração do mysql.
            DB_DATABASE=dfss #O banco de dados deverá ser criado previamente, o nome pode ser de sua preferência.
            DB_USERNAME=root # Username padrão, pode ser alterado.
            DB_PASSWORD= xxx # Informe a senha

    Alterar o banco no arquivo Config>database.php de acordo com o sistema de gerenciamento de banco que será utilizado:

        Mysql: 'default' => env('DB_CONNECTION', 'mysql'),
        PostgreeSQL:  'default' => env('DB_CONNECTION', 'pgsql'),

5. Gere uma chave de criptografia única para o seu aplicativo:
   
       php artisan key:generate

6. Execute as migrações para criar as tabelas no banco de dados:

        php artisan migrate

7. Instale as dependências do JavaScript usando o npm:

        npm install


## Iniciando o Servidor

Após concluir as etapas acima, você pode iniciar o servidor local com o seguinte comando:

    php artisan serve


## Utilização

Abra o navegador e acesse http://localhost:8000.

Crie uma conta utilizando a tela de cadastro.

Faça login utilizando as credenciais fornecidas durante o cadastro.

Explore o menu e as funcionalidades disponíveis.

