CREATE TABLE `posts` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `post_title` VARCHAR(100) NULL,
    `post_excerpt` VARCHAR(150) NULL,
    `post_status` VARCHAR(15) NOT NULL DEFAULT 'awaiting_review',
    `post_link` VARCHAR(100) NOT NULL,
    `post_comment_status` VARCHAR(15) NOT NULL DEFAULT 'open',
    `post_password` VARCHAR(1024) NULL,
    `post_type` VARCHAR(50) NOT NULL DEFAULT 'post',
    `post_comment_count` INT NULL DEFAULT '0',
    `post_content` LONGTEXT NULL,
    `post_featured_image` VARCHAR(100) NOT NULL DEFAULT '../assets/images/ictslides_logo.jpg',
    `post_keywords` VARCHAR(100) NULL DEFAULT '',
    `post_tags` VARCHAR(100) NULL DEFAULT '',
    `post_author_name` VARCHAR(100) NULL DEFAULT '',
    `post_published_at` DATETIME NULL,
    `post_created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `post_modified_at` DATETIME NULL,
    `post_deleted_at` DATETIME NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB