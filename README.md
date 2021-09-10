# Projeto Symfony
Projeto base para a criação de novos projetos utilizando Symfony.
Esse projeto está utilizando a versão 5.3 do symfony.

## Componentes Adicionados
> * composer req maker  
> * composer req annotations (na versão 4.4, composer req doctrine/annotations)
> * composer req twig
> * composer req encore
> * npm i (instalar o node, para executar o javascript do lado do servidor)
> * npm i -D bootstrap (-D é a chave de dependencias de desenvolvimento '-devDependencies' onde será instalado o boostrap)
> * composer req orm
> * composer req debug

## Comandos básicos
> Criação de controllers 
>> php bin/console make:controller controller_name

> Criação de base de dados
>> php bin/console doctrine:database:create
>> * Criação das entidades do banco
>>> php bin/console make:entity entity_name
>> * Criação das tabelas
>>> php bin/console make:migration (Cria uma migration)
>>> php bin/console doctrine:migrations:migrate (cria a tabela no banco)