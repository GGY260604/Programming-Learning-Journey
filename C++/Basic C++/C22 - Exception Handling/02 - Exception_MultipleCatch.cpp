#include <iostream>
using namespace std;

int main() {
    try {
        int num;
        cout << "Enter a number between 1 and 10: ";
        cin >> num;

        if (num < 1)
            throw num; // throw int
        else if (num > 10)
            throw string("Too large!"); // throw string
        else
            cout << "You entered: " << num << endl;
    }
    catch (int e) {
        cout << "Error: number too small (" << e << ")" << endl;
    }
    catch (string &msg) {
        cout << "Error: " << msg << endl;
    }

    cout << "End of program" << endl;

    return 0;
}

/*
Important Notes:
- Multiple catch blocks can handle different types of exceptions
- Exception type must match the type thrown
- catch(...) can be used as a generic catch-all block
*/
