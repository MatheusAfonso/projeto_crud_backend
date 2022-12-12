create database db_projeto;

create user 'projeto'@'localhost' identified by 'dbR00tP455';
grant all on db_projeto.* to 'projeto'@'localhost';

flush privileges;

DROP TABLE IF EXISTS `enderecoPessoa`;
CREATE TABLE IF NOT EXISTS `enderecoPessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpfCnpj` varchar(50) NOT NULL,
  `idEndereco` int(11),
  `email` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpfCnpj` (`cpfCnpj`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `quantidade` int(11) DEFAULT 0,
  `preco` varchar(12) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `formaPagamento`;
CREATE TABLE IF NOT EXISTS `formaPagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomePagamento` varchar(50) NOT NULL,
  `parcela` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
