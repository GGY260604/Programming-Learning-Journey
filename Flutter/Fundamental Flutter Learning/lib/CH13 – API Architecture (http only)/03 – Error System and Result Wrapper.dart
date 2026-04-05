/*
CH13 - 03
Error System and Result Wrapper

GOAL:
- Design a clean error system
- Avoid throwing raw Exception everywhere
- Standardize API result handling

IMPORTANT:

Bad pattern:
throw Exception("Something went wrong");

Better pattern:
- Define specific exception types
- Map low-level errors to meaningful app errors
- Return a Result wrapper (Success / Failure)

Mental Model:
Service throws technical exceptions.
Repository maps them to domain failures.
UI receives structured result.
*/

import 'package:flutter/material.dart';
import 'dart:async';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ErrorSystemDemoPage(),
    ),
  );
}

/* -------------------------
   Result Wrapper
--------------------------*/

class Result<T> {
  final T? data;
  final String? error;

  const Result.success(this.data) : error = null;
  const Result.failure(this.error) : data = null;

  bool get isSuccess => data != null;
}

/* -------------------------
   Custom Exceptions
--------------------------*/

class NetworkException implements Exception {}

class ServerException implements Exception {
  final int statusCode;
  ServerException(this.statusCode);
}

class ParseException implements Exception {}

/* -------------------------
   Simulated Service Layer
--------------------------*/

class FakeService {
  Future<String> fetchData() async {
    await Future.delayed(const Duration(seconds: 1));

    final second = DateTime.now().second;

    if (second % 5 == 0) {
      throw NetworkException();
    }

    if (second % 7 == 0) {
      throw ServerException(500);
    }

    if (second % 9 == 0) {
      throw ParseException();
    }

    return "Raw Service Data";
  }
}

/* -------------------------
   Repository Layer
--------------------------*/

class DataRepository {
  final FakeService service;

  DataRepository(this.service);

  Future<Result<String>> getData() async {
    try {
      final raw = await service.fetchData();
      return Result.success(raw);
    } on NetworkException {
      return const Result.failure("No Internet Connection");
    } on ServerException catch (e) {
      return Result.failure("Server Error: ${e.statusCode}");
    } on ParseException {
      return const Result.failure("Invalid Response Format");
    } catch (_) {
      return const Result.failure("Unknown Error");
    }
  }
}

/* -------------------------
   UI
--------------------------*/

class ErrorSystemDemoPage extends StatefulWidget {
  const ErrorSystemDemoPage({super.key});

  @override
  State<ErrorSystemDemoPage> createState() => _ErrorSystemDemoPageState();
}

class _ErrorSystemDemoPageState extends State<ErrorSystemDemoPage> {
  final repo = DataRepository(FakeService());

  String status = "Idle";
  String? message;

  Future<void> load() async {
    setState(() {
      status = "Loading...";
      message = null;
    });

    debugPrint("UI: calling repository");

    final result = await repo.getData();

    setState(() {
      if (result.isSuccess) {
        status = "Success ✅";
        message = result.data;
      } else {
        status = "Error ❌";
        message = result.error;
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH13/03 – Error System')),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              "Error System Pattern:",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),
            const Text(
              "Service throws typed exceptions.\n"
              "Repository maps to readable errors.\n"
              "UI receives structured Result.\n",
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
                    if (message != null) Text("Message: $message"),
                    const SizedBox(height: 12),
                    ElevatedButton(
                      onPressed: load,
                      child: const Text("Load Data"),
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
Architecture Insight:

Without Result:
- UI must try/catch
- Error logic spreads everywhere

With Result:
- Repository standardizes failure mapping
- UI stays simple
- Error messages are controlled centrally

Next:
DTO vs Domain Model and JSON parsing discipline.
*/
