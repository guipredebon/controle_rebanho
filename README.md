# AgroCilo - Controle de Rebanho - README

## Descrição

Este projeto, "Controle de Rebanho", é uma aplicação web desenvolvida para gerenciar informações sobre vacas, reprodução e outras atividades relacionadas ao controle de gado.

## Requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Node.js 12 ou superior

## Instalação

Siga os passos abaixo para configurar e executar a aplicação em seu ambiente local:

1. Clone este repositório:
   ```sh
   git clone https://github.com/guipredebon/controle-rebanho.git

2. Acesse o diretório do projeto:
   ```sh
   cd controle-rebanho

3. Instale as dependências do Composer:
   ```sh
   composer install
   
4. Copie o arquivo .env.example e renomeie-o para .env. Configure as variáveis de ambiente necessárias, como as credenciais do banco de dados.

5. Gere a chave de criptografia do Laravel:
   ```sh
   php artisan key:generate

   
6. Execute as migrações do banco de dados:
   ```sh
   php artisan migrate

7. Inicie o servidor de desenvolvimento:
   ```sh
   php artisan serve

8.Acesse a aplicação em seu navegador: http://localhost:8000

## Uso
Após a instalação e configuração, você pode acessar a aplicação para gerenciar informações sobre vacas, reprodução e outros aspectos do controle de rebanho. Utilize os recursos disponíveis no menu principal para navegar e realizar as tarefas desejadas.
