-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para dbgerfacil
DROP DATABASE IF EXISTS `dbgerfacil`;
CREATE DATABASE IF NOT EXISTS `dbgerfacil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbgerfacil`;

-- Copiando estrutura para tabela dbgerfacil.tbatividades
DROP TABLE IF EXISTS `tbatividades`;
CREATE TABLE IF NOT EXISTS `tbatividades` (
  `cdAtividade` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdUsuario` int(9) unsigned NOT NULL,
  `cdEvento` int(9) unsigned NOT NULL,
  `nmAtividade` varchar(100) DEFAULT NULL,
  `dsAtividade` varchar(1000) DEFAULT NULL,
  `dtAtividade` date DEFAULT NULL,
  `hrInicioAtividade` time DEFAULT NULL,
  `hrTerminoAtividade` time DEFAULT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdAtividade`),
  KEY `tbAtividades_FKIndex1` (`cdEvento`),
  KEY `tbAtividades_FKIndex2` (`cdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbavaliacoes
DROP TABLE IF EXISTS `tbavaliacoes`;
CREATE TABLE IF NOT EXISTS `tbavaliacoes` (
  `cdAvaliacoes` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdEvento` int(9) unsigned NOT NULL,
  `cdUsuario` int(9) unsigned NOT NULL,
  `nrNota` int(9) unsigned DEFAULT NULL,
  `dsAvaliacao` varchar(1000) DEFAULT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdAvaliacoes`),
  KEY `tbAvaliacoes_FKIndex1` (`cdUsuario`),
  KEY `tbAvaliacoes_FKIndex2` (`cdEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbcidades
DROP TABLE IF EXISTS `tbcidades`;
CREATE TABLE IF NOT EXISTS `tbcidades` (
  `cdCidade` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nmCidade` varchar(100) DEFAULT NULL,
  `cdEstado` int(9) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdCidade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbcomentarios
DROP TABLE IF EXISTS `tbcomentarios`;
CREATE TABLE IF NOT EXISTS `tbcomentarios` (
  `cdComentario` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdEvento` int(9) unsigned NOT NULL,
  `cdUsuario` int(9) unsigned NOT NULL,
  `dsComentario` varchar(1000) DEFAULT NULL,
  `dtComentario` date DEFAULT NULL,
  `hrComentario` time DEFAULT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdComentario`),
  KEY `tbComentarios_FKIndex1` (`cdUsuario`),
  KEY `tbComentarios_FKIndex2` (`cdEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbestado
DROP TABLE IF EXISTS `tbestado`;
CREATE TABLE IF NOT EXISTS `tbestado` (
  `cdEstado` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nmEstado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbeventos
DROP TABLE IF EXISTS `tbeventos`;
CREATE TABLE IF NOT EXISTS `tbeventos` (
  `cdEvento` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdEstado` int(9) unsigned NOT NULL,
  `cdCidade` int(9) unsigned NOT NULL,
  `cdUsuario` int(9) unsigned NOT NULL,
  `cdCategoria` int(9) unsigned NOT NULL,
  `nmEvento` varchar(100) DEFAULT NULL,
  `dsEvento` varchar(1000) DEFAULT NULL,
  `dtInicio` date DEFAULT NULL,
  `dtTermino` date DEFAULT NULL,
  `hrInicio` time DEFAULT NULL,
  `hrTermino` time DEFAULT NULL,
  `nmBairro` varchar(100) DEFAULT NULL,
  `nmRua` varchar(100) DEFAULT NULL,
  `nrLocal` int(9) unsigned DEFAULT NULL,
  `dsComplemento` varchar(100) DEFAULT NULL,
  `nrCep` int(11) unsigned DEFAULT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdEvento`),
  KEY `tbEventos_FKIndex1` (`cdCategoria`),
  KEY `tbEventos_FKIndex2` (`cdUsuario`),
  KEY `tbEventos_FKIndex3` (`cdCidade`),
  KEY `tbEventos_FKIndex4` (`cdEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbperfis
DROP TABLE IF EXISTS `tbperfis`;
CREATE TABLE IF NOT EXISTS `tbperfis` (
  `cdPerfil` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nmPerfil` varchar(100) NOT NULL,
  `dsPerfil` varchar(100) DEFAULT NULL,
  `idAtivo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cdPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbusuarios
DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `cdUsuario` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdEstado` int(9) unsigned NOT NULL,
  `cdCidade` int(9) unsigned NOT NULL,
  `dsLogin` varchar(100) NOT NULL,
  `dsEmail` varchar(100) NOT NULL,
  `dsSenha` varchar(100) NOT NULL,
  `dtNascimento` date NOT NULL,
  `dsNome` varchar(100) NOT NULL,
  `dsSobrenome` varchar(100) NOT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdUsuario`),
  KEY `tbUsuarios_FKIndex3` (`cdCidade`),
  KEY `tbUsuarios_FKIndex4` (`cdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbusuariosfacebook
DROP TABLE IF EXISTS `tbusuariosfacebook`;
CREATE TABLE IF NOT EXISTS `tbusuariosfacebook` (
  `cdUsuarioFacebook` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdUsuario` int(9) unsigned NOT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdUsuarioFacebook`),
  KEY `tbUsuariosFacebook_FKIndex1` (`cdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela dbgerfacil.tbusuarios_tbeventos
DROP TABLE IF EXISTS `tbusuarios_tbeventos`;
CREATE TABLE IF NOT EXISTS `tbusuarios_tbeventos` (
  `cdUsuario` int(9) unsigned NOT NULL,
  `cdEvento` int(9) unsigned NOT NULL,
  `tbPerfis_cdPerfil` int(9) unsigned NOT NULL,
  PRIMARY KEY (`cdUsuario`,`cdEvento`),
  KEY `tbUsuarios_has_tbEventos_FKIndex1` (`cdUsuario`),
  KEY `tbUsuarios_has_tbEventos_FKIndex2` (`cdEvento`),
  KEY `tbUsuarios_has_tbEventos_FKIndex3` (`tbPerfis_cdPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
