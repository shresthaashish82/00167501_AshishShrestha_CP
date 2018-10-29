<?php
$connection = mysqli_connect("127.0.0.1","root","");
$createDb = "create database 00167501_ashishshrestha";
mysqli_query($connection,$createDb);
$actualConnection = mysqli_connect("localhost","root","","00167501_ashishshrestha");

mysqli_query($actualConnection,"CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `cart` (`cart_id`, `customerId`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(7, 0, 28, 1),
(8, 0, 28, 1),
(9, 0, 28, 3),
(11, 49, 23, 2),
(12, 49, 27, 2),
(13, 49, 23, 2),
(14, 49, 27, 1),
(15, 52, 23, 1),
(16, 52, 23, 1),
(17, 49, 25, 2),
(18, 49, 25, 3),
(19, 49, 26, 1)");

mysqli_query($actualConnection,"CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'TV & Home Audio System'),
(2, 'Home Appliances'),
(3, 'Purification Product ')");

mysqli_query($actualConnection,"CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phoneNumber` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `login_attempt` int(11) NOT NULL DEFAULT '0',
  `visit_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `customer` (`customerId`, `customer_name`, `address`, `phoneNumber`, `email`, `password`, `login_attempt`, `visit_count`) VALUES
(44, 'Ashish', 'Shrestha', '9808180205', 'shresthaashish82@gmail.com', '1234', 0, 2),
(45, 'a', 'b', 'c', 'a', 'a', 0, 0),
(47, 'z', 'z', 'z', 'z', 'z', 0, 0),
(48, 'Ashish', 'z', 'z', 'brf', 'z', 0, 0),
(49, 'Bipin Goshali', 'pokhara', '9825144909', 'bipin@gmail.com', '123', 0, 43),
(50, 'suresh', 'tikapur', '9800644819', 'rxurace21@gmail.com', 'null', 0, 0),
(51, 'dhurba poudel', 'kohalpur', '2345673', 'dhurba@gmail.com', '1234', 0, 0),
(52, 'paras poudel', 'surkhet', '9825122278', 'paras@gmail.com', '1234', 0, 1),
(53, 'Ashish', 'gaighat', '9825144909', 'ashish@gmail.com', '123', 0, 2)");

mysqli_query($actualConnection,"CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `customerId` int(11) NOT NULL,
  `visited` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `forum` (`id`, `question`, `customerId`, `visited`, `reply`, `post_date`) VALUES
(1, 'ggggg', 49, 12, 3, '2018-10-12'),
(5, 'sdfghj', 49, 5, 1, '2018-10-12'),
(6, 'cg ko tv kasto xa', 53, 3, 1, '2018-10-13'),
(7, 'lg tv ksto xa', 49, 2, 0, '2018-10-29')");

mysqli_query($actualConnection,"CREATE TABLE `forum_reply` (
  `reply_id` int(11) NOT NULL,
  `replier_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `reply` varchar(250) NOT NULL,
  `reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `forum_reply` (`reply_id`, `replier_id`, `forum_id`, `reply`, `reply_date`) VALUES
(3, 49, 1, 'hgvuhg', '2018-10-12'),
(4, 49, 1, 'hgvjhb', '2018-10-12'),
(5, 49, 5, 'gghvbjhn', '2018-10-12'),
(6, 49, 6, 'ramrai xa', '2018-10-13'),
(7, 49, 1, '', '2018-10-28')");

mysqli_query($actualConnection,"CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`) VALUES
(13, 44, 27)");

mysqli_query($actualConnection,"CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `model_number` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(10000) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `screen_size` varchar(255) DEFAULT '0',
  `battery_backup` int(11) DEFAULT '0',
  `capacity` int(11) DEFAULT '0',
  `effective_room_area` int(11) DEFAULT '0',
  `sub_sub_category_id` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `product` (`product_id`, `product_image`, `product_name`, `model_number`, `price`, `description`, `manufacturer`, `stock`, `screen_size`, `battery_backup`, `capacity`, `effective_room_area`, `sub_sub_category_id`, `available`) VALUES
(23, '1.jpg', '32\" LED V', '32LK526B', 33990, '	\r\n20W Powerful Sound\r\nAll Round Protection Plus\r\nBuilt In & Upgradable Games\r\nFM Radio\r\nIPS Display\r\nQuick Access', 'LG', 7, '32\"', 0, 0, 0, 1, 1),
(25, '3.jpg', '49\" Smart LED TV', 'CG49DC100S', 56990, 'Stunning Full HD Quality\r\nAndroid Platform\r\nWide Viewing Angle\r\nDynamic Contrast\r\nBacklit Adjustable', 'CG', 0, '49\"', 0, 0, 0, 2, 1),
(26, '4.jpg', '43\" Smart LED TV', '43LJ550T', 63190, 'WebOS 3.5\r\nEnriches all colors to previously unseen vibrancy\r\nFull HD revolutionizing image clarity and color\r\nImprove any image with Resolution Upscaler\r\nBe amused with Virtual Surround Plus\r\nPlug in a USB drive for content', 'LG', 0, '43\"', 0, 0, 0, 2, 0),
(27, '6.jpg', 'Portable Bluetooth Speaker NP7500', 'NP7550', 15690, '2 Channel\r\nDual Speaker Pairing\r\nBuilt-in Battery\r\nBluetoothÃ‚Â®\r\nSound Sync\r\nMultipoint', 'LG', 2, '0', 9, 0, 0, 3, 1),
(28, '7.jpg', 'Portable Bluetooth Speaker PH1', 'PH1', 3990, '360 Degree Sound Effect\r\nLED Mood Lighting\r\nSpeaker Phone\r\nRe Dialing Feature\r\nBluetooth Connectivity\r\nBuilt in Microphone', 'LG', 0, '0', 5, 0, 0, 3, 1),
(29, '8.jpg', 'Refrigerator 190 Ltr', 'RDEPRO205TDF3.2- JAZ MGT', 28990, '	\r\nEdge Pro refrigerator offers the perfect blend of cooling and space. The jumbo vegetable tray coupled with a wide shelf and an additional dry storage ensures that you get that extra storage space with proper segmentation.', 'Godrej', 0, '0', 0, 165, 0, 4, 0),
(30, '9.jpeg', 'Godrej RD EDGE PRO 205 TDF 4.2 Refrigerator-Magic Wine', 'RDEPRO205TDF3.2/4.2-MAGIC WINE', 28990, 'Gross Capacity: 190 L\r\nNet Capacity: 182 L\r\n4 Star Rating\r\nColor: Magic Wine\r\nAnnual Electricity Consumption (In KWH): 166\r\nNet Weight (in Kg): 40.3\r\nVoltage: 140-260V', 'Godrej', 0, '0', 0, 190, 0, 4, 0),
(31, '10.jpg', '5.1 Multimedia Speaker', 'CGA5801', 7290, 'LED Display\r\nUSB Disk\r\nSD/MMC Card\r\nFM Radio\r\nRemote Control', 'CG', 0, '0', 0, 0, 0, 13, 0),
(32, '11.jpg', '5.1 Multimedia Speaker', 'CGA5861', 8390, 'LED Display\r\nUSB Disk\r\nSD/MMC Card\r\nFM Radio\r\nRemote Control', 'CG', 0, '0', 0, 0, 0, 13, 0),
(33, '12.jpg', 'Commercial Washing Machine 10.2 KG', 'F1069FD3PS', 330790, 'Inverter DD Motor\r\nMulti heat system\r\nPremium coated material body\r\nForced Drain System\r\nDual Lock System\r\nTop Mounted Dispenser\r\nMultiple damper vibration reduction\r\nTempered glass\r\nAtomizing system\r\nCustomized program\r\nQuick wash (34 min.)\r\nSteel Control panel', 'LG', 0, '0', 0, 10, 0, 5, 1),
(34, '13.jpg', 'Godrej Front Load Fully Automatic Washing Machine', 'WFEON700PASE-E', 54990, 'Capacity: 7 Kg\r\nColor: White\r\nStain level selector\r\nEco-Balance System\r\n3 Level Stain Selector\r\nAllergy Protect\r\nNight Wash\r\nUnbalanced Load Detection\r\nFoam Protection\r\nOverflow Protection system\r\nError Detection system\r\nMaximum Spin Speed (rpm): 1000\r\n10 Years Motor Warranty\r\nVoltage V/ Frequency (Hz): 220-240V/50 Hz\r\nDimensions (HxWxD)(cm): 84.5 x 59.7 x 52.7Ã¢â‚¬â€¹', 'Godrej', 0, '0', 0, 7, 0, 5, 0),
(35, '14.jpg', 'RO Water Purifier 9.0 Ltr', 'KENT PRIME TC MINERAL RO WATER PURIFIER', 24290, '	\r\nState-of-the-Art Technology and Compact Design', 'Kent', 0, '0', 0, 9, 0, 6, 0),
(36, '16.jpg', 'Kent Aura Air Purifier', 'KENT AURA AIR PURIFIER', 23890, 'HEPA Dust Collection Technology\r\nHEPA Filter with Anti-Bacterial Coating\r\nHigh Efficiency Removal of Particulate Matter\r\nCarbon Filter Removes Odors\r\nImproves Freshness of Air with Inbuilt Ionizer\r\nIntelligent Air Quality Monitoring\r\nFilter Change Indicator\r\nSilent Operation\r\nUser-Friendly Functional Design\r\nSafe & Convenient for Use\r\nHigh Purifying Capacity\r\nChild Lock Feature', 'Kent', 0, '0', 0, 0, 270, 7, 0),
(37, '17.jpg', 'Refrigerator 285 Ltr.', 'GLT302RPZN.APZQ', 60990, 'Inverter Linear Compressor\r\nMulti Air Flow\r\nDoor Cooling+\r\nSmart Diagnosis\r\nAuto Smart Connect \r\nI-Micom', 'LG', 0, '0', 0, 285, 0, 9, 0),
(38, '18.jpg', 'Refrigerator 311 Ltr.', 'RTEON311P3.4- SILVER MEADOW', 56790, 'Cool Shower Technology\r\nIntelligent Operations\r\nTwist & Serve Ice Trays\r\nStay Cool Technology\r\nSlide Out Bins\r\nLED Lighting\r\nLarge Vegetable tray\r\nEasy store and serve bins\r\n2.5 L bottle Shelf\r\n100% green\r\nAnti-B Technology\r\nLow Starting Voltage\r\n ', 'Godrej', 0, '0', 0, 311, 0, 9, 0),
(39, '19.jpg', 'Washing Machine 8.0 KG', 'AWE900LSE-WB', 38985, 'Mega Power Pulsator\r\nResume Function\r\nZero Standby Power \r\nStar crystal drum\r\nCircular intake\r\nFragrance course\r\nHydro power wash\r\nSee through lid with lid lock\r\nCondensed bubble wash\r\nCassette lint filter', 'Toshiba', 0, '0', 0, 8, 0, 10, 0),
(40, '20.jpg', 'Washing Machine 8.0 KG', 'WFT80FS', 40800, 'POWERFUL WASHING WITH MULTI WATER FLOW\r\nTurboDrumTM\r\nJet Spray\r\nSmart DiagnosisÃ¢â€žÂ¢ System\r\nWaterfall Circulation\r\nSmart FilterÃ¢â€žÂ¢\r\n ', 'LG', 0, '0', 0, 8, 0, 10, 0),
(41, '22.jpg', 'Water Purifier 7.0 Ltr', 'KENT MAXX UV WATER PURIFIER', 16615, 'Water Purifier with detachable storage tank and Double Purification of UV+UF', 'Kent', 0, '0', 0, 7, 0, 11, 0),
(42, '24.jpg', 'Kent Magic Car Air Purifier', 'KENT MAGIC CAR AIR PURIFIER', 11290, 'HEPA Dust Collection Technology\r\nThree Stage Purification Technique\r\nHigh-Efficiency Removal of Particulate Matter\r\nCarbon Filter Removes Odors\r\nSilent Operation\r\nUser-Friendly Functional Design\r\nSafe & Convenient for Use\r\nHigh Purifying Capacity\r\nPurifies Air Inside Car Instantly', 'Kent', 0, '0', 0, 0, 110, 12, 0)");

mysqli_query($actualConnection,"CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(250) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `category`) VALUES
(3, 'LED TV', 1),
(4, 'Refrigerator', 2),
(5, 'Water Purifier ', 3),
(6, 'Audio System', 1),
(7, 'Washing Machine', 2),
(8, 'Air Purifier', 3)");

mysqli_query($actualConnection,"CREATE TABLE `subsubcategory` (
  `subsubcategory_id` int(11) NOT NULL,
  `subsubcategory_name` varchar(255) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($actualConnection,"INSERT INTO `subsubcategory` (`subsubcategory_id`, `subsubcategory_name`, `subcategory`, `category`) VALUES
(1, 'Normal LED', 3, 1),
(2, 'Smart LED', 3, 1),
(3, 'Home Theater System', 6, 1),
(4, 'Single Door Refrigerator', 4, 2),
(5, 'Front Loading', 7, 2),
(6, 'RO Water', 5, 3),
(7, 'Aura Air', 8, 3),
(8, 'Portable Bluetooth Speaker', 6, 1),
(9, 'Double Door', 4, 2),
(10, 'Top Loading', 7, 2),
(11, 'UV+UF Water', 5, 3),
(12, 'Car Air', 8, 3),
(13, 'Home Audio', 6, 1)");

mysqli_query($actualConnection,"ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`)");

mysqli_query($actualConnection,"ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`)");

mysqli_query($actualConnection,"ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`)");

mysqli_query($actualConnection,"ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`)");

mysqli_query($actualConnection,"ALTER TABLE `forum_reply`
  ADD PRIMARY KEY (`reply_id`)");

mysqli_query($actualConnection,"ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`)");

mysqli_query($actualConnection,"ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`)");

mysqli_query($actualConnection,"ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`)");

mysqli_query($actualConnection,"ALTER TABLE `subsubcategory`
  ADD PRIMARY KEY (`subsubcategory_id`)");

mysqli_query($actualConnection,"ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20");

mysqli_query($actualConnection,"ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4");

mysqli_query($actualConnection,"ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54");

mysqli_query($actualConnection,"ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");

mysqli_query($actualConnection,"ALTER TABLE `forum_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");

mysqli_query($actualConnection,"ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14");

mysqli_query($actualConnection,"ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43");

mysqli_query($actualConnection,"ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9");

mysqli_query($actualConnection,"ALTER TABLE `subsubcategory`
  MODIFY `subsubcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14");

mysqli_query($actualConnection,"COMMIT");

header("location:index.php");