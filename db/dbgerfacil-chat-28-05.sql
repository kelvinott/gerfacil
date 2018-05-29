-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.16-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para dbgerfacil
DROP DATABASE IF EXISTS `dbgerfacil`;
CREATE DATABASE IF NOT EXISTS `dbgerfacil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbgerfacil`;


-- Copiando estrutura para tabela dbgerfacil.chat
DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.chat: ~0 rows (aproximadamente)
DELETE FROM `chat`;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
	(1, '12', '13', 'oi', '2018-05-28 22:44:14', 1);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.chat_lastactivity
DROP TABLE IF EXISTS `chat_lastactivity`;
CREATE TABLE IF NOT EXISTS `chat_lastactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.chat_lastactivity: ~0 rows (aproximadamente)
DELETE FROM `chat_lastactivity`;
/*!40000 ALTER TABLE `chat_lastactivity` DISABLE KEYS */;
INSERT INTO `chat_lastactivity` (`id`, `user`, `time`) VALUES
	(1, '12', 1527558412),
	(2, '', 1527557902),
	(3, '13', 1527558411);
/*!40000 ALTER TABLE `chat_lastactivity` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.sample_friends
DROP TABLE IF EXISTS `sample_friends`;
CREATE TABLE IF NOT EXISTS `sample_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `confirmed` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.sample_friends: ~4 rows (aproximadamente)
DELETE FROM `sample_friends`;
/*!40000 ALTER TABLE `sample_friends` DISABLE KEYS */;
INSERT INTO `sample_friends` (`id`, `user1`, `user2`, `confirmed`) VALUES
	(1, 1, 2, 's'),
	(2, 1, 3, 's'),
	(3, 12, 13, 's');
/*!40000 ALTER TABLE `sample_friends` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbatividades
DROP TABLE IF EXISTS `tbatividades`;
CREATE TABLE IF NOT EXISTS `tbatividades` (
  `cdAtividade` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdUsuario` int(9) unsigned NOT NULL,
  `cdEvento` int(9) unsigned NOT NULL,
  `nmAtividade` varchar(100) DEFAULT NULL,
  `dsAtividade` varchar(1000) DEFAULT NULL,
  `dtAtividadeInicio` date DEFAULT NULL,
  `hrInicioAtividade` time DEFAULT NULL,
  `hrTerminoAtividade` time DEFAULT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  `dtAtividadeTermino` date DEFAULT NULL,
  PRIMARY KEY (`cdAtividade`),
  KEY `tbAtividades_FKIndex1` (`cdEvento`),
  KEY `tbAtividades_FKIndex2` (`cdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbatividades: ~5 rows (aproximadamente)
DELETE FROM `tbatividades`;
/*!40000 ALTER TABLE `tbatividades` DISABLE KEYS */;
INSERT INTO `tbatividades` (`cdAtividade`, `cdUsuario`, `cdEvento`, `nmAtividade`, `dsAtividade`, `dtAtividadeInicio`, `hrInicioAtividade`, `hrTerminoAtividade`, `idAtivo`, `dtAtividadeTermino`) VALUES
	(1, 12, 1, 'Gravata', 'Coletar dinheiro dos convidados', '2018-05-24', '12:00:00', '01:00:00', 1, '2018-05-24'),
	(2, 12, 1, 'DanÃ§a dos noivos', 'Momento onde os noivos irÃ£o danÃ§ar', '2018-05-24', '10:00:00', '10:00:00', NULL, '2018-05-24'),
	(3, 12, 1, 'Janta', 'Momento para jantar', '2018-05-24', '10:00:00', '10:00:00', NULL, '2018-05-24'),
	(4, 12, 1, 'Bebedeira', 'Momento de descontraÃ§Ã£o', '2018-05-24', '10:00:00', '10:00:00', NULL, '2018-05-24'),
	(5, 12, 8, 'teste12', 'teste1', '2018-05-24', '10:00:00', '11:00:00', NULL, '2018-05-24');
/*!40000 ALTER TABLE `tbatividades` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbavaliacoes
DROP TABLE IF EXISTS `tbavaliacoes`;
CREATE TABLE IF NOT EXISTS `tbavaliacoes` (
  `cdAvaliacoes` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdEvento` int(9) unsigned NOT NULL,
  `cdUsuario` int(9) unsigned NOT NULL,
  `qtEstrela` int(9) unsigned NOT NULL,
  PRIMARY KEY (`cdAvaliacoes`),
  KEY `tbAvaliacoes_FKIndex1` (`cdUsuario`),
  KEY `tbAvaliacoes_FKIndex2` (`cdEvento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbavaliacoes: ~5 rows (aproximadamente)
DELETE FROM `tbavaliacoes`;
/*!40000 ALTER TABLE `tbavaliacoes` DISABLE KEYS */;
INSERT INTO `tbavaliacoes` (`cdAvaliacoes`, `cdEvento`, `cdUsuario`, `qtEstrela`) VALUES
	(1, 7, 4, 4),
	(2, 1, 4, 3),
	(3, 40, 4, 4),
	(4, 1, 12, 5),
	(5, 44, 1, 5);
