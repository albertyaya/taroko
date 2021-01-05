-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-01-05 09:51:43
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `taroko`
--

-- --------------------------------------------------------

--
-- 資料表結構 `fix`
--

CREATE TABLE `fix` (
  `id` int(11) NOT NULL,
  `date1` date NOT NULL DEFAULT current_timestamp(),
  `shopname` varchar(20) NOT NULL,
  `problem` text NOT NULL,
  `solution` text NOT NULL,
  `remark` text DEFAULT '\'\'',
  `engineer` varchar(10) NOT NULL,
  `contract` date DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 MAX_ROWS=4294967295;

--
-- 傾印資料表的資料 `fix`
--

INSERT INTO `fix` (`id`, `date1`, `shopname`, `problem`, `solution`, `remark`, `engineer`, `contract`, `sort`) VALUES
(1, '2020-12-15', '泰山火鍋', 'd', 's', 'a', 'Cat', '2020-12-30', '刷卡機網路異常'),
(2, '2020-12-14', '泰山火鍋', '1111111', '22222222222', 'aaaaaaaaaa', 'Dog', NULL, NULL),
(3, '2020-12-13', 'canshop', '6666666666', '78978978979', 'bbbbbbb', 'Parrot', NULL, NULL),
(4, '2020-12-12', 'canshop', 'yes i do', '78978978979', 'bbbbbbb', 'Parrot', NULL, NULL),
(5, '2020-12-09', 'Happy day !', '123', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttttttttttttttttt', 'Parrot', NULL, NULL),
(6, '2020-12-08', 'babyshop', 'aaaaaaaa', 'bbbbbbbbbbbbb', 'cccccccccccc', 'monkey', NULL, NULL),
(8, '2020-12-07', '一楓糖', 'aaaaaaaaa', 'sssssssssss', 'dddddddddddd', 'monkey', NULL, NULL),
(9, '2020-12-06', '一楓糖', 'aaaaaaaaa', 'sssssssssss', 'dddddddddddd', 'monkey', NULL, NULL),
(10, '2020-12-05', '一楓糖', 'aaaaaaaaa', 'sssssssssss', 'dddddddddddd', 'monkey', NULL, NULL),
(11, '2020-12-04', '泰山火鍋', '1', '2', '3', 'monkey', NULL, NULL),
(12, '2020-12-03', '泰山火鍋', '1', '2', '3', 'monkey', NULL, NULL),
(13, '2020-12-02', '123', '17878787', '27878787', '38787878', 'Parrot', '0000-00-00', NULL),
(14, '2020-12-01', '泰山火鍋', '111111111111111111111', '222222222222222222222', '33333333333333333333333', 'monkey', NULL, NULL),
(15, '2020-12-16', '糖果森林', '是我的就是我的', '是我的就是我的', '是我的就是我的', 'Dog', '2020-12-19', NULL),
(16, '2020-12-17', '糖果森林', '別去你家來我家', '別去你家來我家', '', 'Dog', '2020-12-20', NULL),
(17, '2020-12-18', '糖果森林', '和運行', 'ssssssssssss', '', 'Dog', '2020-12-26', NULL),
(18, '2020-12-19', '泰山火鍋', '111111111111', '2222222222222', '33333333333333', 'monkey', '2020-12-31', NULL),
(19, '2020-12-20', '一楓糖', '111111111111', '2222222222222', '33333333333333', 'Dog', '2020-12-31', NULL),
(20, '2020-10-26', 'canshop', '111111111111', '2222222222222', '33333333333333', 'Hamster', NULL, NULL),
(21, '2020-12-21', '泰山火鍋', '1', '2', '3', 'monkey', '2020-12-31', NULL),
(22, '2020-12-22', '泰山火鍋', '3', '3', '3', 'monkey', '2020-12-28', NULL),
(23, '2020-12-23', '泰山火鍋', '3', '3', '3', 'monkey', '2020-12-27', NULL),
(24, '2020-12-24', 'babyshop', '2', '3', '4', 'monkey', '2020-12-31', NULL),
(25, '2020-12-25', '一楓糖', '11111111111111111111111', '22222222222222222223', '66666666666666666666', 'monkey', '2020-12-26', NULL),
(26, '2021-01-11', '泰山火鍋', '1', '2', '', 'monkey', '2021-01-15', NULL),
(27, '2020-10-27', '一楓糖', '1', '2', '3', 'monkey', NULL, NULL),
(28, '2020-10-27', 'babyshop', '1', '23', '3', 'Dog', NULL, NULL),
(29, '2020-10-28', '泰山火鍋', '1', '2', '3', 'monkey', NULL, NULL),
(30, '2020-10-28', 'MR', '1111111111', '11111111111111', '11111111111', 'monkey', NULL, NULL),
(31, '2020-10-28', 'baby', '我', '無', '療', 'monkey', NULL, NULL),
(32, '2020-11-02', '泰山火鍋', '1', '2', '', 'monkey', NULL, NULL),
(33, '2020-11-02', '一楓糖', '本文例項講述了php中使用session防止使用者非法登入後臺的方法。分享給大家供大家參考。具體如下：\r\n\r\n一般來說，我們登入網站後臺時，伺服器會把登入資訊儲存到session檔案裡，並通過讀取session檔案來判斷是否可以進行後臺操作。\r\n\r\n以下面為例，假如admin.php是我們的後臺操作頁面，如果沒有啟用 session，那麼，即便是沒有登入，使用者照樣能訪問到該頁面，這時候，就需要用到 session 來防止使用者非法登入到這個頁面了。下面是三個檔案的程式碼\r\n\r\n登入頁面：login.php\r\n\r\n ', '2本文例項講述了php中使用session防止使用者非法登入後臺的方法。分享給大家供大家參考。具體如下：\r\n\r\n一般來說，我們登入網站後臺時，伺服器會把登入資訊儲存到session檔案裡，並通過讀取session檔案來判斷是否可以進行後臺操作。\r\n\r\n以下面為例，假如admin.php是我們的後臺操作頁面，如果沒有啟用 session，那麼，即便是沒有登入，使用者照樣能訪問到該頁面，這時候，就需要用到 session 來防止使用者非法登入到這個頁面了。下面是三個檔案的程式碼\r\n\r\n登入頁面：login.php\r\n\r\n ', '', 'monkey', NULL, NULL),
(34, '2020-11-02', '泰山火鍋', '連結檔的特色是，該行開頭的 10 個字元最左邊為 l (link) ，一般檔案為減號 (-) 而目錄檔為 d (directory)。 如上表所示，其實 /etc/rc0.d 與 /etc/rc.d/rc0.d 是相同的資料，其中 /etc/rc0.d 是連結檔，而原始檔為 /etc/rc.d/rc0.d。 此時讀者需要注意，亦即當你進入 /etc/rc0.d 時，代表實際進入了 /etc/rc.d/rc0.d 那個目錄的意思。', '連結檔的特色是，該行開頭的 10 個字元最左邊為 l (link) ，一般檔案為減號 (-) 而目錄檔為 d (directory)。 如上表所示，其實 /etc/rc0.d 與 /etc/rc.d/rc0.d 是相同的資料，其中 /etc/rc0.d 是連結檔，而原始檔為 /etc/rc.d/rc0.d。 此時讀者需要注意，亦即當你進入 /etc/rc0.d 時，代表實際進入了 /etc/rc.d/rc0.d 那個目錄的意思。', '', 'monkey', NULL, NULL),
(35, '2020-11-05', '泰山火鍋', '1', '2', '3', 'monkey', NULL, NULL),
(36, '2020-11-06', '787878', '78', '78', '78\r\n', 'monkey', NULL, NULL),
(37, '2020-11-06', 'kill', '1', '2', '', 'monkey', NULL, NULL),
(38, '2020-11-06', 'kill', '1', '2', '', 'monkey', NULL, NULL),
(39, '2020-11-06', '878787', '1', '2', '3', 'Dog', NULL, NULL),
(40, '2020-11-06', '糖果森林', '1', '2', '', 'Hamster', NULL, NULL),
(41, '2020-11-07', '泰山火鍋', '7878787878', '33', '', 'monkey', NULL, NULL),
(42, '2021-01-10', '一楓糖', '2', '3', '', 'monkey', '2021-01-15', NULL),
(43, '2020-11-01', 'igotyou', '!!!!!!!!!!!!!!!!!!!!!!', '!!!!!!!!!!!!!!!!!!!!!!', '', 'monkey', NULL, NULL),
(46, '2021-01-05', 'babyshop', 'wwwwwwwwwwwwwwwwwwwwwwwww', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'wwwwwwwwwwwwwwwwwwwwwwww', 'monkey', '2021-01-19', NULL),
(47, '2021-01-01', 'babyshop', 'sssss', 'ssssssssssssssssssss', 'ssssssssssssssss', 'monkey', '2021-01-06', NULL),
(48, '2020-11-16', 'babyshop', '硬碟損', 'aaaaaaaaaaaaaaa', 'sssssssssssssssssssssssss', 'monkey', NULL, NULL),
(50, '2020-11-18', '樺達奶茶', '123456', '123456', '借hub*1,網路線*2', 'Dog', NULL, NULL),
(51, '2020-11-24', '一楓糖', '123456', '123456', '借hub*2', 'monkey', NULL, NULL),
(52, '2021-01-09', 'NET', '1111111112', '22222222222', '借hub*1,UPS*1', 'monkey', '2021-01-18', NULL),
(53, '2020-12-31', '泰山火鍋', 'aaaaaaaaaaaa', 'sssssssssssss', '借HUB*2', 'Cat', '2020-12-31', NULL),
(54, '2020-11-20', '一楓糖', 'AAAAAAAAAAAAAAAAA', 'AAAAAAAAAAAA', '借HUB*1,ups*1', 'Parrot', NULL, NULL),
(55, '2020-12-02', '泰山火鍋', '11111', '11111', '', 'Dog', '2020-12-30', NULL),
(56, '2020-12-02', '一楓糖', '111111111', '2222222222222', '333333', 'monkey', '2020-12-31', NULL),
(57, '2020-12-05', 'ini', '裝機', '裝機', '', 'monkey', '2021-03-18', NULL),
(58, '2020-12-05', 'youtube', '123456', '123456', '', 'monkey', '0000-00-00', NULL),
(59, '2020-12-05', 'babyshop', '123455', '122222', '', 'monkey', '0000-00-00', NULL),
(60, '2020-12-11', '八月堂', '123456', '7123123', '', 'Parrot', '2020-12-30', NULL),
(61, '2020-12-11', '泰山火鍋', 'sssss', 'sssss', '', 'monkey', '2021-02-11', NULL),
(62, '2020-12-21', '泰山火鍋', '123', '123', '123', '正翰', '2021-01-15', '刷卡機網路異常'),
(63, '2020-12-21', '泰山火鍋', 's', 's', 's', '正翰', '2020-12-21', '刷卡機硬體故障'),
(64, '2021-01-05', '泰山火鍋', 'h', 'h', '', '正翰', '2021-01-05', '刷卡機硬體故障'),
(65, '2021-01-05', 'Qwe', 'Q', 'A', 'X', '正翰', '2021-01-18', '刷卡機網路異常');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `fix`
--
ALTER TABLE `fix`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `fix`
--
ALTER TABLE `fix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
