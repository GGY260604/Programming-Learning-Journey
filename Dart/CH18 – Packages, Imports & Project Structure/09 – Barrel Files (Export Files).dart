/*
-------------------------------------
       Barrel Files (export)
-------------------------------------

A barrel file is a Dart file that uses `export`
to re-export multiple files.

Purpose:
- Cleaner imports
- Centralized public API
- Easier refactoring

-------------------------------------
Example Project Structure
-------------------------------------

lib/
├── models/
│   ├── user.dart
│   ├── order.dart
│   └── models.dart   ← BARREL FILE
├── services/
│   └── user_service.dart
└── main.dart


-------------------------------------
lib/models/user.dart
-------------------------------------

class User {
  final String name;

  User(this.name);
}


-------------------------------------
lib/models/order.dart
-------------------------------------

class Order {
  final int id;

  Order(this.id);
}


-------------------------------------
lib/models/models.dart   (BARREL FILE)
-------------------------------------

export 'user.dart';
export 'order.dart';


-------------------------------------
WITHOUT barrel file (bad / verbose)
-------------------------------------

import 'package:my_app/models/user.dart';
import 'package:my_app/models/order.dart';


-------------------------------------
WITH barrel file (clean / recommended)
-------------------------------------

import 'package:my_app/models/models.dart';


-------------------------------------
lib/main.dart
-------------------------------------

import 'package:my_app/models/models.dart';

void main() {
  final user = User('Galen');
  final order = Order(101);

  print(user.name);
  print(order.id);
}


-------------------------------------
Key Rules
-------------------------------------
- Barrel files ONLY use `export`
- Do NOT put logic inside barrel files
- One folder usually has one barrel file
- Barrel files define the public API
*/
void main() {}
