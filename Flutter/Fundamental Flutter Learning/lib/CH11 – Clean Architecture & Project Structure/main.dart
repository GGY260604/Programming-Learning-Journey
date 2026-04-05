/*
Clean Architecture Entry Point

GOAL:
- Keep main.dart minimal
- Move UI to pages/
- Separate responsibilities
*/

import 'package:flutter/material.dart';
import 'pages/home_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: HomePage(),
    );
  }
}

/*
------------------------------------------------
🧠 IMPORTANT RULE
------------------------------------------------

main.dart should:
- Setup app
- Setup theme
- Setup routes

It should NOT:
- Contain API calls
- Contain business logic
- Contain large UI
*/
