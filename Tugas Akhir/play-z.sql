-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2023 pada 05.45
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `play-z`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `games`
--

INSERT INTO `games` (`id`, `title`, `image_path`, `description`) VALUES
(1, 'Rainbow Six siege', 'Pics/R6 Cards1.jpg', 'Rainbow Six Siege (R6 Siege) is a popular tactical first-person shooter game developed and published by Ubisoft. It was released in 2015 and has gained a significant player base since then. The game focuses on intense team-based multiplayer gameplay, emphasizing strategy, coordination, and tactical decision-making.\r\n\r\nIn Rainbow Six Siege, players are divided into two teams: attackers and defenders. The objective varies depending on the game mode, but typically involves either attacking or defending a specific location. The game offers a wide variety of maps, each with its unique layout and strategic possibilities.\r\n\r\nOne of the defining features of R6 Siege is its emphasis on destructible environments. Players can breach walls, create new lines of sight, and manipulate the environment to gain an advantage. This mechanic adds a layer of depth to the gameplay, requiring players to think critically and adapt their strategies on the fly.\r\n\r\nThe game offers a diverse roster of operators, each with their unique abilities, gadgets, and playstyles. Operators are divided into different classes, such as attackers, defenders, and support roles, allowing for varied team compositions and strategies. The operators can be unlocked and customized as players progress through the game.\r\n\r\nRainbow Six Siege also includes a ranking system and competitive gameplay, where players can test their skills against others in ranked matches. Regular updates and content releases, including new operators, maps, and gameplay improvements, have helped to keep the game fresh and engaging for its dedicated player community.\r\n\r\nOverall, Rainbow Six Siege offers a challenging and immersive multiplayer experience that rewards teamwork, communication, and strategic thinking. It has become a popular choice for competitive gamers and those who enjoy tactical gameplay with a focus on coordination and planning.\r\n\r\n\r\n\r\n\r\n'),
(2, 'Monster Hunter: Rise', 'Pics/MHR Cards.jpg', 'Monster Hunter Rise is an action role-playing game developed and published by Capcom. It is the latest installment in the popular Monster Hunter series and was released for the Nintendo Switch console. The game takes place in the fantastical world of Kamura Village, where players assume the role of a skilled Hunter tasked with protecting the village from fearsome monsters.\r\n\r\nIn Monster Hunter Rise, players embark on thrilling quests to hunt down and defeat various monsters that roam the land. The game features a wide array of creatures, ranging from gigantic and formidable beasts to smaller, more cunning creatures. Each monster has unique behaviors, attack patterns, and weaknesses, requiring players to employ different strategies and utilize a vast arsenal of weapons and tools.\r\n\r\nOne of the standout features of Monster Hunter Rise is the introduction of the Wirebug, a versatile insect-based tool that grants players enhanced mobility and new combat maneuvers. With the Wirebug, players can perform aerial attacks, traverse difficult terrain, and even ride on the backs of monsters to unleash powerful attacks. This adds a new layer of verticality and fluidity to the gameplay, allowing for dynamic and exhilarating encounters.\r\n\r\nAs players progress in the game, they can gather resources and materials from defeated monsters to craft and upgrade weapons, armor, and various items. This equipment customization is a key aspect of the gameplay, as it allows players to tailor their Hunter\'s abilities and defenses to suit their preferred playstyle.\r\n\r\nMonster Hunter Rise also introduces a new game mechanic called the Rampage, which is a large-scale siege-like event where players defend Kamura Village from hordes of monsters. Collaborating with other players in cooperative multiplayer mode, they must set up defensive installations, deploy hunting aids, and coordinate their efforts to repel the relentless onslaught.\r\n\r\nThe game features stunning visuals, immersive environments, and a captivating soundtrack that enhances the overall experience. Additionally, Monster Hunter Rise supports both local and online multiplayer, allowing players to team up with friends and take on challenging quests together.\r\n\r\nOverall, Monster Hunter Rise offers an engaging and action-packed adventure, combining intense monster battles, deep customization options, and cooperative gameplay. It continues the tradition of the Monster Hunter series, providing an exciting and rewarding experience for both fans of the franchise and newcomers alike.'),
(3, 'Assasin\'s Creed Mirage', 'Pics/ACM Cards.jpg\r\n', 'Assassin\'s Creed Mirage is an upcoming action-adventure game developed by Ubisoft Bordeaux and published by Ubisoft. It will be the thirteenth major installment in the Assassin\'s Creed series and the successor to 2020\'s Assassin\'s Creed Valhalla. \r\n\r\nPrincipally set in 9th-century Baghdad during the anarchy at Samarra, the game will follow Basim Ibn Ishaq (a character first introduced in Valhalla) and his transition from street thief to fully-fledged member of the Assassin Brotherhood, who fight for peace and liberty, against the Templar Order, who desire peace through control.\r\n\r\nThe game has been described as a return to the series\' roots, with a bigger focus on linear storytelling and stealth gameplay than more recent installments, which primarily focused on role-playing and open world elements.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'dhanu', 'ryvalinodhanuekaputra@mail.ugm.ac.id', '$2y$10$TMQtWakd0yitjZPNpV5GBeo2oPcfq8h3aO24JAWG46P4hOC8ER/Je');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
