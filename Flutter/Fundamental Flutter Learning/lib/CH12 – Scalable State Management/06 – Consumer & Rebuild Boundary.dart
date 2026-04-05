/*
CH12 - 06
Consumer & Rebuild Boundary

GOAL:
- Learn how to control rebuild scope precisely
- Understand why Consumer exists
- Reduce unnecessary rebuilds

IMPORTANT:

context.watch()
→ Rebuilds the entire widget where it is used.

Consumer<T>
→ Rebuilds ONLY its builder section.

Mental Model:
Place listening logic as LOW as possible
to minimize rebuild area.
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
        home: ConsumerDemoPage(),
      ),
    );
  }
}

class ConsumerDemoPage extends StatelessWidget {
  const ConsumerDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("ConsumerDemoPage rebuild");

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/06 – Consumer')),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            const Text(
              'This Text never rebuilds',
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 20),

            /*
            Only this Consumer rebuilds.
            */
            Consumer<CounterModel>(
              builder: (context, model, child) {
                debugPrint("Consumer builder rebuild");

                return Text(
                  'Count = ${model.count}',
                  style: const TextStyle(
                    fontSize: 22,
                    fontWeight: FontWeight.bold,
                  ),
                );
              },
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                context.read<CounterModel>().increment();
              },
              child: const Text('Increment'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------
Observe Console:

Press button →
Only Consumer builder prints rebuild.
Page itself does NOT rebuild.

Key Principle:
Move listening logic downward.
Keep rebuild zones small.

Next:
We separate UI and business logic more cleanly.
*/
