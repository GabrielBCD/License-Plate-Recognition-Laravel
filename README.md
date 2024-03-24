# Site de Visualização e Edição de Reconhecimento de Placas Veiculares

Este projeto consiste em um site para visualização e edição das informações obtidas através de um sistema de reconhecimento de placas veiculares utilizando inteligência artificial (IA).
A IA responsável pelo reconhecimento das placas está disponível em https://github.com/hfmistake/License-Plate-Recognition.

## Funcionalidades

- Visualização das informações das placas veiculares reconhecidas pela IA.
- Edição das informações associadas a cada placa, se necessário.
- Interface amigável e intuitiva para os usuários.

## Tecnologias Utilizadas

  - HTML
  - CSS
  - JavaScript
  - Bootstrap
  - PHP
  - Laravel

## Pré-requisitos

Antes de começar, certifique-se de ter os seguintes pré-requisitos instalados:

- Composer
- Node.js
- Laravel

## Instalação e Execução

1. Clone este repositório:

```bash
git clone https://github.com/GabrielBCD/License-Plate-Recognition-Laravel
```

2. Instale as dependências do Laravel:
```bash
composer install
```

3. Instale as dependências JavaScript do projeto:
```bash
npm install
```

4. Configure o arquivo `.env` com as informações do banco de dados.

5. Execute as migrações do banco de dados e insira dados iniciais:
```bash
php artisan migrate --seed
```

6. Execute o servidor de desenvolvimento do Laravel:
```bash
npm run dev
```

7. Execute o servidor Laravel:
```bash
php artisan serve
```

8. Abra o navegador e acesse o endereço `http://localhost:8000` para utilizar o site.

## Uso

1. Acesse o site através do seu navegador.
2. Visualize as informações das placas veiculares reconhecidas.
3. Edite as informações associadas a cada placa, se necessário.
4. As alterações feitas serão atualizadas automaticamente.

Observação: Um usuário de administração já está pré-criado para fins de teste:
   - Email: admin@admin.com
   - Senha: admin

## Licensa

A estrutura Laravel é um software de código aberto licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
