CREATE DATABASE treeshop;

USE treeshop;

-- member 테이블
DROP TABLE member;
CREATE TABLE member(
    no int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id varchar(20) NOT NULL,
    pw varchar(20) NOT NULL,
    name varchar(20) NOT NULL,
    address varchar(200) NOT NULL,
    date datetime NOT NULL
);
    -- dummy data
    INSERT INTO member (id,pw,name,address,date)
    VALUES ('admin','1234','관리자','(06167) 서울 강남구 테헤란로87길 55층',now());
    INSERT INTO member (id,pw,name,address,date)
    VALUES ('hong','1234','홍길동','한양시 강남구 대치동','1435-06-12');
    INSERT INTO member (id,pw,name,address,date)
    VALUES ('you','4321','유관순','충청남도 목천군 이동면 지령리','1902-12-16');

    -- 조회
    SELECT * FROM member;


-- product 테이블
DROP TABLE product;
CREATE TABLE product(
    no int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(50) NOT NULL,
    description text NOT NULL,
    price int NOT NULL,
    imgsrc varchar(100) NOT NULL,
    writer varchar(20) NOT NULL,
    date datetime NOT NULL
);

    -- dummy data
    INSERT INTO product (no,title,description,price,imgsrc,writer,date)
    VALUES (998,'생수 판매','생수 판매 합니다. 관심 있으시면 연락주세요.',14000,'resource/img/product/삼다수.jpg','관리자','2021-11-07');
    INSERT INTO product (no,title,description,price,imgsrc,writer,date)
    VALUES (999,'S21 휴대폰','삼성 휴대폰 판매중입니다. 관심 있으시면 연락주세요.',1230000,'resource/img/product/galaxy-s21-5g.jpg','관리자','2021-12-16');
    
    INSERT INTO product (title,description,price,imgsrc,writer,date)
    VALUES ('제주도 여행권','제주도 2박 3일 여행권 판매中',500000,'resource/img/product/바닷가.jpg','관리자','2021-12-18 20:23:35');
    INSERT INTO product (title,description,price,imgsrc,writer,date)
    VALUES ('딸기 1kg','빨간 딸기 맛있겠당',23000,'resource/img/product/strawberry.jpg','관리자','2021-12-18 20:24:18');
    INSERT INTO product (title,description,price,imgsrc,writer,date)
    VALUES ('바나나 10kg','바나나는 길어, 길면 기차',55000,'resource/img/product/banana.jpg','관리자','2021-12-18 21:11:02');
    INSERT INTO product (title,description,price,imgsrc,writer,date)
    VALUES ('사과 1박스','사과 1kg 팝니다 2만 1천원!!',21000,'resource/img/product/apple.jpg','관리자','2021-12-19 13:14:33');
    INSERT INTO product (title,description,price,imgsrc,writer,date)
    VALUES ('해파리','해파리 냉채 재료',35500,'resource/img/product/해파리.jpg','관리자','2021-12-19 13:24:01');
    INSERT INTO product (title,description,price,imgsrc,writer,date)
    VALUES ('알록달록 전구','분위기 있는 알록달록 조명 판매합니다..',289400,'resource/img/product/light2.jpg','관리자','2022-01-12 14:14:11');

    -- 조회
    SELECT * FROM product;

    
-- basket 테이블
DROP TABLE basket;
CREATE TABLE basket(
    no int PRIMARY KEY NOT NULL,
    title varchar(50) NOT NULL,
    price int NOT NULL,
    imgsrc varchar(100) NOT NULL,
    date datetime NOT NULL
);

    -- dummy data
    -- INSERT INTO basket (no,title,price,imgsrc,date)
    -- VALUES (998,'생수 판매',14000,'resource/img/product/삼다수.jpg','2021-11-07');
    -- INSERT INTO basket (no,title,price,imgsrc,date)
    -- VALUES (1003,'사과 1박스',21000,'resource/img/product/apple.jpg','2021-12-19 13:14:33');
    
    -- 조회
    SELECT * FROM basket;

    -- 데이터 초기화
    TRUNCATE TABLE basket;
    


-- ###############################################################









-- board 테이블
DROP TABLE board;
CREATE TABLE board(
    no int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(50) NOT NULL,
    writer varchar(20),
    content text NOT NULL,
    date date NOT NULL
);









-- sql 연습코드

SELECT * FROM product
ORDER BY no desc;


