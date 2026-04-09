# Instituto BdS

Projeto desenvolvido no curso técnico em informática no Senac Lapa Tito para conscientizar trabalhadores, especialmente jovens ingressando no mercado, sobre direitos trabalhistas, boas condições de trabalho e empresas que oferecem ambientes dignos.

## 🛠 Tecnologias

- PHP
- MySQL
- HTML / CSS
- XAMPP (servidor local)

## 📁 Estrutura do projeto

```
Instituto-BdS/
├── src/
│   ├── pages/     ← páginas PHP e lógica da aplicação
│   ├── admin/     ← área administrativa (listas de login)
│   ├── css/       ← estilo
│   └── img/       ← imagens
├── database/
│   └── schema.sql ← estrutura do banco de dados
├── .gitignore
└── README.md
```

## ⚙️ Como rodar localmente

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) instalado com Apache e MySQL ativos

### Passo a passo

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/Instituto-BdS.git
   ```

2. Copie a pasta `src/` para dentro de `htdocs` do XAMPP:
   - Windows: `C:\xampp\htdocs\Instituto-BdS`
   - Linux/macOS: `/opt/lampp/htdocs/Instituto-BdS`

3. Configure a conexão com o banco:
   ```bash
   cp src/pages/conexao-bds.example.php src/pages/conexao-bds.php
   ```
   Edite `conexao-bds.php` com seu usuário e senha do MySQL.

4. Importe o banco de dados no phpMyAdmin:
   - Abra `http://localhost/phpmyadmin`
   - Crie um banco chamado `BDS`
   - Importe o arquivo `database/schema.sql`

5. Acesse `http://localhost/Instituto-BdS/src/pages/index.php`

## 👥 Integrantes


- Pedro Henrique Santos da Silva
- Davi Tosatti
- Gabriel Vaz Ferreira
- Lucas Henrique Furtado da Rosa Pio
- Igor Costa
- Carlos Augusto Pires
