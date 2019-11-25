-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2019 às 20:32
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

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

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `id_usuario`, `id_turma`) VALUES
(2017004742, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `matricula` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `matricula_coordenador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `matricula_coordenador`) VALUES
(1, 'Análise e Desenvolvimento de Sistemas', 1111111111);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orientador`
--

CREATE TABLE `orientador` (
  `matricula` int(11) NOT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci NOT NULL
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
  `numero_downloads` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `id_usuario`, `nome`, `resumo`, `categoria`, `autores`, `orientadores`, `coorientadores`, `palavras_chave`, `data_submissao`, `caminho`, `id_curso`, `numero_acessos`, `numero_downloads`) VALUES
(7, 1, 'Interface Intuitiva', 'resumo', 'tcc', '', NULL, NULL, '', '2019-11-05', 'upload/037c8f469f4b7f9d087329af907d3161.pdf', 1, NULL, NULL),
(8, 1, 'RelatÃ³rio de EstÃ¡gio', 'bla bla bla', 'relatorio', '', NULL, NULL, '', '2019-11-06', 'upload/837a61efacb5b1acd0e80ea9808ba053.pdf', 1, NULL, NULL),
(9, 1, 'Resultados da ImplantaÃ§Ã£o de AgrotÃ³xicos em plantaÃ§Ãµes do IFFar SVS', 'bla bla bla', 'producaocientifica', '', NULL, NULL, '', '2019-11-06', 'upload/1ce770ec7ad64213fc0da56fc01d94a8', 1, NULL, NULL),
(14, 1, 'Desenvolvimento do front-end do RepositÃ³rio Digital do IFFar SVS', 'Desenvolvimento do front-end do RepositÃ³rio Digital do IFFar SVS.', 'tcc', '', NULL, NULL, '', '2019-11-12', 'upload/cea61dbc313aeb162d163f48371e5d47.pdf', 1, NULL, NULL),
(15, 1, 'Sistema para GestÃ£o Interna do RefeitÃ³rio do IFFar SVS', 'Sistema para GestÃ£o Interna do RefeitÃ³rio do IFFar SVS', 'tcc', '', NULL, NULL, '', '2019-11-12', 'upload/ad83c9d6bf46337f9c06c6316871adef.pdf', 1, NULL, NULL),
(16, 1, 'AnÃ¡lise sobre o conhecimento discente de boas prÃ¡ticas de SeguranÃ§a da InformaÃ§Ã£o', 'AnÃ¡lise sobre o conhecimento discente de boas prÃ¡ticas de SeguranÃ§a da InformaÃ§Ã£o', 'tcc', '', NULL, NULL, '', '2019-11-12', 'upload/02d21259bacf27c4a2c7eef8ff1eaf9e.pdf', 1, NULL, NULL),
(17, 1, 'RelatÃ³rio das reuniÃµes da empresa do 1Âº Semestre de 2019', 'RelatÃ³rio das reuniÃµes da empresa do 1Âº Semestre de 2019', 'relatorio', '', NULL, NULL, '', '2019-11-12', 'upload/c52d08acea39aa34a8a5319239493af4.pdf', 1, NULL, NULL),
(30, 1, 'teste2', 'teste2', 'tcc', 'teste2', 'teste2', 'teste2', 'teste2', '2019-11-22', 'upload/a6ea62b55409e8bd6c3db18929ec989f.pdf', 1, NULL, NULL),
(31, 1, 'teste3', 'teste3', 'tcc', 'teste3', 'teste3', 'teste3', 'teste3', '2019-11-22', 'upload/d69f7a1332520533e46677d446772698.pdf', 1, NULL, NULL),
(32, 1, 'Trabalho Teste', 'resumo legaaaal', 'tcc', 'Konrado', 'Eliana Zen, Gustavo Risseti', 'Gleizer Voss', 'trabalho. teste', '2019-11-22', 'upload/9d7898063a0d3b89fddc9bb02764f481.pdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ano_inicio` int(4) NOT NULL,
  `ano_fim` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `id_curso`, `nome`, `ano_inicio`, `ano_fim`) VALUES
(1, 1, 'ADS 13', 2017, 2019),
(2, 1, 'ADS 12', 2016, 2018);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrador` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `usuario`, `categoria`, `senha`, `foto`, `administrador`) VALUES
(1, 'Konrado Lorenzon de Souza', 'konradols@hotmail.com', 'konradols', 'aluno', 'f37db7e5ad8bf12a024030aed1cdfa51', '', 'true'),
(2, 'Irineu', 'irineu@email.cp,', 'irineuzis', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(3, 'a', 'a', 'a', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(4, 'Teste', 'teste@gmail.com', 'teste', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(5, 'Gabriel Martin', 'martin@email.com', 'martin', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(6, 'o', 'o', 'o', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(7, 'w', 'w', 'w', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(8, 's', 's', 's', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(9, 'd', 'd', 'd', '', '8277e0910d750195b448797616e091ad', NULL, NULL),
(10, 'teste1', 'teste1', 'teste1', '', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(11, 'adm', 'adm@adm.com', 'adm', 'adm', 'b09c600fddc573f117449b3723f23d64', NULL, 'false'),
(12, 'ee', 'ee', '0', 'ee', '08a4415e9d594ff960030b921d42b91e', NULL, 'false'),
(13, 'ff', 'ff', 'ff', '0', '633de4b0c14ca52ea2432a3c8a5c4c31', NULL, 'false'),
(14, 're', 're', 're', 'aluno', '12eccbdd9b32918131341f38907cbbb5', NULL, 'false'),
(15, 'Fulano', 'fulano@email.com', 'fulano', 'aluno', '202cb962ac59075b964b07152d234b70', NULL, 'false'),
(16, 'Karen', 'karen@gmail.com', 'soareskaren', 'aluno', '202cb962ac59075b964b07152d234b70', NULL, 'false'),
(17, 'dd', 'dd', 'dd', 'aluno', '1aabac6d068eef6a7bad3fdf50a05cc8', NULL, 'false'),
(18, 'rere', 'rere', 'rere', 'aluno', 'bd134207f74532a8b094676c4a2ca9ed', NULL, 'false'),
(19, 'rr', 'rr', 'rr', 'aluno', '514f1b439f404f86f77090fa9edc96ce', NULL, 'false'),
(20, 'Konrado Lorenzon de Souza', 'konradols@hotmail.com', 'konradoAluno', 'aluno', '77ebb1be7e73b38beddd8408f69fe5c7', NULL, 'false'),
(21, 'rtrt', 'rtrt@email.com', 'rtrt', 'aluno', '58d2eeb08d4e339138727553b3c4336b', NULL, 'false');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`matricula`);

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
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `trabalho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
