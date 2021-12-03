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
