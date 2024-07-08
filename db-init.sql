-- mysql -u your user name  -p

-- type in the password 

create database yourdatabasename;
use yourdatabasename ;

create table categories (`id` int(11) auto_increment not null primary key , `name` varchar(255) , `created_at` datetime  );
create table posts (`id` int(11) auto_increment not null primary key, `category_id` int(11) , `title` varchar(255) , `body` text ,  `author` varchar(255) , `created_at` datetime  );

alter table posts alter created_at set default current_timestamp ;

insert into categories (`name` , `created_at`) values ( 'Technology', '2024-01-01 10.30.03'); 
insert into categories (`name` , `created_at`) values ( 'Gaming', '2024-01-01 10.30.05');
insert into categories (`name` , `created_at`) values ( 'Auto', '2024-02-01 10.25.01');
insert into categories (`name` , `created_at`) values ( 'Entertainment', '2024-03-01 11.00.01');

-- we check 

-- select * from categories ;
-- +----+---------------+---------------------+
-- | id | name          | created_at          |
-- +----+---------------+---------------------+
-- |  1 | Technology    | 2024-01-01 10:30:03 |
-- |  2 | Gaming        | 2024-01-01 10:30:05 |
-- |  3 | Auto          | 2024-02-01 10:25:01 |
-- |  4 | Entertainment | 2024-03-01 11:00:01 |
-- +----+---------------+---------------------+

insert into posts (`title` , `body` , `author`, `category_id` , `created_at` ) values ('article1' , 'this is article 1 body' , 'jim the writer', 4 , '2024-03-01 11.00.01');
insert into posts (`title` , `body` , `author`, `category_id` , `created_at` ) values ('article2' , 'this is article 2 body' , 'not jim the writer', 3 , '2024-04-01 10.00.01');
insert into posts (`title` , `body` , `author`, `category_id` , `created_at` ) values ('article3' , 'this is article 3 body' , 'bill the writer', 1 , '2024-04-01 10.00.01');
insert into posts (`title` , `body` , `author`, `category_id` , `created_at` ) values ('article4' , 'this is article 4 body' , 'not bill the gamer', 2 , '2024-04-01 10.00.01');


-- we check 

-- select * from posts;
-- +----+-------------+----------+------------------------+--------------------+---------------------+
-- | id | category_id | title    | body                   | author             | created_at          |
-- +----+-------------+----------+------------------------+--------------------+---------------------+
-- |  1 |           4 | article1 | this is article 1 body | jim the writer     | 2024-03-01 11:00:01 |
-- |  2 |           3 | article2 | this is article 2 body | not jim the writer | 2024-04-01 10:00:01 |
-- |  3 |           1 | article3 | this is article 3 body | sam the writer     | 2024-04-01 10:00:01 |
-- |  4 |           2 | article4 | this is article 4 body | not sam the gamer  | 2024-04-01 10:00:01 |
-- +----+-------------+----------+------------------------+--------------------+---------------------+