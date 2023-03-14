CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (name, email, password) VALUES
('John Smith', 'john.smith@gmail.com', 'G0ldenSunshine!'),
('Jane Doe', 'jane.doe@gmail.com', 'PurpleRain99#'),
('Bob Johnson', 'bob.johnson@gmail.com', 'WinterWonderland2022'),
('Alice Wong', 'alice.wong@gmail.com', 'SunnyDayz123'),
('David Lee', 'david.lee@gmail.com', 'RainbowSprinkles$'),
('Maria Rodriguez', 'maria.rodriguez@gmail.com', 'BeachBreeze87'),
('Tom Baker', 'tom.baker@gmail.com', 'ChocolateChipCookies*'),
('Samantha Davis', 'samantha.davis@gmail.com', 'MoonlightSerena_'),
('Michael Chen', 'michael.chen@gmail.com', 'OceanWaves2023!'),
('Emily Kim', 'emily.kim@gmail.com', 'RoseGarden22$'),
('Mark Wilson', 'mark.wilson@gmail.com', 'MightyMountain777'),
('Karen Brown', 'karen.brown@gmail.com', 'ButterflyKisses123'),
('Lucas Martin', 'lucas.martin@gmail.com', 'ElectricGuitarRocks!'),
('Olivia Jones', 'olivia.jones@gmail.com', 'SunflowerFields@'),
('Samuel Lee', 'samuel.lee@gmail.com', 'Thunderstorms#'),
('Jessica Zhang', 'jessica.zhang@gmail.com', 'DancingInRain88*'),
('Ryan Davis', 'ryan.davis@gmail.com', 'HikingAdventure2022'),
('Linda Chen', 'linda.chen@gmail.com', 'CoffeeAddict_123'),
('Jason Kim', 'jason.kim@gmail.com', 'BlueSkyDays#'),
('Erica Smith', 'erica.smith@gmail.com', 'TropicalVacation2023!');
