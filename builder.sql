SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
                              `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                              `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `parent_id` bigint unsigned DEFAULT NULL,
                              PRIMARY KEY (`id`),
                              KEY `categories_parent_id_foreign` (`parent_id`),
                              CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
                                                         (1,	'one',	NULL),
                                                         (2,	'two',	1),
                                                         (3,	'three',	NULL),
                                                         (4,	'four',	NULL),
                                                         (5,	'five',	1);

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE `category_product` (
                                    `product_id` bigint unsigned NOT NULL,
                                    `category_id` bigint unsigned NOT NULL,
                                    KEY `category_product_product_id_foreign` (`product_id`),
                                    KEY `category_product_category_id_foreign` (`category_id`),
                                    CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
                                    CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- 1
select c.name from categories c
inner join category_product cp on cp.category_id = c.id
inner join products  p on p.id = cp.product_id
where p.id in(2);

-- 2
select p.id, p.name from products p
inner join category_product cp on cp.product_id = p.id
where cp.category_id in (2,3);


-- 3

select name, count(cp.product_id) product_count from categories c
inner join (select distinct * from category_product) cp on cp.category_id = c.id
where c.id in (3)
group by name;

-- 4

select name, count(cp.product_id) product_count from categories c
inner join category_product cp on cp.category_id = c.id
where c.id in (2,3)
group by c.id
