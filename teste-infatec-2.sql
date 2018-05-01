-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 01:42 AM
-- Server version: 5.7.22
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste-infatec`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternativas`
--

CREATE TABLE `alternativas` (
  `letra` char(1) NOT NULL,
  `alternativa` text NOT NULL,
  `id_alternativa` int(11) NOT NULL,
  `id_pergunta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alunos`
--

CREATE TABLE `alunos` (
  `nome_aluno` text NOT NULL,
  `CPF_aluno` varchar(11) NOT NULL,
  `turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alunos`
--

INSERT INTO `alunos` (`nome_aluno`, `CPF_aluno`, `turma`) VALUES
('Cinthia', '03928998331', 1),
('Charlie', '13257476531', 1),
('Frank', '13773099280', 6),
('Charles', '3928978332', 7),
('Doug', '392899833', 1),
('Nemo', '58907573455', 1),
('Leia', '64231200221', 2),
('Luigi', '65478934200', 1),
('Jeremias', '77089158743', 5),
('Mike', '77765780211', 1),
('Robin', '81762786455', 4),
('Janice', '974567788', 1),
('Pablo', '9890844487', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exercicios`
--

CREATE TABLE `exercicios` (
  `titulo` text NOT NULL,
  `dia` date NOT NULL,
  `id_exercicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercicios`
--

INSERT INTO `exercicios` (`titulo`, `dia`, `id_exercicio`) VALUES
('Primeiro', '2018-04-12', 0),
('Logaritmo', '2018-04-23', 1),
('Estatística', '2018-03-30', 2),
('Trigonometria', '2018-05-01', 3),
('Probabilidade', '2018-02-25', 4),
('Geometria', '2018-06-20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `perguntas`
--

CREATE TABLE `perguntas` (
  `enunciado` text NOT NULL,
  `resposta` char(1) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `id_exercicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perguntas`
--

INSERT INTO `perguntas` (`enunciado`, `resposta`, `id_pergunta`, `id_exercicio`) VALUES
('blablabla', 'a', 0, 3),
('Qual medida equivalente a 3 km?', 'a', 1, 2),
('Uma caixa contém 16 tomates. Quantos tomates terão em 5 caixas?', 'd', 2, 1),
('Quantas letras formam o nosso alfabeto?', 'c', 3, 1),
('Na frase Ele é lindo de matar. Qual é o grau do adjetivo?', 'b', 4, 2),
('Na Tabela de Classificação dos Riscos Ambientais, o Grupo Amarelo representa qual risco?', 'c', 5, 1),
('Qual a resolução padrão utilizada pelo monitor e impressora, respectivamente?', 'd', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

CREATE TABLE `professores` (
  `CPF_professor` varchar(11) NOT NULL,
  `nome_professor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professores`
--

INSERT INTO `professores` (`CPF_professor`, `nome_professor`) VALUES
('383082746', 'Diana'),
('8990856678', 'Olaf'),
('94783500658', 'Fiora');

-- --------------------------------------------------------

--
-- Table structure for table `turmas`
--

CREATE TABLE `turmas` (
  `descricao` text,
  `ano` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `turmas`
--

INSERT INTO `turmas` (`descricao`, `ano`, `id_turma`) VALUES
('lorem ipsum', 3, 1),
('Criar e aprender', 6, 2),
('Construindo novos caminhos', 4, 3),
('Conectados ao seu futuro', 5, 4),
('Sua ideia pode fazer a diferença', 3, 5),
('O futuro se faz no presente', 2, 6),
('Conhecer, participar e tranformar', 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id_alternativa`),
  ADD KEY `id_pergunta` (`id_pergunta`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`CPF_aluno`),
  ADD KEY `turma` (`turma`);

--
-- Indexes for table `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id_exercicio`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `id_exercicio` (`id_exercicio`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`CPF_professor`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternativas`
--
ALTER TABLE `alternativas`
  ADD CONSTRAINT `alternativas_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id_pergunta`);

--
-- Constraints for table `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`turma`) REFERENCES `turmas` (`id_turma`);

--
-- Constraints for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_exercicio`) REFERENCES `exercicios` (`id_exercicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
