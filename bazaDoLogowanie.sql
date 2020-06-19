-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Czas generowania: 19 Cze 2020, 14:23
-- Wersja serwera: 5.7.26
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `PHP_CAMP`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoba`
--

CREATE TABLE `osoba` (
  `id` int(11) NOT NULL,
  `userName` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `userType` varchar(32) NOT NULL,
  `hasz` varchar(62) NOT NULL,
  `urlFoto` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `osoba`
--

INSERT INTO `osoba` (`id`, `userName`, `pass`, `email`, `userType`, `hasz`, `urlFoto`) VALUES
(1, '1234', '213', 'gas@o2.pl', 'userAdd', '', ''),
(2, 'TESTOWYDD', 'TESTOWEF', 'TESTr@o2.pl', 'userAdd', '', ''),
(3, 'adam', 'qwerty', 'adam2@fafa.com', 'fill', '', ''),
(4, 'admin', 'admin1', 'admin@admin.com', 'ADMIN', '', ''),
(5, 'phptest23', 'test2', 'AFASF@pl.com', 'F', '', ''),
(6, 'TFFFF2XXx', 'the ', 'road@o2.pl', 'userAdd', '', ''),
(7, 'filip23231', 'xd', 'xd@o2.com', '', '', ''),
(8, 'kebabxD2', 'turecki22', 'turecki@o2.pl', 'userAdd', '', ''),
(9, 'MarcinPXD', 'tajne', 'm@o2.pl', 'userFill', '', ''),
(10, 'MadziaXD', 'FF', 'tajnymial@op.com', 'userAdd', '', ''),
(11, 'MAROFX', 'gasg', 'mar@o2.pl', 'userAdd', '', ''),
(12, 'mamW', 'w', 'domu@meble.com', 'userAdd', '', ''),
(13, '1234', '213', 'gas@o2.pl', 'userAdd', '', ''),
(14, 'tiktakiXD22222', 'mam', 'w@domu.com', 'userAdd', '', ''),
(15, 'MAROFXkkkk', 'gasg', 'mar@o2.pl', 'userAdd', '', ''),
(16, 'nlkknl', '213', 'gas@o2.pl', 'userFill', '', ''),
(17, 'MARCINN', 'es', 'mar@o2p.c', 'userFill', '', ''),
(18, 'testcamp', 'test', 'kjkkafbskf@o2.pl', 'userAdd', '', ''),
(19, 'SALA1', 'SALA', 'mar@o2.pl', 'userFill', '', ''),
(20, 'marcinwrz', 'marcin', 'm@o2.pl', 'userFill', '', ''),
(21, 'marcinwrz2', 'marcin', 'marwrz36@gmail.com', 'userAdd', '', ''),
(22, 'FIIIX', 'FIIIX', '123@op.ocm', 'userAdd', '', ''),
(23, 'XD23', 'xD23', 'Xx@o2.pl', 'userFill', '', ''),
(24, 'FX2', 'FX2', 'm@o2.pl', 'userFill', '', ''),
(25, 'FIXU', '23', '231@o2.pl', 'userAdd', '', ''),
(26, 'Majster223', '123', '123@o2.pl', 'userFill', '', ''),
(27, 'JMXD', 'JM', 'm@o2.pl', 'userFill', '', ''),
(28, 'JM2', 'JM2', 'm@op.com', 'userAdd', '', ''),
(29, 'afas', 'afsf', '123123@o2.pl', 'userAdd', '', ''),
(30, 'JANEK', '123', 'm@op.pl', 'userFill', '', ''),
(31, 'dj', 'jd', 'm@o2.pl', 'userAdd', '', ''),
(32, 'FF', '123', 'm@o2.pl', 'userFill', '', ''),
(33, 'adam2', 'm', 'm@o2.pl', 'userAdd', '', ''),
(34, 'XD', '123123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(35, '123123', '123123', 'm@o2.pl', 'userAdd', '', ''),
(36, 'adam23', 'qweq', 'm@o2.pl', 'userAdd', '', ''),
(37, '123123124', '141241', 'marwrz36@gmail.com', 'userAdd', '', ''),
(38, 'afasf', 'afs', 'fas@o2.pl', 'userAdd', '', ''),
(39, '124124', '12412', '41241@o2.pl', 'userAdd', '', ''),
(40, '124124214', '12412', '12412@o2.pl', 'userAdd', '', ''),
(41, '12312412', '124124', '124124@o2.pl', 'userAdd', '', ''),
(42, '131241241', '12412', '4@o.pl', 'userAdd', '', ''),
(43, 'adam124124', '13123@o2.pl', '141241@o2.pl', 'userAdd', '', ''),
(44, '142412r1', '12412r', 'marwrz36@gmail.com', 'userAdd', '', ''),
(45, 'gsadgag', 'agsa', 'gas@o2.pl', 'userAdd', '', ''),
(46, '1r12t51', '151', '12412@o2.pl', 'userAdd', '', ''),
(47, 'test23', 'test', 'm@o2.pl', 'userAdd', '', ''),
(48, 'fifi2', 'xd', 'm@o2.pl', 'userFill', '', ''),
(49, 'filantrop', 'filantrop', 'm@op.pl', 'userFill', '', ''),
(50, 'testowy', 'testowy', 'test@o2.pl', 'userFill', '', ''),
(51, 'phpcamptest', 'test', 'm@o2.pl', 'userAdd', '', ''),
(52, 'testMarcin', 'test', '12312@o2.pl', 'userAdd', '', ''),
(53, 'testphpcampMarcin', 'test', 'm@o2.pl', 'userAdd', '', ''),
(54, 'marcintest23', 'test', 'm@o2.pl', 'userFill', '', ''),
(55, 'gasgasga', 'gasa', 'asgasgg@o2.pl', 'userAdd', '', ''),
(56, 'asgasg', 'sagag', 'm@o2.pl', 'userFill', '', ''),
(57, 'marcintest222', 'test', 'm@o2.pl', 'userFill', '', ''),
(58, 'afsfasga', 'asga', 'm@o2.pl', 'userAdd', '', ''),
(59, 'agdhadhadha', 'adhahah', 'ma@o2.pl', 'userAdd', '', ''),
(60, 'testhasz2', 'test', 'm@o2.pl', 'userAdd', '', ''),
(61, '123', '123', 'm@o2.pl', 'userAdd', '', ''),
(62, 'test2333', '123', 'm@o2.pl', 'userAdd', '', ''),
(63, 'testIO', '123', 'm@o2.pl', 'userAdd', '', ''),
(64, 'TESTIO1', '123', 'm@o2.pl', 'userFill', '', ''),
(65, 'userType1', '123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(66, 'adam2', '123123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(67, 'adam233', '123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(68, 'adam23333', '123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(69, 'test11', '11', 'marwrz36@gmail.com', 'userAdd', '', ''),
(70, 'test11', '11', 'marwrz36@gmail.com', 'userAdd', '', ''),
(71, 'adam1111', '123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(72, 'ostatnitest123', '123', 'marwrz36@gmail.com', 'userAdd', '', ''),
(73, 'hhjj123', '123', 'marwrz36@gmail.com', 'userAdd', '2bbe347f03fae8337f02b6863fd88127', ''),
(74, 'mP', '123', 'marwrz36@gmail.com', 'userAdd', 'f051a905ecc7226b4045d339d6508183', ''),
(75, 'mP111', '123', 'xd@gmail.com', 'userAdd', 'a60a69eed0d5b86d72f8a4315bfeaa9f', ''),
(76, 'mP1', '1231', 'marwrz36@gmail.com', 'userAdd', 'a2268ae3b60d2e7c7589c6e8eb27d7da', ''),
(77, 'mP2', '123', 'marwrz36@gmail.com', 'userAdd', '829f585abce3c236691b07ccad7da394', 'https://img.icons8.com/wired/64/000000/loch-ness-monster.png'),
(78, 'mP3', '123', 'marwrz36@gmail.com', 'userAdd', '9c5a37f8a8bdbeb4f77f94b4756ed75c', 'https://img.icons8.com/wired/64/000000/unicorn.png'),
(79, 'mP5', '123', 'marwrz36@gmail.com', 'userFill', '3a8658285ef2d01b0389df0584c5fc12', NULL),
(80, 'mP99', '123', 'm@o2.pl', 'userAdd', 'c909abc139969da28cc4a018252ac370', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `osoba`
--
ALTER TABLE `osoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;