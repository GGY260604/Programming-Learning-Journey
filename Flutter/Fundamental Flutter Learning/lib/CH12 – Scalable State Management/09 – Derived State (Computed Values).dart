/*
CH12 - 09
Derived State (Computed Values)

GOAL:
- Learn what "derived state" means
- Avoid storing duplicate values
- Compute values from the source of truth

IMPORTANT:
Bad: store total AND store item list (risk mismatch)
Good: store list (source of truth) and compute total when needed

Mental Model:
Single source of truth.
Everything else should be derived.
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

/*
A simple cart state.

Source of truth:
- list of item prices

Derived:
- total price (computed, not stored)
- item count (computed, not stored)
*/
class CartModel extends ChangeNotifier {
  final List<int> _prices = [];

  List<int> get prices => List.unmodifiable(_prices);

  int get itemCount => _prices.length; // derived
  int get total => _prices.fold(0, (sum, p) => sum + p); // derived

  void addItem(int price) {
    _prices.add(price);
    notifyListeners();
  }

  void clear() {
    _prices.clear();
    notifyListeners();
  }
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (_) => CartModel(),
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: DerivedStateDemoPage(),
      ),
    );
  }
}

class DerivedStateDemoPage extends StatelessWidget {
  const DerivedStateDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("DerivedStateDemoPage rebuild");

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/09 – Derived State')),
      body: const Center(child: CartCard()),
    );
  }
}

class CartCard extends StatelessWidget {
  const CartCard({super.key});

  @override
  Widget build(BuildContext context) {
    return Card(
      child: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            /*
            UI reads derived values.
            We don't store total or itemCount manually.
            */
            Consumer<CartModel>(
              builder: (context, cart, child) {
                return Column(
                  children: [
                    Text(
                      'Items: ${cart.itemCount}',
                      style: const TextStyle(fontSize: 16),
                    ),
                    const SizedBox(height: 6),
                    Text(
                      'Total: RM ${cart.total}',
                      style: const TextStyle(
                        fontSize: 22,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ],
                );
              },
            ),

            const SizedBox(height: 20),

            Row(
              mainAxisSize: MainAxisSize.min,
              children: [
                ElevatedButton(
                  onPressed: () => context.read<CartModel>().addItem(5),
                  child: const Text('Add RM5'),
                ),
                const SizedBox(width: 10),
                ElevatedButton(
                  onPressed: () => context.read<CartModel>().addItem(12),
                  child: const Text('Add RM12'),
                ),
              ],
            ),

            const SizedBox(height: 10),

            ElevatedButton(
              onPressed: () => context.read<CartModel>().clear(),
              child: const Text('Clear'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------
Key Takeaways
------------------------------------------

1) Store only the source of truth.
2) Derive totals/counts via getters.
3) Less bugs: no risk of "total doesn't match list".

Next:
Async state with Provider (Loading / Success / Error) in a clean model.
*/
