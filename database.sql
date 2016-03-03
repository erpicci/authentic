-- An user of the system.
DROP TABLE IF EXISTS authentic_user;
CREATE TABLE IF NOT EXISTS authentic_user(
    id           VARCHAR(128) NOT NULL,
    password     CHAR(60) NOT NULL,
    access_token VARCHAR(256),
    last_login   INT UNSIGNED,
    failed_login INT UNSIGNED NOT NULL DEFAULT 0,
    last_attempt INT UNSIGNED NOT NULL DEFAULT 0,
    CONSTRAINT id PRIMARY KEY (id),
    CONSTRAINT access_token UNIQUE (access_token)
);
