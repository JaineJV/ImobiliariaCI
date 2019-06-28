-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para imobiliaria
CREATE DATABASE IF NOT EXISTS `imobiliaria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `imobiliaria`;

-- Copiando estrutura para tabela imobiliaria.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.ci_sessions: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('b969tgceo0s0h91dh411vtt9u68ngdk0', '::1', 1561679104, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536313637393130343B696441646D696E7C733A313A2232223B656D61696C7C733A32363A22706573736F612E6176616C696163616F40676D61696C2E636F6D223B6C6F6761646F7C623A313B),
	('mopge6qd0spu2d15ub5k7g1v4pk316i0', '::1', 1561679310, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536313637393130343B696441646D696E7C733A313A2232223B656D61696C7C733A32363A22706573736F612E6176616C696163616F40676D61696C2E636F6D223B6C6F6761646F7C623A313B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_admin
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_admin: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`id_admin`, `nome`, `email`, `senha`) VALUES
	(1, 'Jaíne Vianna', 'jaine.vianna@aluno.sc.senac.br', '59794bac782b4ad9529b3455f180e635100e352e'),
	(2, 'Pessoa', 'pessoa.avaliacao@gmail.com', 'd4efcc0a43923b52f0646c6ed8bf127dc289ff56');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_bairro
CREATE TABLE IF NOT EXISTS `tb_bairro` (
  `id_bairro` int(11) NOT NULL AUTO_INCREMENT,
  `cd_cidade` int(11) NOT NULL,
  `nome_bairro` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_bairro`),
  KEY `cd_cidade` (`cd_cidade`),
  CONSTRAINT `FK_tb_bairro_tb_cidade` FOREIGN KEY (`cd_cidade`) REFERENCES `tb_cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_bairro: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_bairro` DISABLE KEYS */;
INSERT INTO `tb_bairro` (`id_bairro`, `cd_cidade`, `nome_bairro`) VALUES
	(1, 28, 'Agostini'),
	(2, 28, 'Centro'),
	(3, 28, 'São Sebastião'),
	(4, 28, 'São Jorge'),
	(5, 28, 'Sagrado Coração'),
	(7, 28, 'São Luiz'),
	(8, 28, 'Salete'),
	(9, 28, 'Estrela'),
	(10, 28, 'São Gotardo'),
	(11, 28, 'Progresso'),
	(12, 28, 'Jardim Peperi'),
	(13, 28, 'Santa Rita'),
	(14, 28, 'Andreatta');
/*!40000 ALTER TABLE `tb_bairro` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_categoria
CREATE TABLE IF NOT EXISTS `tb_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_categoria: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` (`id_categoria`, `nome_categoria`) VALUES
	(1, 'Casa'),
	(2, 'Apartamento'),
	(3, 'Kitnet'),
	(4, 'Galpão'),
	(5, 'Chácara'),
	(6, 'Terreno'),
	(7, 'Porão'),
	(8, 'Sala Comercial');
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_cidade
CREATE TABLE IF NOT EXISTS `tb_cidade` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_cidade: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_cidade` DISABLE KEYS */;
INSERT INTO `tb_cidade` (`id_cidade`, `nome_cidade`) VALUES
	(28, 'São Miguel do Oeste');
/*!40000 ALTER TABLE `tb_cidade` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_imovel
CREATE TABLE IF NOT EXISTS `tb_imovel` (
  `id_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(200) NOT NULL,
  `cd_operador` int(11) NOT NULL,
  `cd_rua` int(11) NOT NULL,
  `numero_residencial` int(11) DEFAULT NULL,
  `numero_garagem` int(11) DEFAULT NULL,
  `quantidade_dormitorio` int(11) DEFAULT NULL,
  `preco_imovel` float NOT NULL,
  `area_total` decimal(6,2) NOT NULL,
  `area_construida` decimal(5,2) DEFAULT NULL,
  `cd_categoria` int(11) DEFAULT NULL,
  `numero_banheiro` int(11) DEFAULT NULL,
  `cd_locador` int(11) NOT NULL,
  `sala_estar` int(11) DEFAULT NULL,
  `cozinha` int(11) DEFAULT NULL,
  `area_servico` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_imovel`),
  KEY `fk_Tb_imovel_Tb_categoria1_idx` (`cd_categoria`),
  KEY `codigolocador` (`cd_locador`),
  KEY `fk_imovel_rua` (`cd_rua`),
  KEY `FK_tb_imovel_tb_operador` (`cd_operador`),
  CONSTRAINT `FK_tb_imovel_tb_operador` FOREIGN KEY (`cd_operador`) REFERENCES `tb_operador` (`id_operador`),
  CONSTRAINT `codigolocador` FOREIGN KEY (`cd_locador`) REFERENCES `tb_pessoa` (`id_pessoa`),
  CONSTRAINT `fk_Tb_imovel_Tb_categoria1` FOREIGN KEY (`cd_categoria`) REFERENCES `tb_categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_rua` FOREIGN KEY (`cd_rua`) REFERENCES `tb_rua` (`id_rua`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_imovel: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_imovel` DISABLE KEYS */;
