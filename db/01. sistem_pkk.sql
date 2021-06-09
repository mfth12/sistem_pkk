-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 08:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_berita` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `nama_berita` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori_berita`, `slug_berita`, `nama_berita`, `keterangan`, `jenis_berita`, `status_berita`, `gambar`, `tanggal_post`, `tanggal`) VALUES
(4, 3, 14, 'sejarah-pkk', 'Sejarah PKK', '<p>Awalnya, PKK adalah sebuah ide yang dibangun dari dari&nbsp; seminar Home Economic di Bogor tahun 1957.</p>\r\n<p>Pemerintah Indonesia kemudian menindaklanjuti seminar tersebut dengan membuat pelajaran pendidikan kesejahteraan keluarga.</p>\r\n<p>Sedangkan sebagai sebuah gerakan masyarakat, Pemberdayaan dan Kesejahteraan Keluarga awalnya diinisasi oleh istri gubernur Jawa Tengah (ibu Isriati Moenadi) yang begitu prihatin dengan kondisi masyarakat di wilayahnya yang menderita busung lapar.</p>\r\n<p>Inisasi istri gubernur Jawa Tengah ini mendapat respon yang baik di Indonesia.</p>\r\n<p>Adapun perubahan nama PKK sendiri terjadi pada 27 Desember 1972 kala Menteri Dalam Negeri mengeluarkan surat kawat kepada seluruh gubernur Indonesia.</p>\r\n<p>Isi surat kawat tersebut adalah agar mengubah nama Pendidikan Kesejahteraan Keluarga menjadi Pembinaan Kesejahteraan Keluarga pada 27 Desember pun ditetapkan sebagai hari kesatuan gerak PKK.</p>\r\n<h2><strong>PKK adalah Tonggak Kemajuan Ibu-ibu dan Keluarga</strong></h2>\r\n<p>Sebagai sebuah gerakan, PKK selanjutnya bergerak pada dua dimensi sekaligus, yakni:</p>\r\n<ol>\r\n<li>Dimensi spirtual, terutama dalam hal sikap dan perilaku sebagai hamba Tuhan, anggota masyarakat, serta warga negara yang dinamis serta bermanfaat dengan didasarkan pada Pancasila serta UUD 1945.</li>\r\n<li>Dimensi fisik material meliputi sandang, pangan, papan, kesempatan kerja, kesehatan, dan lingkungan hidup yang sehat serta lestari melalui peningkatan pendidikan, pengetahuan serta keterampilan.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Profil', 'Publish', 'sejarah-pkk.jpg', '2016-09-22 04:30:53', '2021-05-20 08:21:50'),
(5, 3, 14, 'visi-dan-misi', 'Visi dan Misi', '<p style=\"text-align: justify;\"><strong>VISI</strong></p>\r\n<p style=\"text-align: justify;\">Terwujudnya keluarga yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia dan berbudi luhur, sehat sejahtera, maju &ndash; mandiri, kesetaraan dan keadilan gender serta kesadaran hukum dan lingkungan.</p>\r\n<p style=\"text-align: justify;\"><strong>MISI</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li style=\"list-style-type: none;\">\r\n<ol>\r\n<li>Meningkatkan mental spiritual, perilaku hidup dengan menghayati dan mengamalkan Pancasila serta meningkatkan pelaksanaan hak dan kewajiban sesuai dengan hak azasi manusia (HAM), demokrasi, meningkatkan kesetiakawanan sosial dan kegotong royongan serta pembentukan watak bangsa yang selaras, serasi dan seimbang.</li>\r\n<li>Meningkatkan pendidikan dan ketrampilan yang diperlukan, dalam upaya mencerdaskan kehidupan bangsa serta pendapatan keluarga.</li>\r\n<li>Meningkatkan kualitas dan kuantitas pangan keluarga, serta upaya peningkatan pemanfaatan pekarangan melalui Halaman Asri, Teratur, Indah dan Nyaman (HATINYA PKK), sandang dan perumahan serta tata laksana rumah tangga yang sehat.</li>\r\n<li>Meningkatkan derajat kesehatan, kelestarian lingkungan hidup serta membiasakan hidup berencana dlam semua aspek kehidupan dan perencanaan ekonomi keluarga dengan membiasakan menabung.</li>\r\n<li>Meningkatkan pengelolaan Gerakan PKK baik kegiatan pengorganisasian maupun pelaksanaan program-programnya yang disesuaikan dengan situasi dan kondisi masyarakat setempat.</li>\r\n</ol>\r\n</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'Profil', 'Publish', 'visi-dan-misi.jpg', '2016-09-22 04:31:15', '2021-05-20 09:17:50'),
(6, 3, 14, 'tentang-pkk', 'Tentang PKK', '<p>PKK adalah organisasi kemsyarakatan yang bertujuan untuk memberdayakan perempuan. Secara umum, tentunya kita tak asing bukan dengan sebutan ibu-ibu PKK. Istilah ini sudah begitu luas dan biasanya diasosiasikan dengan perkumpulan ibu-ibu yang memiliki berbagai kegiatan postif.</p>\r\n<p>Contohnya banyak.<br />Mulai dari kegiatan pelatihan UKM (Usaha Kecil Menengah), pengajian, sampai seminar-seminar kecil mengenai kesehatan reproduksi, KB (Keluarga Berencana), KDRT (Kekerasan dalam Rumah Tangga), dan kesehatan anak. Gerakan ini sampai sekarang masih dianggap sebagai salah satu gerakan yang positif meski tak selalu mendapat sorotan publik.</p>\r\n<p>Namun kenyataannya, gerakan inilah yang sampai sekarang memiliki andil besar yang secara pragmatis mampu membantu masyarakat terutama dalam hal keluarga, perempuan, dan anak. Hal ini sejalan dengan nama PKK yang punya kepanjangan Pemberdayaan dan Kesejahteraan Keluarga. Bukan hanya untuk ibu-ibu.</p>\r\n<p>PKK adalah gerakan yang hampir selalu dianggap sebagai gerakan yang hanya bisa dianggotai perempuan.</p>\r\n<p>Padahal sejatinya, Pemberdayaan dan Kesejahteraan Keluarga tak melulu harus dianggotai kaum hawa saja.</p>\r\n<p>Gerakan ini adalah gerakan masyarakat yang berakar dari bawah (down to top) dan diharapkan bisa membantu berbagai persoalan konkrit pada lapisan masyarakat tersebut.<br />Ia hadir dengan pelaku masyarakat itu sendiri yang secara bersama-sama kemudian menyelesaikan berbagai persoalannya.</p>\r\n<p>Jadi, pelakunya sebetulnya tak melulu harus wanita.</p>\r\n<p>Laki-laki pun juga bisa ikut serta dengan berbagai program Pemberdayaan dan Kesejahteraan Keluarga, baik untuk isu keluarga umum maupun isu perempuan yang sifatnya khusus, seperti hak-hak perempuan dalam rumah tangga.</p>\r\n<p>Bukankah pemberdayaan perempuan juga membutuhkan dukungan dari laki-laki terutama dari para suami yang menjadi mitra para istri?</p>\r\n<p>Mengenal Berbagai Fungsi PKK<br />Karena Pemberdayaan dan Kesejahteraan Keluarga adalah gerakan yang sifatnya pragmatis, ia tak lepas dari berbagai fungsi yang disematkan.</p>\r\n<p>Berikut ini adalah 10 fungsi dasar dari PKK:</p>\r\n<ul>\r\n<li>Penghayatan dan Pengamalan Pancasila</li>\r\n<li>Gotong Royong</li>\r\n<li>Pangan</li>\r\n<li>Sandang</li>\r\n<li>Perumahan serta Tatalaksana Rumah Tangga</li>\r\n<li>Pendidikan serta Ketrampilan</li>\r\n<li>Kesehatan</li>\r\n<li>Pengembangan Kehidupan Berkoperasi</li>\r\n<li>Kelestarian Lingkungan Hidup</li>\r\n<li>Perencanaan Sehat</li>\r\n</ul>', 'Profil', 'Publish', 'tentang-pkk.jpg', '2020-10-27 01:36:03', '2021-05-20 08:18:20'),
(7, 3, 14, 'kata-sambutan', 'Kata Sambutan', '<p><strong>Assalamu&rsquo;alaikum warahmatullahi wabarakatuh.&nbsp;</strong><br /><strong>Salam sejahtera bagi kita semua.</strong></p>\r\n<p>Ibu-ibu sekalian yang berbahagia. Pada kesempatan yang baikini, pertama-tama marilah kita panjatkan puji syukur kehadira Tuhan Yang Maha Esa, karena atas rahmat dan karunianya, kesehatan dan kesempatan yang diberikan kepada kita semua, pada siang hari ini kita bisa berkumpul bersama-sama di balai desa ini dalamkeadaan sehat walafiat tanpa ada suatu halangan apapun. Dalam rangka melakukan evaluasi hasil kerja yang telah canangkan bersama.</p>\r\n<p>Selanjutnya, saya sampaikan terima kasih kepada ibu-ibu dai para remaja putri, semua pengurus PKK atas kehadiran dan partisipasi. Saya meminta nanti, masing-masing ketua seksi untuk menyampaikan hasil evaluasi mengenai hal-hal yang telah dicapai dan kendala-kendala yang dihadapinya, untuk selanjutnya naik&nbsp; kita bahas bersama-sama, kita cari solusi untuk mengatasi masalah masalah yang menjadi hambatan itu.</p>\r\n<p>Ibu-ibu dan para remaja putri, semua pengurus PKK yang berbahagia. Mendengarkan hasil evaluasi kerja dari masing masing seksi, cukup menggembirakan kita semua, karena semua program kerja yang telah kita canangkan bersama hampir semuanya dapat terealisir dengan baik. Hambatan-hambatan yang terjadi dan program kerja yang belum dapat terlaksana dengan baik karena memang faktor alam yang memang kurang mendukung. Namun demikian kita janganmerasa puas dengan hasil kerja dan prestasi yang telah kita capai, kita mesti melaksanakan program kerja kita yang lebih baik lagi.</p>\r\n<p>Ibu-ibu dan para remaja putri, semua pengurus PKK yangbahagia. Mengakhiri pertemuan rapat evaluasi program kerjakali ini, sekali lagi saya sampaikan terima kasih yang sedalam-dalamnya dan untuk saya peribadi saya mohon maaf yang sebesar-besarnya. Selamat bekerja dan berjuang semoga Tuhan Yang Maha Kuasa selalu merahmati dan meridhai kita semua, amin.</p>\r\n<p><strong>Wassalamu&rsquo;alaikum warahmatullahi wabarakatuh&nbsp;</strong></p>', 'Profil', 'Publish', 'kata-sambutan.jpg', '2020-10-27 01:39:16', '2021-05-20 06:18:30'),
(13, 3, 10, 'pelatihan-pembuatan-bunga-dari-kain-perca-pokja-ii', 'PELATIHAN PEMBUATAN BUNGA DARI KAIN PERCA - POKJA II', '<p>Negara Indonesia memiliki potensi berupa industri kreatif, salah satunya produk kerajian di Indonesia memiliki potensi besar untuk berkembang. Pembicaraan tentang produk hiasan dapat ditemukan diberbagai tempat disekitar kita. Bahan baku dari produk ini dapat berasal dari bahan baku baru ataupun bahan baku bekas (limbah). Pengertian limbah adalah sisa suatu usaha atau kegiatan. Industri Garment menghasilkan limbah berupa kain perca. Limbah ini dapat memiliki nilai ekonomis dengan cara membuatnya menjadi bunga-bunga cantik lalu dirangkai menjadi karangan bunga (buket) atau menjadi bros berbentuk bunga. Berdasarkan pengamatan sementara diketahui bahwa ibu-ibu PKK Desa Uma Beringin, Unter Iwes, Sumbawa Besar belum pernah melakukan kegiatan kerajinan tangan berbahan dasar kain perca untuk membuat berbagai aplikasi atau hiasan. Tujuan pengabdian kepada masyarakat untuk memberikan pelatihan keterampilan pembuatan produk dengan menggunakan bahan baku limbah kain perca menjadi produk bernilai ekonomis dan memberikan pengetahuan bagaimana menentukan harga jual produk. Kegiatan yang dilakukan bersama warga ibu-ibu PKK oleh ibu PKK, peserta antusias mempelajari dan memperhatikan serta mengikuti pelatihan dan praktek pembuatan karangan bunga (buket) dan bros bunga kecil yang diberikan. Peserta menyadari bahwa hasil yang diperoleh dari kreatifitas, inovasi dari pemanfaatan limbah kain perca yang dapat diubah bentuknya menjadi karya karangan bunga (buket) dan bros bunga unik dan berkualitas serta bernilai jual.</p>\r\n<p>&nbsp;</p>', 'Berita', 'Publish', 'pelatihan-pembuatan-bunga-dari-kain-perca-pokja-ii.jpg', '2020-11-07 07:42:43', '2021-05-20 06:18:17'),
(14, 3, 11, 'pelatihan-table-manner-pokja-iii', 'PELATIHAN TABLE MANNER - POKJA III', '<p>Selain pembekalan&nbsp;<em>hard skill</em>&nbsp;berupa ilmu pengetahuan, Undiknas juga membekali para mahasiswa dengan&nbsp;<em>soft skill</em>. Sebagai salah satu upaya bagi peningkatan&nbsp;<em>soft skill</em>&nbsp;Ibu-Ibu PKK, PKK Uma Beringin kembali menggelar pelatihan&nbsp;<em>table manner</em>&nbsp;. Aturan&nbsp;<em>table manner</em>&nbsp;adalah seperangkat aturan dan prinsip yang mengatur bagimana proses dan tata cara yang sesuai dalam jamuan resmi.&nbsp;</p>\r\n<p>&rsquo;Tabel manner itu adalah aturan etika yang dipergunakan pada saat makan, yang mana memberikan petunjuk-petunjuk yang benar dalam penggunaan alat makan. Perbedaan budaya makan dapat membuat aturan tersebut berubah-ubah yang bertujuan menambah wawasan seseorang tentang etika budaya bangsa-bangsa lain,&rsquo;&rsquo;&nbsp;</p>\r\n<p>Pelatihan yang berlangsung hampir 4 jam tersebut, diawali dengan penjelasan tata cara makan dalam jamuan formal, mulai dari cara melipat serbet di meja, cara menggunakan peralatan makan di atas meja, hingga etika makan formal.&nbsp;</p>', 'Berita', 'Publish', 'pelatihan-table-manner-pokja-iii.jpg', '2020-11-07 08:02:22', '2021-05-20 06:18:04'),
(15, 3, 9, 'gotong-royong-persiapan-bbgrn-pokja-i', 'GOTONG ROYONG PERSIAPAN BBGRN - POKJA I', '<p>Peringatan puncak Bulan Bakti Gotong Royong Masyarakat (BBGRM) XVI yang dipadukan dengan Hari Kesatuan Gerak (HKG) PKK Uma Beringin Tahun 2019,&nbsp; diselenggarakan Selasa (5/11/2019). Kegiatan tersebut, dilaksanakan sebagai upaya untuk meningkatkan budaya gotong royong dalam nilai-nilai kehidupan bermasyarakat.</p>\r\n<p>Dalam kesempatan ini, Ibu Ketua TP PKK Desa Uma Beringin dan Forkopimda juga memberikan penghargaan dan bantuan kepada 39 orang. Pencanangan BBGRM XVI Dan HKG PKK Ke-47 yang ditandai dengan pemukulan kentongan oleh Bupati dan diikuti Forkopimda, serta pelepasan balon oleh Ketua TP PKK Desa Uma Beringin.&nbsp;</p>', 'Berita', 'Publish', 'gotong-royong-persiapan-bbgrn-pokja-i.jpg', '2020-11-07 08:10:49', '2021-05-20 06:17:46'),
(16, 3, 12, 'lomba-posyandu-unter-iwes-pokja-iv', 'LOMBA POSYANDU UNTER IWES - POKJA IV', '<p style=\"text-align: justify;\">osyandu merupakan salah satu bentuk upaya kesehatan &nbsp;bersumber daya masarakat, dari masarakat, oleh masarakat, &nbsp;untuk masyarakat dalam menyelenggarakan pembangunan kesehatan , guna memberdayakan masarakat dan memudahkan dalam memperoleh pelayanan kesehatan agar mencapai masarakat yang sehat.</p>\r\n<p style=\"text-align: justify;\">Seluruh kader dan desa antusiasnya sangat tinggi untuk meningkatkan kesehatan masarakatnya. Hal ini dibuktikan oleh keaktifan kader dalam membina posyandu di desa tersebut.</p>\r\n<p style=\"text-align: justify;\">Dengan diadakannnya lomba Posyandu ini dapat meningkatkan kepedulian seluruh lapisan masyarakat di kecamatan&nbsp; masing-masing sehingga keberadaan posyandu akan meningkat kinerjanya serta meningkat cakupan pelayanan yang diberikan kepada masyarakat sehingga tercapai tujuan akhirnya untuk meningkatkan pemberdayaan masyarakat dalam rangka nenurunkan AKI dan AKB.</p>\r\n<p style=\"text-align: justify;\">Penjurian untuk Posyandu yang mengikuti lomba ini dimulai bulan Februari 2018 dengan berkunjung langsung ke Posyandu sesuai dengan jadwal yang telah ditentukan hingga bulan April 2018. Kemudian dari penilaian tersebut, tim juri akan menentukan siapa yang menjadi Posyandu terbaik dalam pelaksanaan Lomba Posyandu Tahun 2018 ini.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'Berita', 'Publish', 'lomba-posyandu-unter-iwes-pokja-iv.jpg', '2020-11-07 08:17:36', '2021-05-20 03:54:44'),
(17, 3, 14, 'pkk-desa-uma-beringin-siap-menuju-desa-cerdas', 'PKK Desa Uma Beringin Siap Menuju Desa Cerdas', '<p>10 november 2020, bertempat di aula Kantor desa Uma beringin PKK Desa Uma Beringin bersama Tim KKN Tematik Fak. Teknik UTS melakukan sosialisasi dan tranining penggunaan Website PKK desa.</p>\r\n<p>kegiatan ini bertujuan untuk mempermudah alur informasi dan pendataan PKK desa agar lebih mudah diakses oleh khalayak masyarakat khusunya Desa Uma Beringin.</p>\r\n<p>semoga kedepannya website ini mampu membawa manfaat bagi PKK khususnya dan masyarakat pada umunya agar segala macam arus informasi dapat diakses secara luas.</p>', 'Berita', 'Publish', 'pkk-desa-uma-beringin-siap-menuju-desa-cerdas.jpg', '2020-11-10 15:32:06', '2021-05-20 03:54:31'),
(19, 3, 7, 'pelatihan-penulisan-surat-menyurat', 'Pelatihan Penulisan Surat-menyurat', '<p style=\"text-align: justify;\"><strong>Kegiatan</strong> berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;</p>', 'Berita', 'Publish', 'pelatihan-penulisan-surat-menyurat.jpg', '2020-11-10 15:34:44', '2021-05-20 03:36:26'),
(20, 3, 10, 'menuju-ekonomi-take-off-melalui-pengembangan-umkm', 'Menuju Ekonomi Take Off Melalui Pengembangan UMKM', '<p>mengaktualisasi segala program yang bersifat pengembangan industri rt guna mempercepat kesejahteraan</p>', 'Berita', 'Publish', 'menuju-ekonomi-take-off-melalui-pengembangan-umkm.jpg', '2020-11-10 15:49:46', '2021-05-20 03:35:51'),
(21, 3, 14, 'jango-desa', 'Jango Desa', '<p>besok hari selasa</p>', 'Berita', 'Publish', 'snack.jpg', '2021-05-19 20:32:09', '2021-05-20 06:14:33'),
(22, 3, 14, 'gdc-developer', 'GDC Developer', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt consectetur massa, quis porta nibh ullamcorper nec. Suspendisse at ex erat. Etiam fermentum massa eu nulla consequat, eleifend ullamcorper risus venenatis. Integer ac ante et ex molestie ultrices vitae a leo. Etiam venenatis nisl et orci sagittis ornare. Pellentesque vel interdum nibh. Quisque tempus non ligula ac mattis. Proin lacinia massa ac mi convallis, et luctus eros aliquam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla dapibus erat nec venenatis pharetra. Aliquam consectetur, erat quis faucibus venenatis, nulla leo semper leo, at eleifend sem ligula et diam. Mauris gravida ultrices ligula, vitae sagittis ante cursus et. Proin nisi ante, cursus id dapibus a, ultricies ut lorem. Fusce tincidunt molestie eros in auctor. Sed dictum libero ornare, tincidunt orci et, hendrerit diam. Nullam ultricies sed ligula a rhoncus. Nam at dictum dui, in congue elit. Maecenas quis lacus et nunc mattis tincidunt sed ornare massa. Aenean dignissim vitae mi a cursus. Phasellus purus enim, tempor nec feugiat vitae, auctor eu odio. In sed lacus in nunc tempor fermentum. Morbi egestas massa vitae nisl porttitor sodales et sit amet tortor.</p>\r\n<p style=\"text-align: justify;\">Sed elementum mauris sit amet justo varius, vel eleifend est mollis. Duis tincidunt risus maximus pretium consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempus, lorem ut malesuada pharetra, leo purus bibendum purus, vitae ultricies dui mi id turpis. Donec dignissim ac ante non mattis. Sed at mollis felis. Mauris eu leo sem. Aliquam aliquam volutpat odio vel feugiat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla elit eros, lacinia ut tincidunt in, imperdiet ac quam. Sed pulvinar sem quam, eu molestie tortor consectetur ut. Ut consectetur pulvinar arcu et facilisis. Cras erat arcu, mollis imperdiet justo eget, ullamcorper tempus nunc. Vivamus aliquam metus eget elementum semper. Ut rhoncus vel leo id commodo. Quisque egestas, lorem eu aliquam hendrerit, eros tellus sodales felis, quis scelerisque orci urna in orci.</p>\r\n<p style=\"text-align: justify;\">Nullam dictum cursus varius. Phasellus eget lectus pulvinar, iaculis nisl ut, auctor nunc. Fusce egestas, felis id convallis pharetra, nulla nisl rutrum mauris, eu rhoncus sapien ipsum ultricies mi. Proin in posuere tortor. Nullam posuere nisi sed urna porttitor placerat. Donec sit amet vulputate dui. Integer finibus turpis nulla, ac consectetur sapien bibendum ut. Curabitur ipsum nulla, luctus id vehicula a, venenatis at nulla. Sed turpis orci, pretium in velit eget, semper elementum massa. Praesent et lectus aliquam, pretium tellus vel, eleifend velit. Mauris vel urna at massa euismod convallis. Fusce nunc magna, vestibulum sed dignissim at, viverra molestie neque.</p>', 'Berita', 'Publish', 'gdc-developer.png', '2021-05-19 20:33:44', '2021-05-20 09:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `data_kas`
--

CREATE TABLE `data_kas` (
  `nomor` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kas`
--

INSERT INTO `data_kas` (`nomor`, `keterangan`, `tanggal`, `jumlah`, `jenis`) VALUES
('20201030000002', 'beli jajan', '2020-10-30', '65000', 'keluar'),
('20201030000003', 'dana bantuan', '2020-10-30', '1340000', 'masuk'),
('20201030000004', 'beli kertas 1 rim', '2020-10-30', '50000', 'keluar'),
('20201030000005', 'beli speaker JBL2\r\n', '2020-10-30', '45000', 'keluar'),
('20201030000006', 'dana desa', '2020-10-31', '453000', 'masuk'),
('20201030000007', 'dana kas bulanan', '2020-11-10', '1000000', 'masuk'),
('20201030000008', 'terima bantuan dari bendahara desa ', '2020-11-10', '5000000', 'masuk'),
('20201030000009', 'poto copy buku kegtatan', '2020-11-10', '100000', 'keluar'),
('20201030000010', 'terima piutang dari ibu tantri', '2020-11-10', '2000000', 'masuk'),
('20201030000011', 'saya', '2021-05-22', '232323', 'keluar');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori_berita` int(11) NOT NULL,
  `slug_kategori_berita` varchar(255) NOT NULL,
  `nama_kategori_berita` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori_berita`, `slug_kategori_berita`, `nama_kategori_berita`, `keterangan`, `urutan`) VALUES
(7, 'sekretariat', 'Sekretariat', 'Kegiatan yang bersangkutan dengan kesekretariatan PKK desa uma beringin', 2),
(8, 'keuangan', 'Keuangan', 'Kegiatan yang bersangkutan dengan bagian keuangan dan pembendaharaan', 3),
(9, 'pokja-i', 'Pokja I', 'Kegiatan pokja I', 5),
(10, 'pokja-ii', 'Pokja II', 'Kegiatan pokja II', 9),
(11, 'pokja-iii', 'Pokja III', 'Kegiatan pokja III', 10),
(12, 'pokja-iv', 'Pokja IV', 'Kegiatan pokja IV', 13),
(14, 'umum', 'Umum', 'Kegiatan yang bersifat umum PKK desa uma beringin\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `slug_kategori_produk` varchar(255) NOT NULL,
  `nama_kategori_produk` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `slug_kategori_produk`, `nama_kategori_produk`, `keterangan`, `urutan`) VALUES
(3, 'cacing', 'Cacing', '', 2),
(4, 'ikan-lele', 'Ikan Lele', 'banyak yang dilihat', 1),
(5, 'ganteng', 'Ganteng', 'ganteng banget sii', 4);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `home_setting` varchar(20) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tentang` varchar(500) DEFAULT NULL,
  `welcome_say` text NOT NULL,
  `deskripsi_say` text NOT NULL,
  `gambar` text,
  `video` varchar(50) DEFAULT NULL,
  `yacht` text NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_map` text,
  `judul_1` varchar(200) DEFAULT NULL,
  `pesan_1` varchar(200) DEFAULT NULL,
  `judul_2` varchar(200) DEFAULT NULL,
  `pesan_2` varchar(200) DEFAULT NULL,
  `judul_3` varchar(200) DEFAULT NULL,
  `pesan_3` varchar(200) DEFAULT NULL,
  `judul_4` varchar(200) DEFAULT NULL,
  `pesan_4` varchar(200) DEFAULT NULL,
  `judul_5` varchar(200) DEFAULT NULL,
  `pesan_5` varchar(200) NOT NULL,
  `judul_6` varchar(200) DEFAULT NULL,
  `pesan_6` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `home_setting`, `namaweb`, `tagline`, `tentang`, `welcome_say`, `deskripsi_say`, `gambar`, `video`, `yacht`, `website`, `email`, `alamat`, `telepon`, `hp`, `fax`, `logo`, `icon`, `keywords`, `metatext`, `facebook`, `twitter`, `instagram`, `google_map`, `judul_1`, `pesan_1`, `judul_2`, `pesan_2`, `judul_3`, `pesan_3`, `judul_4`, `pesan_4`, `judul_5`, `pesan_5`, `judul_6`, `pesan_6`, `id_user`, `tanggal`) VALUES
(1, 'Video', 'PKK Desa', 'Uma Beringin', 'Pemberdayaan dan Kesejahteraan Keluarga (PKK) Desa Uma Beringin', 'Selamat Datang2', 'Pemberdayaan dan Kesejahteraan Keluarga atau PKK adalah Organisasi kemasyarakatan yang memberdayakan wanita untuk turut berpartisipasi dalam pembangunan Indonesia', 'Seven_Seas_Upper_Deck1.jpg', 'fsH_KhUWfho', '<p>Through the adoption of a proactive stance, the astute manager can adopt a position at the vanguard. In order to build a shared view of what can be improved, to experience a profound paradigm shift, that will indubitably lay the firm foundations for any leading company. Exploitation of core competencies as an essential enabler, exploiting the productive lifecycle by moving executive focus from lag financial indicators to more actionable lead indicators.</p>\r\n<p>An investment program where cash flows exactly match shareholders\' preferred time patterns of consumption defensive reasoning, the doom loop and doom zoom highly motivated participants contributing to a valued-added outcome. In order to build a shared view of what can be improved, in a collaborative, forward-thinking venture brought together through the merging of like minds. Combined with optimal use of human resources, from binary cause and effect to complex patterns, working through a top-down, bottom-up approach. Maximization of shareholder wealth through separation of ownership from management measure the process, not the people. While those at the coal face don\'t have sufficient view of the overall goals.</p>\r\n<p>Whenever single-loop learning strategies go wrong, to focus on improvement, not cost, in order to build a shared view of what can be improved. An important ingredient of business process reengineering that will indubitably lay the firm foundations for any leading company the new golden rule gives enormous power to those individuals and units. Whenever single-loop learning strategies go wrong, building a dynamic relationship between the main players. Organizations capable of double-loop learning, through the adoption of a proactive stance, the astute manager can adopt a position at the vanguard.</p>\r\n<p>To ensure that non-operating cash outflows are assessed. An important ingredient of business process reengineering big is no longer impregnable to experience a profound paradigm shift. The new golden rule gives enormous power to those individuals and units, while those at the coal face don\'t have sufficient view of the overall goals. Taking full cognizance of organizational learning parameters and principles, working through a top-down, bottom-up approach, an investment program where cash flows exactly match shareholders\' preferred time patterns of consumption. Big is no longer impregnable in a collaborative, forward-thinking venture brought together through the merging of like minds.</p>\r\n<p>Through the adoption of a proactive stance, the astute manager can adopt a position at the vanguard. The three cs - customers, competition and change - have created a new world for business motivating participants and capturing their expectations, organizations capable of double-loop learning. To focus on improvement, not cost, exploiting the productive lifecycle taking full cognizance of organizational learning parameters and principles. Presentation of the process flow should culminate in idea generation, the balanced scorecard, like the executive dashboard, is an essential tool quantitative analysis of all the key ratios has a vital role to play in this.</p>\r\n<p> </p>', 'http://pkkdesaumaberingin.desa.id', 'desa@umaberingin.desa.id', 'Jalan kerato, Sumbawa', '021-8736162', '093248', ' 021-88734539980', 'main-logo1.png', 'icon_site1.png', 'PKK Desa Uma Beringin ben, berubah\r\n', 'desa uma beringin', 'http://facebook.com/mfth12', 'http://twitter.com/twitter', 'http://instagram.com/mfth12s', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d986.5025979505724!2d117.41213782917971!3d-8.498369473238402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcb93257d72a773%3A0x62afa7e787164542!2sKantor%20Desa%20Uma%20Beringin!5e0!3m2!1sen!2sid!4v1603527755215!5m2!1sen!2sid\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', NULL, NULL, NULL, NULL, 'MENINGKATKAN PELAYANAN CALL CENTER', 'HEMAT', 'PROGRAM PENDIDIKAN KHUSUS', 'MURAH', 'PROGRAM SEMITAINMENT TRAINING', 'DIJAMIN BISA', 'JUNGGLE SURVIVAL TRAINING', 'YA SUDAHLAH', 3, '2021-05-23 06:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori_produk`, `slug_produk`, `nama_produk`, `keterangan`, `harga`, `stok`, `satuan`, `status_produk`, `gambar`, `tanggal_post`, `tanggal`) VALUES
(1, 2, 3, 'cacing-pita', 'Cacing pita', '<p>adada</p>', 12000, 12000, 'Ekor', 'Publish', 'owl6.jpg', '2016-06-20 04:27:19', '2016-08-04 02:20:44'),
(2, 2, 4, 'kambing-otawa', 'Kambing Otawa', '<p>Kambing Otawa</p>', 12000, 12, 'Kilogram', 'Publish', 'owl3.jpg', '2016-06-20 04:53:40', '2016-08-04 02:20:35'),
(3, 2, 4, 'ikan-lele-dumbo-baru', 'Ikan Lele Dumbo baru', '<p>Ikan Lele Dumbo</p>', 24000, 100, 'Kilogram', 'Publish', 'owl21.jpg', '2016-06-20 04:58:41', '2016-08-04 02:20:30'),
(4, 3, 5, 'percobaan-sebagai-draft', 'Percobaan sebagai Draft', '<p>hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;hope&nbsp;</p>', 500000, 23, 'Ekor', 'Publish', '5c17906f44f5fd02b8cd3b6e.png', '2020-10-14 08:11:45', '2020-10-14 06:12:12'),
(5, 3, 3, 'dsf', 'dsf', '<p>beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;beruang&nbsp;</p>', 600, 23, 'Ekor', 'Publish', '5c17911a44f5fd02b8cd3b82.png', '2020-10-15 01:30:05', '2020-10-14 23:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(12) NOT NULL,
  `nomor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `nomor`, `name`, `image`, `description`) VALUES
(907, 1, 'Kantor Desa Uma Beringin', 'Kantor_Desa.jpg', 'Kantor Desa Uma Beringin'),
(908, 2, 'Kegiatan BBGRM 2018', 'Kegiatan_BBGRN_2018.jpg', 'Bulan Bhakti Gotong Royong Masyarakat - Tahun 2018'),
(911, 17, 'Kegiatan Keterampilan Pokja II', 'Kegiatan_Keterampilan_Pokja_II.jpg', 'Kerajinan membuat sarung tissue dari kain flanel'),
(912, 18, 'Lomba Senam HUT Sumbawa', 'Lomba_Senam_HUT_Sumbawa.jpg', 'Menang lomba senam dalam rangka memperingati HUT Sumbawa'),
(913, 19, 'Pelatihan Table Manner - Pokja III', 'Pelatihan_Table_Manner.jpg', 'Kegiatan pelatihan table manner yang diselenggarakan Pokja III - Tahun 2018'),
(914, 5, 'Rapat Persiapan BBGRM', 'Rapat_Persiapan_BBGRN.jpg', 'Rapat PKK bersama Camat Unter Iwes untuk persiapan BBGRN 2018 '),
(915, 20, 'Sosialisasi PERDA Ketahanan dan Kesejahteraan Keluarga', 'Sosialisasi_PERDA_Ketahanan_dan_Kesejahteraan_Keluarga.jpg', 'Sosialisasi yang diselenggarakan oleh PERDA Ketahanan dan Kesejahteraan Keluarga - Tahun 2019'),
(916, 21, 'Sosialisasi Program Pemberdayaan Wanita', 'Sosialisasi_Program_Pemberdayaan_Wanita.jpg', 'Pra-Pelatihan Wirausaha Pekerja Migran Indonesia (PMI) Purna - Tahun 2019 ');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `slider_id` int(12) NOT NULL,
  `nomor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`slider_id`, `nomor`, `name`, `image`, `description`) VALUES
(2933, 1, 'Rysha Apriani M. Hafizh', 'RISA.jpg', 'Wakil Ketua I'),
(2939, 18, 'Anggota', 'Anggota.png', 'Anggota III'),
(2940, 19, 'Anggota IV', 'Anggota_IV.png', 'Anggota IV KKN'),
(2941, 20, 'Miftahul Haq3', 'Miftahul_Haq.png', 'Anggota III'),
(2947, 21, 'asd', 'asd.jpg', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tahun`
--

CREATE TABLE `tabel_tahun` (
  `id_tahun` int(11) NOT NULL,
  `periode_tahun` int(11) NOT NULL,
  `ket` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_tahun`
--

INSERT INTO `tabel_tahun` (`id_tahun`, `periode_tahun`, `ket`) VALUES
(42, 2018, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`) VALUES
(3, 'Miftahul Haq', 'sekretaris3@umaberingin.desa.id', 'pkkdesa', 'desa', 'superadmin'),
(4, 'Perangkat Desa Uma Beringin', 'desa@gmail.com', 'perangkatdesa', 'desa', 'admin_desa'),
(13, 'Rysha Apriani', 'ryshaaaaa@gmail.com', 'admin umum', 'ibubaikhati', 'superadmin'),
(14, 'Miftahul Haq', 'ciftah12@gmail.com', 'miftah', 'miftah', 'superadmin'),
(15, 'karmila syafitri', 'karmilasyafitri7@gmail.com', 'adminpokja4', 'milayanti', 'superadmin'),
(16, 'Rulany Indra Gartika', 'rulanyindragartika1984@gmail.com', 'adminpokja3', '170845', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `keterangan` text,
  `video` varchar(200) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `judul`, `posisi`, `keterangan`, `video`, `urutan`, `id_user`, `tanggal`) VALUES
(1, 'ada', 'Homepage', NULL, 'dTA3-GxQyks', 1, 1, '2016-10-13 02:14:41'),
(2, 'Video tutorial', 'Homepage', NULL, 'uNdvaTZiOHo', 1, 1, '2016-10-13 02:14:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `slug_berita` (`slug_berita`);

--
-- Indexes for table `data_kas`
--
ALTER TABLE `data_kas`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`),
  ADD UNIQUE KEY `slug_kategori_berita` (`slug_kategori_berita`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tabel_tahun`
--
ALTER TABLE `tabel_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `slider_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2948;

--
-- AUTO_INCREMENT for table `tabel_tahun`
--
ALTER TABLE `tabel_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
