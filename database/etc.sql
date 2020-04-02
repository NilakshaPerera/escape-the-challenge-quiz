-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 12:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etc`
--

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE `errors` (
  `id` int(22) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `line` varchar(200) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `trace` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `mcq` varchar(1000) DEFAULT NULL,
  `puzzle` varchar(1000) DEFAULT NULL,
  `presentation` varchar(1000) NOT NULL,
  `started` datetime NOT NULL,
  `ended` datetime DEFAULT NULL,
  `mcq_score` int(11) DEFAULT NULL,
  `puzzle_score` int(11) DEFAULT NULL,
  `presentation_score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Body` longtext DEFAULT NULL,
  `clues` text NOT NULL,
  `file` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `name`, `Body`, `clues`, `file`, `created_at`, `updated_at`) VALUES
(25, 'Tourism', NULL, '{\"1\":\"Tourism is an important, even vital, source of income for our country. It brings in large amounts of income into a local economy in the form of payment for goods and services needed by tourists.\",\"2\":\"Develop 5 power point slides with 5 ideas including your thoughts as to how the country can attract more tourists.\"}', 'uploads/videos/1570612408-V_1.mp4', '2019-10-09 14:43:28', '2019-10-09 14:43:28'),
(26, 'Urbanization', NULL, '{\"1\":\"Urbanization refers to the population shift from rural areas to urban areas, the gradual increase in the proportion of people living in urban areas, and the ways in which each society adapts to this change\",\"2\":\"Develop 5 power point slides with 5 ideas including your thoughts as to how the country can benefit from urnanization\"}', 'uploads/videos/1570612906-V_2.mp4', '2019-10-09 14:51:46', '2019-10-09 14:51:46'),
(27, 'Waste Management', NULL, '{\"1\":\"Sri Lanka is facing a serious environmental crisis and residents face a huge health risk as tons of waste and garbage continue to accumulate to mountainous proportions. Meanwhile, officials are blaming one another for the garbage crisis.\",\"2\":\"Develop 5 power point slides with 5 solutions for this  environmental crisis.\"}', 'uploads/videos/1570613116-V_3.mp4', '2019-10-09 14:55:16', '2019-10-09 14:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `puzzles`
--

CREATE TABLE `puzzles` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `clues_a` varchar(5000) NOT NULL,
  `clues_d` varchar(5000) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puzzles`
--

