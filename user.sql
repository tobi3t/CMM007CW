CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (name, email, password) VALUES
('Bob Johnson', 'bob.johnson@gmail.com', 'WinterWonderland2022'),
('Alice Wong', 'alice.wong@gmail.com', 'SunnyDayz123'),
('Tom Baker', 'tom.baker@gmail.com', 'ChocolateChipCookies*'),
('Jason Kim', 'jason.kim@gmail.com', 'BlueSkyDays#'),

