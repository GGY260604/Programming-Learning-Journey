/*
-------------------------------------
       Functions - Lambda Functions
-------------------------------------
Lambda functions (also called anonymous functions)
are small, inline functions without a name.

General syntax:
    [capture](parameters) -> return_type {
        // body
    }

- The [capture] part decides which external variables are available inside.
- 'auto' is often used to store lambda because its type is compiler-generated.
*/

#include <iostream>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
    // --- Basic lambda with no parameters ---
    auto sayHello = []() {
        cout << "Hello from lambda!" << endl;
    };
    sayHello(); // call it

    // --- Lambda with parameters and return value ---
    auto add = [](int a, int b) -> int {
        return a + b;
    };
    cout << "add(3,4) = " << add(3,4) << endl;

    // --- Lambda with implicit return type ---
    auto multiply = [](int a, int b) { return a * b; };
    cout << "multiply(5,6) = " << multiply(5,6) << endl;

    // --- Capturing external variables ---
    int factor = 10;
    auto timesFactor = [factor](int x) { return x * factor; };
    cout << "5 * factor = " << timesFactor(5) << endl;

    // --- Capture by reference (can modify) ---
    int counter = 0;
    auto increment = [&counter]() { counter++; };
    increment();
    increment();
    cout << "counter after 2 increments = " << counter << endl;

    // --- Mutable lambdas (capture by value but allow modification) ---
    int num = 5;
    auto changeValue = [num]() mutable {
        num += 10; // allowed because of mutable
        cout << "Inside lambda num = " << num << endl;
    };
    changeValue();
    cout << "Outside lambda num = " << num << endl; // still 5 because captured by value

    // --- Using lambda with STL algorithms ---
    vector<int> numbers = {1, 2, 3, 4, 5};
    cout << "Numbers greater than 3: ";
    for_each(numbers.begin(), numbers.end(), [](int n) {
        if (n > 3) cout << n << " ";
    });
    cout << endl;

    // --- Lambda returning another lambda (nested lambda) ---
    auto makeMultiplier = [](int m) {
        return [m](int x) { return x * m; }; // capture m by value
    };
    auto times3 = makeMultiplier(3);
    cout << "times3(7) = " << times3(7) << endl;

    return 0;
}

/*
Notes:
- [] empty capture means no external variables used.
- [x] capture by value, [&x] capture by reference.
- [=] capture all local variables by value.
- [&] capture all local variables by reference.
- Use mutable to modify captured-by-value variables inside lambda.
- Often used with STL algorithms, callbacks, and event handlers.
*/
