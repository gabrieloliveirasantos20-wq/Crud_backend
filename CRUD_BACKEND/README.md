# CRUD_BACKEND — Sistema de Gerenciamento de Produtos

**Equipe:** 00 - Nome da Equipe
*(edite este campo com o número e nome reais da sua equipe)*

Sistema CRUD desenvolvido em **HTML, CSS, JavaScript, PHP e MariaDB** como parte do desafio prático.

## Funcionalidades
- ✅ Cadastrar produto
- ✅ Listar produtos em tabela
- ✅ Editar produto
- ✅ Excluir produto (com `confirm()` em JavaScript)
- ✅ Pesquisar por nome ou categoria

## Tecnologias
- HTML5 + CSS3
- JavaScript (vanilla)
- PHP 7+ (PDO)
- MariaDB / MySQL (XAMPP)

## Como executar (XAMPP)

1. **Instale o XAMPP** e inicie os serviços **Apache** e **MySQL**.
2. **Copie a pasta `CRUD_BACKEND`** para dentro de `C:\xampp\htdocs\`
   (ou o `htdocs` do seu sistema).
3. Acesse `http://localhost/phpmyadmin` e:
   - Clique em **Importar**
   - Selecione o arquivo `script.sql` (raiz do projeto)
   - Execute — isso cria o banco `db_produtos` e a tabela `produtos`.
4. Abra no navegador: **http://localhost/CRUD_BACKEND/**

## Estrutura
```
CRUD_BACKEND/
├── index.php          # Listagem + pesquisa
├── create.php         # Cadastro
├── edit.php           # Edição
├── delete.php         # Exclusão
├── script.sql         # Script de criação do banco
├── includes/
│   ├── conexao.php    # Conexão PDO com MariaDB
│   ├── header.php     # Cabeçalho HTML
│   └── footer.php     # Rodapé HTML
├── css/style.css      # Estilos
└── js/script.js       # Confirmação de exclusão + UX
```

## Configuração do banco
Edite `includes/conexao.php` se seu MariaDB usar usuário/senha diferentes
(padrão XAMPP: `root` sem senha).
