
/*-----------------------------------------------*/
/* Product Table*/
/*-----------------------------------------------*/

CREATE TABLE Product( 
 prodId INT(4) NOT NULL AUTO_INCREMENT ,
 prodName VARCHAR(30),
 prodPicNameSmall VARCHAR(100) NOT NULL,
 prodPicNameLarge VARCHAR(100) NOT NULL,
 prodDescripShort VARCHAR(1000) NULL,
 prodDescripLong VARCHAR(3000) NULL,
 prodPrice VARCHAR(6) NOT NULL,
 prodQuantity INT(4) NOT NULL,
 PRIMARY KEY (prodId)
);

INSERT INTO Product 
(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) 
VALUES("HP Laptop","Image1a.jfif","Image1b.jfif","HP Pavilion 15-cs3009na Laptop, Intel Core i5 Processor, 8GB RAM, 512GB SSD, 15.6 Full HD, Mineral Silver","The HP Pavilion 15-cs3009na has been created with a 10th generation Intel Core i5 processor, 
8GB RAM and a 15.6 Full HD display. This stylish laptop will be able to assist with all your email, 
casual gaming, letter writing and work project requirements","649.9",5) 


INSERT INTO Product 
(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) 
VALUES
("Panasonic TX-43GX680B","Image2a.jfif","Image2b.jfif",
"Panasonic TX-43GX680B (2019) LED HDR 4K Ultra HD Smart TV, 43 with Freeview Play & Silver Trim Bezel, Black"
,"Panasonic’s GX680 displays an exceptional 4K HDR picture,
 enhanced by HDR10. Get the best out of 4K streaming services and Blu-rays, 
 while Dolby Digital Plus provides top-quality audio.
 Its customisable Smart Platform brings you a wealth of online apps,
 including streaming services Netflix and Amazon Prime Video in 4K",
"329.00", 5)

INSERT INTO Product (prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) 
VALUES
("Back Large 3 Seater Sofa","Image3a.jfif","Image3b.jfif",
"John Lewis & Partners Bailey High Back Large 3 Seater Sofa, Dark Leg, Hatton Steel"
,"With a slim build and tapered legs, the Bailey range comes in a wide choice of sizes, 
offering a versatile solution for your home.
 The high back options offer extra support, and scatter back options create even more comfort",
"949.00", 5)

INSERT INTO Product 
(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) 
VALUES
("Dell XPS 15 7590 Gaming Laptop","Image4a.jfif","Image4b.jfif",
"Dell XPS 15 7590 Gaming Laptop, Intel Core i7 Processor, 16GB RAM, 512GB SSD, GeForce GTX 1650, 15.6 Ultra HD, Silver"
,"Created with a 9th generation Intel i7 processor, 
16GB RAM, a 15.6 OLED Ultra HD display and a 512GB Solid State Drive, 
the powerful Dell Inspiron 15 7590 laptop will fly through your work assignments,
 whilst also providing plenty of entertainment options, such as casual gaming,
 checking out social media pages or streaming films and shows in Ultra HD",
"1849.95", 5)

/*-----------------------------------------------*/
/*Users Table*/
/*-----------------------------------------------*/

CREATE TABLE Users( 
 userId INT(4) NOT NULL AUTO_INCREMENT,
 userType VARCHAR(1) NOT NULL,
 userFName VARCHAR(50) NOT NULL,
 userSName VARCHAR(50) NOT NULL,
 userAddress VARCHAR(50) NOT NULL,
 userPostCode VARCHAR(50) NOT NULL,
 userTelNo VARCHAR(50) NOT NULL,
 userEmail VARCHAR(50) NOT NULL UNIQUE,
 userPassword VARCHAR(50) NOT NULL,
 PRIMARY KEY (userId)
);

/*-----------------------------------------------*/
/*Orders Table*/
/*-----------------------------------------------*/

CREATE TABLE Orders( 
 orderNo INT(4) NOT NULL AUTO_INCREMENT,
 userId INT(4) NOT NULL,
 orderDateTime DATETIME NOT NULL,
 orderTotal DECIMAL(8,2) NOT NULL,
 PRIMARY KEY (orderNo)
);

ALTER TABLE `orders` ADD FOREIGN KEY (`userId`) REFERENCES `users`(`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orders` ADD COLUMN orderStatus VARCHAR(100) ;

/*-----------------------------------------------*/
/*Order_Line Table*/
/*-----------------------------------------------*/

CREATE TABLE Order_Line( 
 oderLineId INT(4) NOT NULL AUTO_INCREMENT,
 orderNo INT(4) NOT NULL,
 prodId INT(4) NOT NULL,
 quantityOrdered INT(4) NOT NULL,
 subTotal DECIMAL(8,2) NOT NULL,
 PRIMARY KEY (oderLineId)
);

ALTER TABLE `order_line` ADD FOREIGN KEY (`orderNo`) REFERENCES `orders`(`orderNo`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `order_line` ADD FOREIGN KEY (`prodId`) REFERENCES `product`(`prodId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*-----------------------------------------------*/
/*Inserting 3 Values for the users table*/
/*-----------------------------------------------*/

INSERT INTO users (userId,userType,userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword)
VALUES(46,"C","Donald","Duck","2DisneyRd,London","N2 6RD","02079115000","dd@d.com","123");

INSERT INTO users (userId,userType,userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword)
VALUES(48,"C","Darth","Vader","34 Death Star,Endor","EN2 4RD","02079115002","dv@empire.com","123");

INSERT INTO users (userId,userType,userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword)
VALUES(49,"A","Francois","Roubert","115 New Cavendish Street,London","W1W 6UW","02079115000","fr@homteq.com","123"); 


