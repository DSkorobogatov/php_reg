CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userphoto` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
