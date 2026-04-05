# 🧪 Dart Testing – Complete Guide

---

# 1️⃣ What Is Testing?

Testing is the practice of writing code that verifies other code.

Instead of manually running your app and clicking buttons,
you write automated checks that confirm your logic behaves correctly.

Testing helps you:

- Prevent regressions
- Refactor safely
- Verify business rules
- Increase confidence
- Improve architecture

---

# 2️⃣ Types of Testing in Dart & Flutter

## 🔹 Unit Test (Pure Dart)
- Tests business logic
- No UI
- No Flutter widgets
- Fastest
- Most important

## 🔹 Widget Test (Flutter)
- Tests UI behavior
- Simulates taps
- Verifies UI changes

## 🔹 Integration Test
- Full app simulation
- Slowest
- Tests real flows

In this file, we focus on **Dart unit testing**.

---

# 3️⃣ Setting Up Dart Testing

In `pubspec.yaml`:

```yaml
dev_dependencies:
  test: ^1.24.0
```

Then run:

```
dart pub get
```

Create a `test/` folder in your project.

Example structure:

```
lib/
  calculator.dart
test/
  calculator_test.dart
```

---

# 4️⃣ Basic Test Structure

Example logic:

```dart
// lib/calculator.dart
class Calculator {
  int add(int a, int b) => a + b;
}
```

Now test it:

```dart
// test/calculator_test.dart
import 'package:test/test.dart';
import '../lib/calculator.dart';

void main() {
  test('adds two numbers correctly', () {
    final calculator = Calculator();

    expect(calculator.add(2, 3), 5);
  });
}
```

Run test:

```
dart test
```

---

# 5️⃣ Understanding `test()` and `expect()`

## 🔹 test()

Defines a single test case.

```dart
test('description', () {
  // test logic
});
```

The description explains what behavior is expected.

---

## 🔹 expect()

Verifies output.

```dart
expect(actualValue, matcher);
```

Example:

```dart
expect(5, equals(5));
expect(true, isTrue);
expect(list, contains(3));
```

---

# 6️⃣ Common Matchers

| Matcher | Meaning |
|----------|----------|
| equals(x) | Exactly equal |
| isTrue | Value is true |
| isFalse | Value is false |
| isNull | Value is null |
| isNotNull | Value is not null |
| contains(x) | List/String contains |
| throwsException | Expect exception |

Example:

```dart
expect(() => calculator.divide(4, 0), throwsException);
```

---

# 7️⃣ Grouping Tests

You can group related tests:

```dart
group('Calculator Tests', () {

  test('addition', () {
    expect(Calculator().add(2, 3), 5);
  });

  test('subtraction', () {
    expect(Calculator().subtract(5, 3), 2);
  });

});
```

---

# 8️⃣ setUp() and tearDown()

Used for shared initialization.

```dart
late Calculator calculator;

setUp(() {
  calculator = Calculator();
});

tearDown(() {
  // cleanup
});
```

This runs before each test.

---

# 9️⃣ Testing Exceptions

```dart
class Divider {
  double divide(double a, double b) {
    if (b == 0) throw Exception("Cannot divide by zero");
    return a / b;
  }
}
```

Test:

```dart
test('throws when dividing by zero', () {
  final divider = Divider();

  expect(() => divider.divide(4, 0), throwsException);
});
```

---

# 🔟 Testing Asynchronous Code

## Future Example

```dart
Future<int> fetchValue() async {
  await Future.delayed(Duration(milliseconds: 100));
  return 42;
}
```

Test:

```dart
test('fetchValue returns 42', () async {
  final result = await fetchValue();
  expect(result, 42);
});
```

Important:
Mark test function as `async`.

---

# 1️⃣1️⃣ Testing Streams

```dart
Stream<int> countStream() async* {
  yield 1;
  yield 2;
  yield 3;
}
```

Test:

```dart
test('stream emits values', () async {
  expect(
    countStream(),
    emitsInOrder([1, 2, 3]),
  );
});
```

---

# 1️⃣2️⃣ Testing State Logic (Example)

Example state class:

```dart
class CounterModel {
  int count = 0;

  void increment() => count++;
}
```

Test:

```dart
test('counter increments', () {
  final model = CounterModel();

  model.increment();

  expect(model.count, 1);
});
```

---

# 1️⃣3️⃣ What NOT to Test

Avoid testing:

- Flutter framework behavior
- UI layout rendering details
- setState functionality
- Built-in Dart behavior

Good tests verify:
- Your business logic
- Your state transitions
- Your validation rules

---

# 1️⃣4️⃣ Good Testing Principles

✅ Small tests  
✅ Independent tests  
✅ Deterministic results  
✅ Clear descriptions  

❌ Tests that depend on execution order  
❌ Tests that depend on real network  
❌ Tests with randomness  

---

# 1️⃣5️⃣ Engineering Mindset

Testing forces you to:

- Separate logic from UI
- Write smaller functions
- Avoid hidden side effects
- Design cleaner architecture

Good code is testable code.

---

# 1️⃣6️⃣ Test-Driven Development (TDD)

TDD cycle:

1. Write failing test
2. Write minimal code to pass
3. Refactor
4. Repeat

This leads to clean architecture naturally.

---

# 🎯 Final Summary

Dart Testing Core Concepts:

- test()
- expect()
- matchers
- async testing
- stream testing
- grouping
- setup/teardown

Testing is not about extra work.

It is about:
- Safety
- Confidence
- Professional engineering

---

# 🚀 Next Step

After mastering Dart unit tests:

- Learn Flutter Widget Testing
- Learn Mocking
- Learn Dependency Injection
- Learn Integration Testing

That’s how production-grade apps are built.