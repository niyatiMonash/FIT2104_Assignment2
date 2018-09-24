create table authenticate
(
  id          int auto_increment
    primary key,
  given_name  varchar(50) not null,
  family_name varchar(50) not null,
  uname       varchar(10) not null,
  pword       varchar(64) not null
);

create table client
(
  client_id          int auto_increment
    primary key,
  client_lname       varchar(50)  not null,
  client_fname       varchar(50)  not null,
  client_street      varchar(100) null,
  client_suburb      varchar(50)  null,
  client_state       varchar(6)   null,
  client_pc          varchar(4)   null,
  client_email       varchar(50)  null,
  client_mobile      varchar(12)  null,
  client_mailinglist char         null
);

create table feature
(
  feature_id   int auto_increment
    primary key,
  feature_name varchar(30) not null
);

create table type
(
  type_id   int auto_increment
    primary key,
  type_name varchar(30) not null
);

create table property
(
  property_id     int auto_increment
    primary key,
  property_street varchar(100)   not null,
  property_suburb varchar(50)    not null,
  property_state  varchar(5)     not null,
  property_pc     decimal        not null,
  property_type   int            not null,
  seller_id       decimal        not null,
  listing_date    date           not null,
  listing_price   decimal(10, 2) not null,
  sale_date       date           null,
  sale_price      decimal(10, 2) null,
  image_name      varchar(40)    null,
  property_desc   varchar(200)   null,
  constraint propertyType
  foreign key (property_type) references type (type_id)
);

create index propertyType
  on property (property_type);

create table property_feature
(
  property_id  int          not null,
  feature_id   int          not null,
  feature_desc varchar(100) null,
  primary key (property_id, feature_id),
  constraint property_propertyId
  foreign key (property_id) references property (property_id),
  constraint property_featureId
  foreign key (feature_id) references feature (feature_id)
);

create index property_featureId
  on property_feature (feature_id);


