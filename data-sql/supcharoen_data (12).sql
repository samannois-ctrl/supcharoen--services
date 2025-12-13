-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 12:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supcharoen_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_data`
--

DROP TABLE IF EXISTS `tbl_agent_data`;
CREATE TABLE `tbl_agent_data` (
  `id` int(11) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `agent_com` double(5,2) NOT NULL,
  `agent_tax` double(4,2) NOT NULL,
  `agent_status` enum('0','1','2') NOT NULL COMMENT '0 not use , 1 use , 2 delete',
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent_data`
--

INSERT INTO `tbl_agent_data` (`id`, `agent_name`, `telephone`, `agent_com`, `agent_tax`, `agent_status`, `user_update`) VALUES
(1, 'เอกชัย', '0846547892', 11.00, 3.00, '1', 1),
(2, 'ถาวร', '0849635423', 8.00, 2.00, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_act_data`
--

DROP TABLE IF EXISTS `tbl_car_act_data`;
CREATE TABLE `tbl_car_act_data` (
  `id` int(11) NOT NULL,
  `date_work` date NOT NULL,
  `work_id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `code_id` int(10) NOT NULL,
  `act_no` varchar(50) NOT NULL,
  `corp_id` int(10) NOT NULL,
  `act_type_id` int(10) NOT NULL,
  `act_date_start` date NOT NULL,
  `act_date_end` date NOT NULL,
  `act_date_notify` date NOT NULL,
  `act_follow` enum('0','1','2') NOT NULL COMMENT ')    1  ตามเอกสาร  2  ไม่ตามเอกสาร',
  `act_recieve` enum('0','1','2') NOT NULL COMMENT ')    1  รับ พ.ร.บ. แล้ว  2  ยังไม่รับ พ.ร.บ.',
  `act_price` double(10,2) NOT NULL,
  `act_discount` double(6,2) NOT NULL,
  `act_tax` double(6,2) NOT NULL,
  `act_vat` double(6,2) NOT NULL,
  `act_price_net` double(10,2) NOT NULL,
  `act_price_total` decimal(10,2) NOT NULL,
  `act_cancel_no` varchar(50) NOT NULL,
  `act_cancel_date` date NOT NULL,
  `act_cancel_reason` text NOT NULL,
  `act_remark` text NOT NULL,
  `act_paid` enum('0','1') NOT NULL,
  `act_payment_duedate` date NOT NULL,
  `act_payment_remark` text NOT NULL,
  `back_act_notify_date` date NOT NULL,
  `back_act_recieve_date` date NOT NULL,
  `back_act_no` varchar(100) NOT NULL,
  `back_act_remark` text NOT NULL,
  `user_update` int(10) NOT NULL,
  `act_paid_day` date DEFAULT NULL,
  `act_com_1` double(5,2) NOT NULL,
  `act_tax_1` double(5,2) NOT NULL,
  `act_com_2` double(5,2) NOT NULL,
  `act_tax_2` double(5,2) NOT NULL,
  `act_com_3` double(5,2) NOT NULL,
  `act_tax_3` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_act_data`
--

INSERT INTO `tbl_car_act_data` (`id`, `date_work`, `work_id`, `agent_id`, `code_id`, `act_no`, `corp_id`, `act_type_id`, `act_date_start`, `act_date_end`, `act_date_notify`, `act_follow`, `act_recieve`, `act_price`, `act_discount`, `act_tax`, `act_vat`, `act_price_net`, `act_price_total`, `act_cancel_no`, `act_cancel_date`, `act_cancel_reason`, `act_remark`, `act_paid`, `act_payment_duedate`, `act_payment_remark`, `back_act_notify_date`, `back_act_recieve_date`, `back_act_no`, `back_act_remark`, `user_update`, `act_paid_day`, `act_com_1`, `act_tax_1`, `act_com_2`, `act_tax_2`, `act_com_3`, `act_tax_3`) VALUES
(1, '2022-12-12', 1, 1, 6, '', 1, 5, '2022-12-10', '2023-12-10', '2022-12-11', '1', '0', 3.00, 30.00, 14.00, 229.04, 3.00, '3.00', 'เลขที่ยกเลิก พ.ร.บ.', '2022-12-10', 'เหตุผลที่ยกเลิก พ.ร.บ.\r\n', 'หมายเหตุ รายละเอียด การยกเลิก พ.ร.บ.\r\n', '1', '2022-12-14', 'หมายเหตุ สถานะการชำระเงิน พ.ร.บ.\r\n', '2022-12-10', '2022-12-10', 'เลขที่ พ.ร.บ.สลักหลัง', 'หมายเหตุ เลขที่ พ.ร.บ.สลักหลังx\r\n\r\n', 1, '2022-12-12', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(7, '2022-12-13', 2, 0, 5, '', 1, 0, '2022-12-10', '2023-12-10', '2022-12-11', '1', '0', 3.00, 0.00, 14.00, 229.04, 3.00, '3.00', '', '0000-00-00', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', 1, '0000-00-00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(8, '2022-12-13', 3, 1, 5, '', 2, 0, '2022-12-10', '2023-12-10', '2022-12-10', '1', '0', 1.00, 0.00, 6.00, 98.14, 1.00, '1.00', '', '0000-00-00', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', 1, '0000-00-00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(9, '2022-12-13', 4, 1, 5, '', 1, 6, '2022-12-10', '2023-12-10', '2022-12-10', '1', '0', 2500.00, 0.00, 10.00, 163.59, 2327.00, '2500.00', '', '0000-00-00', '', '', '0', '2023-01-13', '', '0000-00-00', '0000-00-00', '', '', 1, '0000-00-00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_check`
--

DROP TABLE IF EXISTS `tbl_car_check`;
CREATE TABLE `tbl_car_check` (
  `id` int(10) NOT NULL,
  `work_id` int(10) NOT NULL,
  `car_check_date` date NOT NULL,
  `car_check_time` varchar(10) NOT NULL,
  `car_check_price` double(8,2) NOT NULL,
  `car_check_discount` double(5,2) NOT NULL,
  `car_check_total` double(8,2) NOT NULL,
  `registration_book` enum('0','1') NOT NULL,
  `car_check_remark` text NOT NULL,
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_check`
--

INSERT INTO `tbl_car_check` (`id`, `work_id`, `car_check_date`, `car_check_time`, `car_check_price`, `car_check_discount`, `car_check_total`, `registration_book`, `car_check_remark`, `user_update`) VALUES
(1, 4, '2022-12-10', '16:54', 3000.00, 300.00, 2700.00, '1', 'aasdfa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_data`
--

DROP TABLE IF EXISTS `tbl_car_data`;
CREATE TABLE `tbl_car_data` (
  `id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `vehicle_regis` varchar(10) NOT NULL,
  `province_regis` int(10) NOT NULL,
  `date_regist` text NOT NULL,
  `year_car` varchar(5) NOT NULL,
  `vin_no` varchar(50) NOT NULL,
  `engine_size` varchar(10) NOT NULL,
  `car_brand` varchar(20) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `car_type_id` int(5) NOT NULL,
  `date_add` date NOT NULL,
  `car_status` enum('0','1','2') NOT NULL,
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_data`
--

INSERT INTO `tbl_car_data` (`id`, `cust_id`, `vehicle_regis`, `province_regis`, `date_regist`, `year_car`, `vin_no`, `engine_size`, `car_brand`, `car_model`, `car_type_id`, `date_add`, `car_status`, `user_update`) VALUES
(2, 4, 'กย4995', 90, '1 ธค 2510', '2510', 'ML955552525335', '30000', 'Mitsubishi', 'pajero', 1, '2022-12-09', '1', 1),
(3, 4, 'กค 5500', 10, '15 มค 2520', '2520', 'VLX99882MSSSS0000', '2500', 'Isuzu', 'Dmax', 1, '2022-12-10', '1', 1),
(4, 4, 'ขง 1677', 90, '22 กย 2515', '2515', 'AC87899225202', '115', 'Suzuki', 'Shooter', 4, '2022-12-10', '1', 1),
(5, 5, 'งบ1667', 90, '25 มค 2560', '2018', 'AC339955', '1200', 'suzuki', 'swift', 1, '2022-12-13', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_insurance_data`
--

DROP TABLE IF EXISTS `tbl_car_insurance_data`;
CREATE TABLE `tbl_car_insurance_data` (
  `id` int(10) NOT NULL,
  `ins_date_work` date NOT NULL,
  `work_id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `ins_code_id` int(10) NOT NULL,
  `insurance_no` varchar(100) NOT NULL,
  `insurance_date_contract` date NOT NULL,
  `insurance_start` date NOT NULL,
  `insurance_end` date NOT NULL,
  `insurance_corp_id` int(10) NOT NULL,
  `insurance_type_id` int(10) NOT NULL,
  `insurance_fix_garace` enum('0','1','2') NOT NULL COMMENT '1 ซ่อมห้าง   2 อู่  0 ไม่ระบุ',
  `insurance_renew` enum('0','1') NOT NULL COMMENT '0 ต่ออายุ 1 งานใหม่',
  `followDocIns` enum('0','1') NOT NULL COMMENT '1 ตามเอกสาร 0 ไม่ตาม',
  `work_ins_type` enum('1','2') NOT NULL COMMENT '1 ต่ออายุ  2 งานใหม่',
  `ins_follow` int(11) NOT NULL COMMENT ' 1  ตามเอกสาร  2  ไม่ตามเอกสาร',
  `ins_data_status` enum('0','1') NOT NULL COMMENT '0 delete  1 use ',
  `insurance_price` double(10,2) NOT NULL,
  `insurance_discount` double(10,2) NOT NULL,
  `insurance_duty` double(10,2) NOT NULL,
  `insurance_tax` double(10,2) NOT NULL,
  `insurance_total_net` double(10,2) NOT NULL,
  `insurance_total` double(10,2) NOT NULL,
  `ins_cancel_no` varchar(100) NOT NULL,
  `ins_cancel_date` date NOT NULL,
  `ins_cancel_reason` text NOT NULL,
  `insurance_remark` text NOT NULL,
  `ins_paid` enum('0','1','2') NOT NULL COMMENT '0 notpaid  1 paid',
  `paid_date` date NOT NULL,
  `ins_paid_remark` text NOT NULL,
  `payment_due_date` date NOT NULL,
  `date_insurance_notifi_endorse` date NOT NULL,
  `date_insurance_document_endorse` date NOT NULL,
  `insurance_number_endorse` varchar(100) NOT NULL,
  `insurance_remark_endorse` text NOT NULL,
  `date_send_document` date NOT NULL,
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_insurance_data`
--

INSERT INTO `tbl_car_insurance_data` (`id`, `ins_date_work`, `work_id`, `agent_id`, `ins_code_id`, `insurance_no`, `insurance_date_contract`, `insurance_start`, `insurance_end`, `insurance_corp_id`, `insurance_type_id`, `insurance_fix_garace`, `insurance_renew`, `followDocIns`, `work_ins_type`, `ins_follow`, `ins_data_status`, `insurance_price`, `insurance_discount`, `insurance_duty`, `insurance_tax`, `insurance_total_net`, `insurance_total`, `ins_cancel_no`, `ins_cancel_date`, `ins_cancel_reason`, `insurance_remark`, `ins_paid`, `paid_date`, `ins_paid_remark`, `payment_due_date`, `date_insurance_notifi_endorse`, `date_insurance_document_endorse`, `insurance_number_endorse`, `insurance_remark_endorse`, `date_send_document`, `user_update`) VALUES
(1, '2022-12-14', 4, 0, 0, '5555-999', '2022-12-11', '2022-12-11', '2023-12-11', 3, 7, '1', '1', '1', '1', 0, '1', 16000.00, 20.00, 60.00, 1046.71, 14893.00, 15980.00, 'เลขที่ยกเลิกกรมธรรม์', '2022-12-10', 'เหตุผลยกเลิกกรมธรรม์\r\n', 'หมายเหตุรายละเอียด การยกเลิกกรมธรรม์x\r\n', '0', '0000-00-00', '', '2022-12-13', '2022-12-10', '2022-12-11', 'เลขที่กรมธรรม์สลักหลัง', 'หมายเหตุสลักหลังกรมธรรม์\r\n\r\n', '2022-12-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_service`
--

DROP TABLE IF EXISTS `tbl_car_service`;
CREATE TABLE `tbl_car_service` (
  `id` int(10) NOT NULL,
  `work_id` int(10) NOT NULL,
  `car_check_price_service` double(10,2) NOT NULL,
  `service_other_price` double(10,2) NOT NULL,
  `service_remark` text NOT NULL,
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_service`
--

INSERT INTO `tbl_car_service` (`id`, `work_id`, `car_check_price_service`, `service_other_price`, `service_remark`, `user_update`) VALUES
(2, 4, 2000.00, 2000.00, 'หดฟหกดฟำไ', 1),
(3, 4, 2000.00, 2500.00, 'หดฟหกดฟำไ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_tax_data`
--

DROP TABLE IF EXISTS `tbl_car_tax_data`;
CREATE TABLE `tbl_car_tax_data` (
  `id` int(11) NOT NULL,
  `date_tax_work` date NOT NULL,
  `work_id` int(11) NOT NULL,
  `date_registration_start` date NOT NULL,
  `date_registration_end` date NOT NULL,
  `have_manual` enum('0','1') NOT NULL,
  `do_register` enum('0','1') NOT NULL,
  `tax_price` double(10,2) NOT NULL,
  `tax_recall` double(5,2) NOT NULL,
  `tax_pay_date` date NOT NULL,
  `tax_remark` text NOT NULL,
  `do_tax` enum('0','1','2','3','4') NOT NULL COMMENT '0 ไม่ระบุ 1 ทำ  2 ไม่ทำ 3 ต่อทันที 4 เตรียมต่อทะเบียน',
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_tax_data`
--

INSERT INTO `tbl_car_tax_data` (`id`, `date_tax_work`, `work_id`, `date_registration_start`, `date_registration_end`, `have_manual`, `do_register`, `tax_price`, `tax_recall`, `tax_pay_date`, `tax_remark`, `do_tax`, `user_update`) VALUES
(1, '2022-12-13', 1, '2022-12-12', '2023-12-10', '1', '0', 1500.00, 0.00, '2022-12-10', 'tax_remark', '', 0),
(3, '2022-12-13', 4, '0000-00-00', '2023-12-10', '1', '1', 1600.00, 0.00, '2022-12-10', 'test', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_type`
--

DROP TABLE IF EXISTS `tbl_car_type`;
CREATE TABLE `tbl_car_type` (
  `id` int(10) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_type`
--

INSERT INTO `tbl_car_type` (`id`, `type_name`, `type_status`) VALUES
(1, 'รย.1 (รถเก๋ง, รถกระบะ 4 ประตู)', '1'),
(2, 'รย.2 (รถตู้, รถ 2 แถว)', '1'),
(3, 'รย.3 (รถกระบะ)', '1'),
(4, 'รย.12 (รถจักรยานยนต์) ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_code_data`
--

DROP TABLE IF EXISTS `tbl_code_data`;
CREATE TABLE `tbl_code_data` (
  `id` int(10) NOT NULL,
  `conde_name` varchar(100) NOT NULL,
  `code_status` enum('0','1','2') NOT NULL,
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_code_data`
--

INSERT INTO `tbl_code_data` (`id`, `conde_name`, `code_status`, `user_update`) VALUES
(1, 'Jens Brincker	', '1', 1),
(2, 'Mark Hay', '1', 1),
(3, 'Anthony Davie', '1', 1),
(4, 'David Perry', '1', 1),
(5, 'Alan Gilchrist', '1', 1),
(6, 'Perry Perry', '1', 1),
(7, 'Mamm', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_data`
--

DROP TABLE IF EXISTS `tbl_customer_data`;
CREATE TABLE `tbl_customer_data` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(150) NOT NULL,
  `cust_nickname` varchar(100) NOT NULL,
  `cust_telephone_1` varchar(15) NOT NULL,
  `cust_telephone_2` varchar(15) NOT NULL,
  `is_corporation` enum('0','1') NOT NULL,
  `user_update` int(11) NOT NULL,
  `cust_status` enum('0','1','2') NOT NULL,
  `date_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_data`
--

INSERT INTO `tbl_customer_data` (`id`, `cust_name`, `cust_nickname`, `cust_telephone_1`, `cust_telephone_2`, `is_corporation`, `user_update`, `cust_status`, `date_add`) VALUES
(1, 'สุริยา ทองชัย', 'ยาซ่า', '0819699987', '094356987', '0', 1, '1', '2022-12-08'),
(2, 'อินทิรา คานธี', 'อินดี้', '0875633365', '0875633364', '1', 0, '1', '2022-12-07'),
(4, 'นายเมตตา แซ่ลิ่ม ', 'ไก่', '0819887532', '8213655542', '1', 1, '1', '2022-12-08'),
(5, 'อาซัน ยะสะแม', 'ซัน', '0874563321', '', '0', 1, '1', '2022-12-09'),
(6, ' ดรัณภัทร ชัยกรจิรกุล', 'ภัทร', '0819889532', '8213652542', '0', 1, '1', '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurance_company`
--

DROP TABLE IF EXISTS `tbl_insurance_company`;
CREATE TABLE `tbl_insurance_company` (
  `id` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_code` varchar(10) NOT NULL,
  `company_status` enum('0','1') NOT NULL DEFAULT '1',
  `company_order` int(5) NOT NULL,
  `user_update` int(10) NOT NULL,
  `company_full_name` text NOT NULL,
  `company_addr` text NOT NULL,
  `company_telephone` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `company_tax_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_insurance_company`
--

INSERT INTO `tbl_insurance_company` (`id`, `company_name`, `company_code`, `company_status`, `company_order`, `user_update`, `company_full_name`, `company_addr`, `company_telephone`, `company_logo`, `company_tax_no`) VALUES
(1, 'PS-อลิอันซ์', 'company_co', '0', 1, 2, 'บริษัท อลิอันประกันภัย จำกัด (มหาชน)', '898 อาคารเพลินจิตทาวเวอร์ ถนนเพลินจิต แขวงลุมพินี  เขตปทุมวัน กรุงเทพมหานคร 10330', '02-638-9333', '6feaa59e760db35f01d582615b0b5ee1.png', ''),
(2, 'PS-ทิพยะ', 'company_co', '0', 2, 1, 'บริษัท ทิพยะประกันภัย จำกัด (มหาชน)', '1115 ถ.พระราม 3 แขวงช่องนนทรี เขตยานนาวา กรุงเทพฯ 10120', '', '50a6b91039df1faec6eb07889b0edaaf.jpg', ''),
(3, 'PS-เมืองไทย', 'company_co', '0', 3, 1, 'บริษัท อาคเนย์ประกันภัย จำกัด (มหาชน)', '315 อาคารอาคเนย์ ชั้นที่ จี ถึงชั้น 7 ถนนสีลม แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500  ', '1726', '097446816d0f36a3de04448b5ebfe56c.jpg', ''),
(4, 'PS-MSIG', 'company_co', '0', 4, 1, '', '', '', '8217c5fea17bc2ed1c5b74d935b2442f.jpg', ''),
(5, 'ภัทรสิน-อาคเนย์รถใหญ่', 'company_co', '0', 5, 1, 'บริษัท อาคเนย์ประกันภัย จำกัด (มหาชน)', '315 อาคารอาคเนย์ ชั้นที่ จี ถึงชั้น 7 ถนนสีลม แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500  ', '1726', 'aa2df08aa78413695ec26578190b3876.jpg', ''),
(6, 'กลาง', 'company_co', '1', 6, 1, 'บริษัท กลางคุ้มครองผู้ประสบภัยจากรถ จำกัด', '44/1 อาคารรุ่งโรจน์ธนกุล ชั้น 11 ถนนรัชดาภิเษก แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10310  โทร 0-2100-9191', '12345', '', ''),
(7, 'CHUBB', 'company_co', '1', 7, 1, 'บริษัท ชับบ์สามัคคีประกันภัย จำกัด (มหาชน)  (สำนักงานใหญ่)', '2/4 อาคารชับบ์ ชั้นที่ 12 โครงการนอร์ธปาร์ค ถนนวิภาวดีรังสิต  แขวงทุ่งสองห้อง เขตหลักสี่กรุงเทพฯ 10210  ', 'โทร. 0 2640 4500 และ 0 2611 4455', 'dad885bb3cff47019a2d4d8b70e6c046.jpg', '0107537001510'),
(8, 'CHUBB_JOHN', 'company_co', '1', 8, 1, 'บริษัท ชับบ์สามัคคีประกันภัย จำกัด (มหาชน)', '2/4 อาคารชับบ์ ชั้นที่ 12 โครงการนอร์ธปาร์ค ถนนวิภาวดีรังสิต  แขวงทุ่งสองห้อง เขตหลักสี่กรุงเทพฯ 10210 โทร. 0 2555 9100', '02-640-4500', '3aac1341edb0f8d4d9b382fbbf1fef41.jpg', ''),
(9, 'อาคเนย์', 'company_co', '1', 9, 1, 'บริษัท อาคเนย์ประกันภัย จำกัด', '315 อาคารอาคเนย์ ชั้นที่ G-7 ถนนสีลม แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500  ', '', 'ffa8f7e67ec7523aba9da4912dacb508.jpg', '0107555000392'),
(10, 'เทเวศ', 'company_co', '1', 10, 1, 'บริษัท เทเวศประกันภัย จำกัด (มหาชน) ', '97 และ 99 อาคารเทเวศประกันภัย ถนนราชดำเนินกลาง แขวงบวรนิเวศ เขตพระนคร กรุงเทพฯ 10200', '02-670-4444', 'b69f3343072ddfa2145dbb80bed5c700.jpg', '0107537002478'),
(11, 'LMG', 'company_co', '1', 11, 1, 'บริษัท แอลเอ็มจี ประกันภัย จำกัด (มหาชน)', 'ชั้น 14,15, 17 และ 19 อาคารจัสมินซิตี้ เลขที่ 2 ซอยสุขุมวิท 23 ถนนสุขุมวิท แขวงคลองเตยเหนือ เขตวัฒนา กรุงเทพฯ 10110 โทร 0-2661-6000', '1790', '4879452d26885e29ce37cd8b65e0d68b.jpg', ''),
(12, 'สินมั่นคง', 'company_co', '1', 12, 1, 'บริษัท สินมั่นคงประกันภัย จำกัด (มหาชน)', 'เลขที่ 313 ถนนศรีนครินทร์ แขวงหัวหมาก เขตบางกะปิ กรุงเทพฯ 10240', '1726', '885a70ddec316ac8adec2027e681cb65.jpg', '0107537001641'),
(13, 'วิริยะ', 'company_co', '1', 13, 1, 'บริษัท วิริยะประกันภัย จำกัด (มหาชน)', 'เลขที่ 121/7, 121/14-23, 121/25-28 ชั้น 2-6 อาคารอาร์ เอส ทาวเวอร์  ถนนรัชดาภิเษก ดินแดง กรุงเทพฯ 10400 ', '1557', '73ffb8f160db4d169d4bf724801de784.jpg', ''),
(14, 'ไทยประกันภัย', 'company_co', '1', 14, 1, 'บริษัท ไทยประกันภัย จำกัด (มหาชน) ', '34/3 อาคารไทยประกันภัย ซอยหลังสวน ถนนเพลินจิต แขวงลุมพินี เขตปทุมวัน กรุงเทพฯ 10330', '0-2613-0123', 'f1d0eceec56b81cc2a94934b38144a11.jpg', '0107536000820'),
(15, 'เอเชียประกันภัย', 'company_co', '1', 15, 1, 'บริษัท เอเชียประกันภัย จำกัด (มหาชน)', 'เลขที่ 183 อาคารรีเจ้นท์เฮ้าส์ ชั้น 12 ถนนราชดำริ แขวงลุมพินี เขตปทุมวัน กรุงเทพ 10330 โทร: 02-869-3399', '', '3edc250834c66c40d0e52bbeef8563b3.jpg', ''),
(16, 'นำสิน', 'company_co', '1', 16, 1, 'บริษัท นำสินประกันภัย จำกัด (มหาชน)', '767 ถนนกรุงเทพ-นนทบุรี แขวงบางซื่อ เขตบางซื่อ กรุงเทพมหานคร 10800 โทร.02-017-3333', '', 'f8ba5d7fd4272c04b2357a0c654feee1.jpg', ''),
(17, 'MSIG', 'company_co', '1', 17, 1, 'บริษัท เอ็มเอสไอจี จำกัด (มหาชน)', '1908 อาคารเอ็มเอสไอจี ถ.เพชรบุรีตัดใหม่ แขวงบางกะปิ เขตห้วยขวาง 10310 เบอร์ติดต่อ 0 2788 8888', '1259', '81828cc89a3128410dee71343d46a2fc.jpg', ''),
(18, 'โตเกียวมารีน', 'company_co', '0', 18, 1, 'บริษัท คุ้มภัยโตเกียวมารีนประกันภัย (ประเทศไทย) จำกัด ', 'เลขที่ 1 อาคารเอ็มไพร์ ชั้น 40 ถนนสาทรใต้  แขวงยานนาวา เขตสาทร กรุงเทพฯ 10120 โทร. 052-686-8888', '02-686-8616', 'cbd45d81827e22710aa375b0801d91bd.jpg', ''),
(19, 'อลิอันซ์ อยุธยา', 'company_co', '1', 19, 1, 'บริษัท อลิอันซ์ อยุธยา ประกันภัย จำกัด (มหาชน) ', '898 อาคารเพลินจิตทาวเวอร์ ถนนเพลินจิต แขวงลุมพินี เขตปทุมวัน กรุงเทพฯ 10330 (สำนักงานใหญ่) ', '02-638-9333', '614a4ea7e813d646e4786acd7c4b971c.jpg', '0107554000259'),
(20, 'แอกซ่า', 'company_co', '1', 20, 1, 'บริษัท แอกซ่าประกันภัย จำกัด (มหาชน) สาขาหาดใหญ่                                           สาขาที่00002', '17,19 ถนนจุติอุทิศ 4  ตำบลหาดใหญ่ อำเภอหาดใหญ่ สงขลา 90110', '', 'c609ec3387638f13965fa58f2e598838.jpg', '0107537002729'),
(21, 'เมืองไทย', 'company_co', '1', 21, 1, 'บริษัท เมืองไทยประกันภัย จำกัด (มหาชน)', '252 ถ.รัชดาภิเษก แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10310 โทร.0-2665-4000', '', 'c13220cd89603ff441ff7501cafaf2a3.jpg', ''),
(22, 'คุ้มภัย', 'company_co', '0', 22, 1, 'บริษัท คุ้มภัยโตเกียวมารีนประกันภัย จำกัด (มหาชน)', '26/5-6, 26/10-11, 26/16-17 และ 26/18-19 อาคารอรกานต์ ถ.ชิดลม แขวงลุมพินี เขตปทุมวัน กรุงเทพฯ 10330 โทร : 0-2257-8000', '', 'c9876e66a98ff30939af4f08164cf5e3.jpg', ''),
(23, 'กรุงเทพประกันภัย', 'company_co', '1', 23, 1, 'บริษัท กรุงเทพประกันภัย จำกัด (มหาชน) (สาขาที่ 00002) ', '830 ถนนเพชรเกษม ตำบลหาดใหญ่ อำเภอหาดใหญ่ จังหวัดสงขลา 90110', '0 2285 8888', '9f7ac948583aa92d2ba9eafd496b2afd.jpg', '0107536000625'),
(24, 'กรุงไทยพาณิชย์', 'company_co', '1', 24, 1, 'บริษัท กรุงไทยพานิชประกันภัย จำกัด (มหาชน) ', '1122 อาคารเคพีไอทาวเวอร์ ถนนเพชรบุรีตัดใหม่ แขวงมักกะสัน เขตราชเทวี กรุงเทพฯ 10400 ', '023095888', '1cd45938ca5af4950627bf4d4fccbf8d.jpg', '0107555000121'),
(25, 'ทิพยประกันภัย', 'company_co', '1', 25, 1, 'บริษัท ทิพยประกันภัย จำกัด (มหาชน) (สำนักงานใหญ่) ', '1115 ถนนพระราม 3 แขวงช่องนนทรี เขตยานนาวา กรุงเทพ 10120 ', '1736', '3782db99bb490925e45b7594358ea8b1.jpg', '0107538000533'),
(26, 'เจ้าพระยา', 'company_co', '0', 26, 1, 'บริษัท เจ้าพระยา จำกัด (มหาชน)', 'ไทยแทรคเตอร์ 3675 อาคารกรุง ถนนพระรามที่ 4 แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10110', '', '5da7bc9e5066db2c985d221cc5188839.jpg', ''),
(27, 'AIG', 'company_co', '1', 27, 1, 'บริษัท เอไอจี ประกันภัย (ประเทศไทย) จำกัด (มหาชน)', 'ชั้น 23 อาคารสยามพิวรรธน์ทาวเวอร์ เลขที่ 989 ถนนพระราม 1 แขวงปทุมวัน เขตปทุมวัน กรุงเทพฯ 10330', '0 2649 1999', 'afbc5e4a9f8c87dcaa1d808541f12eb5.jpg', ''),
(28, 'ชมโปะ', 'company_co', '1', 28, 1, 'บริษัท ซมโปะ ประกันภัย (ประเทศไทย) จำกัด (มหาชน)', '990 อับดุลราฮิมเพลซ ชั้น12, 14 ถนนพระราม4 แขวงสีลม เขตบางรัก กรุงเทพฯ 10500 โทร. 02-119-3000', '', 'e1f8e35b12777287efb378fe298a6ce4.jpg', ''),
(29, 'อินทรประกันภัย', 'company_co', '1', 29, 1, 'บริษัท อินทรประกันภัย จำกัด (มหาชน)', '364/29 ถนนศรีอยุทธยา แขวงพญาไท เขตราชเทวี กรุงเทพฯ 10400 โทร. 02-247-9261', '', 'caa1fabda086faab09072ff09fe237a9.jpg', '0107537000394'),
(30, 'สินทรัพย์', 'company_co', '0', 30, 1, 'บริษัท สินทรัพย์ประกันภัย จำกัด (มหาชน)', '222 ซอย รัชดาภิเษก 18 แขวง ห้วยขวาง เขตห้วยขวาง กรุงเทพมหานคร 10310 โทร : 02 792 5555', '', 'f170263238dcaf101230a26ad78e7abd.jpg', ''),
(31, 'สยามซิติี', 'company_co', '0', 31, 1, 'บริษัท สยามซิตี้ประกันภัย จำกัด (มหาชน)', '44/1 อาคารรุ่งโรจน์ธนกุล ชั้น 12 ถนนรัชดาภิเษก แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10310 โทรศัพท์ 02-202-9500', '', '58a0418d0a51a5a73d2bc4e51cb329b2.jpg', ''),
(32, 'ศรียุทธ', 'company_co', '1', 32, 1, 'บริษัท ศรีอยุธยา เจนเนอรัล ประกันภัย จำกัด (มหาชน)', '898 อาคารเพลินจิตทาวเวอร์ ชั้น 18 โซน A  ถนนเพลินจิต แขวงลุมพินี เขตปทุมวัน กรุงเทพมหานคร 10330 โทร. 0-2657-2555', '', 'df472973cc4a6025f02388a2063d7a2a.jpg', ''),
(33, 'ไทยพัฒนา', 'company_co', '0', 33, 1, 'บริษัท ไทยพัฒนาประกันภัย จำกัด (มหาชน) สำนักงานใหญ่', '34 ซอย สุขุมวิท 4 (นานาใต้) ถ.สุขุมวิท เขตคลองเตย แขวงคลองเตย กทม. 10110 โทรศัพท์: 02-253-4141', '', 'ee56bf256c8d08b0931e7cbfe09a9308.jpg', ''),
(34, 'ไทยศรีประกันภัย', 'company_co', '1', 34, 1, 'บริษัท ไทยศรีประกันภัย จำกัด (มหาชน) (สำนักงานใหญ่) ', '126/2 ถนนกรุงธนบุรี แขวงบางลำภูล่าง เขตคลองสาน กรุงเทพฯ 10600', '0-2820-7000, 0-2878-7111', '7e7d768baa399caac75af9c9ab7b6a6b.jpg', '0107554000224'),
(35, 'ไอโออิ กรุงทพประกันภัย', 'company_co', '1', 35, 1, 'บริษัท ไอโออิ กรุงเทพ ประกันภัย จำกัด (มหาชน) (สำนักงานใหญ่)', 'เลขที่ 25 อาคารกรุงเทพประกันภัย /YWCA ชั้นที่ 14 และชั้นที่ 22  ถ.สาทรใต้ แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพมหานคร 10120 ', '02-620-8000', '0a19b8070bb48835bae2f50136d4cf19.jpg', '0107555000554'),
(36, 'ธนชาติ', 'company_co', '0', 36, 1, '', '', '', '', ''),
(37, 'นวกิจ', 'company_co', '1', 37, 1, 'บริษัท นวกิจประกันภัย จำกัด (มหาชน)', '100/47-55, 90/3-6 อาคารสาธรนคร ชั้น 26 ถนนสาทรเหนือ  แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500', '1748', 'efcc6fabe6fb3ac9d9bc031df10f4787.jpg', ''),
(38, 'สหมงคล', 'company_co', '0', 38, 1, 'บริษัท สหมงคลประกันภัย จำกัด', '48/11 ซอยรุ่งเรือง (รัชดาฯ 20)  ถนน รัชดาภิเษก แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพมหานคร 10310', '02-687-7777', '5eed12e0c269251801ea96c60ff64b51.jpg', ''),
(39, 'ไทยพัฒนา', 'company_co', '1', 39, 1, '', '', '', '', ''),
(40, 'มิตซุย', 'company_co', '1', 40, 1, 'บริษัท มิตซุย สุมิโตโม อินชัวรันซ์ จำกัด', '175 อาคารสาธรซิตี้ทาวเวอร์ชั้น 14 ถนนสาทรใต้ แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120', '02679 5000', 'fd1b49aacb40730d68e5e568382dfc11.jpg', ''),
(41, 'ไทยเศรษฐกิจประกันภัย', 'company_co', '0', 41, 1, 'บริษัทไทยเศรษฐกิจประกันภัย', '87 อาคารเอ็ม ไทยทาวเวอร์ ออล ซีซั่นเพลส ชั้น15 แขวง ลุมพินี เขตปทุมวัน กรุงเทพมหานคร 10330', '1352', '5d6e2eb84d54669d3cfe1d0c1a18dd11.jpg', ''),
(42, 'มิตรแท้', 'company_co', '1', 42, 1, 'บริษัท มิตรแท้ประกันภัย จำกัด', '95 อาคารมิตรแท้ประกันภัย ถนนสี่พระยา แขวงสี่พระยา เขตบางรัก กรุงเทพฯ 10500 โทรศัพท์ : 02-640-7777', '1741', 'd6cee7e37a893a0fa1b1fb4216bb90be.jpg', ''),
(43, 'KSK', 'company_co', '0', 43, 1, 'บริษัท เคเอสเค จำกัด (มหาชน)', '1 อาคารเอ็มไพร์ทาวเวอร์ ชั้น 39 ถนนสาทรใต้ แขวงยานนาวา เขตสาทร กรุงเทพฯ 10120 โทร. 0-2022-1111', '', '2e113c32ca49609816fc6eb709f6b13c.jpg', ''),
(44, 'คุ้มภัยโตเกียวมารีน', 'company_co', '1', 44, 1, 'บริษัท คุ้มภัยโตเกียวมารีนประกันภัย (ประเทศไทย) จำกัด (มหาชน) (สำนักงานใหญ่) ', 'อาคารเอสแอนด์เอ ชั้น 2-6 เลขที่ 302 ถนนสีลม แขวงสุริยวงศ์ เขตบางรัก กรุงเทพมหานคร 10500', '0-22578080', 'fdb158ef6e60a971d4969831d25a488b.png', '0107563000011'),
(45, 'เดอะวัน', 'company_co', '1', 45, 1, 'บริษัท เดอะวัน ประกันภัย จำกัด (มหาชน)', '492,494 ถนนรัชดาภิเษก แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพมหานคร 10310', '1729', '0868547a068d70f95ca7eb4b84c8dd69.png', '0107555000201'),
(46, 'กรุงเทพประกันภัย (สำนักงานใหญ่)', 'company_co', '1', 46, 1, 'บริษัท กรุงเทพประกันภัย จำกัด (มหาชน) (สำนักงานใหญ่)', '25 ถนนสาทรใต้ แขวงทุ่งมหาเมฆ เขตสาทร กทม. 10120', '0 2285 8888', 'ee1f5c37e40cacca2a7dbac74e34297c.jpg', '0107536000625');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurance_data`
--

DROP TABLE IF EXISTS `tbl_insurance_data`;
CREATE TABLE `tbl_insurance_data` (
  `id` int(10) NOT NULL,
  `ins_date_work` date NOT NULL,
  `work_id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `code_id` int(10) NOT NULL,
  `insurance_no` varchar(100) NOT NULL,
  `date_insurance` date NOT NULL,
  `date_ins_start` date NOT NULL,
  `date_ins_end` date NOT NULL,
  `ins_corp_id` int(10) NOT NULL,
  `ins_type_id` int(10) NOT NULL,
  `fix_type` enum('0','1','2') NOT NULL COMMENT '1 ซ่อมห้าง   2 อู่  0 ไม่ระบุ',
  `job_notification_date` date NOT NULL COMMENT ' วันท่แจ้งงาน',
  `work_ins_type` enum('1','2') NOT NULL COMMENT '1 ต่ออายุ  2 งานใหม่',
  `ins_follow` int(11) NOT NULL COMMENT ' 1  ตามเอกสาร  2  ไม่ตามเอกสาร',
  `ins_data_status` enum('0','1') NOT NULL COMMENT '0 delete  1 use '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurance_income`
--

DROP TABLE IF EXISTS `tbl_insurance_income`;
CREATE TABLE `tbl_insurance_income` (
  `id` int(10) NOT NULL,
  `ins_company` int(11) NOT NULL COMMENT 'ไอดีบริษัทประกันภัย',
  `ins_type_id` int(10) NOT NULL COMMENT 'ไอดีประเภทประกันภัย',
  `com_1` double(5,2) NOT NULL,
  `tax_1` double(5,2) NOT NULL,
  `com_2` double(5,2) NOT NULL,
  `tax_2` double(5,2) NOT NULL,
  `com_3` double(5,2) NOT NULL,
  `tax_3` double(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_insurance_income`
--

INSERT INTO `tbl_insurance_income` (`id`, `ins_company`, `ins_type_id`, `com_1`, `tax_1`, `com_2`, `tax_2`, `com_3`, `tax_3`, `start_date`, `end_date`, `user_update`) VALUES
(3, 1, 7, 15.00, 3.00, 10.00, 3.00, 9.00, 0.30, '0000-00-00', '0000-00-00', 0),
(4, 1, 8, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00', '0000-00-00', 0),
(5, 1, 1, 12.00, 3.00, 10.00, 5.00, 0.00, 0.00, '0000-00-00', '0000-00-00', 1),
(6, 1, 5, 15.00, 4.00, 12.00, 5.00, 2.00, 0.00, '0000-00-00', '0000-00-00', 1),
(7, 3, 6, 10.00, 3.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insurance_type`
--

DROP TABLE IF EXISTS `tbl_insurance_type`;
CREATE TABLE `tbl_insurance_type` (
  `id` int(10) NOT NULL,
  `insurance_type_name` varchar(100) NOT NULL,
  `insurance_type` enum('1','2') NOT NULL COMMENT '1 ภาคสมัครใจน , 2 ภาคบังคับ',
  `insurance_type_status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1 use , 2 notuse ,3 delete',
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_insurance_type`
--

INSERT INTO `tbl_insurance_type` (`id`, `insurance_type_name`, `insurance_type`, `insurance_type_status`, `user_update`) VALUES
(1, 'พรบ. รหัส4.01', '2', '1', 1),
(2, 'พรบ. รหัส1.50', '2', '1', 1),
(3, 'พรบ. รหัส2.20/3.20B', '2', '1', 1),
(4, 'พรบ. รหัส1.60', '2', '1', 1),
(5, 'พรบ. รหัส1.20C', '2', '1', 1),
(6, 'ประเภท1', '1', '1', 1),
(7, 'ประเภท2x', '1', '1', 1),
(8, 'ประเภท2+', '1', '1', 1),
(9, 'ประเภท2', '1', '1', 1),
(10, 'ประเภท3', '1', '1', 1),
(11, 'ประเภท3 เก๋ง', '1', '1', 1),
(12, 'ประเภท3 กระบะ', '1', '1', 1),
(13, 'ประเภท3+', '1', '1', 1),
(14, '2+ X-treme', '1', '1', 1),
(15, '2+ X-treme1', '1', '1', 1),
(16, '2+X-treme2', '1', '1', 1),
(17, '2+ Standard', '1', '1', 1),
(18, '2+ Deluxe', '1', '1', 1),
(19, '3+X-tra', '1', '1', 1),
(20, '3+ standard', '1', '0', 1),
(21, '3+ deluxe', '1', '0', 1),
(22, 'โควิด-19', '1', '1', 1),
(23, 'ประกันภัยความรับผิดของผู้ขนส่ง', '1', '1', 1),
(24, 'ประกันภัยขนส่ง', '1', '0', 1),
(25, 'ประกันภัยเดินทาง', '1', '1', 1),
(26, 'อัคคีภัย', '1', '1', 1),
(27, 'ขนส่ง', '1', '1', 1),
(28, 'ONE ECO', '1', '1', 1),
(29, 'SME', '1', '1', 1),
(30, 'Driversave', '1', '1', 1),
(31, 'PA', '1', '1', 1),
(32, 'UD', '1', '0', 1),
(33, '2+', '1', '0', 1),
(34, 'ประกันโจรกรรม', '1', '1', 1),
(35, '2+ Eco Package', '1', '1', 1),
(36, '3+ EcoPackage', '1', '1', 1),
(37, 'ประเภท 1 รถกระบะ', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

DROP TABLE IF EXISTS `tbl_province`;
CREATE TABLE `tbl_province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(50) NOT NULL,
  `is_has_branch` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`id`, `province_name`, `is_has_branch`) VALUES
(10, 'กรุงเทพมหานคร', 0),
(11, 'สมุทรปราการ', 0),
(12, 'นนทบุรี', 0),
(13, 'ปทุมธานี', 0),
(14, 'พระนครศรีอยุธยา', 0),
(15, 'อ่างทอง', 0),
(16, 'ลพบุรี', 0),
(17, 'สิงห์บุรี', 0),
(18, 'ชัยนาท', 0),
(19, 'สระบุรี', 0),
(20, 'ชลบุรี', 0),
(21, 'ระยอง', 0),
(22, 'จันทบุรี', 0),
(23, 'ตราด', 0),
(24, 'ฉะเชิงเทรา', 0),
(25, 'ปราจีนบุรี', 0),
(26, 'นครนายก', 0),
(27, 'สระแก้ว', 0),
(30, 'นครราชสีมา', 0),
(31, 'บุรีรัมย์', 0),
(32, 'สุรินทร์', 0),
(33, 'ศรีสะเกษ', 0),
(34, 'อุบลราชธานี', 0),
(35, 'ยโสธร', 0),
(36, 'ชัยภูมิ', 0),
(37, 'อำนาจเจริญ', 0),
(38, 'บึงกาฬ', 0),
(39, 'หนองบัวลำภู', 0),
(40, 'ขอนแก่น', 0),
(41, 'อุดรธานี', 0),
(42, 'เลย', 0),
(43, 'หนองคาย', 0),
(44, 'มหาสารคาม', 0),
(45, 'ร้อยเอ็ด', 0),
(46, 'กาฬสินธุ์', 0),
(47, 'สกลนคร', 0),
(48, 'นครพนม', 0),
(49, 'มุกดาหาร', 0),
(50, 'เชียงใหม่', 0),
(51, 'ลำพูน', 0),
(52, 'ลำปาง', 0),
(53, 'อุตรดิตถ์', 0),
(54, 'แพร่', 0),
(55, 'น่าน', 0),
(56, 'พะเยา', 0),
(57, 'เชียงราย', 0),
(58, 'แม่ฮ่องสอน', 0),
(60, 'นครสวรรค์', 0),
(61, 'อุทัยธานี', 0),
(62, 'กำแพงเพชร', 0),
(63, 'ตาก', 0),
(64, 'สุโขทัย', 0),
(65, 'พิษณุโลก', 0),
(66, 'พิจิตร', 0),
(67, 'เพชรบูรณ์', 0),
(70, 'ราชบุรี', 0),
(71, 'กาญจนบุรี', 0),
(72, 'สุพรรณบุรี', 0),
(73, 'นครปฐม', 0),
(74, 'สมุทรสาคร', 0),
(75, 'สมุทรสงคราม', 0),
(76, 'เพชรบุรี', 0),
(77, 'ประจวบคีรีขันธ์', 0),
(80, 'นครศรีธรรมราช', 1),
(81, 'กระบี่', 0),
(82, 'พังงา', 1),
(83, 'ภูเก็ต', 1),
(84, 'สุราษฎร์ธานี', 1),
(85, 'ระนอง', 0),
(86, 'ชุมพร', 0),
(90, 'สงขลา', 1),
(91, 'สตูล', 0),
(92, 'ตรัง', 0),
(93, 'พัทลุง', 0),
(94, 'ปัตตานี', 0),
(95, 'ยะลา', 0),
(96, 'นราธิวาส', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_head`
--

DROP TABLE IF EXISTS `tbl_recipe_head`;
CREATE TABLE `tbl_recipe_head` (
  `id` int(11) NOT NULL,
  `header_name` varchar(100) NOT NULL,
  `tax_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `telephone_no` varchar(30) NOT NULL,
  `line_id` varchar(50) NOT NULL,
  `line_path_qrcode` varchar(100) NOT NULL,
  `line_id_qrcode` varchar(255) NOT NULL,
  `step_stransfer` text NOT NULL,
  `logo_head` varchar(255) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(50) NOT NULL,
  `bank_acc_name` varchar(100) NOT NULL,
  `bank_acc_number` varchar(30) NOT NULL,
  `bank_qr_code` varchar(255) NOT NULL,
  `data_status` enum('0','1','2') NOT NULL COMMENT '2 delete',
  `user_update` int(10) NOT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `branch_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recipe_head`
--

INSERT INTO `tbl_recipe_head` (`id`, `header_name`, `tax_no`, `address`, `telephone_no`, `line_id`, `line_path_qrcode`, `line_id_qrcode`, `step_stransfer`, `logo_head`, `bank_name`, `bank_branch`, `bank_acc_name`, `bank_acc_number`, `bank_qr_code`, `data_status`, `user_update`, `date_update`, `branch_id`) VALUES
(1, 'ทรัพย์เจริญโบรคเกอร์', '123456789', '345 ถนนหอยมุกต์  อ.หาดใหญ่  จ.สงขลา  90110', '0843886842', '@trapCharoen', '', 'uploadfile/2022/1a19351351bc87b347195538cb64037b.jpg', '<ol><li>โอนเงินโดยสแกน Qr-code</li><li>แจ้งโอนเงินผ่านไลน์&nbsp;</li></ol>', 'uploadfile/2022/8d592fced93484428fe2f70ba8b52e8e.jpg', 'กสิกรไทย', 'หาใหญ่', 'นายเอบีซี', '1234567890', 'uploadfile/2022/c58c79c9afdce27c00adc939506c732a.jpg', '1', 1, '2022-11-23 11:50:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_data`
--

DROP TABLE IF EXISTS `tbl_user_data`;
CREATE TABLE `tbl_user_data` (
  `id` int(10) NOT NULL,
  `name_sname` varchar(100) NOT NULL,
  `telephone_no` varchar(30) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_branch` int(5) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_update` int(10) NOT NULL,
  `data_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 use 0 not use'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_data`
--

INSERT INTO `tbl_user_data` (`id`, `name_sname`, `telephone_no`, `user_name`, `password`, `user_branch`, `last_login`, `user_update`, `data_status`) VALUES
(1, 'system_admin', '0819699985', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-11-23 11:26:33', 1, '1'),
(3, 'yazzzz29', '222', 'ya', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-11-23 11:29:57', 1, '1'),
(4, 'Jens Brincker', 'Jens Brincker	', 'Jens', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-11-23 11:08:45', 1, '1'),
(5, 'Mark Hay', '074-xxxxxx', 'Mark', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-11-23 11:10:50', 1, ''),
(6, 'David Perry', '074-xxxxxx	', 'David', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-11-23 11:11:13', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_data`
--

DROP TABLE IF EXISTS `tbl_work_data`;
CREATE TABLE `tbl_work_data` (
  `id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `user_update` int(10) NOT NULL,
  `service_price` double(10,2) NOT NULL,
  `other_price` double(10,2) NOT NULL,
  `total_work_price` double(10,2) NOT NULL,
  `work_remark` text NOT NULL,
  `date_add` date NOT NULL,
  `work_status` enum('0','1','2') NOT NULL COMMENT '0=delete 1 use ,2 other'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_work_data`
--

INSERT INTO `tbl_work_data` (`id`, `cust_id`, `agent_id`, `car_id`, `user_update`, `service_price`, `other_price`, `total_work_price`, `work_remark`, `date_add`, `work_status`) VALUES
(1, 4, 1, 3, 0, 0.00, 0.00, 0.00, '', '2022-12-10', '1'),
(2, 0, 0, 0, 0, 0.00, 0.00, 0.00, '', '2022-12-13', '1'),
(3, 0, 0, 0, 0, 0.00, 0.00, 0.00, '', '2022-12-13', '1'),
(4, 5, 1, 5, 0, 0.00, 0.00, 0.00, '', '2022-12-13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_type`
--

DROP TABLE IF EXISTS `tbl_work_type`;
CREATE TABLE `tbl_work_type` (
  `id` int(10) NOT NULL,
  `work_type_name` varchar(100) NOT NULL,
  `work_status` enum('0','1') NOT NULL DEFAULT '1',
  `user_update` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_work_type`
--

INSERT INTO `tbl_work_type` (`id`, `work_type_name`, `work_status`, `user_update`) VALUES
(1, 'จดใหม่', '1', 0),
(2, 'ย้ายเข้า', '1', 0),
(3, 'ป้ายหาย/ชำรุด', '1', 0),
(4, 'ยกเลิกหลังคา', '1', 0),
(5, 'จดใหม่&โอน', '1', 0),
(6, 'ย้ายเข้า&โอน', '1', 0),
(7, 'โอน/เพิ่มรั้ว', '1', 0),
(8, 'ต่อนอก/สงขลา', '1', 0),
(9, 'เปลี่ยนสี', '1', 0),
(10, 'ต่อนอก/กรุงเทพ', '1', 0),
(11, 'โอนประกอบการ', '1', 0),
(12, 'โอน/เปลี่ยนสี/ย้าย', '1', 0),
(13, 'เพิ่มตู้	', '1', 0),
(14, 'โอน/เปลี่ยนสี', '1', 0),
(15, 'คัดสมุดคู่มือ', '1', 0),
(16, 'รับรองวิศวะ/เพิ่มรั้ว', '1', 0),
(17, 'จดประกอบการ', '1', 0),
(18, 'รับรองวิศวะ	', '1', 0),
(19, 'ยกเลิกแก๊ส', '1', 0),
(20, 'เปลี่่ยนชื่อ', '1', 0),
(21, 'ต่อทะเบียน/ต่อนอก', '1', 0),
(22, 'SME', '1', 0),
(23, 'เครื่องยนต์', '1', 0),
(24, 'รับรองวิศวะ/มัดจำเล่ม', '1', 0),
(25, 'คัดรายการจด', '1', 0),
(26, 'โอน', '1', 0),
(27, 'ย้ายเข้า/ย้ายออก/โอน', '1', 0),
(28, 'ออกใบรับรองแก๊สLPG', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_car_transport`
--

DROP TABLE IF EXISTS `work_car_transport`;
CREATE TABLE `work_car_transport` (
  `id` int(10) NOT NULL,
  `work_id` int(10) NOT NULL,
  `work_type_id` int(10) NOT NULL,
  `date_transport` date NOT NULL,
  `transport_price` double(10,2) NOT NULL,
  `transport_discount_price` double(10,2) NOT NULL,
  `transport_discount_total` double(10,2) NOT NULL,
  `transport_payment` enum('0','1','2') NOT NULL,
  `transport_remark` text NOT NULL,
  `user_update` int(10) NOT NULL,
  `data_status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_car_transport`
--

INSERT INTO `work_car_transport` (`id`, `work_id`, `work_type_id`, `date_transport`, `transport_price`, `transport_discount_price`, `transport_discount_total`, `transport_payment`, `transport_remark`, `user_update`, `data_status`) VALUES
(1, 4, 15, '2022-12-10', 500.00, 0.00, 500.00, '1', '-', 1, '1'),
(2, 4, 5, '2022-12-11', 1600.00, 0.00, 1600.00, '1', '-', 1, '1'),
(3, 4, 21, '2022-12-12', 200.00, 100.00, 100.00, '2', '5225', 1, '0'),
(4, 4, 17, '2022-12-13', 600.00, 100.00, 500.00, '2', 'asdf', 1, '0'),
(5, 4, 4, '2022-12-13', 600.00, 100.00, 500.00, '2', 'asdfasdf', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agent_data`
--
ALTER TABLE `tbl_agent_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_car_act_data`
--
ALTER TABLE `tbl_car_act_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `code_id` (`code_id`),
  ADD KEY `corp_id` (`corp_id`),
  ADD KEY `user_update` (`user_update`),
  ADD KEY `act_type_id` (`act_type_id`);

--
-- Indexes for table `tbl_car_check`
--
ALTER TABLE `tbl_car_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_car_data`
--
ALTER TABLE `tbl_car_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `province_regis` (`province_regis`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_car_insurance_data`
--
ALTER TABLE `tbl_car_insurance_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `code_id` (`ins_code_id`),
  ADD KEY `ins_corp_id` (`insurance_corp_id`),
  ADD KEY `ins_type_id` (`insurance_type_id`),
  ADD KEY `insurance_type_id` (`insurance_type_id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_car_service`
--
ALTER TABLE `tbl_car_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `tbl_car_tax_data`
--
ALTER TABLE `tbl_car_tax_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_car_type`
--
ALTER TABLE `tbl_car_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_code_data`
--
ALTER TABLE `tbl_code_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_customer_data`
--
ALTER TABLE `tbl_customer_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_insurance_company`
--
ALTER TABLE `tbl_insurance_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_insurance_data`
--
ALTER TABLE `tbl_insurance_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `code_id` (`code_id`),
  ADD KEY `ins_corp_id` (`ins_corp_id`),
  ADD KEY `ins_type_id` (`ins_type_id`);

--
-- Indexes for table `tbl_insurance_income`
--
ALTER TABLE `tbl_insurance_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurance_type_id` (`ins_type_id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_insurance_type`
--
ALTER TABLE `tbl_insurance_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_name` (`province_name`);

--
-- Indexes for table `tbl_recipe_head`
--
ALTER TABLE `tbl_recipe_head`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `tbl_user_data`
--
ALTER TABLE `tbl_user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`),
  ADD KEY `user_branch` (`user_branch`);

--
-- Indexes for table `tbl_work_data`
--
ALTER TABLE `tbl_work_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_update` (`user_update`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `tbl_work_type`
--
ALTER TABLE `tbl_work_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_update` (`user_update`);

--
-- Indexes for table `work_car_transport`
--
ALTER TABLE `work_car_transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_type_id` (`work_type_id`),
  ADD KEY `user_update` (`user_update`),
  ADD KEY `work_id` (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agent_data`
--
ALTER TABLE `tbl_agent_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_car_act_data`
--
ALTER TABLE `tbl_car_act_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_car_check`
--
ALTER TABLE `tbl_car_check`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_car_data`
--
ALTER TABLE `tbl_car_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_car_insurance_data`
--
ALTER TABLE `tbl_car_insurance_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_car_service`
--
ALTER TABLE `tbl_car_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_car_tax_data`
--
ALTER TABLE `tbl_car_tax_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_car_type`
--
ALTER TABLE `tbl_car_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_code_data`
--
ALTER TABLE `tbl_code_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer_data`
--
ALTER TABLE `tbl_customer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_insurance_company`
--
ALTER TABLE `tbl_insurance_company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_insurance_data`
--
ALTER TABLE `tbl_insurance_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_insurance_income`
--
ALTER TABLE `tbl_insurance_income`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_insurance_type`
--
ALTER TABLE `tbl_insurance_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_recipe_head`
--
ALTER TABLE `tbl_recipe_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_data`
--
ALTER TABLE `tbl_user_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_work_data`
--
ALTER TABLE `tbl_work_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_work_type`
--
ALTER TABLE `tbl_work_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `work_car_transport`
--
ALTER TABLE `work_car_transport`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
