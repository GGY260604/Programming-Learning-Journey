/*
-------------------------------------
        C++ Data Types - auto
-------------------------------------
The 'auto' keyword automatically deduces the data type
of a variable based on the value assigned to it.

=> It saves typing and helps make code more flexible.
=> Introduced in C++11.
*/

#include <iostream>
#include <typeinfo>   // used for showing variable type (optional)
using namespace std;

int main() {
    auto integerVar = 10;          // int
    auto doubleVar = 10.5;         // double
    auto textVar = "Hello";        // const char*
    auto charVar = 'A';            // char
    auto boolVar = true;           // bool

    cout << "integerVar: " << integerVar << "\n";
    cout << "doubleVar: " << doubleVar << "\n";
    cout << "textVar: " << textVar << "\n";
    cout << "charVar: " << charVar << "\n";
    cout << "boolVar: " << boolVar << "\n";

    // Optional: display deduced types
    cout << "\nType info (compiler-dependent):\n";
    cout << "integerVar -> " << typeid(integerVar).name() << "\n";
    cout << "doubleVar -> " << typeid(doubleVar).name() << "\n";
    cout << "textVar   -> " << typeid(textVar).name() << "\n";
}

/*
Output (type names may vary depending on compiler):
integerVar: 10
doubleVar: 10.5
textVar: Hello
charVar: A
boolVar: 1

Type info:
integerVar -> int
doubleVar -> double
textVar   -> char const*
-------------------------------------
Notes:
- The compiler decides the variable's type automatically.
- The variable must be initialized at declaration.
  (auto x;  // ❌ Error: no initializer, cannot deduce type)
- You can still make it const or reference:
    const auto num = 42;     // constant integer
    auto& ref = integerVar;  // reference
- Use 'auto' when the exact type is long or complex (e.g., iterators).
-------------------------------------
*/
