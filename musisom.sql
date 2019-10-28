CREATE DATABASE IF NOT EXISTS musisom;

USE musisom;

CREATE TABLE IF NOT EXISTS produtos(   
    codigo int(3) NOT NULL auto_increment,
    tipo varchar (70),   
    marca varchar (70),   
    descricao varchar (100),   
    valor varchar (70),
    qtd_estoque varchar (15),   
    PRIMARY KEY (codigo),   
    KEY codigo
    (codigo) 
); 
 