/*!40000 ALTER TABLE `tbavaliacoes` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbcategorias
DROP TABLE IF EXISTS `tbcategorias`;
CREATE TABLE IF NOT EXISTS `tbcategorias` (
  `cdCategoria` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `dsCategoria` varchar(50) DEFAULT NULL,
  `idAtivo` int(1) DEFAULT NULL,
  PRIMARY KEY (`cdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbcategorias: ~0 rows (aproximadamente)
DELETE FROM `tbcategorias`;
/*!40000 ALTER TABLE `tbcategorias` DISABLE KEYS */;
INSERT INTO `tbcategorias` (`cdCategoria`, `dsCategoria`, `idAtivo`) VALUES
	(1, 'Festas', 1);
/*!40000 ALTER TABLE `tbcategorias` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbcidades
DROP TABLE IF EXISTS `tbcidades`;
CREATE TABLE IF NOT EXISTS `tbcidades` (
  `cdCidade` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nmCidade` varchar(100) DEFAULT NULL,
  `cdEstado` int(9) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdCidade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbcidades: ~2 rows (aproximadamente)
DELETE FROM `tbcidades`;
/*!40000 ALTER TABLE `tbcidades` DISABLE KEYS */;
INSERT INTO `tbcidades` (`cdCidade`, `nmCidade`, `cdEstado`) VALUES
	(1, 'Pomerode', 1),
	(2, 'Blumenau', 2);
/*!40000 ALTER TABLE `tbcidades` ENABLE KEYS */;


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

-- Copiando dados para a tabela dbgerfacil.tbcomentarios: ~0 rows (aproximadamente)
DELETE FROM `tbcomentarios`;
/*!40000 ALTER TABLE `tbcomentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcomentarios` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbestado
DROP TABLE IF EXISTS `tbestado`;
CREATE TABLE IF NOT EXISTS `tbestado` (
  `cdEstado` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nmEstado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbestado: ~0 rows (aproximadamente)
DELETE FROM `tbestado`;
/*!40000 ALTER TABLE `tbestado` DISABLE KEYS */;
INSERT INTO `tbestado` (`cdEstado`, `nmEstado`) VALUES
	(1, 'Santa Catarina');
/*!40000 ALTER TABLE `tbestado` ENABLE KEYS */;


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
  `nrCep` varchar(50) DEFAULT NULL,
  `idAtivo` int(1) unsigned NOT NULL DEFAULT '1',
  `nmImagem` varchar(200) DEFAULT NULL,
  `idNotificacao` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cdEvento`),
  KEY `tbEventos_FKIndex1` (`cdCategoria`),
  KEY `tbEventos_FKIndex2` (`cdUsuario`),
  KEY `tbEventos_FKIndex3` (`cdCidade`),
  KEY `tbEventos_FKIndex4` (`cdEstado`),
  CONSTRAINT `FK_tbeventos_tbcategorias` FOREIGN KEY (`cdCategoria`) REFERENCES `tbcategorias` (`cdCategoria`),
  CONSTRAINT `FK_tbeventos_tbcidades` FOREIGN KEY (`cdCidade`) REFERENCES `tbcidades` (`cdCidade`),
  CONSTRAINT `FK_tbeventos_tbestado` FOREIGN KEY (`cdEstado`) REFERENCES `tbestado` (`cdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbeventos: ~13 rows (aproximadamente)
