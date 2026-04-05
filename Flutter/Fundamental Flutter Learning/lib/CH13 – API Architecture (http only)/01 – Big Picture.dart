/*
CH13 - 01
Big Picture: UI → Model → Repo → Service (Data Flow)

GOAL:
- See the clean API architecture layers
- Understand who does what (responsibility boundaries)
- Simulate a real fetch flow WITHOUT any HTTP yet

IMPORTANT:
UI should NOT talk to HTTP directly.

Correct data flow:
UI (Widgets)
  ↓ triggers intent
Model (ChangeNotifier / state holder)
  ↓ calls
Repository (app-facing data API)
  ↓ calls
Service (raw networking / data source)
  ↓ returns data/errors upward

Mental Model:
- UI is reactive (display only)
- Model controls state (loading/data/error)
- Repository defines "what app needs"
- Service defines "how to talk to network"
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ApiArchitectureMapPage(),
    ),
  );
}

class ApiArchitectureMapPage extends StatefulWidget {
  const ApiArchitectureMapPage({super.key});

  @override
  State<ApiArchitectureMapPage> createState() => _ApiArchitectureMapPageState();
}

/*
For CH13-01 we keep it simple:
- We simulate the "Model" using setState.
- Later we will use Provider/ChangeNotifier properly.

The goal NOW is to understand the layer boundaries.
*/
class _ApiArchitectureMapPageState extends State<ApiArchitectureMapPage> {
  String status = "Idle";
  String? data;
  String? error;

  // Create the chain: Repo -> Service
  late final UserRepository repo = UserRepository(UserService());

  Future<void> loadUser() async {
    setState(() {
      status = "Loading...";
      data = null;
      error = null;
    });

    debugPrint("UI: user taps 'Load User'");
    debugPrint("UI -> Repository (via Model in real apps)");

    try {
      final user = await repo.fetchUser();
      setState(() {
        status = "Success ✅";
        data = "User(name: ${user.name}, age: ${user.age})";
      });
    } catch (e) {
      setState(() {
        status = "Error ❌";
        error = e.toString();
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH13/01 – API Architecture Map')),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              'Layer Map (Clean Flow)',
              style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),
            const Text(
              'UI → Model → Repository → Service → (HTTP)\n'
              'UI never touches HTTP.\n'
              'Repository is what the app needs.\n'
              'Service is how networking is done.',
              style: TextStyle(fontSize: 13, height: 1.35),
            ),
            const SizedBox(height: 20),

            Card(
              child: Padding(
                padding: const EdgeInsets.all(16),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      "Status: $status",
                      style: const TextStyle(
                        fontSize: 16,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    const SizedBox(height: 8),
                    if (data != null) Text("Data: $data"),
                    if (error != null)
                      Text(
                        "Error: $error",
                        style: const TextStyle(color: Colors.red),
                      ),
                    const SizedBox(height: 12),
                    ElevatedButton(
                      onPressed: loadUser,
                      child: const Text("Load User (Simulated)"),
                    ),
                  ],
                ),
              ),
            ),

            const SizedBox(height: 20),
            const Divider(),
            const SizedBox(height: 12),

            const Text(
              'Key Responsibility Rules',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),
            const Text(
              '1) UI: render + trigger actions\n'
              '2) Model: store loading/data/error\n'
              '3) Repository: app-level methods (fetchUser, searchUsers)\n'
              '4) Service: raw network calls (GET/POST, headers, status)\n',
              style: TextStyle(fontSize: 13, height: 1.35),
            ),
          ],
        ),
      ),
    );
  }
}

/* ---------------------------
   Domain Model (App Meaning)
----------------------------*/
class User {
  final String name;
  final int age;

  User({required this.name, required this.age});
}

/* ---------------------------
   Repository (App-Facing API)
----------------------------*/
class UserRepository {
  final UserService service;

  UserRepository(this.service);

  Future<User> fetchUser() async {
    debugPrint("Repository: fetchUser()");
    final dto = await service.getUserDto(); // raw data shape
    return User(name: dto.name, age: dto.age); // mapping to domain model
  }
}

/* ---------------------------
   DTO (Network/Data Shape)
----------------------------*/
class UserDto {
  final String name;
  final int age;

  UserDto({required this.name, required this.age});
}

/* ---------------------------
   Service (Networking Layer)
----------------------------*/
class UserService {
  Future<UserDto> getUserDto() async {
    debugPrint("Service: getUserDto() (simulating network)");
    await Future.delayed(const Duration(seconds: 1));

    // Simulate occasional failure:
    if (DateTime.now().second % 5 == 0) {
      throw Exception("Service failure: simulated network error");
    }

    return UserDto(name: "Galen", age: 22);
  }
}

/*
Mental Model Summary:
- UI should stay clean.
- Network details belong in Service.
- App meaning belongs in Domain Model.
- Repository connects them and hides networking complexity.
*/
