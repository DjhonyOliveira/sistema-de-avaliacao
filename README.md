# Sistema de Avaliação


A aplicação consiste em uma sistema para avaliação de atendimento e setores referente a um hospital da região. A aplicação conta com um painel administrativo onde se torna possivel o cadastro de usuários, perguntas para que as avaliações sejam realizadas, cadastro de setores pela qual as perguntas serão relaciondas.

A aplicação atua com as seguintes técnologias:

- Frontend: 

    - Bootstrap para estilização do HTML;
    - JQuery para comportamentos e requisições ao Backend;

- Backend: 
    - PHP 8.2;
    - PostgreSQL 16;
    - Composer para gerencimento de dependências;
    - Dependências do backend:
        - coffeecode/router -> Para controle de rotas;
        - league/plates     -> Para renderização do frontend.
        - PDO -> para conexão com o banco de dados (dependência nativa do PHP)

## Instruções para execução da aplicação

## Requisitos

 - **PHP 8.0** ou superior;
 - **Composer** para o gerenciamento de dependências;
 - **PDO** habilitado no PHP;
 - **PostgreSQL 16** banco de dados;
 - **XAMPP** para execução do servidor apache;
 - **Certificado SSL** projeto esta configurado para forçar https

 ## Instalação

### 1. Instalando PHP e Composer

Para instalar o PHP e o Composer, utilize os comandos abaixo (no Windows, usando o Chocolatey):

```bash
choco install php
choco install composer
```

> **Nota:** Caso não tenha o "Chocolatey" instalado em sua maquina, basta executar o comando a baixo:

```bash
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
```
 Posteriormente será possivel executar os comandos a cima citados

 ### 2. Ativando o PDO no PHP
Verifique se a extensão PDO, referente ao PostgreSQL está habilitada no seu PHP. Para fazer isso:

Abra o arquivo php.ini localizado na pasta de instalação do XAMPP (geralmente xampp/php/php.ini).

Encontre a linha que contém ;extension=pdo_pgsql e remova o ponto e vírgula (;) no início da linha para descomentá-la:

```bash
extension=php_pdo_pgsql.dll
```
### 3. Clonando o Repositório

Clone este repositório e coloque-o dentro de um diretório chamado app

```bash
git clone https://github.com/DjhonyOliveira/sistema-de-avaliacao.git app
```

### 4. Movendo o Projeto para o Diretório do XAMPP

Após o clone, mova o diretório app para dentro do diretório htdocs do XAMPP:

```bash
xampp/htdocs/app
```

### 5. Instalando Dependências

No terminal, navegue até o diretório app dentro de htdocs e execute o comando abaixo para instalar as dependências do projeto:

```bash
composer install
```

## Execução

### Aplicação WEB

- Inicie o Apache pelo XAMPP.
- Acesse o projeto pela URL:

``` bash
https://localhost/app/
```
> **Nota:** A execução deve ser feita exclusivamente por essa URL. Caso contrário, o controle de rotas do projeto não conseguirá renderizar o frontend corretamente. Caso gere algum erro referente a aplicação retornar como site não seguro, confirmar a instalação do certificado SSL em ambiente local, pois a aplicação força HTTPS.

### BackEnd

Para a criação das tabelas do banco de dados do sistema, o script SQL se encontra no diretório db, basta executar o mesmo em seu SGDB.

Para conectar a aplicação ao banco criado, dentro do arquivo config.php, se torna necessário as definições de conexão nas constantes do sistema, arquivo presente no diretório: Source/boot/config.php

Após o banco de dados criado e conectado ao backend da aplicação, o script SQL por padrão já realiza a insersão do setor "Adm Master", que seria referente a usuários de manutenção do sistema, bem como o usuário master da aplicação para primeiro acesso ao admin com as seguintes credenciais de acesso:

Login: master@mastes.com<br>
Senha: 123456789

### Urls de acesso ao sistema

- Seleção de setor para avaliação: https://localhost/app/
- Avaliação: https://localhost/app/avaliacao?id_setor={setor}
- Pagina de login: https://localhost/app/login
- Admin (acessivel apenas após login no sistema): https://localhost/app/admin
