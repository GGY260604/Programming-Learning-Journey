/*
-------------------------------------
       C++ Output - Print Text
-------------------------------------
The cout object is used to print output to the screen.
The << operator is called the "insertion operator".
*/

#include <iostream>
using namespace std;

int main() {
    cout << "Hello World";    // Print text to screen
    cout << "Welcome to C++"; // This will print right after the previous text
    return 0;
}

/*
Output:
Hello WorldWelcome to C++

Note:
- cout does NOT automatically add spaces or new lines.
- To separate outputs, you must manually add them (e.g., "Hello " << "World").
*/
