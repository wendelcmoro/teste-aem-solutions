# teste-aem-solutions

Teste técnico A&M Solutions

# 1. Execução do projeto

## 1.1 Requisitos

- PHP 8.2.16(possivelmente outras versões devem funcionar também)
- MariaDB 10.5.23(Versão do SGDB utilizado no desenvolvimento do projeto)

## 1.2 Configurando ambiente local

No arquivo **db_conn.php**, contém as credenciais para o banco de dados, o projeto por padrão espera que exista um banco chamado **aem_solutions**. As tabelas e alguns dados utilizados para teste podem ser encontrados em **data/database_test.sql**, essa tabela consiste na estrutura esperada para a execução do projeto.

## 1.3 Executando projeto

Para testar o projeto localmente, execute o seguinte comando em um terminal:

```console
php -S 127.0.0.1:8000
```

Após isso, basta acessar a URL respectiva no navegador.