INSERT INTO `puzzles` (`id`, `name`, `clues_a`, `clues_d`, `file`, `created_at`, `updated_at`) VALUES
(7, 'Puzzle 1', '{\"1\":\"4. Grand-master title is associated with which game ?\",\"2\":\"6. The first city on which the atomic bomb was dropped\",\"3\":\"7. Mayors of four major cities including Paris, Mexico City, Madrid move to ban diesel vehicles by 2025. What is the other City?\",\"4\":\"9. By what name is the parliament in Japan known?\"}', '{\"1\":\"1. which planet is also known as the Red planet\",\"2\":\"2. Which group of animals is Charles Darwin best known for studying?\",\"3\":\"3. India\\u2019s first-ever national police museum was established in which city?\",\"4\":\"4. Who won the Runners-up title of FIFA Football World Cup 2018?\",\"5\":\"5. Which country will host the 45th G7 summit 2019?\",\"6\":\"8. Who has won the men\\u2019s singles French Open tennis tournament 2018?\"}', 'uploads/puzzles/1570610521-crossword-oCsXsNps1J 1 new.pdf', '2019-10-09 14:12:01', '2019-10-09 14:12:01'),
(8, 'Puzzle 2', '{\"1\":\"2. The Great Pyramid of Giza was built for which Egyptian ruler?\",\"2\":\"4. The first person to sail round the world\",\"3\":\"6. Who is the scientist who first announced that there are bills and craters on the moon ?\",\"4\":\"7. What is the smallest country in the world?\",\"5\":\"8. Who becomes youngest ever Nobel Prize Winner?\"}', '{\"1\":\"1. Which is the longest river in the world?\",\"2\":\"2. Joe Root is associated with which game?\",\"3\":\"3. The most populous city in the world is\",\"4\":\"5. Computers calculate numbers in what mode?\",\"5\":\"9. What is the largest internal organ in the human body?\"}', 'uploads/puzzles/1570611086-crossword-ieM_DktwTG 2 new.pdf', '2019-10-09 14:21:26', '2019-10-09 14:21:26'),
(9, 'Puzzle 3', '{\"1\":\"1. Which country hosted Cricket World Cup 2019\",\"2\":\"5. The country that declared the year 2013 as National Year of Rice?\",\"3\":\"6. By what name is North Rhodesia now known?\",\"4\":\"8. Which country\\u2019s women cricket team has clinched the Asia Cup Twenty-20 tournament 2018?\",\"5\":\"9. Name a bird without wings\"}', '{\"1\":\"2. Thermometer was invented by?\",\"2\":\"3. One of the countries in the world to have a square flag\",\"3\":\"4. The first country to win the Football World Cup\",\"4\":\"5. The term \\u201c God Particle\\u201d belongs to which discipline?\",\"5\":\"7. Thomas Cup\' is related to which game?\"}', 'uploads/puzzles/1570611360-crossword-gOnrOEiTOH 3 new.pdf', '2019-10-09 14:26:00', '2019-10-09 14:26:00'),
(10, 'Puzzle 4', '{\"1\":\"1. Which one of the following countries was the winner of FIFA confederations cup 2017 ?\",\"2\":\"3. Who was known as the Iron Chancellor?\",\"3\":\"5. The first country to print book\",\"4\":\"6. The first country to host the modern Olympics\",\"5\":\"8. What is the largest country in the world in terms of land area?\",\"6\":\"10. What is the word for a person with very pale skin and eyes?\"}', '{\"1\":\"2. Which nation has won the highest number of Nobel Prizes?\",\"2\":\"4. One of the countries in the world to have a square flag\",\"3\":\"7. Which country in the world has maximum number of robots working?\",\"4\":\"9. Mahatma Gandhi qualified in England for which profession before practising in South Africa?\"}', 'uploads/puzzles/1570611606-crossword-UzWLbOvOpq 4 new.pdf', '2019-10-09 14:30:06', '2019-10-09 14:30:06'),
(11, 'Puzzle 5', '{\"1\":\"1. Where were wigs first invented?\",\"2\":\"4. What is the city where the headquarters of the Reuter News Agency is situated\",\"3\":\"5. The first religion of the world\",\"4\":\"7. The first person to sail round the world\",\"5\":\"9. Where is the country of Egypt?\",\"6\":\"10. which planet is also known as the Red planet\"}', '{\"1\":\"2. In science, what is the name for the classification of plants and animals?\",\"2\":\"3. Which country has the world\'s highest waterfall?\",\"3\":\"6. The multiple Olympic-medal winning runner Usain Bolt was born in\",\"4\":\"8. Industrial Revolution was started from which country\"}', 'uploads/puzzles/1570611906-crossword-ubolRUMo4C 5.pdf', '2019-10-09 14:35:06', '2019-10-09 14:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `question` longtext NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `answers` varchar(5000) NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `question`, `type`, `answers`, `answer`, `created_at`, `updated_at`) VALUES
(21, 'Name the Institute known by the acronym ‘ NAITA’?', '<p>Name the Institute known by the acronym ‘ NAITA’?<br></p>', NULL, '{\"1\":\"National Apparel and Institute Training Area\",\"2\":\"National Apprentice and Industrial Training Authority\",\"3\":\"New Authority for the Industrial Teaching Arena\",\"4\":\"New Apprentice and Institutional Training Authority\"}', 2, '2019-10-09 17:44:28', '2019-10-09 17:44:28'),
(22, 'What is the Institute that develops the National Consumer Price Index?', '<p>What is the Institute that develops the National Consumer Price Index?<br></p>', NULL, '{\"1\":\"Department of Census and Statistics\",\"2\":\"Department of National Archives\",\"3\":\"Department of Consumer Affairs\",\"4\":\"Department of Technology and Research\"}', 1, '2019-10-09 17:46:48', '2019-10-09 17:46:48'),
(23, 'How many licensed commercial banks were in operation in Sri Lanka by the beginning of year 2017?', '<p>How many licensed commercial banks were in operation in Sri Lanka by the beginning of year 2017?&nbsp;<br></p>', NULL, '{\"1\":\"26\",\"2\":\"22\",\"3\":\"23\",\"4\":\"25\"}', 4, '2019-10-09 17:48:46', '2019-10-09 17:48:46'),
(24, 'What is the policy related to the government income and expenditures called?', '<p>What is the policy related to the government income and expenditures called?<br></p>', NULL, '{\"1\":\"Monetary Policy\",\"2\":\"Supply Side Policy\",\"3\":\"Fiscal Policy\",\"4\":\"Income Policy\"}', 3, '2019-10-09 17:52:44', '2019-10-09 17:52:44'),
(25, 'What is the document that contains the purpose of the company as well as the duties and responsibilities of its members defined and recorded clearly?', '<p>What is the document that contains the purpose of the company as well as the duties and responsibilities of its members defined and recorded clearly?<br></p>', NULL, '{\"1\":\"Memorandum of Association\",\"2\":\"Articles of Association\",\"3\":\"Company Register\",\"4\":\"Memorandum of Understanding\"}', 2, '2019-10-09 17:54:27', '2019-10-09 17:54:27'),
(26, 'What is the specific name called for the goods whose quantity demanded decreases when consumer income rises or quantity demanded rises when consumer income decreases?', '<p>What is the specific name called for the goods whose quantity demanded decreases when consumer income rises or quantity demanded rises when consumer income decreases?<br></p>', NULL, '{\"1\":\"Superior Goods\",\"2\":\"Normal Goods\",\"3\":\"Luxury Goods\",\"4\":\"Inferior Goods\"}', 4, '2019-10-09 17:58:23', '2019-10-09 17:58:23'),
(27, 'What is the trade barrier imposed to restrict  imports or exports called?', '<p>What is the trade barrier imposed to restrict&nbsp; imports or exports called?<br></p>', NULL, '{\"1\":\"Quotas\",\"2\":\"Tariffs\",\"3\":\"Embargoes\",\"4\":\"Subsidies\"}', 1, '2019-10-09 17:59:41', '2019-10-09 17:59:41'),
(28, 'What is the market structure that beauty salons, retail shops, service stations, record bars and studios operate in called?', '<p>What is the market structure that beauty salons, retail shops, service stations, record bars and studios operate in called?<br></p>', NULL, '{\"1\":\"Perfect Competition\",\"2\":\"Monopolistic Competition\",\"3\":\"Monopsony Competiton\",\"4\":\"Oligopoly Competition\"}', 2, '2019-10-09 18:01:15', '2019-10-09 18:01:15'),
(29, 'Short run total cost curve always begins with a positive intercept in the Y axis .What is denoted by this positive intercept?', '<p>Short run total cost curve always begins with a positive intercept in the Y axis</p><p>.What is denoted by this positive intercept?</p>', NULL, '{\"1\":\"Total Variable Cost\",\"2\":\"Total fixed cost\",\"3\":\"Stepped Fixed Cost\",\"4\":\"Total Cost\"}', 2, '2019-10-10 09:58:18', '2019-10-10 09:58:18'),
(30, 'Where do you find Government savings, if any, in government budget?', '<p class=\"MsoListParagraph\" style=\"text-indent:-.25in;mso-list:l0 level1 lfo1\">&nbsp; &nbsp; &nbsp; &nbsp; Where do you find Government savings, if any, in government budget?<br></p><p class=\"MsoListParagraph\" style=\"text-indent:-.25in;mso-list:l0 level1 lfo1\"><span style=\"font-size: 12pt; line-height: 115%; font-family: Georgia, serif; color: red; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"text-indent:-.25in;mso-list:l0 level1 lfo1\"><span style=\"font-size: 12pt; line-height: 115%; font-family: Georgia, serif; color: red; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><o:p></o:p></span></p>', NULL, '{\"1\":\"In the current account balance\",\"2\":\"In the Capital Account balance\",\"3\":\"Balance of Payment Accounts\",\"4\":\"In the Savings Account\"}', 1, '2019-10-10 10:07:32', '2019-10-10 10:07:32'),
(31, 'Who is the authorized body to issue licenses to micro finance companies in Sri Lanka?', '<p>Who is the authorized body to issue licenses to micro finance companies in Sri</p><p>Lanka?</p>', NULL, '{\"1\":\"Microfinance in Sri Lanka\",\"2\":\"International Monetary Fund\",\"3\":\"World Bank of Sri Lanka\",\"4\":\"Central Bank of Sri Lanka\"}', 4, '2019-10-10 10:11:45', '2019-10-10 10:11:45'),
(32, 'What is the institute that operates the interbank payment system?', '<p>What is the institute that operates the interbank payment system?<br></p>', NULL, '{\"1\":\"Real Time Gross Settlement Systems\",\"2\":\"Lanka Clear (Pvt) Ltd\",\"3\":\"Common Electronic Fund Transfer Switch\",\"4\":\"Lanka Interbank (Pvt) Ltd\"}', 2, '2019-10-10 10:13:29', '2019-10-10 10:13:29'),
(33, 'What is the authorized body to supervise and regulate the financial service providers in Sri Lanka?', '<p>What is the authorized body to supervise and regulate the financial service</p><p>providers in Sri Lanka?</p>', NULL, '{\"1\":\"International Monetary Fund\",\"2\":\"Sri Lanka Regulatory Body\",\"3\":\"Central Bank of Sri Lanka\",\"4\":\"Sri Lanka Regulatory and Financial Body\"}', 3, '2019-10-10 10:15:29', '2019-10-10 10:15:29'),
(34, 'Who is the authorized body to issue a Certificate of Incorporation?', '<p>Who is the authorized body to issue a Certificate of Incorporation?<br></p>', NULL, '{\"1\":\"Registrar of Companies\",\"2\":\"Register of Incorporation\",\"3\":\"Register of Financial Services\",\"4\":\"Certification Authority for Incorporation\"}', 1, '2019-10-10 10:18:36', '2019-10-10 10:18:36'),
(35, 'What is the term used for a price that is used for illegal buying and selling purposes above the price fixed by a government?', '<p>What is the term used for a price that is used for illegal buying and selling purposes above the price fixed by a government?</p>', NULL, '{\"1\":\"White Market Price\",\"2\":\"Dark Market Price\",\"3\":\"Illegal Market price\",\"4\":\"Black market price\"}', 4, '2019-10-10 10:20:36', '2019-10-10 10:20:36'),
(36, 'What type of monopoly that exists as a result of the high fixed costs or startup cost of operating a business in a specific industry?', '<p>What type of monopoly that exists as a result of the high fixed costs or startup cost of operating a business in a specific industry?</p>', NULL, '{\"1\":\"Public Monopoly\",\"2\":\"Natural monopoly\",\"3\":\"Absolute Monopoly\",\"4\":\"Imperfect Monopoly\"}', 2, '2019-10-10 10:23:56', '2019-10-10 10:23:56'),
(37, 'Who defined economics as a science which studies human behavior as a relationship between ends and scare means which have alternative uses?', '<p>Who defined economics as a science which studies human behavior as a relationship between ends and scare means which have alternative uses?</p>', NULL, '{\"1\":\"Adam Smith\",\"2\":\"Milton Friedman\",\"3\":\"Lionel Robbins\",\"4\":\"Karl Marx\"}', 3, '2019-10-10 10:26:12', '2019-10-10 10:26:12'),
(38, 'How do you refer to the relationship between the output and input?', '<p>How do you refer to the relationship between the output and input?<br></p>', NULL, '{\"1\":\"Productivity\",\"2\":\"Efficiency\",\"3\":\"Effectiveness\",\"4\":\"Standardization\"}', 1, '2019-10-10 10:28:03', '2019-10-10 10:28:03'),
(39, 'What is the economic term used for high concentration on a product or task?', '<p>What is the economic term used for high concentration on a product or task?</p>', NULL, '{\"1\":\"Economies of Scale\",\"2\":\"Productivity\",\"3\":\"Division of Labour\",\"4\":\"Specialization\"}', 4, '2019-10-10 10:30:15', '2019-10-10 10:30:15'),
(40, 'Name the account known by the acronym ‘ RNNFC’?', '<p>Name the account known by the acronym ‘ RNNFC’?<br></p>', NULL, '{\"1\":\"Regional Non National Foreign Current Accounts\",\"2\":\"Resident Non National Foreign Capital Accounts\",\"3\":\"Resident Non National Foreign Currency Accounts\",\"4\":\"Regional Non National Foreign Currency Accounts\"}', 3, '2019-10-10 10:32:44', '2019-10-10 10:32:44'),
(41, 'What is known by the acronym ‘ SWIFT’?', '<p>What is known by the acronym ‘ SWIFT’?<br></p>', NULL, '{\"1\":\"Society for Worldwide Interbank Financial Telecommunication\",\"2\":\"Society for World Internet Financial Telecommunication\",\"3\":\"Society for World Interbank Financial Technology\",\"4\":\"Society for World Internal Financial Transportation\"}', 1, '2019-10-10 10:34:27', '2019-10-10 10:34:27'),
(42, 'What type of money does Commercial Papers come under?', '<p>What type of money does Commercial Papers come under?<br></p>', NULL, '{\"1\":\"Commodity Money\",\"2\":\"Near Money\",\"3\":\"Representative Money\",\"4\":\"Fiat Money\"}', 2, '2019-10-10 10:37:02', '2019-10-10 10:37:02'),
(43, 'How is a good which has an opportunity cost called?', '<p>How is a good which has an opportunity cost called?<br></p>', NULL, '{\"1\":\"Normal Good\",\"2\":\"Luxury Good\",\"3\":\"Inferiority Good\",\"4\":\"Economic Good\"}', 4, '2019-10-10 10:40:40', '2019-10-10 10:40:40'),
(44, 'What are the two micro variables trade-off depicted by the Phillips curve?', '<p>What are the two micro variables trade-off depicted by the Phillips curve?<br></p>', NULL, '{\"1\":\"Exchange Rate and Unemployment\",\"2\":\"Inflation and Economic Performance\",\"3\":\"Inflation and unemployment\",\"4\":\"Exchange Rate and Interest Rate\"}', 3, '2019-10-10 10:42:50', '2019-10-10 10:42:50'),
(45, 'According to the Human Development Report 2015, what is the value of Human Development Index of Sri Lanka?', '<p>According to the Human Development Report 2015, what is the value of Human Development Index of Sri Lanka?</p>', NULL, '{\"1\":\"0.765\",\"2\":\"0.766\",\"3\":\"0.600\",\"4\":\"0.721\"}', 2, '2019-10-10 10:44:53', '2019-10-10 10:44:53'),
(46, 'According to World Bank country classification, what is the minimum GNP per capita required for a country to be classified as a middle income country?', '<p>According to World Bank country classification, what is the minimum GNP per capital required for a country to be classified as a middle income country?</p>', NULL, '{\"1\":\"$1250\",\"2\":\"$971\",\"3\":\"$1000\",\"4\":\"$1,026\"}', 4, '2019-10-10 10:46:52', '2019-10-10 10:46:52'),
(47, 'What is the name given to the tax introduced with the purpose of discouraging consumption?', '<p>What is the name given to the tax introduced with the purpose of discouraging consumption?</p>', NULL, '{\"1\":\"Progressive Taxes\",\"2\":\"Proportional Taxes\",\"3\":\"Regressive Taxes\",\"4\":\"Capital Gains Taxes\"}', 3, '2019-10-10 10:48:29', '2019-10-10 10:48:29'),
(48, 'Name the world consumer rights day.', '<p>Name the world consumer rights day.<br></p>', NULL, '{\"1\":\"20 th of March\",\"2\":\"15 th of March\",\"3\":\"25 th of May\",\"4\":\"10 th of April\"}', 2, '2019-10-10 10:50:06', '2019-10-10 10:50:06'),
(49, 'What is the ministry that the Consumer Affairs Authority comes under?', '<p>What is the ministry that the Consumer Affairs Authority comes under?<br></p>', NULL, '{\"1\":\"Ministry of Labour and Trade Union Relations\",\"2\":\"Ministry of Agriculture\",\"3\":\"Ministry of Health\",\"4\":\"Ministry of Industry and Trade\"}', 4, '2019-10-10 10:52:06', '2019-10-10 10:52:06'),
(50, 'What are the two types of Bank Overdrafts?', '<p>What are the two types of Bank Overdrafts?<br></p>', NULL, '{\"1\":\"Permanent overdraft and Variable Overdraft\",\"2\":\"Temporary overdraft and Fixed overdraft\",\"3\":\"Organic overdraft and Natural Overdraft\"}', 2, '2019-10-10 10:54:01', '2019-10-10 10:54:01'),
(51, 'What are the two types of crossings to a cheque?', '<p>What are the two types of crossings to a cheque?<br></p>', NULL, '{\"1\":\"General Crossing and Special Crossing\",\"2\":\"Identical Crossing and Non Identical Crossing\",\"3\":\"Direct Crossing and Indirect Crossing\"}', 1, '2019-10-10 10:58:05', '2019-10-10 10:58:05'),
(52, 'What is the current Value added tax (VAT) rate in Sri Lanka?', '<p>What is the current Value added tax (VAT) rate in Sri Lanka?<br></p>', NULL, '{\"1\":\"15%\",\"2\":\"20%\",\"3\":\"12%\",\"4\":\"3%\"}', 1, '2019-10-10 11:00:05', '2019-10-10 11:00:05'),
(53, 'What is the latest rank (2015) at which Sri Lanka stands in Human Development Index', '<p>What is the latest rank (2015) at which Sri Lanka stands in Human Development Index</p>', NULL, '{\"1\":\"65\",\"2\":\"12\",\"3\":\"73\",\"4\":\"97\"}', 3, '2019-10-10 11:01:56', '2019-10-10 11:01:56'),
(54, 'What are the five foreign currencies used in calculating real effective exchange rate?', '<p>What are the five foreign currencies used in calculating real effective exchange rate?</p>', NULL, '{\"1\":\"Saudi Riyal , Swidish Kroner, Singapore Dollar, Omanian Riyal, Chinese Renminibi\",\"2\":\"Australian Dollar, Bahrain Dinar, Kuwaiti Dinar, Swiss Franc, UAE Dirams\",\"3\":\"Euro, Indian Rupee, Yen, Sterling Pound, USD\"}', 3, '2019-10-10 11:09:49', '2019-10-10 11:09:49'),
(55, 'What is the dollar value of Global poverty line currently accepted by World Bank?', '<p>What is the dollar value of Global poverty line currently accepted by World Bank?<br></p>', NULL, '{\"1\":\"2.0 $ per day\",\"2\":\"1.9 $ per a day\",\"3\":\"4 $ per day\",\"4\":\"0.5 $ per day\"}', 2, '2019-10-10 11:11:18', '2019-10-10 11:11:18'),
(56, 'What are three dimensions of sustainable development?', '<p>What are three dimensions of sustainable development?<br></p>', NULL, '{\"1\":\"Urbanization, Wealth Control and Economic Stability\",\"2\":\"Inflation, Unemployment and Exchange Rate\",\"3\":\"Economic, Social and Environmental\"}', 4, '2019-10-10 11:14:15', '2019-10-10 11:14:15'),
(57, 'What is the document that outlines in detail the rights and responsibilities of all parties to a partnership?', '<p>What is the document that outlines in detail the rights and responsibilities of all parties to a partnership?</p>', NULL, '{\"1\":\"Job Description\",\"2\":\"Appointment Letter\",\"3\":\"Health and Safety Manual\",\"4\":\"Partnership Agreement \\/ Partnership Deed\"}', 4, '2019-10-10 11:16:10', '2019-10-10 11:16:10'),
(58, 'What are the numbers explained on the MICR line of a cheque?', '<p>What are the numbers explained on the MICR line of a cheque?<br></p>', NULL, '{\"1\":\"Bank Code and Bank branch code\",\"2\":\"Cheque Number\",\"3\":\"Account Number\"}', 2, '2019-10-10 11:17:39', '2019-10-10 11:17:39'),
(59, 'Name the organizational body that is responsible for developing, supervising and regulating the insurance industry of Sri Lanka?', '<p>Name the organizational body that is responsible for developing, supervising and regulating the insurance industry of Sri Lanka?</p>', NULL, '{\"1\":\"Industry Board of Sri Lanka\",\"2\":\"Ministry of Trade and Industry\",\"3\":\"Insurance Board of Sri Lanka\"}', 3, '2019-10-10 11:19:30', '2019-10-10 11:19:30'),
(60, 'What does the process of creating large amounts of money that had been obtained from serious crimes, such as drug trafficking or terrorist activity, originated from a legitimate source, appear clean?', '<p>What does the process of creating large amounts of money that had been obtained from serious crimes, such as drug trafficking or terrorist activity, originated from a legitimate source, appear clean?</p>', NULL, '{\"1\":\"Money laundering\",\"2\":\"Tax Evasion\",\"3\":\"Virtual Money\"}', 1, '2019-10-10 11:20:56', '2019-10-10 11:20:56'),
(61, 'Who wrote “An Inquiry in to the Nature and Causes of the Wealth of Nations”', '<p>Who wrote “An Inquiry in to the Nature and Causes of the Wealth of Nations”<br></p>', NULL, '{\"1\":\"Carl Marx\",\"2\":\"Bill Gates\",\"3\":\"Charles Darwin\",\"4\":\"Adam Smith\"}', 4, '2019-10-10 11:22:43', '2019-10-10 11:22:43'),
(62, 'When the most influential book The Wealth of Nations was published?', '<p>When the most influential book The Wealth of Nations was published?<br></p>', NULL, '{\"1\":\"1852\",\"2\":\"1760\",\"3\":\"1776\",\"4\":\"1972\"}', 3, '2019-10-10 11:24:45', '2019-10-10 11:24:45'),
(63, 'Who introduced the concept of merit goods?', '<p>Who introduced the concept of merit goods?<br></p>', NULL, '{\"1\":\"Richard Musgrave\",\"2\":\"John Keynes\",\"3\":\"Steven Smith\",\"4\":\"Adam Smith\"}', 1, '2019-10-10 11:26:04', '2019-10-10 11:26:04'),
(64, 'Where was the annual World Economic Forum held in 2017?', '<p>Where was the annual World Economic Forum held in 2017?<br></p>', NULL, '{\"1\":\"United Kingdon \\u2013 London\",\"2\":\"Switzerland- Davos\",\"3\":\"USA \\u2013 Washington\",\"4\":\"South Korea - Seoul\"}', 2, '2019-10-10 11:27:35', '2019-10-10 11:27:35'),
(65, 'What is the name given to normal shares that are entitled for special administrative powers?', '<p>What is the name given to normal shares that are entitled for special administrative powers?</p>', NULL, '{\"1\":\"Bronze Shares\",\"2\":\"Silver Shares\",\"3\":\"Platinum Shares\",\"4\":\"Golden shares\"}', 4, '2019-10-10 11:29:32', '2019-10-10 11:29:32'),
(66, 'If a partner becomes insane what methodology should be used to dissolve the partnership', '<p>If a partner becomes insane what methodology should be used to dissolve the partnership</p>', NULL, '{\"1\":\"Through a court order\",\"2\":\"Through the partnership\",\"3\":\"Through an agent\"}', 1, '2019-10-10 11:30:53', '2019-10-10 11:30:53'),
(67, 'Name the international body that provides financial assistance to a SUWANA / SMILE loan scheme?', '<p>Name the international body that provides financial assistance to a SUWANA / SMILE loan scheme?</p>', NULL, '{\"1\":\"National Bank of China\",\"2\":\"Central Bank of Russian Federation\",\"3\":\"Japan Bank for International Cooperation \\u2013 JBIC\",\"4\":\"National Bank of the Republic Belarus\"}', 3, '2019-10-10 11:32:25', '2019-10-10 11:32:25'),
(68, 'What are the sub categories of home trade?', '<p>What are the sub categories of home trade?<br></p>', NULL, '{\"1\":\"Retail \\/ Wholesale\",\"2\":\"Batch\",\"3\":\"Centralized\"}', 1, '2019-10-10 11:33:35', '2019-10-10 11:33:35'),
(69, 'When the Central Bank of Sri Lanka set up?', '<p>When the Central Bank of Sri Lanka set up?<br></p>', NULL, '{\"1\":\"1947\",\"2\":\"1950\",\"3\":\"1953\",\"4\":\"1940\"}', 2, '2019-10-10 11:35:01', '2019-10-10 11:35:01'),
(70, 'Who was the first Sri Lankan governor of Central Bank of Sri Lanka?', '<p>Who was the first Sri Lankan governor of Central Bank of Sri Lanka?<br></p>', NULL, '{\"1\":\"Mr. N U Jayawardena\",\"2\":\"Mr. Indrajith Coomaraswamy\",\"3\":\"Mr H. Neville Karunathilake\",\"4\":\"Mr. Sunil Mendis\"}', 1, '2019-10-10 11:36:20', '2019-10-10 11:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `tasks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `weight`, `tasks`) VALUES
(1, 'Administrator', 0, NULL),
(2, 'Student', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(500) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `data` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `display_name`, `data`, `created_at`, `updated_at`) VALUES
(1, 'mcq_count', 'MCQs count', '10', '2019-10-10 09:21:48', '2019-10-10 18:51:48'),
(2, 'mcq_answer_count', 'MCQ answer count', '4', '2019-10-10 09:21:48', '2019-10-10 18:51:48'),
(3, 'mcq_time', 'MCQ Duration', '1200', '2019-10-10 09:21:48', '2019-10-10 18:51:48'),
(4, 'puzzle_clue_count', 'Puzzle clues count', '20', '2019-10-10 09:21:48', '2019-10-10 18:51:48'),
(5, 'puzzle_time', 'Puzzle duration', '1200', '2019-10-10 09:21:48', '2019-10-10 18:51:48'),
(8, 'presentation_time', 'Presentation duration', '2400', '2019-10-10 09:21:48', '2019-10-10 18:51:48'),
(9, 'presentation_clue_count', 'Presentation clues count', '10', '2019-10-10 09:21:48', '2019-10-10 18:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `data` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `data`, `created_at`, `updated_at`) VALUES
(1, 'time now is.2019/03/27 11:49:49', '2019-03-27 06:19:49', '2019-03-27 06:19:49'),
(2, 'time now is 2019/03/27 12:06:59', '2019-03-27 06:36:59', '2019-03-27 06:36:59'),
(3, 't', '2019-03-27 07:20:46', '2019-03-27 07:20:46'),
(4, 't', '2019-03-27 07:21:10', '2019-03-27 07:21:10'),
(5, 't', '2019-03-28 05:03:44', '2019-03-28 05:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `contact`, `school`, `university`, `teacher`, `teacher_phone`, `teacher_email`, `team_name`, `email_verified_at`, `password`, `raw_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nilaksha Perera', 'hello@nilaksha.com', NULL, NULL, '', '', NULL, NULL, '', NULL, '$2y$10$XA8GAhzpgZZbVRepAOaqEejfe4ItTrve6rG7cw4fkFvc7d6YwDceK', NULL, 'j1JizLWA4hudpkmghO73jwDKCv0slSgTjVPgoMqiDdcRX6zwMDf0XjagmkOO', '2019-02-27 00:52:32', '2019-08-08 02:59:23'),
(20, 2, 'Student', 'student@test.com', '0777777777', 'AIS', 'UOM', 'Mr.Perera', NULL, NULL, 'Pythons', NULL, '$2y$10$XA8GAhzpgZZbVRepAOaqEejfe4ItTrve6rG7cw4fkFvc7d6YwDceK', 'password', 'RqYKBsX5Q3QZgok5vaNe2TtSulB4otQuH2mIE9CstG8VTw1myy7AoayoG8MO', '2019-04-09 00:16:57', '2019-10-11 16:43:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puzzles`
--
ALTER TABLE `puzzles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `puzzles`
--
ALTER TABLE `puzzles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
