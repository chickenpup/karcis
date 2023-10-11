TRUNCATE TABLE booking;
ALTER TABLE booking MODIFY COLUMN id CHAR(36) NOT NULL;

CREATE TABLE `log` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_user` INT NOT NULL,
  `activity` ENUM('Login', 'Logout', 'Create', 'Update', 'Delete') NOT NULL,
  `description` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