INSERT INTO `tb_imovel` (`id_imovel`, `imagem`, `cd_operador`, `cd_rua`, `numero_residencial`, `numero_garagem`, `quantidade_dormitorio`, `preco_imovel`, `area_total`, `area_construida`, `cd_categoria`, `numero_banheiro`, `cd_locador`, `sala_estar`, `cozinha`, `area_servico`, `status`) VALUES
	(1, 'df72c79eec46378c7af80e46b479ea46.jpg', 2, 1, 123, 2, 3, 300000, 9999.99, 999.99, 1, 2, 1, 1, 2, 1, '0'),
	(2, 'de9a2d1b8fa952ebfe1b2179a270c0b7.jpg', 2, 7, 0, 0, 0, 3900000, 9999.99, 0.00, 6, 0, 2, 0, 0, 0, '0'),
	(3, '92bb5c4da12bf58e16a1e89dd6e14d89.jpg', 1, 8, 2000, 2, 6, 2000, 9999.99, 999.99, 5, 2, 3, 2, 1, 2, '1'),
	(4, '2f0a9e33a8b9fa4e9bc36ec3289f79e1.png', 1, 2, 123, 1, 1, 500, 200.00, 200.00, 3, 1, 2, 1, 1, 1, '1'),
	(5, '5b3cb736a77ef91288eafb977f57800e.png', 1, 3, 365, 2, 2, 700, 600.00, 550.00, 2, 1, 1, 1, 1, 1, '1'),
	(6, '90f606d3ad74130163358e3e06c11e6d.jpg', 2, 9, 254, 0, 0, 122000, 500.00, 450.00, 4, 0, 2, 0, 0, 0, '1'),
	(7, 'a14064076a24d593431e680e5d8b2e54.jpg', 1, 2, 147, 1, 1, 1000, 500.00, 200.00, 1, 1, 1, 1, 1, 1, '1'),
	(8, 'fc5a540051329c45836d4c27834968f9.jpg', 1, 3, 659, 2, 3, 600, 200.00, 100.00, 1, 1, 3, 1, 1, 1, '1'),
	(9, '8a5b8ec889ec2eb1adba85220a7e9222.jpg', 1, 5, 254, 0, 0, 2000, 600.00, 550.00, 4, 1, 2, 0, 1, 0, '1'),
	(10, '85fa97082016529c24e0ee285faa37f4.jpg', 1, 4, 24, 0, 0, 5000, 200.00, 200.00, 8, 3, 2, 0, 2, 0, '1');
/*!40000 ALTER TABLE `tb_imovel` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_indice
CREATE TABLE IF NOT EXISTS `tb_indice` (
  `id_indice` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `data` varchar(50) NOT NULL,
  `percentual` decimal(4,2) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_indice`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_indice: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_indice` DISABLE KEYS */;
INSERT INTO `tb_indice` (`id_indice`, `tipo`, `data`, `percentual`, `valor`) VALUES
	(1, 'CUB/SC - Custo Unitário Básico', 'MAR/2019', 0.42, 1844.09),
	(2, 'CUB/SC - Custo Unitário Básico', 'FEV/2019', 0.19, 1844.09),
	(3, 'CUB/SC - Custo Unitário Básico', 'JAN/2019', 0.26, 1844.09),
	(4, 'CUB/SC - Custo Unitário Básico', 'DEZ/2018', 0.15, 1844.09),
	(5, 'CUB/SC - Custo Unitário Básico', 'NOV/2018', 0.23, 1585.09),
	(6, 'CUB/SC - Custo Unitário Básico', 'OUT/2018', 0.67, 1900.09),
	(7, 'CUB/SC - Custo Unitário Básico', 'SET/2018', 0.40, 1898.09),
	(8, 'CUB/SC - Custo Unitário Básico', 'AGO/2018', 1.45, 1865.09),
	(9, 'CUB/SC - Custo Unitário Básico', 'JUL/2018', 0.49, 1777.09),
	(10, 'CUB/SC - Custo Unitário Básico', 'JUN/2018', 0.23, 1756.09),
	(11, 'CUB/SC - Custo Unitário Básico', 'MAI/2018', 0.34, 1798.09),
	(12, 'CUB/SC - Custo Unitário Básico', 'ABR/2018', 0.34, 1796.09),
	(13, 'IGPM - IGPM', 'ABR/2019', 1.32, 0.00),
	(14, 'IGPM - IGPM', 'MAR/2019', 1.20, 0.00),
	(15, 'IGPM - IGPM', 'FEV/2019', 0.98, 0.00),
	(16, 'IGPM - IGPM', 'JAN/2019', 0.54, 0.00),
	(17, 'IGPM - IGPM', 'DEZ/2019', 0.26, 0.00),
	(18, 'IGPM - IGPM', 'NOV/2019', 0.23, 0.00),
	(19, 'IGPM - IGPM', 'OUT/2019', 0.49, 0.00),
	(20, 'IGPM - IGPM', 'SET/2019', 1.52, 0.00),
	(21, 'IGPM - IGPM', 'AGO/2019', 0.70, 0.00),
	(22, 'IGPM - IGPM', 'JUL/2019', 0.51, 0.00),
	(23, 'IGPM - IGPM', 'JUN/2019', 1.87, 0.00),
	(24, 'IGPM - IGPM', 'MAI/2019', 1.38, 0.00);
