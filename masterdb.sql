/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : masterdb

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 25/04/2023 14:15:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agama
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of agama
-- ----------------------------
INSERT INTO `agama` VALUES (1, 'islam');
INSERT INTO `agama` VALUES (2, 'protestan');
INSERT INTO `agama` VALUES (3, 'katolik');
INSERT INTO `agama` VALUES (4, 'hindu');
INSERT INTO `agama` VALUES (5, 'budha');
INSERT INTO `agama` VALUES (6, 'konghucu');

-- ----------------------------
-- Table structure for biodata
-- ----------------------------
DROP TABLE IF EXISTS `biodata`;
CREATE TABLE `biodata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nrp_nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tmp_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `usia` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kelamin_id` smallint NULL DEFAULT NULL,
  `agama_id` smallint NULL DEFAULT NULL,
  `status_id` smallint NULL DEFAULT NULL,
  `nama_pasangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_sekarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_pensiun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bpjs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat_id` smallint NULL DEFAULT NULL,
  `korps_id` smallint NULL DEFAULT NULL,
  `tmt_pangkat` date NULL DEFAULT NULL,
  `sumber_id` smallint NULL DEFAULT NULL,
  `tmt_sumber` date NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_id` smallint NULL DEFAULT NULL,
  `tmt_kategori` date NULL DEFAULT NULL,
  `gaji_terakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_masa_kerja` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bulan_masa_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gaji_pensiun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kta_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sumber_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `users_id` smallint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of biodata
-- ----------------------------

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Pensiun Alami');
INSERT INTO `kategori` VALUES (2, 'Pensiun Dini');
INSERT INTO `kategori` VALUES (3, 'Pensiun Janda/ Duda');
INSERT INTO `kategori` VALUES (4, 'Pensiun Meninggal');

-- ----------------------------
-- Table structure for kelamin
-- ----------------------------
DROP TABLE IF EXISTS `kelamin`;
CREATE TABLE `kelamin`  (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelamin
-- ----------------------------
INSERT INTO `kelamin` VALUES (1, 'laki-laki');
INSERT INTO `kelamin` VALUES (2, 'perempuan');

-- ----------------------------
-- Table structure for korps
-- ----------------------------
DROP TABLE IF EXISTS `korps`;
CREATE TABLE `korps`  (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of korps
-- ----------------------------
INSERT INTO `korps` VALUES (1, 'INF');
INSERT INTO `korps` VALUES (2, 'KAV');
INSERT INTO `korps` VALUES (3, 'ARM');
INSERT INTO `korps` VALUES (4, 'ARH');
INSERT INTO `korps` VALUES (5, 'CZI');
INSERT INTO `korps` VALUES (6, 'CPN');
INSERT INTO `korps` VALUES (7, 'CHB');
INSERT INTO `korps` VALUES (8, 'CPL');
INSERT INTO `korps` VALUES (9, 'CPM');
INSERT INTO `korps` VALUES (10, 'CBA');
INSERT INTO `korps` VALUES (11, 'CKM');
INSERT INTO `korps` VALUES (12, 'CTP');
INSERT INTO `korps` VALUES (13, 'CKU');
INSERT INTO `korps` VALUES (14, 'CHK');
INSERT INTO `korps` VALUES (15, 'CAJ');

-- ----------------------------
-- Table structure for pangkat
-- ----------------------------
DROP TABLE IF EXISTS `pangkat`;
CREATE TABLE `pangkat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gaji_pokok` int NULL DEFAULT NULL,
  `dasar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pangkat
