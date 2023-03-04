-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 05:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `name`) VALUES
(1, 'Entertainment'),
(2, 'Politics'),
(3, 'Tech'),
(4, 'Enterntainmenta'),
(5, 'kisa'),
(6, 'Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `id` int(15) NOT NULL,
  `postid` int(20) NOT NULL,
  `body` longtext NOT NULL,
  `time` int(15) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`id`, `postid`, `body`, `time`, `username`) VALUES
(1, 3, 'This is intresting', 1677225132, 'ovics'),
(2, 5, 'ljhscbn;jksd', 1677583113, 'billycodes'),
(3, 15, 'bvhvjsf', 1677583430, 'billycodes');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `body` longtext NOT NULL,
  `views` int(20) NOT NULL,
  `type` varchar(40) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `title`, `date`, `image`, `username`, `body`, `views`, `type`, `status`) VALUES
(1, 'Election 200', '2023-02-28 11:18:43', 'Screenshot_20230219_075512.png', 'billycodes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 9, 'BlogPosts', 1),
(2, 'Election 2', '2023-02-28 11:29:18', 'Screenshot_20230118_061630.png', 'ovics', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 3, 'BlogPosts', 1),
(3, 'Election number 3', '2023-03-03 21:44:59', 'Screenshot_20230120_055311.png', 'ovics', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 18, 'BlogPosts', 1),
(4, 'Eric Holder Jr. Sentenced to 60 Years to Life in P', '2023-03-03 22:28:59', 'https://akns-images.eonline.com/eol_images/Entire_Site/2023122/rs_1200x1200-230222144921-1200-nipsey-hussle.jpg?fit=around%7C1080:1080&output-quality=90&crop=1080:1080;center,top', 'Kelly Gilmore', 'In the case of Nipsey Hussle’s 2019 murder, Eric Holder Jr. was sentenced to 60 years to life in prison on Feb. 22. Learn about the late rapper’s tragic death.', 6, 'ApiPosts', 1),
(5, 'More than 1,700 flights canceled as winter storm h', '2023-02-28 11:18:33', 'https://media.cnn.com/api/v1/images/stellar/prod/230222120208-flights-colorado-weather-022223.jpg?c=16x9&q=w_800,c_fill', 'Tamara Hardingham-Gill', 'More than 1,700 flights were canceled Wednesday with Minneapolis−Saint Paul International Airport and Denver International Airport hard hit as storm brings snow and ice across the United States.', 9, 'ApiPosts', 1),
(6, 'Magnitude 7.2 earthquake strikes Tajikistan, near ', '2023-02-28 11:34:20', 'https://www.reuters.com/pf/resources/images/reuters/reuters-default.png?d=131', 'John Doe', 'An earthquake of about 7.2 magnitude shook Tajikistan at 8:37 a.m. (0037 GMT) on Thursday at a depth of 10 km (6 miles), Chinese state television CCTV reported，citing the China Earthquake Networks Center.', 12, 'ApiPosts', 1),
(7, 'Wednesday weather forecast: Winter storm warnings,', '2023-02-24 08:31:31', 'https://www.gannett-cdn.com/presto/2022/12/23/USAT/8094e0d5-b56d-4e1a-8a2d-61180a6016da-AP_APTOPIX_Winter_Weather.jpg?auto=webp&crop=7431,4180,x0,y378&format=pjpg&width=1200', 'Marina Pitofsky, Christine Fernando and Thao Nguye', 'Residents in Western states and the Plains have faced severe winter weather for several days and may see blizzard conditions and significant snowfall.', 0, 'ApiPosts', 1),
(8, 'Asia markets mixed as Fed minutes signaled more hi', '2023-02-24 08:31:31', 'https://image.cnbcfm.com/api/v1/image/107198572-1677118969916-gettyimages-1243953866-AFP_32LD92C.jpeg?v=1677119008&w=1920&h=1080', 'Lim Hui Jie', 'Asia markets are trading mixed after the release of the FOMC minutes from the U.S. Federal Reserve', 0, 'ApiPosts', 1),
(9, 'Israel attacks Gaza after rocket fire, deadly Nabl', '2023-02-24 08:31:31', 'https://www.aljazeera.com/wp-content/uploads/2023/02/339U4YY-highres-1.jpg?resize=1200%2C675', 'Al Jazeera', 'Israel attacks Gaza as tensions rise over an Israeli raid on the West Bank city of Nablus that killed 11 Palestinians.', 0, 'ApiPosts', 1),
(10, 'Alabama\'s Brandon Miller scores 41 in OT win one d', '2023-02-24 08:31:31', 'https://sportshub.cbsistatic.com/i/r/2023/02/23/9b6a756a-2e74-44a3-823e-7d8a42c6e732/thumbnail/1200x675/a0c159ab79a2e6a5e6b467e3d6e8e6bc/brandon-miller.jpg', '', 'Alabama\'s athletic director explained why Miller was active prior to the game on Wednesday', 0, 'ApiPosts', 1),
(11, 'United States vs. Brazil - Football Match Report -', '2023-02-24 08:31:31', 'https://a3.espncdn.com/combiner/i?img=%2Fphoto%2F2023%2F0223%2Fr1135086_1296x729_16%2D9.jpg', 'John Doe', 'Get a report of the United States vs. Brazil 2023 SheBelieves Cup football match.', 0, 'ApiPosts', 1),
(12, 'Kim Zolciak\'s daughters deny \'crazy\' rumors that G', '2023-02-24 08:31:31', 'https://pagesix.com/wp-content/uploads/sites/3/2023/02/NYPICHPDPICT000007092228.jpg?quality=75&strip=all&w=1200', 'Nicki Cox', 'Fulton County revealed last week that the mansion will be auctioned off on March 7 after Kim and Kroy Biermann defaulted on a $1.65 million loan.', 0, 'ApiPosts', 1),
(13, 'Webb telescope makes a surprising galactic discove', '2023-02-24 08:31:31', 'https://media.cnn.com/api/v1/images/stellar/prod/230222095505-webb-massive-galaxies.jpg?c=16x9&q=w_800,c_fill', 'Ashley Strickland', 'Astronomers have used the James Webb Space Telescope to peer back in time to the early days of the universe and saw something surprising. They observed six massive galaxies much larger than what was expected to exist so soon after the big bang.', 0, 'ApiPosts', 1),
(14, 'Unlikely alliances in Supreme Court opinions on ov', '2023-02-24 08:31:31', 'https://media.npr.org/assets/img/2023/02/22/gettyimages-1243795466-2-_wide-a55646dc09e9ff2cd1a91e9b8a9a53983faff6b4-s1400-c100.jpg', '', 'The cases involved who qualifies for overtime pay, and Arizona\'s refusal to apply a Supreme Court precedent in death penalty jury instructions.', 0, 'ApiPosts', 1),
(15, 'Mt. Baldy could get 8 feet of snow this week - Los', '2023-02-28 11:23:50', 'https://ca-times.brightspotcdn.com/dims4/default/a057804/2147483647/strip/true/crop/4032x2117+0+454/resize/1200x630!/quality/80/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F7c%2Fa2%2Faa66f7dc4c819ea3d5a8fe811350%2Fla-hm-chris-erskine-mt-baldy-postcard.jpg', 'Grace Toohey', 'Forecasts show Southern California mountains could get 6 inches to 5 feet of snow by Saturday, but some of the highest peaks could get up to 8 feet.', 9, 'ApiPosts', 1),
(16, 'Witness in Alex Murdaugh\'s double murder trial des', '2023-02-24 08:31:31', 'https://media-cldnry.s-nbcnews.com/image/upload/t_nbcnews-fp-1200-630,f_auto,q_auto:best/rockcms/2023-02/230222-alex-murdaugh-ew-347p-c10f91.jpg', 'Uwa Ede-Osifo', 'The defense for Alex Murdaugh called into question the integrity of the crime scene in the second day of their case', 0, 'ApiPosts', 1),
(17, 'Georgia juror unsettles Trump investigation with r', '2023-02-24 08:31:31', 'https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/62OSXNVSBSKOQMNN6TMV7IENJE_size-normalized.jpg&w=1440', 'Amy Gardner, Matthew Brown', 'Emily Kohrs may have added to the challenge for Fulton County District Attorney Fani Willis, whose investigation has come under scrutiny.', 0, 'ApiPosts', 1),
(18, 'Then-Arizona attorney general sat on records denyi', '2023-02-24 08:31:31', 'https://ca-times.brightspotcdn.com/dims4/default/fb6e035/2147483647/strip/true/crop/3600x1890+0+255/resize/1200x630!/quality/80/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F3b%2F26%2Fee4889eab23ff5731ec6fff54657%2F130e5b3ca0ed4aaeb8860858c6c2b630', 'JONATHAN J. COOPER', 'Arizona’s former attorney general suppressed findings by his investigators who concluded there was no basis for allegations that the 2020 election was marred by widespread fraud.', 0, 'ApiPosts', 1),
(19, 'As chatbots boom, Nvidia sales outlook beats Wall ', '2023-02-24 08:31:31', 'https://www.reuters.com/resizer/C3gJAlFgV9HC7n1xfw9LTXIRRCQ=/1200x628/smart/filters:quality(80)/cloudfront-us-east-2.images.arcpublishing.com/reuters/JSYJOX6QRZP4LKWE4FD3AM7KXE.jpg', 'John Doe', 'Chip designer Nvidia Corp <a href=\"https://www.reuters.com/companies/NVDA.O\" target=\"_blank\">(NVDA.O)</a> forecast first-quarter revenue above Wall Street estimates on Wednesday as its CEO said use of its chips to power artificial intelligence (AI) services l…', 0, 'ApiPosts', 1),
(20, 'Jennifer Lopez Celebrates Twins Emme and Max\'s 15t', '2023-02-24 08:31:31', 'https://www.etonline.com/sites/default/files/styles/max_1280x720/public/images/2023-02/MK-Jennifer-Lopez%2C-Emme-and-Max-1280-X-720-HERO-1-IMAGE.jpg?h=c673cd1c&itok=_aFieJCi', 'Mona Khalifeh', 'Lopez shares the twins with ex-husband, Marc Anthony.', 0, 'ApiPosts', 1),
(21, 'East Palestine derailment spurs rare signs of bipa', '2023-02-24 08:31:31', 'https://media.cnn.com/api/v1/images/stellar/prod/220821160123-pete-buttigieg-biden-administration-tries-to-sell-infrastructure-projects.jpg?c=16x9&q=w_800,c_fill', 'Maegan Vazquez, Pete Muntean, Aileen Graef', 'A fiery train wreck that released toxic materials in an Ohio town is raising new questions in the halls of the nation\'s capital over the regulation of the rail industry and if stricter measures could have prevented the disaster.', 0, 'ApiPosts', 1),
(22, 'Massive David Bowie Archive Acquired by V&A Museum', '2023-02-24 08:31:31', 'https://variety.com/wp-content/uploads/2023/02/Collage-Maker-22-Feb-2023-05.20-PM.jpg?w=1000&h=563&crop=1', 'K.J. Yossman', 'The V&A Museum in London has acquired a massive, 80,000-piece archive of material from the estate of David Bowie, it confirmed today. The archive contains items including handwritten notebooks,…', 0, 'ApiPosts', 1),
(23, 'Eric Holder Jr. Sentenced to 60 Years to Life in P', '2023-02-24 08:32:23', 'https://akns-images.eonline.com/eol_images/Entire_Site/2023122/rs_1200x1200-230222144921-1200-nipsey-hussle.jpg?fit=around%7C1080:1080&output-quality=90&crop=1080:1080;center,top', 'Kelly Gilmore', 'In the case of Nipsey Hussle’s 2019 murder, Eric Holder Jr. was sentenced to 60 years to life in prison on Feb. 22. Learn about the late rapper’s tragic death.', 0, 'ApiPosts', 1),
(24, 'More than 1,700 flights canceled as winter storm h', '2023-02-24 08:32:23', 'https://media.cnn.com/api/v1/images/stellar/prod/230222120208-flights-colorado-weather-022223.jpg?c=16x9&q=w_800,c_fill', 'Tamara Hardingham-Gill', 'More than 1,700 flights were canceled Wednesday with Minneapolis−Saint Paul International Airport and Denver International Airport hard hit as storm brings snow and ice across the United States.', 0, 'ApiPosts', 1),
(25, 'Magnitude 7.2 earthquake strikes Tajikistan, near ', '2023-02-24 08:35:13', 'https://www.reuters.com/pf/resources/images/reuters/reuters-default.png?d=131', 'John Doe', 'An earthquake of about 7.2 magnitude shook Tajikistan at 8:37 a.m. (0037 GMT) on Thursday at a depth of 10 km (6 miles), Chinese state television CCTV reported，citing the China Earthquake Networks Center.', 3, 'ApiPosts', 1),
(26, 'Wednesday weather forecast: Winter storm warnings,', '2023-02-24 08:32:23', 'https://www.gannett-cdn.com/presto/2022/12/23/USAT/8094e0d5-b56d-4e1a-8a2d-61180a6016da-AP_APTOPIX_Winter_Weather.jpg?auto=webp&crop=7431,4180,x0,y378&format=pjpg&width=1200', 'Marina Pitofsky, Christine Fernando and Thao Nguye', 'Residents in Western states and the Plains have faced severe winter weather for several days and may see blizzard conditions and significant snowfall.', 0, 'ApiPosts', 1),
(27, 'Asia markets mixed as Fed minutes signaled more hi', '2023-02-24 08:32:23', 'https://image.cnbcfm.com/api/v1/image/107198572-1677118969916-gettyimages-1243953866-AFP_32LD92C.jpeg?v=1677119008&w=1920&h=1080', 'Lim Hui Jie', 'Asia markets are trading mixed after the release of the FOMC minutes from the U.S. Federal Reserve', 0, 'ApiPosts', 1),
(28, 'Israel attacks Gaza after rocket fire, deadly Nabl', '2023-02-24 08:32:23', 'https://www.aljazeera.com/wp-content/uploads/2023/02/339U4YY-highres-1.jpg?resize=1200%2C675', 'Al Jazeera', 'Israel attacks Gaza as tensions rise over an Israeli raid on the West Bank city of Nablus that killed 11 Palestinians.', 0, 'ApiPosts', 1),
(29, 'Alabama\'s Brandon Miller scores 41 in OT win one d', '2023-02-24 08:32:23', 'https://sportshub.cbsistatic.com/i/r/2023/02/23/9b6a756a-2e74-44a3-823e-7d8a42c6e732/thumbnail/1200x675/a0c159ab79a2e6a5e6b467e3d6e8e6bc/brandon-miller.jpg', '', 'Alabama\'s athletic director explained why Miller was active prior to the game on Wednesday', 0, 'ApiPosts', 1),
(30, 'United States vs. Brazil - Football Match Report -', '2023-02-24 08:32:23', 'https://a3.espncdn.com/combiner/i?img=%2Fphoto%2F2023%2F0223%2Fr1135086_1296x729_16%2D9.jpg', 'John Doe', 'Get a report of the United States vs. Brazil 2023 SheBelieves Cup football match.', 0, 'ApiPosts', 1),
(31, 'Kim Zolciak\'s daughters deny \'crazy\' rumors that G', '2023-02-24 08:32:23', 'https://pagesix.com/wp-content/uploads/sites/3/2023/02/NYPICHPDPICT000007092228.jpg?quality=75&strip=all&w=1200', 'Nicki Cox', 'Fulton County revealed last week that the mansion will be auctioned off on March 7 after Kim and Kroy Biermann defaulted on a $1.65 million loan.', 0, 'ApiPosts', 1),
(32, 'Webb telescope makes a surprising galactic discove', '2023-02-24 08:32:23', 'https://media.cnn.com/api/v1/images/stellar/prod/230222095505-webb-massive-galaxies.jpg?c=16x9&q=w_800,c_fill', 'Ashley Strickland', 'Astronomers have used the James Webb Space Telescope to peer back in time to the early days of the universe and saw something surprising. They observed six massive galaxies much larger than what was expected to exist so soon after the big bang.', 0, 'ApiPosts', 1),
(33, 'Unlikely alliances in Supreme Court opinions on ov', '2023-02-24 08:32:23', 'https://media.npr.org/assets/img/2023/02/22/gettyimages-1243795466-2-_wide-a55646dc09e9ff2cd1a91e9b8a9a53983faff6b4-s1400-c100.jpg', '', 'The cases involved who qualifies for overtime pay, and Arizona\'s refusal to apply a Supreme Court precedent in death penalty jury instructions.', 0, 'ApiPosts', 1),
(34, 'Mt. Baldy could get 8 feet of snow this week - Los', '2023-02-24 08:32:23', 'https://ca-times.brightspotcdn.com/dims4/default/a057804/2147483647/strip/true/crop/4032x2117+0+454/resize/1200x630!/quality/80/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F7c%2Fa2%2Faa66f7dc4c819ea3d5a8fe811350%2Fla-hm-chris-erskine-mt-baldy-postcard.jpg', 'Grace Toohey', 'Forecasts show Southern California mountains could get 6 inches to 5 feet of snow by Saturday, but some of the highest peaks could get up to 8 feet.', 0, 'ApiPosts', 1),
(35, 'Witness in Alex Murdaugh\'s double murder trial des', '2023-02-24 08:32:23', 'https://media-cldnry.s-nbcnews.com/image/upload/t_nbcnews-fp-1200-630,f_auto,q_auto:best/rockcms/2023-02/230222-alex-murdaugh-ew-347p-c10f91.jpg', 'Uwa Ede-Osifo', 'The defense for Alex Murdaugh called into question the integrity of the crime scene in the second day of their case', 0, 'ApiPosts', 1),
(36, 'Georgia juror unsettles Trump investigation with r', '2023-03-03 21:50:41', 'https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/62OSXNVSBSKOQMNN6TMV7IENJE_size-normalized.jpg&w=1440', 'Amy Gardner, Matthew Brown', 'Emily Kohrs may have added to the challenge for Fulton County District Attorney Fani Willis, whose investigation has come under scrutiny.', 3, 'ApiPosts', 1),
(37, 'Then-Arizona attorney general sat on records denyi', '2023-02-24 08:32:23', 'https://ca-times.brightspotcdn.com/dims4/default/fb6e035/2147483647/strip/true/crop/3600x1890+0+255/resize/1200x630!/quality/80/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F3b%2F26%2Fee4889eab23ff5731ec6fff54657%2F130e5b3ca0ed4aaeb8860858c6c2b630', 'JONATHAN J. COOPER', 'Arizona’s former attorney general suppressed findings by his investigators who concluded there was no basis for allegations that the 2020 election was marred by widespread fraud.', 0, 'ApiPosts', 1),
(38, 'As chatbots boom, Nvidia sales outlook beats Wall ', '2023-02-24 08:32:23', 'https://www.reuters.com/resizer/C3gJAlFgV9HC7n1xfw9LTXIRRCQ=/1200x628/smart/filters:quality(80)/cloudfront-us-east-2.images.arcpublishing.com/reuters/JSYJOX6QRZP4LKWE4FD3AM7KXE.jpg', 'John Doe', 'Chip designer Nvidia Corp <a href=\"https://www.reuters.com/companies/NVDA.O\" target=\"_blank\">(NVDA.O)</a> forecast first-quarter revenue above Wall Street estimates on Wednesday as its CEO said use of its chips to power artificial intelligence (AI) services l…', 0, 'ApiPosts', 1),
(39, 'Jennifer Lopez Celebrates Twins Emme and Max\'s 15t', '2023-02-24 08:32:23', 'https://www.etonline.com/sites/default/files/styles/max_1280x720/public/images/2023-02/MK-Jennifer-Lopez%2C-Emme-and-Max-1280-X-720-HERO-1-IMAGE.jpg?h=c673cd1c&itok=_aFieJCi', 'Mona Khalifeh', 'Lopez shares the twins with ex-husband, Marc Anthony.', 0, 'ApiPosts', 1),
(40, 'East Palestine derailment spurs rare signs of bipa', '2023-02-24 20:10:00', 'https://media.cnn.com/api/v1/images/stellar/prod/220821160123-pete-buttigieg-biden-administration-tries-to-sell-infrastructure-projects.jpg?c=16x9&q=w_800,c_fill', 'Maegan Vazquez, Pete Muntean, Aileen Graef', 'A fiery train wreck that released toxic materials in an Ohio town is raising new questions in the halls of the nation\'s capital over the regulation of the rail industry and if stricter measures could have prevented the disaster.', 3, 'ApiPosts', 1),
(41, 'Massive David Bowie Archive Acquired by V&A Museum', '2023-02-24 08:32:23', 'https://variety.com/wp-content/uploads/2023/02/Collage-Maker-22-Feb-2023-05.20-PM.jpg?w=1000&h=563&crop=1', 'K.J. Yossman', 'The V&A Museum in London has acquired a massive, 80,000-piece archive of material from the estate of David Bowie, it confirmed today. The archive contains items including handwritten notebooks,…', 0, 'ApiPosts', 1),
(42, 'Apple Watch Blood Glucose Monitor Could Revolution', '2023-02-24 08:32:23', 'http://placehold.it/64x64', 'John Doe', '', 0, 'ApiPosts', 1),
(43, 'blal', '2023-02-28 11:27:46', 'Screenshot_20230119_102346.png', 'ovics', 'jkhhf hdfhf', 0, 'BlogPosts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pword` varchar(20) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `name`, `pword`, `role`) VALUES
(1, 'billycodes', '1', 'admin'),
(2, 'ovics', '1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
