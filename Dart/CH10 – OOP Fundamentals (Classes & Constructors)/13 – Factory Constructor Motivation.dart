/*
-------------------------------------
       OOP - Factory Constructor
-------------------------------------

This file explains WHY factory exists.
*/

class Logger {
  static final Map<String, Logger> _cache = {};

  final String name;

  /*
  Factory constructor:
  - may return existing objects
  - may control creation
  */

  factory Logger(String name) {
    // Return cached instance if exists; cache[name] = Logger._internal(name)
    return _cache.putIfAbsent(name, () => Logger._internal(name));
  }

  // Private named constructor
  Logger._internal(this.name);

  void log(String msg) {
    print("[$name] $msg");
  }
}

void main() {
  var a = Logger("App");
  var b = Logger("App");

  print(identical(a, b)); // true
}

/*
Factory solves:
- caching
- singletons
- controlled creation
*/
