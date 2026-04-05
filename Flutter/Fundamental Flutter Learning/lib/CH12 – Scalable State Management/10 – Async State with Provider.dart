/*
CH12 - 10
Async State with Provider

GOAL:
- Handle Loading / Success / Error inside a model
- Keep async logic OUT of UI
- Make UI purely reactive

IMPORTANT:

Async state should live in the model, not in widgets.

Model handles:
- loading flag
- data
- error
- async call
- notifyListeners()

UI only reacts to state.

Mental Model:
UI does not fetch.
UI does not try/catch.
UI observes state.
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'dart:async';

void main() {
  runApp(const MyApp());
}

/*
Async state container
*/
class DataModel extends ChangeNotifier {
  bool _isLoading = false;
  String? _data;
  String? _error;

  bool get isLoading => _isLoading;
  String? get data => _data;
  String? get error => _error;

  Future<void> fetchData() async {
    _isLoading = true;
    _error = null;
    notifyListeners(); // Notify UI of loading state

    debugPrint("Fetching data...");

    await Future.delayed(const Duration(seconds: 2));

    try {
      // Simulate random failure
      if (DateTime.now().second % 2 == 0) {
        throw Exception("Simulated failure");
      }

      _data = "Server Response OK";
    } catch (e) {
      _error = e.toString();
      _data = null;
    }

    _isLoading = false;
    notifyListeners();
  }
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (_) => DataModel(),
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: AsyncProviderPage(),
      ),
    );
  }
}

class AsyncProviderPage extends StatelessWidget {
  const AsyncProviderPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH12/10 – Async State')),
      body: const Center(child: DataCard()),
    );
  }
}

class DataCard extends StatelessWidget {
  const DataCard({super.key});

  @override
  Widget build(BuildContext context) {
    return Consumer<DataModel>(
      builder: (context, model, child) {
        if (model.isLoading) {
          return const CircularProgressIndicator();
        }

        if (model.error != null) {
          return Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(
                'Error: ${model.error}',
                style: const TextStyle(color: Colors.red),
              ),
              const SizedBox(height: 10),
              ElevatedButton(
                onPressed: () => context.read<DataModel>().fetchData(),
                child: const Text('Retry'),
              ),
            ],
          );
        }

        if (model.data != null) {
          return Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(
                model.data!,
                style: const TextStyle(
                    fontSize: 18, fontWeight: FontWeight.bold),
              ),
              const SizedBox(height: 10),
              ElevatedButton(
                onPressed: () => context.read<DataModel>().fetchData(),
                child: const Text('Refresh'),
              ),
            ],
          );
        }

        return ElevatedButton(
          onPressed: () => context.read<DataModel>().fetchData(),
          child: const Text('Fetch Data'),
        );
      },
    );
  }
}

/*
------------------------------------------
Pattern Summary:

Model owns:
- async call
- loading flag
- error state
- data state

UI owns:
- display logic only

This scales much better than:
FutureBuilder inside every page.

Next:
Common Provider Mistakes (critical for architecture discipline).
*/
