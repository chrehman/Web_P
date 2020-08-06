--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Quran Pak', 'q001', 'product-images/q1.jpg', 5.00),
(2, 'Quran Pak', 'q002', 'product-images/q2.jpg', 5.00),
(3, 'Quran Pak', 'q003', 'product-images/q3.jpg', 7.00),
(4, 'Prayer Mat Blue', 'p001', 'product-images/n1.jpg', 25.00),
(5, 'Prayer Mat Green', 'p002', 'product-images/n2.jpg', 20.00),
(6, 'Prayer Mat Red', 'p003', 'product-images/n3.jpg', 20.00),
(7, 'Prayer Mat Red', 'p001', 'product-images/n1.jpg', 15.00),
(8, 'Black Cap', 'c001', 'product-images/c1.jpg', 10.00),
(9, 'Simple White Cap', 'c002', 'product-images/c2.jpg', 5.00),
(10, 'Simple Black Cap', 'c003', 'product-images/c3.jpg', 7.00),
(11, 'White Cap', 'c004', 'product-images/c4.jpg', 7.00),
(12, 'J dot Cap', 'c001', 'product-images/c5.jpg', 10.00),
(13, 'Miswak-1', 'm001', 'product-images/m1.jpg', 5.00),
(14, 'Miswak-2', 'm002', 'product-images/m2.jpg', 6.00),
(15, 'Miswak-3', 'm003', 'product-images/m3.jpg', 9.00),
(16, 'Miswak-4', 'm004', 'product-images/m4.jpg', 10.00),
(17, 'Miswak-5', 'm005', 'product-images/m5.jpg', 7.00),
(18, 'Couter Brown', 'counter001', 'product-images/counter1.jpg', 20.00),
(19, 'Couter Blue', 'counter002', 'product-images/counter2.jpg', 10.00),
(20, 'Couter Red', 'counter003', 'product-images/countr3.jpg', 10.00),
(21, 'Etar-1', 'pr001', 'product-images/p1.jpg', 20.00),
(22, 'Etar-2', 'pr002', 'product-images/p2.jpg', 22.00),
(23, 'Etar-3', 'pr003', 'product-images/p3.jpg', 25.00),
(24, 'Etar-4', 'pr004', 'product-images/p4.jpg', 25.00),
(25, 'Etar-5', 'pr005', 'product-images/p5.jpg', 30.00),
(26, 'Tasbeeh-1', 't001', 'product-images/1.jpg', 7.00),
(27, 'Tasbeeh-2', 't002', 'product-images/2.jpg', 9.00),
(28, 'Tasbeeh-3', 't003', 'product-images/3.jpg', 10.00),
(29, 'Tasbeeh-4', 't004', 'product-images/4.jpg', 8.00),
(30, 'Tasbeeh-5', 't005', 'product-images/5.jpg', 15.00),
;
--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;