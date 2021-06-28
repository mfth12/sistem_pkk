-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 04:09 AM
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
  `id_pokja` int(11) DEFAULT NULL,
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

INSERT INTO `berita` (`id_berita`, `id_user`, `id_pokja`, `slug_berita`, `nama_berita`, `keterangan`, `jenis_berita`, `status_berita`, `gambar`, `tanggal_post`, `tanggal`) VALUES
(4, 641, 74, 'sejarah-pkk', 'Sejarah PKK', '<p>Awalnya, PKK adalah sebuah ide yang dibangun dari dari&nbsp; seminar Home Economic di Bogor tahun 1957.</p>\r\n<p>Pemerintah Indonesia kemudian menindaklanjuti seminar tersebut dengan membuat pelajaran pendidikan kesejahteraan keluarga.</p>\r\n<p>Sedangkan sebagai sebuah gerakan masyarakat, Pemberdayaan dan Kesejahteraan Keluarga awalnya diinisasi oleh istri gubernur Jawa Tengah (ibu Isriati Moenadi) yang begitu prihatin dengan kondisi masyarakat di wilayahnya yang menderita busung lapar.</p>\r\n<p>Inisasi istri gubernur Jawa Tengah ini mendapat respon yang baik di Indonesia.</p>\r\n<p>Adapun perubahan nama PKK sendiri terjadi pada 27 Desember 1972 kala Menteri Dalam Negeri mengeluarkan surat kawat kepada seluruh gubernur Indonesia.</p>\r\n<p>Isi surat kawat tersebut adalah agar mengubah nama Pendidikan Kesejahteraan Keluarga menjadi Pembinaan Kesejahteraan Keluarga pada 27 Desember pun ditetapkan sebagai hari kesatuan gerak PKK.</p>\r\n<h2><strong>PKK adalah Tonggak Kemajuan Ibu-ibu dan Keluarga</strong></h2>\r\n<p>Sebagai sebuah gerakan, PKK selanjutnya bergerak pada dua dimensi sekaligus, yakni:</p>\r\n<ol>\r\n<li>Dimensi spirtual, terutama dalam hal sikap dan perilaku sebagai hamba Tuhan, anggota masyarakat, serta warga negara yang dinamis serta bermanfaat dengan didasarkan pada Pancasila serta UUD 1945.</li>\r\n<li>Dimensi fisik material meliputi sandang, pangan, papan, kesempatan kerja, kesehatan, dan lingkungan hidup yang sehat serta lestari melalui peningkatan pendidikan, pengetahuan serta keterampilan.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Profil', 'Publish', 'sejarah-pkkdsf.jpg', '2016-09-22 04:30:53', '2021-06-19 15:25:37'),
(5, 641, 74, 'visi-dan-misi', 'Visi dan Misi', '<p style=\"text-align: justify;\"><strong>VISI</strong></p>\r\n<p style=\"text-align: justify;\">Terwujudnya keluarga yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia dan berbudi luhur, sehat sejahtera, maju &ndash; mandiri, kesetaraan dan keadilan gender serta kesadaran hukum dan lingkungan.</p>\r\n<p style=\"text-align: justify;\"><strong>MISI</strong></p>\r\n<ol>\r\n<li style=\"text-align: justify;\">Meningkatkan mental spiritual, perilaku hidup dengan menghayati dan mengamalkan Pancasila serta meningkatkan pelaksanaan hak dan kewajiban sesuai dengan hak azasi manusia (HAM), demokrasi, meningkatkan kesetiakawanan sosial dan kegotong royongan serta pembentukan watak bangsa yang selaras, serasi dan seimbang.</li>\r\n<li style=\"text-align: justify;\">Meningkatkan pendidikan dan ketrampilan yang diperlukan, dalam upaya mencerdaskan kehidupan bangsa serta pendapatan keluarga.</li>\r\n<li style=\"text-align: justify;\">Meningkatkan kualitas dan kuantitas pangan keluarga, serta upaya peningkatan pemanfaatan pekarangan melalui Halaman Asri, Teratur, Indah dan Nyaman (HATINYA PKK), sandang dan perumahan serta tata laksana rumah tangga yang sehat.</li>\r\n<li style=\"text-align: justify;\">Meningkatkan derajat kesehatan, kelestarian lingkungan hidup serta membiasakan hidup berencana dlam semua aspek kehidupan dan perencanaan ekonomi keluarga dengan membiasakan menabung.</li>\r\n<li style=\"text-align: justify;\">Meningkatkan pengelolaan Gerakan PKK baik kegiatan pengorganisasian maupun pelaksanaan program-programnya yang disesuaikan dengan situasi dan kondisi masyarakat setempat.</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'Profil', 'Publish', 'visi-dan-misi-dsd.jpg', '2016-09-22 04:31:15', '2021-06-19 15:26:01'),
(6, 641, 74, 'tentang-pkk', 'Tentang PKK', '<p style=\"text-align: justify;\">PKK adalah organisasi kemsyarakatan yang bertujuan untuk memberdayakan perempuan. Secara umum, tentunya kita tak asing bukan dengan sebutan ibu-ibu PKK. Istilah ini sudah begitu luas dan biasanya diasosiasikan dengan perkumpulan ibu-ibu yang memiliki berbagai kegiatan postif.</p>\r\n<p style=\"text-align: justify;\">Contohnya banyak.<br />Mulai dari kegiatan pelatihan UKM (Usaha Kecil Menengah), pengajian, sampai seminar-seminar kecil mengenai kesehatan reproduksi, KB (Keluarga Berencana), KDRT (Kekerasan dalam Rumah Tangga), dan kesehatan anak. Gerakan ini sampai sekarang masih dianggap sebagai salah satu gerakan yang positif meski tak selalu mendapat sorotan publik.</p>\r\n<p style=\"text-align: justify;\">Namun kenyataannya, gerakan inilah yang sampai sekarang memiliki andil besar yang secara pragmatis mampu membantu masyarakat terutama dalam hal keluarga, perempuan, dan anak. Hal ini sejalan dengan nama PKK yang punya kepanjangan Pemberdayaan dan Kesejahteraan Keluarga. Bukan hanya untuk ibu-ibu.</p>\r\n<p style=\"text-align: justify;\">PKK adalah gerakan yang hampir selalu dianggap sebagai gerakan yang hanya bisa dianggotai perempuan.</p>\r\n<p style=\"text-align: justify;\">Padahal sejatinya, Pemberdayaan dan Kesejahteraan Keluarga tak melulu harus dianggotai kaum hawa saja.</p>\r\n<p style=\"text-align: justify;\">Gerakan ini adalah gerakan masyarakat yang berakar dari bawah (down to top) dan diharapkan bisa membantu berbagai persoalan konkrit pada lapisan masyarakat tersebut.<br />Ia hadir dengan pelaku masyarakat itu sendiri yang secara bersama-sama kemudian menyelesaikan berbagai persoalannya.</p>\r\n<p style=\"text-align: justify;\">Jadi, pelakunya sebetulnya tak melulu harus wanita.</p>\r\n<p style=\"text-align: justify;\">Laki-laki pun juga bisa ikut serta dengan berbagai program Pemberdayaan dan Kesejahteraan Keluarga, baik untuk isu keluarga umum maupun isu perempuan yang sifatnya khusus, seperti hak-hak perempuan dalam rumah tangga.</p>\r\n<p style=\"text-align: justify;\">Bukankah pemberdayaan perempuan juga membutuhkan dukungan dari laki-laki terutama dari para suami yang menjadi mitra para istri?</p>\r\n<p style=\"text-align: justify;\">Mengenal Berbagai Fungsi PKK<br />Karena Pemberdayaan dan Kesejahteraan Keluarga adalah gerakan yang sifatnya pragmatis, ia tak lepas dari berbagai fungsi yang disematkan.</p>\r\n<p style=\"text-align: justify;\">Berikut ini adalah 10 fungsi dasar dari PKK:</p>\r\n<ol>\r\n<li style=\"text-align: justify;\">Penghayatan dan Pengamalan Pancasila</li>\r\n<li style=\"text-align: justify;\">Gotong Royong</li>\r\n<li style=\"text-align: justify;\">Pangan</li>\r\n<li style=\"text-align: justify;\">Sandang</li>\r\n<li style=\"text-align: justify;\">Perumahan serta Tatalaksana Rumah Tangga</li>\r\n<li style=\"text-align: justify;\">Pendidikan serta Ketrampilan</li>\r\n<li style=\"text-align: justify;\">Kesehatan</li>\r\n<li style=\"text-align: justify;\">Pengembangan Kehidupan Berkoperasi</li>\r\n<li style=\"text-align: justify;\">Kelestarian Lingkungan Hidup</li>\r\n<li style=\"text-align: justify;\">Perencanaan Sehat</li>\r\n</ol>', 'Profil', 'Publish', 'tentang-pkk.jpg', '2020-10-27 01:36:03', '2021-06-19 15:26:45'),
(13, 641, 81, 'pelatihan-pembuatan-bunga-dari-kain-perca', 'Pelatihan Pembuatan Bunga Dari Kain Perca', '<p style=\"text-align: justify;\">Negara Indonesia memiliki potensi berupa industri kreatif, salah satunya produk kerajian di Indonesia memiliki potensi besar untuk berkembang. Pembicaraan tentang produk hiasan dapat ditemukan diberbagai tempat disekitar kita. Bahan baku dari produk ini dapat berasal dari bahan baku baru ataupun bahan baku bekas (limbah). Pengertian limbah adalah sisa suatu usaha atau kegiatan. Industri Garment menghasilkan limbah berupa kain perca. Limbah ini dapat memiliki nilai ekonomis dengan cara membuatnya menjadi bunga-bunga cantik lalu dirangkai menjadi karangan bunga (buket) atau menjadi bros berbentuk bunga. Berdasarkan pengamatan sementara diketahui bahwa ibu-ibu PKK Desa Uma Beringin, Unter Iwes, Sumbawa Besar belum pernah melakukan kegiatan kerajinan tangan berbahan dasar kain perca untuk membuat berbagai aplikasi atau hiasan. Tujuan pengabdian kepada masyarakat untuk memberikan pelatihan keterampilan pembuatan produk dengan menggunakan bahan baku limbah kain perca menjadi produk bernilai ekonomis dan memberikan pengetahuan bagaimana menentukan harga jual produk. Kegiatan yang dilakukan bersama warga ibu-ibu PKK oleh ibu PKK, peserta antusias mempelajari dan memperhatikan serta mengikuti pelatihan dan praktek pembuatan karangan bunga (buket) dan bros bunga kecil yang diberikan. Peserta menyadari bahwa hasil yang diperoleh dari kreatifitas, inovasi dari pemanfaatan limbah kain perca yang dapat diubah bentuknya menjadi karya karangan bunga (buket) dan bros bunga unik dan berkualitas serta bernilai jual.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'Berita', 'Publish', 'pelatihan-pembuatan-bunga-dari-kain-perca.jpg', '2020-11-07 07:42:43', '2021-06-19 15:28:35'),
(14, 641, 82, 'pelatihan-table-manner', 'Pelatihan Table Manner', '<p style=\"text-align: justify;\">Selain pembekalan&nbsp;<em>hard skill</em>&nbsp;berupa ilmu pengetahuan, Undiknas juga membekali para mahasiswa dengan&nbsp;<em>soft skill</em>. Sebagai salah satu upaya bagi peningkatan&nbsp;<em>soft skill</em>&nbsp;Ibu-Ibu PKK, PKK Uma Beringin kembali menggelar pelatihan&nbsp;<em>table manner</em>&nbsp;. Aturan&nbsp;<em>table manner</em>&nbsp;adalah seperangkat aturan dan prinsip yang mengatur bagimana proses dan tata cara yang sesuai dalam jamuan resmi.&nbsp;</p>\r\n<blockquote>\r\n<p style=\"text-align: justify;\">&rsquo;Tabel manner itu adalah aturan etika yang dipergunakan pada saat makan, yang mana memberikan petunjuk-petunjuk yang benar dalam penggunaan alat makan. Perbedaan budaya makan dapat membuat aturan tersebut berubah-ubah yang bertujuan menambah wawasan seseorang tentang etika budaya bangsa-bangsa lain,&rsquo;&rsquo;&nbsp;</p>\r\n</blockquote>\r\n<p style=\"text-align: justify;\">Pelatihan yang berlangsung hampir 4 jam tersebut, diawali dengan penjelasan tata cara makan dalam jamuan formal, mulai dari cara melipat serbet di meja, cara menggunakan peralatan makan di atas meja, hingga etika makan formal.&nbsp;</p>', 'Berita', 'Publish', 'pelatihan-table-manner.jpg', '2020-11-07 08:02:22', '2021-06-19 15:28:28'),
(15, 641, 82, 'gotong-royong-persiapan-bbgrn', 'Gotong Royong Persiapan BBGRN', '<p>Peringatan puncak Bulan Bakti Gotong Royong Masyarakat (BBGRM) XVI yang dipadukan dengan Hari Kesatuan Gerak (HKG) PKK Uma Beringin Tahun 2019,&nbsp; diselenggarakan Selasa (5/11/2019). Kegiatan tersebut, dilaksanakan sebagai upaya untuk meningkatkan budaya gotong royong dalam nilai-nilai kehidupan bermasyarakat.</p>\r\n<p>Dalam kesempatan ini, Ibu Ketua TP PKK Desa Uma Beringin dan Forkopimda juga memberikan penghargaan dan bantuan kepada 39 orang. Pencanangan BBGRM XVI Dan HKG PKK Ke-47 yang ditandai dengan pemukulan kentongan oleh Bupati dan diikuti Forkopimda, serta pelepasan balon oleh Ketua TP PKK Desa Uma Beringin.&nbsp;</p>', 'Berita', 'Publish', 'gotong-royong-persiapan-bbgrn.jpg', '2020-11-07 08:10:49', '2021-06-19 15:28:15'),
(16, 641, 86, 'lomba-posyandu-unter-iwes', 'Lomba Posyandu Unter Iwes ', '<p style=\"text-align: justify;\">osyandu merupakan salah satu bentuk upaya kesehatan &nbsp;bersumber daya masarakat, dari masarakat, oleh masarakat, &nbsp;untuk masyarakat dalam menyelenggarakan pembangunan kesehatan , guna memberdayakan masarakat dan memudahkan dalam memperoleh pelayanan kesehatan agar mencapai masarakat yang sehat.</p>\r\n<p style=\"text-align: justify;\">Seluruh kader dan desa antusiasnya sangat tinggi untuk meningkatkan kesehatan masarakatnya. Hal ini dibuktikan oleh keaktifan kader dalam membina posyandu di desa tersebut.</p>\r\n<p style=\"text-align: justify;\">Dengan diadakannnya lomba Posyandu ini dapat meningkatkan kepedulian seluruh lapisan masyarakat di kecamatan&nbsp; masing-masing sehingga keberadaan posyandu akan meningkat kinerjanya serta meningkat cakupan pelayanan yang diberikan kepada masyarakat sehingga tercapai tujuan akhirnya untuk meningkatkan pemberdayaan masyarakat dalam rangka nenurunkan AKI dan AKB.</p>\r\n<p style=\"text-align: justify;\">Penjurian untuk Posyandu yang mengikuti lomba ini dimulai bulan Februari 2018 dengan berkunjung langsung ke Posyandu sesuai dengan jadwal yang telah ditentukan hingga bulan April 2018. Kemudian dari penilaian tersebut, tim juri akan menentukan siapa yang menjadi Posyandu terbaik dalam pelaksanaan Lomba Posyandu Tahun 2018 ini.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'Berita', 'Publish', 'lomba-posyandu-unter-iwes.jpg', '2020-11-07 08:17:36', '2021-06-19 15:55:33'),
(17, 641, 74, 'pkk-desa-uma-beringin-siap-untuk-menuju-desa-cerdas', 'PKK Desa Uma Beringin, Siap Untuk Menuju Desa Cerdas', '<p>10 november 2020, bertempat di aula Kantor desa Uma beringin PKK Desa Uma Beringin bersama Tim KKN Tematik Fak. Teknik UTS melakukan sosialisasi dan tranining penggunaan Website PKK desa.</p>\r\n<p>kegiatan ini bertujuan untuk mempermudah alur informasi dan pendataan PKK desa agar lebih mudah diakses oleh khalayak masyarakat khusunya Desa Uma Beringin.</p>\r\n<p>semoga kedepannya website ini mampu membawa manfaat bagi PKK khususnya dan masyarakat pada umunya agar segala macam arus informasi dapat diakses secara luas.</p>', 'Berita', 'Publish', 'pkk-desa-uma-beringin-siap-untuk-menuju-desa-cerdas.jpg', '2020-11-10 15:32:06', '2021-06-19 15:27:35'),
(19, 641, 75, 'pelatihan-penulisan-surat-menyurat', 'Pelatihan Penulisan Surat-menyurat', '<p style=\"text-align: justify;\"><strong>Kegiatan</strong> berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;Kegiatan berlangsung dengan sangat antusias dari masyarakat.&nbsp;</p>', 'Berita', 'Publish', 'pelatihan-penulisan-surat-menyurat.jpg', '2020-11-10 15:34:44', '2021-06-19 15:27:28'),
(20, 641, 81, 'menuju-ekonomi-take-off-melalui-pengembangan-umkm', 'Menuju Ekonomi Take Off Melalui Pengembangan UMKM', '<p>mengaktualisasi segala program yang bersifat pengembangan industri rt guna mempercepat kesejahteraan</p>', 'Berita', 'Publish', 'menuju-ekonomi-take-off-melalui-pengembangan-umkm.jpg', '2020-11-10 15:49:46', '2021-06-19 15:24:10'),
(88310, 641, 74, 'gdc-developer7', 'GDC Developer7', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt consectetur massa, quis porta nibh ullamcorper nec. Suspendisse at ex erat. Etiam fermentum massa eu nulla consequat, eleifend ullamcorper risus venenatis. Integer ac ante et ex molestie ultrices vitae a leo. Etiam venenatis nisl et orci sagittis ornare. Pellentesque vel interdum nibh. Quisque tempus non ligula ac mattis. Proin lacinia massa ac mi convallis, et luctus eros aliquam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla dapibus erat nec venenatis pharetra. Aliquam consectetur, erat quis faucibus venenatis, nulla leo semper leo, at eleifend sem ligula et diam. Mauris gravida ultrices ligula, vitae sagittis ante cursus et. Proin nisi ante, cursus id dapibus a, ultricies ut lorem. Fusce tincidunt molestie eros in auctor. Sed dictum libero ornare, tincidunt orci et, hendrerit diam. Nullam ultricies sed ligula a rhoncus. Nam at dictum dui, in congue elit. Maecenas quis lacus et nunc mattis tincidunt sed ornare massa. Aenean dignissim vitae mi a cursus. Phasellus purus enim, tempor nec feugiat vitae, auctor eu odio. In sed lacus in nunc tempor fermentum. Morbi egestas massa vitae nisl porttitor sodales et sit amet tortor.</p>\r\n<p style=\"text-align: justify;\">Sed elementum mauris sit amet justo varius, vel eleifend est mollis. Duis tincidunt risus maximus pretium consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tempus, lorem ut malesuada pharetra, leo purus bibendum purus, vitae ultricies dui mi id turpis. Donec dignissim ac ante non mattis. Sed at mollis felis. Mauris eu leo sem. Aliquam aliquam volutpat odio vel feugiat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla elit eros, lacinia ut tincidunt in, imperdiet ac quam. Sed pulvinar sem quam, eu molestie tortor consectetur ut. Ut consectetur pulvinar arcu et facilisis. Cras erat arcu, mollis imperdiet justo eget, ullamcorper tempus nunc. Vivamus aliquam metus eget elementum semper. Ut rhoncus vel leo id commodo. Quisque egestas, lorem eu aliquam hendrerit, eros tellus sodales felis, quis scelerisque orci urna in orci.</p>\r\n<p style=\"text-align: justify;\">Nullam dictum cursus varius. Phasellus eget lectus pulvinar, iaculis nisl ut, auctor nunc. Fusce egestas, felis id convallis pharetra, nulla nisl rutrum mauris, eu rhoncus sapien ipsum ultricies mi. Proin in posuere tortor. Nullam posuere nisi sed urna porttitor placerat. Donec sit amet vulputate dui. Integer finibus turpis nulla, ac consectetur sapien bibendum ut. Curabitur ipsum nulla, luctus id vehicula a, venenatis at nulla. Sed turpis orci, pretium in velit eget, semper elementum massa. Praesent et lectus aliquam, pretium tellus vel, eleifend velit. Mauris vel urna at massa euismod convallis. Fusce nunc magna, vestibulum sed dignissim at, viverra molestie neque.</p>\r\n<p style=\"text-align: justify;\">Thank you</p>\r\n<p style=\"text-align: justify;\">asd</p>\r\n<p style=\"text-align: justify;\">sa</p>\r\n<p style=\"text-align: justify;\">d</p>\r\n<p style=\"text-align: justify;\">as</p>\r\n<p style=\"text-align: justify;\">d</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'Berita', 'Publish', 'gdc-developer.png', '2021-05-19 20:33:44', '2021-06-19 15:24:01'),
(88311, 641, 79, 'rekapitulasi-data-pkk', 'Rekapitulasi Data PKK', '<div>\r\n<p style=\"text-align: justify;\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<p style=\"text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>', 'Berita', 'Publish', 'lorem-ipsum.jpg', '2021-06-10 00:04:27', '2021-06-19 15:11:19'),
(88312, 641, 74, 'where-can-i-get-some', 'Where can I get some?', '<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p><img style=\"float: left;\" src=\"https://lh3.googleusercontent.com/N8QsAtZD5ydV_Fh86u-wPOOENwh2DGYhIF_aYA-B5LrJhc8Pn7ll1Tti0atVAl1zC39DxKeI5ab-C5ODMiG_4IJvP559xg6WWRA2U6IGbdLCsvkJXbiPy5Jsb1Z5mTylfnK5CqkqqygVtGhNtHzs0XppcP3H9gmj1cwQnX3n0VlXm9gnQZPJLHAwh4-eTT2AT5oWzgRg4N2babspACxvPwLxdR7AbdHFZhlGokTeYALW8eVWtoG7CS7HgJkMCjnQoXoEpldQgi9kBgU6x_fbdOznzhZ0RMVL1rf9Zs9rttUiZTz7RXAnqitmOXlI5l-M1FGM976H546a5kdhYQe2tkuFdX038LuQCqyci1GnOs6K8ag68hNgfj7d_NFqW_EIfgiMkJq3nOC1Wt2_1eTYNCyCHyTuuIWaRJt6tE_0ukqLn8vJFcui7NCH6jAWFoR0M13tvzp9AT7VCw7PN_HQd8-jPNodlt6k3EoCN6a7DwFsDaZj5iq0V_01GzG000Ff-ibPKH_FMxxOIKyEH7AHx7no4vpIS5nNGZGwxntwtdaDUC6Rv9ldc0fm9uUsATHZbEE-YBg6xgCbjMWMbwL1N0gZJ71HrxPInih-nJBHlnw3zk1H8uyi_pXAsMS_S566wA15NxsscbdVmiHylUnxZmiT9916e6p71hv-un9WS-7AF2CXUezyBqekZqbI7zfIpxG26Yb7dVYO1c23mHNLdo_e\" alt=\"\" width=\"252\" height=\"336\" /></p>', 'Berita', 'Draft', 'where-can-i-get-some.jpg', '2021-06-10 00:10:32', '2021-06-26 22:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `data_kas`
--

CREATE TABLE `data_kas` (
  `id_periode` int(11) NOT NULL,
  `id_pokja` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kas`
--

INSERT INTO `data_kas` (`id_periode`, `id_pokja`, `nomor`, `keterangan`, `image`, `tanggal`, `jumlah`, `jenis`) VALUES
(13851, 74, '20210609001', 'Dana anggaran 2021', '', '2021-06-09', '41245000', 'masuk'),
(13851, 74, '20210620001', 'Dana hibah desa', '', '2021-06-20', '500000', 'masuk'),
(13851, 74, '20210621001', 'Dana Hibah Provinsi', '', '2021-06-21', '750000', 'masuk'),
(13851, 86, '20210625002', 'Beli obat', '202106250021.jpg', '2021-06-25', '665000', 'keluar'),
(13852, 74, '20210625006', 'Anggaran tahun 2020', '', '2021-06-25', '4500000', 'masuk'),
(13852, 75, '20210625007', 'asd', '20210625007.png', '2021-06-25', '1', 'keluar'),
(13852, 75, '20210625008', 'asddasdasdasdasd', '20210625008.jpg', '2021-06-25', '111111', 'keluar'),
(13851, 75, '20210626001', 'Biaya sewa gedung pertemuan', '20210626001.jpg', '2021-06-26', '3500000', 'keluar'),
(13851, 86, '20210626002', 'Belanja keperluan alat tulis', '20210626002.jpg', '2021-06-26', '245000', 'keluar'),
(13851, 81, '20210626003', 'Konsumsi Panitia dan Peserta', '20210626003.jpg', '2021-06-26', '5000000', 'keluar'),
(13851, 74, '20210628001', '55555', '', '2021-06-28', '55555', 'masuk'),
(13851, 75, '20210628002', 'Berkas-berkas', '20210628002.jpg', '2021-06-28', '45000', 'keluar'),
(13851, 75, '20210628003', 'Alat tulis, pulpen dan lain-lain', '20210628003.jpg', '2021-06-29', '79000', 'keluar'),
(13851, 79, '20210628004', 'Belanja pokja I dan dll', '20210628004.png', '2021-06-28', '345000', 'keluar'),
(13851, 81, '20210628005', 'Belanja pkoja II', '20210628005.png', '2021-06-28', '93800', 'keluar'),
(13851, 82, '20210628006', 'belanja pokja III tiga, beli alat medis', '20210628006.png', '2021-06-28', '750000', 'keluar'),
(13851, 86, '20210628007', 'Keperluan posyandu,', '20210628007.png', '2021-06-28', '760500', 'keluar'),
(13851, 86, '20210628008', 'Alat suntik, dan vaksin', '20210628008.png', '2021-06-28', '1500000', 'keluar');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(12) NOT NULL,
  `nomor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `nomor`, `name`, `image`, `description`) VALUES
(9320, 10, 'Suntik Balita', 'GALERI60c7f210878a6.jpg', 'Kegiatan Posyandu'),
(9322, 24, 'Bu ibu rapat dewan', 'GALERI60c7f230ba427.jpg', 'Sekretaris PKK'),
(9327, 27, 'Pelatihan Pembuatan Bunga Dari Kain Perca', 'GALERI60ca2bec9523b.jpg', 'Kegiatan Pokja III'),
(9328, 32, 'Kantor Desa Uma Beringin', 'GALERI60ca2c2881595.jpg', 'Kantor Desa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_user`
--

CREATE TABLE `jenis_user` (
  `id_jenis` int(6) NOT NULL,
  `nama_jenis` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_user`
--

INSERT INTO `jenis_user` (`id_jenis`, `nama_jenis`) VALUES
(232, 'admin_pkk'),
(233, 'sekret_pokja'),
(234, 'kades');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `slide_setting` varchar(20) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tentang` varchar(500) DEFAULT NULL,
  `periode` int(11) NOT NULL,
  `welcome_say` text NOT NULL,
  `deskripsi_say` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `foto_sambutan` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_map` text,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `slide_setting`, `namaweb`, `tagline`, `tentang`, `periode`, `welcome_say`, `deskripsi_say`, `email`, `alamat`, `telepon`, `hp`, `logo`, `icon`, `foto_sambutan`, `background`, `facebook`, `twitter`, `instagram`, `google_map`, `id_user`, `tanggal`) VALUES
(1, 'Fade', 'PKK Desa', 'Uma Beringin', 'Tim Penggerak (TP) Pemberdayaan dan Kesejahteraan Keluarga (PKK) Desa Uma Beringin', 13851, 'Selamat Datang Di PKK Desa Uma Beringin', '<blockquote>\r\n<p style=\"text-align: justify;\">Pemberdayaan dan Kesejahteraan Keluarga atau PKK adalah Organisasi kemasyarakatan yang memberdayakan wanita untuk turut berpartisipasi dalam pembangunan Indonesia. PKK sebagai gerakan pembangunan masyarakat bermula dari seminar <em>Home Economic</em> di Bogor tahun 1957. Sebagai tindak lanjut dari seminar tersebut, pada tahun 1961 panitia penyusunan tata susunan pelajaran pada Pendidikan Kesejahteraan Keluarga (PKK), Kementerian Pendidikan bersama kementerian-kementerian lainnya menyusun 10 segi kehidupan keluarga. Gerakan PKK dimasyarakatkan berawal dari kepedulian istri gubernur Jawa Tengah pada tahun 1967 (Ibu Isriati Moenadi) setelah melihat keadaan masyarakat yang menderita busung lapar.</p>\r\n</blockquote>\r\n<p style=\"text-align: justify;\"><strong><br />Salam,<br /></strong><strong>Ketua TP-PKK Desa Uma Beringin</strong></p>', 'pkk.desa@umaberingin.desa.id', 'Jalan Kerato, Kecamatan Unter Iwes, Kabupaten Sumbawa, Nusa Tenggara Barat. 84316', '021-8736162', '+62 813-3184-7725', 'main-logo.png', 'icon_resmi.png', 'sambutan_background.jpg', 'background.jpg', 'https://facebook.com/mfth12', 'https://twitter.com/mfth12s', 'https://instagram.com/mfth12s', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d986.5025979505724!2d117.41213782917971!3d-8.498369473238402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcb93257d72a773%3A0x62afa7e787164542!2sKantor%20Desa%20Uma%20Beringin!5e0!3m2!1sen!2sid!4v1603527755215!5m2!1sen!2sid\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 641, '2021-06-28 02:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `periode_ke` int(11) NOT NULL,
  `pelaksanaan_umum` text NOT NULL,
  `hambatan` text NOT NULL,
  `pemecahan_masalah` text NOT NULL,
  `kesimpulan` text NOT NULL,
  `saran` text NOT NULL,
  `penutup` text NOT NULL,
  `nama_ttd` text NOT NULL,
  `tanggal_ttd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `periode_ke`, `pelaksanaan_umum`, `hambatan`, `pemecahan_masalah`, `kesimpulan`, `saran`, `penutup`, `nama_ttd`, `tanggal_ttd`) VALUES
(9, 10, 'Dalam rangka menetapkan mekanisme gerakan PKK telah terbentuk kelompok kelompok PKK RW, PKK RT, dan Kelompok Dasawisma namun masih perlu diadakan pembinaan lebih lanjut, terutama dalam pengisian buku-buku catatan kelompok dan lainnya. Dengan adanya kelompok-kelompok tersebut memudahkan gerakan PKK dekat dengan masyarakat seperti pembinaan pada keluarga melalui kelompok Dasawisma. Adapun jumlah kelompok yang terbentuk adalah 30 kelompok Dasawisma, 17 kelompok PKK RT, dan 8 kelompok PKK RW.', 'Masih terdapat pengurus TP-PKK dan Kader yang belum mengetahui fungsi dan tugasnya namun pelaksanaan kegiatan PKK berjalan lancar sebagaimana yang diharapkan \r\nMasih banyak kader yang belum sepenuhnya memahami 10 program pokok PKK sehingga kegiatan PKK di masing-masing kelompok belum maksimal.\r\nKurangnya sarana dan prasarana serta dana untuk mendukung program kerja yang telah direncanakanan.\r\nMasih banyak kader yang merangkap tugas sebagai pengurus PKK maupun kader.\r\nKeterlambatan dana menyebabkan pelaksanaan kegiatan program yang direncanakan juga ikut terlambat.', 'Perlu pembinaan dan pelatihan secara terus menerus dan berkelanjutan terhadap kader-kader PKK Perlu diadakan peningkatan sarana dan prasarana serta dana yang memadai untuk menunjang 10 program pokok PKK Dana diharapkan agar dapat disalurkan pada awal Tahun agar pelaksanaan kegiatan program yang direncanakan dapat terlaksana tepat waktu.', 'Dari uraian diatas, pelaksanaan kegiatan TP-PKK Desa Uma Beringin Kecamatan Unter Iwes masih terdapat hambatan serta kendala yang dihadapi. Berkat kerjasama yang baik dari semua pihak yang membantu terutama dari Pengurus TP-PKK sendiri, instansi terkait maupun masyarakat untuk menunjang 10 program pokok PKK dalam berbagai kegiatan untuk dapat menjadi lebih baik ke depannya yang walaupun belum sepenuhnya merata keseluruh masyarakat.', 'Dengan memperhatikan pelaksanaan kegiatan Tim Penggerak PKK Desa Uma Beringin masih perlu penambahan frekuensi bimbingan dan binaan dari TP-PKK Kecamatan dari TP-PKK Kabupaten agar Desa Uma Beringin dapat lebih maju menuju Desa-Desa yang diharapkan.', 'Demikian Laporan Tahunan Tim Penggerak PKK Desa Uma Beringin ini dibuat sebagai pertanggung jawaban kami. Semoga Allah membalas semua kerja keras kita. Akhirnya kepada Allah SWT kita berserah diri semoga selalu dalam perlindungan-NYA untuk mengabdi kepada-NYA, bangsa dan negara. Aamiiin.', 'Ny. Nurmaningsih Suraiman (default)', '1997-01-01'),
(385, 13851, 'Dalam rangka menetapkan mekanisme gerakan PKK telah terbentuk kelompok kelompok PKK RW, PKK RT, dan Kelompok Dasawisma namun masih perlu diadakan pembinaan lebih lanjut, terutama dalam pengisian buku-buku catatan kelompok dan lainnya. Dengan adanya kelompok-kelompok tersebut memudahkan gerakan PKK dekat dengan masyarakat seperti pembinaan pada keluarga melalui kelompok Dasawisma. Adapun jumlah kelompok yang terbentuk adalah 30 kelompok Dasawisma, 17 kelompok PKK RT, dan 8 kelompok PKK RW.', 'Masih terdapat pengurus TP-PKK dan Kader yang belum mengetahui fungsi dan tugasnya namun pelaksanaan kegiatan PKK berjalan lancar sebagaimana yang diharapkan \r\nMasih banyak kader yang belum sepenuhnya memahami 10 program pokok PKK sehingga kegiatan PKK di masing-masing kelompok belum maksimal.\r\nKurangnya sarana dan prasarana serta dana untuk mendukung program kerja yang telah direncanakanan.\r\nMasih banyak kader yang merangkap tugas sebagai pengurus PKK maupun kader.\r\nKeterlambatan dana menyebabkan pelaksanaan kegiatan program yang direncanakan juga ikut terlambat.', 'Perlu pembinaan dan pelatihan secara terus menerus dan berkelanjutan terhadap kader-kader PKK Perlu diadakan peningkatan sarana dan prasarana serta dana yang memadai untuk menunjang 10 program pokok PKK Dana diharapkan agar dapat disalurkan pada awal Tahun agar pelaksanaan kegiatan program yang direncanakan dapat terlaksana tepat waktu.', 'Dari uraian diatas, pelaksanaan kegiatan TP-PKK Desa Uma Beringin Kecamatan Unter Iwes masih terdapat hambatan serta kendala yang dihadapi. Berkat kerjasama yang baik dari semua pihak yang membantu terutama dari Pengurus TP-PKK sendiri, instansi terkait maupun masyarakat untuk menunjang 10 program pokok PKK dalam berbagai kegiatan untuk dapat menjadi lebih baik ke depannya yang walaupun belum sepenuhnya merata keseluruh masyarakat.', 'Dengan memperhatikan pelaksanaan kegiatan Tim Penggerak PKK Desa Uma Beringin masih perlu penambahan frekuensi bimbingan dan binaan dari TP-PKK Kecamatan dari TP-PKK Kabupaten agar Desa Uma Beringin dapat lebih maju menuju Desa-Desa yang diharapkan.', 'Demikian Laporan Tahunan Tim Penggerak PKK Desa Uma Beringin ini dibuat sebagai pertanggung jawaban kami. Semoga Allah membalas semua kerja keras kita. Akhirnya kepada Allah SWT kita berserah diri semoga selalu dalam perlindungan-NYA untuk mengabdi kepada-NYA, bangsa dan negara. Aamiiin.', 'Ny. Nurmaningsih Suraiman', '2021-06-27'),
(387, 13852, 'Dalam rangka menetapkan mekanisme gerakan PKK telah terbentuk kelompok kelompok PKK RW, PKK RT, dan Kelompok Dasawisma namun masih perlu diadakan pembinaan lebih lanjut, terutama dalam pengisian buku-buku catatan kelompok dan lainnya. Dengan adanya kelompok-kelompok tersebut memudahkan gerakan PKK dekat dengan masyarakat seperti pembinaan pada keluarga melalui kelompok Dasawisma. Adapun jumlah kelompok yang terbentuk adalah 30 kelompok Dasawisma, 17 kelompok PKK RT, dan 8 kelompok PKK RW.', 'Masih terdapat pengurus TP-PKK dan Kader yang belum mengetahui fungsi dan tugasnya namun pelaksanaan kegiatan PKK berjalan lancar sebagaimana yang diharapkan \r\nMasih banyak kader yang belum sepenuhnya memahami 10 program pokok PKK sehingga kegiatan PKK di masing-masing kelompok belum maksimal.\r\nKurangnya sarana dan prasarana serta dana untuk mendukung program kerja yang telah direncanakanan.\r\nMasih banyak kader yang merangkap tugas sebagai pengurus PKK maupun kader.\r\nKeterlambatan dana menyebabkan pelaksanaan kegiatan program yang direncanakan juga ikut terlambat.', 'Perlu pembinaan dan pelatihan secara terus menerus dan berkelanjutan terhadap kader-kader PKK Perlu diadakan peningkatan sarana dan prasarana serta dana yang memadai untuk menunjang 10 program pokok PKK Dana diharapkan agar dapat disalurkan pada awal Tahun agar pelaksanaan kegiatan program yang direncanakan dapat terlaksana tepat waktu.', 'Dari uraian diatas, pelaksanaan kegiatan TP-PKK Desa Uma Beringin Kecamatan Unter Iwes masih terdapat hambatan serta kendala yang dihadapi. Berkat kerjasama yang baik dari semua pihak yang membantu terutama dari Pengurus TP-PKK sendiri, instansi terkait maupun masyarakat untuk menunjang 10 program pokok PKK dalam berbagai kegiatan untuk dapat menjadi lebih baik ke depannya yang walaupun belum sepenuhnya merata keseluruh masyarakat.', 'Dengan memperhatikan pelaksanaan kegiatan Tim Penggerak PKK Desa Uma Beringin masih perlu penambahan frekuensi bimbingan dan binaan dari TP-PKK Kecamatan dari TP-PKK Kabupaten agar Desa Uma Beringin dapat lebih maju menuju Desa-Desa yang diharapkan.', 'Demikian Laporan Tahunan Tim Penggerak PKK Desa Uma Beringin ini dibuat sebagai pertanggung jawaban kami. Semoga Allah membalas semua kerja keras kita. Akhirnya kepada Allah SWT kita berserah diri semoga selalu dalam perlindungan-NYA untuk mengabdi kepada-NYA, bangsa dan negara. Aamiiin.', 'Ny. Nurmaningsih Suraiman', '1997-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `masukan_id` int(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`masukan_id`, `status`, `tanggal`, `nama_lengkap`, `email`, `keperluan`, `description`) VALUES
(518, 0, '2021-06-16 08:37:52', 'Miftahul Haq', 'ciftah12@gmail.com', 'Mau izin', 'assalamualaikum.. perkenalkan nama saya Miftahul Haq. Saya mahasiswa teknik informatika, Universitas Teknologi Sumbawa. Mau izin melakukan penelitian..\r\nBagaimana kira2 prosedurnya? terimakasih'),
(519, 0, '2021-06-16 08:39:28', 'asd', 'asdasd@sdas', 'asd', 'asdasda asd as'),
(520, 0, '2021-06-16 17:32:15', 'Goffar', 'gfr@wd.cs', 'Pinjam Aula', 'Assalamualaikum, saya mau pinjam aula. boleh saya minta nomor whatsapp penanggungjawab sarana dan prasarana nya.. terimakasih'),
(521, 0, '2021-06-24 10:13:46', 'sddas', 'ciftah12@gmail.com', 'asd', 'asdasdas asdasd asd a'),
(522, 0, '2021-06-26 22:09:58', 'Bachtiar', 'bach@out.com', 'Silaturahim', 'Assalamualaikum.. saya mau izin silaturahim. boleh saya minta nomor whatsapp yang bisa dihubungi? terimakasih');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` int(11) NOT NULL,
  `ket` enum('aktif','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nama_periode`, `ket`) VALUES
(13840, 1989, 'tidak'),
(13841, 2008, 'tidak'),
(13842, 2010, 'tidak'),
(13843, 2017, 'tidak'),
(13845, 2009, 'tidak'),
(13846, 2011, 'tidak'),
(13847, 2016, 'tidak'),
(13848, 2019, 'tidak'),
(13849, 2018, 'tidak'),
(13851, 2021, 'aktif'),
(13852, 2020, 'tidak'),
(13853, 2015, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `pokja`
--

CREATE TABLE `pokja` (
  `id_pokja` int(11) NOT NULL,
  `slug_pokja` varchar(255) NOT NULL,
  `nama_pokja` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokja`
--

INSERT INTO `pokja` (`id_pokja`, `slug_pokja`, `nama_pokja`, `keterangan`, `urutan`) VALUES
(74, 'umum', 'Umum', 'Kegiatan yang bersifat umum PKK desa uma beringin\r\n', 1),
(75, 'sekretariat', 'Sekretariat', 'Kegiatan yang bersangkutan dengan kesekretariatan PKK desa uma beringin', 2),
(79, 'pokja-i', 'Pokja I', 'Kegiatan pokja I', 4),
(81, 'pokja-ii', 'Pokja II', 'Kegiatan pokja II', 5),
(82, 'pokja-iii', 'Pokja III', 'Kegiatan pokja III', 10),
(86, 'pokja-iv', 'Pokja IV', 'Kegiatan pokja IV', 12);

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id_proker` int(11) NOT NULL,
  `id_proker_utama` int(11) NOT NULL,
  `nama_proker` varchar(255) NOT NULL,
  `keterangan_proker` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id_proker`, `id_proker_utama`, `nama_proker`, `keterangan_proker`, `status`, `tanggal_post`) VALUES
(3820, 42726, 'Melaksanakan pengadministrasian surat keluar dan surat masuk', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3821, 42726, 'Menerima surat-surat masuk dan mengagendakan surat masuk dan keluar', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3822, 42726, 'Mengajukan surat masuk dan surat keluar untuk didisposisikan dan ditandatangani ketua', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3823, 42726, 'Menyalurkan surat masuk ke pokja-pokja sesuai disposisi', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3824, 42727, 'Melaksanakan pemeliharaan ruang sekretariat', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3825, 42727, 'Memelihara inventaris kantor/sekretariat', 'Melaksanakan penggantian papan data kegiatan PKK', 'Terlaksana', '0000-00-00 00:00:00'),
(3826, 42727, 'Ongkos Kantor', '- Melaksanakan pembelian ATK\r\n- Melaksanakan rapat-rapat rutin (Rapat Rutin PKK Desa Uma Beringin tanggal 9 tiap bulan, Rapat koordinasi dengan instansi terkait, Rapat dengan PKK Kecamatan Unter Iwes)', 'Terlaksana', '0000-00-00 00:00:00'),
(3827, 42728, 'Pemantapan kelembagaan dan fungsi Tim Penggerak PKK serta kader lainnya', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3828, 42729, 'Melaksanakan penyusunan rencana program kerja', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3829, 42729, 'Menganalisa data dan menyusun program kerja', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3830, 42729, 'Mengikuti rapat musyawarah rencana pembangunan desa.', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3831, 42730, 'Melaksanakan pembinaan/ pelatihan dasawisma 3 dusun', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3832, 42730, 'Melaksanakan pembinaan/ pelatihan posyandu 3 dusun', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3833, 42731, 'Mengikuti lomba Qosidah Rebana Tingkat Kecamatan Unter Iwes dalam rangka STQ tingkat kecamatan Unter Iwes 2018 di Dusun Pungka', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3834, 42731, 'Menghadiri kegiatan kunjungan kerja Menteri Kominfo di Taman Kerato', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3835, 42731, 'Menghadiri pelaksanaan kegiatan BBGRM di Taman Kerato', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3836, 42732, 'Melaksanakan pengajian rutin tiap bulan pada tanggal 15', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3837, 42733, 'Melaksanakan gotong royong/ kerja bakti setiap hari minggu secara situasional', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3838, 42733, 'Melaksanakan kelompok arisan di pengajian dan dasawisma', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3839, 42733, 'Melaksanakan kelompok jempitan pengajian dan dasawisma', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3840, 42734, 'Melaksanakan pelatihan membuat baju adat Sumbawa', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3841, 42735, 'Melaksanakan pertemuan rutin KOPWAN setiap bulannya pada tanggal 7', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3842, 42736, 'Melaksanakan sosialisasi dan praktek menu B2SA', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3843, 42736, 'Melaksanakan sosialisasi hatinya PKK', '- Juara II Lomba membuat pangan dari bahan-bahan lokal dalam rangka ulang tahun kecamatan unter iwes', 'Terlaksana', '0000-00-00 00:00:00'),
(3844, 42737, 'Melestarikan busana khas daerah', '- Juara I Lomba pawai budaya dalam Festival Olat Ojong dalam rangka Ulang Tahun Kecamatan Unter Iwes ', 'Terlaksana', '0000-00-00 00:00:00'),
(3845, 42738, 'Melaksanakan kegiatan posyandu tiap bulannya', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3846, 42738, 'Melaksanakan pelatihan pengisian buku dasawisma', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3847, 42739, 'Melaksanakan lingkungan bersih dan sehat melalui penyuluhan tentang kebersihan lingkungan agar terhindar dari penyakit diare, ISPA, DBD, dan malaria', '', 'Terlaksana', '0000-00-00 00:00:00'),
(3848, 42741, 'Seminar Nasional 56', 'Belajar dari seminar nasional', 'Terlaksana', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proker_utama`
--

CREATE TABLE `proker_utama` (
  `id_proker_utama` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_pokja` int(11) NOT NULL,
  `nama_proker_utama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker_utama`
--

INSERT INTO `proker_utama` (`id_proker_utama`, `id_periode`, `id_pokja`, `nama_proker_utama`, `keterangan`) VALUES
(42726, 13851, 75, 'Urusan Tata Usaha 4', 'Tentang tata usaha PKK desa'),
(42727, 13851, 75, 'Urusan Rumah Tangga', 'Tentang urusan rumah tangga per dasa wisma'),
(42728, 13851, 75, 'Urusan Pengorganisasian', 'Tentang organisasi yang ada di dalam PKK Desa Uma Beringin'),
(42729, 13851, 75, 'Urusan Perencanaan', ''),
(42730, 13851, 75, 'Urusan Pembinaan', ''),
(42731, 13851, 75, 'Urusan Kehumasan', ''),
(42732, 13851, 79, 'Penghayatan dan Pengamalan Pancasila', 'Penghayatan pancasila kepada kehidupan sehari-hari masyarakat'),
(42733, 13851, 79, 'Gotong Royong ', ''),
(42734, 13851, 81, 'Pendidikan dan Keterampilan', ''),
(42735, 13851, 81, 'Pengembangan Kehidupan Berkoperasi', ''),
(42736, 13851, 82, 'Pangan', ''),
(42737, 13851, 82, 'Sandang', ''),
(42738, 13851, 86, 'Kesehatan', ''),
(42739, 13851, 86, 'Kelestarian Lingkungan Hidup', ''),
(42740, 13852, 75, 'Coba tahun 2020', 'asdasda'),
(42741, 13852, 81, 'Program dari pokja II', 'sabvmsdf afkjnskjn ');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quote_id` int(12) NOT NULL,
  `nomor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quote_id`, `nomor`, `name`, `jabatan`, `image`, `description`) VALUES
(9326, 1, 'Irfan Mubarok', '5sadsfs', 'QUOTE60c82652dbd0a.jpg', 'Saya sangat senang sekali dengan semua ini. Rasanya saya sepertia dasdsadsad sda'),
(9327, 17, 'Syah Han', 'Foto Ilustrasi', 'QUOTE60c82699419ea.png', 'Saya adalah beruang cokelat. Nama saya adalah bear'),
(9330, 2, 'Ramadhan', 'Mahasiswa Peneliti', 'QUOTE60c8317a80197.jpg', 'Saya adalah mahasiswa Saya adalah mahasiswa Saya adalah mahasiswa Saya adalah ma'),
(9331, 4, 'Bu Risa', 'Wakil Ketua I', 'QUOTE60c833e5d532d.jpg', 'namas asabsd a sad asndm sa d sad asd asdnuiansd as dasdianwd s asdanskdm s admk');

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
(933, 1, 'Kantor Desa Uma Beringin3', 'SLIDE60c62e0b2ff05.jpg', 'Kecamatan Unter Iwes, Kabupaten Sumbawa'),
(934, 2, 'Kegiatan BBGRM 2018', 'SLIDE60c62e2a7814d.jpg', 'Bulan Bhakti Gotong Royong Masyarakat - Tahun 2018'),
(935, 3, 'Kegiatan Keterampilan Pokja II', 'SLIDE60c62e484dcbd.jpg', 'Kerajinan membuat sarung tissue dari kain flanel'),
(936, 4, 'Lomba Senam HUT Sumbawa', 'SLIDE60c62e9a39a55.jpg', 'Juara Lomba Senam Dalam Rangka Memperingati HUT Sumbawa'),
(937, 5, 'Pelatihan Table Manner - Pokja III', 'SLIDE60c62ec27dd8e.jpg', 'Kegiatan pelatihan table manner yang diselenggarakan Pokja III - Tahun 2018'),
(938, 6, 'Rapat Persiapan BBGRM', 'SLIDE60c62ee6dbc93.jpg', 'Rapat PKK bersama Camat Unter Iwes untuk persiapan BBGRN 2018'),
(939, 7, 'Sosialisasi PERDA Ketahanan dan Kesejahteraan Keluarga', 'SLIDE60c62f4ed07d3.jpg', 'Sosialisasi yang diselenggarakan oleh PERDA Ketahanan dan Kesejahteraan Keluarga - Tahun 2019'),
(940, 8, 'Sosialisasi Program Pemberdayaan Wanita', 'SLIDE60c62f7693b6b.jpg', 'Pra-Pelatihan Wirausaha Pekerja Migran Indonesia (PMI) Purna - Tahun 2019'),
(941, 9, 'asd', 'SLIDE60ca3442d7582.jpg', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `struktur_id` int(12) NOT NULL,
  `nomor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`struktur_id`, `nomor`, `name`, `image`, `description`) VALUES
(2957, 1, 'Ryhsa Apriani', 'PENGURUS60c62cd5e5d7e.jpg', 'Wakil Ketua I'),
(2958, 2, 'Ifran Mubarok', 'PENGURUS60c62d0f7a58a.jpg', 'Anggota KKN Uma Beringin'),
(2960, 5, 'Miftahul Haq', 'PENGURUS60ca203075893.jpg', 'Anggota KKN Uma Beringin'),
(2961, 6, 'Ustadz Hudaya', 'PENGURUS60ca20c07f779.jpg', 'Wakil Pengasuh Pondok Modern Darussalam Gontor Kampus 2'),
(2962, 4, 'Muhammad Daffa', 'PENGURUS60ca28f6e5674.jpg', 'Mahasiswa Universitas Teknologi Sumbawa'),
(2963, 7, 'Jati Imanulloh', 'PENGURUS60ca2adceeec5.jpg', 'Mahasiswa Universitas Teknologi Sumbawa');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_periode` int(11) NOT NULL,
  `id_pokja` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_periode`, `id_pokja`, `id_surat`, `nomor`, `keterangan`, `image`, `tanggal`, `jenis`) VALUES
(13852, 82, 551, '004/PKJ-3/TP.PKK/VI/2021', 'Surat pendaftaran', 'SURAT60d69c4b73bc7.pdf', '2021-06-24', 'keluar'),
(13852, 81, 552, '009/PKJ-1/TP.PKK/VI/2021', 'Surat jalan delegasi ke lomba provinsi', 'SURAT60d6a62babc28.doc', '2021-06-21', 'keluar'),
(13852, 79, 554, '034/VC/TP.PKK/I/2021', 'Surat kedatangan ibu walikota', 'SURAT60d6b565024dc.png', '2021-06-28', 'masuk'),
(13852, 86, 556, '00715s27917', 'sd sd sd sd sd s s', 'SURAT60d6b71b2ee7a.jpg', '2021-06-26', 'masuk'),
(13852, 75, 557, '031/VC/TP.PKK/III/2025', 'Authorize', 'SURAT60d6b87883d12.pdf', '2021-06-26', 'masuk'),
(13851, 82, 558, '111/PKJ3/TP.PKK/III/2021', 'Surat Perizinan Menggunakan Kantor Desa', 'SURAT60d6c419e47bb.jpg', '2021-06-26', 'masuk'),
(13851, 79, 559, '008/PKJ-I/TP.PKK/III/2021', 'Undangan Acara Lomba PKK Kelurahan', 'SURAT60d6c1107a352.jpg', '2021-06-28', 'keluar'),
(13851, 75, 560, '002/PKK/TP-PKK/V/2021', 'Surat Keputusan Naik Jabatan', 'SURAT60d6c1b018f66.jpg', '2021-06-25', 'keluar'),
(13851, 82, 561, '048/PKJ3/TP.PKK/III/2021c', 'Surat Peminjaman Ruangan Rapat', 'SURAT60d6c45172206.jpg', '2021-06-26', 'masuk'),
(13851, 75, 563, '035/SRT/TP.PKK/III/2025', 'Sertifikat Kegiatan', 'SURAT60d6c4a9834d5.jpg', '2021-06-26', 'keluar'),
(13851, 86, 565, '034/PKJIV/TP.PKK/IX/2021', 'Surat delegasi', 'SURAT60d91331c0e6b.jpg', '2021-06-28', 'keluar'),
(13851, 75, 566, '054/TP.PKK/III/2025', 'Surat Keputusan Umum', 'SURAT60d9134c325bb.jpg', '2021-06-28', 'keluar');

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
  `akses_level` enum('superadmin','sekret_pokja','kades','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`) VALUES
(641, 'Miftahul Haq', 'ciftah12@gmail.com', 'pkkdesa', 'desa', 'superadmin'),
(642, 'Miftaasdasdasda', 'cs@fk.co', 'kades', 'desa', 'kades'),
(643, 'Sekretaris Pokja PKK', 'sekret@gmail.com', 'sekret', 'desa', 'sekret_pokja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `slug_berita` (`slug_berita`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pokja` (`id_pokja`) USING BTREE;

--
-- Indexes for table `data_kas`
--
ALTER TABLE `data_kas`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_pokja` (`id_pokja`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `jenis_user`
--
ALTER TABLE `jenis_user`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `periode` (`periode`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `periode_ke_2` (`periode_ke`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`masukan_id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `pokja`
--
ALTER TABLE `pokja`
  ADD PRIMARY KEY (`id_pokja`),
  ADD UNIQUE KEY `slug_kategori_berita` (`slug_pokja`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id_proker`),
  ADD KEY `id_proker_utama` (`id_proker_utama`);

--
-- Indexes for table `proker_utama`
--
ALTER TABLE `proker_utama`
  ADD PRIMARY KEY (`id_proker_utama`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_pokja` (`id_pokja`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`struktur_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`) USING BTREE,
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_pokja` (`id_pokja`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88313;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9329;

--
-- AUTO_INCREMENT for table `jenis_user`
--
ALTER TABLE `jenis_user`
  MODIFY `id_jenis` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `masukan`
--
ALTER TABLE `masukan`
  MODIFY `masukan_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13854;

--
-- AUTO_INCREMENT for table `pokja`
--
ALTER TABLE `pokja`
  MODIFY `id_pokja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3850;

--
-- AUTO_INCREMENT for table `proker_utama`
--
ALTER TABLE `proker_utama`
  MODIFY `id_proker_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42742;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9332;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=942;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `struktur_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2964;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=647;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_pokja`) REFERENCES `pokja` (`id_pokja`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_kas`
--
ALTER TABLE `data_kas`
  ADD CONSTRAINT `data_kas_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_kas_ibfk_2` FOREIGN KEY (`id_pokja`) REFERENCES `pokja` (`id_pokja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proker`
--
ALTER TABLE `proker`
  ADD CONSTRAINT `proker_ibfk_1` FOREIGN KEY (`id_proker_utama`) REFERENCES `proker_utama` (`id_proker_utama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proker_utama`
--
ALTER TABLE `proker_utama`
  ADD CONSTRAINT `proker_utama_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proker_utama_ibfk_2` FOREIGN KEY (`id_pokja`) REFERENCES `pokja` (`id_pokja`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_pokja`) REFERENCES `pokja` (`id_pokja`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
