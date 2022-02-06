-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2022 às 21:42
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nimble`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalia_prods`
--

CREATE TABLE `avalia_prods` (
  `id_aval` int(11) NOT NULL,
  `prod_aval` varchar(60) NOT NULL,
  `comentarios` varchar(250) DEFAULT NULL,
  `id_cliente_avalia` int(7) DEFAULT NULL,
  `nota_produto` varchar(15) NOT NULL,
  `nome_cliente_aval` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avalia_prods`
--

INSERT INTO `avalia_prods` (`id_aval`, `prod_aval`, `comentarios`, `id_cliente_avalia`, `nota_produto`, `nome_cliente_aval`) VALUES
(46, 'Notebook Samsung Book X30 prata 15.6 Polegadas', '.', 51, 'Muito Bom', 'Renan Sgubin'),
(47, 'Notebook Samsung Book X30 prata 15.6 Polegadas', '.', 51, 'Bom', 'Renan Sgubin'),
(49, 'Notebook Samsung Book X30 prata 15.6 Polegadas', '.', 51, 'Ruim', 'Renan Sgubin'),
(50, 'Notebook Samsung Book X30 prata 15.6 Polegadas', '.', 51, 'Muito Bom', 'Renan Sgubin'),
(51, 'Notebook Samsung Book X30 prata 15.6 Polegadas', '.', 51, 'Muito Bom', 'Renan Sgubin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `nome_produto_carrinho` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `imagem_produto_carrinho` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `id_cliente` int(20) DEFAULT NULL,
  `unidades` int(10) NOT NULL DEFAULT 1,
  `preco_unidade` decimal(10,2) NOT NULL,
  `qnt_oferta_carrinho` int(5) NOT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS (`unidades` * (`preco_unidade` - `preco_unidade` / 100 * `qnt_oferta_carrinho`)) VIRTUAL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `nome_produto_carrinho`, `imagem_produto_carrinho`, `id_cliente`, `unidades`, `preco_unidade`, `qnt_oferta_carrinho`) VALUES
(416, 'Cadeira Gamer Black Hawk Elg Preta e Vermelha', 'cbd4f85d2e8c59c81ac7275cf2e82ea7.png', 50, 1, '1450.00', 19),
(415, 'Computador Gamer Ryzen 3500x Asus Prime', '40715a040b9a6ab22b9a0bfa97d22e70.jpg', 50, 1, '3250.00', 21),
(413, 'Notebook Gamer Ideapad I340 Lenovo', 'b933c60cd1b5ff052db632f01dcb805f.jpg', 50, 1, '3300.00', 6),
(411, 'Notebook Acer Aspire 3 AMD Ryzen 5', 'c629e914fc644f8132be476cb2c002cf.jpg', 51, 1, '4200.00', 13),
(414, 'Cadeira Gamer PCTop Power Reclinavel Preta e Azul', '438b0377e0a594af5852ab39ea8b1db4.png', 50, 1, '1930.00', 24),
(418, 'Cadeira Gamer PCTop Power Reclinavel Preta e Azul', '438b0377e0a594af5852ab39ea8b1db4.png', 53, 1, '1930.00', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nomecliente` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `cep` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `numero` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `cidade` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `rua` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `senha` char(128) COLLATE utf8_swedish_ci NOT NULL,
  `rg` int(15) DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8_swedish_ci DEFAULT NULL,
  `qnt_cliques_monitor` int(10) DEFAULT NULL,
  `qnt_cliques_console` int(10) DEFAULT NULL,
  `qnt_cliques_tablet` int(10) DEFAULT NULL,
  `qnt_cliques_computador` int(10) DEFAULT NULL,
  `qnt_cliques_notebook` int(10) DEFAULT NULL,
  `qnt_cliques_cadeira` int(10) DEFAULT NULL,
  `qnt_cliques_jogo` int(10) DEFAULT NULL,
  `ultima_visita_monitor` int(1) DEFAULT 0,
  `ultima_visita_console` int(1) DEFAULT 0,
  `ultima_visita_tablet` int(1) DEFAULT 0,
  `ultima_visita_computador` int(1) DEFAULT 0,
  `ultima_visita_jogo` int(1) DEFAULT 0,
  `ultima_visita_cadeira` int(1) DEFAULT 0,
  `ultima_visita_notebook` int(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nomecliente`, `celular`, `cpf`, `email`, `cep`, `numero`, `cidade`, `bairro`, `rua`, `estado`, `senha`, `rg`, `sexo`, `qnt_cliques_monitor`, `qnt_cliques_console`, `qnt_cliques_tablet`, `qnt_cliques_computador`, `qnt_cliques_notebook`, `qnt_cliques_cadeira`, `qnt_cliques_jogo`, `ultima_visita_monitor`, `ultima_visita_console`, `ultima_visita_tablet`, `ultima_visita_computador`, `ultima_visita_jogo`, `ultima_visita_cadeira`, `ultima_visita_notebook`) VALUES
(52, 'Afonso Padilha', '(12) 11111-1111', '00458809489', 'baleia@gmail.com', '64440970', '11', 'Agricolândia', 'Centro', 'Avenida Deputado Francisco José de Carva', 'PI', '$argon2i$v=19$m=65536,t=4,p=1$ZnExZkpiUjdVTTR5dkpzeQ$gAXueisGVf/FZNjZtnxsyMok1dX3DhOtMATxARc7Y+o', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(53, 'Conta Teste', '(11) 11111-1111', '27415565045', 'teste@gmail.com', '69927970', '111', 'Porto Acre', 'Centro', 'Rua Margaridas 131', 'AC', '$argon2i$v=19$m=65536,t=4,p=1$T0lwWUJKaUswRHZGamxnYQ$A70lkBDyNt+xK750tPx9V0/duy+yKP9DAvt6Fbsk4zI', NULL, NULL, NULL, NULL, 2, 3, 2, 2, NULL, 1, 0, 0, 0, 0, 0, 0),
(54, 'Tester Dois', '(11) 11111-1111', '43650998092', 'testedois@gmail.com', '69927970', '111', 'Porto Acre', 'Centro', 'Rua Margaridas', 'AC', '$argon2i$v=19$m=65536,t=4,p=1$cS9jdmFVcFM4OEczRWxYYw$keTjw9wWQDx+g2cC2dGCcWumzTQxTMO1hb6LJQY+nx8', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(55, 'Tester Tres', '(11) 11111-1111', '66835532033', 'testertres@gmail.com', '69927970', '111', 'Porto Acre', 'Centro', 'Rua Margaridas', 'AC', '$argon2i$v=19$m=65536,t=4,p=1$UWdFdkhOSmRKeURzZVM3UQ$SSb1ARsskpjIHwWowDOcAJusE634VtZHaNC2shSNhEk', NULL, NULL, 9, 8, 7, 8, 6, 3, 7, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidas_suporte`
--

CREATE TABLE `duvidas_suporte` (
  `id_cliente_suporte` int(11) NOT NULL,
  `nome_cliente_sup` varchar(70) NOT NULL,
  `email_cliente_sup` varchar(70) NOT NULL,
  `tipo_problema_sup` varchar(35) NOT NULL,
  `desc_problema_sup` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `duvidas_suporte`
--

INSERT INTO `duvidas_suporte` (`id_cliente_suporte`, `nome_cliente_sup`, `email_cliente_sup`, `tipo_problema_sup`, `desc_problema_sup`) VALUES
(1, 'Renan Sgubin', 'renan08042004@gmail.com', 'Segurança', 'Teste'),
(2, 'Robertin', 'square@gmail.com', 'Administração de Permissões', 'Teste Dois'),
(3, 'Afonso Padilha', 'afonso@gmail.com', 'Pedidos', 'Preenchimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_desejos`
--

CREATE TABLE `lista_desejos` (
  `id_list_desej` int(11) NOT NULL,
  `nome_prod_desej` varchar(50) DEFAULT NULL,
  `id_cliente_desej` int(7) DEFAULT NULL,
  `img_prod_desej` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_desejos`
--

INSERT INTO `lista_desejos` (`id_list_desej`, `nome_prod_desej`, `id_cliente_desej`, `img_prod_desej`) VALUES
(30, 'Computador Gamer Intel Core i5 10400f 10a Geracao ', 53, '2a8282b5cb16433b222a13a10b4689ea.jpg'),
(31, 'Tablet Samsung Galaxy Tab A SPen 32G 3GB Ram', 54, '7cf6830abfffc7004c0a604b7d7fc42e.jpg'),
(32, 'Notebook Gamer Ideapad I340 Lenovo', 55, 'b933c60cd1b5ff052db632f01dcb805f.jpg'),
(33, 'Cadeira Gamer PCTop Power Reclinavel Preta e Azul', 55, '438b0377e0a594af5852ab39ea8b1db4.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nome_produto_pedido` varchar(80) NOT NULL,
  `quantidade_produto_pedido` int(7) DEFAULT NULL,
  `imagem_produto_pedido` varchar(256) DEFAULT NULL,
  `id_cliente_pedido` int(8) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `nome_produto_pedido`, `quantidade_produto_pedido`, `imagem_produto_pedido`, `id_cliente_pedido`, `data_pedido`) VALUES
(41, 'Notebook Samsung Book X30 prata 15.6 Polegadas', 1, '505a900b3def178edbbc97b2b9000db1.png', 50, '2021-06-06'),
(42, 'Notebook Samsung Book X30 prata 15.6 Polegadas', 1, '505a900b3def178edbbc97b2b9000db1.png', 51, '2021-06-06'),
(43, 'Tablet 10.5 Polegadas Galaxy Tab S4', 1, 'a32af9895aa68c8adfc5bdaa62a61b9b.jpg', 53, '2021-09-14'),
(44, 'Notebook Samsung Book X30 prata 15.6 Polegadas', 1, '505a900b3def178edbbc97b2b9000db1.png', 54, '2022-01-11'),
(45, 'Tablet 10.5 Polegadas Galaxy Tab S4', 6, 'a32af9895aa68c8adfc5bdaa62a61b9b.jpg', 55, '2022-01-11'),
(46, 'Xbox Series X 1 TB SSD Preto Blu Ray 4K', 1, '30f750c72c938ca4c60f7ccd578c8611.jpg', 55, '2022-01-11'),
(47, 'Computador Gamer Ryzen 3500x Asus Prime', 1, '40715a040b9a6ab22b9a0bfa97d22e70.jpg', 55, '2022-01-11'),
(48, 'Monitor Led 23,6 Polegadas Widescreen 24B1H Aoc', 1, '4a7ac9ae6d294b612ff98f3a0f7f47af.jpg', 55, '2022-01-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `Nome_Produto` varchar(120) COLLATE utf8_swedish_ci NOT NULL,
  `Marca_Produto` tinytext COLLATE utf8_swedish_ci NOT NULL,
  `Quantidade_Estoque_Produto` int(11) DEFAULT NULL,
  `Preco_Produto` int(11) DEFAULT NULL,
  `Imagem_Produto` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Cor_Produto` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `Tipo_Produto` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `oferta` varchar(5) COLLATE utf8_swedish_ci DEFAULT NULL,
  `desc_produto` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `img_extra0` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `img_extra1` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `img_extra2` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `img_extra3` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `tempo_oferta` date DEFAULT NULL,
  `qnt_oferta` int(5) DEFAULT NULL,
  `qnt_vendas` int(11) NOT NULL DEFAULT 0,
  `total_aval` decimal(10,2) DEFAULT NULL,
  `qnt_aval` int(10) DEFAULT 0,
  `aval_media` decimal(10,2) GENERATED ALWAYS AS (`total_aval` / `qnt_aval`) VIRTUAL,
  `nucleos_console` int(50) NOT NULL,
  `unidades_comp_console` int(50) NOT NULL,
  `sup_hdr_console` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `midia_console` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `memoria_ram_console` int(5) NOT NULL,
  `hd_console` int(10) NOT NULL,
  `peso_console` decimal(10,2) DEFAULT NULL,
  `tipo_memoria_console` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `tamanho_monitor` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `resolucao_monitor` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `tempo_resposta_monitor` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `taxa_atualizacao_monitor` varchar(8) COLLATE utf8_swedish_ci NOT NULL,
  `painel_monitor` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `conexoes_monitor` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `usb_monitor` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `sistemaop_tablet` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `tamanho_tablet` decimal(10,2) NOT NULL,
  `resolucao_tablet` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `ram_tablet` varchar(7) COLLATE utf8_swedish_ci NOT NULL,
  `capac_bateria_tablet` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `armazenamento_tablet` varchar(7) COLLATE utf8_swedish_ci NOT NULL,
  `nucleos_tablet` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `sistemaop_computador` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `marca_placamae_computador` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `formato_placamae_computador` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `memoria_compativel_computador` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `marca_processador_computador` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `geracao_processador_amd_computador` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `geracao_processador_intel_computador` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `video_integrado_computador` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_memoria_ram_computador` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `capacidade_ram_computador` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `potencia_fonte_computador` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `cabeamento_fonte_computador` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_armazenamento_computador` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `armazenamento_disco_computador` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `fabricante_chipset_computador` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `sistemaop_notebook` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `marca_processador_notebook` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `geracao_processador_amd_notebook` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `geracao_processador_intel_notebook` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tamanho_tela_notebook` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `resolucao_notebook` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_memoria_notebook` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `armazenamento_notebook` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `memoria_ram_notebook` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `placa_dedicada_notebook` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `peso_notebook` decimal(10,2) NOT NULL,
  `plataforma_jogo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `multijogador_jogo` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `online_jogo` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `formato_jogo` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `data_lanc_jogo` date DEFAULT NULL,
  `genero_jogo` varchar(35) COLLATE utf8_swedish_ci NOT NULL,
  `braco_ajustavel_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `altura_ajustavel_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `inclinacao_ajustavel_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `altura_cadeira` int(5) NOT NULL,
  `largura_cadeira` int(5) NOT NULL,
  `rodas_giratorias_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `peso_max_suportavel_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `e_gamer_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `encosto_reclinavel_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `ergonomica_cadeira` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `data_insercao_prod` date DEFAULT NULL,
  `data_fim_insercao_prod` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `Nome_Produto`, `Marca_Produto`, `Quantidade_Estoque_Produto`, `Preco_Produto`, `Imagem_Produto`, `Cor_Produto`, `Tipo_Produto`, `oferta`, `desc_produto`, `img_extra0`, `img_extra1`, `img_extra2`, `img_extra3`, `tempo_oferta`, `qnt_oferta`, `qnt_vendas`, `total_aval`, `qnt_aval`, `nucleos_console`, `unidades_comp_console`, `sup_hdr_console`, `midia_console`, `memoria_ram_console`, `hd_console`, `peso_console`, `tipo_memoria_console`, `tamanho_monitor`, `resolucao_monitor`, `tempo_resposta_monitor`, `taxa_atualizacao_monitor`, `painel_monitor`, `conexoes_monitor`, `usb_monitor`, `sistemaop_tablet`, `tamanho_tablet`, `resolucao_tablet`, `ram_tablet`, `capac_bateria_tablet`, `armazenamento_tablet`, `nucleos_tablet`, `sistemaop_computador`, `marca_placamae_computador`, `formato_placamae_computador`, `memoria_compativel_computador`, `marca_processador_computador`, `geracao_processador_amd_computador`, `geracao_processador_intel_computador`, `video_integrado_computador`, `tipo_memoria_ram_computador`, `capacidade_ram_computador`, `potencia_fonte_computador`, `cabeamento_fonte_computador`, `tipo_armazenamento_computador`, `armazenamento_disco_computador`, `fabricante_chipset_computador`, `sistemaop_notebook`, `marca_processador_notebook`, `geracao_processador_amd_notebook`, `geracao_processador_intel_notebook`, `tamanho_tela_notebook`, `resolucao_notebook`, `tipo_memoria_notebook`, `armazenamento_notebook`, `memoria_ram_notebook`, `placa_dedicada_notebook`, `peso_notebook`, `plataforma_jogo`, `multijogador_jogo`, `online_jogo`, `formato_jogo`, `data_lanc_jogo`, `genero_jogo`, `braco_ajustavel_cadeira`, `altura_ajustavel_cadeira`, `inclinacao_ajustavel_cadeira`, `altura_cadeira`, `largura_cadeira`, `rodas_giratorias_cadeira`, `peso_max_suportavel_cadeira`, `e_gamer_cadeira`, `encosto_reclinavel_cadeira`, `ergonomica_cadeira`, `data_insercao_prod`, `data_fim_insercao_prod`) VALUES
(993, 'Computador Gamer Ryzen 3500x Asus Prime', 'Samsung', 14, 3250, '40715a040b9a6ab22b9a0bfa97d22e70.jpg', 'Preto', 'Computador', 'Sim', 'Tablet Samsung Galaxy Tab A SPen 32G 3GB Ram', '331d469d0772ae37275736911033fab8.png', '76e1229ad966d21cc59b68bc97abe66d.png', '60ab5bd93b15f53f7e145d868d2c10ad.jpg', '0131f51abb3ccdb98485581f21084034.jpg', '2030-11-29', 23, 1, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', 'MacOS', 'Aorus', 'ATX', 'DDR3', 'Intel', '', 'Intel: 1ª Geração', 'Sim', 'DDR4', '2GB', '100 - 190 W', 'Semi Modular', 'HD', '120GB', 'NVIDIA', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(992, 'Tablet Samsung Galaxy Tab A SPen 32G 3GB Ram', 'Samsung', 15, 2200, '7cf6830abfffc7004c0a604b7d7fc42e.jpg', 'Preto', 'Tablet', 'Sim', 'Tablet Samsung Galaxy Tab A SPen 32G 3GB Ram', 'a79432578c1324a2555c7d8ce1469be6.png', 'ebd40148fdad8b725ef9b93aa65b483c.png', 'fa2bcd62106001060d791320fdf029d2.jpg', '687deb95d2187b5689a96ccc4dce83d9.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', 'iOS', '7.00', 'HD', '2GB', '4450 mAh', '16gb', '2 Núcleos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(991, 'Tablet 10.5 Polegadas Galaxy Tab S4', 'Galaxy', 13, 1400, 'a32af9895aa68c8adfc5bdaa62a61b9b.jpg', 'Preto', 'Tablet', 'Sim', 'Xbox Series X 1 TB SSD Preto Blu Ray 4K', '4fd7461649351eb0fda52fdd9eff8bfc.png', '71749d753e2f371215db955546cfcae1.png', '1e975e04a5c76d45b8dcfcfb5a671666.jpg', '7b822a21eba5bc42a93f9ad05dc2a8e1.jpg', '2030-11-29', 23, 2, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', 'iOS', '7.00', 'HD', '2GB', '4450 mAh', '16gb', '2 Núcleos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(990, 'Read Dead Redemption 2 PS4', 'Rockstar Games', 5, 160, 'a7645770605cc0ced9a2641267bb10db.png', 'Preto', 'Jogo', 'Sim', 'Xbox Series X 1 TB SSD Preto Blu Ray 4K', '34521f187ecb8f7b362fc33f0419f895.png', '2f8fa793d2b9e07cba88c83087e6b0e3.png', '8f2020239eb7eb4a3ba4c4a7c92eeaf1.jpg', '904d377157f209338ef67ff69d140d11.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', 'Computador', 'Sim', 'Sim', 'Física', '0000-00-00', 'Ação, Aventura e RPG', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(989, 'Xbox Series X 1 TB SSD Preto Blu Ray 4K', 'Microsoft', 4, 4900, '30f750c72c938ca4c60f7ccd578c8611.jpg', 'Preto', 'Console', 'Sim', 'Xbox Series X 1 TB SSD Preto Blu Ray 4K', '4d89f03e4ce0b1652ba51c29b8444380.png', '84c4c8edb23e3b8cd3247df6a6d9145b.png', '64321ab37bc6ba1efe14680d1107afbf.jpg', '0ed768ac694ed0350447f2fb36c1075b.jpg', '2030-11-29', 23, 1, NULL, 0, 1, 1, 'Sim', 'Física', 4, 500, '2.00', 'DDR3', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(988, 'Cyberpunk 2077 - PS4 ', 'CD Projekt', 25, 220, '4869ca5ada6b30d0c85b606a870a063c.jpg', 'Preto', 'Jogo', 'Sim', 'Cyberpunk 2077 - PS4 ', 'a50cfa64d765faae881efc7213bd2919.png', '48ff0321255e4a98e6fd98804cd40933.jpg', '2f79224c4c4d2bd44199c26f735d46b4.jpg', '4dd68ce52ae5f7d40b0492813be06fb8.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', 'Computador', 'Sim', 'Sim', 'Física', '0000-00-00', 'Ação, Aventura e RPG', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(987, 'Computador Gamer Intel Core i5 10400f 10a Geracao 16gb', 'Intel', 25, 10900, '2a8282b5cb16433b222a13a10b4689ea.jpg', 'Preto', 'Computador', 'Sim', 'Computador Gamer Intel Core i5 10400f 10a Geracao 16gb 3000mhz', '99060b8d87810b4fb11f8fd00432062b.png', 'a5a4e9834826ad2434162481927e7045.jpg', 'd53f86654b69facef6bd7cb8c4961df8.jpg', 'f1740d70f7c8307a42b3f6b45d6e1667.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', 'MacOS', 'Aorus', 'ATX', 'DDR3', 'Intel', '', 'Intel: 1ª Geração', 'Sim', 'DDR4', '2GB', '100 - 190 W', 'Semi Modular', 'HD', '120GB', 'NVIDIA', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(986, 'Notebook Acer Aspire 3 AMD Ryzen 5', 'Acer', 20, 4200, 'c629e914fc644f8132be476cb2c002cf.jpg', 'Preto', 'Notebook', 'Sim', 'Notebook Acer Aspire 3 AMD Ryzen 5', 'e291f847176103dc8bb62ec09e97f016.png', '17f6fef914894c11b9b14363e98d808c.png', '62ac008e47cd0a793ea14940381d5af3.png', '90a6d980d5647d7a312fcdfecd92c791.png', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MacOS', 'Intel', NULL, 'Intel: 1ª Geração', '11 polegadas', 'HD', 'HD', '128GB', '4GB', 'Sim', '1.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-06', '2030-11-29'),
(984, 'Notebook Samsung Book X30 prata 15.6 Polegadas', 'Samsung', 17, 3800, '505a900b3def178edbbc97b2b9000db1.png', 'Branco', 'Notebook', 'Sim', 'Notebook Samsung Book X30 prata 15.6\", Intel Core i5 10210U 8GB de RAM 1TB HDD, Intel UHD Graphics 1366x768px Windows 10 Home.<br>\r\nUm dos notebooks mais vendidos no site, qualidade surreal pelo menor preço.<br>\r\nDesign futurista, com processador Intel décima geração, memória de 1TB e 8GB de RAM.<br>\r\nNotebook prateado e minimalista para agradar todo e qualquer usuário.\r\n', 'a8b35c7b7227b16c5faf97418130c58f.png', '87ff0b8fbd2354183c3ee0b2d6ccf933.png', '37154f21cca6ef35d78b1edb287a9351.png', '2caf90b053bf87b451da6a5811e20adf.png', '2030-11-29', 23, 3, '77.50', 10, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MacOS', 'Intel', NULL, 'Intel: 1ª Geração', '11 polegadas', 'HD', 'HD', '128GB', '4GB', 'Sim', '1.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-06', '2030-11-29'),
(985, 'Notebook Acer Nitro Aspire 5', 'Acer', 20, 5100, 'ef65ccbb5732e3fa4999c10caac6ab0f.png', 'Preto', 'Notebook', 'Sim', '\r\nNotebook Acer Nitro Aspire 5', 'dbefadd2806314f440cebc278a56bcdd.png', 'e9576fc259be8b99b492b8b585a5db7a.png', '44410ea01a2072f444a5bd2fb9390eaf.png', 'cd0fcd006cb385b8f6dcd8d0d47d46a9.png', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MacOS', 'Intel', NULL, 'Intel: 1ª Geração', '11 polegadas', 'HD', 'HD', '128GB', '4GB', 'Sim', '1.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-06', '2030-11-29'),
(994, 'Monitor Gamer Red Dragon 144hz 24 Polegadas', 'Red Dragon', 15, 2100, '23748dda1306a478124b9ad3b59a31fe.png', 'Preto', 'Monitor', 'Sim', 'Tablet Samsung Galaxy Tab A SPen 32G 3GB Ram', 'd3e36e2b4eca8e2a054aff1246dc0799.png', '452a41ee3453ac3a9071c0506feb684a.png', '7d8ed03cf603fe8e63ef2c722a5ff92a.jpg', 'a1810cf0ec07927a78b9b800f4bcbf36.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '13,3 Polegadas', 'SVGA (4:3 - LetterBox)', '1 ms', '60Hz', 'TN', 'Display Port', 'Sim', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(995, 'Notebook Gamer Ideapad I340 Lenovo', 'Lenovo', 15, 3300, 'b933c60cd1b5ff052db632f01dcb805f.jpg', 'Preto', 'Notebook', 'Sim', 'Notebook Gamer Ideapad I340 Lenovo', '91b4f705371c6d32d311656598ea5025.png', 'c1b758f1301ac495c06d1b4c79afdbfb.png', '4ce51a0a7f7a93c52f2ea291896a7f96.jpg', 'a143c2e301dc5d71ad74c6c6de309a92.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MacOS', 'Intel', NULL, 'Intel: 1ª Geração', '11 polegadas', 'HD', 'HD', '128GB', '4GB', 'Sim', '2.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(996, 'Monitor Gamer HQ LED 24 Polegadas Full HD 75Hz Preto', 'Red Dragon', 15, 1400, '42ea63a2f6070ea3e29b37b33d3b2ec9.jpg', 'Preto', 'Monitor', 'Sim', 'Monitor Gamer HQ LED 24 Polegadas Full HD 75Hz Preto', '023154ab25d6763d2c899adbcd02592d.png', '53f33d04693ba9798a7820852c6e58d7.png', 'c351751b795b1257b5ad37aa52360b52.jpg', '4c044233d118f07c401ec22b4bd86bd4.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '13,3 Polegadas', 'SVGA (4:3 - LetterBox)', '1 ms', '60Hz', 'TN', 'Display Port', 'Sim', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(997, 'Monitor Acer CB272 LED Polegadas FULL HD', 'Acer', 21, 2100, '1fc427124e43b5606811e07bf4001002.jpg', 'Preto', 'Monitor', 'Sim', 'Monitor Acer CB272 LED Polegadas FULL HD', '7ca708433499ab4e206b0c770373840b.png', 'c872c1e9afd97148bd504b07aca59cdc.png', 'a136311219a42ed3cfe8162a46bc5428.jpg', '3ede141c42ea1119e3f74e53874599c5.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '13,3 Polegadas', 'SVGA (4:3 - LetterBox)', '1 ms', '60Hz', 'TN', 'Display Port', 'Sim', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(998, 'Monitor Led 23,6 Polegadas Widescreen 24B1H Aoc', 'Red Dragon', 20, 2400, '4a7ac9ae6d294b612ff98f3a0f7f47af.jpg', 'Preto', 'Monitor', 'Sim', 'Monitor Led 23,6 Polegadas Widescreen 24B1H Aoc', '68dc737bfbf45c753b9938f7078753a4.png', '8b7e44505565dac39c2dc69fbcff79a9.png', '2c0d0b2581fbedaec916199180f8a756.jpg', '309c1330418bb0b940fb265d9699e7f7.jpg', '2030-11-29', 23, 1, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '13,3 Polegadas', 'SVGA (4:3 - LetterBox)', '1 ms', '60Hz', 'TN', 'Display Port', 'Sim', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(999, 'Halo Infinite Xbox One', 'Bungie', 21, 140, '59158c6c6b8602ea82dc488a7226960d.jpg', 'Preto', 'Jogo', 'Sim', 'Halo Infinite Xbox One', '5f61bf16c6adb295e73f4c012b2670a4.png', '51df3208e83a0b29ae9e1978d771e1df.png', '9b980e9d2aca47c35787b3c178650387.jpg', '70b09bebcfe8b3f68772b13546faf2a9.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', 'Computador', 'Sim', 'Sim', 'Física', '0000-00-00', 'Ação, Aventura e RPG', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(1000, 'Fall Guys PS4', 'Mediatonic', 21, 110, '35c92f121d1ca14ce669c488083375b1.jpg', 'Preto', 'Jogo', 'Sim', 'Fall Guys PS4', '8f0d50b696378492bfe2df4c91acaeca.png', '55112c55e66f0f794770b2f4f93718b8.png', '716ff6a64ba54e399d7186cdeb24d46a.jpg', 'ee841cf29abee2633444c33fa2a22790.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', 'Computador', 'Sim', 'Sim', 'Física', '0000-00-00', 'Ação, Aventura e RPG', '', '', '', 0, 0, '', '', '', '', '', '2021-06-07', '2030-11-29'),
(1001, 'Cadeira Gamer DX Racer New Max (PC188 - NR)', 'Mediatonic', 21, 2700, 'de9d0f1ebf2aca356df813a9c448e7e7.jpg', 'Preto', 'Cadeira', 'Sim', 'Fall Guys PS4', 'f85850451408164bea3ae800310ae127.png', 'cc5b52fbf20ed24c27e2af34369948bf.png', 'adf3f352d8e23be72f2f4ae777e25440.jpg', 'c0d43293a8ae63e1030275f1fd9a2299.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '	Sim', 'Sim', 'Sim', 2, 2, 'Sim', '2', 'Sim', 'Sim', 'Sim', '2021-06-07', '2030-11-29'),
(1002, 'Cadeira Gamer PCTop Power Reclinavel Preta e Azul', 'PCTop', 21, 1930, '438b0377e0a594af5852ab39ea8b1db4.png', 'Preto', 'Cadeira', 'Sim', 'Cadeira Gamer PCTop Power Reclinavel Preta e Azul', '5ba758e89324cad7b3e5cbfe41a1d1dc.png', '980b656bbe9c471adf97d817a3040e6e.png', 'dff1e146f756c6e87ec26b10e92f329f.jpg', '6ac3a6a0c7dcb28da1076c6ea4c88cf1.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '	Sim', 'Sim', 'Sim', 2, 2, 'Sim', '2', 'Sim', 'Sim', 'Sim', '2021-06-07', '2030-11-29'),
(1003, 'Cadeira Gamer Black Hawk Elg Preta e Vermelha', 'PCTop', 21, 1450, 'cbd4f85d2e8c59c81ac7275cf2e82ea7.png', 'Preto', 'Cadeira', 'Sim', 'Cadeira Gamer Black Hawk Elg Preta e Vermelha', 'd70faca3453f18fd8eb336dfbcab2f77.png', '8d66ea624725b878d77bd5e5944651df.png', 'd098fa71f00282dead136686e68d758c.jpg', 'a365b2dd316336030f49a6cd28190179.jpg', '2030-11-29', 23, 0, NULL, 0, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '0.00', '', '', '', '', NULL, '', '	Sim', 'Sim', 'Sim', 2, 2, 'Sim', '2', 'Sim', 'Sim', 'Sim', '2021-06-07', '2030-11-29');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avalia_prods`
--
ALTER TABLE `avalia_prods`
  ADD PRIMARY KEY (`id_aval`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `duvidas_suporte`
--
ALTER TABLE `duvidas_suporte`
  ADD PRIMARY KEY (`id_cliente_suporte`);

--
-- Índices para tabela `lista_desejos`
--
ALTER TABLE `lista_desejos`
  ADD PRIMARY KEY (`id_list_desej`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avalia_prods`
--
ALTER TABLE `avalia_prods`
  MODIFY `id_aval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `duvidas_suporte`
--
ALTER TABLE `duvidas_suporte`
  MODIFY `id_cliente_suporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lista_desejos`
--
ALTER TABLE `lista_desejos`
  MODIFY `id_list_desej` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
