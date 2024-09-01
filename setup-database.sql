DROP TABLE IF EXISTS papers;

CREATE TABLE papers (
  code varchar(7),
  name varchar(50) NOT NULL,
  PRIMARY KEY (code)
);

INSERT INTO papers VALUES ('COSC326','Computational Problem Solving');
INSERT INTO papers VALUES ('COSC349','Cloud Computing Architecture');
