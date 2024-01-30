CREATE TABLE `users` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `usertype_id` BIGINT(20) UNSIGNED DEFAULT NULL,
  `person_id` BIGINT(20) UNSIGNED DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE `usertypes` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE `people` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `firstname` VARCHAR(200) NOT NULL,
  `lastname` VARCHAR(200) DEFAULT NULL,
  `dni` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(255) DEFAULT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  `birthday` DATE DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL
);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_usertype_id_foreign` (`usertype_id`),
  ADD KEY `users_person_id_foreign` (`person_id`);

ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

ALTER TABLE `usertypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;

ALTER TABLE `users`
  ADD CONSTRAINT `users_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `users_usertype_id_foreign` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`id`);