DELETE FROM `tbeventos`;
/*!40000 ALTER TABLE `tbeventos` DISABLE KEYS */;
INSERT INTO `tbeventos` (`cdEvento`, `cdEstado`, `cdCidade`, `cdUsuario`, `cdCategoria`, `nmEvento`, `dsEvento`, `dtInicio`, `dtTermino`, `hrInicio`, `hrTermino`, `nmBairro`, `nmRua`, `nrLocal`, `dsComplemento`, `nrCep`, `idAtivo`, `nmImagem`, `idNotificacao`) VALUES
	(1, 1, 1, 12, 1, 'Casamento', 'teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste ', '2018-04-15', '2018-04-15', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 99999, 'Pizzaria Verace', '89010110', 1, 'feed600f92261270ef1e81a45dcfc2ad.jpg', 1),
	(2, 1, 2, 12, 1, 'Festa2', 'Festa muito legal2', '2018-04-21', '2018-04-21', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '89107000', 1, 'festa.jpg', 0),
	(3, 1, 1, 12, 1, 'Festa 2', 'Festa muito legal 2', '2018-04-16', '2018-04-16', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '89107000', 1, '03fed7836a08363a3c2b8da0317bdda7.jpg', 0),
	(4, 1, 2, 12, 1, 'Formatura', 'Formatura muito legal', '2018-04-17', '2018-04-17', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '11065101', 1, 'formatura.jpg', 0),
	(5, 1, 2, 12, 1, 'Jantar', 'Jantar muito legal', '2018-04-18', '2018-04-18', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '89010000', 1, 'jantar.jpg', 0),
	(6, 1, 2, 12, 1, 'Palestra', 'Palestra muito legal', '2018-04-19', '2018-04-19', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '89010020', 1, 'palestra.jpg', 0),
	(7, 1, 1, 12, 1, 'Festa', 'Festa muito legal6', '2018-04-20', '2018-04-20', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '11065101', 1, 'ec10ca0de25f6bdca7256b6ce6825498.jpg', 0),
	(8, 1, 1, 12, 1, 'Festa', 'Festa muito legal7', '2018-04-21', '2018-04-21', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '89010020', 1, '2cc45e0d6c1f442a98cfac5b41b09507.jpg', 0),
	(9, 1, 1, 12, 1, 'Festa', 'Festa muito legal8', '2018-04-22', '2018-04-22', '22:00:00', '06:00:00', 'Wunderwald', 'Emilio Back', 88, 'Pizzaria Verace', '89010110', 1, 'f35da07fc6c496d45b2fb06d33435d4a.jpg', 0),
	(41, 1, 1, 12, 1, 'Futebol de salÃ£o', 'Estamos montando dois times para realizar um jogo de futebol de salÃ£o', '2018-05-22', '2018-05-22', '09:00:00', '11:00:00', 'Centro', 'Centro', 99, 'Perto dos correios', '89107000', 1, '32b70c60ace4abd557306d90c98e4ca6.jpg', 0),
	(42, 1, 1, 12, 1, 'Evento de jogos', 'Eventos de jogos de video game', '2018-05-25', '2018-05-25', '09:00:00', '18:00:00', 'Wunderwald', 'Emilio Beck', 88, 'Centro', '89107000', 1, 'f17595358b18a9a7468d8ea9b4907759.jpg', 0),
	(43, 1, 1, 12, 1, 'teste', 'teste', '1994-12-31', '1994-12-31', '10:00:00', '10:00:00', 'TESTE', 'TESTE', 43, 'TESTE', '89107000', 1, '2468133dfd9db428c962425c52f4a864.jpg', 1),
	(44, 1, 1, 12, 1, 'teste', 'teste', '1994-12-31', '1994-12-31', '10:00:00', '10:00:00', 'TESTE', 'TESTE', 4, 'TESTE', '89107000', 1, 'c302f057d5cd0d41506bd501d6a929aa.jpg', 1);
/*!40000 ALTER TABLE `tbeventos` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbperfis
DROP TABLE IF EXISTS `tbperfis`;
CREATE TABLE IF NOT EXISTS `tbperfis` (
  `cdPerfil` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nmPerfil` varchar(100) NOT NULL,
  `dsPerfil` varchar(100) DEFAULT NULL,
  `idAtivo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbperfis: ~3 rows (aproximadamente)
DELETE FROM `tbperfis`;
/*!40000 ALTER TABLE `tbperfis` DISABLE KEYS */;
INSERT INTO `tbperfis` (`cdPerfil`, `nmPerfil`, `dsPerfil`, `idAtivo`) VALUES
	(1, 'Comunicador', 'Cooperador', 1),
	(2, 'Cooperador', 'Cooperador', 0),
	(3, 'Organizador', 'Organizador', 0);