/*!40000 ALTER TABLE `tb_indice` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_locador
CREATE TABLE IF NOT EXISTS `tb_locador` (
  `id_locador` int(11) NOT NULL AUTO_INCREMENT,
  `nome_locador` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `nascimento` varchar(50) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_locador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_locador: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_locador` DISABLE KEYS */;
INSERT INTO `tb_locador` (`id_locador`, `nome_locador`, `cpf`, `telefone`, `nascimento`, `genero`, `email`) VALUES
	(1, 'Jaíne Vianna', '1358463165', '(49) 9 9942-2903', '2000-07-05', 'F', 'jaine.vianna@aluno.sc.senac.br'),
	(2, 'Dorotéia dos Santos', '3549430', '(49) 9 9945-2910', '1984-11-30', 'F', 'doroteiadossantos@gmail.com'),
	(3, 'Afonso da Silva', '123654987-45', '(49)9 9965-6598', '1996-10-09', 'M', 'afonsosilva@gmail.com');
/*!40000 ALTER TABLE `tb_locador` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_operador
CREATE TABLE IF NOT EXISTS `tb_operador` (
  `id_operador` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_operador` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_operador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_operador: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_operador` DISABLE KEYS */;
INSERT INTO `tb_operador` (`id_operador`, `tipo_operador`) VALUES
	(1, 'Alugar'),
	(2, 'Venda');
/*!40000 ALTER TABLE `tb_operador` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_rua
CREATE TABLE IF NOT EXISTS `tb_rua` (
  `id_rua` int(11) NOT NULL AUTO_INCREMENT,
  `nome_rua` varchar(250) DEFAULT NULL,
  `cd_bairro` int(11) NOT NULL,
  PRIMARY KEY (`id_rua`),
  KEY `FK_tb_rua_tb_bairro` (`cd_bairro`),
  CONSTRAINT `FK_tb_rua_tb_bairro` FOREIGN KEY (`cd_bairro`) REFERENCES `tb_bairro` (`id_bairro`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_rua: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_rua` DISABLE KEYS */;
INSERT INTO `tb_rua` (`id_rua`, `nome_rua`, `cd_bairro`) VALUES
	(1, 'Oiapoque\r\n', 1),
	(2, 'Sete de Setembro', 2),
	(3, 'Professora Jurema Schacker', 3),
	(4, 'Hélio Wassum', 9),
	(5, 'Florianópolis', 10),
	(6, 'Marquês do Herval', 4),
	(7, 'John Kenedy', 7),
	(8, 'Itaberaba', 5),
	(9, 'São Paulo', 8);
/*!40000 ALTER TABLE `tb_rua` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_slider
CREATE TABLE IF NOT EXISTS `tb_slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` blob,
  `legenda` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_slider: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_slider` DISABLE KEYS */;
INSERT INTO `tb_slider` (`id_slider`, `imagem`, `legenda`) VALUES
	(8, _binary 0x66383732346665303266326130666361306132366165393733376665316638372E6A7067, 'ideias'),
	(10, _binary 0x35383865653135373165646266313361303664643936363839336630323437382E706E67, 'Bem-Vindo'),
	(11, _binary 0x39636434646362343332633739383735356331636164656238343338373834352E6A7067, 'crescer');
/*!40000 ALTER TABLE `tb_slider` ENABLE KEYS */;

