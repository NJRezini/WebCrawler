-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2020 às 21:19
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webcrawlermunicipio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img_src` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_date` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `name`, `img_src`, `link`, `create_date`) VALUES
(112, 'Após briga com esposa, homem danifica móveis da casa e é preso no Bateas', 'https://omunicipio.com.br/wp-content/uploads/2020/11/pc-6-218x150.jpg', 'https://omunicipio.com.br/apos-briga-com-esposa-homem-danifica-moveis-da-casa-e-e-preso-no-bateas/', 2147483647),
(113, 'Motociclista é conduzido ao hospital após acidente com carro no Águas Claras', 'https://omunicipio.com.br/wp-content/uploads/2020/11/acidente-218x150.jpg', 'https://omunicipio.com.br/motociclista-e-conduzido-ao-hospital-apos-acidente-com-carro-no-aguas-claras/', 2147483647),
(114, 'Área de festas é atingida por incêndio no bairro Santa Terezinha', 'https://omunicipio.com.br/wp-content/uploads/2020/11/incendio-brusque-2-218x150.jpg', 'https://omunicipio.com.br/area-de-festas-e-atingida-por-incendio-no-bairro-santa-terezinha/', 2147483647),
(115, 'Motorista é levado ao hospital após acidente entre dois carros no Zantão', 'https://omunicipio.com.br/wp-content/uploads/2020/11/acidente-brusque-218x150.jpg', 'https://omunicipio.com.br/motorista-e-levado-ao-hospital-apos-acidente-entre-dois-carros-no-zantao/', 2147483647),
(116, 'Criança de 11 anos morre atropelada e carro capota em seguida no Vale do...', 'https://omunicipio.com.br/wp-content/uploads/2020/11/design-sem-nome-2-1-218x150.jpg', 'https://omunicipio.com.br/crianca-de-11-anos-morre-atropelada-e-carro-capota-em-seguida-no-vale-do-itajai/', 2147483647),
(117, 'Morre bebê de um ano que caiu em balde de água em Balneário Piçarras', 'https://omunicipio.com.br/wp-content/uploads/2020/11/ambulancia-2-1-218x150.jpg', 'https://omunicipio.com.br/morre-bebe-de-um-ano-que-caiu-em-balde-de-agua-em-balneario-picarras/', 2147483647),
(118, 'Adolescente de 15 anos pega carro escondido e colide com camionete na BR-470', 'https://omunicipio.com.br/wp-content/uploads/2020/11/adolescente-de-15-anos-pega-carro-escondido-e-colide-com-camionete-na-br-470-acidente-na-470-218x150.jpg', 'https://omunicipio.com.br/adolescente-de-15-anos-pega-carro-escondido-e-colide-com-camionete-na-br-470/', 2147483647),
(119, 'Após receber denúncia de perturbação de sossego, PM prende homem por desacato no Limoeiro', 'https://omunicipio.com.br/wp-content/uploads/2020/11/pm-3-2-218x150.jpeg', 'https://omunicipio.com.br/apos-receber-denuncia-de-perturbacao-de-sossego-pm-prende-homem-por-desacato-no-limoeiro/', 2147483647),
(120, 'Homem é preso por homicídio durante abordagem policial no Santa Rita', 'https://omunicipio.com.br/wp-content/uploads/2020/11/preso-2-218x150.jpg', 'https://omunicipio.com.br/homem-e-preso-por-homicidio-durante-abordagem-policial-no-santa-rita/', 2147483647),
(121, 'VÍDEO: Após ver cão dentro de carro no calor e tentar ajudar, indaialense é...', 'https://omunicipio.com.br/wp-content/uploads/2020/11/video-apos-ver-cao-dentro-de-carro-no-calor-e-tentar-ajudar-indaialense-e-agredida-agressao-218x150.jpg', 'https://omunicipio.com.br/video-apos-ver-cao-dentro-de-carro-no-calor-e-tentar-ajudar-indaialense-e-agredida/', 2147483647);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
