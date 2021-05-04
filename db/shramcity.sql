-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 07:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shramcity`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `description`, `status`) VALUES
(7, 'test', 'img3.jpg', 'testaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(952, 'Rajkot'),
(953, 'Lodhika'),
(954, 'Kotda Sangani'),
(955, 'Kotda Sanghani'),
(956, 'Jasdan'),
(957, 'Kotda Saangani'),
(958, 'Sardhar'),
(959, 'Kotda'),
(960, 'Sayla'),
(961, 'Gondal'),
(962, 'Kalavad'),
(963, 'Dhrol'),
(964, 'Paddhari'),
(965, 'Dhoraji'),
(966, 'Jetpur'),
(967, 'Jamkandorna'),
(968, 'Upleta'),
(969, 'Jamjodhpur'),
(970, 'Manavadar'),
(971, 'Kutiyana'),
(972, 'Bhanvad'),
(973, 'Jamnagar'),
(974, 'Okhamandal'),
(975, 'Porbandar'),
(976, 'Ranavav'),
(977, 'Junagadh'),
(978, 'Porbaandar'),
(979, 'Jodiya'),
(980, 'Khambhalia'),
(981, 'Jodia'),
(982, 'Lalpur'),
(983, 'Kahbhalia'),
(984, 'Kalyanpur'),
(985, 'Jamkalyanpur'),
(986, 'Bhesan'),
(987, 'Talala'),
(988, 'Keshod'),
(989, 'Vanthali(S)'),
(990, 'Mangrol'),
(991, 'Malia'),
(992, 'Malia Hatina'),
(993, 'Patan-Veraval'),
(994, 'Mendarda'),
(995, 'Sutrapada'),
(996, 'Una'),
(997, 'Vanthli'),
(998, 'Kodinar'),
(999, 'Amreli'),
(1000, 'Jafrabad'),
(1001, 'Wadhwancity'),
(1002, 'Wadhwanicity'),
(1003, 'Wadhwan'),
(1004, 'Surendranagar'),
(1005, 'Lakhtar'),
(1006, 'Lkhtar'),
(1007, 'Dhrangadhra'),
(1008, 'Dhrangsadhra'),
(1009, 'Dshrangadhra'),
(1010, 'Halvad'),
(1011, 'Navsari'),
(1012, 'Limbdi'),
(1013, 'Limndi'),
(1014, 'Surendra Nagar'),
(1015, 'Dhandhuka'),
(1016, 'Limbdiq'),
(1017, 'Muli'),
(1018, 'Chotila'),
(1019, 'Ahmedabad'),
(1020, 'Wankaner'),
(1021, 'Maliya Miyana'),
(1022, 'Morvi'),
(1023, 'Morbi'),
(1024, 'Taankaraa'),
(1025, 'Tankara'),
(1026, 'Dahisara'),
(1027, 'Malia(M)'),
(1028, 'Maliya'),
(1029, 'Bhavnagar'),
(1030, 'Gogha'),
(1031, 'Talaja'),
(1032, 'Mahuva'),
(1033, 'Sihor'),
(1034, 'Damnagar'),
(1035, 'Palitana'),
(1036, 'Umrala'),
(1037, 'Gariyadhar'),
(1038, 'Patan'),
(1039, 'Vallabhiopur'),
(1040, 'Vallabhipur'),
(1041, 'Vallbhiopur'),
(1042, 'Vallbhipur'),
(1043, 'Gadhada Sn'),
(1044, 'Lathi'),
(1045, 'Vadia'),
(1046, 'Jesar'),
(1047, 'Savar Kundla'),
(1048, 'Savarkundla'),
(1049, 'Rajula'),
(1050, 'Chalala'),
(1051, 'Botad'),
(1052, 'Gadhada'),
(1053, 'Babra'),
(1054, 'Bagasara'),
(1055, 'Visavadar'),
(1056, 'Kunkvav-Vadia'),
(1057, 'Bagsra'),
(1058, 'Kunkavav Vadia'),
(1059, 'Liliya'),
(1060, 'Khambha'),
(1061, 'Dhari'),
(1062, 'Bhuj'),
(1063, 'Nakhatrana'),
(1064, 'Anjar'),
(1065, 'Bhachau'),
(1066, 'Abdasa'),
(1067, 'Rahpar'),
(1068, 'Rapar'),
(1069, 'Gandhidham'),
(1070, 'Mundra'),
(1071, 'K. Mandvi'),
(1072, 'Mandvi'),
(1073, 'Mandavi'),
(1074, 'Kachchh'),
(1075, 'Lakhpat'),
(1076, 'Lakhapat'),
(1077, 'Kachch'),
(1078, 'Ahmadabad City'),
(1079, 'City Taluka'),
(1080, 'Daskroi'),
(1081, 'Sanand'),
(1082, 'Gandhinagar'),
(1083, 'Gandhi Nagar'),
(1084, 'Sannad'),
(1085, 'Viramgam'),
(1086, 'Kadi'),
(1087, 'Kalol'),
(1088, 'Detroj Rampura'),
(1089, 'Detroj- Rampura'),
(1090, 'Detroj-Rampura'),
(1091, 'Mandal'),
(1092, 'Patdi'),
(1093, 'Detrioj-Rampura'),
(1094, 'Dascroi'),
(1095, 'Bavla'),
(1096, 'Dholka'),
(1097, 'Ranpur'),
(1098, 'Barwala'),
(1099, 'Dehgam'),
(1100, 'Dasroi'),
(1101, 'Ahmedabad City'),
(1102, 'Mahesana'),
(1103, 'Boriavi'),
(1104, 'Mansa'),
(1105, 'Dasada'),
(1106, 'Dasda'),
(1107, 'Dasdaa'),
(1108, 'Vijapur'),
(1109, 'Satlasana'),
(1110, 'Visnagar'),
(1111, 'Himatnagar'),
(1112, 'Himatnagar.'),
(1113, 'Idar'),
(1114, 'Himatanagar'),
(1115, 'Prantij'),
(1116, 'Talod'),
(1117, 'Khedbrahma'),
(1118, 'Vadali'),
(1119, 'Bhiloda'),
(1120, 'Vijaynagar'),
(1121, 'Modasa'),
(1122, 'Meghraj'),
(1123, 'Bayad'),
(1124, 'Dhansura'),
(1125, 'Malpur'),
(1126, 'Sabarkantha'),
(1127, 'Vijaynagar.'),
(1128, 'Becharaji'),
(1129, 'Kheralu'),
(1130, 'Unjha'),
(1131, 'Sidhpur'),
(1132, 'Vadnagar'),
(1133, 'Chanasma'),
(1134, 'Harij'),
(1135, 'Sami'),
(1136, 'Santalpur'),
(1137, 'Dabhoi'),
(1138, 'Satalasana'),
(1139, 'Vadnabar'),
(1140, 'Amirgadh'),
(1141, 'Banaskantha'),
(1142, 'Palanpur'),
(1143, 'Vadgam'),
(1144, 'Danta'),
(1145, 'Shri Amirgadh'),
(1146, 'Shriamirgadh'),
(1147, 'Vadagam'),
(1148, 'Dhanera'),
(1149, 'Tharad'),
(1150, 'Bhabhar'),
(1151, 'Deodar'),
(1152, 'Radhanpur'),
(1153, 'Santalpurp'),
(1154, 'Dantiwada'),
(1155, 'Disa'),
(1156, 'Deesa'),
(1157, 'Kankraj'),
(1158, 'Kankrej'),
(1159, 'Vav'),
(1160, 'Nadiad'),
(1161, 'Naidiad'),
(1162, 'Mahemdavad'),
(1163, 'Mehmedabad'),
(1164, 'Umreth'),
(1165, 'Kheda'),
(1166, 'Mahemdabad'),
(1167, 'Sojitra'),
(1168, 'Matar'),
(1169, 'Mahudha'),
(1170, 'Anand'),
(1171, 'Kathlal'),
(1172, 'Petlad'),
(1173, 'Kapadwanj'),
(1174, 'Tarapur'),
(1175, 'Kapadvanj'),
(1176, 'Borsad'),
(1177, 'Perlad'),
(1178, 'Khambhat'),
(1179, 'Tarapura='),
(1180, 'Unreth'),
(1181, 'Thasra'),
(1182, 'Birpur'),
(1183, 'Thsra'),
(1184, 'Balasinor'),
(1185, 'Virpur'),
(1186, 'Lunawada'),
(1187, 'Panchmahals'),
(1188, 'Anklav'),
(1189, 'Godhra'),
(1190, 'Savli'),
(1191, 'Godhara'),
(1192, 'Shehera'),
(1193, 'Santrampur'),
(1194, 'Morwa (Hadaf)'),
(1195, 'Morva Hadaf'),
(1196, 'Devgadbaria'),
(1197, 'Devgadh Baria'),
(1198, 'Limkheda'),
(1199, 'Dhanpur'),
(1200, 'Dohad'),
(1201, 'Dahod'),
(1202, 'Garbada'),
(1203, 'Panchamahals'),
(1204, 'Jhalod'),
(1205, 'Fatepura'),
(1206, 'Jahlod'),
(1207, 'Likheda'),
(1208, 'Khanpur'),
(1209, 'Kadana'),
(1210, 'Santrampura'),
(1211, 'Ghoghamba'),
(1212, 'Ghoghmba'),
(1213, 'Halol'),
(1214, 'Holol'),
(1215, 'Jambughoda'),
(1216, 'Vadodara'),
(1217, 'Sinor'),
(1218, 'Narmada'),
(1219, 'Tilakwada'),
(1220, 'Naswadi'),
(1221, 'Sankheda'),
(1222, 'Bodeli'),
(1223, 'Pavijetpur'),
(1224, 'Nasvadi'),
(1225, 'Chhotaudepur'),
(1226, 'Pavijetpura'),
(1227, 'Chhota Udepur'),
(1228, 'Chhota-Udepur'),
(1229, 'Ch.Udepur'),
(1230, 'Kawant'),
(1231, 'Karjan'),
(1232, 'Padra'),
(1233, 'Rajpipla'),
(1234, 'Vaghodia'),
(1235, 'Vaghoida'),
(1236, 'Vaghodida'),
(1237, 'Anklesvar'),
(1238, 'Jambusar'),
(1239, 'Nandod'),
(1240, 'Bharuch'),
(1241, 'Bahruch'),
(1242, 'Amod'),
(1243, 'Hansot'),
(1244, 'Vagra'),
(1245, 'Jhagadia'),
(1246, 'Dediapada'),
(1247, 'Jambsuar'),
(1248, 'Ankleshwar'),
(1249, 'Andada'),
(1250, 'Sagbara'),
(1251, 'Surat'),
(1252, 'Rajpipala'),
(1253, 'Valia'),
(1254, 'Nadod'),
(1255, 'Chorasi'),
(1256, 'Chorayasi'),
(1257, 'Olpad'),
(1258, 'Sayan'),
(1259, 'Kamrej'),
(1260, 'Makrej'),
(1261, 'Surat City'),
(1262, 'Udhna'),
(1263, 'Sachin'),
(1264, 'Lajpore'),
(1265, 'Valod'),
(1266, 'Bardoli'),
(1267, 'Choryasi'),
(1268, 'Palsana'),
(1269, 'Songadh'),
(1270, 'Vyara'),
(1271, 'Fort Songadh'),
(1272, 'Nijhar'),
(1273, 'Nizar'),
(1274, 'Uchchhal'),
(1275, 'Velachha'),
(1276, 'Umarpada'),
(1277, 'Vankal'),
(1278, 'Zankhvav'),
(1279, 'Variav'),
(1280, 'Ahwa'),
(1281, 'Dang'),
(1282, 'Dangs'),
(1283, 'The Dangs'),
(1284, 'Valsad'),
(1285, 'Dharampur'),
(1286, 'Hanuman Bhagda'),
(1287, 'Chikhli'),
(1288, 'Bansda'),
(1289, 'Vansda'),
(1290, 'Kaprada'),
(1291, 'Umargam'),
(1292, 'Umbergaon'),
(1293, 'Gandevi'),
(1294, 'Pardi'),
(1295, 'Umargarm'),
(1296, 'Dadra & Nagar Haveli'),
(1297, 'Dungri'),
(1298, 'Jalalpore'),
(1299, 'Jalalporre');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0 -  Male , 1 - Female',
  `image` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_verify` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `gender`, `image`, `address`, `password`, `city_id`, `status`, `is_verify`) VALUES
(1, 'test', 'test@gmail.com', '123123123', 1, 's5.png', 'aaaa', '4297f44b13955235245b2497399d7a93', 966, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7352;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
