/*
-------------------------------------
      Functions - Intro / Syntax
-------------------------------------
A function is a reusable block of code that performs a task.
Syntax:
    return_type function_name(parameter_list) {
        // body
    }

- Declare (prototype) optionally before main()
- Define the function (body)
- Call the function by name with arguments

This file shows declaration, definition, and call.
*/

#include <iostream>
using namespace std;

// Function declaration (prototype)
void greet();  

// Function definition
void greet() {
    cout << "Hello from greet()!" << endl;
}

int main() {
    // Function call
    greet();

    return 0;
}

/*
Notes:
- Return type 'void' means no value returned.
- Prototypes are optional if functions are defined
  before their first call.
- Organize code: prototypes at top, definitions below or in separate files.
*/
