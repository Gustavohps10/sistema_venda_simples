-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2020 às 19:14
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g_avaliacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `renda` decimal(10,2) DEFAULT NULL,
  `credito` decimal(10,2) DEFAULT NULL,
  `fk_idpessoa` int(11) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `renda`, `credito`, `fk_idpessoa`, `senha`, `login`) VALUES
(2, '1500.00', '500.00', 32, 'okada', 'okada'),
(77, '0.00', '0.00', 262, 'Y2xpZW50ZQ==', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status_pedido` tinytext,
  `fk_idcliente` int(11) NOT NULL,
  `fk_idvendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `data_pedido`, `valor`, `status_pedido`, `fk_idcliente`, `fk_idvendedor`) VALUES
(7, '2020-04-17', '3.00', 'A', 2, 3),
(8, '2020-05-10', '4.00', 'I', 1, 3),
(9, '2020-06-15', '1.00', 'A', 4, 2),
(10, '2020-07-07', '2.00', 'I', 2, 3),
(12, '2005-04-17', '100.90', 'A', 68, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_produtos`
--

CREATE TABLE `pedidos_produtos` (
  `fk_pedidos_idpedidos` int(11) NOT NULL,
  `fk_produtos_idprodutos` int(11) NOT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos_produtos`
--

INSERT INTO `pedidos_produtos` (`fk_pedidos_idpedidos`, `fk_produtos_idprodutos`, `qtde`, `valor`) VALUES
(2, 4, 5, '50'),
(2, 2, 3, '100'),
(2, 1, 1, '10'),
(1, 4, 5, '50'),
(1, 5, 2, '1000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `idpessoas` int(11) NOT NULL,
  `nome` varchar(80) CHARACTER SET utf8 NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `status_pessoas` tinytext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`idpessoas`, `nome`, `cpf`, `status_pessoas`) VALUES
(262, 'cliente', '666566666', 'A'),
(263, 'Lucas G.', '66666665566', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idprodutos` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status_produto` tinytext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idprodutos`, `descricao`, `estoque`, `valor`, `status_produto`) VALUES
(1, 'colher', 100, '10.00', 'A'),
(2, 'sopa', 1000, '30.00', 'A'),
(3, 'toddy', 500, '20.00', 'I'),
(4, 'p?o integral', 10, '10.00', 'A'),
(5, 'celular', 200, '1000.00', 'A'),
(6, 'mussarela', 300, '40.00', 'A'),
(7, 'caneta', 150, '20.00', 'I'),
(8, 'bisnaguinha', 120, '50.00', 'A'),
(9, 'faca', 50, '10.00', 'I'),
(10, 'macarr?o', 735, '28.00', 'A'),
(11, 'Produto Teste', 500, '200.00', 'A'),
(12, 'Produto Teste 2', 50, '199.00', 'I'),
(13, 'Produto Teste 3', 51, '199.00', 'I'),
(20, 'bisnaga', 50, '222.00', 'A'),
(21, 'bulacha', 445, '1.00', 'I'),
(22, 'produto teste', 564, '215.00', 'A'),
(23, 'teste 333', 500, '345.67', 'I'),
(24, 'Um A apenas', 50, '123.00', 'A'),
(25, 'd', 500, '567.00', 'I'),
(26, 'e', 500, '444.00', 'A'),
(27, 'g', 50, '345.00', 'A'),
(28, 'h', 500, '0.00', 'I'),
(29, 'arroz doce', 333, '15.90', 'A'),
(30, 'Ã§', 500, '567.00', 'I'),
(31, 'zebra de plastico', 500, '45.78', 'I'),
(32, 'abcdario ', 51, '15.90', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `idvendedor` int(11) NOT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `fk_idpessoas` int(11) NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `senha` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`idvendedor`, `salario`, `fk_idpessoas`, `login`, `senha`) VALUES
(2, '1534.00', 3, NULL, NULL),
(3, '524241.00', 5, NULL, NULL),
(4, '74733.00', 4, NULL, NULL),
(5, '1233.00', 8, NULL, NULL),
(6, '754.00', 2, NULL, NULL),
(7, '1899.00', 6, NULL, NULL),
(8, '543732.00', 7, NULL, NULL),
(9, '21332.00', 9, NULL, NULL),
(10, '500.00', 10, NULL, NULL),
(11, '121211.89', 238, 'admin2', 'admin2'),
(12, '121211.89', 240, 'eoguh', '123'),
(17, '99999999.99', 250, '3434344', '3434343434343'),
(18, '232323.00', 251, '2323', '6545'),
(19, '0.00', 246, 'asasa', 'asasa'),
(20, '1231231.00', 253, '123123', '12312321'),
(26, '5500.90', 263, 'admin', 'YWRtaW4=');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_clientes`
-- (See below for the actual view)
--
CREATE TABLE `view_clientes` (
`idpessoas` int(11)
,`nome` varchar(80)
,`cpf` varchar(11)
,`status_pessoas` tinytext
,`idcliente` int(11)
,`renda` decimal(10,2)
,`credito` decimal(10,2)
,`fk_idpessoa` int(11)
,`login` varchar(255)
,`senha` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_vendedores`
-- (See below for the actual view)
--
CREATE TABLE `view_vendedores` (
`idpessoas` int(11)
,`nome` varchar(80)
,`cpf` varchar(11)
,`status_pessoas` tinytext
,`idvendedor` int(11)
,`salario` decimal(10,2)
,`fk_idpessoas` int(11)
,`login` varchar(255)
,`senha` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_clientes`
--
DROP TABLE IF EXISTS `view_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clientes`  AS  select `pessoas`.`idpessoas` AS `idpessoas`,`pessoas`.`nome` AS `nome`,`pessoas`.`cpf` AS `cpf`,`pessoas`.`status_pessoas` AS `status_pessoas`,`clientes`.`idcliente` AS `idcliente`,`clientes`.`renda` AS `renda`,`clientes`.`credito` AS `credito`,`clientes`.`fk_idpessoa` AS `fk_idpessoa`,`clientes`.`login` AS `login`,`clientes`.`senha` AS `senha` from (`pessoas` join `clientes` on((`pessoas`.`idpessoas` = `clientes`.`fk_idpessoa`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_vendedores`
--
DROP TABLE IF EXISTS `view_vendedores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_vendedores`  AS  select `pessoas`.`idpessoas` AS `idpessoas`,`pessoas`.`nome` AS `nome`,`pessoas`.`cpf` AS `cpf`,`pessoas`.`status_pessoas` AS `status_pessoas`,`vendedores`.`idvendedor` AS `idvendedor`,`vendedores`.`salario` AS `salario`,`vendedores`.`fk_idpessoas` AS `fk_idpessoas`,`vendedores`.`login` AS `login`,`vendedores`.`senha` AS `senha` from (`pessoas` join `vendedores` on((`pessoas`.`idpessoas` = `vendedores`.`fk_idpessoas`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_idpessoa` (`fk_idpessoa`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`),
  ADD KEY `fk_idcliente` (`fk_idcliente`),
  ADD KEY `fk_idvendedor` (`fk_idvendedor`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`idpessoas`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idprodutos`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`idvendedor`),
  ADD KEY `fk_idpessoas` (`fk_idpessoas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `idpessoas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idprodutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `idvendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`fk_idpessoa`) REFERENCES `pessoas` (`idpessoas`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`fk_idvendedor`) REFERENCES `vendedores` (`idvendedor`);

--
-- Limitadores para a tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`fk_idpessoas`) REFERENCES `pessoas` (`idpessoas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
