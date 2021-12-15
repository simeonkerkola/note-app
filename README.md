# note-app

PHP Note App

## Database
name: `noteapp`

**Table: notes**
| #   | Name        | Type          | Collation          | Extra          |
| --- | ----------- | ------------- | ------------------ | -------------- |
| 1   | id          | int(11)       |                    | AUTO_INCREMENT |
| 2   | title       | varchar(255)  | utf8mb4_unicode_ci |                |
| 3   | description | varchar(1024) | utf8mb4_unicode_ci |                |
| 4   | create_date | datetime      |                    |                |


### Setup `notes` table
```sql
START TRANSACTION;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
```
