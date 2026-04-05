/*
CH13 - 04
DTO vs Domain Model and JSON Mapping

GOAL:
- Understand DTO vs Domain Model
- Learn where JSON parsing should happen
- Learn mapping discipline (network shape ≠ app meaning)

IMPORTANT:
DTO (Data Transfer Object):
- Mirrors API JSON shape
- May contain fields you don't care about
- May have nulls / messy types

Domain Model:
- What your app actually uses
- Clean, predictable, safe types
- No "API noise"

Mental Model:
Service: receives JSON (Map)
DTO: parses raw JSON shape
Repository: maps DTO → Domain
UI: uses Domain only
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: DtoMappingDemoPage(),
    ),
  );
}

/* -------------------------
   Domain Model (App Meaning)
--------------------------*/

class User {
  final int id;
  final String name;
  final String email; // app wants non-null email

  User({required this.id, required this.name, required this.email});
}

/* -------------------------
   DTO (Network Shape)
--------------------------*/

class UserDto {
  final int? id;
  final String? name;
  final String? email;
  final String? unusedApiField; // API can have extra fields

  UserDto({
    required this.id,
    required this.name,
    required this.email,
    required this.unusedApiField,
  });

  factory UserDto.fromJson(Map<String, dynamic> json) {
    return UserDto(
      id: json["id"] as int?,
      name: json["name"] as String?,
      email: json["email"] as String?,
      unusedApiField: json["unused_api_field"] as String?,
    );
  }
}

/* -------------------------
   Mapping DTO → Domain
--------------------------*/

User mapDtoToDomain(UserDto dto) {
  /*
  Mapping is where we enforce app rules.
  - If API gives null, we decide fallback or failure.
  - Domain model stays clean and safe.
  */

  final id = dto.id ?? -1;
  final name = dto.name ?? "Unknown";
  final email = dto.email ?? "no-email@unknown.com";

  return User(id: id, name: name, email: email);
}

/* -------------------------
   Simulated Service (returns JSON)
--------------------------*/

class FakeUserService {
  Future<Map<String, dynamic>> fetchUserJson() async {
    await Future.delayed(const Duration(seconds: 1));

    // Simulated API response shape (dirty / nullable / extra fields)
    return {
      "id": 101,
      "name": "Galen",
      "email": null, // simulate missing email
      "unused_api_field": "api_noise",
    };
  }
}

/* -------------------------
   Repository (returns Domain)
--------------------------*/

class UserRepository {
  final FakeUserService service;

  UserRepository(this.service);

  Future<User> fetchUser() async {
    final json = await service.fetchUserJson();
    final dto = UserDto.fromJson(json);
    return mapDtoToDomain(dto);
  }
}

/* -------------------------
   UI Demo
--------------------------*/

class DtoMappingDemoPage extends StatefulWidget {
  const DtoMappingDemoPage({super.key});

  @override
  State<DtoMappingDemoPage> createState() => _DtoMappingDemoPageState();
}

class _DtoMappingDemoPageState extends State<DtoMappingDemoPage> {
  final repo = UserRepository(FakeUserService());

  String status = "Idle";
  User? user;

  Future<void> load() async {
    setState(() {
      status = "Loading...";
      user = null;
    });

    debugPrint("UI: asking repository for Domain User");

    final result = await repo.fetchUser();

    setState(() {
      status = "Success ✅";
      user = result;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH13/04 – DTO vs Domain')),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text("Rule:", style: TextStyle(fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            const Text(
              "UI should not touch DTO.\n"
              "UI only uses Domain Model.\n"
              "Repository hides API messiness.\n",
              style: TextStyle(fontSize: 13),
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
                      style: const TextStyle(fontWeight: FontWeight.bold),
                    ),
                    const SizedBox(height: 8),
                    if (user != null) ...[
                      Text("id: ${user!.id}"),
                      Text("name: ${user!.name}"),
                      Text("email: ${user!.email}"),
                    ],
                    const SizedBox(height: 12),
                    ElevatedButton(
                      onPressed: load,
                      child: const Text("Load User"),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Mental Model:

DTO:
- matches API
- can be dirty
- can be nullable

Domain:
- matches your app needs
- clean, stable types

Mapping:
- is where you control the contract
- prevents API changes from breaking UI

Next:
Repository pattern in a more realistic form,
including query params + pagination + token headers.
*/
