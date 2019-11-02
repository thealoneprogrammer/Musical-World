CREATE TABLE `user` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) NOT NULL,
 `mobile_number` varchar(10) NOT NULL,
 `email_address` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `activation_code` varchar(255) NOT NULL DEFAULT '0',
 `confirm_status` int(1) DEFAULT '0',
 `contributions` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`user_id`)
);

CREATE TABLE `category` (
 `cat_id` int(11) NOT NULL,
 `cat_name` varchar(255) NOT NULL,
 primary key(`cat_id`)
);

CREATE TABLE `kannada_albums` (
 `song_id` int(100) NOT NULL AUTO_INCREMENT,
 `song_name` varchar(255) NOT NULL,
 `song_format` varchar(100) NOT NULL,
 `singer_name` varchar(100) NOT NULL,
 `movie_name` varchar(50) NOT NULL,
 `song_image` varchar(255) NOT NULL,
 `audio_file` varchar(255) NOT NULL,
 PRIMARY KEY (`song_id`)
);

CREATE TABLE `english_albums` (
 `song_id` int(100) NOT NULL AUTO_INCREMENT,
 `song_name` varchar(255) NOT NULL,
 `song_format` varchar(100) NOT NULL,
 `singer_name` varchar(100) NOT NULL,
 `movie_name` varchar(50) NOT NULL,
 `song_image` varchar(255) NOT NULL,
 `audio_file` varchar(255) NOT NULL,
 PRIMARY KEY (`song_id`)
);

CREATE TABLE `hindi_albums` (
 `song_id` int(100) NOT NULL AUTO_INCREMENT,
 `song_name` varchar(255) NOT NULL,
 `song_format` varchar(100) NOT NULL,
 `singer_name` varchar(100) NOT NULL,
 `movie_name` varchar(50) NOT NULL,
 `song_image` varchar(255) NOT NULL,
 `audio_file` varchar(255) NOT NULL,
 PRIMARY KEY (`song_id`)
);

CREATE TABLE `upload_albums` (
 `song_id` int(100) NOT NULL AUTO_INCREMENT,
 `singer_id` int(11) NOT NULL,
 `song_name` varchar(255) NOT NULL,
 `song_format` varchar(100) NOT NULL,
 `singer_name` varchar(100) NOT NULL,
 `song_image` varchar(255) NOT NULL,
 `audio_file` varchar(255) NOT NULL,
 PRIMARY KEY (`song_id`)
);

CREATE TABLE `favorite_songs` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `cat_id` int(11) NOT NULL references category(`cat_id`) on delete cascade,
 `song_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL references user(`user_id`) on delete cascade,
 `song_name` varchar(255) NOT NULL,
 `singer_name` varchar(255) NOT NULL,
 `song_image` varchar(255) NOT NULL,
 `audio_file` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
);

INSERT INTO `user` (`user_id`,`username`,`mobile_number`,`email_address`,`password`,`confirm_status`) VALUES
    (1,'Sujith','9876543210', 'admin@gmail.com', 'c12b240b5710c6c9ee00ef4529803aac', 1),
    (2,'Subramanya','9988776655', 'subramanyarao4@gmail.com', 'a8c6b82ae79f5f29899228ced196b1b7', 1);

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES 
    ('1', 'kannada_albums'),
    ('2', 'hindi_albums'),
    ('3', 'english_albums'),
    ('4', 'uploaded_albums');
