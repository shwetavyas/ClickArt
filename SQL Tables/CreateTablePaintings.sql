CREATE TABLE paintings (
  painting_id INT AUTO_INCREMENT,
  paintingname VARCHAR(100),
  paintingtype VARCHAR(50),
  painter VARCHAR(100),
  publisher VARCHAR(100),
  category VARCHAR(20),
  price VARCHAR(10),
  availability VARCHAR(20),
  photo VARCHAR(50),
  PRIMARY KEY (painting_id)
);