CREATE DATABASE IF NOT EXISTS join_test_db;
USE join_test_db;

CREATE TABLE tbl1 (
    id INT PRIMARY KEY,
    name VARCHAR( 200 ),
    titleId INT
);

CREATE TABLE tbl2 (
    id INT PRIMARY KEY,
    title VARCHAR( 200 )
);

INSERT INTO tbl2 ( id, title ) 
VALUES
( 1, '辅导员' ),
( 2, '讲师' ),
( 3, '助教' ),
( 4, '校长' ),
( 5, '班主任' );

INSERT INTO tbl1 ( id, name, titleId )
VALUES
( 1, '张三', 1 ),
( 2, '李四', 2 ),
( 3, '王五', 3 ),
( 4, '赵钱', 2 ),
( 5, '孙李', 3 ),
( 6, '周吴', null ),
( 7, '郑王', null );




CREATE TABLE tbl3 (
    id INT PRIMARY KEY,
    name VARCHAR( 200 ),
    titleId INT
);
INSERT INTO tbl3 ( id, name, titleId )
VALUES
( 1, 'jim', 1 ),
( 2, 'tom', 2 ),
( 5, 'jack', 3 ),
( 6, 'jerry', null ),
( 7, 'clark', null );