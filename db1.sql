create table `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table `admin` (
    `username` varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table `product` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `content` text COLLATE utf8_unicode_ci  NOT NULL,
  `img_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table `order` {
`id` int(255) NOT NULL set primary key (`id`),
`transaction_id` int(255) NOT NULL,
`id_product` int(255) NOT NULL,
`amount` decimal(15, 4) NOT NULL DEFAULT '0.000',
`quatity` int(11) NOT NULL,
`status` tinyint(4) NOT DEFAULT '0'
} ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
