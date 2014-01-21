
CREATE TABLE IF NOT EXISTS `demo_user` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `email` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL
);

CREATE TABLE IF NOT EXISTS `demo_group` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `name` varchar(60) NOT NULL
);

CREATE TABLE IF NOT EXISTS `demo_usergroup` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `id_user` INTEGER NOT NULL,
  `id_group` INTEGER NOT NULL,
  FOREIGN KEY (`id_user`) REFERENCES `demo_user` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (`id_group`) REFERENCES `demo_group` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE IF NOT EXISTS `demo_forum` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `title` varchar(80) NOT NULL,
  `alias` varchar(80) NOT NULL,
  `description` varchar(80) NOT NULL,
  `keywords` varchar(80) NOT NULL
);

CREATE TABLE IF NOT EXISTS `demo_topic` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `title` varchar(80) NOT NULL,
  `alias` varchar(80) NOT NULL,
  `keywords` varchar(80) NOT NULL,
  `datetime` DATETIME NOT NULL,
  `id_forum` INTEGER,
  `id_user` INTEGER,
  `sticky` int(1) NULL,
  FOREIGN KEY (`id_forum`) REFERENCES `demo_forum` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (`id_user`) REFERENCES `demo_user` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE INDEX `topic_forum_fk_idx` ON `demo_topic` (`id_forum`);
CREATE INDEX `topic_user_fk_idx` ON `demo_topic` (`id_user`);

CREATE TABLE IF NOT EXISTS `demo_post` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `body` TEXT,
  `datetime` DATETIME NOT NULL,
  `id_topic` INTEGER,
  `id_user` INTEGER,
  FOREIGN KEY (`id_topic`) REFERENCES `demo_topic` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (`id_user`) REFERENCES `demo_user` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE INDEX `post_topic_fk_idx` ON `demo_post` (`id_topic`);
CREATE INDEX `post_user_fk_idx` ON `demo_post` (`id_user`);

INSERT INTO `demo_user` (`id`, `email`, `password`) VALUES
(1, 'admin@domain.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

INSERT INTO `demo_group` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'guest');

INSERT INTO `demo_usergroup` (`id`, `id_user`, `id_group`) VALUES
(1, 1, 1);

INSERT INTO `demo_forum` (`id`, `title`, `alias`, `description`, `keywords`) VALUES
(1, 'Category 1', 'category-1', 'The very first category', 'hello');

INSERT INTO `demo_topic` (`id`, `title`, `alias`, `keywords`, `datetime`, `id_forum`, `id_user`) VALUES
(1, 'Welcome Users', 'welcome-users', 'welcome', datetime('NOW'), 1, 1);

INSERT INTO `demo_post` (`id`, `body`, `datetime`, `id_topic`, `id_user`) VALUES
(1, '<p>First post by Architect Demo<p>', datetime('NOW'), 1, 1);
