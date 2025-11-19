# Sistema de Gerenciamento de Exames Laboratoriais

## 📋 Descrição

Sistema web completo para gerenciamento de exames laboratoriais, desenvolvido com PHP, Node.js e Java. O sistema permite o cadastro de pacientes, agendamento de exames, geração de laudos e acompanhamento de resultados.

## ✨ Funcionalidades

- 🏥 Cadastro e gerenciamento de pacientes
- 🔍 Agendamento de consultas e exames
- 📊 Geração de laudos de exames
- 🔐 Sistema de autenticação e controle de acesso

## 🛠️ Estrutura do Projeto

```
ProjetoDesenv/
├── public/         # Arquivos públicos e acessíveis (páginas principais do sistema)
│   ├── css/        # Folhas de estilo
│   ├── js/         # Scripts JavaScript
│   └── img/        # Imagens e ícones
├── models/         # Modelos de dados (PHP)
├── views/          # Arquivos de visualização (PHP)
│   ├── components/ # Componentes reutilizáveis
│   └── templates/  # Templates de páginas
├── dao/            # Objetos de acesso a dados (PHP)
├── database/       # Scripts e dumps do banco de dados
├── assets/         # Arquivos estáticos (css, js, imagens)
├── java/           # Código Java (aplicação console)
├── config/         # Arquivos de configuração
├── index.html      # Página inicial do sistema
├── index.js        # Servidor Node.js (Express)
├── package.json    # Dependências Node.js
├── composer.json   # Dependências PHP
└── README.md       # Documentação do projeto
```

## 📋 Requisitos do Sistema

- PHP 7.4 ou superior
- Node.js 16.x (LTS) ou superior
- Java JDK 11 ou superior
- Servidor web (Apache/Nginx)
- MySQL 5.7+ ou MariaDB 10.3+
- Composer (para gerenciamento de dependências PHP)
- npm ou yarn (para gerenciamento de dependências Node.js)

## 🚀 Instalação

1. **Clone o repositório**
   ```bash
   git clone [URL_DO_REPOSITÓRIO]
   cd ProjetoDesenv
   ```

2. **Instale as dependências PHP**
   ```bash
   composer install
   ```

3. **Instale as dependências Node.js**
   ```bash
   npm install
   # ou
   yarn install
   ```

4. **Configure o banco de dados**
   - Crie um banco de dados MySQL/MariaDB
   - Importe o arquivo SQL localizado em `database/`
   - Configure as credenciais em `config/database.php`

5. **Configure o ambiente**
   - Copie o arquivo `.env.example` para `.env`
   - Ajuste as configurações conforme necessário

## 🏃‍♂️ Executando o Projeto

1. **Inicie o servidor web**
   - Configure seu servidor web (Apache/Nginx) para apontar para a pasta `public/`
   - Ou use o servidor embutido do PHP:
     ```bash
     php -S localhost -t public
     ```

2. **Inicie o servidor Node.js** (se necessário)
   ```bash
   npm run dev
   # ou para produção
   npm start
   ```

3. **Acesse a aplicação**
   ```
   http://localhost
   ```
## 🛠️ Desenvolvimento

### Estrutura de Branches
- `main` - Versão estável
- `develop` - Desenvolvimento ativo
- `feature/*` - Novas funcionalidades
- `bugfix/*` - Correções de bugs

### Padrões de Código
- Siga as PSR-12 para PHP
- Use ESLint para JavaScript
- Documente funções e classes

## 🤝 Como Contribuir

1. Faça um Fork do projeto
2. Crie uma Branch para sua Feature (`git checkout -b feature/AmazingFeature`)
3. Adicione suas mudanças (`git add .`)
4. Comite suas mudanças (`git commit -m 'Add some AmazingFeature'`)
5. Faça o Push da Branch (`git push origin feature/AmazingFeature`)
6. Abra um Pull Request

## 📄 Licença

Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

## ✉️ Contato

Equipe de Desenvolvimento - matleandrosilva@gmail.com, mkudlake@gmail.com, gabrieljuliati9@gmail.com

Link do Projeto: [https://github.com/seu-usuario/ProjetoDesenv](https://github.com/seu-usuario/ProjetoDesenv)
