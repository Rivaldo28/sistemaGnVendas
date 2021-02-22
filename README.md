## Instalação
Você pode clonar este repositório OU baixar o .zip

https://mega.nz/folder/M2RBiQBa#coIhlHQzGClXbzUpZZi3ow

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';


## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Usuario extends Model {

}
Criar Banco de Dados```

drop database gn_vendas;
create database gn_vendas;
use gn_vendas;

create table produtos(
   id int primary key auto_increment,
   name varchar(30) not null,
   value float(10.2) not null
);
create table compras(
   id int primary key auto_increment,
   name varchar(30) not null,
   cpf varchar(11) not null,
   phone_number varchar(11),
   charge_id int
);
insert into produtos values(null, 'Computador Positivo', 1220.50);
insert into produtos values(null, 'Computador Sony', 2220.22);
insert into produtos values(null, 'Mouse', 20.52);
insert into produtos values(null, 'Tecaldo', 30.99);

select *from produtos;

insert into compras values(null, 'Rivaldo Souza','98765432122','765432122',null);
insert into compras values(null, 'Anderson Santos','12345678912','765432121',null);
insert into compras values(null, 'Manu Mega','23154312376','565432124',null);	
insert into compras values(null, 'Adriana Souza', '97463212154','65432125',null);
select *from compras;
