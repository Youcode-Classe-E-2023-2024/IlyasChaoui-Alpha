create table User
(
    user_id  bigint auto_increment primary key,
    email    varchar(255) not null,
    password text not null,
    username varchar(255) null,
    picture  text null,
    constraint user_users_email_uindex unique (email),
    constraint user_user_id_uindex unique (user_id)
);


CREATE TABLE IF NOT EXISTS PasswordRecovery (
    id_pwd INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pwd_reset_email VARCHAR(100) NOT NULL,
    pwd_reset_selector VARCHAR(50) NOT NULL,
    pwd_reset_token TEXT NOT NULL,
    pwd_reset_expires TEXT NOT NULL,
    id_user BIGINT,
    FOREIGN KEY (id_user ) REFERENCES User (user_id)  ON UPDATE CASCADE ON DELETE CASCADE
    );


CREATE TABLE IF NOT EXISTS Product (
    id_article INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(500) NOT NULL,
    article_date VARCHAR(50) NOT NULL,
    creator_id BIGINT ,
    FOREIGN KEY (creator_id) REFERENCES User (user_id) ON UPDATE CASCADE ON DELETE CASCADE
    );

CREATE TABLE IF NOT EXISTS Notification (
    id_notif INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    notification VARCHAR(500) NOT NULL,
    creator_id BIGINT,
    FOREIGN KEY (creator_id) REFERENCES User (user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    product_id INT(6) UNSIGNED,
    FOREIGN KEY (product_id) REFERENCES Product(id_article) ON UPDATE CASCADE ON DELETE CASCADE
    );