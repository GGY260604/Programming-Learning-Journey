# CH23 - Relationships and Join Queries

This chapter teaches how to work with related tables in MySQL using PHP and PDO.

The previous chapters focused on one table at a time. In real backend systems, data is usually separated into multiple tables. For example, one course can have many students, and one customer can have many orders.

## Files in This Chapter

| File | Main Concept | Description |
|---|---|---|
| 01 - Create Related Tables.sql | Database setup | Creates sample tables for relationship and join examples. |
| 02 - One to Many Relationship.php | One-to-many relationship | Shows how one record in a parent table can be linked to many records in a child table. |
| 03 - INNER JOIN Display.php | INNER JOIN | Displays records only when matching data exists in both tables. |
| 04 - LEFT JOIN Display.php | LEFT JOIN | Displays all records from the left table, even when no matching record exists in the right table. |
| 05 - COUNT with GROUP BY.php | Aggregation with relationship | Counts how many child records belong to each parent record. |
| 06 - Order with Customer Example.php | Practical join example | Shows a customer-order relationship similar to real backend systems. |

## How to Run

1. Start Apache and MySQL in XAMPP.
2. Open phpMyAdmin.
3. Create or select the database named `php_note_db`.
4. Run the SQL code from `01 - Create Related Tables.sql`.
5. Open the PHP files through `localhost`.

Example path:

```text
http://localhost/PHP/CH23%20-%20Relationships%20and%20Join%20Queries/03%20-%20INNER%20JOIN%20Display.php
```

## Tables Used

This chapter uses these sample tables:

| Table | Purpose |
|---|---|
| `ch23_courses` | Stores course information. |
| `ch23_students` | Stores student information and links each student to a course. |
| `ch23_customers` | Stores customer information. |
| `ch23_orders` | Stores orders and links each order to a customer. |
| `ch23_order_items` | Stores products inside each order. |

## Important Concepts

| Concept | Explanation |
|---|---|
| Primary key | A column that uniquely identifies each row in a table. |
| Foreign key | A column that links a row to another table. |
| Parent table | The main table being referenced, such as `ch23_courses`. |
| Child table | The table that stores the foreign key, such as `ch23_students`. |
| One-to-many | One row in a parent table can be related to many rows in a child table. |
| INNER JOIN | Returns only rows that have matching records in both joined tables. |
| LEFT JOIN | Returns all rows from the left table, even if the right table has no match. |
| GROUP BY | Groups rows together, usually for summary calculations such as `COUNT()`. |

## Reminder

The PHP examples in this chapter use PDO prepared statements when user input is involved.

Prepared statements are important because they help prevent SQL injection.
