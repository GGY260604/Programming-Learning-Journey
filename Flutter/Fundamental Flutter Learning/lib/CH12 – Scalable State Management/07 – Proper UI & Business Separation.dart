/*
CH12 - 07
Proper UI & Business Separation

GOAL:
- Separate business logic from UI
- Keep widgets "dumb"
- Move mutation logic fully into model

IMPORTANT:

Bad Pattern:
Button → modifies state directly in UI

Better Pattern:
Button → calls model method
Model → handles logic
Model → notifyListeners()

Mental Model:
UI triggers intent.
Model performs logic.
UI reacts to state.
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

/*
Business Logic Layer
*/
class CounterModel extends ChangeNotifier {
  int _count = 0;

  int get count => _count;

  void increment() {
    debugPrint("Business Logic: increment()");
    _count++;
    notifyListeners();
  }

  void reset() {
    debugPrint("Business Logic: reset()");
    _count = 0;
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
        home: SeparationDemoPage(),
      ),
    );
  }
}

class SeparationDemoPage extends StatelessWidget {
  const SeparationDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("SeparationDemoPage rebuild");

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/07 – Separation')),
      body: const Center(
        child: CounterCard(),
      ),
    );
  }
}

/*
Pure UI Widget
- No state mutation logic inside
- Just triggers model methods
*/
class CounterCard extends StatelessWidget {
  const CounterCard({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("CounterCard rebuild");

    return Consumer<CounterModel>(
      builder: (context, model, child) {
        debugPrint("Consumer rebuild");

        return Card(
          child: Padding(
            padding: const EdgeInsets.all(20),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Text(
                  'count = ${model.count}',
                  style: const TextStyle(
                      fontSize: 22, fontWeight: FontWeight.bold),
                ),
                const SizedBox(height: 20),

                ElevatedButton(
                  onPressed: model.increment,
                  child: const Text('Increment'),
                ),

                const SizedBox(height: 10),

                ElevatedButton(
                  onPressed: model.reset,
                  child: const Text('Reset'),
                ),
              ],
            ),
          ),
        );
      },
    );
  }
}

/*
------------------------------------------
Architecture Improvement:

Before:
State + logic mixed inside StatefulWidget.

Now:
- Model owns state
- Model owns logic
- UI is reactive only

This scales.
This is testable.
This is maintainable.

Next:
We scale to multiple providers.
*/
