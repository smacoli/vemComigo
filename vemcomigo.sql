-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04-Jul-2022 às 00:23
-- Versão do servidor: 8.0.17
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vemcomigo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carona`
--

CREATE TABLE `carona` (
  `id` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data_carona` varchar(10) NOT NULL,
  `horário` time NOT NULL,
  `quantidade_vagas` int(11) NOT NULL,
  `obs` text NOT NULL,
  `cpf_usuario` varchar(14) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carona`
--

INSERT INTO `carona` (`id`, `valor`, `data_carona`, `horário`, `quantidade_vagas`, `obs`, `cpf_usuario`) VALUES
(47, 56, '2022-07-30', '00:12:00', 1, 'É esse horário mesmo', '00000000001'),
(48, 20, '2022-07-29', '01:52:00', 0, 'Leva capacete, ok?', '00000000002'),
(32, 50, '2022-07-08', '16:00:00', 3, 'Dogs podem entrar', '00000000001');

--
-- Acionadores `carona`
--
DELIMITER $$
CREATE TRIGGER `trg2` BEFORE UPDATE ON `carona` FOR EACH ROW BEGIN
	SET @vagas = NEW.quantidade_vagas;
    IF (@vagas < 0) THEN 
    	SET NEW.quantidade_vagas = NULL;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itinerario`
--

CREATE TABLE `itinerario` (
  `id_carona` int(11) DEFAULT NULL,
  `id_local` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itinerario`
--

INSERT INTO `itinerario` (`id_carona`, `id_local`, `ordem`) VALUES
(42, 115, 2),
(42, 122, 1),
(32, 122, 1),
(32, 115, 2),
(32, 116, 3),
(32, 84, 4),
(48, 116, 3),
(48, 115, 2),
(48, 122, 1),
(47, 116, 3),
(47, 115, 2),
(47, 122, 1),
(46, 116, 3),
(46, 115, 2),
(46, 122, 1),
(42, 116, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`) VALUES
(4, 'ABC'),
(84, 'Santa Casa'),
(115, 'Capelinha'),
(116, 'Santuário'),
(122, 'IFSULDEMINAS'),
(160, 'São Jerônimo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `cpf_usuario` varchar(15) DEFAULT NULL,
  `id_carona` int(11) DEFAULT NULL,
  `origem` bigint(11) NOT NULL,
  `destino` bigint(11) NOT NULL,
  `valor` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`cpf_usuario`, `id_carona`, `origem`, `destino`, `valor`) VALUES
('00000000001', 48, 122, 116, 20),
('00000000002', 47, 122, 116, 56),
('00000000002', 32, 122, 116, 33.33);

--
-- Acionadores `reserva`
--
DELIMITER $$
CREATE TRIGGER `trg1` AFTER INSERT ON `reserva` FOR EACH ROW BEGIN
	UPDATE carona SET quantidade_vagas = quantidade_vagas - 1 WHERE id = NEW.id_carona;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` varchar(14) NOT NULL,
  `primeiro_nome` varchar(25) NOT NULL,
  `sobrenome` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data_nascimento` varchar(10) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `primeiro_nome`, `sobrenome`, `email`, `telefone`, `data_nascimento`, `senha`) VALUES
('00000000001', 'Stéfane', 'Oliveira', 'stefane.oliveira@gmail.com', '(035) 9 9256 - 3742', '2001-07-25', '22bb5546337b3fb3f0f4c54ad5ef6fe7'),
('00000000002', 'Suzana', 'Machado', 'suzana.machado@gmail.com', '(035) 9 9724 - 8716', '1995-01-25', 'f4b5beb4fc6c438bf4e58336a466d377'),
('00000000003', 'Hiran', 'Nonato', 'hiran.nonato@gmail.com', '(035) 9 9245 - 1632', '1989-05-18', 'f3eb03161f701988b94f46f6442c3843'),
('00000000004', 'Sophia', 'Silva', 'sophia.silva@gmail.com', '(035) 9 7823 - 8012', '2022-07-14', '79fc98c9ebcefe5acf01bc9802b4af1d'),
('00000000005', 'João', 'Silva', 'joao.silva@gmail.com', '(035) 9 9815 - 1453', '2022-08-04', '3dfcab79ed21fd89c9eb25e9864a6155'),
('00000000006', 'Maria', 'Silveira', 'maria@gmail.com', '(035) 9 9245 - 1632', '2022-08-04', '263bce650e68ab4e23f28263760b9fa5'),
('00000000007', 'Lucas', 'Rodrigues', 'lucas@gmail.com', '(035) 9 9812 - 4356', '2022-07-30', 'dc53fc4f621c80bdc2fa0329a6123708'),
('00000000008', 'José', 'Silva', 'jose.silva@gmail.com', '(035) 9 8723 - 6543', '2022-02-10', '662eaa47199461d01a623884080934ab'),
('00000000009', 'Ruan', 'Vasconcelos', 'ruan@gmail.com', '(035) 9 8734 - 8712', '2022-12-28', '68cfbf2fede885a9ccf864ec0f4a150c'),
('00000000010', 'Rita', 'Martins', 'rita@gmail.com', '(035) 9 1256 - 9823', '2022-08-05', '2794d223f90059c9f705c73a99384085'),
('00000000011', 'Ronaldo', 'Silva', 'ronaldo@gmail.com', '(035) 9 9245 - 1632', '2022-07-26', 'c5aa3124b1adad080927ce4d144c6b33'),
('', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('00000000018', 'Arnaldo', 'Soares', 'arnaldo@gmail.com', '(035) 9 8412 - 9824', '2022-07-09', 'b0ce166be81084931c4ffddff8308bc0'),
('00000000019', 'Emília', 'Silva', 'emilia.silva@gmail.com', '(035) 9 8726 - 1234', '2022-08-06', 'aafcc615b67a5a2e360fdd7b390060ee');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `placa` varchar(8) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `cor` varchar(25) NOT NULL,
  `ano_fabricacao` varchar(4) DEFAULT NULL,
  `cpf_usuario` varchar(14) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`placa`, `tipo`, `marca`, `modelo`, `cor`, `ano_fabricacao`, `cpf_usuario`) VALUES
('ABC.1234', 'Moto', 'Yamaha', 'XT 660', 'Vermelha', '2018', '00000000002'),
('DEF.1234', 'Carro', 'Ford', 'Mustang', 'Vermelho', '2018', '00000000001'),
('ygh.4619', 'Carro', 'Fiat', 'Fiat Argo', 'Branco', '2012', '00000000011');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carona`
--
ALTER TABLE `carona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf_usuario` (`cpf_usuario`);

--
-- Índices para tabela `itinerario`
--
ALTER TABLE `itinerario`
  ADD KEY `id_carona` (`id_carona`),
  ADD KEY `id_local` (`id_local`);

--
-- Índices para tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD KEY `cpf_usuario` (`cpf_usuario`),
  ADD KEY `id_carona` (`id_carona`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `cpf_usuario` (`cpf_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carona`
--
ALTER TABLE `carona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
