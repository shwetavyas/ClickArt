CREATE TABLE allusers (
  user_id INT AUTO_INCREMENT,
  firstname VARCHAR(32),
  lastname VARCHAR(32),
  email VARCHAR(32),
  password VARCHAR(40),
  phone VARCHAR(10),
  photo VARCHAR(32),
  category VARCHAR(20),
  PRIMARY KEY (user_id)
);