/*!40000 ALTER TABLE `tbperfis` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbusuarios
DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `cdUsuario` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdEstado` int(9) unsigned NOT NULL,
  `cdCidade` int(9) unsigned NOT NULL,
  `dsEmail` varchar(100) NOT NULL,
  `dsSenha` varchar(100) NOT NULL,
  `dtNascimento` date NOT NULL,
  `dsNome` varchar(100) NOT NULL,
  `dsSobrenome` varchar(100) NOT NULL,
  `idAtivo` int(1) unsigned DEFAULT '1',
  `idAlteraSenha` int(1) NOT NULL DEFAULT '0',
  `idNotificacao` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cdUsuario`),
  KEY `tbUsuarios_FKIndex3` (`cdCidade`),
  KEY `tbUsuarios_FKIndex4` (`cdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbusuarios: ~7 rows (aproximadamente)
DELETE FROM `tbusuarios`;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` (`cdUsuario`, `cdEstado`, `cdCidade`, `dsEmail`, `dsSenha`, `dtNascimento`, `dsNome`, `dsSobrenome`, `idAtivo`, `idAlteraSenha`, `idNotificacao`) VALUES
	(1, 1, 1, 'teste@teste.com', 'teste1', '0000-00-00', 'teste', 'teste', 1, 0, 0),
	(12, 1, 1, 'kelvinott3112@gmail.com', 'sk8sk8', '0000-00-00', 'Kelvin', 'Ott', 1, 0, 0),
	(13, 1, 1, 'lucas@gmail.com', 'sk8sk8', '0000-00-00', 'lucas', 'carlos', 1, 0, 0),
	(14, 1, 1, 'lucas@ggmail.com', 'sk8sk8', '0000-00-00', 'lucas', 'carlos', 1, 0, 1),
	(15, 1, 1, 'lucas@gggmail.com', 'sk8sk8', '1994-12-31', 'lucas', 'carlos', 1, 0, 1),
	(16, 1, 1, 'lucas@ggggmail.com', 'sk8sk8', '1994-12-31', 'lucas', 'carlos', 1, 0, 1),
	(17, 1, 1, 'lucass@gmail.com', 'sk8sk8', '1994-12-31', 'lucas', 'carlos', 1, 0, 0);
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbusuariosfacebook
DROP TABLE IF EXISTS `tbusuariosfacebook`;
CREATE TABLE IF NOT EXISTS `tbusuariosfacebook` (
  `cdUsuarioFacebook` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `cdUsuario` int(9) unsigned NOT NULL,
  `idAtivo` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdUsuarioFacebook`),
  KEY `tbUsuariosFacebook_FKIndex1` (`cdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbusuariosfacebook: ~0 rows (aproximadamente)
DELETE FROM `tbusuariosfacebook`;
/*!40000 ALTER TABLE `tbusuariosfacebook` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbusuariosfacebook` ENABLE KEYS */;


-- Copiando estrutura para tabela dbgerfacil.tbusuarios_tbeventos
DROP TABLE IF EXISTS `tbusuarios_tbeventos`;
CREATE TABLE IF NOT EXISTS `tbusuarios_tbeventos` (
  `cdUsuario` int(9) unsigned NOT NULL,
  `cdEvento` int(9) unsigned NOT NULL,
  `tbPerfis_cdPerfil` int(9) unsigned NOT NULL,
  PRIMARY KEY (`cdUsuario`,`cdEvento`),
  KEY `tbUsuarios_has_tbEventos_FKIndex1` (`cdUsuario`),
  KEY `tbUsuarios_has_tbEventos_FKIndex2` (`cdEvento`),
  KEY `tbUsuarios_has_tbEventos_FKIndex3` (`tbPerfis_cdPerfil`),
  CONSTRAINT `FK_tbusuarios_tbeventos_tbeventos` FOREIGN KEY (`cdEvento`) REFERENCES `tbeventos` (`cdEvento`),
  CONSTRAINT `FK_tbusuarios_tbeventos_tbusuarios` FOREIGN KEY (`cdUsuario`) REFERENCES `tbusuarios` (`cdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dbgerfacil.tbusuarios_tbeventos: ~18 rows (aproximadamente)
DELETE FROM `tbusuarios_tbeventos`;
/*!40000 ALTER TABLE `tbusuarios_tbeventos` DISABLE KEYS */;
INSERT INTO `tbusuarios_tbeventos` (`cdUsuario`, `cdEvento`, `tbPerfis_cdPerfil`) VALUES
	(1, 8, 1),
	(1, 9, 1),
	(1, 44, 1),
	(1, 1, 2),
	(1, 41, 2),
	(12, 1, 3),
	(12, 2, 3),
	(12, 3, 3),
	(12, 4, 3),
	(12, 5, 3),
	(12, 6, 3),
	(12, 7, 3),
	(12, 8, 3),
	(12, 9, 3),
	(12, 41, 3),
	(12, 42, 3),
	(12, 43, 3),
	(12, 44, 3);
/*!40000 ALTER TABLE `tbusuarios_tbeventos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
