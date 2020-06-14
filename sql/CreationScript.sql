create table order_status
(
    id     int auto_increment
        primary key,
    status varchar(50) null
);

create table product_category
(
    id       int auto_increment
        primary key,
    category varchar(50) not null
);

create table products
(
    id          int auto_increment
        primary key,
    name        varchar(50)  not null,
    description varchar(500) null,
    price       decimal      null,
    category_id int          null,
    constraint FK_products_product_category
        foreign key (category_id) references product_category (id)
);

create table users
(
    id       int auto_increment
        primary key,
    login    varchar(50)  not null,
    password varchar(50)  not null,
    name     varchar(50)  null,
    email    varchar(50)  null,
    address  varchar(200) null
);

create table orders
(
    id        int auto_increment
        primary key,
    user_id   int           not null,
    status_id int default 1 null,
    constraint orders_order_status_fk
        foreign key (status_id) references order_status (id),
    constraint orders_users_id_fk
        foreign key (user_id) references users (id)
);

create table product_in_order
(
    product_id int not null,
    order_id   int not null,
    quantity   int not null,
    primary key (order_id, product_id),
    constraint FK_product_in_order_orders
        foreign key (order_id) references orders (id),
    constraint FK_product_in_order_products
        foreign key (product_id) references products (id)
);


