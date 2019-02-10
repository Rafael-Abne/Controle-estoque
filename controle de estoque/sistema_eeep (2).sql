-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jan-2019 às 14:55
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_eeep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_usuario`, `usuario`, `senha`) VALUES
(1, 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`


INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, ''),
(2, 'pereferi'),
(3, 'perifÃ©ricos bÃ¡sico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `data_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id`, `produto`, `categoria`, `descricao`, `quantidade`, `data_entrada`, `hora_entrada`) VALUES
(2, 'placa de rede', 'PLACAS', 'saindo   2 placas                                     ', 2, '2019-01-21', '18:33:37'),
(3, 'placa de rede', 'PLACAS', '                      sds', 1, '2019-01-19', '13:34:37'),
(4, 'rj45 kit 2', 'perifÃ©ricos bÃ¡sico', '                                                                  ', 22, '2019-01-16', '15:23:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_produto` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `produto` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `consumo` varchar(10) NOT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id_produto`, `produto`, `categoria`, `descricao`, `consumo`, `quantidade`) VALUES
(23, 'placa de rede', 'PLACAS', '                      ', 'nao', 0),
(24, 'rj45 kit 2   ', 'perifÃ©ricos bÃ¡sico', 'kit rj45 45 unidades                                                                                ', 'sim', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(200)
  `consumo` varchar(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `categoria`, `descricao`, `consumo`) VALUES
(34, 'placa de rede  ', 'perifÃ©ricos bÃ¡sico', 'dadddddddddddddddddddddddddddddddddd                                                                ', 'sim'),
(35, 'rj45 kit 2    ', 'pereferi', 'kit rj45 45 unidades                                                                                                              ', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `id` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `data_saida` date NOT NULL,
  `hora_saida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nome_categoria` (`nome_categoria`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `saida`
--
ALTER TABLE `saida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




CREATE TABLE `estoque` (
  `id_produto` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `produto` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `consumo` varchar(10) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
   FOREIGN KEY ( `id_produto` ) REFERENCES `produto` ( `id_produto` )
)
