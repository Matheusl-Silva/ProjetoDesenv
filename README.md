# ProjetoDesenv

## Descrição

Projeto de Desenvolvimento de Sistemas utilizando PHP, Node.js e Java. Este projeto demonstra a integração de diferentes tecnologias para desenvolvimento web, incluindo funcionalidades de cadastro, autenticação e gerenciamento de exames laboratoriais.

## Estrutura do Projeto

```
ProjetoDesenv/
├── public/         # Arquivos públicos e acessíveis (páginas principais do sistema)
├── models/         # Modelos de dados (PHP)
├── views/          # Arquivos de visualização (PHP)
├── dao/            # Objetos de acesso a dados (PHP)
├── database/       # Arquivos relacionados ao banco de dados
├── assets/         # Arquivos estáticos (css, js, imagens)
├── java/           # Código Java (aplicação console)
├── index.html      # Página inicial do sistema
├── index.js        # Servidor Node.js (Express)
├── package.json    # Dependências Node.js
├── composer.json   # Dependências PHP
└── README.md       # Este arquivo
```

## Requisitos

- PHP 7.4 ou superior
- Node.js (versão LTS recomendada)
- Java JDK 11 ou superior
- Servidor web (Apache/Nginx)
- MySQL/MariaDB

## Instalação

1. **Clone o repositório:**

   ```bash
   git clone [URL_DO_REPOSITÓRIO]
   ```

2. **Configure o servidor web** para apontar para o diretório do projeto.

3. **Instale as dependências do Node.js:**

   ```bash
   npm install
   ```

4. **Configure o banco de dados:**
   - Importe o arquivo de banco de dados localizado em `database/`
   - Configure as credenciais no arquivo de configuração apropriado

## Executando o Projeto

1. Inicie o servidor web (Apache/Nginx).
2. Acesse o projeto através do navegador:
   ```
   http://localhost/ProjetoDesenv
   ```
3. Para rodar o servidor Node.js:
   ```bash
   npm run dev
   ```
4. Para executar a aplicação Java:
   - Compile e execute os arquivos em `java/` conforme necessário.

## Tecnologias Utilizadas

- PHP
- Node.js (Express)
- Java
- HTML5
- CSS3
- JavaScript
- MySQL/MariaDB

## Licença

Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.
