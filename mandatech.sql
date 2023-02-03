drop schema if exists mandatech;
create schema mandatech;
use mandatech; 



-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 06:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandatech`
--

-- --------------------------------------------------------

--
-- Table structure for table `users` and `products` and `orders`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contactnum` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE  IF NOT EXISTS `products` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
	`dsc` text NOT NULL,
	`price` decimal(7,2) NOT NULL,
	`quantity` int(11) NOT NULL,
	`img` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE  IF NOT EXISTS `orders` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` varchar(200) NOT NULL,
	`user_name` varchar(100) NOT NULL,
	`bill_add` varchar(100) NOT NULL,
	`ship_add` varchar(100) NOT NULL,
	`products` text NOT NULL,
	`price` decimal(7,2) NOT NULL,
	`status` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users` and `products`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `contactnum`, `email`, `password`, `role`) VALUES
(20, 'user', 'user', 'user', '09087654321', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2'),
(21, 'admin', 'admin', 'admin', '09012345678', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1'),
(23, 'user123', 'User', 'Testing', '09087654321', 'user123@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2');

INSERT INTO `products` (`id`, `name`,`type`, `dsc`, `price`, `quantity`, `img`) VALUES
(1, 'LG 34GL750-B 34" ULTRAWIDE CURVED GAMING MONITOR WITH G-SYNC','monitors','<p>The 34GL750-B is a NVIDIA-tested and officially validated G-SYNC® Compatible monitor, minimizing screen tearing and stutter for a smoother, faster gaming experience. IPS with sRGB 99% Feel Actual Combat with True Color IPS display with 99% of the sRGB has outstanding color accuracy.</p>', '29600.00', 10, 'img\monitor1.jpg'),
(2, 'LENOVO THINKCENTRE TIO 22 11GSPAR1WW 21.5" GEN4 MONITOR', 'monitors', '<p>The ThinkCentre TIO22 Gen 4 makes it easy to create your own modular all in one (AIO)—simply plug a compatible ThinkCentre Tiny, Thin Client or Nano (sold separately) into the back of the monitor. It instantly becomes a self-contained, fully functional AIO. But unlike other AIOs, the monitor and CPU refresh separately, making upgrades efficient and easy.</p>', '12500.00', 15, 'img\monitor2.jpg'),
(3, 'LG 27UN880-B ULTRAFINE 27" UHD IPS USB-C HDR MONITOR', 'monitors', '<p>DESIGNED AROUND YOU</br>Boost your productivity with new innovations for ergonomics and workplace.</br>UHD 4K IPS DISPLAY: CLEAR DISPLAY FOR VISUAL COMFORT</br>With sRGB 99% (Typ.) and VESA DisplayHDR400, LG UltraFine™ Ergo provides exceptional image quality. 27-inch 4K IPS display delivers a comfortable viewing experience by reducing color shift from different vantage points.</p>', '26000.00', 23, 'img\monitor3.jpg'),
(4, 'LG 27GP850-B ULTRAGEAR QHD NANO IPS 27" HDR GAMING MONITOR WITH G-SYNC COMPATIBILITY','monitors','<p>Complete your battle station with a premium LG UltraGear™ Gaming Monitor. Built for gamers, it delivers the latest hardware, specs, ergonomics, sleek design and sensory experience. With gaming-focused features like NVIDIA® G-SYNC® compatibility, 1ms GTG response times, pro-level customization and fast, vivid IPS panels, youre sure to gain an added edge.</p>', '27000.00', 10, 'img\monitor4.png'),
(5, 'LG 27MP400-B 27" IPS FULL HD MONITOR WITH FREESYNC','monitors','<p>LG Monitor with IPS technology highlights the performance of liquid crystal displays. Response times are shortened, color reproduction is improved, and users can view the screen at wide angles.</p>', '10200.00', 10, 'img\monitor5.png'),
(6, 'AKKO BLACK & PINK 3084B PLUS MECHANICAL KEYBOARD (AKKO CS JELLY PURPLE)','mkb','<p>Use the improved Akko Beken Plus multi-modes solution; Leveled top mount structure; Battery capacity: 3000mah (power consumption in wireless mode without backlit: 12ma) SMD LED RGB backlit; PCB foam + Case foam; 5-pin TTC gaming hot-swappable socket; Software: Akko Cloud (supports audio visualizer in 2.4G mode); Comes with 20 novelty keys.</p>', '5000.00', 10, 'img\kb1.jpg'),
(7, 'Onikuma G29 69 Keys RGB Wired Mechanical Gaming Keyboard (Red Switch) (Black)','mkb','<p>ONIKUMA G29 Wired Keyboard is an ultra-compact, sturdy tenkeyless keyboard featuring custom blue/red mechanical switches designed to give gamers the best blend of style, performance, and reliability. These key switches have exposed LEDs for stunning lighting with an actuation force and travel distance elegantly balanced for responsiveness and accuracy. Its compact TKL design frees up space for mouse movement in desktop setups where space is at a premium, and it also features a detachable USB Type-C cable for supreme portability.</p>', '2400.00', 10, 'img\kb2.jpg'),
(8, 'GLORIOUS PC GAMING RACE GMMK PRO PRE-BUILT EDTION PREMIUM COMPACT 75% GASKET-MOUNTED MODULAR MECHANICAL KEYBOARD (BLACK SLATE)','mkb','<p>Expertly assembled, comes pre-installed with new Glorious Fox (linear) Pre-lubed switches, and White GPBT keycaps, with Apple Computer (extra key) support.</p>', '18000.00', 10, 'img/kb3.jpg'),
(9, 'Varmilo VEM108 CMYK Mechanical Keyboard (Varmilo EC SAKURA V2) (A36A024A9A3A01A007)','mkb','<p>Meet the new, upgraded VA Series V2! The amazing colorways you love have just received a quality upgrade! All keyboards in this series now come with a standard USB-C cable. The kickstand has been upgraded to a double-section kickstand to give you even more options. All LEDs are now North-facing for those keyboards that have them. The entire V2 series has cable grooves on the bottom case to allow the cable to exit from underneath the keyboard on the left, right, or middle to allow you to customize your space to fit you. </p>', '7400.00', 10, 'img\kb4.jpg'),
(10, 'AKKO BLACK & GOLD 3068B MECHANICAL KEYBOARD (AKKO CS JELLY PINK)','mkb','<p>Beken Multi-modes Chip with BT5.0/2.4Ghz/Type-C All-in-One; 5-Pin Hot-swappable(except for Number 1/2 that are 3-pin due to bezel angle of Type-C connector); TTC Gaming Socket with up to 2000 Cycles;</p>', '4400.00', 10, 'img\kb5.jpg'),
(11, 'LOGITECH MX MASTER 3 ADVANCED WIRELESS MOUSE','mkb','<p>MX Master 3 is instant precision and infinite potential. It’s the most advanced Master Series mouse yet – designed for creatives and engineered for coders. If you can think it, you can master it.</p>', '5400.00', 10, 'img\mouse1.jpg'),
(12, 'Onikuma CW906 Wireless Gaming Mouse USB 7 Buttons Breathing Led Colors (Black)','mkb','<p>Key Specifications/ Special Features: Features: 7 RGB backlight mode, 6 default adjustable DPI:800 Green/1600 Pink/2400 Blue/3200 Red/4800 Cyan/6400 Yellow. Ergonomic symmetric design: For great hand feeling & stress-free use: Fingerprint-resistant/Grease resistant/sweat resistant 7 Duttons: Optical Gaming Mouse: Left/Right/Mid/For-ward/Backward/DPI +/DPI- . Quick thumb function: fast forward or backward when browsing the web, forward or backward at the same folder window.</p>', '900.00', 10, 'img\mouse2.jpg'),
(13, 'CORSAIR IRONCLAW RGB WIRELESS RECHARGEABLE GAMING MOUSE WITH SLIPSTREAM TECHNOLOGY','mkb','<p>The CORSAIR GLAIVE RGB PRO gaming mouse merges high performance with high comfort, developed with a contoured shape designed for extended gaming sessions and an ultra-accurate, gaming-grade 18,000 DPI optical sensor.</p>', '4400.00', 10, 'img\mouse3.jpg'),
(14, 'Onikuma CW911 RGB Wired Optical Gaming Mouse Honeycomb Shell (Black)','mkb','<p>Key Specifications/ Special Features: Features: 7 RGB backlight mode, 6 default adjustable DPI:800 Green/1600 Pink/2400 Blue/3200 Red/4800 Cyan/6400 Yellow.</p>', '800.00', 10, 'img\mouse4.jpg'),
(15, 'RAZER BASILISK V2 ERGONOMIC WIRED GAMING MOUSE','mkb','<p>Focus+ 20K DPI Optical Sensor: Offers on-the-fly sensitivity adjustment through dedicated DPI buttons (reprogrammable) for gaming</br>3x Faster Than Traditional Mechanical Switches: New Razer optical mouse switches uses light beam-based actuation, registering button presses at the speed of light for complete immersion and absolute control</p>', '3500.00', 10, 'img\mouse5.jpg'),
(16, 'VERTUX TRINITY STEREO IMMERSIVE PRO GAMING OVER-EAR WIRED HEADPHONE (BLACK)','headsetAndMic','<p>Create a gaming environment that is as real as it gets with Trinity, a 50mm over-ear headset. The ultra-clear, high-res microphone delivers studio-like voice clarity for high-quality conversations and an adjustable headband for all-day comfort. The RGB lights provide stunning illumination that sets the perfect environment for your gaming raids.</p>', '2200.00', 10, 'img\headset1.jpg'),
(17, 'GIGABYTE AORUS H1 7.1 SURROUND SOUND GAMING HEADSET','headsetAndMic','<p>Guaranteed Original. Brand New & Sealed with 1 Year Warranty. Delivery within the day or the next day. No exact time. We also accept orders from nearby areas outside Metro Manila.</p>', '3700.00', 10, 'img\headset2.png'),
(18, 'PROMATE AIRBEAT HIGH FIDELITY STEREO WIRELESS HEADPHONE (BLACK)','headsetAndMic','<p>Enjoy your tunes and answer calls without wires with the AirBeat Bluetooth headset. Boasting up to 9 hours of listening time you will have your tunes set up for the entire day. Immersive, high-res sound, and powerful speaker drivers deliver the right balance of rich bass, crisp highs, and natural mid-tones for your music. Get Immersed in high-definition sound with AirBeat.</p>', '2600.00', 10, 'img\headset3.jpg'),
(19, 'ASUS ROG STRIX FUSION 700 RGB 7.1 GAMING HEADSET W/ BLUETOOTH','headsetAndMic','<p>PC, console and mobile gaming headset with Bluetooth 4.2, headset-to-headset RGB light synchronization, hi-fi-grade ESS DAC and amp, and 7.1 surround on the go.</p>', '8700.00', 10, 'img\headset4.jpg'),
(20, 'RAZER KRAKEN X MULTI-PLATFORM WIRED GAMING HEADSET (BLACK)','headsetAndMic','<p>What if we told you its possible to experience complete gaming immersion without feeling like youve got a headset on? Enter the Razer Kraken X. Ultra-light at just 250g and ultra-immersive with 7.1 surround sound. Sit tight and play for hours-your gaming marathons are about to be a breeze.</p>', '2500.00', 10, 'img\headset5.jpg'),
(21, 'BOYA BY-M100UC Mininature Condenser Microphone For Type-C Devices','headsetAndMic','<p>Mininature Condenser Microphone The BY-M100UC is miniature size, omnidirectional microphone for most Smartphones or devices with Type-C jack, to improve your sound quality in video-making.</p>', '1900.00', 10, 'img\mic1.jpg'),
(22, 'LOGITECH BLUE YETI PREMIUM MULTI-PATTERN USB MICROPHONE FOR RECORDING/STREAMING/PODCASTING/GAMING (BLACKOUT)','headsetAndMic','<p>Create unparalleled recordings with your computer using Blues best-selling family of Yeti USB microphones. Now with Blue VO!CE software, you can craft the perfect broadcast vocal sound and entertain your stream audience with enhanced effects, advanced voice modulation and HD audio samples. Four different pickup patterns offer incredible flexibility so you can record vocals for music, podcasts, Twitch streaming, YouTube videos, or even cryptozoology lectures in ways that would normally require multiple microphones.</p>', '8200.00', 10, 'img\mic2.jpg'),
(23, 'LOGITECH BLUE YETI PREMIUM MULTI-PATTERN USB MICROPHONE FOR RECORDING/STREAMING/PODCASTING/GAMING (MIDNIGHT BLUE)','headsetAndMic','<p>Create unparalleled recordings with your computer using Blues best-selling family of Yeti USB microphones. Now with Blue VO!CE software, you can craft the perfect broadcast vocal sound and entertain your stream audience with enhanced effects, advanced voice modulation and HD audio samples. Four different pickup patterns offer incredible flexibility so you can record vocals for music, podcasts, Twitch streaming, YouTube videos, or even cryptozoology lectures in ways that would normally require multiple microphones.</p>', '8200.00', 10, 'img\mic3.jpg'),
(24, 'HYPERX QUADCAST STANDALONE MICROPHONE FOR PC/PS4/MAC','headsetAndMic','<p>The HyperX QuadCast™ is the ideal all-inclusive standalone microphone for the aspiring streamer or podcaster looking for a condenser mic with quality sound. QuadCast comes with its own anti-vibration shock mount to help reduce the rumbles of daily life and a built-in pop filter to muffle pesky plosive sounds. Instantly know your mic status with the LED indicator, and simply tap-to-mute to avoid awkward broadcasting accidents.</p>', '7800.00', 10, 'img\mic4.jpg'),
(25, 'RAZER SEIREN MINI ULTRA-COMPACT CONDENSER MICROPHONE (MERCURY)','headsetAndMic','<p>Big sounds can come in small packages. Meet the Razer Seiren Mini—an ultra-compact condenser mic thats the perfect fit for professional grade-audio with any streaming or video call setup.</br>Because this compact condenser mic is tuned with a tighter pickup angle, it can focus on your voice and has better ambient noise reduction—ensuring that background sounds like typing and mouse clicks are minimized.</p>', '2900.00', 10, 'img\mic5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
