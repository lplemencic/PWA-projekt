-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 11:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `admin`) VALUES
(5, 'user', 'user', 'user', '$2y$10$h0TaYqWQV464qivzjY5TgOgEhc/Lh17Eji5ZpYOF8Nop6fz20Tg.m', 0),
(6, 'user1', 'user1', 'user1', '$2y$10$SWTMzSuQBKh9bsYMZqSyqewr2gM4YQv6/AvUoWtH8YHpMj7JcfhjK', 0),
(7, 'admin', 'admin', 'admin', '$2y$10$h2lb8gNNz6G69QiZ1WtJPe6794byOHTbCDAXFIi8Ti2gyxpP88FpS', 1),
(8, 'user3', 'user3', 'user3', '$2y$10$Cju9X0fSiQcxrm0MTcX3yujYwRJzsXLBpXkelvbjLggLMSRwr8vOi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vjesti`
--

CREATE TABLE `vjesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `kratkisadrzaj` text NOT NULL,
  `sadrzaj1` longtext NOT NULL,
  `podnaslov` varchar(255) NOT NULL,
  `sadrzaj2` longtext NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(32) NOT NULL,
  `vidljivost` int(2) NOT NULL,
  `datum` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vjesti`
--

INSERT INTO `vjesti` (`id`, `naslov`, `kratkisadrzaj`, `sadrzaj1`, `podnaslov`, `sadrzaj2`, `slika`, `kategorija`, `vidljivost`, `datum`) VALUES
(38, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika1.jpg', 'novosti', 1, '16.06.2022'),
(39, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika2.jpg', 'novosti', 1, '16.06.2022'),
(40, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika3.jpg', 'novosti', 1, '16.06.2022'),
(41, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika4.jpg', 'novosti', 0, '16.06.2022'),
(42, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika1.jpg', 'sportske_novosti', 1, '16.06.2022'),
(43, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika2.jpg', 'sportske_novosti', 1, '16.06.2022'),
(44, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika3.jpg', 'sportske_novosti', 1, '16.06.2022'),
(45, 'Nova vjest', 'Ovo je kratki sadržaj nove vjesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'Ovo je podnaslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi quis commodo odio aenean sed adipiscing. Velit laoreet id donec ultrices tincidunt arcu non sodales. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Rutrum quisque non tellus orci. Ipsum consequat nisl vel pretium. Elementum eu facilisis sed odio morbi quis commodo. Ultrices gravida dictum fusce ut placerat orci. Ullamcorper velit sed ullamcorper morbi tincidunt. Sit amet nisl suscipit adipiscing bibendum. Nascetur ridiculus mus mauris vitae ultricies leo integer. Sem integer vitae justo eget.', 'slika4.jpg', 'sportske_novosti', 0, '16.06.2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vjesti`
--
ALTER TABLE `vjesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vjesti`
--
ALTER TABLE `vjesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;
