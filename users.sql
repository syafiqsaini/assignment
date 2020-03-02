#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (1, 'August', 'dietrich.franz@example.net', '2011-04-07 00:55:55');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (2, 'Benton', 'kshlerin.paris@example.net', '1977-04-08 09:07:34');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (3, 'Maybell', 'rebeca.schmitt@example.com', '1984-12-01 00:34:26');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (4, 'Jena', 'vdickens@example.net', '2009-07-28 22:59:48');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (5, 'Rhett', 'hillard58@example.org', '1980-07-28 11:33:27');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (6, 'Dejuan', 'johnathon35@example.org', '2019-05-25 13:44:14');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (7, 'Matilda', 'qheidenreich@example.com', '1993-03-29 01:51:46');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (8, 'Julianne', 'amanda.murphy@example.net', '1983-12-05 12:25:02');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (9, 'Bradley', 'karley46@example.com', '1978-01-01 01:05:51');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (10, 'Henri', 'schroeder.charley@example.org', '2002-05-02 08:57:48');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (11, 'Taryn', 'syble13@example.com', '2009-10-12 14:32:40');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (12, 'Reed', 'webster21@example.net', '1971-10-18 10:00:02');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (13, 'Sebastian', 'hallie.mueller@example.com', '1981-10-02 20:32:13');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (14, 'Kitty', 'initzsche@example.com', '2007-09-02 17:33:15');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (15, 'Kamryn', 'zcummings@example.org', '1972-11-28 10:07:14');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (16, 'Keely', 'fabiola.dooley@example.com', '2018-10-05 23:40:29');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (17, 'Wilfred', 'ylegros@example.com', '2012-02-19 05:44:26');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (18, 'Mattie', 'torey32@example.net', '1971-06-19 00:00:18');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (19, 'Schuyler', 'xryan@example.com', '2008-10-31 11:56:22');
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES (20, 'Rocky', 'smitham.melvin@example.com', '1976-05-23 15:15:22');


