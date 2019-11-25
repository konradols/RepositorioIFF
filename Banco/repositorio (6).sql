-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2019 às 15:28
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
  `id_curso` int(11) NOT NULL,
  `numero_acessos` int(11) DEFAULT NULL,
  `numero_downloads` int(11) DEFAULT NULL,
  `publicado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `id_usuario`, `nome`, `resumo`, `categoria`, `autores`, `orientadores`, `coorientadores`, `palavras_chave`, `data_submissao`, `caminho`, `id_curso`, `numero_acessos`, `numero_downloads`, `publicado`) VALUES
(2, 1, 'asdvasdfv', 'asdfvasdfvasdvfASDFADSFG', 'tcc', 'asdvasdvfa', 'sdfvasdvas', 'dfvasdfvadfv', 'adfvsdfvsa', '2019-11-25', './upload/aa8ababcd7d7b84c7f0e52dbe5c4b2f5.pdf', 1, NULL, NULL, 0),
(3, 1, 'asfasdga', 'qerwerfawefawefgwesfFEEWDFVSRTGSAWERGWRTHEARG', 'tcc', 'asdasdfasd, asdfsafas, SAEDFASF, ASDFSDFG', 'ASDAEGQERW, AERGWESGRW, WERFGWR, WSRTGRWEG', 'sawergwergwq ,qfqerfwer,f werfgwergf, qwergfqw', 'qergwergwreg, qwerfqer,f qerfqe, rfqwerfqwerf', '2019-11-25', './upload/511461e39ba6c61b8759e921559a3a7d.pdf', 1, NULL, NULL, 0),
(4, 4, 'Repositorio digital teste pappis', 'ahsuahsauhsaushuahsuahsuhausuahushuashausuhaushahushauhsauhsuahsauhsahausah', 'tcc', 'Enrique, Daniel, Daniel, Konrado', 'Gustavo, Eliana', 'Cassanta', 'beckend, frondend, tudo', '2019-11-25', './upload/323bfaeaaeb8043adab12cb38cde4cbd.pdf', 1, NULL, NULL, 0);

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
(1, 'Daniel Zanini de Castro', 'zanini.castro@hotmail.com', 'dcastro', 'coordenador', '202cb962ac59075b964b07152d234b70', NULL, 'true', 1),
(2, 'Coala', 'coala@gmail.com', 'coala', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/697d55fb79cf453c02db8af610d41a88.webp', 'false', 1),
(3, 'asdfasdf', 'asdfasdfasdf', 'a', 'orienteador', 'c4ca4238a0b923820dcc509a6f75849b', 'Img/Perfil/697d55fb79cf453c02db8af610d41a88.webp', 'false', 1),
(4, 'Enrique', 'epappis99@gmail.com', 'epappis', 'aluno', '202cb962ac59075b964b07152d234b70', 'Img/Perfil/9d377b10ce778c4938b3c7e2c63a229a.webp', 'false', 1),
(5, 'Konrado Lorenzon de Souza', 'konradols@hotmail.com', 'konradols', 'aluno', 'f37db7e5ad8bf12a024030aed1cdfa51', 'Img/Perfil/97f20b4511295fa0059f3d9e58917bda.webp', 'false', 1);

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
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `trabalho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
