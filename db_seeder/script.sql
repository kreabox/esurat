create table arsip
(
    arsipId       int auto_increment
        primary key,
    nama          varchar(100)                       not null,
    file          varchar(100)                       not null,
    keterangan    text                               not null,
    tanggalUpload datetime default CURRENT_TIMESTAMP not null,
    userId        int                                not null,
    suratId       int                                not null
)
    charset = latin1;

create table disposisi
(
    disposisiId    int auto_increment
        primary key,
    id_surat_masuk int  not null,
    userId_dari    int  not null,
    userId_kepada  int  not null,
    tanggal        date not null,
    memo           text not null
)
    charset = latin1;

create table log_activity
(
    logId      int auto_increment
        primary key,
    activity   text                               null,
    controller text                               null,
    model      text                               null,
    datetime   datetime default CURRENT_TIMESTAMP not null
);

create table penandatangan
(
    penandatanganId  int auto_increment
        primary key,
    nama             varchar(50)  null,
    jabatan          varchar(50)  null,
    pangkat_golongan varchar(150) null,
    nip              varchar(50)  null
);

create table settings
(
    id      int auto_increment
        primary key,
    nama    varchar(100) not null,
    alamat  varchar(160) not null,
    email   varchar(100) null,
    telepon varchar(100) null,
    logo    varchar(100) not null,
    favicon varchar(100) not null
)
    charset = latin1;

create table surat_keluar
(
    suratkeluarId   int auto_increment
        primary key,
    nomor           varchar(100)                          not null,
    kepada          varchar(100)                          not null,
    cq              varchar(100)                          null,
    penandatanganId int                                   not null,
    alamat          varchar(100)                          not null,
    perihal         varchar(100)                          not null,
    tanggal         varchar(160)                          not null,
    keterangan      text                                  null,
    userId          int                                   not null,
    templateId      int                                   null,
    sifat           varchar(50) default 'PENTING'         not null,
    createAt        datetime    default CURRENT_TIMESTAMP not null
)
    charset = latin1;

create table surat_masuk
(
    suratmasukId int auto_increment
        primary key,
    nomor        varchar(100)                                         not null,
    pengirim     varchar(100)                                         not null,
    perihal      varchar(100)                                         not null,
    tanggal      varchar(150)                                         not null,
    file         varchar(100)                                         not null,
    keterangan   text                                                 not null,
    createAt     datetime                   default CURRENT_TIMESTAMP not null,
    userId       int                                                  not null,
    status       enum ('SAVED', 'ARCHIVED') default 'SAVED'           not null
)
    charset = latin1;

create table template
(
    templateId    int auto_increment
        primary key,
    nama_template varchar(100)                       not null,
    file_template varchar(100)                       not null,
    keterangan    text                               not null,
    tanggalUpload datetime default CURRENT_TIMESTAMP not null,
    userId        int                                not null
)
    charset = latin1;

create table users
(
    id           int auto_increment
        primary key,
    username     varchar(100) not null,
    nama_lengkap varchar(100) not null,
    jabatan      varchar(100) null,
    password     text         not null,
    email        varchar(150) null,
    role         varchar(50)  not null,
    constraint users_username
        unique (username)
)
    charset = latin1;


