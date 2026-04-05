/*
CH12 - 11
Common Provider Mistakes

GOAL:
- Identify common architectural mistakes
- Understand WHY they are wrong
- Build discipline

IMPORTANT:
Most Provider problems are misuse problems,
not framework problems.
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

class CounterModel extends ChangeNotifier {
  int _count = 0;
  int get count => _count;

  void increment() {
    _count++;
    notifyListeners();
  }
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (_) => CounterModel(),
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: MistakeDemoPage(),
      ),
    );
  }
}

class MistakeDemoPage extends StatelessWidget {
  const MistakeDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("MistakeDemoPage rebuild");

    /*
    ❌ MISTAKE 1:
    Using watch() inside event handler.
    This would cause rebuild confusion.

    Wrong:
    onPressed: () {
      context.watch<CounterModel>().increment();
    }

    Correct:
    Use read() for events.
    */

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/11 – Mistakes')),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            /*
            Correct usage: watch in build
            */
            Consumer<CounterModel>(
              builder: (context, model, child) {
                return Text(
                  'Count = ${model.count}',
                  style: const TextStyle(
                      fontSize: 22, fontWeight: FontWeight.bold),
                );
              },
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                // ✅ Correct: use read() for mutation
                context.read<CounterModel>().increment();
              },
              child: const Text('Increment'),
            ),

            const SizedBox(height: 30),

            const Text(
              'Other Common Mistakes:\n\n'
              '1) Creating provider inside build() repeatedly\n'
              '2) Calling notifyListeners() inside build()\n'
              '3) Listening too high in the widget tree\n'
              '4) Storing duplicate derived state\n'
              '5) Mixing UI logic inside model\n',
              textAlign: TextAlign.left,
              style: TextStyle(fontSize: 13),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------
Discipline Summary
------------------------------------------

watch() → for UI dependency
read()  → for events

Never:
- create providers inside build unnecessarily
- mutate state inside build
- call notifyListeners() during build

Next:
Final file → When NOT to Use Provider.
Architectural maturity.
*/
