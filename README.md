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

### Opicionais

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

## Considerações Finais


