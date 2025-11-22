-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2025 at 08:52 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `bookedseats`
--

DROP TABLE IF EXISTS `bookedseats`;
CREATE TABLE IF NOT EXISTS `bookedseats` (
  `seatID` int NOT NULL AUTO_INCREMENT,
  `ticketFK` int NOT NULL,
  `seat` varchar(3) NOT NULL,
  `movieFK` varchar(4) NOT NULL,
  `movieDate` date NOT NULL,
  PRIMARY KEY (`seatID`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `genreID` int NOT NULL AUTO_INCREMENT,
  `genreTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`genreID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `genreTitle`) VALUES
(1, 'Scifi'),
(2, 'Action'),
(3, 'Horror'),
(4, 'Comedy'),
(5, 'Fantasy'),
(6, 'Romance'),
(7, 'Thriller'),
(8, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `moviebanner`
--

DROP TABLE IF EXISTS `moviebanner`;
CREATE TABLE IF NOT EXISTS `moviebanner` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `moviebanner`
--

INSERT INTO `moviebanner` (`ID`, `banner`, `Title`, `description`) VALUES
(1, 'moviebanner1.jpg', 'Mission: Impossible – The Final Reckoning', '2025 ‧ Action/Thriller ‧ 🕓2h 49m'),
(2, 'moviebanner2.jpg', 'Sinners', '2025 ‧ Horror/Thriller ‧ 🕓2h 17m'),
(3, 'moviebanner3.jpg', 'Everything Everywhere All at Once', '2025 ‧ Action/Sci-fi ‧ 🕓2h 19m'),
(4, 'moviebanner4.jpg', 'Shin Godzilla', '2025 ‧ Horror/Action ‧ 🕓2h'),
(5, 'moviebanner5.jpg', 'Poor Things', '2025 ‧ Fantasy/Comedy ‧ 🕓2h 21m');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movieID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `picFilename` varchar(255) NOT NULL,
  `Plot` varchar(1000) NOT NULL,
  `moviePrice` float NOT NULL,
  `genreFK` int NOT NULL,
  `runtime` int NOT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `Title`, `picFilename`, `Plot`, `moviePrice`, `genreFK`, `runtime`) VALUES
(41, 'Everything Everywhere All at Once', 'everything.jpeg', 'A Chinese immigrant gets unwillingly embroiled in an epic adventure where she must connect different versions of herself in the parallel universe to stop someone who intends to harm the multiverse.', 16, 1, 139),
(2, 'Shin Godzilla', 'shin.jpg', 'A gigantic creature emerges from the sea and destroys the city of Tokyo. The government officials must come up with a plan to destroy it quickly, as its strength is evolving very rapidly.', 16, 2, 120),
(3, 'Kung Fu Hustle', 'kungfu.jpeg', 'An aspiring gangster pretends to be part of a notorious gang and tries to terrorise a neighbourhood. However, unknown to him, three martial arts experts live there and are ready to take him down.', 16, 4, 99),
(4, 'Godzilla x Kong: The New Empire', 'Godzilla.JPG', 'Godzilla and the almighty Kong face a colossal threat hidden deep within the planet, challenging their very existence and the survival of the human race.', 14, 2, 120),
(5, 'Miss Peregrine\'s Home for Peculiar Children', 'Peculiar.jpg', 'A young boy named Jake discovers a house full of children with supernatural powers run by Miss Peregrine. Soon, he must help protect their home from terrifying enemies called Hollowgasts.', 13, 5, 127),
(6, 'La La Land', 'lalaland.jpg', 'When Sebastian, a pianist, and Mia, an actress, follow their passion and achieve success in their respective fields, they find themselves torn between their love for each other and their careers.', 16, 6, 128),
(7, 'Kung Fu Panda', 'Kungfupanda.jpg', 'When Po the Panda, a kung fu enthusiast, gets selected as the Dragon Warrior, he decides to team up with the Furious Five and destroy the evil forces that threaten the Valley of Peace.', 14, 4, 92),
(8, 'Kung Fu Panda 2', 'Kungfupanda2.jpg', 'Dragon Warrior Po takes it upon himself to foil the plans of murderous peacock Shen who intends to conquer China and destroy kung fu. For this, Po has to unveil the mystery of his own past.', 15, 4, 95),
(9, 'Kung Fu Panda 3', 'Kungfupanda3.jpg', 'The Dragon Warrior, Po, has to deal with challenges galore when circumstances compel him to train a bunch of awkward pandas in martial arts so that they can trounce Kai, a wicked supernatural warrior.', 16, 4, 95),
(10, 'Kung Fu Panda 4', 'Kungfupanda4.jpg', 'Po must train a new warrior when he\'s chosen to become the spiritual leader of the Valley of Peace. However, when a powerful shape-shifting sorceress sets her eyes on his Staff of Wisdom, he suddenly realizes he\'s going to need some help. Teaming up with a quick-witted corsac fox, Po discovers that heroes can be found in the most unexpected places.', 12, 4, 94),
(11, 'Scott Pilgrim vs. the World', 'scott.jpg', 'Scott Pilgrim meets Ramona and instantly falls in love with her. But when he meets one of her exes at a band competition, he realises that he has to deal with all seven of her exes to woo her.', 13, 4, 112),
(12, 'Shaolin Soccer', 'shaolin.jpg', 'A Shaolin follower assembles his five childhood friends so that they can use their martial arts skills to play football and thereby popularize Shaolin kung fu.', 15, 4, 113),
(13, 'Journey to the West: Conquering the Demons', 'wukong.jpg', 'Tang Sanzang, a demon hunter who refuses to fight monsters with violence, travels to a Buddha shrine to seek the aid of a Monkey King and be able to defeat a pig demon on the loose.', 15, 5, 110),
(14, 'The Spiderwick Chronicles', 'spiderwick.jpg', 'Twin brothers Jared and Simon Grace move into Spiderwick Estate with their mother and sister. Once there, they find themselves surrounded by magical creatures.', 14, 5, 96),
(15, 'Blade Runner 2049', 'bladerunner.jpg', 'K, an officer with the Los Angeles Police Department, unearths a secret that could create chaos. He goes in search of a former blade runner who has been missing for over three decades.', 16, 1, 163),
(16, 'Parasite', 'parasite.jpg', 'The struggling Kim family sees an opportunity when the son starts working for the wealthy Park family. Soon, all of them find a way to work within the same household and start living a parasitic life.', 13, 7, 131),
(17, 'Spirited Away', 'spirited.jpg', 'Ten-year-old Chihiro and her parents end up at an abandoned amusement park inhabited by supernatural beings. Soon, she learns that she must work to free her parents who have been turned into pigs.', 16, 5, 125),
(18, 'Cloverfield', 'cloverfield.jpg', 'After a giant monster attacks New York City, Rob, Hud, Lily and Marlena form a group and desperately try to rescue their friend Beth who is trapped in her apartment.', 15, 3, 85),
(19, 'Problemista', 'problemista.jpeg', 'Alejandro is an aspiring toy designer whos struggling to bring his unusual ideas to life in New York City. As time on his work visa runs out, a job assisting an art world outcast becomes his only hope to stay in the country and realise his dream.\r\n', 15, 4, 104),
(20, 'The Wild Robot', 'wildrobot.jpg', 'After a shipwreck, an intelligent robot is stranded on an uninhabited island. To survive the harsh surroundings, she bonds with the native animals and cares for an orphaned baby goose.', 15, 8, 102),
(21, 'Bullet Train', 'bullettrain.jpeg', 'Ladybug, a professional assassin, is assigned to retrieve a briefcase from a bullet train. Soon, he finds himself battling many other killers who board the same train but with a different objective.', 16, 2, 126),
(22, 'Jojo Rabbit ', 'jojo.jpg', 'Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. However, his foundations are shaken when he finds a Jewish girl in his house.', 13, 4, 108),
(23, 'KPop Demon Hunters\r\n', 'kpop.jpeg', 'A world-renowned K-Pop girl group balance their lives in the spotlight with their secret identities as demon hunters.', 16, 2, 95),
(24, 'Howls Moving Castle', 'howl.jpg', 'Jealous of Sophies closeness to Howl, a wizard, the Witch of Waste transforms her into an old lady. Sophie must find a way to break the spell with the help of Howls friends, Calcifer and Markl.', 16, 5, 119),
(25, 'Princess Mononoke', 'mononoke.jpg', 'While saving his village, Ashitaka, a heroic warrior, is befallen with a curse. To lift the curse, Ashitaka embarks on a perilous journey and gets involved in the conflict of two warring clans.', 16, 5, 133),
(26, 'Fantastic Mr.Fox', 'mrfox.jpg', 'Mr Fox, a family man, goes back to his ways of stealing, unable to resist his animal instincts. However, he finds himself trapped when three farmers decide to kill him and his kind.', 16, 8, 86),
(27, 'Pearl', 'pearl.jpg', 'Trapped on an isolated farm, Pearl must tend to her ailing father under the watch of her mother. Lusting for the glamorous life she\'s seen in movies, Pearl\'s temptations and repressions collide.', 13, 3, 102),
(28, 'Arrival', 'arrival.jpg', 'Louise Banks, a linguistics expert, along with her team, must interpret the language of aliens who have come to Earth in a mysterious spaceship.', 15, 1, 116),
(29, 'Drive', 'drive.jpg', 'A stuntman and getaway driver falls in love with Irene who is married to a criminal. In a bid to protect her from her husband and some gangsters, he decides to cross over to the other side of the law.', 14, 2, 100),
(30, 'The Green Knight', 'greenknight.jpeg', 'Sir Gawain, King Arthur\'s young nephew, embarks on an adventurous journey and deals with ghosts, thieves and giants as he sets out to defeat Green Knight, a giant, after accepting his challenge.', 15, 5, 125),
(31, 'The Substance', 'substance.jpg', 'Fading actress Elisabeth Sparkle becomes distressed when her chauvinistic boss fires her from her aerobics show. She soon injects herself with a mysterious serum that promises a younger, better version of herself, but things go horribly wrong.', 14, 3, 140),
(32, 'Guardians of the Galaxy', 'gotg.jpg', 'A bunch of skilled criminals led by brash adventurer Peter Quill join hands to fight a villain named Ronan the Accuser who wants to control the universe with the help of a mystical orb.', 16, 1, 122),
(33, 'Guardians of the Galaxy Vol. 2\r\n', 'gotg2.jpg', 'After a successful mission, Peter Quill and his team of galactic defenders meet Ego, a celestial being claiming to be Peter\'s father. However, they discover disturbing facts as they unravel the truth.', 16, 1, 137),
(34, 'Guardians of the Galaxy Vol. 3', 'gotg3.jpg', 'Still reeling from the loss of Gamora, Peter Quill must rally his team to defend the universe and protect one of their own. If the mission is not completely successful, it could possibly lead to the end of the Guardians as we know them.\r\n', 16, 1, 149),
(35, 'Now You See Me\r\n', 'nysm.jpg', 'The Horsemen, a group of four street magicians, are chased by FBI agent Dylan Rhodes and Interpol agent Alma Dray after they rob a huge sum of money that belongs to insurance magnate Arthur Tressler.', 16, 7, 115),
(36, 'Now You See Me 2', 'nysm2.jpg', 'The Four Horsemen, a group of illusionists, find themselves in Macau, China, planning to pull off a robbery on the orders of a devious technology genius.', 16, 7, 129),
(42, 'severance', 'severance.jpg', '123', 12, 1, 12),
(43, '28yearslater', '28yearslater.jpg', '23', 232, 1, 23),
(44, 'Borat', 'borat.jpg', 'Borat, a Kazakh resident, travels to the USA to make a documentary on the country. While on his mission, he learns that the USA is the same as his own country in many ways.', 16, 4, 84),
(45, 'zoolander.jpg', 'Zoolander', 'Derek, a model, loses hope when his rival wins a coveted title. In a bid to revive his career, a designer offers him a runway show but ends up convincing him to kill the prime minister of Malaysia.', 16, 5, 89),
(46, 'Zoolander 2', 'zoolander2.jpg', 'After being in isolation for years, Derek and Hansel find themselves recruited by Interpol to unearth the mystery behind the assassinations of prominent celebrities from all over the world.', 16, 5, 102),
(47, '50 shades of grey', '50.jpg', 'Ana, a college student, interviews an enigmatic billionaire entrepreneur, Christian, for her campus periodical. A steamy sadomasochistic affair starts between the two, whose roots lie in his past.', 10, 6, 125),
(48, 'Vettaiyan', 'indian.jpg', 'The rape and murder of a teacher leads Athiyan, a policeman known for encounter killing, to unknowingly murder an innocent man. Soon, a guilty Athiyan sets out to reinvestigate her case.', 16, 2, 163);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketID` int NOT NULL AUTO_INCREMENT,
  `movieFK` varchar(4) NOT NULL,
  `movieTitle` varchar(255) NOT NULL,
  `ticketPrice` float NOT NULL,
  `userFK` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `movieDate` date NOT NULL,
  `picFilename` varchar(255) NOT NULL,
  `bookingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticketID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `userID` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userID`, `email`, `password`, `mobile`) VALUES
(1, 'garian', 'garianchung@gmail.com', '12345678', '90922171'),
(2, 'paul', 'paul@gmail.com', '12345678', '90922171'),
(3, 'admin', 'admin2@gmail.com', 'admin123', '90922172'),
(4, 'test', 'test@gmail.com', 'test1234', '90922171');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
