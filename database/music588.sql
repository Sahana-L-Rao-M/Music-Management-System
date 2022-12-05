-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 04:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music588`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_age_user` (IN `dateofbirth` DATE)   begin
declare msg varchar(100);
declare age int;
DECLARE c DATE;
SELECT sysdate() into c;
set msg=("You must be atleast 11 years old to be in the community");
set age=year(c)-year(dateofbirth);
if age<11 then
signal sqlstate '45000'
set message_text=msg;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_track_588` (IN `track_id` VARCHAR(20))   begin
declare tid varchar(50);
declare track_name varchar(50);
declare art_id varchar(50);
declare alid varchar(50);
declare song_image varchar(255);
declare audio_file varchar(50);

declare done int default 0;
declare val int;

declare cur cursor for select T.tid,T.track_name,T.alid,T.art_id,T.song_image,T.audio_file from track_588 T where T.tid=track_id;

declare continue handler for not found set done=1;
open cur;
c1:loop
fetch cur into tid,track_name,alid,art_id,song_image,audio_file;
if done=1 then leave c1;
end if;
insert into backup_588 values(tid,track_name,alid,art_id,song_image,audio_file);
end loop;
close cur;
set val=(select count(*) from backup_588 where backup_588.tid=track_id);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findage` ()   BEGIN
DECLARE c DATE;
SELECT sysdate() into c;
update artist_588
SET age=year(c)-year(dob);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `check_nos` (`Aid` VARCHAR(10)) RETURNS VARCHAR(60) CHARSET utf8mb4 DETERMINISTIC begin
declare cnt int;
declare count1 int;
declare msg varchar(60);
set cnt=(select no_of_songs from album_588 as t where t.alid=Aid);
set count1=(select count(*) from track_588 natural join album_588 where track_588.alid=Aid);
if(count1>cnt) then
set msg="You are exceeding album size";
end if;
if(count1<cnt) then
set msg="Can add album";
else
set msg="You have reached maximum capacity";
end if;
return msg;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `album_588`
--

