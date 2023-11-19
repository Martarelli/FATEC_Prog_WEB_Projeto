SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `projetomvc`
--
-- --------------------------------------------------------

DROP TABLE IF EXISTS bebida;
CREATE TABLE `bebida` (
  `idBebida` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS cliente;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS ingrediente;
CREATE TABLE `ingrediente` (
  `idIngrediente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS pedido;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `dt_pedido` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idFornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS pizza;
CREATE TABLE `pizza` (
  `idPizza` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `personalzada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

ALTER TABLE `bebida`
  ADD PRIMARY KEY (`idBebida`) ;

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`) ;

ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`idIngrediente`);

ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_id_cliente` (`idCliente`);

ALTER TABLE `pizza`
  ADD PRIMARY KEY (`idPizza`) ;

-- --------------------------------------------------------

ALTER TABLE `bebida`
  MODIFY `idBebida` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ingrediente`
  MODIFY `idIngrediente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pizza`
  MODIFY `idPizza` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

