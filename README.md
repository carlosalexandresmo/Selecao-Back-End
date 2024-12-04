# **Sistema de Comentários**

Sistema de Comentários é um projeto desenvolvido utilizando Laravel. Neste arquivo README, você encontrará um guia passo a passo para abrir o projeto em seu ambiente local.

## Pré-Requisitos

-   ✅ Git >= 2.47.0
-   ✅ PHP >= 8.2
-   ✅ Composer >= 2.8
-   ✅ Laravel >= 8
-   ✅ Banco de dados MySQL

## Requisitos

### Obrigatórios

-   **Gerenciar Usuários**:

    -   O sistema possibilita que seus usuários realizem um cadastro atráves da rota `/api/v1/register` (POST) e também a edição do seu cadastro, via `/api/v1/update` (PUT).
    -   O usuário também tem a possibilidade de visualizar seus dados, atráves da rota `/api/v1/me` (GET).

-   **Autenticação de Usuários com e-mail e senha**:

    -   O sistema possibilita que seus usuários realizem autenticação com e-mail e senha, através da rota `api/v1/login` (POST), retornando os dados do usuário e um token de autenticação, para que nas rotas protegidas, possa ser usada.

-   **Listagem de Comentários**:

    -   O sistema possibilita que todos possam visualizar os comentários de forma pública, através da rota `api/v1/comments` (GET), podendo realizar paginação, passando os parâmentros `page=0&limit=10`.

-   **Inserção de Comentários**:

    -   O sistema possibilita que usuários autenticados, possam realizar a inserção de comentários. Através da rota `api/v1/comments` (POST), um usuário pode adicionar um comentário com limite de 1000 caracteres.

-   **Visualização de um Comentário**:
    -   O sistema possibilita visualizar um comentário, retornando o seu autor e o dia e horário.

### Opicionais

-   **Edição de um Comentário**:

    -   O sistema possibilita que os usuários, de forma autenticada, realizem a edição dos seus comentários. Através da rota `api/v1/comments/{id}` (PUT), o usuário pode editar um comentário.
    -   Ao realizar sua edição, é exibido a data de criação e a da data da última edição.

-   **Visualizar histórico de um Comentário**:

    -   O sistema possibilita um histórico das edições do comentário, podendo ser visualizado através a rota `api/v1/comments/14/historics` (GET).
    -   A cada edição, de um comentário, o sistema registra no banco de dados o comentário antigo e o momento (data e hora), em que foi realizada essa alteração. Esse histórico fica vinculado ao comentário salvo inicialmente.

-   **Exclusão de um Comentário**:

    -   O sistema possibilita que seu autor possa excluir seu comentário. Através a rota `/api/v1/comments/{id}` (DELETE), de forma autenticada, o sistema permite a exclusão do comentário.

-   **Exclusão de todos os Comentários**:

    -   O sistema possibilita que um usuário com função administrador, tenha a função de excluir todas os comentários registrados.
    -   Através da rota `/api/v1/comments` (DELETE) e com autenicação no papel de administrador, essa funcionalidade pode ser realizada.

-   **Criptografia da senha do Usuário**:

    -   O sistema realiza a criptografia da senha, e ao são armazenadas no banco de dados
        utilizando o método bcrypt do Laravel.

## Como Rodar

#### Passo 1️⃣: Clonar o repositório

```bash
git clone https://github.com/carlosalexandresmo/Selecao-Back-End.git
```

#### Passo 2️⃣: Instale as dependências do projeto:

```sh
composer install
```

#### Passo 3️⃣: Rode o comando abaixo, para criar o arquivo de configuração

```sh
cp .env.example .env
```

#### Passo 4️⃣: Configure as credenciais do banco de dados

```dosini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

#### Passo 5️⃣: Gere uma nova chave da aplicação

```sh
php artisan key:generate
```

#### Passo 6️⃣: Rode as migrações para a criação das tabelas:

```sh
php artisan migrate
```

#### Passo 7️⃣: Rode o seed para gerar um usuário admin (email = admin@admin.com) (senha = 12345678)

```sh
php artisan db:seed
```

#### Passo 8️⃣: Startar o servidor local de desenvolvimento:

```sh
php artisan serve
```

#### Passo 9️⃣: Ao startar o servidor, a api pode ser acessada por:

```sh
http://127.0.0.1:8000/api/v1
```
