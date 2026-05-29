-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2026 alle 16:33
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_spectra`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(11) NOT NULL,
  `utente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello_prodotti`
--

CREATE TABLE `carrello_prodotti` (
  `id` int(11) NOT NULL,
  `carrello_id` int(11) NOT NULL,
  `prodotto_id` int(11) NOT NULL,
  `quantita` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id`, `nome`) VALUES
(1, 'sole'),
(2, 'vista');

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE `immagini` (
  `id` int(11) NOT NULL,
  `prodotto_id` int(11) NOT NULL,
  `percorso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `immagini`
--

INSERT INTO `immagini` (`id`, `prodotto_id`, `percorso`) VALUES
(1, 1, 'eclipse.png'),
(2, 2, 'vision.png'),
(3, 2, 'vision2.png'),
(4, 2, 'vision3.png'),
(5, 2, 'vision4.png'),
(6, 2, 'vision5.png'),
(7, 3, 'mirage.png'),
(8, 4, 'athletic.png'),
(9, 5, 'horizon.png'),
(10, 6, 'axis.png'),
(11, 7, 'nexus.png'),
(12, 1, 'eclipse2.png'),
(13, 1, 'eclipse3.png'),
(14, 2, '!eclipse.png'),
(15, 3, '!mirage.png'),
(16, 3, 'mirage2.png'),
(17, 3, 'mirage3.png'),
(18, 4, '!athletic.png'),
(19, 4, 'athletic2.png'),
(20, 4, 'athletic3.png'),
(21, 7, '!nexus.png'),
(22, 7, '!nexus2.png'),
(23, 1, 'eclipse4.png'),
(24, 5, 'horizon2.png'),
(25, 5, 'horizon3.png'),
(26, 5, 'horizon4.png'),
(27, 6, 'axis2.png'),
(28, 6, 'axis3.png'),
(29, 6, 'axis4.png'),
(30, 7, 'nexus2.png'),
(31, 7, 'nexus3.png'),
(32, 3, 'mirage4.png'),
(33, 3, 'mirage5.png'),
(34, 6, 'axis2.png'),
(35, 6, 'axis3.png'),
(36, 6, 'axis4.png'),
(37, 7, 'nexus4.png'),
(38, 7, 'nexus5.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `descrizione` varchar(400) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `prezzo`, `stock`, `categorie_id`, `descrizione`, `slug`) VALUES
(1, 'Spectra Eclipse', 349.99, 1000, 1, 'Montatura classica wayfarer in acetato nero satinato con struttura ergonomica e leggera. Lenti fumé antracite anti-riflesso con tecnologia UV400 e dettagli smart integrati nelle aste.', 'eclipse'),
(2, 'Spectra Vision\r\n\r\n\r\n', 450.00, 1000, 2, 'occhiali da vista dotati di AI e mole altre funzionalità', 'vision'),
(3, 'Spectra Mirage', 449.99, 1000, 1, 'Occhiali smart con montatura bold in policarbonato nero opaco ad alta resistenza. Lenti nere smoke polarizzate con protezione UV400 e microcamera laterale integrata dal design minimal.', 'mirage'),
(4, 'Spectra Athletic', 300.00, 1000, 1, 'occhiali da sole integrati di ai e molte altre funzionalità', 'athletic'),
(5, 'Spectra Horizon', 549.00, 1000, 1, 'Occhiali smart aviator con montatura in lega metallica dorata ultra leggera e aste in acetato nero lucido. Lenti fumé nere polarizzate con protezione UV e microcamera laterale integrata per un look elegante e tecnologico', 'horizon'),
(6, 'Spectra Axis', 399.99, 1000, 1, 'Montatura squadrata in acetato nero premium con finitura lucida e aste sottili leggere. Lenti fumé grigio-blu con effetto sfumato e telecamera integrata discreta per uno stile urbano moderno.', 'axis'),
(7, 'Spectra Nexus', 450.00, 1000, 2, 'occhiali da vista integrati di ai e molte altre funzionalità', 'nexus');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `cognome`, `email`, `password`) VALUES
(1, 'manuel', 'madau', 'sdgv@io', '$2y$10$2F5lwy0gwfId7M1b8qyecOBls.qYAtUPdRDDnma.HEDaF62dEXsZe'),
(2, 'manuel', 'madau', 'io@io', '$2y$10$Dz02/nH/LuJ3M4BBI9MIyOFRblitTimusO3sZIJyNUuGt8oIJGja2');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrello_utenti` (`utente_id`);

--
-- Indici per le tabelle `carrello_prodotti`
--
ALTER TABLE `carrello_prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cp_carrello` (`carrello_id`),
  ADD KEY `fk_cp_prodotti` (`prodotto_id`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `immagini`
--
ALTER TABLE `immagini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodotto_id` (`prodotto_id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodotti_categorie` (`categorie_id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `carrello_prodotti`
--
ALTER TABLE `carrello_prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `immagini`
--
ALTER TABLE `immagini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`utente_id`) REFERENCES `utenti` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_carrello_utenti` FOREIGN KEY (`utente_id`) REFERENCES `utenti` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `carrello_prodotti`
--
ALTER TABLE `carrello_prodotti`
  ADD CONSTRAINT `carrello_prodotti_ibfk_1` FOREIGN KEY (`carrello_id`) REFERENCES `carrello` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrello_prodotti_ibfk_2` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cp_carrello` FOREIGN KEY (`carrello_id`) REFERENCES `carrello` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cp_prodotti` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `immagini`
--
ALTER TABLE `immagini`
  ADD CONSTRAINT `immagini_ibfk_1` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `fk_prodotti_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
