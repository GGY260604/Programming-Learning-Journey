/*
-------------------------------------
      C++ Syntax - Basic Structure
-------------------------------------
Every C++ program must have:
1. A header inclusion (example: #include <iostream>)
2. A main() function - where the program starts
3. Statements inside main() ending with semicolons (;)
*/

#include <iostream>   // Allows us to use input/output like cout and cin
using namespace std;  // Lets us use cout instead of std::cout

// main() function - the program execution starts here
int main() {
    cout << "Hello World!";   // Output statement
    return 0;                 // Return 0 means program ended successfully
}

/*
-------------------------------------
        Explanation and Notes
-------------------------------------
- #include <iostream>  -> includes standard input/output stream library
- using namespace std; -> allows using cout and cin without std::
- cout << "text";      -> prints the text to the console
- return 0;            -> indicates successful program execution
- Every statement must end with a semicolon (;)

TIP:
You can remove 'using namespace std;' and write:
    std::cout << "Hello World!";
This is safer in larger programs to avoid naming conflicts.
*/