CREATE TABLE `album_588` (
  `alid` varchar(50) NOT NULL,
  `album_name` varchar(100) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `no_of_songs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album_588`
--

INSERT INTO `album_588` (`alid`, `album_name`, `year`, `no_of_songs`) VALUES
('1', 'Aashiqui 2', '2013', 3),
('10', 'Kirik Party', '2016', 3),
('13', 'SOTY', '2012', 4),
('14', 'YJHD', '2013', 6),
('2', 'ADHM', '2016', 3),
('4', 'Band Baja Baraat', '2010', 3),
('5', 'Brahmastra', '2022', 3),
('6', 'Dilwale', '2015', 3),
('8', 'Jab Tak Hai Jaan', '2012', 4),
('9', 'Kantara', '2022', 2);

-- --------------------------------------------------------

--
-- Table structure for table `artist_588`
--

CREATE TABLE `artist_588` (
  `art_id` varchar(100) NOT NULL,
  `artist_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist_588`
--

INSERT INTO `artist_588` (`art_id`, `artist_name`, `email`, `gender`, `dob`, `age`) VALUES
('1', 'Arijit Singh', 'arijitsings@gmail.com', 'male', '1987-04-25', 35),
('10', 'Neeti Mohan', 'mohanneeti@gmail.com', 'female', '1979-11-18', 43),
('2', 'Shreya Ghoshal', 'shreyaghoshal@gmail.com', 'female', '1984-03-12', 38),
('4', 'Arman Malik', 'armanmalik95@gmail.com', 'male', '1995-07-22', 27),
('5', 'S.P.Balasubramanyam', 'spb406@gmail.com', 'male', '1946-06-04', 76),
('6', 'Sunidhi Chauhan', 'sunidhisings@gmail.com', 'female', '1983-08-14', 39),
('8', 'Amit Mishra', 'mamit@gmail.com', 'male', '1989-02-15', 33),
('9', 'Vishal Dadlani', 'dadvishal@gmail.com', 'male', '1973-06-28', 49);

-- --------------------------------------------------------

--
-- Table structure for table `backup_588`
--

CREATE TABLE `backup_588` (
  `tid` varchar(50) DEFAULT NULL,
  `track_name` varchar(50) DEFAULT NULL,
  `art_id` varchar(50) DEFAULT NULL,
  `alid` varchar(50) DEFAULT NULL,
  `song_image` varchar(255) DEFAULT NULL,
  `audio_file` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backup_588`
--

INSERT INTO `backup_588` (`tid`, `track_name`, `art_id`, `alid`, `song_image`, `audio_file`) VALUES
('9', 'Singara Siriye', '9', '7', 'Kantara.jpg', 'Singara Siriye.mp3'),
('7', 'Jiya Re', '8', '10', 'Jab Tak Hai Jaan.jpg', 'Jiya Re.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `fav_588`
--

CREATE TABLE `fav_588` (
  `uid` int(11) NOT NULL,
  `tid` varchar(50) NOT NULL,
  `track_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fav_588`
--

INSERT INTO `fav_588` (`uid`, `tid`, `track_name`) VALUES
(5, '2', 'Channa Mereya'),
(5, '1', 'Sun Raha Hain'),
(3, '1', 'Sun Raha Hain');

-- --------------------------------------------------------

--
-- Table structure for table `track_588`
--

CREATE TABLE `track_588` (
  `tid` varchar(50) NOT NULL,
  `track_name` varchar(50) DEFAULT NULL,
  `alid` varchar(50) NOT NULL,
  `art_id` varchar(50) NOT NULL,
  `song_image` varchar(255) NOT NULL,
  `audio_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_588`
--

INSERT INTO `track_588` (`tid`, `track_name`, `alid`, `art_id`, `song_image`, `audio_file`) VALUES
('1', 'Sun Raha Hain', '1', '2', 'Aashiqui 2.jpg', 'Sunn Raha Hai.mp3'),
('2', 'Channa Mereya', '2', '1', 'ADHM.jpg', 'Channa Mereya.mp3'),
('5', 'Kesariya Tera', '5', '1', 'Brahmastra.jpg', 'Kesariya.mp3'),
('8', 'Ratta Maar', '13', '9', 'Soty.jpg', 'Ratta Maar.mp3');

--
-- Triggers `track_588`
--
DELIMITER $$
CREATE TRIGGER `before_delete_track` BEFORE DELETE ON `track_588` FOR EACH ROW BEGIN
   call delete_track_588(old.tid);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_nos` BEFORE INSERT ON `track_588` FOR EACH ROW begin
declare msg varchar(100);
declare val int;
declare val2 int;
set msg=("No of album must have no of songs greater than specified no of songs initially.");
set val=(select count(*) from track_588 natural join album_588 where alid=new.alid group by alid);
set val2=(select no_of_songs from album_588 where alid=new.alid);
if val>=val2 then
signal sqlstate '45000'
set message_text=msg;
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_588`
--

CREATE TABLE `user_profile_588` (
  `uid` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_no` varchar(12) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile_588`
--

INSERT INTO `user_profile_588` (`uid`, `password`, `name`, `email`, `phone_no`, `dob`, `gender`, `location`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', '7894561230', '2002-01-30', 'male', 'bangalore'),
(3, 'monkey123', 'Mrudula Rao', 'mrudulaadi@gmail.com', '8861158280', '2000-02-12', 'female', 'Surathkal'),
(4, 'vinayayb', 'Vinaya Y B', 'vinayayb@gmail.com', '9480732175', '1970-07-17', 'female', 'Surathkal'),
(5, 'adirao', 'Adi', 'adirao@gmail.com', '9449563776', '1990-07-07', 'male', 'Noida'),
(6, 'shetty@123', 'Lakshmi Shetty', 'shettylakshmi@gmail.com', '7396485213', '1992-12-12', 'female', 'Mumbai'),
(7, 'teen1', 'Tanvi', 'ahujatanvi@gmail.com', '9430976379', '2008-11-08', 'female', 'Delhi'),
(8, 'something', 'Dhruv', 'Kapoordhruv@gmail.com', '7349316936', '2006-05-24', 'male', 'South Bombay'),
(9, '1q2w3e', 'Shreya Ghoshal', 'gosh@gmail.com', '7630123654', '1990-11-03', 'female', 'Kolkata');

--
-- Triggers `user_profile_588`
--
DELIMITER $$
CREATE TRIGGER `userage` BEFORE INSERT ON `user_profile_588` FOR EACH ROW begin
call check_age_user(new.dob);
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_588`
--
ALTER TABLE `album_588`
  ADD PRIMARY KEY (`alid`);

--
-- Indexes for table `artist_588`
--
ALTER TABLE `artist_588`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `fav_588`
--
ALTER TABLE `fav_588`
  ADD KEY `fav_foreign_casc_del` (`uid`),
  ADD KEY `tid_casc_up` (`tid`);

--
-- Indexes for table `track_588`
--
ALTER TABLE `track_588`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `alid` (`alid`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `user_profile_588`
--
ALTER TABLE `user_profile_588`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_profile_588`
--
ALTER TABLE `user_profile_588`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fav_588`
--
ALTER TABLE `fav_588`
  ADD CONSTRAINT `fav_foreign_casc` FOREIGN KEY (`uid`) REFERENCES `user_profile_588` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tid_casc_del` FOREIGN KEY (`tid`) REFERENCES `track_588` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `track_588`
--
ALTER TABLE `track_588`
  ADD CONSTRAINT `track_588_ibfk_1` FOREIGN KEY (`alid`) REFERENCES `album_588` (`alid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `track_588_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `artist_588` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
