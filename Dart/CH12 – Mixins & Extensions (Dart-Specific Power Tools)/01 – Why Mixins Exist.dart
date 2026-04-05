/*
-------------------------------------
       Dart - Why Mixins Exist
-------------------------------------

Problem:
Dart does NOT support multiple inheritance.

You CANNOT do this:
class A extends B, C ❌

But sometimes, you want to:
- reuse behavior
- without forming an "is-a" relationship

Mixins solve this problem.
*/

/*
-------------------------------------
Mixin = Reusable behavior
-------------------------------------

A mixin:
- contains methods (and sometimes fields)
- is NOT a class you instantiate
- is "mixed into" another class
*/

mixin Logger {
  void log(String message) {
    print("LOG: $message");
  }
}

class Service with Logger {
  void run() {
    log("Service is running");
  }
}

void main() {
  Service s = Service();
  s.run();
  s.log("message");
}

/*
-------------------------------------
Key idea
-------------------------------------

Service IS NOT a Logger
Service HAS logging behavior

This is NOT inheritance.
*/