-- ----------------------------
INSERT INTO `pangkat` VALUES (1, 'Letjen', 'TNI', 'Letjen', 5079300, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (2, 'Mayjen', 'TNI', 'Mayjen', 3290500, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (3, 'Brigjen', 'TNI', 'Brigjen', 3290500, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (4, 'Kolonel', 'TNI', 'Kolonel', 3190700, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (5, 'Letkol', 'TNI', 'Letkol', 3093900, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (6, 'Mayor', 'TNI', 'Mayor', 3000100, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (7, 'Kapten', 'TNI', 'Kapten', 2909100, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (8, 'Lettu', 'TNI', 'Lettu', 2820800, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (9, 'Letda', 'TNI', 'Letda', 2735300, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (10, 'Peltu', 'TNI', 'Peltu', 2454000, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (11, 'Pelda', 'TNI', 'Pelda', 2379500, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (12, 'Serma', 'TNI', 'Serma', 2307400, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (13, 'Serka', 'TNI', 'Serka', 2237400, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (14, 'Sertu', 'TNI', 'Sertu', 2169500, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (15, 'Serda', 'TNI', 'Serda', 2103700, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (16, 'Kopka', 'TNI', 'Kopka', 1917100, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (17, 'Koptu', 'TNI', 'Koptu', 1858900, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (18, 'Kopda', 'TNI', 'Kopda', 1802600, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (19, 'Praka', 'TNI', 'Praka', 1747900, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (20, 'Pratu', 'TNI', 'Pratu', 1694900, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (21, 'Prada', 'TNI', 'Prada', 1643500, 'PP Nomor 16 Tahun 2019, Perubahan Ke-12 PP Nomor 28 Tahun 2001');
INSERT INTO `pangkat` VALUES (22, 'Pembina Utama IV/e', 'PNS', 'IV/e', 3593100, NULL);
INSERT INTO `pangkat` VALUES (23, 'Pembina Madya IV/d', 'PNS', 'IV/d', 3447200, NULL);
INSERT INTO `pangkat` VALUES (24, 'Pembina Muda IV/c', 'PNS', 'IV/c', 3307300, NULL);
INSERT INTO `pangkat` VALUES (25, 'Pembina Tingkat I-IV/b', 'PNS', 'IV/b', 3173100, NULL);
INSERT INTO `pangkat` VALUES (26, 'Pembina IV/a', 'PNS', 'IV/a', 3044300, NULL);
INSERT INTO `pangkat` VALUES (27, 'Penata Tingkat I-III/d', 'PNS', 'III/d', 2920800, NULL);
INSERT INTO `pangkat` VALUES (28, 'Penata III/c', 'PNS', 'III/c', 2802300, NULL);
INSERT INTO `pangkat` VALUES (29, 'Penata Muda Tingkat I-III/b', 'PNS', 'III/b', 2688500, NULL);
INSERT INTO `pangkat` VALUES (30, 'Penata Muda III/a', 'PNS', 'III/a', 2579400, NULL);
INSERT INTO `pangkat` VALUES (31, 'Pengatur Tingkat I-II/d', 'PNS', 'II/d', 2399200, NULL);
INSERT INTO `pangkat` VALUES (32, 'Pengatur II/c', 'PNS', 'II/c', 2301800, NULL);
INSERT INTO `pangkat` VALUES (33, 'Pengatur Muda Tingkat I-II/b', 'PNS', 'II/b', 2301800, NULL);
INSERT INTO `pangkat` VALUES (34, 'Pengatur Muda II/a', 'PNS', 'II/a', 2022200, NULL);
INSERT INTO `pangkat` VALUES (35, 'Juru Tingkat I-I/d', 'PNS', 'I/d', 1851800, NULL);
INSERT INTO `pangkat` VALUES (36, 'Juru I/c', 'PNS', 'I/c', 1776600, NULL);
INSERT INTO `pangkat` VALUES (37, 'Juru Muda Tingkat I-I/b', 'PNS', 'I/b', 1704500, NULL);
INSERT INTO `pangkat` VALUES (38, 'Juru Muda I/a', 'PNS', 'I/a', 1560800, NULL);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'menikah');
INSERT INTO `status` VALUES (2, 'belum menikah');
INSERT INTO `status` VALUES (3, 'duda');
INSERT INTO `status` VALUES (4, 'janda');

-- ----------------------------
-- Table structure for sumber
-- ----------------------------
DROP TABLE IF EXISTS `sumber`;
CREATE TABLE `sumber`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sumber
-- ----------------------------
INSERT INTO `sumber` VALUES (1, 'PA', 'perwira');
INSERT INTO `sumber` VALUES (2, 'BA', 'bintara');
INSERT INTO `sumber` VALUES (3, 'TA', 'tamtama');
INSERT INTO `sumber` VALUES (4, 'PNS', 'pegawai negeri sipil');
INSERT INTO `sumber` VALUES (5, 'CPNS', 'calon pegawai negeri sipil');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'robbi nugraha', 'robbi85', 'hardictadasky@gmail.com', NULL, '$2y$10$GNG1Mqwmc6XNiDWjVsfhmuqBDOGUWvt0.eGUpAO6pP0bvt0xxrkvC', NULL, '2023-04-16 15:36:15', '2023-04-16 15:36:15');
INSERT INTO `users` VALUES (2, 'andri', 'andrian', 'andrieanbilly@gmail.com', NULL, '$2y$10$QQRNygnDfnT46O093D0uauMlC72fwCHDJPU2bKVEnCnlKflSVeth2', NULL, '2023-04-16 15:48:22', '2023-04-16 15:48:22');
INSERT INTO `users` VALUES (3, 'andrian2', 'andrian2', 'andrieanbilly2@gmail.com', NULL, '$2y$10$YmegX0RCXkZSvxIZynbGPurIWNhcHBnpSDleVdcn1uQHQssC0FCDq', NULL, '2023-04-16 15:49:05', '2023-04-16 15:49:05');
INSERT INTO `users` VALUES (4, 'roby', 'hardic', 'hardictadasky2@gmail.com', NULL, '$2y$10$NupFd0lu14mLHOETLXYmHOUppYnoJHcUbngDSfHNxMvKyyi7W4pgO', NULL, '2023-04-16 15:50:21', '2023-04-16 15:50:21');

SET FOREIGN_KEY_CHECKS = 1;
