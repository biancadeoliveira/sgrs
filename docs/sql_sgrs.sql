-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.30-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela sgrs_engenharia.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `codCategoria` int(2) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  PRIMARY KEY (`codCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.cep
CREATE TABLE IF NOT EXISTS `cep` (
  `cep` int(8) NOT NULL,
  `codCidade` int(11) NOT NULL,
  `rua` varchar(254) NOT NULL,
  `bairro` varchar(254) NOT NULL,
  PRIMARY KEY (`cep`),
  KEY `codCidade` (`codCidade`),
  CONSTRAINT `cep_ibfk_1` FOREIGN KEY (`codCidade`) REFERENCES `cidade` (`codCidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `codCidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `codPostal` int(8) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais` varchar(50) NOT NULL,
  PRIMARY KEY (`codCidade`),
  UNIQUE KEY `Index 2` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(254) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `telefone` bigint(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.endpessoa
CREATE TABLE IF NOT EXISTS `endpessoa` (
  `codEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` int(8) NOT NULL,
  `cpfCliente` bigint(11) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `complemento` varchar(254) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codEndereco`),
  KEY `cep` (`cep`),
  KEY `cpfCliente` (`cpfCliente`),
  CONSTRAINT `endpessoa_ibfk_1` FOREIGN KEY (`cep`) REFERENCES `cep` (`cep`),
  CONSTRAINT `endpessoa_ibfk_2` FOREIGN KEY (`cpfCliente`) REFERENCES `cliente` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.item
CREATE TABLE IF NOT EXISTS `item` (
  `codItem` int(11) NOT NULL AUTO_INCREMENT,
  `codPedido` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `preco` float NOT NULL,
  `estado` varchar(15) NOT NULL,
  `observacao` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`codItem`),
  KEY `codPedido` (`codPedido`),
  KEY `codProduto` (`codProduto`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`codPedido`) REFERENCES `pedido` (`codPedido`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`codProduto`) REFERENCES `produto` (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.logs_sistema
CREATE TABLE IF NOT EXISTS `logs_sistema` (
  `codLogin` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` bigint(11) NOT NULL,
  `dataAcesso` date NOT NULL,
  `horaLogin` time NOT NULL,
  `horaLogout` time DEFAULT NULL,
  PRIMARY KEY (`codLogin`),
  KEY `cpf` (`cpf`),
  CONSTRAINT `logs_sistema_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `usuario` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `codMesa` int(3) NOT NULL,
  `qtdLugares` int(2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`codMesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.pagamento
CREATE TABLE IF NOT EXISTS `pagamento` (
  `codPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `codUsuario` bigint(11) NOT NULL,
  `codGeral` int(11) NOT NULL,
  `dataPagamento` date NOT NULL,
  `hora` time NOT NULL,
  `formaPagamento` varchar(254) NOT NULL,
  `troco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`codPagamento`),
  KEY `codGeral` (`codGeral`),
  KEY `codUsuario` (`codUsuario`),
  CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`codGeral`) REFERENCES `pedidogeral` (`cod`),
  CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `codPedido` int(11) NOT NULL AUTO_INCREMENT,
  `codPedidoGeral` int(11) NOT NULL,
  `codUsuario` bigint(11) NOT NULL,
  `dataPedido` date NOT NULL,
  `hora` time NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`codPedido`),
  KEY `codPedidoGeral` (`codPedidoGeral`),
  KEY `codUsuario` (`codUsuario`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`codPedidoGeral`) REFERENCES `pedidogeral` (`cod`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.pedidogeral
CREATE TABLE IF NOT EXISTS `pedidogeral` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `codEndereco` int(11) DEFAULT NULL,
  `codMesa` int(3) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `codEndereco` (`codEndereco`),
  KEY `codMesa` (`codMesa`),
  CONSTRAINT `pedidogeral_ibfk_1` FOREIGN KEY (`codEndereco`) REFERENCES `endpessoa` (`codEndereco`),
  CONSTRAINT `pedidogeral_ibfk_2` FOREIGN KEY (`codMesa`) REFERENCES `mesa` (`codMesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `codProduto` int(11) NOT NULL AUTO_INCREMENT,
  `codCategoria` int(2) NOT NULL,
  `numProduto` int(3) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`codProduto`),
  KEY `codCategoria` (`codCategoria`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`codCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `codReserva` int(11) NOT NULL AUTO_INCREMENT,
  `cpfCliente` bigint(11) NOT NULL,
  `codMesa` int(3) NOT NULL,
  `dataReserva` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`codReserva`),
  KEY `cpfCliente` (`cpfCliente`),
  KEY `codMesa` (`codMesa`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cpfCliente`) REFERENCES `cliente` (`cpf`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`codMesa`) REFERENCES `mesa` (`codMesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela sgrs_engenharia.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(254) NOT NULL,
  `senha` varchar(254) NOT NULL,
  `dataNasc` date NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cep` int(8) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `complemento` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  KEY `cep` (`cep`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cep`) REFERENCES `cep` (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
