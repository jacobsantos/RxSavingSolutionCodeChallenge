
CREATE TABLE IF NOT EXISTS `addresses` (
  `uid` BIGINT not null primary key AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `address_line1` VARCHAR(200) NOT NULL,
  `address_city` VARCHAR(200) NOT NULL,
  `address_state` CHAR(2) NOT NULL,
  `address_postal` VARCHAR(30) NOT NULL,
  `latitude` DECIMAL(10,8) NOT NULL,
  `longitude` DECIMAL(11,8) NOT NULL
);

CREATE INDEX latitude_longitude ON `addresses` (`latitude`, `longitude`);

INSERT INTO `addresses`
  (name, address_line1, address_city, address_state, address_postal, latitude, longitude)
VALUES
  ('WALGREENS','3696 SW TOPEKA BLVD','TOPEKA','KS','66611',39.00142300,-95.68695000),
  ('KMART PHARMACY','1740 SW WANAMAKER ROAD','TOPEKA','KS','66604',39.03504000,-95.75870000),
  ('CONTINENTAL PHARMACY LLC','821 SW 6TH AVE','TOPEKA','KS','66603',39.05433000,-95.68453000),
  ('STORMONT-VAIL RETAIL PHARMACY','2252 SW 10TH AVE.','TOPEKA','KS','66604',39.05167000,-95.70534000),
  ('DILLON PHARMACY','2010 SE 29TH ST','TOPEKA','KS','66605',39.01638400,-95.65065000),
  ('WAL-MART PHARMACY','1501 S.W. WANAMAKER ROAD','TOPEKA','KS','66604',39.03955000,-95.76459000),
  ('KING PHARMACY','4033 SW 10TH AVE','TOPEKA','KS','66604',39.05121000,-95.72700000),
  ('HY-VEE PHARMACY','12122 STATE LINE RD','LEAWOOD','KS','66209',38.90775300,-94.60801000),
  ('JAYHAWK PHARMACY AND PATIENT SUPPLY','2860 SW MISSION WOODS DR','TOPEKA','KS', '66614', 39.01505300,-95.77866000),
  ('PRICE CHOPPER PHARMACY','3700 W 95TH ST','LEAWOOD','KS', '66206', 38.95792000,-94.62881500),
  ('AUBURN PHARMACY','13351 MISSION RD','LEAWOOD','KS', '66209', 38.88534500,-94.62800000),
  ('CVS PHARMACY','5001 WEST 135 ST','LEAWOOD','KS', '66224', 38.88323000,-94.64518000),
  ('SAMS PHARMACY','1401 SW WANAMAKER ROAD','TOPEKA','KS', '66604', 39.04160300,-95.76462600),
  ('CVS PHARMACY','2835 SW WANAMAKER RD','TOPEKA','KS', '66614', 39.01550300,-95.76434000),
  ('HY-VEE PHARMACY','2951 SW WANAMAKER RD','TOPEKA','KS', '66614', 39.01215700,-95.76394000),
  ('TALLGRASS PHARMACY','601 SW CORPORATE VIEW','TOPEKA','KS', '66615', 39.05716000,-95.76692000),
  ('HUNTERS RIDGE PHARMACY','3405 NW HUNTERS RIDGE TER STE 200','TOPEKA','KS', '66618', 39.12984500,-95.71265400),
  ('ASSURED PHARMACY  ','11100 ASH ST STE 200','LEAWOOD','KS', '66211', 38.92663200,-94.64744000),
  ('WALGREENS','4701 TOWN CENTER DR','LEAWOOD','KS', '66211', 38.91619000,-94.64036600),
  ('PRICE CHOPPER PHARMACY','1100 SOUTH 7 HWY','BLUE SPRINGS','MO', '64015', 39.02931000,-94.27175000),
  ('CVS PHARMACY','1901 WEST KANSAS STREET','LIBERTY','MO', '64068', 39.24385000,-94.44961000),
  ('MARRS PHARMACY','205 RD MIZE ROAD','BLUE SPRINGS','MO', '64014', 39.02353000,-94.26060500),
  ('WAL-MART PHARMACY','600 NE CORONADO DRIVE','BLUE SPRINGS','MO', '64014', 39.02419300,-94.25503000),
  ('WAL-MART PHARMACY','10300 E HWY 350','RAYTOWN','MO', '64133', 38.98376500,-94.45930500),
  ('HY-VEE PHARMACY','9400 E. 350 HIGHWAY','RAYTOWN','MO', '64133', 38.99300000,-94.47083000),
  ('HY-VEE PHARMACY','625 W 40 HWY','BLUE SPRINGS','MO', '64014', 39.01070400,-94.27108000),
  ('HY-VEE PHARMACY','109 NORTH BLUE JAY DRIVE','LIBERTY','MO', '64068', 39.24575800,-94.44702000),
  ('WALGREENS','1701 NW HIGHWAY 7','BLUE SPRINGS','MO', '64015', 39.03754800,-94.27153000),
  ('WALGREENS','9300 E GREGORY BLVD','RAYTOWN','MO', '64133', 38.99534200,-94.47340000),
  ('WALGREENS','1191 W KANSAS AVE','LIBERTY','MO', '64068', 39.24387000,-94.44186400);