-- Copiando estrutura para tabela imobiliaria.tb_sobre
CREATE TABLE IF NOT EXISTS `tb_sobre` (
  `id_sobre` int(11) NOT NULL,
  `summernote` longtext,
  PRIMARY KEY (`id_sobre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela imobiliaria.tb_sobre: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_sobre` DISABLE KEYS */;
INSERT INTO `tb_sobre` (`id_sobre`, `summernote`) VALUES
	(0, '                                <div class="vc_row wpb_row vc_row-fluid" style="font-size: 15px; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px -15px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-family: Rubik, sans-serif;"><div class="wpb_column vc_column_container vc_col-sm-12" style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; width: 756.094px; position: relative; min-height: 1px; float: left;"><div class="vc_column-inner " style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px 15px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; width: 756.094px;"><div class="wpb_wrapper" style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><div class="wpb_text_column wpb_content_element " style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px 0px 35px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><div class="wpb_wrapper" style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><div class="section-header" style="text-align: center; padding-bottom: 40px;" open="" sans",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;="" font-size:="" 14px;="" background-color:="" rgb(250,="" 250,="" 250);"=""><div class="container" style="width: 1170px; max-width: 768px;"><h1 class="section-title" style="color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.1; font-size: 36px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;História</h1><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: 21px;"><span style="color: rgb(102, 102, 102);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: rgb(206, 0, 0);">Um lar se constrói além do espaço físico.</span></p></div></div><div class="container" style="color: rgb(51, 51, 51); width: 1170px;" open="" sans",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;="" font-size:="" 14px;="" background-color:="" rgb(250,="" 250,="" 250);"=""><div class="row"><div class="col-sm-12" style="float: left; width: 1170px;"><div class="text" style="font-size: 16px; line-height: 22px; color: rgb(68, 68, 68);"><p style="margin-right: 0px; margin-bottom: 25px; margin-left: 0px;">Há mais de 35 anos no mercado, a Imobiliária Colinas oferece soluções inovadoras de compra, venda e locação de imóveis, focando sempre no melhor atendimento ao cliente e em um relacionamento de credibilidade e confiança mútua.</p><p style="margin-right: 0px; margin-bottom: 25px; margin-left: 0px;">Um lar precisa atender aos gostos e desejos de todos que o habitam. Com profissionalismo, dedicação e empenho, a Colinas Imóveis busca atender as reais necessidades de seus clientes. Acreditamos que investir no desenvolvimento de nossos profissionais é essencial para alcançarmos a excelência no atendimento.</p><p style="margin-right: 0px; margin-bottom: 25px; margin-left: 0px;">Em 2011 e 2012, a Colinas Imóveis conquistou o primeiro lugar geral no Programa Qualidade e Excelência Empresarial PQEX, criado pelo SECOVI-MG, como a empresa do mercado imobiliário que mais investiu em capacitação profissional.</p><p style="margin-right: 0px; margin-bottom: 25px; margin-left: 0px;">Em 2013, a Colinas Imóveis novamente conquistou o primeiro lugar geral no Programa Qualidade e Excelência Empresarial PQEX e foi pioneira no primeiro lugar, categoria imobiliárias na conquista do prêmio Edison Zenóbio, pela melhor estratégia de comunicação empresarial.</p><p style="margin-right: 0px; margin-bottom: 25px; margin-left: 0px;">A conquista destes prêmios são a confirmação de que este investimento vale a pena. Nos anos posteriores, o investimento em capacitação continuou, porém em outros formatos. A Colinas contratou um consultor para capacitar a equipe e, desde então, vem investindo em treinamentos personalizados. Hoje a empresa conta com um time que promove seus cursos na empresa, como em outras instituições.</p><p style="margin-right: 0px; margin-bottom: 25px; margin-left: 0px;">Com esta filosofia, a Imobiliária Colinas expande e reforça os três pilares; missão, visão e valores, que norteiam sua atuação no mercado imobiliário.</p></div></div></div></div></div></div></div></div></div></div><div class="vc_row wpb_row vc_row-fluid" style="font-size: 15px; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px -15px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(128, 128, 128); font-family: Rubik, sans-serif;"><div class="wpb_column vc_column_container vc_col-sm-4" style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; width: 252.031px; position: relative; min-height: 1px; float: left;"><div class="vc_column-inner " style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px 15px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; width: 252.031px;"><div class="wpb_wrapper" style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><div class="wpb_text_column wpb_content_element " style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px 0px 35px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><div class="wpb_wrapper" style="font-size: inherit; line-height: inherit; border-style: solid; border-width: 0px; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><p></p></div></div></div></div></div></div>                                                                                                ');
/*!40000 ALTER TABLE `tb_sobre` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
