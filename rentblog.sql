-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 01 Σεπ 2020 στις 12:45:12
-- Έκδοση διακομιστή: 10.1.34-MariaDB
-- Έκδοση PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `rentblog`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `city` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rooms_number` int(2) NOT NULL,
  `available_from` date NOT NULL,
  `property_type_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `properties`
--

INSERT INTO `properties` (`property_id`, `title`, `description`, `postcode`, `city`, `price`, `image`, `rooms_number`, `available_from`, `property_type_id`, `created_at`) VALUES
(1, 'Double Bedroom (Ensuite and Parking) by Acton Park', 'Double bedroom with en-suite x available in a lovely modern flat with balcony and beside a park. Live with a nice Irish professional female (if I do say so myself) who is laid back but tidy!The photos make the flat look a lot smaller than it is in reality, it really needs to be seen in person.The flat is in an amazing location, right beside a park with tennis and basketball courts. If you like nature, Richmond and Kew Gardens are 15 minutes away by overground.Westfield Shopping Centre is a 30 minute walk or 15 minute bus away. There\'s also a large Lidl and Morrisons within a 10 min walk for grocery shopping.We\'re absolutely spoilt for choice when it comes to cafes and bars in the area, I\'ve been living here for a year and still have a bucket list of places to get to nearby!An underground parking space comes for free with the flat, I don\'t drive so this can be yours if needed.The flat is also partly furnished, the available room has a built in wardrobe but you\'ll need to supply the bed. I have supplied most of the furniture in the shared living spaces. sBills come to about £85pp monthly including fibre-optic broadband. You\'ll also need to pass a reference check with the agency handling the lease on the flat (Hamptons).', 'W3', 'london', 1001, '', 3, '2020-03-11', 1, '2020-03-09 21:22:28'),
(2, 'Single Room in Zone 3 Seven Sisters', 'Hi there!\r\n\r\ni have a lovely furnished single room available to move in at the begining of May.\r\n\r\nfurnishings include wardrobe, desk, chair and a set of drawers.\r\n\r\nthis room is perfect for someone who is looking to save some money but be just 20 minutes away from central London! for me it was a god send!\r\n\r\nthe house is spread across 2 floors, with 2 bathrooms and a shared kitchen. there is NO living room, so this house share is good for someone who works full time.\r\n\r\nEveryone in the house is super friendly, and often enjoy a beer in the pu accross the road!\r\n\r\nall bills and wifi are included, please note no pets or couples allowed.\r\nif you are interested please let me know when you would like o veiw :)\r\n\r\nThanks for your time.\r\n\r\n\r\n', 'N15', 'London', 480, '', 2, '2020-03-10', 2, '2020-03-09 21:22:28'),
(3, 'Studio flat fully furnished and refurbished (£750)', 'Description\r\nStudio flat available for rent in Edgware Nolton Place HA8 fully furnished and refurbished £750 including all bills (electric, gas, water and council tax). own drive and garden.\r\n\r\n15 min walk to Queensbury station (jubilee line), burnt oak high street, post office, local banks, morrisons, tesco, Local shops, resturaunts\r\n\r\n5 min walk to local buses 288 and 688\r\n\r\n', 'HA8', 'London', 750, '', 1, '2020-04-01', 3, '2020-03-09 21:22:28'),
(4, 'test title for this ad', 'test description', 'w10', 'berlin', 900, '', 3, '2020-05-15', 1, '2020-03-10 18:27:54'),
(5, 'Test 2 title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ita separantur, ut disiuncta sint, quo nihil potest esse perversius. Dicet pro me ipsa virtus nec dubitabit isti vestro beato M. Nam cui proposito sit conservatio sui, necesse est huic partes quoque sui caras suo genere laudabiles. Duo Reges: constructio interrete. Quis negat? Quorum sine causa fieri nihil putandum est. Laboro autem non sine causa;', 'w10 aj6', 'london', 700, '', 3, '2020-03-25', 2, '2020-03-10 20:06:53'),
(6, 'title, this is a updated tiltle ', 'Some text here, a description', 'w1', 'amsterdam', 800, '', 2, '2020-03-13', 2, '2020-03-12 14:29:33'),
(7, 'Some random text text', 'Με τον όρο Lorem ipsum αναφέρονται τα κείμενα εκείνα τα οποία είναι ακατάληπτα, δεν μπορεί δηλαδή κάποιος να βγάλει κάποιο λογικό νόημα από αυτά, και έχουν δημιουργηθεί με σκοπό να παρουσιάσουν στον αναγνώστη μόνο τα γραφιστικά χαρακτηριστικά, αυτά καθ\' εαυτά, ενός κειμένου ή μιας οπτικής παρουσίασης και όχι να ... Βικιπαίδεια S', '22110', 'Athens', 500, '', 3, '2020-08-10', 1, '2020-07-26 23:57:15'),
(8, 'This is an Ad title', 'Some desciption about the ad.', 'nw3', 'london', 600, '', 4, '2020-09-10', 2, '2020-09-01 13:14:04');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `property_type`
--

CREATE TABLE `property_type` (
  `property_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `property_type`
--

INSERT INTO `property_type` (`property_type_id`, `name`, `created_at`) VALUES
(1, 'House', '2020-03-09 19:14:24'),
(2, 'Flat', '2020-03-09 19:14:24'),
(3, 'Studio', '2020-03-09 19:14:24');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Ευρετήρια για πίνακα `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`property_type_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `property_type`
--
ALTER TABLE `property_type`
  MODIFY `property_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
