# Mailink

Sistema de envio de e-mails em massa, construído com Laravel. Este projeto também utiliza o [Mailpit](https://github.com/axllent/mailpit) via Docker para visualização dos e-mails enviados durante o desenvolvimento.

## ✅ Requisitos

- PHP >= 8.1
- Composer
- MySQL ou MariaDB
- Node.js & NPM
- Docker (opcional, para rodar o Mailpit)

## ⚙️ Instalação do Projeto

```bash
# Clone o repositório
git clone https://github.com/MiguelEliasBernardes/mailink.git
cd mailink

# Instale as dependências do Laravel
composer install

# Instale as dependências frontend
npm install && npm run build

# Copie o arquivo de exemplo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

## 🛠️ Configuração

Edite o arquivo `.env` com as suas credenciais de banco de dados e configurações de e-mail. Exemplo para usar com o Mailpit:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mailink
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=example@mail.com
MAIL_FROM_NAME="Mailink"
```

## 🧪 Executando o Projeto

```bash
# Rode as migrations
php artisan migrate

# Opcional: Popule o banco com dados iniciais
php artisan db:seed

# Inicie o servidor local
php artisan serve
```

Acesse a aplicação em: [http://localhost:8000](http://localhost:8000)

## 📬 Executando o Mailpit com Docker

O projeto já inclui uma configuração Docker para rodar o Mailpit.

```bash
# Acesse a pasta mailpit
cd mailpit

# Suba o container do Mailpit
docker compose up -d
```

Acesse o painel do Mailpit em: [http://localhost:8025](http://localhost:8025)

O Mailpit escuta e-mails na porta `1025`, exatamente como configurado no `.env`.

Para parar o container:

```bash
docker compose down
```

## 🧹 Comandos Úteis

```bash
# Limpar cache da aplicação
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# Atualizar dependências frontend
npm run build
```

## 📄 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
