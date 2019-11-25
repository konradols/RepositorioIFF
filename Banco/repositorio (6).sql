-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2019 às 20:59
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `repositorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `id_usuario` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `matricula_coordenador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `matricula_coordenador`) VALUES
(1, 'ADS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orientador`
--

CREATE TABLE `orientador` (
  `id_usuario` int(11) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id_trabalho` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `resumo` varchar(4500) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `autores` varchar(200) CHARACTER SET utf8 NOT NULL,
  `orientadores` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coorientadores` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `palavras_chave` varchar(100) CHARACTER SET utf8 NOT NULL,
  `data_submissao` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caminho` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `id_turma` int(11) NOT NULL,
  `numero_acessos` int(11) DEFAULT NULL,
  `numero_downloads` int(11) DEFAULT NULL,
  `publicado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `id_usuario`, `nome`, `resumo`, `categoria`, `autores`, `orientadores`, `coorientadores`, `palavras_chave`, `data_submissao`, `caminho`, `id_turma`, `numero_acessos`, `numero_downloads`, `publicado`) VALUES
(7, 1, 'Desenvolvimento da interface do Repositório Digital do Instituto Federal Farroupilha Campus São Vicente do Sul', 'Documentação e contextualização do desenvolvimento da interface do Repositório Digital do Instituto Federal Farroupilha Campus São Vicente do Sul.', 'tcc', 'Konrado Lorenzon de Souza', 'Eliana Zen', '', 'interface humano-computador. repositório digital', '2019-11-25', './upload/102049173c1b447bc5d01d5e8cc92d83.pdf', 1, NULL, NULL, 1),
(8, 4, 'Desenvolvimento de um repositorio digital para o IFFAr', 'O trabalho descreve o desenvolvimento de um sistema web responsivo para o Instituto Federal Farroupilha', 'tcc', 'Enrique Pappis', 'Gustavo Rissetti', 'Rogerio Cassanta, Eliana Zen', 'Repositorio Digital, Backend, Web Responsivo', '2019-11-25', './upload/55b5d7b1acadf6397976b2f6f982e4a8.pdf', 1, NULL, NULL, 1),
(9, 1, 'Interface para gestão de bovinos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tcc', 'Irineu, Teste1', 'Irineu Fulano da Silva', '', 'bovinos. interface humano-computador', '2019-11-25', './upload/c7100f7f95460888f755bf43b67cd4e5.pdf', 1, NULL, NULL, 1),
(10, 1, 'Sistema de encaminhamento para o CAE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tcc', 'Daniel Zanini de Castro', 'Gustavo Rissetti', '', 'sistema. encaminhamento', '2019-11-25', './upload/c71b56033c6683353a58cb04810e9ea2.pdf', 1, NULL, NULL, 1),
(11, 1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'producaocientifica', 'Irineu da Silva', 'Anésio Oliveira', '', 'lorem ipsum', '2019-11-25', './upload/039c6528fe355c33d71f084fb1e79964.pdf', 1, NULL, NULL, 1),
(15, 5, 'Lorem Ipsum 2', 'Lorem LoremLorem LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem', 'tcc', 'Lorem', 'Lorem', 'Lorem', 'Lorem', '2019-11-25', './upload/102049173c1b447bc5d01d5e8cc92d83.pdf', 1, NULL, NULL, 1),
(16, 5, 'Trabalho Irineu', 'IrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineuIrineu', 'producaocientifica', 'Irineu', 'Irineu', 'Irineu', 'Irineu', '2019-11-25', './upload/c71b56033c6683353a58cb04810e9ea2.pdf', 1, NULL, NULL, 1),
(17, 1, 'AgrVai', 'AgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVaiAgrVai', 'relatorio', 'AgrVai', 'AgrVai', 'AgrVai', 'AgrVai', '2019-11-25', './upload/d6ec80e83c24fc0e43c92ed56930b20e.pdf', 1, NULL, NULL, 0),
(18, 5, 'AgrVai2', 'AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2AgrVai2', 'relatorio', 'AgrVai2', 'AgrVai2', 'AgrVai2', 'AgrVai2', '2019-11-25', './upload/9c840e5dd627e9e4428bf94b0498f825.pdf', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ano_inicio` int(4) NOT NULL,
  `ano_fim` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `id_curso`, `nome`, `ano_inicio`, `ano_fim`) VALUES
(1, 1, '13', 2017, 2019),
(2, 1, '14', 2018, 2020);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrador` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'false',
  `ativo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `usuario`, `categoria`, `senha`, `foto`, `administrador`, `ativo`) VALUES
(1, 'Daniel Zanini de Castro', 'zanini.castro@hotmail.com', 'dcastro', 'coordenador', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/697d55fb79cf453c02db8af610d41a88.webp', '1', 1),
(2, 'Coala', 'coala@gmail.com', 'coala', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/697d55fb79cf453c02db8af610d41a88.webp', 'false', 1),
(3, 'asdfasdf', 'asdfasdfasdf', 'a', 'orienteador', 'c4ca4238a0b923820dcc509a6f75849b', 'Img/Perfil/697d55fb79cf453c02db8af610d41a88.webp', 'false', 1),
(4, 'Enrique', 'epappis99@gmail.com', 'epappis', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/a1b0f04cadc45017bd9e10f4e1a5dc58.webp', '1', 1),
(5, 'Konrado Lorenzon de Souza', 'konradols@hotmail.com', 'konradols', 'aluno', 'f37db7e5ad8bf12a024030aed1cdfa51', 'Img/Perfil/4479e87b43a1a8d290265a594f8ff9bd.webp', 'false', 1),
(6, 'Rafael Souza', 'rafael.souza@gmail.com', 'rafael', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/795cc879d79a7f4b70b8ab50c5420663.webp', '0', 1),
(7, 'Eduardo Lopes', 'eduardo.lopes@gmail.com', 'eduardo', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/396ac02fd2ffd8fedcc267cc968fb0d7.webp', 'false', 1),
(8, 'Andressa Acosta', 'andressa.acosta@gmail.com', 'andressa', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/3b14757f453564c4e4f5cbc43d31ca44.webp', 'false', 1),
(9, 'Clarice Oliveira', 'clarice.oliveira@@gmail.com', 'clarice', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/1181d10df07e08471f5db85806d5a1f8.webp', 'false', 1),
(10, 'José Augusto', 'jose@gmail.com', 'Jose', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/b9b8f14c3ecc89fd99477e517498e05f.webp', 'false', 1),
(11, 'Gustavo Rissetti', 'gustavo.rissetti@iffarroupilha.edu.br', 'rissetti', 'orienteador', 'a8dc6a73875039e872127afd21c28745', 'Img/Perfil/d7f5e931587fdf9904bc8a8d44007d18.webp', '1', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `orientador`
--
ALTER TABLE `orientador`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`id_trabalho`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `coordenador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `orientador`
--
ALTER TABLE `orientador`
  ADD CONSTRAINT `orientador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `trabalho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `trabalho_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
