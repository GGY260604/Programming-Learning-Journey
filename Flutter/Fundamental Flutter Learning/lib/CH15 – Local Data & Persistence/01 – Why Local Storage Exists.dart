/*
CH15 - 01
Why Local Storage Exists

GOAL:
- Understand difference between memory state and persistent state
- Realize why apps must store data locally

CORE IDEA:

There are two types of state:

1️⃣ Memory State (RAM)
   - Lives while app is running
   - Lost when app closes

2️⃣ Persistent State (Disk)
   - Stored on device
   - Survives app restart

This file demonstrates MEMORY state only.
When you restart the app, the counter resets.

Next file:
We will introduce SharedPreferences
to persist data on disk.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: LocalStorageConceptPage(),
    ),
  );
}

class LocalStorageConceptPage extends StatefulWidget {
  const LocalStorageConceptPage({super.key});

  @override
  State<LocalStorageConceptPage> createState() =>
      _LocalStorageConceptPageState();
}

class _LocalStorageConceptPageState extends State<LocalStorageConceptPage> {
  int counter = 0;

  /*
  This counter is stored only in memory.

  When:
  - App closes
  - Hot restart
  - Process killed

  → Value is lost.
  */

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("CH15/01 – Memory vs Persistent State")),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            Text(
              "Counter: $counter",
              style: const TextStyle(fontSize: 28, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: () {
                setState(() {
                  counter++;
                });
                debugPrint("Counter incremented: $counter");
              },
              child: const Text("Increase"),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Mental Upgrade:

Without persistence:
- Login state disappears
- Settings reset
- Theme preference lost
- Cached data gone

Persistent storage solves this.

We move from RAM → Disk in next file.
*/
