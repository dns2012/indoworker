-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin_access`;
CREATE TABLE `admin_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_access` (`id`, `role_id`, `menu_id`) VALUES
(220,	1,	'transaction'),
(221,	1,	'master'),
(222,	1,	'jobs-post'),
(223,	1,	'news'),
(224,	1,	'currency'),
(225,	1,	'country'),
(226,	1,	'job-type'),
(227,	1,	'job-location'),
(228,	1,	'job-post-skill-set'),
(229,	1,	'news-category'),
(230,	1,	'facility'),
(231,	1,	'faq');

DROP TABLE IF EXISTS `admin_privilege`;
CREATE TABLE `admin_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` varchar(200) NOT NULL,
  `privilege` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UidADMIN_MenuID` (`role_id`,`menu_id`),
  KEY `FK_MENUID_priv` (`menu_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_privilege` (`id`, `role_id`, `menu_id`, `privilege`) VALUES
(155,	1,	'jobs-post',	'delete'),
(156,	1,	'news',	'insert,view,delete'),
(157,	1,	'currency',	'view'),
(158,	1,	'country',	'insert,view,update'),
(159,	1,	'job-type',	'insert,update,delete'),
(160,	1,	'job-location',	'insert,update'),
(161,	1,	'job-post-skill-set',	'insert,view,delete'),
(162,	1,	'news-category',	'insert,view,update'),
(163,	1,	'facility',	'insert,update,delete'),
(164,	1,	'faq',	'insert,view,update,delete');

DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_role` (`id`, `name`, `description`) VALUES
(1,	'Super Admin',	'Super admin role');

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE `applicant` (
  `phone` char(25) DEFAULT NULL,
  `user_account_id` varchar(20) DEFAULT NULL,
  `nik` char(20) DEFAULT NULL,
  `passport_number` varchar(30) DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` char(100) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `religion` char(15) DEFAULT NULL,
  `last_edu` varchar(100) DEFAULT NULL,
  `photos` text,
  `submit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ex_pds` int(1) DEFAULT '0' COMMENT '1=exPDS; 0=No',
  `description` text,
  `job_type_id1` int(11) DEFAULT NULL,
  `job_type_id2` int(11) DEFAULT NULL,
  `job_type_id3` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT '0',
  `weight` int(11) DEFAULT '0',
  `number_of_child` int(11) DEFAULT NULL,
  `english_skill` varchar(30) DEFAULT 'Not' COMMENT 'Able/Not',
  `mandarin_skill` varchar(30) DEFAULT 'Not' COMMENT 'Able/Not',
  `others_language` varchar(30) DEFAULT 'Not' COMMENT 'Others Language',
  KEY `FK_user_account_id` (`user_account_id`),
  KEY `religion_ibfk` (`religion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `applicant` (`phone`, `user_account_id`, `nik`, `passport_number`, `name`, `email`, `address`, `gender`, `status`, `place_of_birth`, `date_of_birth`, `religion`, `last_edu`, `photos`, `submit_date`, `ex_pds`, `description`, `job_type_id1`, `job_type_id2`, `job_type_id3`, `height`, `weight`, `number_of_child`, `english_skill`, `mandarin_skill`, `others_language`) VALUES
('82338822901',	'amirchamsah',	NULL,	NULL,	'Amir Chamsah',	'amirchamsah@yahoo.com',	'JL. Taman Permata No.14,',	NULL,	'Married',	NULL,	'1990-04-20',	NULL,	NULL,	'',	'2019-02-15 22:55:11',	0,	'test additional information',	0,	0,	0,	150,	55,	NULL,	'Able',	'Poor',	''),
('82338822901',	'demo',	NULL,	NULL,	'Demo',	'demo@yahoo.com',	'JL. Taman Permata No.14,',	NULL,	'Single',	NULL,	'1970-01-01',	NULL,	NULL,	'',	'2019-02-27 09:39:50',	0,	'  ',	0,	0,	0,	0,	0,	NULL,	'',	'',	'');

DROP TABLE IF EXISTS `banner_quotes`;
CREATE TABLE `banner_quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotes` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `others_field` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `banner_quotes` (`id`, `quotes`, `name`, `company`, `photos`, `others_field`) VALUES
(1,	'Quality is more important than quantity. One home run is much better than two doubles.',	'Steve Jobs',	'Apple Inc',	'assets/img/pic/placeholder/steve_80x80.jpg',	''),
(2,	'Dont compare yourself with anyone in this world if you do so, you are insulting yourself.\r\nEveryone is unique, and they should be proud of it. Being successful is subjective. It is important to be happy with your life. ',	'Bill Gates',	'Microsoft',	'assets/img/pic/placeholder/BillGates_80x80.jpg',	''),
(3,	'If you have never tried, how will you ever know if there is any chance.',	'Jack Ma',	'Alibaba Group',	'assets/img/pic/placeholder/JackMa_80x80.jpg',	'');

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) DEFAULT NULL COMMENT 'optional',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `country_id` char(10) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `currency_id` char(10) DEFAULT NULL,
  `language` varchar(15) DEFAULT NULL,
  `rupiah` decimal(11,2) DEFAULT '1.00',
  PRIMARY KEY (`country_id`),
  KEY `FK_currID_country` (`currency_id`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `country` (`country_id`, `description`, `currency_id`, `language`, `rupiah`) VALUES
('ALJ',	'ALJAZAIR',	'DZD',	'',	118.09),
('CH',	'CHINA',	'RMB',	'',	2073.58),
('HKD',	'HONGKONG',	'HKD',	'',	1789.60),
('IND',	'INDONESIA',	'IDR',	'',	0.00),
('JP',	'JAPAN',	'JPY',	'',	127.00),
('KORSEL',	'KOREA SELATAN',	'KRW',	'',	12.52),
('MLY',	'MALAYSIA',	'MYR',	'',	3443.94),
('SG',	'SINGAPORE',	'SGD',	'',	10353.87),
('TW',	'TAIWAN',	'TWD',	'',	456.04);

DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `currency_id` char(10) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `currency` (`currency_id`, `description`) VALUES
('DZD',	'DINAR ALJAZAIR'),
('HKD',	'HONGKONG DOLLAR'),
('IDR',	'INDONESIA RATE'),
('JPY',	'JAPAN YEN'),
('KRW',	'KOREA WON'),
('MYR',	'MALAYSIA RINGGIT'),
('RMB',	'CHINA YUAN/REN MIMBI'),
('SGD',	'SINGAPORE DOLLAR'),
('TWD',	'TAIWAN DOLLAR');

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `edu_id` varchar(20) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `education` (`edu_id`, `description`) VALUES
('D1',	'DIPLOMA 1'),
('S1',	'S1 (Strata 1)'),
('SD',	'SD (SEDERAJAT)'),
('SLTA',	'SLTA (SEDERAJAT)'),
('SLTP',	'SLTP (SEDERAJAT)'),
('UnderGraduate',	'Under Graduate');

DROP TABLE IF EXISTS `educational_detail`;
CREATE TABLE `educational_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account_id` varchar(20) DEFAULT NULL,
  `certificate_degree_name` varchar(20) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `school_name` varchar(50) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_UID_edu_det` (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `educational_detail` (`id`, `user_account_id`, `certificate_degree_name`, `major`, `school_name`, `starting_date`, `completion_date`) VALUES
(1,	'amirchamsah',	'UnderGraduate',	'Information Technology',	'Standford University, USA',	'1970-01-01',	'1970-01-01');

DROP TABLE IF EXISTS `experience_detail`;
CREATE TABLE `experience_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account_id` varchar(20) DEFAULT NULL,
  `is_current_job` char(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `job_location_city` varchar(50) DEFAULT NULL,
  `job_location_state` varchar(50) DEFAULT NULL,
  `job_location_country` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `FK_UID_Exp_det` (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `experience_detail` (`id`, `user_account_id`, `is_current_job`, `start_date`, `end_date`, `job_title`, `company_name`, `job_location_city`, `job_location_state`, `job_location_country`, `description`) VALUES
(1,	'amirchamsah',	NULL,	'1970-01-01',	'1970-01-01',	'demo tester',	'PT Toko Online Digital',	'Probolinggo',	NULL,	NULL,	'  ');

DROP TABLE IF EXISTS `facility`;
CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `photo5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `facility` (`facility_id`, `title`, `content`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`) VALUES
(1,	'TRAINING CENTER',	'Training facilities are essential in creating qualified and competent workers, preparing them with critical skills required for working overseas and \r\nwhich are not necessarily obtained in their formal education.\r\n\r\nIn 2001, PDS relocated to a 17,000 m2 property with a total of 12,000 m2 building area (includes offices, training facility, dormitories, etc.) and \r\nis able to accommodate more than 1200 recruits and close to 100 staffs. Included in the training center are: 35 classes complete with language laboratories, \r\ncooking classes, caregiver classes, baby sitting classes, a complete mini hospital training facility for nurses and caregivers, spa training facility, 2 dining halls, \r\n210 bathrooms, 1 basketball court, 1 badminton court, 3 dormitories (total of 1200 beds), 1 prayer room, 1 mini market, 1 library and et cetera.\r\n\r\nCurrently, PDS is building one more hospital training facility to re-train our recruited nurses aiming to work in medically more advanced countries such as Japan \r\nand Singapore. This facility would be equipped with highly advanced medical equipment, which are normally utilized in these countries’ hospitals, clinics, and nursing homes.\r\n\r\nAside from our central training center in Gempol, PDS has 6 additional regional training centers which altogether can accommodate up to 2470 trainees.',	'facility-hospital-ward.JPG',	'',	'',	'',	''),
(2,	'LANGUAGE LAB',	'35 classes complete with language laboratories',	'facility-language-lab.JPG',	NULL,	NULL,	NULL,	NULL),
(3,	'SPORT AREA',	'SPORT AREA',	'facility-sport-area.JPG',	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`faq_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `faq` (`faq_id`, `title`, `content`, `created_date`, `created_by`) VALUES
(1,	'Memiliki masalah untuk login?',	'Jangan khawatir, ini terjadi pada semua orang. Jika Anda lupa password Anda, klik \' Lupa? \' di atas kotak sign in, kemudian masukkan alamat email yang Anda gunakan untuk akun KerjaLN.com Anda. Klik \' Kirim \' dan kami akan mengirimkan password Anda ke email Anda. Pastikan untuk memeriksa spam mail / junk Anda jika Anda tidak dapat menemukan email di kotak masuk Anda.',	'2019-02-01 09:14:24',	NULL),
(2,	'Bagaimana caranya saya untuk mengubah password?',	'Pertama, masuk ke akun KerjaLN.com Anda. Pergi ke ikon profil Anda di bagian kanan atas halaman. Klik \"Manage Account\" yang berbentuk seperti simbol gerigi. Isi kolom dan simpang data Anda.',	'2019-02-01 09:14:43',	NULL),
(3,	'Bagaimana caranya untuk mendaftar di KerjaLN.com?',	'Pergi ke halaman utama KerjaLN.com dan mengisi kolom yang diperlukan dalam kotak sign up dan klik. Setelah Anda telah mengirimkan informasi, silahkan cek email Anda untuk mengaktifkan akun Anda. Pastikan untuk memeriksa spam mail / junk Anda jika Anda tidak dapat menemukan email konfirmasi di kotak masuk Anda.\r\n\r\nSetelah Anda telah mengaktifkan akun Anda , ketika Anda pertama kali masuk , silahkan mengisi informasi dasar yang diperlukan. Berikutnya, Anda dapat menulis resume Anda dengan mengisi kolom-kolom yang tersedia. Menulis resume Anda dengan lengkap sangat penting untuk meningkatkan kesempatan Anda untuk berkarir. Pastikan resume Anda lengkap dan selalu diperbarui.',	'2019-02-01 09:16:00',	NULL),
(4,	'Siapakah yang melihat resume saya?',	'Ketika Anda membuat resume Anda, semua Perusahaan akan dapat melihat resume Anda secara default. Namun, hanya perusahaan yang berprospektif sajalah yang bisa melihat kontak informasi Anda.',	'2019-02-01 09:11:33',	NULL),
(5,	'Bagaimana caranya untuk mendaftar di KerjaLN.com?',	'Untuk melamar peluang karir melalui KerjaLN.com, Anda akan membutuhkan dua hal:<br>\r\n1. Akun KerjaLN.com <br>\r\n2. Resume lengkap yang disimpan ke akun KerjaLN.com Anda<br>\r\nCukup mencari jenis karir yang Anda inginkan dan pada setiap posting di KerjaLN.com, klik tombol ‘apply’ untuk melamar. Setelah Anda menyelesaikan langkah-langkah, resume Anda akan dikirim ke Perusahaan. Anda akan melihat pada deskripsi karir, tombol ‘apply’ akan berubah menjadi ‘applied’.',	'2019-02-01 09:18:52',	NULL),
(6,	'Mengapa saya tidak mendapat respon setelah apply secara online?',	'Setiap Perusahaan memiliki metode sendiri untuk mengevaluasi resume. Beberapa Perusahaan dapat mengirimkan balasan email otomatis atau menghubungi Anda untuk merespon lamaran Anda. Namun, ada Perusahaan yang tidak akan menghubungi Anda kecuali mereka ingin memulai proses wawancara.',	'2019-02-01 09:13:16',	NULL),
(7,	'Bagaimana caranya agar peluang saya untuk direkrut menjadi lebih besar?',	'Membuat resume yang benar-benar menonjol. Anda ingin menyoroti pengalaman spesifik dan peran Anda sehingga perusahaan tahu Anda akan cocok dengan kebutuhan mereka. Menambahkan lebih banyak pengalaman, pendidikan, sertifikasi dan keterampilan akan sangat membantu.',	'2019-02-01 09:13:16',	NULL);

DROP TABLE IF EXISTS `job_bookmark`;
CREATE TABLE `job_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account_id` varchar(20) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `job_post_id` (`job_post_id`),
  KEY `user_account_id` (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `job_bookmark` (`id`, `user_account_id`, `job_post_id`, `created_date`) VALUES
(1,	'amirchamsah',	5,	'2019-02-15 15:56:40');

DROP TABLE IF EXISTS `job_location`;
CREATE TABLE `job_location` (
  `job_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` char(10) NOT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`job_location_id`),
  KEY `FK_JobLoc_Country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `job_location` (`job_location_id`, `country_id`, `street_address`, `city`, `state`, `zip`) VALUES
(1,	'IND',	'ALL',	'ALL',	'DKI',	'ALL'),
(2,	'CH',	'ALL',	'ALL',	'ALL',	''),
(3,	'IND',	'ALL',	'ALL',	'JATIM',	'ALL'),
(4,	'HKD',	'ALL',	'ALL',	'ALL',	'ALL'),
(5,	'ALJ',	'ALL',	'ALL',	'ALL',	''),
(6,	'JP',	'ALL',	'ALL',	'ALL',	''),
(7,	'KORSEL',	'ALL',	'ALL',	'ALL',	''),
(8,	'MLY',	'ALL',	'ALL',	'ALL',	''),
(10,	'TW',	'ALL',	'ALL',	'ALL',	'');

DROP TABLE IF EXISTS `job_post`;
CREATE TABLE `job_post` (
  `job_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_location_id` int(11) DEFAULT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_post_skill_set_id` varchar(10) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `placement` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT '0',
  `show_salary` int(11) DEFAULT NULL,
  `deduction` int(11) DEFAULT '0',
  `show_deduction` int(11) DEFAULT '0',
  `is_active` int(1) DEFAULT '1' COMMENT 'active=1; closed=0',
  `is_available` int(1) DEFAULT '0' COMMENT '1=available; 0=unavailabe',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL COMMENT 'Connect to user_admin',
  `soon_require` int(1) DEFAULT '0' COMMENT '0=normal; 1=urgent',
  `premium_job` int(1) DEFAULT '0' COMMENT '	0=normal; 1=premium job',
  `for_gender` varchar(255) DEFAULT 'for-male-female' COMMENT 'for-male/for-female/f',
  `contract` int(11) DEFAULT '2' COMMENT 'how long (?Year)',
  PRIMARY KEY (`job_post_id`),
  KEY `job_post_skill_set_id` (`job_post_skill_set_id`),
  KEY `FK_CreatedBy_UsersADMIN` (`created_by`),
  KEY `FK_job_type_id` (`job_type_id`),
  KEY `FK_Job_location_id` (`job_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `job_post` (`job_post_id`, `job_location_id`, `job_type_id`, `job_post_skill_set_id`, `job_title`, `job_description`, `company`, `placement`, `salary`, `show_salary`, `deduction`, `show_deduction`, `is_active`, `is_available`, `created_date`, `created_by`, `soon_require`, `premium_job`, `for_gender`, `contract`) VALUES
(4,	10,	2,	'NELAYAN',	'NELAYAN',	'Persyaratan :\r\nLaki - laki usia 19 s/d 28 tahun, pendidikan minimal SD\r\nBerbadan sehat, tidak pernah mengalami patah tulang, gangguan kesehatan & tidak berkacamata\r\nMenyerahkan dokumen Asli ( KTP, AKTE, IJAZAH TERAKHIR & SKCK dari Polres Setempat )\r\nFoto Ukuran 5x5 (5 lembar), background warna biru memakai kemeja putih + dasi\r\n\r\nGaji / Penghasilan :\r\nGaji pokok US$ 300,00 /bln ( untuk Fresh Crew )\r\nGaji untuk Exp Crew ( Exp Local ) US$ 350,00 /bln\r\nGaji untuk Exp Crew ( Exp Taiwan ) US$ 400,00 /bln\r\nBonus tambahan sesuai dengan banyaknya tangkapan ikan\r\nJaminan kesehatan, Asuransi kecelakaan kerja & Asuransi Jiwa\r\n\r\nKet : Bisa di tempatkan di Kapal Ikan (Taiwan, Singapore, Afrika, Peru, Walvisbay, Fiji, Capetown, dll)\r\nBila semua persyaratan telah terpenuhi langsung masuk Penampungan (Mess) untuk pelatihan sebelum pemberangkatan.\r\nPENDAFTARAN TIDAK DI PUNGUT BIAYA*\r\n*)Untuk Kapal Ikan Taiwan',	'',	'Quess Corp Limited',	2500,	1,	0,	0,	1,	1,	'2019-01-15 16:39:54',	5,	1,	0,	'for-male',	2),
(5,	7,	7,	'JASA',	'Jasa Courier',	'PERSYARATAN\r\nPekerja Migran Indonesia yang telah bekerja di Korea Selatan dan kembali ke Indonesia secara sukarela sebelum masa kontrak kerja mereka selesai (periode waktu kembali dari korea setelah 1 Januari 2010).\r\nPekerja Migran Indonesia yang telah bekerja di Korea Selatan dan kembali ke Indonesia secara sukarela sesudah masa kontrak kerja mereka selesai dengan VISA jenis E9.\r\nBerusia minimal 18 tahun dan maksimal 39 tahun (kelahiran antara 11 April 1978 s.d. 10 April 2000)\r\nTidak buta warna (total atau parsial) dibuktikan dengan surat keterangan dokter. \r\nPada surat keterangan dokter tersebut harus menunjukkan hasil dan tertulis TIDAK BUTA WARNA (Surat Keterangan Dokter yang berlaku adalah yang dikeluarkan dalam jangka waktu 6 bulan terakhir).\r\nTidak sedang atau pernah menjalani hukuman tindak pidana berat akibat perbuatan kriminal atau lainya.\r\nTidak memiliki catatan pernah dideportasi dari Korea Selatan oleh Pemerintah Korea Selatan.\r\nTidak sedang dicekal bepergian ke luar negeri oleh Pemerintah Indonesia.\r\nTidak sedang mengidap penyakit paru-paru, penyakit hepatitis, dan penyakit kelamin.\r\nTidak pernah bekerja di Korea Selatan lebih dari 5 tahun, termasuk penggabungan dengan menggunakan Visa E-9 dan Visa E-10.\r\n\r\nPENTING: Bagi yang pernah bekerja di Korea Selatan lebih dari 5 tahun tetapi mendaftar, maka yang bersangkutan akan ditolak untuk mengirimkan dokumen lamaran melalui Sending Public Agency System oleh HRD Korea dan atau CCVI ditolak oleh Imigrasi Korea Selatan.\r\n\r\nPILIHAN SEKTOR PEKERJAAN YANG DITAWARKAN\r\n\r\nSektor Manufaktur\r\nSektor Perikanan\r\nSektor Konstruksi\r\nSektor Agriculture/Livestock\r\nSektor Jasa\r\n\r\nBila pelamar ingin kembali bekerja di tempat yang sama seperti ketika sewaktu bekerja di Korea dimana pelamar bekerja di tempat tersebut lebih dari setahun, \r\nmaka harus memilih sektor pekerjaan yang sama seperti sewaktu bekerja di Korea dulu. \r\nOleh karena itu, pelamar harus memilih sektor pekerjaan dengan seksama mengingat pertimbangan tersebut.\r\n\r\nKhusus Sektor Konstruksi harus dilengkapi dengan surat keterangan permintaan dari pengguna yang lama.',	'SILOAM HOSPITAL',	'Office',	150000,	1,	0,	0,	1,	1,	'2019-01-15 16:45:07',	2,	0,	1,	'for-male',	2),
(7,	6,	4,	'KONSTRUKSI',	'Las Listrik Konstruksi',	'Info Pemagangan Ke Jepang di Bidang Kontruksi Beton \r\n\r\nLOWONGAN PEMAGANGAN DI BIDANG KONTRUKSI BETON (Pria) \r\n\r\nInfo Minori di Bidang Kontruksi Beton untuk Pria (pemagangan 3 tahun)\r\n\r\n*Syarat\r\n1.Pria 25 - 35 tahun\r\n2.Tidak berkaca mata\r\n3.Status tidak dipermasalahkan\r\n4.Mendapatkan izin dari orang tua / wali\r\n5.Siap mengikuti pelatihan bahasa jepang selama min 3 bulan\r\n6.Belum Pernah Magang ke Jepang\r\n7.Tidak buta warna\r\n8.Pengalaman di Bidang Kontruksi Beton\r\n9.Tinggi dan berat badan ideal\r\n10.Tidak ber tatto\r\n11.Tidak phobia dengan ketinggian\r\n\r\n \r\n*Fasilitas dan gaji yang didapat :\r\nGaji bersih rata rata diatas 10 jt\r\nFasilitas : asrama,air,listrik, dan gas ( selama di jepang dan di indonesia ).\r\nAsuransi kesehatan dan asuransi ketenagakerjaan selama kerja di jepang.\r\n\r\n\r\n* Persyaratan umum :\r\n1.Sehat jasmani dan rohani\r\n2.Belum pernah mengikuti program magang ke jepang\r\n3.Memiliki sikap disiplin, jujur, integritas pribadi, dan motivasi yang tinggi\r\n4.Mengikuti seleksi\r\n\r\n \r\n* Keuntungan mengikuti program pemagangan :\r\n\r\n1.Kemampuan berkomunikasi dengan bahasa jepang\r\n2.Mengerti sikap dan etos kerja di perusahaan jepang\r\n3.Mempunya skill / kemampuan di bidangnya\r\n4.Kesempatan untuk masuk perusahaan jepang yang ada di Indonesia\r\n5.Mempunyai modal untuk usaha.',	'',	'Manufaktur',	10150,	1,	0,	0,	1,	1,	'2019-01-15 18:08:25',	3,	0,	0,	'for-male',	3),
(8,	4,	1,	'PRT',	'Home Care',	'Wanita\r\nUsia 21 - 35 Tahun\r\nTB min 148 cm dengan berat badan ideal\r\nPendidikan Minimal SMP/sederajat\r\nBersedia dilatih di BLK LN PDS\r\n\r\neKTP\r\nKartu Keluarga (KK)\r\nAkta lahir (dapat digantikan dengan ijazah untuk SG, HK, dan MLY)\r\nBuku Nikah (untuk yang sudah menikah)\r\nSurat Izin Keluarga (SIK)\r\nSKCK dari Polda setempat (khusus TW)',	'',	'Rumah Tangga',	3900,	1,	0,	0,	1,	1,	'2019-01-24 08:06:27',	2,	0,	0,	'for-female',	3),
(9,	8,	5,	'SPA_STAFF',	'SPA Staff (Malay)',	'Sebuah Luxury Day Spa di Kota Selangor, yang kini tengah berkembang dengan baik dan telah memiliki beberapa cabang di beberapa tempat di Kota Selangor, \r\nsegera membutuhkan sekitar 50 orang Spa Therapist Wanita yang profesional dan telah memiliki pengalaman dibidang Therapist.\r\n\r\nKualifikasi kandidat yang dibutuhkan adalah:\r\n\r\nMemiliki pengalaman dibidang Spa min 1 tahun\r\nUsia min 18 – 35 tahun\r\nMemiliki sikap yang baik dalam bekerja\r\nMampu berkomunikasi dalam bahasa inggris\r\nGaji dan Benefit yang ditawarkan:\r\n\r\nGaji RM 1800 / bulan ( atau sekitar 6 juta rupiah )\r\nKomisi RM 15 / jam\r\n6 hari kerja / minggu\r\n8 jam kerja / hari\r\nOvertime akan di bayar\r\nUntuk sekedar informasi, Selangor adalah negara bagian di pantai barat Semenanjung Malaysia, yang mengelilingi ibu kota Kuala Lumpur. \r\nSelangor juga adalah satu dari dua negara bagian di Malaysia yang memiliki lebih dari satu kota; yang lainnya adalah Sarawak. \r\nNegara bagian Selangor memiliki ekonomi terbesar di Malaysia. Perekonomian dan insfratrukturenya sangat berkembang pesat.',	'',	'Luxury Day SPA',	1800,	1,	0,	0,	1,	1,	'2019-01-31 04:44:18',	2,	0,	0,	'for-male-female',	2),
(10,	10,	3,	'NURSE01',	'TENAGA PERAWAT',	'Dibuka Lowongan Kerja keluar negeri di Sektor Formal kerja perawat panti Jompo Taiwan (Nurse), BUKAN PRT. \r\nBaik tenaga ahli maupun asisten perawat, ijasah tidak harus keperawatan. Boleh ijasah SMP, atau SMA sederajat. \r\nKarena di PT kami calon TKI Perawat taiwan akan diberi pelatihan sebelum dikirim ke negara tujuan.\r\n\r\nPJTKI RESMI ini siap untuk mengantar anda menuju masa depan yang sukses dengan mendapatkan penghasilan banyak dari bekerja keluar negeri. \r\nPJTKI ini memproses kerja Perawat ke Taiwan secara resmi sesuai dengan ketentuan Disnaker dan BNP2TKI. \r\n\r\nDengan Persyaratan dan Ketentuan Kerja Perawat Panti Jompo Taiwan Sebagai Berikut\r\n\r\nJenis kelamin:\r\nWanita Khusus Wanita.\r\n(Tidak menerima pendaftaran perawat laki-laki).\r\nUsia:\r\n\r\n20 Tahun dan Maksimal 35 tahun\r\nUsia 38 tahun bisa di usahakan dengan ketentuan Eks luar Negeri (punya pengalaman kerja keluar negeri).\r\nTinggi badan:minimal 153 cm\r\nBerat badan: Ideal (minimal 155 cm)\r\n\r\nIjasah Keperawatan / AKBID \r\nIjasah SMA sederajat \r\n\r\nGaji pokok: NT 21.009\r\nSekitar Rp 8. 900.000\r\nGaji pokok + lemburan 10 s/d 12 juta.\r\n\r\nJam kerja:\r\n8 Jam Kerja + Lembur\r\n',	'',	'Rumah Jompo',	21009,	1,	NULL,	0,	1,	1,	'2019-01-31 07:49:07',	2,	0,	1,	'for-female',	2),
(11,	6,	2,	'NELAYAN',	'NELAYAN',	'Persyaratan : \r\nLaki - laki usia 19 s/d 28 tahun, \r\npendidikan minimal SD \r\nBerbadan sehat, \r\ntidak pernah mengalami patah tulang, gangguan kesehatan & tidak berkacamata.\r\nMenyerahkan dokumen Asli ( KTP, AKTE, IJAZAH TERAKHIR & SKCK dari Polres Setempat ) \r\nFoto Ukuran 5x5 (5 lembar), background warna biru memakai kemeja putih + dasi \r\nGaji / Penghasilan : Gaji pokok US$ 300,00 /bln ( untuk Fresh Crew ) \r\nGaji untuk Exp Crew ( Exp Local ) US$ 350,00 /bln \r\nGaji untuk Exp Crew ( Exp Taiwan ) US$ 400,00 /bln \r\nBonus tambahan sesuai dengan banyaknya tangkapan ikan \r\nJaminan kesehatan, Asuransi kecelakaan kerja & Asuransi Jiwa \r\nKet : Bisa di tempatkan di Kapal Ikan (Taiwan, Singapore, Afrika, Peru, Walvisbay, Fiji, Capetown, dll) \r\nBila semua persyaratan telah terpenuhi langsung masuk Penampungan (Mess) untuk pelatihan sebelum pemberangkatan. \r\n\r\nPENDAFTARAN TIDAK DI PUNGUT BIAYA* *)\r\n\r\nUntuk Kapal Ikan JEPANG',	'',	'X Company',	145000,	1,	NULL,	0,	1,	1,	'2019-02-12 16:28:27',	2,	0,	0,	'for-male',	2),
(12,	7,	2,	'NELAYAN',	'NELAYAN',	'Job Description',	'',	'X Company',	NULL,	0,	NULL,	0,	0,	0,	'2019-02-14 05:29:31',	5,	0,	0,	'for-male-female',	2),
(13,	7,	2,	'NELAYAN',	'NELAYAN',	'Nelayan Korsel',	'Ocean Blue',	'Karimun',	150000,	1,	NULL,	0,	1,	1,	'2019-02-14 16:45:18',	5,	0,	0,	'for-male-female',	3);

DROP TABLE IF EXISTS `job_post_activity`;
CREATE TABLE `job_post_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account_id` varchar(20) DEFAULT NULL,
  `job_post_id` int(11) NOT NULL,
  `apply_date` date NOT NULL,
  `job_priority` int(1) DEFAULT '0' COMMENT '1=First Priority;2=Second Priority ; 3=Third Priority',
  `trash` int(11) DEFAULT '0' COMMENT '1=remove to trash',
  `status_read` int(11) DEFAULT '0' COMMENT '1=Read; 0=UnRead',
  `recall` int(11) DEFAULT '0' COMMENT '1=Recall; 0=Normal',
  `step` int(11) DEFAULT '0' COMMENT '1=Bio_Unread; 2=job_accepted',
  `move_job_type_id` int(11) DEFAULT '0' COMMENT 'move to another Job Type as per appropriate user qualification by admin action',
  `reject` int(11) DEFAULT '0' COMMENT '1=rejected; 0=normal',
  `accept` int(11) DEFAULT '0' COMMENT '1=accepted;',
  `admin_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UAID_jPostID` (`user_account_id`,`job_post_id`) USING BTREE,
  KEY `user_account_id` (`user_account_id`),
  KEY `job_post_id` (`job_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `job_post_activity` (`id`, `user_account_id`, `job_post_id`, `apply_date`, `job_priority`, `trash`, `status_read`, `recall`, `step`, `move_job_type_id`, `reject`, `accept`, `admin_by`) VALUES
(1,	'amirchamsah',	4,	'2019-02-15',	2,	0,	0,	0,	0,	0,	0,	0,	NULL),
(2,	'amirchamsah',	5,	'2019-02-15',	3,	0,	0,	0,	0,	0,	0,	0,	NULL),
(3,	'amirchamsah',	7,	'2019-02-15',	1,	0,	0,	0,	0,	0,	0,	0,	NULL),
(4,	'demo',	10,	'2019-02-27',	1,	0,	0,	0,	0,	0,	0,	0,	NULL),
(5,	'demo',	5,	'2019-02-27',	2,	0,	0,	0,	0,	0,	0,	0,	NULL);

DROP TABLE IF EXISTS `job_post_skill_set`;
CREATE TABLE `job_post_skill_set` (
  `job_post_skill_set_id` varchar(10) NOT NULL,
  `skill_level` int(11) DEFAULT NULL,
  `requirement` text,
  PRIMARY KEY (`job_post_skill_set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `job_post_skill_set` (`job_post_skill_set_id`, `skill_level`, `requirement`) VALUES
('CS',	1,	'Hotel staffs, restaurant chefs, and cleaning service staffs to K.S.A.;\r\n'),
('DRIVER',	1,	'Taxi drivers to Kingdom of Saudi Arabia (K.S.A.)'),
('JASA',	1,	'write description here'),
('KONSTRUKSI',	1,	'skills required in construction sectors such as bricklaying, carpentry, plumbing, etc'),
('NELAYAN',	1,	'KETERANGAN'),
('NURSE01',	1,	'-D3 Major of Nurse<br>\r\n-Nurse Certificate<br> \r\n-Single<br>\r\n-Not more than 29 Year Old<br>'),
('PERTANIAN',	1,	'KETERANGAN'),
('PRT',	1,	'PRT'),
('SPA_STAFF',	1,	'Spa workers and cleaning service staffs to Malaysia'),
('TECH01',	1,	'Manufacturing (e.g. furniture, car spare-parts, iron pipe, machinery, food, etc.)\r\nElectronic Assembly\r\nMachinery Operator (e.g. lathe, forklift, etc.)\r\n');

DROP TABLE IF EXISTS `job_type`;
CREATE TABLE `job_type` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_description` text,
  `min_edu` varchar(20) DEFAULT NULL,
  `group_type` varchar(30) DEFAULT NULL COMMENT 'CareGiver/NonCareGiver',
  `height` int(11) DEFAULT '0',
  `age_min` int(11) DEFAULT '0',
  `age_max` int(11) DEFAULT '0',
  PRIMARY KEY (`job_type_id`),
  KEY `min_edu` (`min_edu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `job_type` (`job_type_id`, `job_description`, `min_edu`, `group_type`, `height`, `age_min`, `age_max`) VALUES
(1,	'PRT',	'SLTP',	'CareGiver',	150,	22,	29),
(2,	'NELAYAN',	'SLTP',	'Non CareGiver/Industri',	0,	22,	29),
(3,	'PERAWAT',	'SLTA',	'CareGiver',	160,	22,	29),
(4,	'MANUFAKTUR',	'SLTP',	'Non CareGiver/Industri',	0,	22,	29),
(5,	'PERTANIAN',	'SLTA',	'Non CareGiver/Industri',	0,	22,	29),
(6,	'SPA',	'SLTA',	'Non CareGiver/Industri',	0,	22,	29),
(7,	'JASA',	'SLTA',	'Non CareGiver/Industri',	0,	22,	29);

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `ID` char(15) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `master_menu`;
CREATE TABLE `master_menu` (
  `menu_id` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_category_id` varchar(20) NOT NULL,
  `news_source` varchar(100) DEFAULT NULL,
  `photo` blob,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tag` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `FK_UidADMIN_UserADMIN` (`created_by`),
  KEY `FK_NEWS_CATEGORY` (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `news` (`news_id`, `news_category_id`, `news_source`, `photo`, `title`, `content`, `tag`, `created_date`, `created_by`) VALUES
(1,	'ALL',	'http://jatim.tribunnews.com',	'',	'Kabupaten Pasuruan Dapat Penghargaan Adipura, Gus Irsyad Berkomitmen Wujudkan Bangil Bangkit',	'Di belakang mobil Irsyad Yusuf dan KH Mujib Imron, banyak rombongan pejabat Organisasi Perangkat Daerah (OPD), dan Laskar Maslahat.\r\n\r\nDi alun–alun Bangil, ada sedikit seremonial tumpengan untuk mensyukuri keberhasilan Kabupaten Pasuruan dalam mempertahankan Piala Adipura tahun ini.\r\n\r\nTak hanya itu, Irsyad Yusuf juga memberikan bantuan kendaraan operasional untuk mengangkut sampah kepada Laskar Maslahat yang selama ini sudah berkontribusi untuk kebersihan Kabupaten Pasuruan.\r\n\r\nKepada Surya (TribunJatim.com Network), Gus Irsyad, sapaan akrab Irsyad Yusuf, mengaku sangat bersyukur bisa mempertahankan Piala Adipura untuk tahun 2018.\r\n\r\n“Alhamdulillah, ini adalah hasil dari kerja keras kita semua yang sama-sama berkomitmen untuk menciptakan Bangil sebagai wilayah yang bersih dan tertata, termasuk di kecamatan lain se-Kabupaten Pasuruan,” kata Gus Irsyad, sesaat setelah menerima penghargaan.\r\n\r\nGus Irsyad mengajak seluruh masyarakat untuk sama-sama menyatukan tekad untuk terus membangun predikat Bangil sebagai salah satu Kota Kecil Terbersih di Indonesia, tetap berada di genggaman.\r\n\r\nSelain itu, ia juga mengajak masyarakat untuk terus membangun dan mewujudkan Bangil Bangkit (Bangkit adalah kepanjangan dari bersih, indah, kemilau, dan tertib).\r\n\r\n“Mempertahankan sebuah pencapaian itu lebih susah daripada untuk meraihnya. Sama seperti Adipura ini yang terus bisa kita pertahankan tiga tahun berturut-turut tanpa putus. Piala Adipura yang kita terima ini adalah persembahan kami untuk semua orang, semua pihak yang ikut berpartisipasi, mulai dari anggota Laskar Maslahat yakni para petugas kebersihan hingga seluruh masyarakat Kabupaten Pasuruan,\" terangnya.\r\n\r\nPlt Kepala DLH Kabupaten Pasuruan, Anang Saiful Wijaya menambahkan, untuk dapat mempertahankan Piala Adipura tahun 2018, ada beberapa penilaian yang harus dilewati agar bisa memperoleh Piala Adipura tersebut.\r\n\r\nMulai penilaian fisik, non fisik, hingga paparan langsung oleh kepala daerah.\r\n\r\nUntuk fisik, fokus penilaian adalah pengelolaan sampah seperti Tempat Pembuangan Sampah (TPS), Reuse, Reduce and Recycle (3R), penataan Kawasan Pemukiman, serta Tempat Pembuangan Sampah Terpadu (TPST).\r\n\r\nSelain itu, kata dia, ada Bank Sampah hingga Tempat Pembuangan Akhir (TPA).\r\n\r\nAda juga kebersihan kota yang menjadi perhatian para penilai, mulai dari saluran terbuka, jalan sampai dengan ruang terbuka hijau (RTH).\r\n\r\n“Penilaiannya banyak, mulai dari kebersihan, pertamanan, penataan kawasan perumahan, pasar, TPA, Bank Sampah, kawasan public, RTH dan lain sebagainya,” urainya. (Surya/Galih Lintartika)',	'#PASURUAN #ORGANISASI-PERANGKAT-DAERAH',	'2019-01-17 08:30:25',	2),
(2,	'ALL',	'http://medan.tribunnews.com',	'',	'TKI Asal Siantar Jonatan Sihotang Terancam Hukuman Mati di Malaysia',	'Laporan Wartawan Tribun Medan / Tommy Simatupang\r\n\r\nTRIBUN-MEDAN.com, SIANTAR - Tenaga Kerja Indonesia (TKI) asal Kota Pematangsiantar Jonatan Sihotang (31) terancam hukuman mati oleh Pengadilan Malaysia.\r\n\r\nJonatan didakwa telah membunuh dan menganiaya sehingga menyebabkan satu orang meninggal dunia dan dua orang kritis.\r\n\r\nParluhutan Banjarnahor, kuasa hukum keluarga Sihotang, menjelaskan pemerintah Indonesia telah melakukan pendampingan hukum.\r\n\r\n\"Jonatan telah mengikuti persidangan pada Senin 31 Desember 2018. Informasi ini didapatkan team pengacara keluarga dari konsulat indonesia di Penang Malaysia,\" katanya kepada jurnalis di Jalan Damar Laut, Kecamatan Siantar Utara, Jumat (4/1/2019).\r\n\r\nParluhutan menjelaskan, Jonatan disidang karena telah menghilangkan nyawa seorang wanita SN (44), serta mengakibatkan YWK (14) dan SYJ (17) mengalami luka-luka lada 19 Desember 2018.\r\n\r\nParluhutan mengatakan keluarga terdakwa sangat berharap kepada pemerintah Indonesia untuk terus melakukan pendampingan.\r\n\r\nSelain itu, katanya, keluarga berharap ada keringanan hukuman terhadap Jonatan.\r\n\r\nKeluarga juga berharap pemerintah dapat memfasilitasi pertemuan dengan terdakwa.\r\n\r\n\"Karena sampai saat ini keluarga tidak dapat mengunjungi Jonatan atau pun berkomunikasi,\" ujar Parluhutan.\r\n\r\nSebelumnya, istri Jonatan, Boru Sijabat menangis menceritakan penyebab suaminya membunuh majikannya di rumahnya di Jalan Damar Kecamatan Siantar Utara.\r\n\r\nBoru Sijabat tidak dapat banyak bicara lantaran terus terbayang suaminya di balik jeruji negara tetangga.\r\n\r\nLewat pengacaranya, Parluhutan mengatakan hampir enam bulan Jonatan tidak mendapatkan upah yang semestinya. Padahal, ia berencana ingin pulang ke Indonesia untuk merayakan Tahun Baru.\r\n\r\n\"Ini kan peristiwanya masalah gaji, artinya tidak ada juga perlindungan dari Mentri Indonesia bagaimana persoalan gaji tenaga kerja indonesia di Luar Negeri. Mungkin akibat gaji ini si tersangka spontanitas melakukan upaya-upaya pembunuhan atau upaya-upaya lain,\"ujarnya, Jumat (28/12/2018).\r\n\r\nIa berharap Menteri Tenaga Kerja mengetahui persoalan ini. Ada upaya pemerintah Indonesia melalui Pemko Siantar untuk memediasi persoalan ini.\r\n\r\n\"Seharusnya pemerintah indonesia bisa mendata itu mana yang ilegal mana yang tidak agar hal semacam peristiwa ini tidak terulang kembali,\" ucapnya.\r\n\r\nSejauh ini, pihak keluarga dan juga pengacara Jonatan sudah melakukan upaya yakni menyurati Kementerian luar Negeri, Kementrian Ketenaga Kerjaan, Kedutaan Besar Indonesia di Malaysia, Konsulat Indonesia di Penang dan Pemerntah kota.\r\n\r\n\"Kenapa kita menyurati Pemerintah Kota, karena warga negara Indonesia dan berkedudukan di Pematangsiantar. Pihak pemerintah kota juga harus turut juga bertanggung jawab dan berpastisipasi menolong keluarga tersangka ini. Belum ada respon sampai saat ini,\"katanya.\r\n\r\nParluhutan juga menilai tertangkapnya Jonatan tanpa ada konfirmasi ke keluarga.\r\n\r\n\"Kenapa kami katakan tidak ada, sampai saat ini sudah berapa hari tertangkapnya suami A boru Sijabat ini tidak ada konfirmasi dari kepolisian Malaysia. Sudah sejauh mana proses penyidikannya dan sudah sejauh mana proses penegakan hukumnya kita tidak tahu,\"ujarnya.\r\n\r\n\"Kami juga berharap ke Pemerintah Indonesia supaya turun langsung melihat perkara ini. Artinya, seharusnya Mentri Luar Negeri, Kedutaan Besarnya Indonesia di Malaysia sudah mengkonfirmasi permasalahaan ini. Ini yang tidak ada, sampai saat ini pihak keluarga tidak mendapatkan status tahanan seperti apa di status tersangkanya ini. Jadi kita berharap juga Kedutaan Besar atau Konsulat yang ada di Penang segera melakukan upaya-upaya hukum perlindungan hukum,\" pungkasnya.\r\n\r\n (tmy/tribun-medan.com)',	'#JONATHAN-SIHOTANG-TKI #TKI-TERANCAM-HUKUMAN-MATI',	'2019-01-17 08:34:33',	2);

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `news_category_id` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `news_category` (`news_category_id`, `description`) VALUES
('ALL',	'ALL'),
('IT',	'ALL IT CATEGORY'),
('POLITIC',	'ALL POLITIC CATEGORY'),
('SPORT',	'ALL SPORT CATEGORY');

DROP TABLE IF EXISTS `recent_apply_jobs`;
CREATE TABLE `recent_apply_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account_id` varchar(20) DEFAULT NULL,
  `job_post_id` int(11) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_Job_post_id` (`job_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `recent_apply_jobs` (`id`, `user_account_id`, `job_post_id`, `status`, `ip_address`, `created_date`) VALUES
(2,	'bolang',	4,	'NEED TO SUBMIT_RESUME',	'::1',	'2019-02-15 18:19:53');

DROP TABLE IF EXISTS `religion`;
CREATE TABLE `religion` (
  `ID` char(15) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `religion` (`ID`, `description`) VALUES
('Buddhist',	'Budha'),
('Christian',	'Kristen'),
('Hindu',	'Hindu'),
('Moslem',	'Muslim'),
('Protestant',	'Protestan');

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `paging` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `search_tool_desc` text NOT NULL,
  `training_provided_desc` text NOT NULL,
  `regional_job_desc` text NOT NULL,
  `create_profile_desc` text NOT NULL,
  `company_short_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `setting` (`paging`, `company_name`, `phone`, `address`, `city`, `country`, `search_tool_desc`, `training_provided_desc`, `regional_job_desc`, `create_profile_desc`, `company_short_desc`) VALUES
(15,	'',	'+62 343 859 090',	'Jl. Raya Tanjung 52 - 54 <br />\r\n                          Gempol Pasuruan East Java <br />\r\n                          Indonesia 67155',	'',	'INDONESIA',	'dengan memberikan data yang valid dan benar, kami akan menyimpan informasi data pribadi anda di database kami. dan jika profile anda sesuai dengan permintaan di negara tujuan, maka team kami akan menghubungi anda.',	'Lembaga pelatihan Kerja Prima Duta Sejati siap memberikan training sesuai keahlian yang dibutuhkan di penempatan negara tujuan.',	'Saat ini kami menempatkan tenaga kerja di 6 negara, dengan berbagai macam jenis pekerjaan (Assistant Perawat atau Industri)',	'Buat identitas profesional Anda secara online dan pastikan Anda selalu mendapatkan lowongan pekerjaan yang sesuai',	'PDS has more than two decades of history, which began when the two company founders saw an opportunity to explore and delve into manpower supply business while working overseas.');

DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `country_id` char(10) NOT NULL,
  `state_id` char(20) NOT NULL,
  `state_desc` varchar(255) NOT NULL,
  KEY `country_id` (`country_id`),
  CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `state` (`country_id`, `state_id`, `state_desc`) VALUES
('IND',	'EJ',	'East Java'),
('IND',	'CJ',	'Center of Java'),
('IND',	'WJ',	'West of Java'),
('IND',	'DKI',	'Jakarta'),
('CH',	'LI',	'Liaoning'),
('CH',	'BJ',	'Beijing'),
('CH',	'SH',	'Shanghai');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_account_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `oauth_provider` varchar(10) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` char(20) NOT NULL,
  `sms_notification_active` char(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_notification_active` char(1) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`user_account_id`, `first_name`, `last_name`, `oauth_provider`, `oauth_uid`, `username`, `password`, `phone`, `sms_notification_active`, `email`, `email_notification_active`, `register_date`) VALUES
('amirchamsah',	'amir',	'chamsah',	'',	'',	'',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	'',	'amirchamsah@yahoo.com',	'0',	'2019-02-07 04:25:28'),
('billgates',	'Bill',	'Gates',	'',	'',	'',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	'',	'billgates@microsoft.com',	'0',	'2019-02-07 04:25:49'),
('bolang',	'bolang',	'bolang',	'',	'',	'',	'$2y$10$yL0wLOQAvfG.X6pAYMrU5OiyKgyq.yRuDuQRfkREw96Jm0nEwBPHq',	'',	'',	'bolang@cc.com',	'',	'2019-02-15 17:44:37'),
('demo',	'demo',	'demo',	'',	'',	'',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	'',	'demo@dmeo.com',	'0',	'2019-02-07 04:25:49'),
('kerjaln',	'Kerja',	'LN',	'',	'',	'',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	'',	'kerjaln@gmail.com',	'0',	'2019-02-07 04:25:49'),
('stevejobs',	'Steve',	'Jobs',	'',	'',	'',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	'',	'stevejobs@apple.com',	'0',	'2019-02-07 04:25:49'),
('sweety',	'nabilah',	'syakirah hamzah',	'',	'',	'',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	'',	'nabilah@gmail.com',	'0',	'2019-02-09 10:57:26');

DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` smallint(6) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_admin` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(2,	'Amir',	'Chamsah',	'amir',	'zdgJve3TPyIBjH6Jt9x-UXyV9QJV4KcR',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	'',	NULL,	'amir.hamzah_2999@yahoo.com',	NULL,	10,	1547526160,	1547526160),
(3,	'Nabilah',	'Syakirah Hamzah',	'nabilahsweety',	'NSF0KpjV8wzLTJCJizSXZh8GBSYvqCCF',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	NULL,	NULL,	'nabilah@yahoo.com',	NULL,	10,	1547530822,	1547530822),
(5,	'test',	'version',	'demo',	'zdgJve3TPyIBjH6Jt9x-UXyV9QJV4KcR',	'$2y$13$FP7ov2B9VTdi9nI9Ev.M3eDasAhj4AqKuUjmXb8nLaRdN7F4zxx9C',	NULL,	NULL,	'demo@kerjaln.com',	1,	10,	NULL,	NULL);

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account_id` varchar(20) DEFAULT NULL,
  `login_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `logout_date` datetime NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FK_UID_user_log` (`user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-03-05 06:16:04
