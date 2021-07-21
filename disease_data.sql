-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseases` (
  `DID` BIGINT UNSIGNED,
  `DName` varchar(255),
  `Description` LONGTEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diseases`
--

LOCK TABLES `diseases` WRITE;
/*!40000 ALTER TABLE `diseases` DISABLE KEYS */;
INSERT INTO `diseases` VALUES ('1.0','Loosening up the joints',''),('2.0','Knee joints',''),('3.0','Hip joints',''),('4.0','Tiredness',''),('5.0','Hand and wrist joints',''),('6.0','Shoulder',''),('7.0','Tension in head, neck and shoulder',''),('8.0','Prolapse',''),('9.0','Obesity',''),('10.0','Tone',''),('11.0','Abdominal muscles',''),('12.0','Lower back muscles',''),('13.0','Loosening Spinal Vertebrae',''),('14.0','Impotence',''),('15.0','Sterility',''),('16.0','Menstrual Problem',''),('17.0','Back Massage',''),('18.0','Digestion',''),('19.0','Constipation',''),('20.0','Tightness',''),('21.0','Circulatory system',''),('22.0','Nervous System',''),('23.0','Hormonal system',''),('24.0','Pregnancy',''),('25.0','Upper Back Muscles',''),('26.0','Chest muscles',''),('27.0','Stiffness of the back',''),('28.0','Postnatal recovery',''),('29.0','Pelvis',''),('30.0','Abdomen',''),('31.0','Gynaecological Disorders',''),('32.0','Pelvic muscles',''),('33.0','Frustation',''),('34.0','Lightening of mood',''),('35.0','Thigh Muscles',''),('36.0','Arms muscles',''),('37.0','Blood Circulation in leg',''),('38.0','Eye muscles',''),('39.0','Eye Blinking',''),('40.0','Squint',''),('41.0','Pshyco-physiological system',''),('42.0','slipped disc',''),('43.0','stiff neck',''),('44.0','stooping figure',''),('45.0','spinal problems',''),('46.0','Cervical spondylitis',''),('47.0','digestive peristalsis',''),('48.0','tension in the perineum',''),('49.0','mind calmness',''),('50.0','blood pressure ',''),('51.0','stimulating digestive process',''),('52.0','toning lumbar region of spine',''),('53.0','balancing reproductive system',''),('54.0','varicose veins',''),('55.0','aching muscles',''),('56.0','fluid retention in the legs',''),('57.0','emotional tension',''),('58.0','nervous depression',''),('59.0','stutter',''),('60.0','introvert',''),('61.0','uncontrollable thoughts',''),('62.0','sciatica',''),('63.0','waistline fat',''),('64.0','pressure in the head',''),('65.0','backache',''),('66.0','rounded back  ',''),('67.0','drooping shoulders',''),('68.0','posture',''),('69.0','Asthma',''),('70.0','bronchitis',''),('71.0','Lung ailments',''),('72.0','round shoulders',''),('73.0','breathing',''),('74.0',"writer\'s cramp",''),('75.0','ann stiffness',''),('76.0',' height problems',''),('77.0','waist problems',''),('78.0','coordination',''),('79.0','Weight problems',''),('80.0','Muscle Strenghtening','');
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-22 15:20:24
