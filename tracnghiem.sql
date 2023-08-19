-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 06:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracnghiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_cau_hoi`
--

CREATE TABLE `ds_cau_hoi` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ds_cau_hoi`
--

INSERT INTO `ds_cau_hoi` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'Trong C++ khi viết x/=2 có nghĩa là:', 'Tăng x lên 2 lần', 'Tăng x lên 2 đơn vị', 'Giá trị của x là 2', 'Giảm x đi 2 lần', 'D'),
(2, 'Phép ‘và’ trong C++ kí hiệu là:', '||', '&&', '&&', 'and', ''),
(3, 'Để in ra màn hình biến tb, in với độ rộng 8 và có 2 chữ số thập ta viết:', 'cout << fixed << setw(8);', 'cout << setw(8) << tb;', 'cout << fixed << setprecision(2) << tb;', 'cout << fixed << setw(8) << setprecision(2) << tb;', 'D'),
(4, 'Phím tắt F9 trong CodeBlocks dùng để thay cho lệnh:', 'Build → Run', 'Build → Build and run', 'File → Exit', 'File → Close Project   ', 'B'),
(5, 'Cho đoạn chương trình sau: int a=2,b=3; if(a>b) a=a*2; else b=b*2; Sau khi thực hiện đoạn chương trình trên giá trị của b là:', '4', '2', '6', 'Không xác định', 'C'),
(6, 'Cho đoạn lệnh sau: for (int i = 5; i >= 0; i--) cout<<i; Trên màn hình có các giá trị là:', '1 2 3 4 5', '5 4 3 2 1', '0 1 2 3 4 5', '5 4 3 2 1 0', 'D'),
(7, 'Cho đoạn chương trình sau: int a, n = 0; cin >> a; double s = 1.0/a; while(!(1.0/(a+n) < 0.0001)) {\r\nn++; s += 1.0/(a+n);} Trong đoạn chương trình trên vòng lặp thực hiện lặp bao nhiêu lần?', 'a lần', 'n lần', '10 lần', 'Không biết trước', 'D'),
(8, 'Chương trình sau sẽ in ra màn hình công việc gì? for (i=1;i<=n;i++) {if (a[i] % 2 !=0) cout<<a[i];}', 'In ra các giá trị các phần tử chẵn của mảng a.', 'In ra các giá trị các phần tử lẻ của mảng a.', 'In ra tất cả giá trị các phần tử của mảng a.', 'In ra tổng giá trị các phần tử của mảng a.', 'B'),
(9, 'Hàm st.substr (vt, n) thực hiện:', 'Sao chép n ký tự của xâu st bắt đầu từ vị trí vt.', 'Sao chép n ký tự của xâu st bắt đầu từ vị trí bất kì.', 'Sao chép 1 ký tự của xâu st bắt đầu từ vị trí vt.', 'Sao chép toàn bộ xâu st.', 'A'),
(10, 'Khẳng định nào sau đây là đúng khi nói về kiểu cấu trúc (struct)?', 'Dữ liệu kiểu cấu trúc (struct) dùng để mô tả các đối tượng có cùng một số thuộc tính mà các thuộc tính có thể có các kiểu dữ liệu khác nhau.', 'Dữ liệu kiểu cấu trúc (struct) dùng để mô tả các đối tượng khác nhau về thuộc tính.', 'Dữ liệu kiểu cấu trúc (struct) dùng để mô tả các đối tượng có cùng kiểu dữ liệu.', 'Dữ liệu kiểu cấu trúc (struct) dùng để mô tả các đối tượng khác nhau về thuộc tính và có cùng kiểu dữ liệu.', 'A'),
(11, 'Cho đoạn chương trình sau: #include <iostream> using namespace std; struct Rectangle {\r\nint width, height;} ; int main() { struct Rectangle rec;\r\nNếu muốn gán giá trị cho biến height bằng 8 ta viết:', 'rec[height] = 8;', 'rec.height = 8;', 'height.rec = 8;', 'height = 8;', 'B'),
(12, 'Phát biểu nào sau đây là sai?', 'Tệp nhị phân thuộc loại tệp có cấu trúc.', 'Các dòng trong tệp văn bản có độ dài bằng nhau.', 'Có thể hiểu nội dung các tệp văn bản khi hiển thị nó trên màn hình trong phần mềm soạn thảo văn bản.', 'Không thể hiểu nội dung các tệp có cấu trúc khi hiển thị nó trên màn hình trong phần mềm soạn thảo văn bản.', 'B'),
(13, 'Tệp truy cập tuần tự:', 'cho phép tham chiếu đến dữ liệu cần truy cập bằng cách xác định trực tiếp vị trí của dữ liệu đó.', 'cho phép truy cập đến một dữ liệu nào đó trong tệp chỉ bằng cách bắt đầu từ đầu tệp và đi qua lần lượt tất cả các dữ liệu trước nó.', 'là tệp mà dữ liệu được ghi dưới dạng các ký tự theo mã ASCII/ UNICODE.', 'là tệp mà các phần tử của nó được tổ chức theo một cấu trúc nhất định.', 'B'),
(14, 'Khẳng định nào sau đây là đúng khi nói về tệp?', 'Được lưu trữ lâu dài ở bộ nhớ ngoài (đĩa từ, CD, …) và bị mất khi tắt nguồn điện.', 'Được lưu trữ ít ở bộ nhớ trong và không bị mất khi tắt nguồn điện.', 'Được lưu trữ lâu dài ở bộ nhớ ngoài (đĩa từ, CD, …) và không bị mất khi tắt nguồn điện.', 'Lượng thông tin lưu trữ trên tệp nhỏ.', 'C'),
(15, 'Để khai báo biến tệp đồng thời mở tệp để đọc dữ liệu ta dùng cú pháp nào sau đây?', 'ifstream <tên biến tệp> (<xâu tên tệp>);', 'ifstream <tên biến tệp>;', 'ifstream (<xâu tên tệp>);', '<tên biến tệp> ifstream (<xâu tên tệp>);', 'A'),
(16, 'Để khai báo biến tệp đồng thời mở tệp để ghi dữ liệu ta dùng cú pháp nào?', 'ofstream (<xâu tên tệp>);', 'ofstream <tên biến tệp>;', '<tên biến tệp> ofstream (<xâu tên tệp>);', 'ofstream <tên biến tệp> (<xâu tên tệp>);', 'D'),
(17, 'Lệnh nào sau đây sẽ gắn tệp dulieu.txt chứa trong thư mục Mydata của ổ đĩa F, với biến tệp fi và tệp được mở ở chế độ đọc dữ liệu:', 'ifstream fi();', 'ifstream (\"f:\\mydata\\dulieu.txt\");', 'ifstream fi(\"f:\\mydata\\dulieu.txt\");', 'ifstream fi(\"dulieu.txt\");', 'C'),
(18, 'Cho đoạn chương trình con sau: double Luythua(double x, int k) { double lt = 1.0; for(int i = 1; i < k; i++) lt *= x; return lt;} Biến x và k được gọi là:', 'Tham số hình thức.', 'Tham số thực sự.', 'Biến toàn cục.', 'Biến địa phương.', 'A'),
(19, 'Cho đoạn chương trình sau: void Hoan_doi(int &x, int &y) { int tg = x; x = y; y = tg; } Biến x,y trong chương trình trên là:', 'Tham chiếu', 'Tham trị', 'Biến toàn cục', 'Biến cục bộ', 'A'),
(20, 'Kết quả của đoạn chương trình sau là gì? #include <iostream> using namespace std; int max(int a, int b) { int max=a; max=(b<a)*b; return max; } int main() { cout<<max(4,12); return 0; }', '0', '4', '12', 'Lỗi cú pháp', 'A'),
(21, 'Cho câu lệnh sau: s = f1.readline().strip() Khẳng định nào sau đây là đúng khi nói về câu lệnh trên:', 'Đọc một dòng từ tệp vào biến xâu s, không cắt bỏ các dấu cách thừa.', 'Đọc toàn bộ từ tệp vào biến xâu s, cắt bỏ các dấu cách thừa.', 'Đọc một dòng từ tệp vào biến xâu s, cắt bỏ các dấu cách thừa.', 'Cắt bỏ các dấu cách thừa của xâu s.', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_cau_hoi`
--
ALTER TABLE `ds_cau_hoi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_cau_hoi`
--
ALTER TABLE `ds_cau_hoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
